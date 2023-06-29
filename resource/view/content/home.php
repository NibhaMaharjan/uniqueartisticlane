<?php
## ===*=== [C]ALLING CONTROLLER ===*=== ##
include("app/Http/Controllers/Controller.php");
include("app/Http/Controllers/HomeController.php");


## ===*=== [O]BJECT DEFINED ===*=== ##
$homeCtrl = new HomeController;
$eloquent = new Eloquent;


## ===*=== [F]ETCH SLIDER DATA FOR HOME PAGE SLIDER ===*=== ##
$columnName = $tableName = null;
$columnName = "*";
$tableName = "slides";
$slidesList = $eloquent->selectData($columnName, $tableName);

$columnName = $tableName = $whereValue = null;
$columnName["1"] = "id";
$columnName["2"] = "product_name";
$columnName["3"] = "product_price";
$columnName["4"] = "product_master_image";
$tableName = "products";
$whereValue["category_id"] = 1;	
$whereValue["product_status"] = "In Stock";
$formatBy["DESC"] = "id";
$paginate["POINT"] = 0;
$paginate["LIMIT"] = 8;
$menProducts = $eloquent->selectData($columnName, $tableName, @$whereValue, @$inColumn, @$inValue, @$formatBy, @$paginate);

$columnName = $tableName = $whereValue = $inColumn = $inValue = $formatBy = $paginate = null;
$columnName["1"] = "id";
$columnName["2"] = "product_name";
$columnName["3"] = "product_price";
$columnName["4"] = "product_master_image";
$tableName = "products";
$whereValue["category_id"] = 8;	
$whereValue["product_status"] = "In Stock";
$formatBy["DESC"] = "id";
$paginate["POINT"] = 0;
$paginate["LIMIT"] = 8;
$watchProducts = $eloquent->selectData($columnName, $tableName, @$whereValue, @$inColumn, @$inValue, @$formatBy, @$paginate);

?>

<!--=*= HOME SECTION START =*=-->
<main class="main">
	<div class="home-top-container">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="home-slider owl-carousel owl-carousel-lazy">
						
					<?php 
						foreach($slidesList AS $eachSlide)
						{
							echo '
							<div class="home-slide">
								<img class="owl-lazy" src="public/assets/images/lazy.png" data-src="'.$GLOBALS['SLIDES_DIRECTORY'] . $eachSlide['slider_file'].'" alt="slider image">
								<div class="home-slide-content">
									<h1 class="text-primary">'.$eachSlide['slider_title'].'</h1>
								</div>
							</div>';
						}
					?>
					
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="info-boxes-container">
		<div class="container">
			<div class="info-box">
				<i class="icon-shipping"></i>
				<div class="info-box-content">
					<h4>FREE SHIPPING & RETURN</h4>
					<p>Free shipping on all orders over Rs 10000.</p>
				</div>
			</div>
			<div class="info-box">
				<i class="icon-us-dollar"></i>
				<div class="info-box-content">
					<h4>MONEY BACK GUARANTEE</h4>
					<p>100% money back guarantee</p>
				</div>
			</div>
			<div class="info-box">
				<i class="icon-support"></i>
				<div class="info-box-content">
					<h4>ONLINE SUPPORT 24/7</h4>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="home-product-tabs">
					<div class="tab-content">
						<div class="tab-pane fade show active" id="featured-products" role="tabpanel" aria-labelledby="featured-products-tab">
							<div class="row row-sm">
								
							<?php
								$homeCtrl->productLister($menProducts);
							?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="home-product-tabs">
					<div class="tab-content">
						<div class="tab-pane fade show active" id="featured-products" role="tabpanel" aria-labelledby="featured-products-tab">
							<div class="row row-sm">
								
							<?php
								
								$homeCtrl->productLister($watchProducts);
							?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<!--=*= HOME SECTION START =*=-->