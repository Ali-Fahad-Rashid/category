<?php include "nav.php"; ?>
<?php include "fun.php"; ?>

<div class="container">
<h1 class="m-4">Welcome To Posts</h1>
<table class="table table-striped table-dark">
                        <thead><tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Email</th>
                        <th>Approve</th>
                        <th>Unapprove</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </tr></thead><tbody>
                        <?php 
        $query = "SELECT * FROM comments ORDER BY comment_id DESC";
        $select_posts = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc($select_posts)){
        $comment_id             = $row['comment_id'];
        $comment_user         = $row['comment_user'];
        $comment_date        = $row['comment_date'];
        $comment_content         = $row['comment_content'];
        $comment_status	       = $row['comment_status'];
        $comment_post_id	       = $row['comment_post_id'];
        $comment_email        = $row['comment_email'];

        echo "<tr>";
        echo "<td>$comment_id</td>";
        echo "<td>$comment_user</td>";
        echo "<td><a href='/new/post.php?p=$comment_post_id'>$comment_content</a></td>";
        echo "<td>$comment_status</td>";
        echo "<td>$comment_date </td>";
        echo "<td>$comment_email </td>";

        echo "<td><a class='text-light' href='comments.php?app=$comment_id'>Approve</a></td>";
        echo "<td><a class='text-light' href='comments.php?unapp=$comment_id'>Unapprove</a></td>";


        echo "<td><a class='text-light' href='edit_comment.php?edit=$comment_id'>Edit</a></td>";
        echo "<td><a class='text-light' href='comments.php?del=$comment_id'>Delete</a></td>";
        echo "</tr>";}?>
        </tbody></table></div></div>

<?php
if(isset($_GET['del'])){
$del=escape($_GET['del']);
$query="DELETE FROM comments WHERE comment_id=$del";
$select_posts = mysqli_query($connection,$query);  
header("location: comments.php");}

if(isset($_GET['app'])){
    $app=escape($_GET['app']);
    $query="UPDATE comments set comment_status = 'approve' WHERE comment_id='$app'";
    $select_posts = mysqli_query($connection,$query);  
    header("location: comments.php");}

    if(isset($_GET['unapp'])){
        $unapp=escape($_GET['unapp']);
        $query="UPDATE comments set comment_status = 'unapprove' WHERE comment_id='$unapp'";
        $select_posts = mysqli_query($connection,$query);  
        header("location: comments.php");}

?>
</br></br>
        <?php include "../footer.php";?>