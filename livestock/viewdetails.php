<?php if (isset($_POST['addcart'])) {
	header("location:addtocart.php?id=" . $row['pet_id'] . "");
} ?>

<?php
if (isset($_POST['insert_feedback'])) {

	if (isset($_COOKIE['usernameget'])) {

		$query = $con->prepare("select *from newuser where username='" . $_COOKIE['usernameget'] . "'");
		$query->execute();

		$row = $query->fetch();

		$userid = $row['id'];
		$pet_id = $_GET['id'];

		$desc = $_POST['desc'];
		$rating = $_POST['rating'];

		$feed_img = $_FILES['feedimg']['name'];
		$feed_img_temp = $_FILES['feedimg']['tmp_name'];
		move_uploaded_file($feed_img_temp, "feedback/$feed_img");

		$query = $con->prepare("insert into feedback(user_id,pet_id,rating,feed_desc,feed_img,feed_date)values('$userid','$pet_id','$rating','$desc','$feed_img',Now())");
		if ($query->execute()) {

			echo "<script>alert('Feedback inserted')</script>";
			echo "<script>window.open('viewdetails.php?id=" . $_GET['id'] . "','_self')</script>";
		} else {
			echo "<script>alert('Feedback not inserted')</script>";
		}
	} else {
		echo "<script>alert('!...Please login and Give feedback...!')</script>";
	}
}


?>
<html>

<head>
	<style>
		body {
			background-color: #d8d8d8;
		}

		#pet {
			margin-top: 32%;
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
			width: 300px;
			height: 335px;
			background: red;
			float: left;
			margin-top: 20px;
			margin-right: 20px;
			list-style-type: none;
			border-radius: 4px;
			text-shadow: 5px 5px 5px #000;
			box-shadow: 3px 3px 3px #000;
		}

		#pet1 ul li img {
			width: 300px;
			height: 335px;
			border-radius: 4px;
			text-shadow: 5px 5px 5px #000;
			box-shadow: 3px 3px 3px #000;
		}

		#pet2 ul li {
			background: #fff;
			color: #400040;
			float: left;
			margin-top: 10px;
			margin-right: 20px;
			list-style-type: circle;
			font-size: 24px;
			border: 1px solid #40040;
			margin-left: 20px;
		}

		table {
			width: 90%;
			height: auto;
			margin-left: 30px;
			border-radius: 10px;
			margin-top: 5px;
			background: #d8d8d8;
		}

		table,
		th,
		tr,
		td {
			border-collapse: collapse;
			border: 1px solid #400040;
			padding: 5px;
		}

		table td {
			text-align: center;
			font-size: 20px;
			color: #400040;
		}

		table th {
			font-size: 23px;
			color: #400040;
		}

		img {
			width: 50px;
			height: 50px;
		}

		#myBtn {
			display: none;
			position: fixed;
			bottom: 20px;
			right: 30px;
			z-index: 99;
			font-size: 18px;
			border: none;
			outline: none;
			background-color: red;
			color: white;
			cursor: pointer;
			padding: 15px;
			border-radius: 4px;
		}

		#myBtn:hover {
			background-color: #555;
		}
	</style>
</head>

