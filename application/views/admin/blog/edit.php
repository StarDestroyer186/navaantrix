<div class="container mt-5">
    <h2 class="mb-4">Edit Blog</h2>

    <!-- Flash messages -->
	<?php if ($this->session->flashdata('error')): ?>
		<div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>

    <form action="<?= site_url('admin/blog/update/' . $blog['id']); ?>" method="POST" enctype="multipart/form-data">
		<div class="mb-3">
			<label class="form-label">SEO-friendly URL</label>
			<input type="text" name="slug" id="slug" value="<?= $blog['slug']; ?>" class="form-control">
		</div>
	
		<div class="mb-3">
            <label for="title">Title</label>
            <!-- <div id="title-editor" style="height: 50px;"><?= $blog['title']; ?></div> -->
            <input type="text" name="title" id="title" value="<?= $blog['title']; ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <!-- <div id="description-editor" style="height: 80px;"><?= $blog['description']; ?></div> -->
            <input type="text" name="description" id="description" value="<?= $blog['description']; ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="content">Content</label>
            <div id="content-editor" style="height: 150px;"><?= $blog['content']; ?></div>
            <input type="hidden" name="content" id="content" value="">
        </div>

        <div class="mb-3">
            <label for="image">Upload Image (Max: 2MB)</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            <small class="text-danger" id="image-error"></small>
            <?php if (!empty($blog['image'])): ?>
                <div class="mt-3">
                    <p>Current Image:</p>
                    <img src="<?= base_url('uploads/blogs/' . $blog['image']); ?>" alt="Blog Image" width="150">
                </div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Update Blog</button>
        <a href="<?= site_url('blog'); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- Edit Script -->
 <script>
document.addEventListener("DOMContentLoaded", function () {
    // var titleEditor = new Quill("#title-editor", { theme: "snow" });
    // var descriptionEditor = new Quill("#description-editor", { theme: "snow" });
    var contentEditor = new Quill("#content-editor", { theme: "snow" });

    document.querySelector("form").onsubmit = function () {
        // document.querySelector("#title").value = titleEditor.root.innerHTML;
        // document.querySelector("#description").value = descriptionEditor.root.innerHTML;
        document.querySelector("#content").value = contentEditor.root.innerHTML;
    };

    document.getElementById("image").addEventListener("change", function () {
        var file = this.files[0];
        if (file && file.size > 2 * 1024 * 1024) {
            document.getElementById("image-error").innerText = "File size must be less than 5MB.";
            this.value = "";
        } else {
            document.getElementById("image-error").innerText = "";
        }
    });
});
</script>
