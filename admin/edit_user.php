<?php include("includes/header.php"); ?>
<?php
if (!$session->is_signed_in()) {
    redirect("login.php");

}

if(empty($_GET['id'])) {
	redirect('users.php');
}
$user = User::find_by_id($_GET['id']);

if(isset($_POST['update'])) {
	if($user){
	    $user->username = $_POST['username'];
	    $user->first_name = $_POST['first_name'];
	    $user->last_name = $_POST['last_name'];
	    $user->password = $_POST['password'];

	    if(empty($_FILES['user_image'])){
	    	$user->save();
	    }else{
            $user->set_file($_FILES['user_image']);
            $user->save_user_and_image();
            $user->save();
            redirect("edit_user.php?id={$user->id}");
	    }

    }
}

/*if(empty($_GET['id'])){

    redirect("users.php");
}else{
   /* $user = user::find_by_id($_GET['id']);

    if(isset($_POST['update'])){
        if($user){

            $user->title = $_POST['title'];
            $user->caption = $_POST['caption'];
            $user->alternate_text = $_POST['alternate_text'];
            $user->description = $_POST['description'];
            $user->update();
            redirect("users.php");
        }
    }
}*/
?>

<?php include("includes/sidebar.php"); ?>
<?php include("includes/content-top.php"); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
	        <a class="btn btn-success" href="users.php">All Users</a>
            <h1>Edit user</h1>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-8">

	                    <div class="form-group">
		                    <input type="file" name="user_image" class="form-control">
	                    </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control"
                            value="<?php echo $user->username ;?>"
                            >
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control"
                                   value="<?php echo $user->password ;?>">
                        </div>
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" name="first_name" class="form-control"
                                   value="<?php echo $user->first_name ;?>"
                            >
                        </div>
	                    <div class="form-group">
		                    <label for="last_name">Last name</label>
		                    <input type="text" name="last_name" class="form-control"
		                           value="<?php echo $user->last_name ;?>">
	                    </div>
	                    <div class="form-group">

		                    <input class="btn btn-primary" type="submit" value="Update user" name="update"
		                           class="form-control">
	                    </div>

                    </div>
	                <div class="col-4">
		                <img class="img-fluid"
		                     src="<?php echo $user->image_path_and_placeholder() ;?>" alt="">
	                </div>

                </div>
            </form>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>

