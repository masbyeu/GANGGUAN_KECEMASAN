<style>
    /* ==================================================
   Expert System Anxiety - Rules Management CSS
   ================================================== */

/* Wrapper & Layout */
.wrap {
    max-width: 1200px;
    margin: 20px auto;
    padding: 0 20px;
    background: #fff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

/* Header Styling */
.wrap h1 {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    margin: 0 -20px 30px -20px;
    padding: 25px 30px;
    font-size: 24px;
    font-weight: 600;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    border-bottom: 3px solid #5a67d8;
}

/* Form Container */
form {
    padding: 30px;
    background: #fafafa;
    border-radius: 6px;
    margin: 20px 0;
    border: 1px solid #e1e5e9;
}

/* Form Table Styling */
.form-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.form-table tr {
    border-bottom: 1px solid #e1e5e9;
    transition: background-color 0.2s ease;
}

.form-table tr:hover {
    background-color: #f8f9fa;
}

.form-table tr:last-child {
    border-bottom: none;
}

/* Table Headers */
.form-table th {
    background: linear-gradient(to bottom, #f8f9fa, #e9ecef);
    padding: 18px 20px;
    text-align: left;
    font-weight: 600;
    color: #495057;
    border-right: 1px solid #e1e5e9;
    width: 200px;
    position: relative;
}

.form-table th:after {
    content: '';
    position: absolute;
    right: 0;
    top: 20%;
    height: 60%;
    width: 2px;
    background: linear-gradient(to bottom, #667eea, #764ba2);
    opacity: 0.3;
}

/* Table Data */
.form-table td {
    padding: 18px 20px;
    background: #fff;
}

/* Labels */
.form-table label {
    font-weight: 600;
    color: #2c3e50;
    display: block;
    margin-bottom: 5px;
}

/* Select Styling */
select {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e1e5e9;
    border-radius: 6px;
    font-size: 14px;
    background: #fff;
    color: #495057;
    transition: all 0.3s ease;
    appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6,9 12,15 18,9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 16px;
    padding-right: 40px;
}

select:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    transform: translateY(-1px);
}

select:hover {
    border-color: #cbd5e0;
}

/* Input Number Styling */
input[type="number"] {
    width: 200px;
    padding: 12px 16px;
    border: 2px solid #e1e5e9;
    border-radius: 6px;
    font-size: 14px;
    background: #fff;
    color: #495057;
    transition: all 0.3s ease;
}

input[type="number"]:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    transform: translateY(-1px);
}

input[type="number"]:hover {
    border-color: #cbd5e0;
}

/* Submit Button Container */
.submit {
    text-align: center;
    margin-top: 30px;
    padding-top: 20px;
    border-top: 2px solid #e1e5e9;
}

/* Button Primary Styling */
.button-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    color: #fff;
    padding: 15px 40px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    position: relative;
    overflow: hidden;
}

.button-primary:before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.button-primary:hover:before {
    left: 100%;
}

.button-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
}

.button-primary:active {
    transform: translateY(0);
    box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
}

/* Responsive Design */
@media (max-width: 768px) {
    .wrap {
        margin: 10px;
        padding: 0 15px;
    }
    
    .wrap h1 {
        margin: 0 -15px 20px -15px;
        padding: 20px;
        font-size: 20px;
    }
    
    form {
        padding: 20px;
    }
    
    .form-table th,
    .form-table td {
        display: block;
        width: 100%;
        padding: 12px 15px;
    }
    
    .form-table th {
        background: #667eea;
        color: #fff;
        border-right: none;
        border-bottom: 1px solid #5a67d8;
    }
    
    .form-table th:after {
        display: none;
    }
    
    .form-table td {
        border-bottom: 2px solid #e1e5e9;
        margin-bottom: 15px;
    }
    
    select,
    input[type="number"] {
        width: 100%;
    }
    
    .button-primary {
        width: 100%;
        padding: 18px;
    }
}

@media (max-width: 480px) {
    .wrap h1 {
        font-size: 18px;
        padding: 15px;
    }
    
    form {
        padding: 15px;
    }
    
    .form-table th,
    .form-table td {
        padding: 10px;
    }
}

/* Loading State */
.form-loading {
    opacity: 0.6;
    pointer-events: none;
    position: relative;
}

.form-loading:after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 20px;
    margin: -10px 0 0 -10px;
    border: 2px solid #667eea;
    border-radius: 50%;
    border-top-color: transparent;
    animation: spin 0.8s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Success/Error Messages */
.notice {
    margin: 20px 0;
    padding: 15px;
    border-radius: 6px;
    font-weight: 500;
}

.notice-success {
    background: #d4edda;
    color: #155724;
    border-left: 4px solid #28a745;
}

.notice-error {
    background: #f8d7da;
    color: #721c24;
    border-left: 4px solid #dc3545;
}

/* Tooltip Styling */
.tooltip {
    position: relative;
    display: inline-block;
    cursor: help;
}

.tooltip:after {
    content: attr(data-tooltip);
    position: absolute;
    bottom: 125%;
    left: 50%;
    transform: translateX(-50%);
    background: #333;
    color: #fff;
    padding: 8px 12px;
    border-radius: 4px;
    font-size: 12px;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 1000;
}

.tooltip:hover:after {
    opacity: 1;
    visibility: visible;
}

/* Custom Scrollbar */
select::-webkit-scrollbar {
    width: 8px;
}

select::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

select::-webkit-scrollbar-thumb {
    background: #667eea;
    border-radius: 4px;
}

select::-webkit-scrollbar-thumb:hover {
    background: #5a67d8;
}
</style>
<div class="wrap">
    <h1>Manajemen Data Rules (Hubungan Gejala-Penyakit)</h1>
    <form method="post">
        <table class="form-table">
            <tr>
                <th><label for="disease_id">Penyakit</label></th>
                <td>
                    <select name="disease_id" id="disease_id">
                        <!-- Pilihan Penyakit -->
                        <option value="">Pilih Penyakit</option>
                        <?php
                            global $wpdb;
                            $diseases = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}sp_diseases");
                            foreach ($diseases as $disease) {
                                echo '<option value="' . $disease->id . '">' . esc_html($disease->name) . '</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="symptom_id">Gejala</label></th>
                <td>
                    <select name="symptom_id" id="symptom_id">
                        <!-- Pilihan Gejala -->
                        <option value="">Pilih Gejala</option>
                        <?php
                            $symptoms = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}sp_symptoms");
                            foreach ($symptoms as $symptom) {
                                echo '<option value="' . $symptom->id . '">' . esc_html($symptom->symptom) . '</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="cf_expert">Certainty Factor (CF)</label></th>
                <td><input type="number" name="cf_expert" id="cf_expert" step="0.01" min="0" max="1" required></td>
            </tr>
        </table>
        <p class="submit">
            <input type="submit" name="submit_rule" id="submit_rule" class="button-primary" value="Simpan">
        </p>
    </form>
</div>
