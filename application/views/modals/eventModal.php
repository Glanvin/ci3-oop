<!-- Add Event Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Ensure form opens with multipart to support file uploading -->
            <?php echo form_open_multipart('eventcontroller/add_event'); ?>
            <div class="modal-header">
                <h5 class="modal-title" id="addEventModalLabel">Add New Event</h5>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label>Event Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Start Date</label>
                        <input type="date" name="start_date" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>End Date</label>
                        <input type="date" name="end_date" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Start Time</label>
                        <input type="time" name="start_time" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>End Time</label>
                        <input type="time" name="end_time" class="form-control">
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label>Event File/Poster (Max 5MB)</label>
                    <input type="file" name="event_file" class="form-control-file" accept=".jpg,.png,.jpeg,.pdf,.doc,.docx">
                    <small class="form-text text-muted">Allowed types: JPG, PNG, PDF, DOC. Maximum size: 5MB.</small>
                </div> -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Event</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>