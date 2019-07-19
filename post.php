<?php include 'inc/header.php';?>


 <?php
 	if (!isset($_GET['id']) || $_GET['id']==NULL) {
 		 header("Location: 404.php");
 	}else{
 		$id = $_GET['id'];
 	}

 ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">

			<?php 
					$post = $db->getPostById($id);
					if ($post) {
					foreach ($post as $result) {
			
			 ?>
			   <!-- Title-->
				<h2><?php  echo  $result['title']; ?></h2>
				
				<!-- date and author-->
				<h4><?php echo  $format-> formateDate($result['date']); ?><a href="#"><?php echo " ".$result['author']; ?></a></h4>

				<!-- Image-->
				<img src="admin/<?php echo $result['image'];?>" alt="MyImage"/>
				
				<!-- Body-->
				<?php echo $result['body'];?>
				<?php  } ?><!-- end foreach-->
			
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php  
							$catid = $result['cat'];
							$limit = 6;
							$relatedPost= $db->getRelatedPost($catid, $limit); 
							if ($relatedPost) {
								foreach ($relatedPost as $rresult) {
						
					?>

				 <a href="post.php?id=<?php echo $rresult['id']; ?>">
				 	<img src="admin/<?php echo $rresult['image'];?>" alt="post image"/>
				 </a>

				<?php }  }else{ echo "No Related Post Available !! ";} ?>

				</div> 

				<?php  }else{ header("Location: 404.php");}?>
	</div>

	</div>
		

    <?php  include 'inc/sidebar.php'; ?>
    <?php  include 'inc/footer.php'; ?>

