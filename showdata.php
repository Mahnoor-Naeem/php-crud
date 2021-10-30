<?php include 'header.php'?>
<?php include 'config.php'?>
<?php
    $query = "SELECT * FROM product ORDER BY p_id DESC";
    $result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($result as $val) { ?>
    <tr class="table-active">
      <th scope="row"><?php echo $val['p_id'];?></th>
      <td><?php echo $val['p_name'];?></td>
      <td><?php echo $val['p_price'];?></td>
      <td>
      <a href="edit.php?id=<?php echo $val['p_id'];?>"><button type="button" class="btn btn-primary">Edit</button></a>
      <a href="delete.php?id=<?php echo $val['p_id'];?>"><button type="button" class="btn btn-warning">Delete</button></a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
</body>
</html>
<?php include 'footer.php'?>