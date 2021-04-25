<?php include "nav.php"; ?>
<?php include "fun.php"; ?>
<div class="container">
<div class="col-5 offset-1">
<?php
if(isset($_GET['edit'])) {
$id=$_GET['edit'];}

if(isset($_POST['EDIT'])) {
$post_title        = escape($_POST['title']);
$post_status       = escape($_POST['post_status']);
$post_image        = escape($_FILES['file']['name']);
$post_image_temp   = escape($_FILES['file']['tmp_name']);
$post_tags         = escape($_POST['post_tags']);
$post_content      = escape($_POST['post_content']);
if(empty($post_image)){
    $query = "SELECT * FROM posts WHERE post_id = '$id'";
    $select_posts = mysqli_query($connection,$query);  
    while($row = mysqli_fetch_assoc($select_posts)){
        $post_image         = $row['post_image'];

}}
move_uploaded_file($post_image_temp, "../images/$post_image" );
$query = "UPDATE posts SET post_title = '$post_title', post_date = now(), post_image = '$post_image',
post_content = '$post_content', post_tags = '$post_tags', post_status = '$post_status' WHERE post_id = '$id'";
$create_post_query = mysqli_query($connection, $query);    
confirmQuery($create_post_query);
}


$query = "SELECT * FROM posts WHERE post_id = '$id' ORDER BY post_id DESC";
$select_posts = mysqli_query($connection,$query);  
while($row = mysqli_fetch_assoc($select_posts)){
$post_id            = $row['post_id'];
$post_title         = $row['post_title'];
$post_status        = $row['post_status'];
$post_image         = $row['post_image'];
$post_content       = $row['post_content'];
$post_tags          = $row['post_tags'];
$post_date          = $row['post_date'];}
?>


<form method="post" enctype="multipart/form-data">    
<label>Title</label></br>
<input type="text" class="form-control" name="title" value="<?php echo $post_title ; ?>" required> </br>
<label>Status</label></br>
<select class=custom-select name="post_status">
<option value=<?php echo $post_status ;?>><?php echo ucfirst($post_status) ;?></option>
<?php if($post_status=='published'){?>
<option value="draft">Draft</option>
<?php } else { ?>
<option value="published">Published</option>

<?php }  ?>
</select></br></br>
<label>Tags</label></br>
<input type="text" class="form-control" name="post_tags"  value="<?php echo $post_tags ; ?>"></br>
<label>Image</label></br>
<img width='100' src='../images/<?php echo $post_image ;?>'>
<input type="file" name="file"></br></br>
<label>Content</label></br>
<textarea class="form-control" name="post_content" cols="10" rows="10"><?php echo $post_content  ; ?></textarea></br>
<input class="btn btn-primary" type="submit" name="EDIT" value="EDIT"></br>
</form></br>
</div></div></br></div>
<?php include "../footer.php";?>

