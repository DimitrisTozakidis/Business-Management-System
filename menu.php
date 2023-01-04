<?php

	//με το include σιγουρευόμαστε ότι έχει γίνει η σύνδεση με την βάση.
	include "connect.php";
	
	//με το πάτημα του κουμπιού back, πηγαίνουμε στο menu.
	if(isset($_POST['Back'])){
		header("location:index.php");
		exit;		
	}

	//με το πάτημα του κουμπιού close, κλείνουμε την εφαρμογή.
	if(isset($_POST['Close'])){
		mysqli_close($con);
		header("location:exit.php");		
	}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Menu</title>
		<link rel="stylesheet" href="menu.css">
	</head>
	
	<body>
		<nav class="dropdownmenu">
		  <ul>
			<li><a href="#">Customers</a>
			<ul id="submenu">
				<li><a href="customers/add_customer.php">Add a new customer</a></li>
				<li><a href="customers/display_customers.php">View all customers</a></li>
				<li><a href="customers/search_customers_by_name.php">Search by name</a></li>
				<li><a href="customers/search_customers_by_afm.php">Search by AFM</a></li>
				<li><a href="customers/update_customer_from_menu.php">Update a customer's info (search by afm)</a></li>
				
			  </ul>
			</li>
			<li><a href="#">Suppliers</a>
			  <ul id="submenu">
				<li><a href="suppliers/add_supplier.php">Add a new supplier</a></li>
				<li><a href="suppliers/display_suppliers.php">View all suppliers</a></li>
				<li><a href="suppliers/search_suppliers_by_name.php">Search by name</a></li>
				<li><a href="suppliers/search_suppliers_by_afm.php">Search by AFM</a></li>
				<li><a href="suppliers/update_supplier_from_menu.php">Update a supplier's info (search by afm)</a></li>
			  </ul>
			</li>
			<li><a href="#">Products</a>
				<ul id="submenu">
					<li><a href="products/add_product.php">Add a new product</a></li>
					<li><a href="products/display_products.php">View all products</a></li>
					<li><a href="products/search_products_by_id.php">Search by ID</a></li>
					<li><a href="products/search_products_by_name.php">Search by name</a></li>
					<li><a href="products/search_products_by_supplier.php">Search by supplier</a></li>
					<li><a href="products/update_product_from_menu.php">Update a product's info</a></li>
					<li><a href="products/display_product_view.php">View product's full information</a></li>
				</ul>
			</li>
			<li><a href="#">Sales</a>
				<ul id="submenu">
					<li><a href="sales/add_sale.php">New sale</a></li>
					<li><a href="sales/display_sales.php">View sales</a></li>
					<li><a href="sales/search_sales_by_number.php">Search sales by number</a></li>
					<li><a href="sales/search_sales_by_customer.php">Search sales by customer</a></li>
					<li><a href="sales/search_sales_by_product.php">Search sales by product</a></li>
					<li><a href="sales/search_sales_by_date.php">Search sales by date</a></li>
					<li><a href="sales/update_sale_from_menu.php">Update a sale's info</a></li>
					<li><a href="sales/display_sales_view.php">View sale's full information</a></li>
				</ul>	
			</li>
			<li><a href="#">Purchases</a>
				<ul id="submenu">
					<li><a href="purchases/add_purchase.php">New purchase</a></li>
					<li><a href="purchases/display_purchases.php">View purchases</a></li>
					<li><a href="purchases/search_purchases_by_number.php">Search purchases by number</a></li>
					<li><a href="purchases/search_purchases_by_supplier.php">Search purchases by supplier</a></li>
					<li><a href="purchases/search_purchases_by_product.php">Search purchases by product</a></li>
					<li><a href="purchases/search_purchases_by_date.php">Search purchases by date</a></li>
					<li><a href="purchases/update_purchase_from_menu.php">Update a purchase's info</a></li>
					<li><a href="purchases/display_purchases_view.php">View purchase's full information</a></li>
				</ul>	
			</li>
		  </ul>
		</nav>
	</body>

	<footer>
		<form action="" method="post" name="Login_Form">
			<td><input name="Back" type="submit" value="Back" class="ButtonBack"></td>
			<td><input name="Close" type="submit" value="Close" class="ButtonClose"></td>
			
		</form>
	</footer>

</html>