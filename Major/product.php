<?php 

function getProducts($pdo){
	$sql = "SELECT *  FROM produto ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductsByIds($pdo, $ids) {
	$sql = "SELECT * FROM produto WHERE id_prod IN (".$ids.")";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPacote($pdo){
	$sql = "SELECT *  FROM pacote ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPacoteByIds($pdo, $ids) {
	$sql = "SELECT * FROM pacote WHERE id_pacote IN (".$ids.")";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);
}