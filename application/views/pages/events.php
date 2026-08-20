<div class="container mt-5">
    
    <?php if (isset($role) && ($role === 'admin' || $role === 'officer')): ?>
        <!-- ADMIN / OFFICER VIEW -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>All Events</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
                Add Event
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th># ID</th>
                        <th>Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($events)): ?>
                        <?php foreach ($events as $event): ?>
                            <tr>
                                <td><?= html_escape($event['event_id']); ?></td>
                                <td><?= html_escape($event['name']); ?></td>
                                <td><?= html_escape($event['start_date']); ?></td>
                                <td><?= html_escape($event['end_date']); ?></td>
                                <td><?= html_escape($event['start_time']); ?></td>
                                <td><?= html_escape($event['end_time']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No events found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    <?php else: ?>
        <!-- REGULAR USER VIEW -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>My Attended Events</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#attendEventModal">
                Attend an Event
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Event Name</th>
                        <th>Joined At</th>
                        <th>Proof of Attendance</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($attended_events) && is_array($attended_events)): ?>
                        <?php foreach ($attended_events as $event): ?>
                            <tr>
                                <td><?= html_escape($event['name'] ?? 'Unknown Event'); ?></td>
                                <td><?= html_escape($event['joined_at'] ?? 'Unknown Time'); ?></td>
                                <td>
                                    <?php if (!empty($event['proof_image'])): ?>
                                        <a href="<?= base_url('uploads/attendance/' . html_escape($event['proof_image'])); ?>" target="_blank">View Picture</a>
                                    <?php else: ?>
                                        No Image
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center">You have not attended any events yet.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

</div>