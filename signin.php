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
  <title>Đăng nhập - SmartPhone Store</title>
  <!-- favicon -->
  <link rel="icon" href="images/smartphone.png">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <!-- bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- css -->
  <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
  *{
    box-sizing: border-box;
  }
  body {
    background: #f6f5f7;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    font-family: 'Montserrat', sans-serif;
    height: 100vh;
    margin: 20px 0 50px;
  }
  h1 {
    font-weight: bold;
    margin: 0;
  }
  h2 {
    text-align: center;
  }
  p {
    font-size: 14px;
    font-weight: 100;
    line-height: 20px;
    letter-spacing: 0.5px;
    margin: 20px 0 30px;
  }
  span {
    font-size: 12px;
  }
  a {
    color: #333;
    font-size: 14px;
    text-decoration: none;
    margin: 15px 0;
  }
  button {
    border-radius: 20px;
    border: 1px solid #FF4B2B;
    background-color: #FF4B2B;
    color: #FFFFFF;
    font-size: 12px;
    font-weight: bold;
    padding: 12px 45px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
  }
  button:active {
    transform: scale(0.95);
  }
  button:focus {
    outline: none;
  }
  button.ghost {
    background-color: transparent;
    border-color: #FFFFFF;
  }
  .nut {
    border-radius: 20px;
    border: 1px solid #FF4B2B;
    background-color: #FF4B2B;
    color: #FFFFFF;
    font-size: 12px;
    font-weight: bold;
    padding: 12px 45px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
  }
  .nut:active {
    transform: scale(0.95);
  }
  .nut:focus {
    outline: none;
  }
  .nut.ghost {
    background-color: transparent;
    border-color: #FFFFFF;
  }
  form {
    background-color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 50px;
    height: 100%;
    text-align: center;
  }
  input {
    background-color: #eee;
    border: none;
    padding: 12px 15px;
    margin: 8px 0;
    width: 100%;
  }
  .container {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
        0 10px 10px rgba(0, 0, 0, 0.22);
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    height: 700px;
    min-height: 480px;
  }
  .form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
  }
  .sign-in-container {
    left: 0;
    width: 50%;
    z-index: 2;
  }
  .container.right-panel-active .sign-in-container {
    transform: translateX(100%);
  }
  .sign-up-container {
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
  }
  .container.right-panel-active .sign-up-container {
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: show 0.6s;
  }
  @keyframes show {

    0%,
    49.99% {
        opacity: 0;
        z-index: 1;
    }

    50%,
    100% {
        opacity: 1;
        z-index: 5;
    }
  }
  .overlay-container {
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: transform 0.6s ease-in-out;
    z-index: 100;
  }
  .container.right-panel-active .overlay-container {
    transform: translateX(-100%);
  }
.overlay {
    background: #FF416C;
    background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
    background: linear-gradient(to right, #FF4B2B, #FF416C);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 0 0;
    color: #FFFFFF;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
}
.container.right-panel-active .overlay {
    transform: translateX(50%);
}
.overlay-panel {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    text-align: center;
    top: 0;
    height: 100%;
    width: 50%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
  }
  .overlay-left {
    transform: translateX(-20%);
  }
  .container.right-panel-active .overlay-left {
    transform: translateX(0);
  }
  .overlay-right {
    right: 0;
    transform: translateX(0);
  }
  .container.right-panel-active .overlay-right {
    transform: translateX(20%);
  }
  .social-container {
    margin: 20px 0;
  }
  .social-container a {
    border: 1px solid #DDDDDD;
    border-radius: 50%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 5px;
    height: 40px;
    width: 40px;
  }
  footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
  }
  footer p {
    margin: 10px 0;
  }
  footer i {
    color: red;
  }
  footer a {
    color: #3c97bf;
    text-decoration: none;
  }
  </style>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
        <form action="signup.php" method="post" enctype="multipart/form-data">
          <h1>Đăng ký</h1> 
            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Họ tên">
            <select class="form-select  " name="customer_sex" aria-label="Giới tính">
              <option disabled selected>Chọn giới tính</option>
              <option value="Nam">Nam</option>
              <option value="Nữ">Nữ</option>
            </select>               
          <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Email">
            <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Số điện thoại">
            <input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="Địa chỉ">
            <input type="text" class="form-control" id="customer_user_name" name="customer_user_name" placeholder="Tên tài khoản">
            <input type="password" class="form-control" id="customer_password" name="customer_password" placeholder="Mật khẩu">
            <input type="password" class="form-control" id="customer_repassword" name="customer_repassword" placeholder="Nhập lại mật khẩu">

          <div class="form-floating mb-3">
            <input type="file" class="form-control" id="customer_img" name="customer_img" placeholder="name@example.com">
            <label for="customer_img">Ảnh đại diện</label>
          </div>
                <button name ="register">Đăng ký</button>      
            </form>
        </div>

        
        <div class="form-container sign-in-container">
        <form action="" method="post" enctype="multipart/form-data">
                <h1>Đăng nhập</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>hoặc sử dụng tài khoản của bạn</span>
                <input type="text" id="customer_email_user_name" name="customer_email_user_name" placeholder="Username/Email" />
                <input type="password" id="customer_password" name="customer_password" placeholder="Mật khẩu" />
                <a href="#">Quên mật khẩu?</a>
                <button name="login">Đăng nhập</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Chào mừng trở lại!</h1>
                    <p>Để duy trì kết nối với chúng tôi vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                    <button class="ghost" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Chào bạn!</h1>
                    <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
                    <button class="ghost" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>
</body>
</body>
</html>

<?php
if(isset($_POST['login'])){
  $customer_email_user_name = $_POST['customer_email_user_name'];
  $customer_password = $_POST['customer_password'];
  $select_customer = "select * from customer where (customer_email = '$customer_email_user_name' or customer_user_name = '$customer_email_user_name') and customer_password='$customer_password'";
  $run_customer = mysqli_query($conn, $select_customer);
  $check_customer = mysqli_num_rows($run_customer);
  if($check_customer == 0){
    echo "<script>alert('Tên tài khoản hoặc mật khẩu không đúng!')</script>";
    exit();
  }
  else{
    $row_customer = mysqli_fetch_array($run_customer);
    $account_status = $row_customer['account_status'];
    if($account_status=="Locked"){
      echo "<script>alert('Tài khoản đã bị khóa do vi phạm chính sách của cửa hàng')</script>";
      exit();
    }
    else{
      $customer_id = $row_customer['customer_id'];
      $customer_name = $row_customer['customer_name'];
      $_SESSION['customer_name'] = $customer_name;
      $_SESSION['customer_id'] = $customer_id;
      echo "<script>alert('Đăng nhập thành công')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    }
  }
}
?>
<script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add('right-panel-active');
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove('right-panel-active');
        });
    </script>