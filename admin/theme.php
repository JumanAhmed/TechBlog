<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
<?php
   

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Change Theme</h2>
                 <?php

                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                         $theme =($_POST['theme']);

                  if (empty($theme)) {
                     echo "<span class = 'error'>Plese Select One Theme !!</span>";
                  }else{
                      $id = 1;
                      $result = $db-> changeTheme($theme,$id);

                      if ($result) {
                           echo "<span class = 'success'>Theme Updated successfully</span>";
                      }else{
                           echo "<span class = 'error'>Theme Not Updated successfully</span>";
                      }
                  }

              }

                 ?>
               <div class="block copyblock"> 
              <?php 
                      
                      $result = $db-> selecttheme();
                      if ($result) {
                         foreach ($result as $key) {
          
              ?>
         
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input <?php if ($key['theme'] == 'default') {echo "checked"; }?> type="radio" name="theme" value="default" />Deufalt
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <input <?php if ($key['theme'] == 'neveyblue') {echo "checked"; }?> type="radio" name="theme" value="neveyblue" />Nevey Blue
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <input <?php if ($key['theme'] == 'green') {echo "checked"; }?> type="radio" name="theme" value="green" />Green
                            </td>
                        </tr>
						            <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Change Theme" />
                            </td>
                        </tr>
                    </table>
                    </form>
              <?php } } ?>
                </div>
            </div>
        </div>

<?php include 'inc/footer.php' ?>