<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

		<!-- Pagination-->
        
        <?php
        		$per_page =3;
        		if (isset($_GET['page'])) {
        			$page = $_GET['page'];
        		}else{
        			$page = 1;
        		}
        		$start_form = ($page -1) * $per_page;  // if Per_page =4 then start from (0,4,8,12.......);
        ?>

		<!-- Pagination-->

           <?php  
                
                  $allinfo = $db-> getPostFromPagination($start_form,$per_page);
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
            
            <?php  } ?> <!-- Foreach loop end here-->

            <!-- Pagination-->
              
             <?php    
  				$total_rows = $db->tablePostRowCount();
  				$total_pages = ceil($total_rows / $per_page);


             echo "<span class='pagination'><a href='index.php?page=1'>".'First Page'."</a>" ;
   			 for ($i=1; $i <=$total_pages ; $i++) { 
   			 	echo "<a href='index.php?page=".$i."'>".$i."</a>";
   			 }

             echo  "<a href='index.php?page=$total_pages'>".'Last Page'."</a></span>"; ?>
            <!-- pagination-->

			<?php } else{ header("Location:404.php");} ?>
		

    </div>

    <?php include "inc/sidebar.php"; ?>
    <?php include "inc/footer.php"; ?>



	

		

