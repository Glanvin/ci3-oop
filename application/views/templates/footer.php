<footer class="footer text-center mt-auto">
    <div class="container">
        <p>Copyright &copy; 2026. All rights reserved.</p>
        <p>CI3 OOP Project</p>
    </div>
</footer>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toastElList = document.querySelectorAll('.toast');
        const toastList = [...toastElList].map(toastEl => {
            // Initialize the toast with auto-hide settings
            const toast = new bootstrap.Toast(toastEl, {
                autohide: true,
                delay: 3000 // Time in milliseconds before it dismisses
            });
            toast.show(); // Trigger the toast to appear
            return toast;
        });
    });
</script>
</body>
</html>