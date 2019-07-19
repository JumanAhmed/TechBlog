<?php include 'inc/header.php';?>

<?php
 	if (!isset($_GET['catid']) || $_GET['catid']==NULL) {
 		 header("Location: 404.php");
 	}else{
 		$id = $_GET['catid'];
 	}

 ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">


           <?php  
                  $allinfo = $db-> getAllCatPost($id);
                  if ($allinfo) {
                   foreach ($allinfo as $singleinfo) {
                  
           ?>

			<div class="samepost clear">

				<!-- title-->
				<h2><a href="post.php?id=<?php echo $singleinfo['id']; ?>"><?php echo $singleinfo['title']; ?></a></h2>

				<!-- date and author-->
				<h4><?php echo  $format-> formateDate($singleinfo['date']); ?><a href="#"><?php echo " ".$singleinfo['author']; ?></a></h4>

				 <!-- image-->
				 <a href="#"><img src="admin/<?php echo $singleinfo['image'];?>" alt="post image"/></a>

				 <!-- body-->
				 <?php echo  $format->textShorten($singleinfo['body'], 400); ?>

				 <!-- Read more Button-->
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $singleinfo['id']; ?>">Read More</a>
				</div>

			</div>


			<?php } }else{ ?>
				<h3>No Post Available in this Category !!!</h3>
				<?php  } ?>
		</div>


		<?php include "inc/sidebar.php"; ?>
		<?php include "inc/footer.php"; ?>
