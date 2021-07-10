<?php 

if(!isset($_SESSION['produto'])) {
	$_SESSION['produto'] = array();
}
else
if(!isset($_SESSION['pacote'])) {
	$_SESSION['pacote'] = array();
}

function addCart($id, $quantity) {
	if(!isset($_SESSION['produto'][$id])){ 
		$_SESSION['produto'][$id] = $quantity; 
	}
	else
	if(!isset($_SESSION['pacote'][$id])){ 
		$_SESSION['pacote'][$id] = $quantity; 
	}
}

function deleteCart($id) {
	if(isset($_SESSION['produto'][$id])){ 
		unset($_SESSION['produto'][$id]); 
	} 
	else
	if(isset($_SESSION['pacote'][$id])){ 
		unset($_SESSION['pacote'][$id]); 
	} 
}

function updateCart($id, $quantity) {
	if(isset($_SESSION['produto'][$id])){ 
		if($quantity > 0) {
			$_SESSION['produto'][$id] = $quantity;
		} else {
		 	deleteCart($id);
		}
	}
	else
	if(isset($_SESSION['pacote'][$id])){ 
		if($quantity > 0) {
			$_SESSION['pacote'][$id] = $quantity;
		} else {
		 	deleteCart($id);
		}
	}
}

function getContentCart($pdo) {
	
	$results = array();
	
	if($_SESSION['produto']) {
		
		$cart = $_SESSION['produto'];
		$products =  getProductsByIds($pdo, implode(',', array_keys($cart)));

		foreach($products as $product) {

			$results[] = array(
							  'id' => $product['id_prod'],
							  'name' => $product['desc_prod'],
							  'img' => $product['img'],
							  'price' => $product['valor'],
							  'quantity' => $cart[$product['id_prod']],
							  'subtotal' => $cart[$product['id_prod']] * $product['valor'],
						);
		}
	}
		else
		if($_SESSION['pacote']) {
		
			$cart = $_SESSION['pacote'];
			$products =  getPacoteByIds($pdo, implode(',', array_keys($cart)));
	
			foreach($products as $product) {
	
				$results[] = array(
								  'id' => $product['id_pacote'],
								  'name' => $product['desc_pacote'],
								  'img' => $product['img'],
								  'price' => $product['valor'],
								  'quantity' => $cart[$product['id_pacote']],
								  'subtotal' => $cart[$product['id_pacote']] * $product['valor'],
							);
			}
	}
	
	return $results;
}

function getTotalCart($pdo) {
	
	$total = 0;

	foreach(getContentCart($pdo) as $product) {
		$total += $product['subtotal'];
		$_SESSION['total'] = $total;
	} 
	return $total;
}