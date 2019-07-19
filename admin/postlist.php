<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="8%">Category</th>
							<th width="7%">Title</th>
							<th width="15%">Description</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="10%">Tags</th>
							<th width="15%">Date</th>
							<th width="25%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$result = $db-> getalldAdminPost();
						$i =0;
						if ($result) {
							foreach ($result as $singlePost) {
								$i++;
			
					?>

				
						<tr class="odd gradeX">
							<td><?php echo  $i; ?></td>
							<td><?php echo  $singlePost['name']; ?></td>
							<td><a href="editpost.php?editpostid=<?php echo $singlePost['id'];?>"><?php echo  $singlePost['title']; ?></a> </td>
							<td><?php echo $format-> textShorten($singlePost['body'], 30);?></td>
						<td ><img src="<?php echo  $singlePost['image'];?>" height="30px" width="40px"></td>
							<td><?php echo  $singlePost['author']; ?></td>
							<td><?php echo  $format-> textShorten($singlePost['tags'], 30); ?></td>
							<td ><?php echo  $format-> formateDate($singlePost['date']);?></td>
							<td>
								<a href="viewpost.php?viewid=<?php echo $singlePost['id'];?>">View</a> 

					<?php 
 							$uid = Session::get('uid');

 							if ($singlePost['userid'] == $uid || Session::get('urole') == '0') {
 											
					?>

								||
								<a href="editpost.php?editpostid=<?php echo $singlePost['id'];?>">Edit</a> 
									|| 
								<a onclick="return confirm('Are You Sure to Delete This Post !!');" href="deletepost.php?delpostid=<?php echo $singlePost['id'];?>">Delete</a> 
				 <?php } ?>
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