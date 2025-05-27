jQuery(document).ready(function($) {
    
    // Update CF slider values
    $('.cf-slider').on('input', function() {
        var value = parseFloat($(this).val());
        $(this).siblings('.cf-value').text(value.toFixed(1));
        
        // Change color based on value
        var color = value > 0.7 ? '#e74c3c' : 
                   value > 0.4 ? '#f39c12' : '#667eea';
        $(this).siblings('.cf-value').css('background-color', color);
    });
    
    // Form validation
    $('.consultation-form').on('submit', function(e) {
        var isValid = true;
        var errors = [];
        
        // Validate required fields
        var requiredFields = ['name', 'age', 'gender'];
        requiredFields.forEach(function(field) {
            if (!$('[name="' + field + '"]').val()) {
                errors.push('Field ' + field + ' harus diisi');
                isValid = false;
            }
        });
        
        // Validate age range
        var age = parseInt($('[name="age"]').val());
        if (age < 10 || age > 25) {
            errors.push('Umur harus antara 10-25 tahun');
            isValid = false;
        }
        
        // Check if at least one symptom is selected
        var hasSymptoms = false;
        $('.cf-slider').each(function() {
            if (parseFloat($(this).val()) > 0) {
                hasSymptoms = true;
                return false;
            }
        });
        
        if (!hasSymptoms) {
            errors.push('Silakan pilih minimal satu gejala');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
            alert('Error:\n' + errors.join('\n'));
        }
    });
    
    // Smooth animations for result page
    if ($('.diagnosis-results').length) {
        $('.diagnosis-item').each(function(index) {
            $(this).delay(index * 200).animate({
                opacity: 1,
                transform: 'translateY(0)'
            }, 500);
        });
        
        // Animate progress bars
        setTimeout(function() {
            $('.progress-fill').each(function() {
                var width = $(this).css('width');
                $(this).css('width', '0').animate({width: width}, 1000);
            });
        }, 500);
    }
    
    // Admin table interactions
    $('.btn-delete').on('click', function(e) {
        if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            e.preventDefault();
        }
    });
    
    // Chart for statistics (if using Chart.js)
    if ($('#consultationChart').length) {
        var ctx = document.getElementById('consultationChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Konsultasi per Hari',
                    data: chartData.data,
                    borderColor: '#667eea',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    }
                }
            }
        });
    }
});