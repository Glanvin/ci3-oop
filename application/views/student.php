<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <div class="row g-4">
        
        <!-- Form Section -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Add Student</h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('StudentController/saveStudent'); ?>" method="post">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">Firstname</label>
                            <input type="text" id="firstname" name="firstname" placeholder="Firstname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Lastname</label>
                            <input type="text" id="lastname" name="lastname" placeholder="Lastname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="yearlevel" class="form-label">Year Level</label>
                            <input type="text" id="yearlevel" name="yearlevel" placeholder="Year Level" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="course" class="form-label">Course</label>
                            <input type="text" id="course" name="course" placeholder="Course" class="form-control" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title mb-0">Student List</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead class="table-dark">
                                <tr>            
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Year Level</th>
                                    <th>Course</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($students)): ?>
                                    <?php foreach ($students as $student): ?>
                                        <tr>
                                            <td><?php echo $student->id; ?></td>
                                            <td><?php echo $student->firstname; ?></td>
                                            <td><?php echo $student->lastname; ?></td>
                                            <td><?php echo $student->yearlevel; ?></td>
                                            <td><?php echo $student->course; ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo site_url('StudentController/edit/' . $student->id); ?>" class="btn btn-sm btn-outline-warning me-1">Edit</a>
                                                <a href="<?php echo site_url('StudentController/delete/' . $student->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">No students found.</td>
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
</body>
</html>