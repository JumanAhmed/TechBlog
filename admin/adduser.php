<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
<?php 
      if (!Session::get('urole') == '0') {
      echo "<script>window.location='index.php';</script>";

    }
?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>
               <div class="block copyblock"> 
               <?php

                  if ($_SERVER["REQUEST_METHOD"] == "POST") {

                  $uname  =$format->test_input($_POST['uname']);
                  $pwd    =$format->test_input(md5($_POST['pwd']));
                  $role   =$format->test_input($_POST['role']);
                  $email   =$format->test_input($_POST['email']);

                  if (empty($uname) || empty($pwd) || empty($role) || empty($email)) {
                     echo "<span class = 'error'>Field must not be empty !!</span>";
                  }else{

                      $query    = $db-> checkExistsMailByEmail($email);
                      //$allinfo  = $query->fetch();
                      $row      = $query->rowCount();
                      if ($row > 0) {
                         echo "<span class = 'error'>Email Already Exists !</span>";
                      }else{
                      $result = $db-> addUserWithRole($uname,$pwd,$email,$role);

                      if ($result) {
                           echo "<span class = 'success'>User Created successfully !</span>";
                      }else{
                           echo "<span class = 'error'>User Not Created !</span>";
                      }
                  }
                }

              }

                 ?>

                 <form action="" method="post">
                    <table class="form">					
                        <tr>

                           <td>
                             <label>Username</label>
                           </td>
                            <td>
                                <input type="text" name="uname" placeholder="Enter Username..." class="medium" />
                            </td>
                        </tr>
                        <tr>

                           <td>
                             <label>Password</label>
                           </td>
                            <td>
                                <input type="text" name="pwd" placeholder="Enter Password ..." class="medium" />
                            </td>
                        </tr>
                         <tr>

                           <td>
                             <label>Email</label>
                           </td>
                            <td>
                                <input type="text" name="email" placeholder="Enter Email ..." class="medium" />
                            </td>
                        </tr>
                        <tr>

                           <td>
                             <label>User Role</label>
                           </td>
                            <td>
                                <select id="select" name="role">
                                    <option>Select User Role</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Author</option>
                                    <option value="2">Editor</option>
                                </select>
                            </td>
                        </tr>
						            <tr> 
                          <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>

<?php include 'inc/footer.php' ?>