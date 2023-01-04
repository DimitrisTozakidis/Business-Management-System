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
		<link rel="stylesheet" href="search_sales_by_customer.css">
		<title>Sales</title>
	</head>
	
	<body>
		<div class="container">		
			<button class="ButtonAdd"><a href="add_sale.php" class="text-light">New Sale</a></button>	
			<nav class="navbar navbar-light bg-light">
				<form class="form-inline" method="post">
					<input class="form-control mr-sm-2" type="search" placeholder="Enter sales's customer" aria-label="Search"  name="field">
					<button class="btn my-2 my-sm-0" type="submit" name="search">Search</button>
				</form>
			</nav>		
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Number</th>
						<th scope="col">Date</th>
						<th scope="col">Customer</th>
						<th scope="col">Product</th>
						<th scope="col">Quantity</th>
						<th scope="col">Operations</th>
					</tr>
				</thead>
				
				<tbody>
					<?php
						//με το πάτημα του κουμπιού search, αναζητούμε το στοιχείο με βάση το κριτήριο που ψάχνουμε.
						if(isset($_POST['search'])){	
							$customer = $_POST['field'];
							
							//αν ο χρήστης αναζητήσει τον χαρακτήρα * ή απλά πατήσει Search χωρίς να γράψει κάτι, επιλέγουμε όλα τα στοιχεία.
							if($customer == '*'){
								$sql = "Select * from `sales`";
							}
							else {
								$sql = "Select * from `sales` where CUSTOMER LIKE '$customer%'";
							}
							$result = mysqli_query($con, $sql);
							
							//ελέγχουμε το αποτελέσμα που επέστρεψε η sql, μετά την εκτέλεση του query. Αν η εκτέλεση είναι επιτυχής,
							//τυπώνουμε τα στοιχεία γραμμή-γραμμή στον πίνακα.
							if($result){
								while($row = mysqli_fetch_assoc($result)){
									$number = $row['NUMBER'];
									$date = $row['DATE'];
									$customer = $row['CUSTOMER'];
									$product = $row['PRODUCT'];
									$quantity = $row['QUANTITY'];		
									echo '<tr >	
										<td scope="row" style="border: none;">'.$number.'</t>
										<td style="border: none;">'.$date.'</td>
										<td style="border: none;">'.$customer.'</td>
										<td style="border: none;">'.$product.'</td>
										<td style="border: none;">'.$quantity.'</td>
										<td style="border: none;">
											<button class="ButtonOperation"><a href="update_sale.php?updatenumber='.$number.'">Update</a></button>
											<button class="ButtonOperation"><a href="delete_sale.php?deletenumber='.$number.'">Delete</a></button>
										</td>
										</tr>';
								}								
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