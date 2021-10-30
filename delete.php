<?php include 'config.php';

    $id = $_GET['id'];
    $query = "DELETE FROM product WHERE p_id = $id";
    $result = mysqli_query($con, $query);

    header('location: showdata.php');
?>