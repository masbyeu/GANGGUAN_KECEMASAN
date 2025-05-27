<?php
class ESA_CF_Calculation {
    
    public function calculate_diagnosis($consultation_id) {
        global $wpdb;
        
        // Get user answers
        $user_answers = $wpdb->get_results($wpdb->prepare("
            SELECT ua.symptom_id, ua.cf_user 
            FROM {$wpdb->prefix}sp_user_answers ua 
            WHERE ua.consultation_id = %d
        ", $consultation_id), ARRAY_A);
        
        // Get all diseases
        $diseases = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}sp_diseases", ARRAY_A);
        
        $diagnosis_results = array();
        
        foreach ($diseases as $disease) {
            $cf_combine = $this->calculate_cf_for_disease($disease['id'], $user_answers);
            
            if ($cf_combine > 0) {
                $percentage = $cf_combine * 100;
                $diagnosis_results[] = array(
                    'disease_id' => $disease['id'],
                    'cf_result' => $cf_combine,
                    'percentage' => $percentage,
                    'disease_name' => $disease['name']
                );
            }
        }
        
        // Sort by CF result (descending)
        usort($diagnosis_results, function($a, $b) {
            return $b['cf_result'] <=> $a['cf_result'];
        });
        
        // Save results to database
        $this->save_diagnosis_results($consultation_id, $diagnosis_results);
        
        return $diagnosis_results;
    }
    
    private function calculate_cf_for_disease($disease_id, $user_answers) {
        global $wpdb;
        
        // Get rules for this disease
        $rules = $wpdb->get_results($wpdb->prepare("
            SELECT r.symptom_id, r.cf_expert 
            FROM {$wpdb->prefix}sp_rules r 
            WHERE r.disease_id = %d
        ", $disease_id), ARRAY_A);
        
        $cf_values = array();
        
        foreach ($rules as $rule) {
            foreach ($user_answers as $answer) {
                if ($rule['symptom_id'] == $answer['symptom_id']) {
                    // CF(H,E) = CF(E,H) * CF(H)
                    $cf_he = $answer['cf_user'] * $rule['cf_expert'];
                    $cf_values[] = $cf_he;
                    break;
                }
            }
        }
        
        // Combine multiple CF values
        return $this->combine_cf_values($cf_values);
    }
    
    private function combine_cf_values($cf_values) {
        if (empty($cf_values)) {
            return 0;
        }
        
        if (count($cf_values) == 1) {
            return $cf_values[0];
        }
        
        $result = $cf_values[0];
        
        for ($i = 1; $i < count($cf_values); $i++) {
            $cf1 = $result;
            $cf2 = $cf_values[$i];
            
            // CF combine formula
            if ($cf1 >= 0 && $cf2 >= 0) {
                $result = $cf1 + $cf2 - ($cf1 * $cf2);
            } elseif ($cf1 < 0 && $cf2 < 0) {
                $result = $cf1 + $cf2 + ($cf1 * $cf2);
            } else {
                $result = ($cf1 + $cf2) / (1 - min(abs($cf1), abs($cf2)));
            }
        }
        
        return $result;
    }
    
    private function save_diagnosis_results($consultation_id, $results) {
        global $wpdb;
        
        foreach ($results as $index => $result) {
            $wpdb->insert("{$wpdb->prefix}sp_diagnosis_results", array(
                'consultation_id' => $consultation_id,
                'disease_id' => $result['disease_id'],
                'cf_result' => $result['cf_result'],
                'percentage' => $result['percentage'],
                'rank_position' => $index + 1
            ));
        }
    }
}