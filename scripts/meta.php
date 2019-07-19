<?php
			if (isset($_GET['pageid'])) {
				$pageNum = $_GET['pageid'];
				$title = $db->getPageById($pageNum);
				foreach ($title as $key) {	
	  ?>
		<title><?php echo $key['name']; ?> - <?php echo title; ?></title>

	   <?php } } elseif (isset($_GET['id'])){
				$postNum = $_GET['id'];
				$title = $db->getPostById($postNum);
				foreach ($title as $key) {
	    ?>	

	    <title><?php echo $key['title']; ?> - <?php echo title; ?></title>		

		<?php } }else{  
		$path = $_SERVER['SCRIPT_FILENAME'];
		$title = $format->title($path); 
		?>
	
		<title><?php echo $title; ?> - <?php echo title; ?></title>
		
	<?php  } ?>

	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">

	<?php 
		  if (isset($_GET['id'])){
		  	 $postid = $_GET['id'];
		  	 $keyword = $db->getPostById($postid);
		  	 if ($keyword) {
		  	 	foreach ($keyword as $key) {
		  	 
	 ?>  	 
   	<meta name="keywords" content="<?php echo $key['tags'];?>">
    <?php } } }else{  ?>

		 	<meta name="keywords" content="<?php echo KEYWORDS;?>">
	<?php  } ?>
	<meta name="author" content="Delowar">