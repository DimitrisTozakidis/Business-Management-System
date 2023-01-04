<?php

	//με το include σιγουρευόμαστε ότι έχει γίνει η σύνδεση με την βάση.
	include '../connect.php';
	
	//με το πάτημα του κουμπιού back, πηγαίνουμε στο menu.
	if(isset($_POST['Back'])){
		header("location:../menu.php");
		exit;		
	}
?>

<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="general_style.css">
		<link rel="stylesheet" href="display_purchases_view.css">
		<title>Purchases</title>
	</head>
	
	<body>
		<div class="container">				
			<button class="ButtonAdd"><a href="add_sale.php" class="text-light">New Purchase</a></button>
			<table class="table">
				<thead>
					<tr>  
						<th scope="col">Number</th>
						<th scope="col">Date</th>
						<th scope="col">Supplier</th>
						<th scope="col">AFM</th>
						<th scope="col">Product</th>
						<th scope="col">ID</th>
						<th scope="col">Measurement Unit</th>
						<th scope="col">Quantity</th>
						<th scope="col">Price Per Unit</th>
						<th scope="col">Price</th>
						<th scope="col">Operations</th>
					</tr>
				</thead>
				  <tbody>
					<?php
						//επιλέγουμε όλα τα στοιχεία από την όψη purchase_info.
						$sql = "Select * from `purchase_info`";
						$result = mysqli_query($con, $sql);
						
						//ελέγχουμε το αποτελέσμα που επέστρεψε η sql, μετά την εκτέλεση του query. Αν η εκτέλεση είναι επιτυχής,
						//τυπώνουμε τα στοιχεία γραμμή-γραμμή στον πίνακα.
						if($result){
							while($row = mysqli_fetch_assoc($result)){
								$number = $row['NUMBER'];
								$date = $row['DATE'];
								$supplier = $row['SUPPLIER'];
								$afm = $row['AFM'];
								$product = $row['PRODUCT'];
								$id = $row['ID'];
								$mu = $row['MEASUREMENT_UNIT'];
								$quantity = $row['QUANTITY'];
								$ppu = $row['PRICE_PER_UNIT'];
								$price = $quantity * $ppu;
								
								echo '<tr >	
									<td scope="row" style="border: none;">'.$number.'</t>
									<td style="border: none;">'.$date.'</td>
									<td style="border: none;">'.$supplier.'</td>
									<td style="border: none;">'.$afm.'</td>
									<td style="border: none;">'.$product.'</td>
									<td style="border: none;">'.$id.'</td>
									<td style="border: none;">'.$mu.'</td>
									<td style="border: none;">'.$quantity.'</td>
									<td style="border: none;">'.$ppu.'</td>
									<td style="border: none;">'.$price.'</td>
									<td style="border: none;">
										<button class="ButtonOperation"><a href="update_purchase.php?updatenumber='.$number.'">Update</a></button>
										<button class="ButtonOperation"><a href="delete_purchase.php?deletenumber='.$number.'">Delete</a></button>
									</td>
									</tr>';
							}								
						}					
					?>
				  </tbody>
			</table>
		</div>
	</body>

	<footer>	
		<form action="" method="post" name="Login_Form">
			<td><input name="Back" type="submit" value="Back" class="ButtonBack"></td>
		</form>
	</footer>

</html>