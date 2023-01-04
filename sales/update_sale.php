<?php
	
	//με το include σιγουρευόμαστε ότι έχει γίνει η σύνδεση με την βάση.
	include '../connect.php';
	
	//μετά το πάτημα του κουμπιού update, πέρνουμε το στοιχείο από το πεδίο, και το επιλέγουμε από την βάση σύμφωνα με τον αριθμό τιμολογίου και εμφανίζουμε
	//τα στοιχεία της εγγραφής σε μια φόρμα.
	$number_to_update = $_GET['updatenumber'];
	
	$sql = "Select * from `sales` where number='$number_to_update'";
	$result = mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);
	
	$number = $row['NUMBER'];
	$customer = $row['CUSTOMER'];
	$product = $row['PRODUCT'];
	$quantity = $row['QUANTITY'];
	$date = $row['DATE'];	
	
	//με το πάτημα του κουμπιού submit(φαίνεται ως update στον User), πέρνουμε τα στοιχεία από τα αντίστοιχα πεδία, και τα προσθέτουμε στην βάση, τροποποιώντας τα παλιά.
	if(isset($_POST['submit'])){
		
		$number = $_POST['number'];
		$customer = $_POST['customer']; 
		$product = $_POST['product'];
		$quantity = $_POST['quantity']; 
		$date = $_POST['date'];		
		
		$sql = "update `sales` set NUMBER='$number', CUSTOMER = '$customer', PRODUCT = '$product', 
			QUANTITY = '$quantity', DATE = '$date' where number='$number_to_update'";
		
		$result = mysqli_query($con, $sql);
		
		//ελέγχουμε το αποτελέσμα που επέστρεψε η sql, μετά την εκτέλεση του query. Αν η εκτέλεση είναι επιτυχής, προβάλλουμε όλες τις πωλήσεις.
		if($result){
			header('location:display_sales.php');
		}
		else {
			$msg="<span style='color:red' >NAME already exists</span>";
			die(mysqli_error($con));
		}
	}
	
	//με το πάτημα του κουμπιού back, πηγαίνουμε στο menu.
	if(isset($_POST['Back'])){
		header('location:display_sales.php');		
	}
?>

<!doctype html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="general_style.css">
		<link rel="stylesheet" href="update_sale.css">
		<title>Update Sale</title>
	</head>
	
	<body>
		<h1>Update a sale</h1>
		
		<!--Αν δεν υπάρχει το στοιχείο που θέλουμε να τροποποιήσουμε, εμφανίζουμε το κατάλληλο μήνυμα λάθους-->
		<?php if(isset($msg)){?>
			<tr>
			<td colspan="3" align="center" valign="top"><?php echo $msg;?></td>
			</tr>
		<?php } ?>
	
		<div class = "container">
			<form method = "post">
				<div class="form-group">
					<label>Number</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter sale's number" name="number" autocomplete="off"
							value="<?=$number?>">
				</div>
				<div class="form-group">
					<label>Date</label>
					<input type="date", style="color: #03e9f4;", class="form-control" placeholder="Enter sale's date" name="date" autocomplete="off"
							value="<?=$date?>">
				</div>
				<div class="form-group">
					<label>Customer</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter sale's customer" name="customer" autocomplete="off"
							value="<?=$customer?>">
				</div>
				<div class="form-group">
					<label>Product</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter sale's product" name="product" autocomplete="off"
							value="<?=$product?>">
				</div>
				<div class="form-group">
					<label>Quantity</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter sale's quantity" name="quantity" autocomplete="off"
							value="<?=$quantity?>">
				</div>
				<button type="submit" class="btn btn-primary my-3" name="submit">Update</button>
			</form>
		</div>
	</body>

	<footer>
		<form action="" method="post" name="Login_Form">
			<td><input name="Back" type="submit" value="Back" class="ButtonBack"></td>
		</form>
	</footer>

</html>