
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


</head>
<body>
<form action="" method="get">
<table class="table table-hover">

    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Mail</th>
        <th>Delete</th>
        <th>Disable</th>

    </tr>
    <?php
include ('config/config.php');
$firstQuery="select * from `user` where userTypeId=2";
$result=mysqli_query($con,$firstQuery);
while($row=mysqli_fetch_array($result)){
    ?>
    <tr><td><?php echo $row[0];?></td>
        <td><?php echo $row[1];?></td>
        <td><?php echo $row[2];?></td>

        <td><a href="addDeleteUser.php?userId=<?php echo $row[0];?>&delete=yes" name="delete">Delete</a></td>
        <?php
            if($row[4]==0){
                echo '<td><a href="addDeleteUser.php?userId=<?php echo $row[0];?>&disable=yes" name="disable">Disable/block</a> </td>';
 }
 else{
                echo '<td><p>Blocked</p></td>';
 }
 ?>
        <?php } ?>
</table>
</form>
</body>
</html>
<?php
include ('config/config.php');

if(isset($_GET["delete"])){
    $deleteQuery = "delete from user where userId = ".$_GET['userId'];
    mysqli_query($con, $deleteQuery);

}
if(isset($_GET["disable"])){

    $disableQuery ="UPDATE `user` SET disabled=1 WHERE userId=".$_GET['userId'];
    mysqli_query($con, $disableQuery);

}


?>