<?php

	//με το include σιγουρευόμαστε ότι έχει γίνει η σύνδεση με την βάση.
	include '../connect.php';
	
	//με το πάτημα του κουμπιού submit, πέρνουμε τα στοιχεία από τα αντίστοιχα πεδία, και τα προσθέτουμε στην βάση.
	if(isset($_POST['submit'])){
		$name=$_POST['name']; 
		$afm=$_POST['afm'];  
		
		$sql = "insert into `suppliers`(COMPANY_NAME, AFM) values('$name', '$afm')";
		$result = mysqli_query($con, $sql);
		
		//ελέγχουμε το αποτέλεσμα που επέστρεψε η sql, μετά την εκτέλεση του query. Αν η εκτέλεση είναι επιτυχής, προβάλλουμε όλους τους suppliers.
		if($result){
			header('location:display_suppliers.php');		
		}
		else {
			die(mysqli_error($con));
		}
	}
	
	//με το πάτημα του κουμπιού back, πηγαίνουμε στο menu.
	if(isset($_POST['Back'])){
		header('location:../menu.php');		
	}
?>

<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="general_style.css">
		<link rel="stylesheet" href="add_supplier.css">
		<title>New Supplier</title>
	</head>
	
	<body>
		<h1> Add a new supplier</h1>
		<div class = "container">
			<form method = "post">
				<div class="form-group">
					<label>Name</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter supplier's name" name="name" autocomplete="off">
				</div>
				<div class="form-group">
					<label>AFM</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter supplier's AFM" name="afm" autocomplete="off">
				</div>
				<button type="submit" class="btn btn-primary my-4" name="submit">Submit</button>
			</form>
		</div>
	</body>

	<footer>
		<form action="" method="post" name="Login_Form">
			<td><input name="Back" type="submit" value="Back" class="ButtonBack"></td>
		</form>
	</footer>
	
</html>
