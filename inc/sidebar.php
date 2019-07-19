<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
					<?php 

						 $allcat = $db->allcatagori();
						 if ($allcat) {
						 foreach ($allcat as $item) {
						 ?>
						 <li><a href="posts.php?catid=<?php echo $item['id'];?>"><?php  echo $item['name'];?></a></li>
					
						<?php  }  }else{  ?>	
							<li> No Categori Created</li>
						<?php }?>	

					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>


           <?php  

           		 $limit =5;
                  $allinfo = $db-> getAllLeatestPost($limit);
                  if ($allinfo) {
                   foreach ($allinfo as $singleinfo) {
                   
           ?>
			<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $singleinfo['id']; ?>"><?php echo $singleinfo['title']; ?></a></h3>

					<a href="post.php?id=<?php echo $singleinfo['id']; ?>"><img src="admin/<?php echo $singleinfo['image'];?>" alt="post image"/></a>

					 <?php echo  $format->textShorten($singleinfo['body'], 130); ?>

	
			</div>
			<?php } }else{ header("Location:404.php");} ?>
			
		</div>

</div>


