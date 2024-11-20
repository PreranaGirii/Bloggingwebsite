<?php
if(session_status()===PHP_SESSION_NONE){
	ini_set('session.cookie_lifetime','31536000');
	session_start();
}
include 'connect.php';
if(!$_SESSION['loggedin']){
    header('location:index.php');
}
else{
	$un = $_SESSION['username'];
    $account = "SELECT * FROM user WHERE Username='$un'";
    $res = mysqli_query($conn, $account);
    $num = mysqli_num_rows($res);
    if($num!=1){
        header('location:index.php');
    }
}

?>
<html>
    <head>
        <title>Profile</title>
		<style>
	td,th{
		text-align: left;
		padding-left: 20px;
	}
	th{
		color: #7b4ee4; 
		font-weight: 700;
		font-size:x-large;
	}
	td{
		font-weight: 500;
		font-size: larger;
		text-align: left;
		vertical-align: bottom;
	}
</style>
</head>
<body>
<?php require 'nav.php'; ?>
<br>
		<div id="site-content">
			<main class="main-content">
				<div class="container">
					<div class="page">
						<h1 style=font-weight:700>Profile</h1>
						<?php
                        $info = mysqli_fetch_assoc($res);
						echo "<table>
						<tr>
						<th>Name:</h2></th>
						<td>".$info['FullName']."</td>
						</tr>
						<tr>
						<th>Username:</h2></th>
						<td>".$info['Username']."</td>
						</tr>
						<th>Email:</h2></th>
						<td>".$info['Email']."</td>
						</tr>
						</table>
						";
                        ?>
						<div class="login-box">
							<br>
							<br>
							<h1>Upload Blob</h1>
							<form action="upload.php" method="post" enctype="multipart/form-data">
						
									User:<input type="text" name="username" value="<?php $_SESSION['username'] ?>">
									Title: <input type="text" name="title"> <br>
									Sub-Title: <input type="text" name="subtitle"> <br>
									Description: <textarea rows="20" cols="50" name="description"></textarea> <br>
								<input type="file" name="file"> <br>
								<button type="submit" name="submit">Upload</button>
							<closeform></closeform></form>
							</div>
					</div> 
				</div>
			</main> 
		</div>			
</body>
</html>