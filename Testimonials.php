<!DOCTYPE html>
<html>
	<head>
		<?php include("header.php");?>

		<link href="css/testimonialstyle.css" rel="stylesheet" />

		<title>Testimonials</title>
	</head>

	<body>
		<div id="body-part">
			<!--Wrapper div used to work with this part as a whole-->
			<div id="wrapper">
				<?php include("menu.php");?>

				<div id="pageName"><h1>Client Testimonials</h1></div>
				<section id="testimonialsSection">
					<p class="caption">Hear from our happy costumers!</p>

					<script src="js/testimonials.js"></script>
				</section>
			</div>
		</div>

		<?php include("footer.php");?>
		<script
			src="js/general.js"
			onload="changeColorOfMenu('testimonials')"
		></script>
	</body>
</html>
