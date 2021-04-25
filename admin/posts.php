<?php include "nav.php"; ?>
<div class="container">
<h1 class="m-4">Welcome To Posts</h1>
<table class="table table-striped table-dark">
                        <thead><tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Tags</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </tr></thead><tbody>
                        <?php 
        $query = "SELECT * FROM posts ORDER BY post_id DESC";
        $select_posts = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc($select_posts)){
        $post_id            = $row['post_id'];
        $post_title         = $row['post_title'];
        $post_status        = $row['post_status'];
        $post_image         = $row['post_image'];
        $post_content       = $row['post_content'];
        $post_tags          = $row['post_tags'];
        $post_date          = $row['post_date'];
        echo "<tr>";
        echo "<td>$post_id</td>";
        echo "<td>$post_title</td>";
        echo "<td>$post_content</td>";
        echo "<td>$post_status</td>";
        echo "<td><img width='100' src='../images/$post_image'></td>";
        echo "<td>$post_tags</td>";
        echo "<td>$post_date </td>";
        echo "<td><a class='text-light' href='edit_post.php?edit=$post_id'>Edit</a></td>";
        echo "<td><a class='text-light' href='posts.php?del=$post_id'>Delete</a></td>";
        echo "</tr>";}?>
        </tbody></table></div></div>

<?php  if(isset($_GET['del'])){

$del=escape($_GET['del']);
$query="DELETE FROM posts WHERE post_id=$del";
$select_posts = mysqli_query($connection,$query);  
header("location: posts.php");
}
?>
</br></br>
        <?php include "../footer.php";?>