<body>
	<?php include("header_index.php"); ?>

	<?php if (isset($_GET['id'])) {

		include("db.php");
		$stmt = $con->query("SELECT role FROM newuser where username='" . $_COOKIE['usernameget'] . "'");
		$stmt->execute();
		$role;
		while ($row1 = $stmt->fetch(PDO::FETCH_NUM)) {
			$role = $row1[0];
			//   print "Role: <p>{$row1[0]}</p>";
		}
		if ($role == "Seller") {
			//echo $role;
			$id = $_GET['id'];
			$query = $con->prepare("select *from petdetails where pet_id='$id' and pet_owner='" . $_COOKIE['usernameget'] . "'");
			$query->execute();
			$row23 = $query->rowCount();

			$row = $query->fetch();
	?>
			<form method="post">
				<h1 style="text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;margin-top:5px;width:95%;height:40px;line-height:40px;background:#425298;color:#fff;text-align:center;margin-left:20px;padding-left:10px;border-radius:4px;border:1px solid aquamrine;"><?php echo "" . $row['pet_name'] . ""; ?></h1>
				<div id="pet1">
					<ul>
						<li><a href="petphotos/<?php echo "" . $row['pet_img1'] . ""; ?>"><img src="petphotos/<?php echo "" . $row['pet_img1'] . ""; ?>"></a></li>
					</ul>
				</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<a  style="margin-left: 5%;background-color:orange;color: blue;" href="edit_petdetils_seller.php?id=<?php echo "" . $row['pet_id'] . "";?>">EDIT</a>
				<table>
					<tr>
						<th>Serial No</th>
						<th>LiveStockName</th>
						<th>LiveStockType</th>
						<th>LiveStockColor</th>
						<th>LiveStockPrice</th>
						<th>LiveStockFoods</th>
						<th>LiveStockOwner</th>
						<th>LiveStockBirthPlace</th>
						<th>LiveStockDeathPlace</th>
						<th>DoctorPrescriptionImage</th>
						<th>CountOfOwnersTillNow</th>

					</tr>
					<?php
					include("db.php");
					$id = $_GET['id'];
					$query = $con->prepare("select * from petdetails where pet_owner='" . $_COOKIE['usernameget'] . "' and pet_id='$id' order by 1 desc");

					$query->execute();
					$i = 1;
					while ($row = $query->fetch()) :

						echo "<tr><td>" . $i++ . "</td>
				<td>" . $row['pet_name'] . "</td>
			<td>" . $row['pet_type'] . "</td>
			<td>" . $row['pet_color'] . "</td>
			<td>" . $row['pet_rate'] . "</td>
			<td>" . $row['pet_foods'] . "</td>
			<td>" . $row['pet_owner'] . "</td>
			<td>" . $row['pet_birth_place'] . "</td>
			<td>" . $row['pet_death_place'] . "</td>
			<td><a href='doctorprescription/" . $row['doctorprescription'] . "'><img src='doctorprescription/" . $row['doctorprescription'] . "'></a></td>
			<td>" . $row['Count_of_Owners'] . "</td>
			
			
			
			</tr>";
		endwhile;
				} else {
					//	echo $role;
					$id = $_GET['id'];
					$query = $con->prepare("select *from petdetails where pet_id='$id'");
					$query->execute();
					$row23 = $query->rowCount();

					$row = $query->fetch();
					?>
					<form method="post">
						<h1 style="text-shadow: 5px 5px 5px #000;box-shadow: 3px 3px 3px #000;margin-top:5px;width:95%;height:40px;line-height:40px;background:#425298;color:#fff;text-align:center;margin-left:20px;padding-left:10px;border-radius:4px;border:1px solid aquamrine;"><?php echo "" . $row['pet_name'] . ""; ?></h1>
						<div id="pet1">
							<ul>
								<li><a href="petphotos/<?php echo "" . $row['pet_img1'] . ""; ?>"><img src="petphotos/<?php echo "" . $row['pet_img1'] . ""; ?>"></a></li>
							</ul>
						</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
						<table>
							<tr>
								<th>Serial No</th>
								<th>LiveStockName</th>
								<th>LiveStockType</th>
								<th>LiveStockColor</th>
								<th>LiveStockPrice</th>
								<th>LiveStockFoods</th>
								<th>LiveStockOwner</th>
								<th>LiveStockBirthPlace</th>
								<th>LiveStockDeathPlace</th>
								<th>DoctorPrescriptionImage</th>
								<th>CountOfOwnersTillNow</th>

							</tr>
							<?php
							include("db.php");
							$id = $_GET['id'];
							$query = $con->prepare("select * from petdetails where  pet_id='$id' order by 1 desc");

							$query->execute();
							$i = 1;
							while ($row = $query->fetch()) :

								echo "<tr><td>" . $i++ . "</td>
				<td>" . $row['pet_name'] . "</td>
			<td>" . $row['pet_type'] . "</td>
			<td>" . $row['pet_color'] . "</td>
			<td>" . $row['pet_rate'] . "</td>
			<td>" . $row['pet_foods'] . "</td>
			<td>" . $row['pet_owner'] . "</td>
			<td>" . $row['pet_birth_place'] . "</td>
			<td>" . $row['pet_death_place'] . "</td>
			<td><img src='doctorprescription/" . $row['doctorprescription'] . "'></td>
			<td>" . $row['Count_of_Owners'] . "</td>
			
			
			
			</tr>";
							?>
								<!--<input type="submit" name="click" value="BUY" style="margin-top:20px;margin-bottom:20px;font-size:20px;margin-left:500px;text-align:center;padding:5px;border-radius:4px;border:1px solid #400040;background:#fff;">-->
								<a href="contact-form/index.html"><input type="button" value="BUY" style="margin-top:-10px;margin-bottom:20px;font-size:20px;margin-left:100px;text-align:center;padding:5px;border-radius:4px;border:1px solid #400040;background:#d8d8d8;"></a>
					<?php
							endwhile;
						}
					}


					?>
						</table>
						<br><br>
						<!--<a href="contact-form/index.html"><input type="button" value="BUY" style="margin-top:-10px;margin-bottom:20px;font-size:20px;margin-left:100px;text-align:center;padding:5px;border-radius:4px;border:1px solid #400040;background:#d8d8d8;"></a>-->
						<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>


						<script>
							window.onscroll = function() {
								scrollFunction()
							};

							function scrollFunction() {
								if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
									document.getElementById("myBtn").style.display = "block";
								} else {
									document.getElementById("myBtn").style.display = "none";
								}
							}

							function topFunction() {
								document.body.scrollTop = 0;
								document.documentElement.scrollTop = 0;

							}
						</script>
</body>

</html>