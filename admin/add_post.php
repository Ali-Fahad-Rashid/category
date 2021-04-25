<?php include "nav.php"; ?>
<?php include "fun.php"; ?>
<div class="container">
<div class="col-5 offset-1">
<?php
if(isset($_POST['create'])) {
$post_title        = escape($_POST['title']);
$post_status       = escape($_POST['post_status']);
$post_image        = escape($_FILES['file']['name']);
$post_image_temp   = escape($_FILES['file']['tmp_name']);
$post_tags         = escape($_POST['post_tags']);
$post_content      = escape($_POST['post_content']);
move_uploaded_file($post_image_temp, "../images/$post_image" );
$query = "INSERT INTO posts(post_title, post_date, post_image, post_content, post_tags, post_status)
VALUES('$post_title', now(), '$post_image', '$post_content', '$post_tags', '$post_status')";      
$create_post_query = mysqli_query($connection, $query);    
confirmQuery($create_post_query);
$the_post_id = mysqli_insert_id($connection);
}?>     

<form method="post" enctype="multipart/form-data">    
<label>Title</label></br>
<input type="text" class="form-control" name="title" required> </br>
<label>Status</label></br>
<select class=custom-select name="post_status">
<option value="published">Published</option>
<option value="draft">Draft</option>
</select></br></br>
<label>Tags</label></br>
<input type="text" class="form-control" name="post_tags"></br>
<label>Image</label></br>
<input type="file" name="file"></br></br>
<label>Content</label></br>
<textarea class="form-control" name="post_content" cols="10" rows="10"></textarea></br>
<input class="btn btn-primary" type="submit" name="create" value="Publish Post"></br>
</form></br>
</div></div></br></div>
<?php include "../footer.php";?>

