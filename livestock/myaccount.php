<html>

<head>

	<style>
		body {
			background: #425298;
		}

		#box1 {
			border: 1px solid aquamarine;
			padding-left: 200px;
			color: yellow;
		}

		table {
			width: 95%;
			height: auto;
			margin-left: 30px;
			border-collapse: collapse;
		}

		table th {
			font-size: 25px;
			border-collapse: collapse;
			border: 2px solid #400040;
		}

		table td {
			text-align: center;
			padding: 10px;
			font-size: 20px;
		}

		#show {
			background: #fff;
		}
	</style>
</head>

<body>
	<a href="index.php" style="color:red;font-size:20px;">Home Page</a>
	<?php

	include("db.php");

	$a = 1;
	$name = $_COOKIE['usernameget'];
	$orderdetails = $con->prepare("select * from newuser where username='$name'");

	$orderdetails->execute();

	$row = $orderdetails->fetch();

	$userid = $row['id'];


	echo "<h1 style='color:#fff;background:#425298;text-align:center;line-height:50px;height:50px;'>" . $row['username'] . "</h1>";
	echo "<div id='box1'>";
	echo "<h2>" . $row['address'] . ",</h2>";
	echo "<h2>" . $row['city'] . ",</h2>";
	echo "<h2>" . $row['pincode'] . ".</h2>";
	echo "<h2>" . $row['email'] . "</h2>";

	echo "<h2>" . $row['phoneno'] . "</h2><a href='edit_address.php?userid=" . $row['id'] . "' style='color:#fff';>EDIT</a>";

	echo "</div>";
	?>
</body>

</html>