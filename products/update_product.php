<?php

	//με το include σιγουρευόμαστε ότι έχει γίνει η σύνδεση με την βάση.
	include '../connect.php';
	
	//μετά το πάτημα του κουμπιού update, πέρνουμε το στοιχείο από το πεδίο, και το επιλέγουμε από την βάση με το κατάλληλο κριτήριο αναζήτησης.
	$name_to_update = $_GET['updatename'];
	
	$sql = "Select * from `products` where name='$name_to_update'";
	$result = mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);
	$id = $row['ID'];
	$name = $row['NAME'];
	$supplier = $row['SUPPLIER'];
	$mu = $row['MEASUREMENT_UNIT'];
	$ppu = $row['PRICE_PER_UNIT'];	
	
	//με το πάτημα του κουμπιού submit(φαίνεται ως update στον User), πέρνουμε τα στοιχεία από τα αντίστοιχα πεδία, και τα προσθέτουμε στην βάση, τροποποιώντας τα παλιά.
	if(isset($_POST['submit'])){
		
		$id = $_POST['id'];
		$name=$_POST['name']; 
		$supplier=$_POST['supplier'];
		$mu=$_POST['mu']; 
		$ppu=$_POST['ppu'];		
		
		$sql = "update `products` set ID='$id', NAME = '$name', SUPPLIER = '$supplier', 
			MEASUREMENT_UNIT = '$mu', PRICE_PER_UNIT = '$ppu' where name='$name_to_update'";
		
		$result = mysqli_query($con, $sql);
		
		//ελέγχουμε το αποτελέσμα που επέστρεψε η sql, μετά την εκτέλεση του query. Αν η εκτέλεση είναι επιτυχής, προβάλλουμε όλα τα προϊόντα.
		if($result){
			header('location:display_products.php');
		}
		else {
			$msg="<span style='color:red' >NAME already exists</span>";
			die(mysqli_error($con));
		}
	}
	
	//με το πάτημα του κουμπιού back, πηγαίνουμε στο menu.
	if(isset($_POST['Back'])){
		header('location:display_products.php');		
	}
?>

<!doctype html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="general_style.css">
		<link rel="stylesheet" href="update_product.css">
		<title>Update Product</title>
	</head>
	
	<body>
		<h1>Update a product</h1>
		
		<!--Αν δεν υπάρχει το στοιχείο που θέλουμε να τροποποιήσουμε, εμφανίζουμε το κατάλληλο μήνυμα λάθους-->
		<?php if(isset($msg)){?>
			<tr>
			<td colspan="3" align="center" valign="top"><?php echo $msg;?></td>
			</tr>
		<?php } ?>
	
		<div class = "container">
			<form method = "post">
				<div class="form-group">
					<label>ID</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter product's ID" name="id" autocomplete="off"
							value="<?=$id?>">
				</div>
				<div class="form-group">
					<label>Name</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter product's name" name="name" autocomplete="off"
							value="<?=$name?>">
				</div>
				<div class="form-group">
					<label>Supplier</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter product's supplier" name="supplier" autocomplete="off"
							value="<?=$supplier?>">
				</div>
				<div class="form-group">
					<label>Measurement Unit</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter product's measurement unit" name="mu" autocomplete="off"
							value="<?=$mu?>">
				</div>
				<div class="form-group">
					<label>Price Per Unit</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter product's price per unit" name="ppu" autocomplete="off"
							value="<?=$ppu?>">
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