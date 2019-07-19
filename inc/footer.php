</div>
	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	      <?php 
          $id = 1;
           $result = $db->getCopyRight($id);
           if ($result) {
           foreach ($result as $item) {
                                
         ?>    
	  <p>&copy; <?php echo $item['note']; ?> <?php echo date('Y'); ?> </p>
	   <?php  }  } ?>
	</div>
	<div class="fixedicon clear">
	<?php 
                        $id = 1;
                        $result = $db->getsocialsite($id);
                        if ($result) {
                          foreach ($result as $item) {
                                
                ?>  
		<a href="<?php echo $item['fb'];?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $item['tw'];?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $item['ln'];?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $item['gp'];?>"><img src="images/gl.png" alt="GooglePlus"/></a>
		<?php } } ?>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>