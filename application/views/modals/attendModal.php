<!-- Attend Event Modal (For Regular Users) -->
<div class="modal fade" id="attendEventModal" tabindex="-1" aria-labelledby="attendEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open_multipart('eventcontroller/attend_event'); ?>
            <div class="modal-header">
                <h5 class="modal-title" id="attendEventModalLabel">Attend Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="mb-3">
                    <label class="form-label">Select Event</label>
                    <select name="event_info" class="form-control" required>
                        <option value="" disabled selected>Choose an Event</option>
                        <?php if (!empty($events)): ?>
                            <?php foreach ($events as $event): ?>
                                <!-- Passing both ID and Name to avoid another DB call in the controller -->
                                <option value="<?= html_escape($event['event_id'] . '|' . $event['name']); ?>">
                                    <?= html_escape($event['name']); ?> (<?= html_escape($event['start_date']); ?>)
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Picture (Max 5MB)</label>
                    <input type="file" name="attendance_image" class="form-control" accept=".jpg,.png,.jpeg">
                    <small class="form-text text-muted">Upload a picture of yourself at the event. Allowed types: JPG, PNG.</small>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit Attendance</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>