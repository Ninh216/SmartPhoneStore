<?php
include("includes/database.php");
include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký - SmartPhone Store</title>
  <!-- favicon -->
  <link rel="icon" href="images/smartphone.png">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <!-- bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- css -->
  <link rel="stylesheet" href="css/signup.css">
</head>
<body>
</body>
</body>
</html>

<?php
if(isset($_POST['register'])){
  $customer_name = $_POST['customer_name'];
  $customer_sex = $_POST['customer_sex'];
  $customer_email = $_POST['customer_email'];
  $customer_phone = $_POST['customer_phone'];
  $customer_address = $_POST['customer_address'];
  $customer_user_name = $_POST['customer_user_name'];
  $customer_password = $_POST['customer_password'];
  $customer_repw = $_POST['customer_repw'];
  $account_status = "Active";
  $customer_img = $_FILES['customer_img']['name'];
  $customer_img_tmp = $_FILES['customer_img']['tmp_name'];
  move_uploaded_file($customer_img_tmp, "customer/customer_img/$customer_img");
  
  $insert_customer = "insert into customer
  (customer_name, customer_sex, customer_email, customer_phone, customer_address, customer_user_name, customer_password, customer_img, account_status) values
  ('$customer_name', '$customer_sex', '$customer_email', '$customer_phone', '$customer_address', '$customer_user_name', '$customer_password', '$customer_img', '$account_status')";
  $run_customer = mysqli_query($conn, $insert_customer);

  if($run_customer){
    echo "<script>alert('Đăng ký tài khoản thành công')</script>";
    echo "<script>window.open('signin.php', '_self')</script>";
  }
}
?>
