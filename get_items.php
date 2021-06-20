<?php


	// Connect database 
	$connect = mysqli_connect("localhost", "root", "", "commerce");

	$limit = 8;

	if (isset($_POST['page_no'])) {
	    $page_no = $_POST['page_no'];
	}else{
	    $page_no = 1;
	}

	$offset = ($page_no-1) * $limit;
    $output = '';
	if (!empty($_POST['cat_id'])) 
	{
		$id = $_POST['cat_id'];
		$query = "SELECT * FROM products INNER JOIN belongs_products_category ON products.REF =belongs_products_category.REF AND belongs_products_category.ID = '$id' ORDER BY PRICE DESC";
	}
	else 
	{
       $query = "SELECT * FROM products ORDER BY PRICE DESC LIMIT $offset, $limit";
	}

	$result = mysqli_query($connect, $query);

	$output = "</br>";

	if (mysqli_num_rows($result) > 0) {

	while ($row = mysqli_fetch_assoc($result)) {
    $titre = substr($row["NAME"], 0, 40);
		$output .= '
		<div class="col-md-3" style="margin-top:12px;">  
            <div style="border:2px inset #E0FFFF; background-color:#E0FFFF; border-radius:8px; padding:20px; height:350px; position:relative;" align="center">
            	<img src="'.$row["IMAGE"].'" class="img-responsive" style="width: 100px; height: 100px; object-fit: cover;" /><br />
            	<h4 class="text-info">'.$titre.'</h4>
            	<h4 class="text-danger" style="color:black;"> '.$row["PRICE"] .'$ </h4>
            	<input type="text" name="quantity" id="quantity' . $row["REF"] .'" class="form-control" value="1"" />
            	<input type="hidden" name="hidden_name" id="name'.$row["REF"].'" value="'.$row["NAME"].'" />
            	<input type="hidden" name="hidden_price" id="price'.$row["REF"].'" value="'.$row["PRICE"].'" />
            	<input type="button" name="add_to_cart" id="'.$row["REF"].'" style="margin-top:7px; background-color: #5F9EA0; color: white;" class="btn  form-control add_to_cart" value="get product" />
            </div>
        </div>
		';
	} 


	$sql = "SELECT * FROM products";

	$records = mysqli_query($connect, $sql);

	$totalRecords = mysqli_num_rows($records);

	$totalPage = ceil($totalRecords/$limit);

	$output.="<ul id='pag' class='pagination justify-content-center' style='margin:40px 320px;' ><li class='page-item'></li>";

	for ($i=1; $i <= $totalPage ; $i++) { 
	   if ($i == $page_no) {
		$active = "active";
	   }else{
		$active = "";
	   }

	    $output.="<li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>";
	}

	$output .= "<li class='page-item'></ul>";

	echo $output;

	}

?>