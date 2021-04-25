<?php include "nav.php"; ?>
<?php include "fun.php"; ?>

<div class="container">
<h1 class="m-4">Welcome To category</h1>
<table class="table table-striped table-dark">
                        <thead><tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Date</th>

                        <th>published</th>
                        <th>draft</th>

                        <th>Edit</th>
                        <th>Delete</th>
                        </tr></thead><tbody>
                        <?php 
        $query = "SELECT * FROM cate ORDER BY cat_id DESC";
        $select_cats = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc($select_cats)){
        $cat_id            = $row['cat_id'];
        $cat_title         = $row['cat_title'];
        $cat_status        = $row['cat_status'];
        $cat_image         = $row['cat_image'];
        $cat_content       = $row['cat_content'];
        $cat_date          = $row['cat_date'];
        echo "<tr>";
        echo "<td>$cat_id</td>";
        echo "<td>$cat_title</td>";
        echo "<td>$cat_content</td>";
        echo "<td>$cat_status</td>";
        echo "<td><img width='100' src='../images/$cat_image'></td>";
        echo "<td>$cat_date </td>";

        echo "<td><a class='text-light' href='cate.php?app=$cat_id'>Published</a></td>";
        echo "<td><a class='text-light' href='cate.php?unapp=$cat_id'>Draft</a></td>";


        echo "<td><a class='text-light' href='edit_cate.php?edit=$cat_id'>Edit</a></td>";
        echo "<td><a class='text-light' href='cate.php?del=$cat_id'>Delete</a></td>";
        echo "</tr>";}?>
        </tbody></table></div></div>

<?php  if(isset($_GET['del'])){

$del=escape($_GET['del']);
$query="DELETE FROM cate WHERE cat_id=$del";
$select_cats = mysqli_query($connection,$query);  
header("location: cate.php");
}


if(isset($_GET['app'])){
    $app=escape($_GET['app']);
    $query="UPDATE cate set cat_status = 'published' WHERE cat_id='$app'";
    $select_posts = mysqli_query($connection,$query);  
    header("location: cate.php");}

    if(isset($_GET['unapp'])){
        $unapp=escape($_GET['unapp']);
        $query="UPDATE cate set cat_status = 'draft' WHERE cat_id='$unapp'";
        $select_posts = mysqli_query($connection,$query);  
        header("location: cate.php");}

?>
</br></br>
        <?php include "../footer.php";?>