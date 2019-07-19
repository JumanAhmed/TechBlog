<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

        <div class="grid_10">

		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
     <?php

          if ($_SERVER["REQUEST_METHOD"] == "POST"){
                 $id  = 1;
                 $fb  =$format-> test_input($_POST['fb']);
                 $tw  =$format-> test_input($_POST['tw']);
                 $ln  =$format-> test_input($_POST['ln']);
                 $gp  =$format-> test_input($_POST['gp']);

             if (empty($fb) || empty($tw) || empty($ln) || empty($gp)) {
                echo "<span class = 'error'>Field must not be empty !!</span>";
             }else{

                    $what = $db-> updateSocialSite($fb,$tw,$ln,$gp,$id);
                    if ($what) {
                        echo "<span class = 'success'>Social site Updated Successfully !!</span>";
                    }else{
                        echo "<span class = 'success'>Social site Not Updated Successfully !!</span>";
                    }
             }
         }
      ?>  


                
                <div class="block"> 
                <?php 
                        $id = 1;
                        $result = $db->getsocialsite($id);
                        if ($result) {
                          foreach ($result as $item) {
                                
                ?>              
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" value="<?php echo $item['fb'];?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw" value="<?php echo $item['tw'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln" value="<?php echo $item['ln'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gp" value="<?php echo $item['gp'];?>"class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php  }  } ?>
                </div>

            </div>
            
        </div>
<?php include'inc/footer.php'; ?>
