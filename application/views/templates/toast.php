<?php 
// Check if there are any flash messages or validation errors to show
$has_success = $this->session->flashdata('success');
$has_error   = $this->session->flashdata('error');
$has_val_err = validation_errors();

if ($has_success || $has_error || $has_val_err): 
    $toast_bg = $has_success ? 'bg-success' : 'bg-danger';
    $toast_title = $has_success ? 'Success' : 'Error';
?>

<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1080;">
    <div id="appToast" class="toast align-items-center text-white <?php echo $toast_bg; ?> border-0 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
        <div class="d-flex">
            <div class="toast-body">
                <div class="fw-bold mb-1"><?php echo $toast_title; ?></div>
                <div>
                    <?php 
                        if ($has_success) {
                            echo $this->session->flashdata('success');
                        } elseif ($has_error) {
                            echo $this->session->flashdata('error');
                        } elseif ($has_val_err) {
                            echo validation_errors('<div class="small">• ', '</div>');
                        }
                    ?>
                </div>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastElement = document.getElementById('appToast');
        if (toastElement) {
            var toast = new bootstrap.Toast(toastElement);
            toast.show();
        }
    });
</script>

<?php endif; ?>