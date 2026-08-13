<!-- application/views/partials/alert.php -->

<?php 
$has_success = $this->session->flashdata('success');
$has_error   = $this->session->flashdata('error');
$has_info    = $this->session->flashdata('info');
$has_val_err = validation_errors();

if ($has_success || $has_error || $has_info || $has_val_err): 
    // Determine Bootstrap Alert type and heading
    if ($has_success) {
        $alert_class = 'alert-success';
        $alert_title = 'Success!';
        $message     = $has_success;
    } elseif ($has_error) {
        $alert_class = 'alert-danger';
        $alert_title = 'Error!';
        $message     = $has_error;
    } elseif ($has_info) {
        $alert_class = 'alert-info';
        $alert_title = 'Notice';
        $message     = $has_info;
    } else {
        $alert_class = 'alert-danger';
        $alert_title = 'Validation Failed!';
        $message     = validation_errors('<div class="small">• ', '</div>');
    }
?>

<!-- Top-Right Fixed Container -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1080; max-width: 400px; width: 100%;">
    <div id="appAlert" class="alert <?php echo $alert_class; ?> alert-dismissible fade show shadow-lg mb-0" role="alert">
        <h6 class="alert-heading fw-bold mb-1"><?php echo $alert_title; ?></h6>
        <div><?php echo $message; ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>

<!-- Optional Script to Auto-Dismiss Alert After 5 Seconds -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var alertElement = document.getElementById('appAlert');
        if (alertElement) {
            setTimeout(function () {
                var bsAlert = bootstrap.Alert.getOrCreateInstance(alertElement);
                if (bsAlert) {
                    bsAlert.close();
                }
            }, 5000); // Closes automatically after 5 seconds
        }
    });
</script>

<?php endif; ?>