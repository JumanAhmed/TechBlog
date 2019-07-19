<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Change Password</h2>

            <?php
             
             if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $oldpwd = $format-> test_input(md5($_POST['oldpwd']));
                  $newpwd = $format-> test_input(md5($_POST['newpwd']));

                  $uname = Session::get('uname');
                  $uid = Session::get('uid');

                  $query = $db-> loginAdminPanel($uname,$oldpwd);
                  //$allinfo = $query->fetch();
                  $num = $query->rowCount();

                  if ($num == 1) {
                       $pwdUpdate = $db-> updateUserPassword($newpwd,$uid);
                       if ($pwdUpdate) {
                           echo "<span style= 'color: green;'>Password Updated Successfully !</span>";
                       }else{
                            echo "<span style= 'color: green;'>Password Not Updated !</span>";
                       }


                  }else{
                    echo "<span style= 'color: red;'>Enter Correct Password !</span>";
                  }
             }

            ?>

                <div class="block">               
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <input type="password"  name="oldpwd" placeholder="Enter Old Password..."  class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>
                                <input type="password" name="newpwd" placeholder="Enter New Password..."  class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update Password" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>

<?php include'inc/footer.php'; ?>
