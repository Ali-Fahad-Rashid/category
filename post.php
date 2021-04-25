<?php include "header.php"; ?>
<br></br>
<?php if(isset($_GET['p'])){
$id=$_GET['p'];
}?>
<div class="container">
<div class="row"> 
<div class="col-7"> 
<?php
$query = "SELECT * FROM posts WHERE post_id = '$id' ORDER BY post_id DESC";
        $select_posts = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc($select_posts)){
        $post_id            = $row['post_id'];
        $post_title         = $row['post_title'];
        $post_status        = $row['post_status'];
        $post_image         = $row['post_image'];
        $post_content       = $row['post_content'];
        $post_tags          = $row['post_tags'];
        $post_date          = $row['post_date']; ?>
<br></br>
<div class="card text-white bg-dark border-primary" >
<div class="card-header">
<?php echo $post_title ; ?>
  </div>
  <img src="images/<?php echo $post_image ; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text"><?php echo $post_content ; ?></p>
     </div> 
    <div class="card-footer">
     <small> <?php echo $post_date ; ?> </small>
  </div>
</div>
<?php } ?>
</div>
<div class="col-5"> <br></br>
<div class="card text-white bg-danger mb-3 border-primary">
<div class="card-header">
    Featured
  </div>
  <img src="images/28.jpg" class="card-img-top" alt="...">
 
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>
</div>
</br><br></br></br><br></br>



<div class="row">
<div class="col-7">
<form method="post">
<h2 class="text-success m-2">Right A Comment</h2></br>
<input type="text" value="" name="name" placeholder="Name" class="form-control m-2" required>
<input type="email" value="" name="email" placeholder="Email" class="form-control m-2" required>
<textarea name="comment" class="form-control m-2" id="" cols="30" rows="10"></textarea>
<input type="submit" value="Send" name="submit" class="form-control m-2 btn btn-primary">
</form>

<?php if(isset($_POST['submit'])){
$name=mysqli_real_escape_string($connection ,trim($_POST['name']));
$email=mysqli_real_escape_string($connection ,trim($_POST['email']));
$comment=mysqli_real_escape_string($connection ,trim($_POST['comment']));

$query="INSERT INTO comments (comment_user,comment_date,comment_content,comment_status,comment_post_id,comment_email)
 VALUES('$name',now(),'$comment','unapprove','$id','$email')";
$result=mysqli_query($connection,$query);
if(!$result){
die("query failed . " . mysqli_error($connection));
} 


}?>
</div></div>
<div class="row"> 
<div class="col-6">
<?php 
$query = "SELECT * FROM comments WHERE comment_post_id = $id AND comment_status = 'approve' ORDER BY comment_id DESC";
        $select_posts = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc($select_posts)){
        $comment_id             = $row['comment_id'];
        $comment_user         = $row['comment_user'];
        $comment_date        = $row['comment_date'];
        $comment_email        = $row['comment_email'];

        $comment_content         = $row['comment_content']; ?>

</br><br></br></br><br></br>
<div class="media">
  <img width="50" src="images/4.jpg" class="mr-3" alt="">
  <div class="media-body">
    <h5 class="mt-0"><?php echo $comment_user; ?></h5>
    <p><?php echo $comment_content; ?></p>
    <small><?php echo $comment_date; ?></small>
  </div>
</div>
<?php } ?>

</div></div>

</div></div>
<br></br><br></br><br></br>
<?php include "footer.php"; ?>
