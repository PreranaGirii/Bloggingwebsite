<?php
include 'session.php';
include 'connect.php';

$sql = "SELECT * FROM blobs";
$res = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php require 'nav.php'; ?>
<br>
<br>
<br>
<section>
	<div class="container" style="text-align:center;">
		<h3>Explore Blogs</h3>
		<br>
		<?php while($i=mysqli_fetch_assoc($res)): ?>
		<div class="box-2">
			<img src="<?php echo $i['bImage'] ?>" class="b-img-1">
			<h3 class="heading1"><?php echo $i['bTitle'] ?></h3>
				<p class="blog-heading-1"><?php echo $i['bsubtitle'] ?></p>
				<p class="text"><?php echo $i['bDescription'] ?></p>
				<span class="name"><?php echo $i['buser'] ?></span>
		</div>
		<?php endwhile; ?> 
		</div>
	
</section>

</body>
</html>
