<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

        <div class="grid_10">	
            <div class="box round first grid">
                <h2>Add New Page Dynamicly</h2>

  <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                          $name    = $_POST['name'];
                          $body    = $_POST['body'];
                         

                         if (empty($name) || empty($body)) {
                            echo "<span class = 'error'>Field must not be empty !!</span>";
                        
                            }else{

                                    $result = $db-> insertTablePage($name,$body);
                                    if($result) {
                                     echo "<span class='success'>Page Created Successfully.
                                     </span>";
                                    }else {
                                     echo "<span class='error'>Page Not Created !</span>";
                                    }
                       }

                }
        ?>

                <div class="block">               
                 <form action="" method="post" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Page Name</label>
                            </td>
                            <td>
                                <input type="text" name="name"  placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                   
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Body</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Create Page" />
                               
                            </td>
                        </tr>
                    </table>
                    </form>
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


