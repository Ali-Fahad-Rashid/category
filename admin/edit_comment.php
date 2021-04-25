<?php include "nav.php"; ?>
<?php include "fun.php"; ?>
<div class="container">
<div class="col-5 offset-1">
<?php
if(isset($_GET['edit'])) {
$id=$_GET['edit'];}
if(isset($_POST['EDIT'])) {
$user         = escape($_POST['user']);
$email        = escape($_POST['email']);
$content      = escape($_POST['content']);
$query = "UPDATE comments SET comment_user = '$user', comment_date = now(), comment_email = '$email',
comment_content = '$content' WHERE comment_id = '$id'";
$create_post_query = mysqli_query($connection, $query);    
confirmQuery($create_post_query);
header("location: comments.php");
}
$query = "SELECT * FROM comments WHERE comment_id = '$id' ORDER BY comment_id DESC";
$select_posts = mysqli_query($connection,$query);  
while($row = mysqli_fetch_assoc($select_posts)){
$comment_id             = $row['comment_id'];
$comment_user         = $row['comment_user'];
$comment_email        = $row['comment_email'];
$comment_date        = $row['comment_date'];
$comment_content         = $row['comment_content'];
$comment_status	       = $row['comment_status'];
$comment_post_id	       = $row['comment_post_id'];}
?>
<form method="post" enctype="multipart/form-data">    
<label>User</label></br>
<input type="text" class="form-control" name="user" value="<?php echo $comment_user ; ?>" required> </br>
<label>Email</label></br>
<input type="text" class="form-control" name="email"  value="<?php echo $comment_email  ; ?>"></br>
<label>Content</label></br>
<textarea class="form-control" name="content" cols="10" rows="10"><?php echo $comment_content  ; ?></textarea></br>
<input class="btn btn-primary" type="submit" name="EDIT" value="EDIT"></br>
</form></br>
</div></div></br></div>
<?php include "../footer.php";?>