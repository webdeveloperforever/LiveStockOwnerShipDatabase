<html>

<head>
	<style>
		* {
			margin: 0%;
		}

		body {
			background: #425298;
		}

		#mainact {
			width: 1000px;
			height: auto;
			background: #d8d8d8;
			margin-left: 100px;
			box-shadow: 5px 5px 5px #400040;
			border: 2px solid #400040;
		}

		#mainact h1 {
			text-align: center;
			color: #fff;
			background: #400040;
			border-radius: 4px;
			border: 2px solid #fff;
		}

		#mainact table {
			margin-left: 200px;
		}

		#mainact table tr td {
			font-size: 25px;
			padding: 5px;
			font-weight: bold;
		}

		#mainact table tr td input {
			font-size: 20px;
			padding: 5px;
			width: 300px;
			height: 40px;
			border-radius: 4px;
			border: 2px solid aquamarine;
			margin-left: 50px;
		}
	</style>


</head>

<body>
	<?php include("menubaradmin.php") ?>

	<form method="post" enctype="multipart/form-data">
		<div id="mainact">
			<h1>Add New LiveStock Details</h1>
			<table>
				<tr>
					<td>Enter LiveStock Type :</td>
					<td><input type="text" name="pettype" placeholder="Enter LiveStock type"></td>
				</tr>
				<tr>
					<td>Enter LiveStock Name :</td>
					<td><input type="text" name="petname" placeholder="Enter the LiveStock name"></td>
				</tr>
				<tr>
					<td>Enter LiveStock color :</td>
					<td><input type="text" name="petcolor" placeholder="Enter the LiveStock color"></td>
				</tr>
				<td>Enter LiveStock price :</td>
				<td><input type="text" name="petrate" placeholder="Enter the LiveStock price"></td>
				</tr>
				<tr>
					<td>Enter LiveStock keywords :</td>
					<td><input type="text" name="petkeyword" placeholder="Enter the LiveStock keywords"></td>
				</tr>
				<tr>
					<td>Enter LiveStock Feature1 :</td>
					<td><input type="text" name="petfeature1" placeholder="Enter the LiveStock feature1"></td>
				</tr>
				<tr>
					<td>Enter LiveStock Feature2 :</td>
					<td><input type="text" name="petfeature2" placeholder="Enter the LiveStock feature2"></td>
				</tr>
				<tr>
					<td>Enter LiveStock image1 :</td>
					<td><input type="file" name="petimg1"></td>
				</tr>
				<tr>
					<td>Enter LiveStock image2 :</td>
					<td><input type="file" name="petimg2"></td>
				</tr>
				<tr>
					<td>Enter LiveStock image3 :</td>
					<td><input type="file" name="petimg3"></td>
				</tr>
				<tr>
					<td>Enter LiveStock image4 :</td>
					<td><input type="file" name="petimg4"></td>
				</tr>
				<tr>
					<td>Enter LiveStock Foods :</td>
					<td><input type="text" name="petfoods" placeholder="Enter the LiveStock foods"></td>
				</tr>
				<tr>
					<td>Enter LiveStock Owner Name :</td>
					<td><input type="text" name="petowner" placeholder="Enter the LiveStock owner name"></td>
				</tr>
				<tr>
					<td>Enter LiveStock Birth Place :</td>
					<td><input type="text" name="petbirthplace" placeholder="Enter the LiveStock birth place"></td>
				</tr>
				<tr>
					<td>Enter LiveStock Death Place :</td>
					<td><input type="text" name="petdeathplace" placeholder="Enter the LiveStock death place"></td>
				</tr>
				<tr>
					<td>Doctor Prescription Photo :</td>
					<td><input type="file" name="doctorimg"></td>
				</tr>
				<tr>
					<td>Count of Owners Till Now:</td>
					<td><input type="number" name="ownercount" placeholder="Enter the NumberOfOwnersTillNow"></td>
				</tr>
				
			</table>
			<input type="submit" name="click" value="Add details" style="margin-top:20px;margin-bottom:20px;font-size:20px;margin-left:500px;text-align:center;padding:5px;border-radius:4px;border:1px solid #400040;background:#fff;">
		</div>

	</form>
</body>

</html>
<?php

if (isset($_POST['click'])) {
	include("db.php");

	$pettype = $_POST['pettype'];
	$petname = $_POST['petname'];
	$petcolor = $_POST['petcolor'];
	$petrate = $_POST['petrate'];
	$petkeyword = $_POST['petkeyword'];
	$petfeature1 = $_POST['petfeature1'];
	$petfeature2 = $_POST['petfeature2'];
	$petimage1 = $_FILES['petimg1']['name'];
	$pet_img1_temp = $_FILES['petimg1']['tmp_name'];




	move_uploaded_file($pet_img1_temp, "petphotos/$petimage1");
	$petimage2 = $_FILES['petimg2']['name'];
	$pet_img2_temp = $_FILES['petimg2']['tmp_name'];




	move_uploaded_file($pet_img2_temp, "petphotos/$petimage2");

	$petimage3 = $_FILES['petimg3']['name'];
	$pet_img3_temp = $_FILES['petimg3']['tmp_name'];




	move_uploaded_file($pet_img3_temp, "petphotos/$petimage3");

	$petimage4 = $_FILES['petimg4']['name'];
	$pet_img4_temp = $_FILES['petimg4']['tmp_name'];




	move_uploaded_file($pet_img4_temp, "petphotos/$petimage4");
	$doctorimg = $_FILES['doctorimg']['name'];
	$doctor_img_temp = $_FILES['doctorimg']['tmp_name'];




	move_uploaded_file($doctor_img_temp, "doctorprescription/$doctorimg");

	$petfoods = $_POST['petfoods'];
	$petOwner = $_POST['petowner'];
	$petbirthplace = $_POST['petbirthplace'];
	$petdeathplace = $_POST['petdeathplace'];
	$ownercount=$_POST['ownercount'];

	$query = $con->prepare("insert into petdetails(pet_name,pet_type,pet_color,pet_rate,pet_keywords,pet_features1,pet_features2,pet_img1,pet_img2,pet_img3,pet_img4,pet_foods,pet_owner,pet_birth_place,pet_death_place,doctorprescription,Count_of_Owners)values('$petname','$pettype','$petcolor','$petrate','$petkeyword','$petfeature1','$petfeature2','$petimage1','$petimage2','$petimage3','$petimage4','$petfoods','$petOwner','$petbirthplace','$petdeathplace','$doctorimg','$ownercount')");

	if ($query->execute()) {
		echo "<script>alert('stored LiveStock details')</script>";
	} else {
		echo "<script>alert('not stored LiveStock details')</script>";
	}
}
?>