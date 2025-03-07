<div class="container mt-5">
    <h2>Company Settings</h2>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <!-- Button to open modal -->
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#settingsModal">Edit Settings</button>

    <div class="mt-3">
        <p><strong>Email:</strong> <?= isset($settings['company_email']) ? $settings['company_email'] : 'Not Set' ?></p>
        <p><strong>Phone:</strong> <?= isset($settings['company_phone']) ? $settings['company_phone'] : 'Not Set' ?></p>
        <p><strong>Address:</strong> <?= isset($settings['company_address']) ? $settings['company_address'] : 'Not Set' ?></p>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingsModalLabel">Edit Company Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="<?= base_url('admin/save_settings'); ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="company_email" class="form-label">Company Email</label>
                        <input type="email" class="form-control" name="company_email" value="<?= isset($settings['company_email']) ? $settings['company_email'] : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="company_phone" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" name="company_phone" value="<?= isset($settings['company_phone']) ? $settings['company_phone'] : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="company_address" class="form-label">Address</label>
                        <textarea class="form-control" name="company_address" required><?= isset($settings['company_address']) ? $settings['company_address'] : '' ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
