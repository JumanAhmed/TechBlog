<?php include 'inc/header.php';?>

<?php
   if (!isset($_GET['pageid']) || $_GET['pageid']== NULL) {
      //echo "<script>window.location='index.php';</script>";
      header("Location: 404.php");
   }else{
      $pageid = $_GET['pageid'];
   }

?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		 <?php
             $result = $db-> getPageById($pageid);
             if ($result) {
             foreach ($result as $item) {

           ?>

			<div class="about">
				<h2><?php echo $item['name']; ?></h2>
	
				<p><?php echo $item['body']; ?></p>
				
			</div>

				<?php } }else{header("Location: 404.php");} ?>
		</div>


		<?php include "inc/sidebar.php"; ?>
		<?php include "inc/footer.php"; ?>
		