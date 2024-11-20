<html lang="en">
  <head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"/>
  </head>
  <body>
  <?php require 'nav.php' ?>
  <br>
  <br>
  <br>
    <div class="signup-box">
      <h1>Sign Up</h1>
      <h4>It's free and only takes a minute</h4>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Full Name</label>
        <input type="text" name="fullname" />
        <label>User Name</label>
        <input type="text" name="username" />
        <label>Email</label>
        <input type="email" name="email" />
        <label>Password</label>
        <input type="password" name="password" />
        <label>Confirm Password</label>
        <input type="password" name="repassword" />
        <button type="submit" name="signup">Sign up</button>
      <closeform></closeform></form>
      <!-- <p>
        By clicking the Sign Up button,you agree to our <br />
        <a href="#">Terms and Condition</a> and <a href="#">Policy Privacy</a>
      </p> -->
    </div>
    <p class="para-2">
      Already have an account? <a href="loginn.php">Login here</a>
    </p>
    <?php
include 'connect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['signup'])){
        $username=$_POST['username'];
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $repassword=$_POST['repassword'];

        if($username==NULL){
            echo "<script>alert('Enter Username')</script>";
            header('location:index.php');
            
        }
        else if($fullname==NULL){
            echo "<script>alert('Enter your name')</script>";
            header('location:index.php');
            
        }
        else if($email==NULL){
            echo "<script>alert('Enter your email')</script>";
            header('location:index.php');
            
        }
        else if($password==NULL){
            echo "<script>alert('Enter your password')</script>";
            header('location:index.php');
            
        }
        else if($repassword==NULL){
            echo "<script>alert('Enter your re-password')</script>";
            header('location:index.php');
            
        }
        else if($password!=$repassword){
            echo "<script>alert('Passwords does not match, Try Again')</script>";
            header('location:index.php');
        }
       
        else{
            $sql="INSERT INTO user(FullName,Username,Email,Password)
        values('$fullname','$username','$email','$password')
        ";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "<script>alert('Account Created, Please Login In')</script>";
            header('location:index.php');
        }
        else{
            echo "<script>alert('Error, Please Register Again')</script>";
            header('location:index.php');
        }
        }

    }
}
?>
  </body>
</html>