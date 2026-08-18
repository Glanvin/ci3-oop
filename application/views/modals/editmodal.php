<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <!-- Form points to ModalController to handle the update -->
            <form action="<?php echo site_url('ModalController/editModal'); ?>" method="post" class="needs-validation" novalidate>
                <div class="modal-body">
                    <!-- Hidden ID field to know which user to update (You will need to populate this via JS) -->
                    <input type="hidden" id="edit_id" name="id">

                    <div class="mb-3">
                        <label for="edit_firstname" class="form-label">First Name</label>
                        <input type="text" id="edit_firstname" name="firstname" class="form-control" required>
                        <div class="invalid-feedback">First name is required.</div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_middlename" class="form-label">Middle Name <span class="text-muted">(Optional)</span></label>
                        <input type="text" id="edit_middlename" name="middlename" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="edit_lastname" class="form-label">Last Name</label>
                        <input type="text" id="edit_lastname" name="lastname" class="form-control" required>
                        <div class="invalid-feedback">Last name is required.</div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email</label>
                        <input type="email" id="edit_email" name="email" class="form-control" required>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_contactnumber" class="form-label">Contact Number</label>
                        <input type="tel" id="edit_contactnumber" name="contactnumber" class="form-control" pattern="[0-9]{7,15}" required>
                        <div class="invalid-feedback">Please enter a valid contact number (7 to 15 digits).</div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_address" class="form-label">Address</label>
                        <input type="text" id="edit_address" name="address" class="form-control" required>
                        <div class="invalid-feedback">Address is required.</div>
                    </div>

                    <!-- Readonly Password Field & Request Reset Button -->
                    <div class="mb-3">
                        <label for="edit_password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="edit_password" class="form-control text-muted" value="********" readonly disabled>
                            <button class="btn btn-outline-danger" type="button" id="btnRequestReset">Request Reset</button>
                        </div>
                        <div class="form-text">Admins cannot manually edit passwords. Click "Request Reset" to trigger a reset event.</div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- Name attribute "editModal" triggers the if-statement in your controller -->
                    <input type="submit" name="editModal" class="btn btn-warning" value="Save Changes">
                </div>
            </form>
        </div>
    </div>
</div>