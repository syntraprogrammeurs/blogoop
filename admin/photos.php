<?php include("includes/header.php");
if(!$session->is_signed_in()){
    redirect('login.php');
}

$photos = Photo::find_all();
?>

<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2>PHOTOS</h2>
            <table class="table table-header">
                <thead>
                <tr>
                    <th>Photo</th>
                    <th>Id</th>
                    <th>Title</th>
	                <th>Caption</th>
	                <th>Alternate Text</th>
                    <th>File Name</th>
                    <th>Size</th>
	                <th>Comments</th>

                </tr>
                </thead>
                <tbody>
                    <?php foreach($photos as $photo): ?>
                        <tr>

                            <td><img  src="<?php echo $photo->picture_path(); ?>" height="62"
                                     width="62"
                                     alt="">
	                            <div>
		                            <a class="btn btn-danger rounded-0" href="delete_photo.php?id=<?php echo
		                            $photo->id; ?>">Delete</a>
		                            <a class="btn btn-warning rounded-0" href="edit_photo.php?id=<?php echo
                                    $photo->id; ?>">Edit</a>
		                            <a class="btn btn-success rounded-0"
		                               href="../photo.php?id=<?php echo $photo->id; ?>">View</a>
	                            </div>

                            </td>

                            <td><?php echo $photo->id; ?>

                            </td>
                            <td><?php echo $photo->title; ?></td>
	                        <td><?php echo $photo->caption; ?></td>
	                        <td><?php echo $photo->alternate_text; ?></td>
                            <td><?php echo $photo->filename; ?></td>
                            <td><?php echo $photo->size; ?></td>
	                        <td>
		                        <a href="comment_photo.php?id=<?php echo $photo->id; ?>">
			                        <?php
                                    $comments = Comment::find_the_comments($photo->id);
                                    echo count($comments);
                                    ?>
		                        </a>
	                        </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php include("includes/footer.php"); ?>


