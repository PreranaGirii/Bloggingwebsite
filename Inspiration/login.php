<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Username:</label>
        <input type="text" name="username"><br>
        <label>Password:</label>
        <input type="password" name="password"><br>
        <button type="submit" name="login">Login</button>
    </form>
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
						echo "<script> location.replace('index.php'); </script>";
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