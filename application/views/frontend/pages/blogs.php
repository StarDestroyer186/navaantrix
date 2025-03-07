<style>
	.blogs{
		margin-top: 4.5rem;
	}
	.card-img-top {
    width: 100%;
    height: 250px; /* Fixed height for uniformity */
    object-fit: cover; /* Ensures images cover the area without distortion */
}


</style>
<section class="blogs">
	<div class="container mt-5">
		<div class="row">
			<?php foreach ($blogs as $blog): ?>
				<div class="col-lg-4 col-md-6 col-12 mb-4">
					<div class="card">
					<div class="card-img-top" style="background-image: url('<?php echo base_url('uploads/blogs/' . $blog['image']); ?>'); background-size: cover; background-position: center; height: 250px;">
					</div>
					
						<div class="card-body">
							<h5 class="card-title"><?php echo $blog['title']; ?></h5>
							<p class="card-text"></p>
								<?php echo strlen($blog['description']) > 200 ? substr($blog['description'], 0, 150) . '...' : $blog['description']; ?>
							</p>
							<a href="<?php echo 'blog/' . $blog['slug']; ?>" class="btn btn-primary">Read More</a>
						</div>
						<div class="card-footer text-muted">
							Posted on <?php echo date('F j, Y', strtotime($blog['created_at'])); ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
