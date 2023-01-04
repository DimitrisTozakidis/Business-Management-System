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
		<link rel="stylesheet" href="search_suppliers_by_afm.css">
		<title>Suppliers</title>
	</head>
	
	<body>
		<div class="container">	
			<button class="ButtonAdd"><a href="add_supplier.php" class="text-light">Add Supplier</a></button>	
			<nav class="navbar navbar-light bg-light">
				<form class="form-inline" method="post">
					<input class="form-control mr-sm-2" type="search" placeholder="Enter supplier's AFM" aria-label="Search"  name="field">
					<button class="btn my-2 my-sm-0" type="submit" name="search">Search</button>
				</form>
			</nav>		
			
			<table class="table">
				<thead>
					<tr>  
						<th scope="col">Company's Name</th>
						<th scope="col">AFM</th>
						<th scope="col">Operations</th>
					</tr>
				</thead>
				
				<tbody>	
					<?php 
						//με το πάτημα του κουμπιού search, αναζητούμε το στοιχείο με βάση το κριτήριο που ψάχνουμε.
						if(isset($_POST['search'])){
							$afm = $_POST['field'];
							$sql = "Select * from `suppliers` where AFM LIKE '$afm%'";
							$result = mysqli_query($con, $sql);
							
							//ελέγχουμε το αποτελέσμα που επέστρεψε η sql, μετά την εκτέλεση του query. Αν η εκτέλεση είναι επιτυχής,
							//τυπώνουμε τα στοιχεία γραμμή-γραμμή στον πίνακα.
							if($result){
								while($row = mysqli_fetch_assoc($result)){
									$name = $row['COMPANY_NAME'];
									$afm = $row['AFM'];									
									echo '<tr >	
										<td scope="row" style="border: none;">'.$name.'</t>
										<td style="border: none;">'.$afm.'</td>
										<td style="border: none;">
											<button class="ButtonOperation"><a href="update_supplier.php?updateafm='.$afm.'">Update</a></button>
											<button class="ButtonOperation"><a href="delete_supplier.php?deleteafm='.$afm.'">Delete</a></button>
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