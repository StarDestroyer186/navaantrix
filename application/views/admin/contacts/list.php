<div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <h2>Manage Contacts</h2>
            <!-- <a href="<?php echo site_url('admin/blog/create'); ?>" class="btn btn-primary">Create New Blog</a> -->
        </div>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success"> <?php echo $this->session->flashdata('success'); ?> </div>
        <?php endif; ?>
        
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"> <?php echo $this->session->flashdata('error'); ?> </div>
        <?php endif; ?>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
					<th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach ($contacts as $contact): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo htmlspecialchars($contact['name']); ?></td>
                        <td><?php echo htmlspecialchars($contact['email']); ?></td>
                        <td><?php echo htmlspecialchars($contact['phone']); ?></td>
						<td><?php echo htmlspecialchars($contact['message']); ?></td>
                        <td>
                            <!-- <a href="<?php echo site_url('admin/contacts/edit/' . $contact['id']); ?>" class="btn btn-warning btn-sm">Edit</a> -->
                            <a href="<?php echo site_url('admin/contacts/delete/' . $contact['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this contact?');">Delete</a>
                        </td>
                    </tr>
                <?php $i++; endforeach;?>
            </tbody>
        </table>
    </div>
