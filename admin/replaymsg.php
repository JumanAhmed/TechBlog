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
                     
                     $to        = $format->test_input($_POST['toEmail']);
                     $from      = $format->test_input($_POST['fromEmail']);
                     $subject   = $format->test_input($_POST['subject']);
                     $message   = $format->test_input($_POST['message']);
                     $sendMail  = mail($to, $subject, $message, $from);
                     if ($sendMail) {
                      echo "<span class = 'success'>Message Send Successfully</span>";
                      }else{
                           echo "<span class = 'error'>Something went Wrong !</span>";
                      }

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
                                <label>TO</label>
                              </td>
                              <td>
                                   <input type="text" name readonly name="toEmail" value="<?php echo $item['email']; ?>" class="medium" />
                              </td>
                        </tr>
                        
                        <tr>
                              <td>
                                <label>From</label>
                              </td>
                              <td>
                                   <input type="text" name="fromEmail" placeholder="Please Enter Enter your Email ....." class="medium" />
                              </td>
                        </tr>

                         <tr>
                              <td>
                                <label>Subject</label>
                              </td>
                              <td>
                                   <input type="text" name="subject" placeholder="Please Enter Message Subject...." class="medium" />
                              </td>
                        </tr>

                        <tr>
                              <td>
                                <label>Message</label>
                              </td>
                              <td>
                                  <textarea class="tinymce" name="message"></textarea>
                              </td>
                        </tr>
						            <tr> 
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
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