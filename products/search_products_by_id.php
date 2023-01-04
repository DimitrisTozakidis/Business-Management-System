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
		<link rel="stylesheet" href="search_products_by_id.css">
		<title>Products</title>
	</head>
	
	<body>
		<div class="container">		
			<button class="ButtonAdd"><a href="add_product.php" class="text-light">Add Product</a></button>	
			<nav class="navbar navbar-light bg-light">
				<form class="form-inline" method="post">
					<input class="form-control mr-sm-2" type="search" placeholder="Enter product's ID" aria-label="Search"  name="field">
					<button class="btn my-2 my-sm-0" type="submit" name="search">Search</button>
				</form>
			</nav>		
			<table class="table">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Name</th>
						<th scope="col">Supplier</th>
						<th scope="col">Measurement Unit</th>
						<th scope="col">Price Per Unit</th>
						<th scope="col">Operations</th>
					</tr>
				</thead>
				
				<tbody>
					<?php
						//με το πάτημα του κουμπιού search, αναζητούμε το στοιχείο με βάση το κριτήριο που ψάχνουμε.
						if(isset($_POST['search'])){	
							$id = $_POST['field'];
							$sql = "Select * from `products` where ID LIKE '$id%'";
							$result = mysqli_query($con, $sql);
							
							//ελέγχουμε το αποτελέσμα που επέστρεψε η sql, μετά την εκτέλεση του query. Αν η εκτέλεση είναι επιτυχής,
							//τυπώνουμε τα στοιχεία γραμμή-γραμμή στον πίνακα.
							if($result){
								while($row = mysqli_fetch_assoc($result)){
									$id = $row['ID'];
									$name = $row['NAME'];
									$supplier = $row['SUPPLIER'];
									$mu = $row['MEASUREMENT_UNIT'];
									$ppu = $row['PRICE_PER_UNIT'];		
									echo '<tr >	
										<td scope="row" style="border: none;">'.$id.'</t>
										<td style="border: none;">'.$name.'</td>
										<td style="border: none;">'.$supplier.'</td>
										<td style="border: none;">'.$mu.'</td>
										<td style="border: none;">'.$ppu.'</td>
										<td style="border: none;">
											<button class="ButtonOperation"><a href="update_product.php?updatename='.$name.'">Update</a></button>
											<button class="ButtonOperation"><a href="delete_product.php?deletename='.$name.'">Delete</a></button>
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