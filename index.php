
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>E-commerce website</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
		
		<script src="js/jquery.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<style>
		.popover
		{
		    width: 100%;
		    max-width: 800px;
		}

	    
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 15px;
  color: #6495ED;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: right;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}



		</style>
	</head>
	<body>

		 <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="custom-select-box">
                        
                    </div>
                    <div class="right-phone-box">
                        <p>Call us : <a href="#"> +2126-70-30-18-18</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="#"><i class="glyphicon glyphicon-user"></i> My Account</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-map-marker"></i> Our location</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-envelope"></i> Contact Us</a></li>
                        </ul>
                    </div>
                 <span style="font-size:20px;cursor:pointer; color: white; float: right" onclick="openNav()">&#9776;Categories</span>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Main Top -->
    <nav class="" role="navigation" style="float:right; margin:5px; display:block;">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="glyphicon glyphicon-menu-hamburger"></span>
						</button>
					</div>
					
					<div id="navbar-cart" class="navbar-collapse collapse" style="float:right;">
						<ul class="nav navbar-nav">
							<li>
								<a id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart">
									<span class="glyphicon glyphicon-shopping-cart"></span>
									<span class="badge"></span>
								</a>
							</li>
						</ul>
					</div>
			</nav>
<br />
		<div class="container">
			<br />
			<h1 class="m-b-20" align="center" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsFpkReUmPhqyhjlvQwocrY7mA9MTWQaelYQ&usqp=CAU'); color: black;"><strong>Welcome To<br> E-shopping website</strong></h1>
			<br />
			

			<div id="popover_content_wrapper" style="display: none">
				<span id="cart_details"></span>
				<div align="right">
					<a href="#" class="btn btn-primary" id="check_out_cart" style="background-color: green;">
					<span class="glyphicon glyphicon glyphicon-ok"></span> Check out order
					</a>
					<a href="#" class="btn btn-default" id="clear_cart">
					<span class="glyphicon glyphicon-trash"></span> clear cart
					</a>
				</div>
			</div>

            <br>
			<br>
			<div id="display_item" style="display:inline-block;">
 

			</div>
			
		</div>

		</div>
			<div id="cats" class="sidenav">
				
			</div>
	</body>
</html>
<script>  
function openNav() {
	if(document.getElementById("cats").style.width == "350px")
	{
		document.getElementById("cats").style.width = "0";
	}
	else
	{
       document.getElementById("cats").style.width = "350px";
	}

}


$(document).ready(function(){

	load_product();
	load_cart_data();
	load_category();

    
	function load_product(page)
	{
		$.ajax({
			url:"get_items.php",
			method:"POST",
			cache : false,
			data : {page_no:page},
			success:function(response)
			{
				$('#display_item').html(response);
			}
		});
	}

	function load_category()
	{
		$.ajax({
			url:"get_category.php",
			method:"POST",
			success:function(response)
			{
				$('#cats').html(response);
			}
		});
	}

	$(document).on("click", ".pagination li a", function(e){
      e.preventDefault();
      var pageId = $(this).attr("id");
      load_product(pageId);
      t(page);
    });

	function load_cart_data()
	{
		$.ajax({
			url:"getmycart.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
				$('#cart_details').html(data.cart_details);
				$('.badge').text(data.total_item);
			}
		});
	}

	$('#cart-popover').popover({
		html : true,
        container: 'body',
        content:function(){
        	return $('#popover_content_wrapper').html();
        }
	});

	$(document).on('click', '.add_to_cart', function(){
		var product_id = $(this).attr("id");
		var product_name = $('#name'+product_id+'').val();
		var product_price = $('#price'+product_id+'').val();
		var product_quantity = $('#quantity'+product_id).val();
		var action = "add";
		if(product_quantity > 0)
		{
			$.ajax({
				url:"operations.php",
				method:"POST",
				data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
				success:function(data)
				{
					load_cart_data();
				}
			});
		}
		else
		{
			alert("Enter a valid Quantity!!");
		}
	});

	$(document).on('click', '.delete', function(){
		var product_id = $(this).attr("id");
		var action = 'remove';
		if(confirm("do you really want to remove this product from your cart?"))
		{
			$.ajax({
				url:"operations.php",
				method:"POST",
				data:{product_id:product_id, action:action},
				success:function()
				{
					load_cart_data();
					$('#cart-popover').popover('hide');
				}
			})
		}
		else
		{
			return false;
		}
	});

	$(document).on('click', '#clear_cart', function(){
		var action = 'empty';
		$.ajax({
			url:"operations.php",
			method:"POST",
			data:{action:action},
			success:function()
			{
				load_cart_data();
				$('#cart-popover').popover('hide');
				
			}
		});
	});

	$(document).on('click', '.categories', function(){
		var cat_id = $(this).attr("id");
		$.ajax({
			url:"get_items.php",
			method:"POST",
			cache : false,
			data : {cat_id: cat_id},
			success:function(response)
			{
				$(window).scrollTop(0);
				$('#display_item').html(response);
				document.getElementById("pag").style.display = "none";
			}
		});
	
		
	});
    
});

</script>