<?php

	//με το include σιγουρευόμαστε ότι έχει γίνει η σύνδεση με την βάση.
	include '../connect.php';
	
	//με το πάτημα του κουμπιού back, πηγαίνουμε στο menu.
	if(isset($_POST['Back'])){
		header("location:../menu.php");		
	}
?>

<!doctype html>
<html lang="en">

	<head>
		<link rel="stylesheet" href="general_style.css">
		<link rel="stylesheet" href="display_customers.css">
		<title>Customers</title>
	</head>
	
	<body>
		<div class="container">				
			<button class="ButtonAdd"><a href="add_customer.php" class="text-light">Add Customer</a></button>
			<table class="table">
				<thead>
					<tr>  
						<th scope="col">Full Name</th>
						<th scope="col">AFM</th>
						<th scope="col">Phone Number</th>
						<th scope="col">Operations</th>
					</tr>
				</thead>
				  <tbody>
					<?php
						//επιλέγουμε όλα τα στοιχεία από τον πίνακα customers.
						$sql = "Select * from `customers`";
						$result = mysqli_query($con, $sql);
						
						//ελέγχουμε το αποτελέσμα που επέστρεψε η sql, μετά την εκτέλεση του query. Αν η εκτέλεση είναι επιτυχής,
						//τυπώνουμε τα στοιχεία γραμμή-γραμμή στον πίνακα.
						if($result){
							while($row = mysqli_fetch_assoc($result)){
								$name = $row['FULL_NAME'];
								$afm = $row['AFM'];
								$phone = $row['PHONE_NUMBER'];
								echo '<tr >	
									<td scope="row" style="border: none;">'.$name.'</t>
									<td style="border: none;">'.$afm.'</td>
									<td style="border: none;">'.$phone.'</td>
									<td style="border: none;">
										<button class="ButtonOperation"><a href="update_customer.php?updateafm='.$afm.'">Update</a></button>
										<button class="ButtonOperation"><a href="delete_customer.php?deleteafm='.$afm.'">Delete</a></button>
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