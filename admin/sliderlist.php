<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Slider List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">No.</th>
							<th width="25%">Title</th>
							<th width="25%">Link</th>
							<th width="15%">Image</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$result = $db-> getAllSliders();
						if ($result) {
							$i= 0;
							foreach ($result as $singlePost) {
							$i++;
					?>
					<tr class="odd gradeX">

						 	<td><?php echo $i; ?></td>
							
							<td><?php echo   $singlePost['title']; ?></td>
							<td><?php echo   $singlePost['link']; ?></td>
							<td ><img src="<?php echo  $singlePost['image'];?>" height="50px" width="100px"></td>
							<td>

								<a href="editslider.php?editid=<?php echo $singlePost['id'];?>">Edit</a> 
									|| 
								<a onclick="return confirm('Are You Sure to Delete This Slider !!');" href="deleteSlider.php?delid=<?php echo $singlePost['id'];?>">Delete</a> 
	
							</td>
					</tr>
						<?php  } }?>
			
					</tbody>
				</table>
	
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