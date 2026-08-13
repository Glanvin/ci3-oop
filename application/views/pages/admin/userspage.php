<div class="container-fluid min-vh-100 py-4 px-3 px-lg-5">
    <div class="row g-4">
        
        <!-- Form Section -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Add User</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('AdminController/saveUser'); ?>" method="post" class="needs-validation" novalidate>
                        
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username" class="form-control" minlength="3" required>
                            <div class="invalid-feedback">Username must be at least 3 characters.</div>
                        </div>

                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" id="firstname" name="firstname" value="<?php echo set_value('firstname'); ?>" placeholder="First Name" class="form-control" required>
                            <div class="invalid-feedback">First name is required.</div>
                        </div>

                        <div class="mb-3">
                            <label for="middlename" class="form-label">Middle Name <span class="text-muted">(Optional)</span></label>
                            <input type="text" id="middlename" name="middlename" value="<?php echo set_value('middlename'); ?>" placeholder="Middle Name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" id="lastname" name="lastname" value="<?php echo set_value('lastname'); ?>" placeholder="Last Name" class="form-control" required>
                            <div class="invalid-feedback">Last name is required.</div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email" class="form-control" required>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>

                        <div class="mb-3">
                            <label for="contactnumber" class="form-label">Contact Number</label>
                            <input type="tel" id="contactnumber" name="contactnumber" value="<?php echo set_value('contactnumber'); ?>" placeholder="e.g., 09123456789" class="form-control" pattern="[0-9]{7,15}" required>
                            <div class="invalid-feedback">Please enter a valid contact number (7 to 15 digits).</div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" id="address" name="address" value="<?php echo set_value('address'); ?>" placeholder="Address" class="form-control" required>
                            <div class="invalid-feedback">Address is required.</div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password" class="form-control" minlength="6" required>
                            <div class="invalid-feedback">Password must be at least 6 characters long.</div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" name="save" class="btn btn-primary">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title mb-0">User List</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead class="table-dark">
                                <tr>            
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Address</th>
                                    <th>Password</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($users)): ?>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?php echo $user->username; ?></td>
                                            <td><?php echo $user->firstname; ?></td>
                                            <td><?php echo $user->middlename; ?></td>
                                            <td><?php echo $user->lastname; ?></td>
                                            <td><?php echo $user->email; ?></td>
                                            <td><?php echo $user->contactnumber; ?></td>
                                            <td><?php echo $user->address; ?></td>
                                            <td><?php echo $user->password; ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo site_url('AdminController/edit/' . $user->id); ?>" class="btn btn-sm btn-outline-warning me-1">Edit</a>
                                                <a href="<?php echo site_url('AdminController/delete/' . $user->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this User?');">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="9" class="text-center py-4 text-muted">No Users found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Client-side Validation Script -->
<script>
    (function () {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>