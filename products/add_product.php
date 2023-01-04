<?php

	//με το include σιγουρευόμαστε ότι έχει γίνει η σύνδεση με την βάση.
	include '../connect.php';
	
	//με το πάτημα του κουμπιού submit, πέρνουμε τα στοιχεία από τα αντίστοιχα πεδία, και τα προσθέτουμε στην βάση.
	if(isset($_POST['submit'])){
		$id=$_POST['id'];
		$name=$_POST['name']; 
		$supplier=$_POST['supplier'];
		$mu=$_POST['mu'];
		$ppu=$_POST['ppu'];
		
		$sql = "insert into `products`(ID, NAME, SUPPLIER, MEASUREMENT_UNIT, PRICE_PER_UNIT) 
				values('$id', '$name', '$supplier', '$mu', '$ppu')";
		$result = mysqli_query($con, $sql);
		
		//ελέγχουμε το αποτέλεσμα που επέστρεψε η sql, μετά την εκτέλεση του query. Αν η εκτέλεση είναι επιτυχής, προβάλλουμε όλους τους suppliers.
		if($result){
			header('location:display_products.php');		
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
		<link rel="stylesheet" href="add_product.css">
		<title>New Product</title>
	</head>
	
	<body>
		<h1> Add a new Product</h1>
		<div class = "container">
			<form method = "post">
				<div class="form-group">
					<label>ID</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter product's ID" name="id" autocomplete="off">
				</div>
				<div class="form-group">
					<label>Name</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter product's name" name="name" autocomplete="off">
				</div>
				<div class="form-group">
					<label>Supplier</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter product's supplier" name="supplier" autocomplete="off">
				</div>
				<div class="form-group">
					<label>Measurement Unit</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter product's measurement unit" name="mu" autocomplete="off">
				</div>
				<div class="form-group">
					<label>Price Per Unit</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter product's price per unit" name="ppu" autocomplete="off">
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
