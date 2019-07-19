<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>



        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                 <?php
				   if (isset($_GET['seenid'])) {
				    $seenid = $_GET['seenid'];

				    $result = $db-> upStatusInTblContactById($seenid);
				   if ($result) {
                           echo "<span class = 'success'>Message Send to Seen Box !</span>";
                      }else{
                           echo "<span class = 'error'>Something Wrong !</span>";
                      }
				   }
				?>
                <div class="block">        
                  <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					<?php
						$result = $db-> getallCotactMessages();
						if ($result) {
							$i =0;
							foreach ($result as $mess) {
			                 $i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $mess['firstname'].' '.$mess['lastname']; ?></td>
							<td><?php echo $mess['email'] ?></td>
							<td><?php echo $format->textShorten($mess['body'], 40); ?></td>
							<td><?php echo $format->formateDate($mess['date']); ?></td>
							<td>
								<a href="viewmsg.php?msgid=<?php echo $mess['id'];?>">View</a> || 
								<a href="replaymsg.php?msgid=<?php echo $mess['id'];?>">Reply</a>  || 
								<a onclick="return confirm('Are You Sure to Move the Message in Seen box !');" href="?seenid=<?php echo $mess['id']; ?>">Seen</a> 
							</td>
						</tr>

						<?php } }?>
						
					</tbody>
				</table>
               </div>
            </div>

              <div class="box round first grid">

             

                <h2>Seen Messages</h2>
                <?php
				   if (isset($_GET['delid'])) {
				    $delid = $_GET['delid'];

				    $result = $db-> deleteTblContactMessages($delid);
				   if ($result) {
                           echo "<span class = 'success'>Message Deleted Successfuly !</span>";
                      }else{
                           echo "<span class = 'error'>Message Not Deleted !</span>";
                      }
				   }
				?>
				 <?php
				   if (isset($_GET['unseenid'])) {
				    $unseenid = $_GET['unseenid'];

				   $result = $db-> sendToinboxByStatusUpdate($unseenid);
				   if ($result) {
                           echo "<span class = 'success'>Message Send To Inbox Successfuly !</span>";
                      }else{
                           echo "<span class = 'error'>Message Not Send To Inbox !</span>";
                      }
				   }
				?>
                <div class="block">        
                  <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

					<?php
						$result = $db-> getSeenBoxMessages();
						if ($result) {
							$i =0;
							foreach ($result as $mess) {
			                 $i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $mess['firstname'].' '.$mess['lastname']; ?></td>
							<td><?php echo $mess['email'] ?></td>
							<td><?php echo $format->textShorten($mess['body'], 40); ?></td>
							<td><?php echo $format->formateDate($mess['date']); ?></td>
							<td>
								<a href="viewmsg.php?msgid=<?php echo $mess['id'];?>">View</a> || 
								<a onclick="return confirm('Are You Sure to Delete the Message Completely !');" href="?delid=<?php echo $mess['id']; ?>">Delete</a> ||
								<a onclick="return confirm('Are You Sure to Move the Message in Inbox !');" href="?unseenid=<?php echo $mess['id']; ?>">Unseen</a>
							</td>
						</tr>

						<?php } }?>
						
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