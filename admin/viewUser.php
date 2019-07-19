<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

<?php
   if (!isset($_GET['viewid']) || $_GET['viewid']== NULL) {
      echo "<script>window.location='userlist.php';</script>";
      //header("Location: catlist.php");
   }else{
      $uid = $_GET['viewid'];
   }
?>

        <div class="grid_10">	
            <div class="box round first grid">
                <h2>User Profile </h2>

                <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        echo "<script>window.location='userlist.php';</script>";
                 } 

                ?>

                <div class="block">  
                <?php
                       $postresult = $db-> getUserByid($uid);
                       if ($postresult) {
                           foreach ($postresult as $user){ 
                         
                 ?>             
                 <form action="" method="post">

                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $user['name'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text"  readonly value="<?php echo $user['uname'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $user['email'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Role</label>
                            </td>
                            <td>
                                <input type="text"  readonly value="<?php 
                               if ($user['role'] == '0') {
                                   echo "Admin";
                                }elseif ($user['role'] == '1') {
                                   echo "Author";
                                }elseif ($user['role'] == '2') {
                                   echo "Editor";
                                }    

                           ?> " class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea rows="7" cols="80"  readonly name="detail"><?php echo $user['details'];?></textarea>
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


