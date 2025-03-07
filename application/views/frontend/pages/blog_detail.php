<style>
	.blog-detail{
		margin-top: 4.5rem;
	}
</style>
<!-- #masthead -->
<section class="blog-detail mb-5">
	<div id="content" class="site-content">
		<div class="ast-container">
			<div id="primary" class="content-area primary">
				<main id="main" class="site-main">
					<div class="container mt-5">
						<?php if (!empty($blog)): ?>
							<div class="card shadow-sm">
								<div class="card-body">
									<h1 class="card-title"><?= $blog['title'] ?></h1>
									<p class="text-muted">Posted on <?= date('F j, Y', strtotime($blog['created_at'])) ?></p>
									<?php if (!empty($blog['image'])): ?>
										<div class="text-center">
											<img src="<?= base_url('uploads/blogs/' . $blog['image']) ?>" alt="<?= $blog['title'] ?>" class="img-fluid mb-3" style="max-width: 100%; height: 450px;">
										</div>
									<?php endif; ?>
									<hr>
									<div id="blog-content">
										<?= $blog['content'] ?>
									</div>
								</div>
							</div>
						<?php else: ?>
							<p>No blog found.</p>
						<?php endif; ?>
					</div>
					<!-- #post-## -->
				</main>
				<!-- #main -->
			</div>
			<!-- #primary -->
		</div>
		<!-- ast-container -->
	</div>

</section>
