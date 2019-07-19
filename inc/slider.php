<div class="slidersection templete clear">
        <div id="slider">
        <?php 
        		$result = $db-> selectAllSliderLimited5();
        		if ($result) {
        			foreach ($result as $key) {
        ?>
            
            <a href="<?php echo $key['link'];?>"><img src="admin/<?php echo $key['image'];?>" alt="<?php echo $key['title'];?>" title="<?php echo $key['title'];?>" /></a>

       <?php } }  ?>
       
        </div>

</div>