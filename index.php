<?php
include("includes/header.php");
require_once("admin/includes/init.php");
$photos = Photo::find_all();
?>

	<div class="col-md-8">
		<div class="row">
			<?php foreach($photos as $photo) : ?>
			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
					<img class="img-fluid" src="admin/<?= $photo->picture_path(); ?>" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title"><?= $photo->title; ?></h5>
						<p class="card-text"><?= $photo->description; ?></p>
						<a href="photo.php?id=<?= $photo->id ?>" class="btn btn-primary">Read blog item</a>
					</div>
				</div>
			</div>
            <?php endforeach; ?>
		</div>
	</div>
	<div class="col-md-4">
        <?php include("includes/sidebar.php"); ?>
	</div>

<?php include("includes/footer.php"); ?>

