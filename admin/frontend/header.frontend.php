<html>
	<head>
		<title>Go Adrina! - Management</title>
		<meta name="viewport" content="width=device-width" />
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/css/normalize.css" />
		<link rel="stylesheet" href="/css/foundation.css" />
		<link rel="stylesheet" href="/css/home.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
		<script src="/js/foundation.min.js"></script>
		<script src="/js/admin.js" ></script>
	</head>
	<body>
		<div class="row logo">
			<div class="large-12 columns">
				<div class="row">
					<div class="large-6 large-centered text-center columns">
						<a href="/"><img src="/img/goadrina_logo.png" /></a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<div class="row">
					<div class="large-4 large-centered columns">
						<ul class="inline-list">
						  	<li><a href="/admin/">Stats</a></li>
						  	<li><a href="/admin/groups.php">Groups</a></li>
						  	<li><a href="/admin/marketing.php">Marketing</a></li>
						  	<li><a href="/admin/posts.php">Posts</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php
		if ($success) { ?>
			<div class="row">
				<div class="large-12 columns">
					<div class="row">
						<div class="small-8 large-centered columns">
							<div data-alert class="alert-box success">
							  	<?php echo $success; ?>
								<a href="#" class="close">&times;</a>
							</div>
						</div>
					</div>
				<?php }
				?>

				<?php
				if ($errors) { ?>
					<div class="row">
						<div class="small-8 large-centered columns">
							<div data-alert class="alert-box alert">
							  	<?php echo $errors; ?>
								<a href="#" class="close">&times;</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php }
		?>