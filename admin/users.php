<?php include "nav.php"; ?>
<?php include "fun.php"; ?>

<div class="container">
<h1 class="m-4">Welcome To Posts</h1>
<table class="table table-striped table-dark">
                        <thead><tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                       
                        <th>Admin</th>
                        <th>User</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </tr></thead><tbody>
                        <?php 
        $query = "SELECT * FROM users ORDER BY user_id DESC";
        $select_posts = mysqli_query($connection,$query);  
        while($row = mysqli_fetch_assoc($select_posts)){
        $user_id              = $row['user_id'];
        $user_name	         = $row['user_name'];
        $user_email        = $row['user_email'];
        $user_role         = $row['user_role'];
        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$user_name</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_role </td>";

        echo "<td><a class='text-light' href='users.php?ap=$user_id'>Admin</a></td>";
        echo "<td><a class='text-light' href='users.php?unap=$user_id'>User</a></td>";


        echo "<td><a class='text-light' href='edit_user.php?edit=$user_id'>Edit</a></td>";
        echo "<td><a class='text-light' href='users.php?del=$user_id'>Delete</a></td>";
        echo "</tr>";}?>
        </tbody></table></div></div>

<?php
if(isset($_GET['del'])){
$del=escape($_GET['del']);
$query="DELETE FROM users WHERE user_id = '$del'";
$select_posts = mysqli_query($connection,$query);  
header("location: users.php");
}

if(isset($_GET['ap'])){
    $ap=escape($_GET['ap']);
    $query="UPDATE users SET user_role = 'admin' WHERE user_id = '$ap'";
    $select_posts = mysqli_query($connection,$query);  
    header("location: users.php");
}

    if(isset($_GET['unap'])){
        $unap=escape($_GET['unap']);
        $query="UPDATE users SET user_role = 'user' WHERE user_id = '$unap'";
        $select_posts = mysqli_query($connection,$query);  
        header("location: users.php");}

?>
</br></br>
        <?php include "../footer.php";?>


        <?php if($_SESSION['user_role']!='admin'){ 
               header("location: index.php");

        }
