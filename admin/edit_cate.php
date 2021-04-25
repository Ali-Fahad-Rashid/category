<?php include "nav.php"; ?>
<?php include "fun.php"; ?>
<div class="container">
<div class="col-5 offset-1">
<?php
if(isset($_GET['edit'])) {
$id=$_GET['edit'];}

if(isset($_POST['EDIT'])) {
$cat_title        = escape($_POST['title']);
$cat_status       = escape($_POST['cat_status']);
$cat_image        = escape($_FILES['file']['name']);
$cat_image_temp   = escape($_FILES['file']['tmp_name']);
$cat_content      = escape($_POST['cat_content']);
if(empty($cat_image)){
    $query = "SELECT * FROM cate WHERE cat_id = '$id'";
    $select_cats = mysqli_query($connection,$query);  
    while($row = mysqli_fetch_assoc($select_cats)){
        $cat_image         = $row['cat_image'];

}}
move_uploaded_file($cat_image_temp, "../images/$cat_image" );
$query = "UPDATE cate SET cat_title = '$cat_title', cat_date = now(), cat_image = '$cat_image',
cat_content = '$cat_content',  cat_status = '$cat_status' WHERE cat_id = '$id'";
$create_cat_query = mysqli_query($connection, $query);    
confirmQuery($create_cat_query);
}


$query = "SELECT * FROM cate WHERE cat_id = '$id' ORDER BY cat_id DESC";
$select_cats = mysqli_query($connection,$query);  
while($row = mysqli_fetch_assoc($select_cats)){
$cat_id            = $row['cat_id'];
$cat_title         = $row['cat_title'];
$cat_status        = $row['cat_status'];
$cat_image         = $row['cat_image'];
$cat_content       = $row['cat_content'];
$cat_date          = $row['cat_date'];}
?>


<form method="post" enctype="multipart/form-data">    
<label>Title</label></br>
<input type="text" class="form-control" name="title" value="<?php echo $cat_title ; ?>" required> </br>
<label>Status</label></br>
<select class=custom-select name="cat_status">
<option value=<?php echo $cat_status ;?>><?php echo ucfirst($cat_status) ;?></option>
<?php if($cat_status=='published'){?>
<option value="draft">Draft</option>
<?php } else { ?>
<option value="published">Published</option>

<?php }  ?>
</select></br></br>
<label>Image</label></br>
<img width='100' src='../images/<?php echo $cat_image ;?>'>
<input type="file" name="file"></br></br>
<label>Content</label></br>
<textarea class="form-control" name="cat_content" cols="10" rows="10"><?php echo $cat_content  ; ?></textarea></br>
<input class="btn btn-primary" type="submit" name="EDIT" value="EDIT"></br>
</form></br>
</div></div></br></div>
<?php include "../footer.php";?>

