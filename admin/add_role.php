<?php include("includes/header.php"); ?>
<?php
if (!$session->is_signed_in()) {
    redirect("login.php");
}

$role = new Role();

if(isset($_POST['submit'])){
	if($role){
		$role->role= $_POST['role'];
		$role->save();
		redirect('users.php');

	}
}

?>

<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
	        <a class="btn btn-success" href="roles.php">All Roles</a>
            <h1>Rol toevoegen</h1>

            <form action="add_role.php" method="post">
                <div class="row">
                    <div class="col-12">

                        <div class="form-group">
                            <label for="role">Rol</label>
                            <input type="text" name="role" class="form-control">
                        </div>

	                    <div class="form-group">

		                    <input class="btn btn-primary" type="submit" value="Create Role" name="submit"
		                           class="form-control">
	                    </div>

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>

