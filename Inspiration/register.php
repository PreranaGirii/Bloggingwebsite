<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
    <title>Inspiration</title>
</head>

<body>
<?php require 'nav.php'; ?>
<br>
<div class="container" style="text-align:center;">
		<h3>Register</h3>
		<div class="form-container">
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Fullname:</label>
        <input type="text" name="fullname"><br>
        <label>Username:</label>
        <input type="text" name="username"><br>
        <label>Email:</label>
        <input type="text" name="email"><br>
        <label>Password:</label>
        <input type="password" name="password"><br>
        <label>Repassword:</label>
        <input type="password" name="repassword"><br>
        <button type="submit" name="register">Register</button>
    </form>
</div>
</div>


    
    <!-- Register  -->
		<?php
			include 'connect.php';
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				if(isset($_POST['register'])){
					$username=$_POST['username'];
					$fullname=$_POST['fullname'];
					$email=$_POST['email'];
					$password=$_POST['password'];
					$repassword=$_POST['repassword'];

					if($username==NULL){
						echo "<script>alert('Enter Username')</script>";
						
					}
					else if($fullname==NULL){
						echo "<script>alert('Enter your name')</script>";
						
					}
					else if($email==NULL){
						echo "<script>alert('Enter your email')</script>";
						
					}
					else if($password==NULL){
						echo "<script>alert('Enter your password')</script>";
						
					}
					else if($repassword==NULL){
						echo "<script>alert('Enter your re-password')</script>";
						
					}
					else if($password!=$repassword){
						echo "<script>alert('Passwords does not match, Try Again')</script>";
					}
				
					else{
						$sql="INSERT INTO users(FullName,Username,Email,Password)
					values('$fullname','$username','$email','$password')
					";
					
					$result=mysqli_query($conn,$sql);
					if($result){
						$sql1 = "SET  @num := 0";
						$result1 = (mysqli_query($conn, $sql1));
						$sql1="UPDATE users SET uID = @num := (@num+1)";
						$result1 = (mysqli_query($conn, $sql1));
						$sql1="ALTER TABLE `users` AUTO_INCREMENT = 1;";
						$result1 = (mysqli_query($conn, $sql1));
						echo "<script>alert('Account Created, Please Login In')</script>";
                        echo "<script> location.replace('index.php'); </script>";
					}
					else{
						echo "<script>alert('Error, Please Register Again')</script>";
					}
					
					}

				}
			}
		?>
</body>
</html>