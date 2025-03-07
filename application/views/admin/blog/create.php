	<div class="container mt-5">
		<h2>Create New Blog</h2>
		<form action="<?php echo site_url('admin/blog/store'); ?>" method="POST" enctype="multipart/form-data" onsubmit="return validateForm();">

			<div class="mb-3">
				<label class="form-label">SEO-friendly URL</label>
				<input type="text" name="slug" id="slug" class="form-control">
			</div>

			<div class="mb-3">
				<label class="form-label">Title</label>
				<!-- <div id="title-container"></div> -->
				<input type="text" name="title" id="title" class="form-control">
			</div>

			<div class="mb-3">
				<label class="form-label">Description</label>
				<!-- <div id="desc-container"></div> -->
				<input type="text" name="description" id="description" class="form-control">
			</div>

			<div class="mb-3">
				<label class="form-label">Content</label>
				<div id="editor-container"></div>
				<input type="hidden" name="content" id="content">
			</div>

			<div class="mb-3">
				<label class="form-label">Image</label>
				<input type="file" name="image" id="image" class="form-control" accept="image/*">
				<small class="text-muted">Max size: 5MB</small>
			</div>

			<button type="submit" class="btn btn-primary">Create Blog</button>
		</form>
	</div>
