<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css">

		 <?php 
		                      
		         $result = $db-> selecttheme();
		             if ($result) {
		            foreach ($result as $key) {
		             if ($key['theme'] == 'default') {
		             		
		?>
		    <link rel="stylesheet" href="theme/default.css">

		<?php }elseif ($key['theme'] == 'neveyblue') { ?>

			<link rel="stylesheet" href="theme/neveyblue.css">

		<? }elseif ($key['theme'] == 'green') { ?>

         <link rel="stylesheet" href="theme/green.css">

        <?php } } } ?>