<?php
require_once("includes/header.php");

if($session->is_signed_in()){
    redirect("index.php");
}

if(isset($_POST['submit'])){
   $username = trim($_POST['username']);
   $password = trim($_POST['password']);

   /**methode check of de user bestaat*/
   $user_found = User::verify_user($username,$password);

   if($user_found){
       $session->login($user_found);
       redirect("index.php");
   }else{
       $the_message = "PASSWORD OR USERNAME NOT CORRECT, CHEATING HUH!";
   }

}else{
    $username = "";
    $password = "";
}



?>
<div class="container">
<div class="row">
    <div class="col-md-6 offset-md-3">
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <input type="submit" value="submit" class="btn btn-primary" name="submit">
            </div>
        </form>
    </div>
</div>
</div>
