<?php
	
	//σύνδεση με την βάση δεδομένων που ονομάζεται business. Η πρώτη παράμετρος είναι ο host. Το username είναι root και το password ''.
	$con = new mysqli('localhost', 'id18202822_root', 'S5?b\DrSG$4!wMDe', 'id18202822_business');
	
	//ελέγχουμε αν έγινε η σύνδεση.
	if(!$con){
		die(mysqli_error($con));
	}
?>