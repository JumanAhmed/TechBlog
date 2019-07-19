<?php 
  include '../lib/Session.php';
  Session::checkSeassion();
?>
<?php include '../lib/DatabasePDO.php';?>

<?php  
     $db = new Database();
 ?>

<?php
   if (!isset($_GET['delid']) || $_GET['delid']== NULL) {
      echo "<script>window.location='sliderlist.php';</script>";
      //header("Location: catlist.php");
   }else{
      $delid = $_GET['delid'];

      $result = $db-> getsSliderById($delid);
      if ($result) {
      	 foreach ($result as $item) {
      	 	$dellink = $item['image'];
      	 	unlink($dellink);
      	 }
      }

      $delData= $db-> deleteSliderByid($delid);
       if ($delData) {
          echo "<script>alert('Slider Deleted Successfully !!');</script>";
          echo "<script>window.location = 'sliderlist.php';</script>";
       }else{
       	 echo "<script>alert('Slider Not Deleted Successfully !!');</script>";
          echo "<script>window.location = 'sliderlist.php';</script>";
       }
  
   }

?>