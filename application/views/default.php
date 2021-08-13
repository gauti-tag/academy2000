<!DOCTYPE html>
<html>
<head>
	<title>Academie 2000</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo site_url()?>assets/front/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo site_url()?>assets/front/css/jquery.bxslider4.2.12.css">
	<link rel="stylesheet" href="<?php echo site_url()?>assets/front/css/style.css">

</head>
<body>

  <div class="container">

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#"><img class="img-fluid" src="<?php echo site_url() ?>assets/front/img/LOGO.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mx-auto">

					<li class="nav-item active dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Cursus
						</a>
						<div class="dropdown-menu menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">Graphisme</a>
							<a class="dropdown-item" href="#">Vidéo</a>
							<a class="dropdown-item" href="#">Animation</a>
							<a class="dropdown-item" href="#">3D</a>
							<a class="dropdown-item" href="#">Développement</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Préinscription</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Certificats</a>
					</li>

				</ul>

				<div>
					<img src="<?php site_url()  ?>assets/front/img/+225-95-01-68-40.png">
				</div>
			</div>
		</nav>



       <?php echo $output;  ?>


  </div>

<script src="<?php echo site_url()?>assets/front/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?php echo site_url()?>assets/front/js/popper1.16.1.min.js"></script>
<script src="<?php echo site_url()?>assets/front/js/bootstrap4.6.bundle.min.js"></script>
<script src="<?php echo site_url()?>assets/front/js/bootstrap.js"></script>
<script src="<?php echo site_url()?>/assets/front/js/jquery.bxslider.min4.2.12.js"></script>
<script src="<?php echo site_url()?>assets/front/js/script.js"></script>


  <script>
	  $(document).ready(function(){
		  $('.slider').bxSlider({
			  controls : false,
			  caption: false,
			  pager: false

		  });
	  });
  </script>

</body>
</html>
