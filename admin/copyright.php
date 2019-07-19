<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
    <?php

          if ($_SERVER["REQUEST_METHOD"] == "POST"){
                 $id  = 1;
                 $copy  =$format-> test_input($_POST['note']);
                 

             if (empty($copy)) {
                echo "<span class = 'error'>Field must not be empty !!</span>";
             }else{

                    $what = $db-> updateCopyright($copy,$id);
                    if ($what) {
                        echo "<span class = 'success'>Copyright Updated Successfully !!</span>";
                    }else{
                        echo "<span class = 'success'>Copyright Not Updated Successfully !!</span>";
                    }
             }
         }
      ?>  
                <div class="block copyblock"> 
                <?php 
                        $id = 1;
                        $result = $db->getCopyRight($id);
                        if ($result) {
                          foreach ($result as $item) {
                                
                ?>       
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="note"  value="<?php echo $item['note']; ?>" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
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