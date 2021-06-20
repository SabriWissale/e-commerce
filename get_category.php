<?php


	// Connect database 
	$connect = mysqli_connect("localhost", "root", "", "commerce");

	

	$query = "SELECT * FROM category";

	$result = mysqli_query($connect, $query);

	$output = '<ul class="list-group">';

	if (mysqli_num_rows($result) > 0) {

	while ($row = mysqli_fetch_assoc($result)) {

		$sql = "SELECT * from belongs_products_category WHERE ID ='".$row["ID"]."'";

	    $records = mysqli_query($connect, $sql);

	    $totalRecords = mysqli_num_rows($records);

		$output .= '<li class="list-group-item text-center categories" id="'.$row["ID"].'"><a>' . $row["NAME"] .'('. $totalRecords .')</a></li>';
	} 

	$output .= '</ul>';

	echo $output;
}


?>