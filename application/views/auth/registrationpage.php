<div class="container">
    <div class="d-flex flex-column align-items-center mb-3 mb-lg-4">
        <img class="mt-3 mt-lg-4" src="<?= base_url('assets/images/logoipsum-title.svg') ?>" alt="logo">
        <h2 class="text-center mt-2">Account Registration</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form class="login-form" action="<?= site_url('RegistrationController/registerUser') ?>" method="post">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" type="text" id="username" name="username" autocomplete="off" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="email" id="email" name="email" autocomplete="off" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="firstname">First Name</label>
                        <input class="form-control" type="text" id="firstname" name="firstname" autocomplete="off" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="middlename">Middle Name</label>
                        <input class="form-control" type="text" id="middlename" name="middlename" autocomplete="off">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="lastname">Last Name</label>
                        <input class="form-control" type="text" id="lastname" name="lastname" autocomplete="off" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="contactnumber">Contact Number</label>
                        <input class="form-control" type="tel" id="contactnumber" name="contactnumber" autocomplete="off" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="password" id="password" name="password" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="passwordconf">Password Confirm</label>
                        <input class="form-control" type="password" id="passwordconf" name="passwordconf" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label" for="address">Address</label>
                        <input class="form-control" type="text" id="address" name="address" autocomplete="off" required>
                    </div>
                </div>

                <div class="row justify-content-center mt-3">
                    <div class="col-md-6">
                        <input type="submit" name="register" class="btn btn-primary w-100" value="Register">
                    </div>
                </div>
            </form>
            <div class="text-center mt-4">
                <p class="mb-0 text-body-secondary small">
                    Have an Account? <a class="text-decoration-none text-primary" href="<?= site_url('auth/signin') ?>">Sign In</a>
                </p>
            </div>
        </div>
    </div>
</div>