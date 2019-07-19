<?php include 'inc/header.php';?>


 <?php
 	if (!isset($_GET['search']) || $_GET['search']==NULL) {
 		 header("Location: 404.php");
 	}else{
 		$search = $_GET['search'];
 	}

 ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php 
					$find = $db->searchFromPost($search);
					if ($find) {
					foreach ($find as $result) {
			
			 ?>

			<div class="about">

			   <!-- title-->
				<h2 ><a href="post.php?id=<?php echo $result['id']; ?>" style="text-decoration:none;"><?php echo $result['title']; ?></a></h2>

				<!-- date and author-->
				<h4><?php echo  $format-> formateDate($result['date']); ?><a href="#"><?php echo " ".$result['author']; ?></a></h4>

				 <!-- image-->
				 <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>

				 <!-- body-->
				 <?php echo  $format->textShorten($result['body'], 400); ?>

				 <!-- Read more Button-->
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
				</div>
	</div>

		<?php   } }else{   ?>
		<h2 style="color: red"> Nothing Found !!</h2>
		<?php  } ?>

		</div>
		

    <?php  include 'inc/sidebar.php'; ?>
    <?php  include 'inc/footer.php'; ?>

