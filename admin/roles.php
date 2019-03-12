<?php include("includes/header.php");
if(!$session->is_signed_in()){
    redirect('login.php');
}

$roles = Role::find_all_roles();

?>
<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
	        <a class="btn btn-primary" href="add_role.php">Add Role</a>
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Role</th>

                    </tr>
                </thead>
	            <tbody>
	            <?php
	                foreach($roles as $role) : ?>

		                <tr>
			                <td><?php echo $role->id; ?></td>
			                <td>

				                <div>

					                <a class="btn btn-danger"
					                   href="delete_role.php?id=<?php echo $role->id; ?>">Delete</a>
					                <a class="btn btn-warning" href="edit_role.php?id=<?php echo $role->id; ?>">Edit</a>
					                <a class="btn btn-success" href="">View</a>
				                </div>
			                </td>
			                <td><?php echo $role->role; ?></td>

		                </tr>

	                <?php endforeach; ?>
	            </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>


