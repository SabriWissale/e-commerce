<?php

ini_set('memory_limit', '1024M');

$pdo = new pdo('mysql:dbname=commerce', 'root');
$content = file_get_contents('./products.json');
$initial_products = json_decode($content);

$compteur = 0;
try {
foreach ($initial_products as $product ) {
	$compteur = $compteur + 1;
    if($compteur > 100)
	{
		break;
	}
       $ref = $product->sku;
       $categories = $product->category;
    foreach ($categories as $cat ) {
                 $id = $cat->id;
		  $sql = "INSERT INTO belongs_products_category VALUES(:ref, :id)";
	      $stmt = $pdo->prepare($sql);
	      $stmt->execute([
		   'id' => $id,
		   'ref' => $ref,
	]);
	}
	
}

echo 'DONE';
}
catch(PDOException $e)
{
   echo $e->getMessage();
}


$compteur = 0;
try {
foreach ($initial_products as $product ) {
	$compteur = $compteur + 1;
    if($compteur > 100)
	{
		break;
	}

	$categories = $product->category;
    foreach ($categories as $cat ) {
                  $id = $cat->id;
		  $name = $cat->name;
		  $sql = "INSERT INTO category VALUES(:id, :name)";
	      $stmt = $pdo->prepare($sql);
	      $stmt->execute([
		   'id' => $id,
		   'name' => $name,
	]);
	}
	
}

echo 'DONE';
}
catch(PDOException $e)
{
   echo $e->getMessage();
}

$compteur = 0;
try {
foreach ($initial_products as $product ) {
	$compteur = $compteur + 1;
    if($compteur > 100)
	{
		break;
	}
       $ref = $product->sku;
       $categories = $product->category;
    foreach ($categories as $cat ) {
                 $id = $cat->id;
		  $sql = "INSERT INTO belongs_products_category VALUES(:ref, :id)";
	      $stmt = $pdo->prepare($sql);
	      $stmt->execute([
		   'id' => $id,
		   'ref' => $ref,
	]);
	}
	
}

echo 'DONE';
}
catch(PDOException $e)
{
   echo $e->getMessage();
}

?>