<?php include "nav.php"; ?>
<?php include "fun.php"; ?>
<div class="container">
<div class="col-5 offset-1">
<?php
if(isset($_GET['edit'])) {
$id=$_GET['edit'];}
if(isset($_POST['EDIT'])) {
$user          = escape($_POST['user']);
$email         = escape($_POST['email']);
$pass          = escape($_POST['pass']);
$pass2         = escape($_POST['pass2']);

$error=['user'=>'','pass'=>'','email'=>''];

if(strlen($user)<3){

    $error['user']='username must be longer';
}

if($pass!=$pass2){
    $error['pass']='password are not the same';
}


$query="SELECT * FROM users WHERE user_name='$user'";
$result=mysqli_query($connection,$query);


if(!$result){
die("query failed . " . mysqli_error($connection));
} 
while($row = mysqli_fetch_assoc($result)){
    $user_id              = $row['user_id'];
    $user_name            = $row['user_name'];
    $user_password        = $row['user_password'];
    $user_email           = $row['user_email'];
    }
$count=mysqli_num_rows($result);
if(!empty($count) && $user_id!=$id){
    $error['user']='username exist';
}

$query="SELECT * FROM users WHERE user_email='$email'";
$result=mysqli_query($connection,$query);
if(!$result){
die("query failed . " . mysqli_error($connection));
} 
$count=mysqli_num_rows($result);
if(!empty($count) && $user_id!=$id){
    $error['email']='email exist';
}

if(array_filter($error)){}
else {

$query = "UPDATE users SET user_name = '$user', user_password = '$pass', user_email = '$email' WHERE user_id = '$id'";
$create_post_query = mysqli_query($connection, $query);    
confirmQuery($create_post_query);
header("location: users.php");
}}
$query = "SELECT * FROM users WHERE user_id = '$id' ORDER BY user_id DESC";
$select_posts = mysqli_query($connection,$query);  
while($row = mysqli_fetch_assoc($select_posts)){
$user_id              = $row['user_id'];
$user_name            = $row['user_name'];
$user_password        = $row['user_password'];
$user_email           = $row['user_email'];
}
?>
<form method="post" enctype="multipart/form-data">    
<label>User</label></br>
<input type="text" class="form-control" name="user" value="<?php echo $user_name ; ?>" required> </br>
<p class="text-danger"> <?php echo isset($error['user']) ? $error['user'] : '';?> </p>

<label>Email</label></br>
<input type="text" class="form-control" name="email"  value="<?php echo $user_email  ; ?>"></br>
<p class="text-danger"> <?php echo isset($error['email']) ? $error['email'] : '';?> </p>

<label>Password</label></br>
<input class="form-control" type="password" name="pass" value="<?php echo $user_password;?>"></br>
<p class="text-danger"> <?php echo isset($error['pass']) ? $error['pass'] : '';?> </p>

<label>Confirm  Password</label></br>
<input class="form-control" type="password" name="pass2" value="<?php echo $user_password;?>"></br>

<input class="btn btn-primary" type="submit" name="EDIT" value="EDIT"></br>
</form></br>
</div></div></br></div>
<?php include "../footer.php";?>