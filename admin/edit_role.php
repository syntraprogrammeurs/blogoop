<?php include("includes/header.php"); ?>
<?php
if (!$session->is_signed_in()) {
    redirect("login.php");

}

if(empty($_GET['id'])) {
	redirect('roles.php');
}
$role = Role::find_by_id($_GET['id']);

if(isset($_POST['update'])) {
	if($role){
        $role->role = $_POST['role'];

        $role->save();
        redirect("edit_role.php?id={$role->id}");
	    }
}
?>

<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
	        <a class="btn btn-success" href="roles.php">All Roles</a>
            <h1>Edit Role</h1>

            <form action="" method="post">
                <div class="row">
                    <div class="col-12">


                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" name="role" class="form-control"
                            value="<?php echo $role->role ;?>"
                            >
                        </div>

	                    <div class="form-group">

		                    <input class="btn btn-primary" type="submit" value="Update role" name="update"
		                           class="form-control">
	                    </div>

                    </div>


                </div>
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>

