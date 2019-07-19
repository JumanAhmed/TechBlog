<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>

                 <?php
                   if (isset($_GET['delcat'])) {
                  	 $delid = $_GET['delcat'];
                  	 $result = $db-> deleteCategori($delid);

                  	  if ($result) {
                           echo "<span class = 'success'>Category Deleted  successfully</span>";
                      }else{
                           echo "<span class = 'error'>Category Not Deleted  successfully</span>";
                      }
                   }
                    
                ?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					<?php 

						$allcat = $db-> getAllCategory();
						if ($allcat) {
							foreach ($allcat as $singlecat) {
								

					 ?>
						<tr class="odd gradeX">
							<td><?php  echo $singlecat['id']; ?></td>
							<td><?php  echo $singlecat['name']; ?></td>
							<td><a href="editcat.php?catid=<?php echo $singlecat['id'];?>">Edit</a> || <a onclick="return confirm('Are You Sure to Delete !!');" href="?delcat=<?php echo $singlecat['id'];?>">Delete</a></td>
						</tr>

					<?php  	} }?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>

<script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
</script>
<?php include'inc/footer.php'; ?>



 