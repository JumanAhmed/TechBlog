<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

<?php
 if (!isset($_GET['viewid']) || $_GET['viewid']==NULL) {
     echo "<script>window.location='postlist.php';</script>";
     //header("Location: postlist.php");
 }else{
    $viewid = $_GET['viewid'];
 }

?>

        <div class="grid_10"> 
            <div class="box round first grid">
                <h2>View Post</h2>

                <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                         
                      echo "<script>window.location='postlist.php';</script>";

                  }
                ?>

                <div class="block">  
                <?php
                       $postresult = $db-> getPostById($viewid);
                       if ($postresult) {
                           foreach ($postresult as $singlepost){ 
                         
                 ?>             
                 <form action="" method="post" enctype="multipart/form-data">

                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" readonly  value="<?php echo $singlepost['title'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>

                              <?php
                                 $result = $db->getAllCategory ();
                                 if ($result) {
                                foreach ($result as $item) {
                                 if($singlepost['cat'] == $item['id']) {

                              ?>
  

                    <input type="text" readonly  value="<?php   echo $item['name']; ?>"      class="medium"  />
                         
                                    <?php } } } ?>
                            </td>
                        </tr>
                   
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Uploaded Image</label>
                            </td>
                            <td >
                            <img src="<?php  echo $singlepost['image'];?>" height="80px" width="100px"><br>
                               
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"><?php echo $singlepost['body'];?></textarea>
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Author Name</label>
                            </td>
                            <td>
                                <input type="text" readonly name="author"  value="<?php echo $singlepost['author']; ?>" class="medium" />
                                  <input type="hidden"  name="userid"  value="<?php echo Session::get('uid');?>" class="medium" />
                            </td>
                         </tr>
                         <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" readonly  value="<?php echo $singlepost['tags'];?>" class="medium" />
                            </td>
                        </tr>
            <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="OK" />
                            </td>
                        </tr>
                    </table>
                   
                    </form>
                     <?php  } } ?>
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


