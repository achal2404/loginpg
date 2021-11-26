<?php
include'config.php ' ;
error_reporting(0);
if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=md5($_POST['password']);
  $cpassword=md5($_POST['cpassword']);

  if($password==$cpassword){
    $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result=mysqli_query($conn,$sql);
    if (!$result -> num_rows > 0) {
      $sql="INSERT INTO users(username,email,password)VALUES('$username','$email','$password')";
      $result=mysqli_query($conn,$sql);
      if($result){
        echo "<script>alert('Wow!!User Registration Is Completed.')</script>";
        $username = "";
        $email = "";
        $_post['password'] = "";
        $_post['cpassword'] = "";
      }else {
        echo "<script>alert('Woops!!Something went wrong.')</script>";
      }
    }else {
      echo "<script>alert('Woops!!Email Already Exist.')</script>";
    }
    }
  else{
    echo "<script>alert('Password Not Matched.')</script>";
  }
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins',sans-serif;
    }
    body{
      width: 100%;
      min-height: 100vh;
      background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(img15.jpg);
      background-position: center;
      background-size:cover;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .container{
      width: 400px;
      min-height: 400px;
      background: #777b7e;
      border-radius: 5px;
      box-shadow: 0 0 5px rgba(0,0,0,0.3);
      padding: 40px 30px;
      opacity: 0.8;
      margin-left: 550px;
    }
    .container .login-text{
      color: #111;
      font-weight: 500;
      font-size: 1.1rem;
      text-align: center;
      margin-bottom: 20px;
      display: block;
      text-transform: capitalize;
    }
    .container .login-email .input-group{
      width: 100%;
      height: 50px;
      margin-bottom: 35px;
      color: #222021;
    }
    .container .login-email .input-group input::placeholder{
      color: #222021;
    }
    .container .login-email .input-group input{
      width: 100%;
      height: 100%;
      border: 2px solid #222021;
      padding: 15px 20px;
      font-size: 1rem;
      border-radius: 30px;
      background: transparent;
      outline: none;
      transition: 0.3s;
    }
    .container .login-email .input-group input:focus, .container .login-email .input-group input:valid{
      border-color: #222021;
    }
    .container .login-email .input-group .btn{
      display: block;
      width: 100%;
      padding: 15px 20px;
      text-align: center;
      border: none;
      background: #48494b;
      outline: none;
      border-radius: 30px;
      font-size: 1.2rem;
      color: #fff;
      cursor: pointer;
      transition: 0.3s;
    }
    .container .login-email .input-group .btn:hover{
      transform: translateY(-5px);
      background: #48494b;
    }
    .login-register-text{
      color: #111;
      font-weight: 600;
    }
    .login-register-text{}


    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/foot-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register Form</title>
  </head>
  <body>
    <div class="container">
      <form action="" method="post" class="login-email">
        <p class="login-text" style="font-size:2rem; font-weight:800;">Register</p>
        <div class="input-group">
          <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
        </div>
        <div class="input-group">
          <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
        </div>
        <div class="input-group">
          <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
        </div>
        <div class="input-group">
          <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                </div>
        <div class="input-group">
          <button name="submit" class="btn">Register</button>
        </div>
        <p class="login-register-text">Already have an account? <a href='index.php'>Login Here</a></p>
      </form>

    </div>
  </body>
</html>
