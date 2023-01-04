<?php

	//με το include σιγουρευόμαστε ότι έχει γίνει η σύνδεση με την βάση.
	include '../connect.php';
	
	//με το πάτημα του κουμπιού submit, πέρνουμε τα στοιχεία από τα αντίστοιχα πεδία, και τα προσθέτουμε στην βάση.
	if(isset($_POST['submit'])){
		$number=$_POST['number'];
		$date=$_POST['date'];
		$customer=$_POST['customer']; 
		$product=$_POST['product'];
		$quantity=$_POST['quantity'];
				
		$sql = "insert into `sales`(NUMBER, CUSTOMER, PRODUCT, QUANTITY, DATE) 
				values('$number', '$customer', '$product', '$quantity', '$date')";
		$result = mysqli_query($con, $sql);
		
		//ελέγχουμε το αποτέλεσμα που επέστρεψε η sql, μετά την εκτέλεση του query. Αν η εκτέλεση είναι επιτυχής, προβάλλουμε όλα τα τιμολόγια πώλησης.
		if($result){
			header('location:display_sales.php');	
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
		<link rel="stylesheet" href="add_sale.css">
		<title>New Sale</title>
	</head>
	
	<body>
		<h1>Add a new sale</h1>
		<div class = "container">
			<form method = "post">
				<div class="form-group">
					<label>Number</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter sale's number" name="number" autocomplete="off">
				</div>
				<div class="form-group">
					<label>Date</label>
					<input type="date", style="color: #03e9f4;", class="form-control" placeholder="Enter date" name="date" autocomplete="off">
				</div>
				<div class="form-group">
					<label>Customer Name</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter customer's name" name="customer" autocomplete="off">
				</div>
				<div class="form-group">
					<label>Product</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter product" name="product" autocomplete="off">
				</div>
				<div class="form-group">
					<label>Quantity</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter quantity" name="quantity" autocomplete="off">
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
