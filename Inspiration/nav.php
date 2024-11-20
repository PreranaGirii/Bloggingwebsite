<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title></title>
</head>
<body>
<header>
	<div class="container">
		<div class="col-div-6">
			<p class="logo"><span>INS</span>piration</p>
		</div>
		<div class="col-div-6">
			<ul class="nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="blog.php">Blog</a></li>
				<li><a href="about.php">About</a></li>
				<!-- <li><a href="register.php">Login</a></li> -->
				<?php
						if(isset($_SESSION['loggedin'])){
							if(!$_SESSION['loggedin']){
								echo "<li>
                                <a  href='loginn.php'>Log in</a>
                            </li>
                            <li>
                                <a  href='signup.php'>Sign up</a>s
                            </li>";
							}
							else{
                                echo "<li>
                                <a  href='profile.php'>Profile</a>
                            </li>
                            <li>
                                <a  href='logout.php'>Log out(".$_SESSION['username'].")</a>
                            </li>";
								
							}
						}
						else{
							echo "<li>
                                <a  href='loginn.php'>Log in</a>
                            </li>
                            <li>
                                <a  href='signup.php'>Sign up</a>
                            </li>";
						}
						
						?>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</header>
</body>
</html>