<div class="container-fluid min-vh-100 py-4 px-3 px-lg-5">
    <!-- Added justify-content-center to center the columns -->
    <div class="row g-4 justify-content-center">
        
        <!-- Table Section (Centered & Widened) -->
        <div class="col-12 col-lg-10">
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
                                                <!-- Updated Edit Button linking to editUserModal -->
                                                <button type="button" 
                                                        class="btn btn-sm btn-outline-primary me-1 edit-btn" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#editUserModal"
                                                        data-id="<?php echo $user->id; ?>"
                                                        data-firstname="<?php echo htmlspecialchars($user->firstname); ?>"
                                                        data-middlename="<?php echo htmlspecialchars($user->middlename); ?>"
                                                        data-lastname="<?php echo htmlspecialchars($user->lastname); ?>"
                                                        data-email="<?php echo htmlspecialchars($user->email); ?>"
                                                        data-contactnumber="<?php echo htmlspecialchars($user->contactnumber); ?>"
                                                        data-address="<?php echo htmlspecialchars($user->address); ?>">
                                                    Edit
                                                </button>
                                                <a href="<?php echo site_url('AdminController/delete/' . $user->id); ?>" class="btn btn-sm btn-outline-danger">Delete</a>
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

<!-- Script to populate the Edit Modal dynamically -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-btn');
        
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Populate the modal fields based on the data attributes of the clicked button
                document.getElementById('edit_id').value = this.getAttribute('data-id');
                document.getElementById('edit_firstname').value = this.getAttribute('data-firstname');
                document.getElementById('edit_middlename').value = this.getAttribute('data-middlename');
                document.getElementById('edit_lastname').value = this.getAttribute('data-lastname');
                document.getElementById('edit_email').value = this.getAttribute('data-email');
                document.getElementById('edit_contactnumber').value = this.getAttribute('data-contactnumber');
                document.getElementById('edit_address').value = this.getAttribute('data-address');
            });
        });
    });
</script>