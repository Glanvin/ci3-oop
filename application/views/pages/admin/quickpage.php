<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card shadow-sm">
                <div class="card-body py-5">
                    <h2 class="mb-3">Welcome to the Admin Dashboard</h2>
                    <p class="text-muted mb-4">
                        Logged in as: <strong><?= isset($username) ? htmlspecialchars($username) : 'Admin'; ?></strong>
                    </p>
                    
                    <hr class="mb-4">
                    
                    <h5 class="mb-3">Quick Navigation</h5>
                    
                    <!-- Button navigating to the AdminController's users() method -->
                    <a href="<?= site_url('AdminController/users'); ?>" class="btn btn-primary btn-lg">
                        Go to User Table
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>