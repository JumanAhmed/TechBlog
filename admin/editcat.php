<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
<?php
   if (!isset($_GET['catid']) || $_GET['catid']== NULL) {
      echo "<script>window.location='catlist.php';</script>";
      //header("Location: catlist.php");
   }else{
      $id = $_GET['catid'];
   }

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Category</h2>

               <div class="block copyblock"> 
               <?php

                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  $name =($_POST['name']);

                  if (empty($name)) {
                     echo "<span class = 'error'>Field must not be empty !!</span>";
                  }else{
                      $result = $db-> updateCategori($name,$id);

                      if ($result) {
                           echo "<span class = 'success'>Update successfully</span>";
                      }else{
                           echo "<span class = 'error'>Update Not successfully</span>";
                      }
                  }

              }

                 ?>
         <?php 
               $cat = $db-> getctegoriByid($id);
               foreach ($cat as $newcat) {

          ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $newcat['name'];?>" class="medium" />
                            </td>
                        </tr>
						                <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>

               <?php } ?>     
                </div>
            </div>
        </div>

<?php include 'inc/footer.php' ?>