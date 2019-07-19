<?php include 'lib/DatabasePDO.php';?>
<?php include 'helpers/Format.php';?>
<?php include 'config/config.php';?>

<?php  
     $db = new Database();
     $format = new Format();
     
 ?>

<!DOCTYPE html>
<html>
<head>

	<?php include 'scripts/meta.php'; ?> 
	<?php include 'scripts/css.php'; ?>
	<?php include 'scripts/js.php'; ?>

</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<div class="logo">

	<?php
            $result = $db-> getTitleSlogan();
            if ($result) {
                foreach ($result as $item) {
                   
            
     ?>
				<img src="admin/<?php echo $item['logo'];?>" alt="Logo"/>
				<h2><?php echo $item['title'];?></h2>
				<p><?php echo $item['slogan'];?></p>

		<?php } } ?>
			</div>
		</a>
		<div class="social clear">
			<?php 
                        $id = 1;
                        $result = $db->getsocialsite($id);
                        if ($result) {
                          foreach ($result as $item) {
                                
                ?>  
			<div class="icon clear">
				<a href="<?php echo $item['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $item['tw'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $item['ln'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $item['gp'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
			<?php } } ?>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">

<?php 
      $path = $_SERVER['SCRIPT_FILENAME'];
      $currentPage = basename($path, '.php');
?>

	<ul>
		<li><a <?php if ($currentPage == 'index') {
			echo 'id="active"';
		} ?> href="index.php">Home</a></li>
		 <?php
                                $result = $db-> getAllPage();
                                if ($result) {
                                    foreach ($result as $item) {
                         ?>

                          <li><a <?php
                          if (isset($_GET['pageid']) && $_GET['pageid'] == $item['id']) {    
                              	echo 'id="active"';
                          }
                         ?> href="page.php?pageid=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></li>

                        <?php   } } ?>
		<li><a <?php if ($currentPage == 'contact_us') {
			echo 'id="active"';
		} ?> href="contact_us.php">Contact</a></li>
	</ul>
</div>
