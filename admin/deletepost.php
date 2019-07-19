<?php 
  include '../lib/Session.php';
  Session::checkSeassion();
?>
<?php include '../lib/DatabasePDO.php';?>

<?php  
     $db = new Database();
 ?>

<?php
   if (!isset($_GET['delpostid']) || $_GET['delpostid']== NULL) {
      echo "<script>window.location='catlist.php';</script>";
      //header("Location: catlist.php");
   }else{
      $postid = $_GET['delpostid'];

      $result = $db-> getPostById($postid);
      if ($result) {
      	 foreach ($result as $item) {
      	 	$dellink = $item['image'];
      	 	unlink($dellink);
      	 }
      }

      $delData= $db-> deletePostByID($postid);
       if ($delData) {
          echo "<script>alert('Data Deleted Successfully !!');</script>";
          echo "<script>window.location = 'postlist.php';</script>";
       }else{
       	 echo "<script>alert('Data nOT Deleted Successfully !!');</script>";
          echo "<script>window.location = 'postlist.php';</script>";
       }
  
   }

?>