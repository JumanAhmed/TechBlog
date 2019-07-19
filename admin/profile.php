<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

<?php
    $userId   = Session::get('uid');
    $UserRole = Session::get('urole');
?>

        <div class="grid_10">	
            <div class="box round first grid">
                <h2>Update Your Profile </h2>

                <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST"){

                          $name       = $_POST['name'];
                          $uname      = $_POST['uname'];
                          $email      = $_POST['email'];
                          $detail     = $_POST['detail'];
       
                    $result = $db-> updateUserInfoByid($name,$uname,$email,$detail,$userId);
                            if ($result) {
                             echo "<span class='success'>User Info Updated Successfully.
                             </span>";
                            }else {
                             echo "<span class='error'>User Info Not Updated !</span>";
                            }
                 } 

                ?>

                <div class="block">  
                <?php
                       $postresult = $db-> getAdminPnlMemberBYId($userId,$UserRole);
                       if ($postresult) {
                           foreach ($postresult as $singlepost){ 
                         
                 ?>             
                 <form action="" method="post">

                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name"  value="<?php echo $singlepost['name'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text" name="uname"  value="<?php echo $singlepost['uname'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email"  value="<?php echo $singlepost['email'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Role</label>
                            </td>
                            <td>
                                <input type="text"  readonly value="<?php 
                                 if ($singlepost['role']== "0") {
                                     echo "Admin";
                                 }elseif ($singlepost['role']== "1") {
                                     echo "Author";
                                 }elseif ($singlepost['role']== "2") {
                                     echo "Editor";
                                 }
                                ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="detail"><?php echo $singlepost['details'];?></textarea>
                            </td>
                        </tr>
                     
                       
						            <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
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


