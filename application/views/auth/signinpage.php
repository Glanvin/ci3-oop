<div class="container">
    <div class="d-flex flex-column align-items-center mb-5">
        <img class="mt-5" src="<?= base_url('assets/images/logoipsum-title.svg') ?>" alt="logo">
        <h2 class="text-center mt-3">Sign In</h2>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form class="login-form" action="<?= site_url('SignInController/check') ?>" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <input type="submit" name="signin" class="btn btn-primary w-100" value="Sign In">
            </form>
            <div class="text-center mt-4">
                <p class="mb-0 text-body-secondary small">
                    Don't have an Account? <a class="text-decoration-none text-primary" href="<?= site_url('auth/register') ?>">Create One Now</a>
                </p>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
</body>
</html>