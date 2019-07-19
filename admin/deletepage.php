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
      echo "<script>window.location='index.php';</script>";
      //header("Location: catlist.php");
   }else{
      $pageid = $_GET['delid'];


      $delpage= $db-> deletePageByID($pageid);
       if ($delpage) {
          echo "<script>alert('Page Deleted Successfully !!');</script>";
          echo "<script>window.location = 'index.php';</script>";
       }else{
       	 echo "<script>alert('Page Not Deleted Successfully !!');</script>";
          echo "<script>window.location = 'index.php';</script>";
       }
  
   }

?>