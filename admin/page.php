<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

<?php
   if (!isset($_GET['pageid']) || $_GET['pageid']== NULL) {
      echo "<script>window.location='index.php';</script>";
      //header("Location: catlist.php");
   }else{
      $pageid = $_GET['pageid'];
   }

?>

<style>
.actiondel{margin-left: 10px;}    
.actiondel a{
 background: #f0f0f0 none repeat scroll 0 0;
 border: 1px solid #ddd;
 color: #444;
 cursor: pointer; font-size: 20px; font-weight: normal; padding: 4px 10px;
 border-radius: 5px;
}    

</style>

        <div class="grid_10">	
            <div class="box round first grid">
                <h2>Update Page</h2>

                <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                          $name    = $_POST['name'];
                          $body    = $_POST['body'];
                         

                         if (empty($name) || empty($body)) {
                            echo "<span class = 'error'>Field must not be empty !!</span>";
                        
                            }else{

                                    $result = $db-> updatePages($name,$body,$pageid);
                                    if($result) {
                                     echo "<span class='success'>Page Updated Successfully.
                                     </span>";
                                    }else {
                                     echo "<span class='error'>Page Not Updated!</span>";
                                    }
                       }

                }
             ?>

                <div class="block">       
                  <?php
                                $result = $db-> getPageById($pageid);
                                if ($result) {
                                foreach ($result as $item) {

                 ?>

                 <form action="" method="post" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Page Name</label>
                            </td>
                            <td>
                                <input type="text" name="name"  value="<?php echo  $item['name'];?>" class="medium" />
                            </td>
                        </tr>
                     
                   
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Body</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"><?php echo  $item['body'];?></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                 <span class="actiondel"><a onclick="return confirm('Are You Sure to Delete Thsi Page !!');" href="deletepage.php?delid=<?php echo $item['id'];?>">Delete</a></span>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } } ?>
                </div>
            </div>
        </div>

 <!--Load TinyMCE-->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<!--Load TinyMCE-->       

<?php include'inc/footer.php'; ?>


