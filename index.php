<?php
session_start();
include 'admin/assets/model/db.php';
include 'admin/assets/libs/helper/helper.php';
$db = new Db();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>UKM Dua Putra</title>
	<?php include 'components/head.php' ?>
</head>

<body>
	<?php include 'components/top-bar.php' ?>
	<!-- Header End====================================================================== -->
	<?php include 'components/slider.php' ?>
	<div id="mainBody">
		<div class="container">
			<div class="row">
				<!-- Sidebar ================================================== -->
				<?php include 'components/side-bar.php' ?>
				<!-- Sidebar end=============================================== -->
				<?php include 'content.php' ?>
			</div>
		</div>
	</div>
	<!-- Footer ================================================================== -->
	<?php include 'components/footer.php' ?>
	<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<?php include 'components/scripts.php' ?>

</body>

</html>