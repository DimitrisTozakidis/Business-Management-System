<?php

	//με το include σιγουρευόμαστε ότι έχει γίνει η σύνδεση με την βάση.
	include '../connect.php';
	
	//μετά το πάτημα του κουμπιού update, πέρνουμε το στοιχείο από το πεδίο, και το επιλέγουμε από την βάση με το κατάλληλο κριτήριο αναζήτησης.
	$afm_to_update = $_GET['updateafm'];
	
	$sql = "Select * from `customers` where AFM='$afm_to_update'";
	$result = mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);
	$name = $row['FULL_NAME'];
	$phone = $row['PHONE_NUMBER'];
	
	//με το πάτημα του κουμπιού submit(φαίνεται ως update στον User), πέρνουμε τα στοιχεία από τα αντίστοιχα πεδία, και τα προσθέτουμε στην βάση, τροποποιώντας τα παλιά.
	if(isset($_POST['submit'])){
		
		$name=$_POST['name']; 
		$afm=$_POST['afm'];
		$phone=$_POST['phone'];  
		
		$sql = "update `customers` set FULL_NAME = '$name', AFM = '$afm', PHONE_NUMBER = '$phone'
		where afm='$afm_to_update'";
		
		$result = mysqli_query($con, $sql);
		
		//ελέγχουμε το αποτελέσμα που επέστρεψε η sql, μετά την εκτέλεση του query. Αν η εκτέλεση είναι επιτυχής, προβάλλουμε όλους τους customers.
		if($result){
			header('location:display_customers.php');
		}
		else {
			$msg="<span style='color:red' >AFM already exists</span>";
			die(mysqli_error($con));
		}
	}
	
	//με το πάτημα του κουμπιού back, πηγαίνουμε στο menu.
	if(isset($_POST['Back'])){
		header('location:display_customers.php');		
	}
	
?>

<!doctype html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="general_style.css">
		<link rel="stylesheet" href="update_customer.css">
		<title>Update Customer</title>
	</head>
	
	<body>
		<h1>Update a customer</h1>
		
		<!--Αν δεν υπάρχει το στοιχείο που θέλουμε να τροποποιήσουμε, εμφανίζουμε το κατάλληλο μήνυμα λάθους-->
		<?php if(isset($msg)){?>
			<tr>
			<td colspan="3" align="center" valign="top"><?php echo $msg;?></td>
			</tr>
		<?php } ?>
	
		<div class = "container">
			<form method = "post">
				<div class="form-group">
					<label>Name</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter customer's name" name="name" autocomplete="off" 
									value="<?=$name?>">
				</div>
				<div class="form-group">
					<label>AFM</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter customer's AFM" name="afm" autocomplete="off"
									value=<?php echo $afm_to_update;?>>
				</div>
				<div class="form-group">
					<label>Phone Number</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter customer's phone number" name="phone" autocomplete="off"
									value=<?php echo $phone;?>>
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