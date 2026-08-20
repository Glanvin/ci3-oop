<!-- <img src="<?php echo base_urL('assets/images/banner.jpg');?>" width="700" height="400" class="img-fluid" alt="Banner"><br><br>
<img src="<?php echo base_urL('assets/images/logo.webp');?>" class="img-fluid rounded shadow" alt="Logo"><br><br>
<img src="<?php echo base_urL('assets/images/profile.webp');?>" class="img-fluid rounded-circle" alt="Profile"><br><br>
<div class="container mt-5 text-center">
	<img src="<?php echo base_url('assets/images/profile.webp'); ?>" class="img-fluid rounded-circle shadow" width="150" alt="profile">
	<h1 class="mt-3">Welcome to Homepage</h1>
	<p>This homepage uses Bootstrap CDN and images in CodeIgniter 3.</p>
	<button class="btn btn-primary">Learn More</button>
</div> -->

<div class="container mt-4">
    <h2>Welcome, <?php echo html_escape($username); ?>!</h2>
    <h4 class="mt-4 mb-3">Current & Upcoming Events</h4>

    <?php if (!empty($events)): ?>
        <div class="row">
            <?php 
            $today = date('Y-m-d');
            foreach ($events as $event): 
                $event_date = date('Y-m-d', strtotime($event['start_date']));
                $is_upcoming = ($event_date > $today);
                $event_value = $event['event_id'] . '|' . $event['name'];
            ?>
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo html_escape($event['name']); ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <?php echo date('M d, Y', strtotime($event['start_date'])); ?>
                            </h6>
                            <p class="card-text flex-grow-1"><?php echo html_escape($event['description'] ?? ''); ?></p>

                            <div class="mt-3">
                                <?php if ($is_upcoming): ?>
                                    <!-- Upcoming Event: Disabled & Grayed out -->
                                    <button class="btn btn-secondary w-100" disabled aria-disabled="true">
                                        Attend Event
                                    </button>
                                <?php else: ?>
                                    <!-- Current Event: Primary Active Button -->
                                    <button type="button" 
                                            class="btn btn-primary w-100 attend-btn" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#attendEventModal"
                                            data-event-value="<?php echo html_escape($event_value); ?>">
                                        Attend Event
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info">
            No events scheduled at this time.
        </div>
    <?php endif; ?>
</div>

<!-- Script to pre-select clicked event in modal dropdown -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const attendButtons = document.querySelectorAll('.attend-btn');
    const modalSelect = document.querySelector('#attendEventModal select[name="event_info"]');

    attendButtons.forEach(button => {
        button.addEventListener('click', function () {
            const eventValue = this.getAttribute('data-event-value');
            if (modalSelect) {
                modalSelect.value = eventValue;
            }
        });
    });
});
</script>