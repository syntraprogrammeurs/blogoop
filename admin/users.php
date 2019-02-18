<?php include("includes/header.php");
if(!$session->is_signed_in()){
    redirect('login.php');
}

$users = User::find_all_users();


?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
	        <a class="btn btn-primary" href="add_user.php">Add User</a>
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Photo</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                </thead>
	            <tbody>
	            <?php
	                foreach($users as $user) : ?>

		                <tr>
			                <td><?php echo $user->id; ?></td>
			                <td>
				                <img src="<?php echo $user->image_path_and_placeholder(); ?>"
				                     alt="<?php echo $user->first_name . ' ' . $user->last_name; ?>"
				                width="62" height="62">
				                <div>

					                <a class="btn btn-danger"
					                   href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
					                <a class="btn btn-warning" href="edit_user.php?id=<?php echo $user->id; ?>">Edit</a>
					                <a class="btn btn-success" href="">View</a>
				                </div>
			                </td>
			                <td><?php echo $user->username; ?></td>
			                <td><?php echo $user->first_name; ?></td>
			                <td><?php echo $user->last_name; ?></td>
		                </tr>

	                <?php endforeach; ?>
	            </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>


