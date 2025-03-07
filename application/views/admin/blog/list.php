    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <h2>Manage Blogs</h2>
            <a href="<?php echo site_url('admin/blog/create'); ?>" class="btn btn-primary">Create New Blog</a>
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
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach ($blogs as $blog): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo htmlspecialchars($blog['title']); ?></td>
                        <td><?php echo htmlspecialchars($blog['description']); ?></td>
                        <td>
                            <?php if (!empty($blog['image'])): ?>
                                <img src="<?php echo base_url('uploads/blogs/' . $blog['image']); ?>" width="80">
                            <?php else: ?>
                                No Image
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('admin/blog/edit/' . $blog['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?php echo site_url('admin/blog/delete/' . $blog['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this blog?');">Delete</a>
                        </td>
                    </tr>
                <?php $i++; endforeach; ?>
            </tbody>
        </table>
    </div>
