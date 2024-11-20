<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
    <!-- Coding With Nick -->
    <title>Login Form</title>
</head>

<body>
<?php require 'nav.php' ?>
	<br>
    <div class="login-box">
      <h1>Login</h1>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Username</label>
        <input type="text" name="username" />
        <label>Password</label>
        <input type="password" name="password" />
        <button type="submit" name="login">Login</button>
      <closeform></closeform></form>
    </div>
    <p class="para-2">
      Not have an account? <a href="signup.php">Sign Up Here</a>
    </p>
    <?php
			include 'connect.php';
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				if(isset($_POST['login'])){
					$username=$_POST['username'];
					$password=$_POST['password'];

					if($username==NULL){
						echo "<script>alert('Enter Username')</script>";
					}
					else if($password==NULL){
						echo "<script>alert('Enter Password')</script>";
					}
					else{
						$sql="SELECT * FROM user
						where Username='$username' AND Password='$password' ";
						$result=mysqli_query($conn,$sql);
						$num=mysqli_num_rows($result);
						if($num==1){
							$_SESSION['username']=$username;
							$_SESSION['loggedin']=true;
						$p = $_SERVER['PHP_SELF'];
						echo "<script> location.replace('profile.php'); </script>";
						}
						else{
							echo "<script>alert('User not found, Please register')</script>";
						}
					}
				}
			}
		?>

</body>

</html>