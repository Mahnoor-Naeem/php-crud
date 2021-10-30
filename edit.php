<?php include 'header.php'?>
<!-- Where we work with db add this file -->
<?php include 'config.php'?>

<?php
$id = $_GET['id'];

    $query = "SELECT * FROM product WHERE p_id = '$id'";
    $result = mysqli_query($con, $query);

    foreach($result as $val) { 
        $valID = $val['p_id'];
        $valName = $val['p_name'];
        $valPrice = $val['p_price'];
        $valQuant = $val['p_quan'];
    }

?>

<?php
if(isset($_POST['edit_btn'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_quant = $_POST['p_quant'];

//    $query = "INSERT INTO product(p_name, p_price, p_quan) VALUES('$p_name', '$p_price', '$p_quant')";
   $query = "UPDATE product SET p_name = '$p_name', p_price = '$p_price', p_quan = '$p_quant' WHERE p_id = '$id'";
   $result = mysqli_query($con, $query);

   if($result){
      $success = "Updated";
      header('location: showdata.php');
   }else{
      $success = "Can not Update";
   }
}

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
    <div class="row">
        <div class="col-10 mx-auto">

        <?php
         if(isset($success)){ ?>
            <div class="alert alert-dismissible alert-success mt-5">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <strong><?php echo $success ?></strong></div>
          <?php
         } 
        ?>
        <form action = "" method = "POST">
  <fieldset>
    <div class="form-group">

      <input type="hidden" class="form-control" name = "p_id" value = "<?php echo $valID ?>" placeholder="Product Name">

      <label for="" class="form-label mt-4">Product Name</label>
      <input type="text" class="form-control" name = "p_name" value = "<?php echo $valName ?>" placeholder="Product Name">
    </div>
    <div class="form-group">
      <label for="" class="form-label mt-4">Product Price</label>
      <input type="text" class="form-control" name = "p_price" value = "<?php echo $valPrice ?>" placeholder="$">
    </div>
    <div class="form-group">
      <label for="" class="form-label mt-4">Quantity</label>
      <input type="number" class="form-control" name = "p_quant" value = "<?php echo $valQuant ?>" placeholder="Quantity">
    </div>

    <button type="submit" class="btn btn-primary mt-4" name="edit_btn">Update</button>
  </fieldset>
</form>
        </div>
    </div>
</div>
</body>
</html>

<?php include 'footer.php'?>