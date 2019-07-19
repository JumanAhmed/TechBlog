<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
<?php
   if (!isset($_GET['msgid']) || $_GET['msgid']== NULL) {
      echo "<script>window.location='inbox.php';</script>";
      //header("Location: catlist.php");
   }else{
      $id = $_GET['msgid'];
   }

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Messages</h2>
                <?php

                  if ($_SERVER["REQUEST_METHOD"] == "POST") {     
                      echo "<script>window.location='inbox.php';</script>";
                    }
                ?>

               <div class="block copyblock"> 
               
         <?php 
               $result = $db-> getContactaMessagesById($id);
               if ($result) {
                 foreach ($result as $item) {
         

          ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                              <td>
                                <label>Name</label>
                              </td>
                              <td>
                                  <input type="text" readonly value="<?php echo $item['firstname'].' '.$item['lastname'];?>" class="medium" />
                              </td>
                        </tr>
                        <tr>
                              <td>
                                <label>Email</label>
                              </td>
                              <td>
                                   <input type="text" readonly value="<?php echo $item['email']; ?>" class="medium" />
                              </td>
                        </tr>
                        
                        <tr>
                              <td>
                                <label>Date</label>
                              </td>
                              <td>
                                   <input type="text" readonly value="<?php echo $item['date']; ?>" class="medium" />
                              </td>
                        </tr>

                        <tr>
                              <td>
                                <label>Message</label>
                              </td>
                              <td>
                                  <textarea class="tinymce" name="body"><?php echo $item['body']; ?></textarea>
                              </td>
                        </tr>
						            <tr> 
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
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

<?php include 'inc/footer.php' ?>