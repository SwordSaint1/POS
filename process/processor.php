<?php
include 'conn.php';
$method = $_POST['method'];

// if($method == 'add'){
// 	$id = $_POST['id'];
// 	$query = "SELECT id,product_name,price FROM products WHERE id =' $id' ";
// 	$stmt = $conn->prepare($query);
// 	$stmt->execute();

// 	if($stmt->rowCount() > 0){
	
// 		foreach($stmt->fetchALL() as $x){
// 			$price = $x['price'];
// 			$tid = $x['id'];
// 			$pname = $x['product_name'];

// 		}


// 		$q = "SELECT quantity FROM transaction WHERE product_name LIKE '$pname%'";
// 		$stmt = $conn->prepare($q);
// 		$stmt->execute();
// 				foreach($stmt->fetchALL() as $j){
// 						$tquantity = $j['quantity'];
// 				}
// 		$qty = $tquantity + 1;
// 		$new_price = $price * $tquantity;
// 		$update = "UPDATE transaction SET total = '$newprice' WHERE id = '$tid'";
// 		$stmt = $conn->prepare($update);
// 		$stmt->execute();

// 	}else{
// 		$insert = "INSERT INTO transaction (`product_name`,`quantity`,`total`) VALUES
// 		'$pname', '1', '$newprice'";
// 	}

// }

if ($method == 'add') {
		$id = $_POST['id'];
		$price = $_POST['price'];
		$product_name = $_POST['product_name'];

		$check = "SELECT * FROM products WHERE id = '$id'";
		$stmt =$conn->prepare($check);
		$stmt->execute();
				if($stmt->rowCount() > 0){
						foreach($stmt->fetchALL() as $x){
							$price = $x['price'];
							$product_name = $x['product_name'];
							$qty = $['quantity'];
						}
					
							$total = $price * $qty;
		$insert = "INSERT INTO transaction (`product_name`,`quantity`,`total`) VALUES ('$product_name', '1', '$total' )";

			$stmt = $conn->prepare($insert);
			$stmt->execute();
				}



}



	?>