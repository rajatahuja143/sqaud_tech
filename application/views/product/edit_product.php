<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
	<title>User Signin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style>
		body {
		color: #fff;
		background: #63738a;
		font-family: 'Roboto', sans-serif;
	}

	.form-control {
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}

	.form-control:focus {
		border-color: #5cb85c;
	}

	.form-control,
	.btn {
		border-radius: 3px;
	}

	.signup-form {
		width: 450px;
		margin: 0 auto;
		padding: 30px 0;
		font-size: 15px;
	}

	.signup-form h2 {
		color: #fff;
		margin: 0 0 15px;
		position: relative;
		text-align: center;
	}

	.signup-form h2:before,
	.signup-form h2:after {
		content: "";
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}

	.signup-form h2:before {
		left: 0;
	}

	.signup-form h2:after {
		right: 0;
	}

	.signup-form .hint-text {
		color: #fff;
		margin-bottom: 30px;
		text-align: center;
	}

	.signup-form form {
		color: #999;
		border-radius: 3px;
		margin-bottom: 15px;
		background: #f2f3f7;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		padding: 30px;
	}

	.signup-form .form-group {
		margin-bottom: 20px;
	}

	.signup-form input[type="checkbox"] {
		margin-top: 3px;
	}

	.signup-form .btn {
		font-size: 16px;
		font-weight: bold;
		min-width: 140px;
		outline: none !important;
	}

	.signup-form .row div:first-child {
		padding-right: 10px;
	}

	.signup-form .row div:last-child {
		padding-left: 10px;
	}

	.signup-form a {
		color: #fff;
		text-decoration: underline;
	}

	.signup-form a:hover {
		text-decoration: none;
	}

	.signup-form form a {
		color: #5cb85c;
		text-decoration: none;
	}

	.signup-form form a:hover {
		text-decoration: underline;
	}
	</style>
</head>

<body>
	<div class="signup-form">
		<nav>
			<ul>
				<li class="active"><a href="<?php echo site_url('Product');?>">Product</a></li>
			</ul>
		</nav>
	</div>
	<?php
	if($type == 'normal'){
		$url = site_url('Product/update/'.$productId);
	}else if($type == 'draft'){
		$url = site_url('Product/updateDraft/'.$productId);
	}else{
		$url = '';
	}
	?>
	<form class="form" id="createForm" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-sm-12">
				<div class="form">
					<div class="row">
						<div class="col-sm-6 form-group">
							<label>Product Name</label>
							<input type="text" name="product_name" class="form-control" placeholder="Please Enter The Product Name" value="<?php echo $product['product_name'];?>">
						</div>
						<div class="col-sm-6 form-group">
							<label>Slug</label>
							<input type="text" name="slug" class="form-control" placeholder="Please Enter The Slug" value="<?php echo $product['slug'];?>">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 form-group">
							<label>Product Description</label>
							<textarea name="product_description" class="form-control" rows="5" placeholder="Please Enter The Product Description"> <?php echo $product['product_description'];?></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 form-group">
							<label>Images</label>
							<input type="file" name="pruduct_images[]" class="form-control" multiple="true">
						</div>
					</div>
					<div class="row">
						<?php
							if($type == 'normal'){
								$buttonText = 'Update';
							}else if($type == 'draft'){
								$buttonText = 'Update As Draft';
							}else{
								$buttonText = '';
							}
						?>
						<div class="col-sm-12 form-group">
							<button class="btn btn-primary" id="SaveDraft" onclick="checkBtn('<?php echo $type;?>',event)">
								<?php echo $buttonText;?></button>
							<?php if($type == 'draft') { ?>
							<button class="btn btn-success" id="finalSubmit" onclick="checkBtn('Final',event,'<?php echo $productId;?>')">Final Submit</button>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</body>
<script type="text/javascript">
function checkBtn(type, event, id = 0) {
	event.stopPropagation();
	var action = '';
	if (type == 'draft' || type == 'normal') {
		action = "<?php echo $url?>";
	} else {
		action = "<?php echo site_url('Product/create/')?>" + id + '/' + type;
	}
	//alert(action);
	$("#createForm").attr('action', action);
	$("#createForm").submit();
}
</script>

</html>