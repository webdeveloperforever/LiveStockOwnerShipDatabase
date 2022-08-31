<!DOCTYPE html>
<html>

<head>
	<style>
		body {
			background: #fff;
		}

		#pet ul li {
			box-shadow: 5px 5px 5px #400040;
			width: 300px;
			height: 350px;
			background: #fff;
			float: left;
			margin-top: 30px;
			margin-left: 20px;
			list-style-type: none;
			border: 1px solid #000;
			border-radius: 4px;
		}

		#pet ul li a {
			text-decoration: none;
			color: #000;
		}

		#pet1 ul li {
			box-shadow: 5px 5px 5px #400040;
			width: 300px;
			height: 350px;
			background: #fff;
			float: left;
			margin-top: 30px;
			margin-left: 20px;
			list-style-type: none;
			border: 1px solid #000;
			border-radius: 4px;
		}

		#pet1 ul li a {
			text-decoration: none;
			color: #000;
		}
	</style>
</head>

<body>
	<?php
	include("db.php");
	/*$query1=$con->prepare("select role from newuser where username='".$_COOKIE['usernameget']."'");
	$query1->execute();
	$row1=$query1->rowCount();*/
	$stmt = $con->query("SELECT role FROM newuser where username='".$_COOKIE['usernameget']."'");
	$stmt->execute();
	$role;
while ($row1 = $stmt->fetch(PDO::FETCH_NUM)) {
    $role=$row1[0];
//   print "Role: <p>{$row1[0]}</p>";
}
	//echo $role;
	if($role=="Seller"){
	echo "<h1 style='text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;padding-left:10px;margin-left:60px;margin-top:20px;width:92%;background:#425298;color:#fff;text-align:left;height:40px;line-height:40px;font-size:23px;border-radius:4px;'>YOUR LIVE STOCKS ARE:</h1>";
	$query = $con->prepare("select *from petdetails where pet_owner='" . $_COOKIE['usernameget'] . "'");
	$query->execute();
	while ($row = $query->fetch()) :
		echo "<div id='pet'>
                 <h1 style='text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;padding-left:10px;margin-left:60px;margin-top:20px;width:92%;background:#425298;color:#fff;text-align:left;height:40px;line-height:40px;font-size:23px;border-radius:4px;'>" . $row['pet_type'] . "</h1>";
		echo "<ul>
				<li><a href='viewdetails.php?id=" . $row['pet_id'] . "'>
					<h1 style='text-align:center;'>" . $row['pet_name'] . "</h1>
					<img src='petphotos/" . $row['pet_img1'] . "' style='width:260px;height:250px;margin-left:20px;border-radius:4px;'>
				</a></li>
			</ul><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";


	endwhile;
}
else{
	include("buyer.php");
}
	?>
</body>

</html>