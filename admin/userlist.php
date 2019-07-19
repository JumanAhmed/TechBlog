<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Admin Panel User List</h2>

                 <?php
                   if (isset($_GET['deluser'])) {
                     $delid = $_GET['deluser'];
                     $result = $db-> deleteUserFromAdminPanel($delid);

                      if ($result) {
                           echo "<span class = 'success'>User Deleted  successfully</span>";
                      }else{
                           echo "<span class = 'error'>User Not Deleted  successfully</span>";
                      }
                   }
                    
                ?>

                <div class="block">        
                    <table class="data display datatable" id="example">
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Details</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

          <?php 

            $allList = $db-> getAllAdminPanelUserList();
            if ($allList) {
              $i =0;
              foreach ($allList as $user) {
                $i++;

           ?>
            <tr class="odd gradeX">
              <td><?php  echo $i; ?></td>
              <td><?php  echo $user['name']; ?></td>
              <td><?php  echo $user['uname']; ?></td>
              <td><?php  echo $user['email']; ?></td>
              <td><?php  echo $format->textShorten($user['details'], 30); ?></td>
              <td>
              <?php 
                   if ($user['role'] == '0') {
                       echo "Admin";
                    }elseif ($user['role'] == '1') {
                       echo "Author";
                    }elseif ($user['role'] == '2') {
                       echo "Editor";
                    }    

               ?>  
              </td>
            
              <td><a href="viewUser.php?viewid=<?php echo $user['id'];?>">view</a> 
               <?php 
                    if (Session::get('urole') == '0') {
               ?>
              ||<a onclick="return confirm('Are You Sure to Delete User <?php echo $user['uname'];?> !!');" href="?deluser=<?php echo $user['id'];?>">Delete</a>
             <?php } ?>
              </td>
            </tr>

          <?php   } }?>
            
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



 