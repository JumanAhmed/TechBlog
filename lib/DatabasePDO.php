<?php  
//require "config/config.php";


Class Database{
	
	function __construct()
	{
        self::connectDB();
		
        //$database = new DatabaseConnection(); 
	}


    private function connectDB(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        global $conn;

        try {
            $conn = new PDO("mysql:host=$servername;dbname=db_blog", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "DB CONNECTED"; 
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }
               
        }


	 public function getallpost($start_form, $per_page){
         global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_post  limit $start_form, $per_page");
         $query ->execute();
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;

    }

    public function tablePostRowCount(){
         global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_post");
         $query ->execute();
         $num = $query->rowCount();

         return $num;

    }


    public function getPostById($id){
         global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_post  WHERE id = ?");
         $query ->execute(array($id));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;

    }


    public function getRelatedPost($catid, $limit){
         global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_post  WHERE cat = ? order by rand() limit $limit");
         $query ->execute(array($catid));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
    }

    public function allcatagori(){

         global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_category");
         $query ->execute();
         $allcat = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allcat;
    }

     public function getAllCatPost($id){
         global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_post  WHERE cat = ?");
         $query ->execute(array($id));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;

    }

    public  function  getAllLeatestPost($limit){
         global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_post  limit  $limit");
         $query ->execute();
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
    }

    public function getPostFromPagination($start_form,$per_page){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_post  limit  $start_form, $per_page");
         $query ->execute();
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
    }


    public function searchFromPost($search){
        global $conn;

        $query='SELECT * FROM tbl_post WHERE title LIKE :search or body LIKE :search';
        $stmt= $conn->prepare($query);
        $stmt->execute(array(':search' => '%'.$search.'%'));

        $allinfo = $stmt->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;

    }


    public function getAllAdminPanelUserList(){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_user ORDER BY id desc");
         $query ->execute();
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;

    }

    public function getUserByid($uid){
         global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_user  WHERE id = ?");
         $query ->execute(array($uid));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
    }

    public function loginAdminPanel($uname,$pwd){

       global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_user  WHERE uname = ? AND pwd = ?");
         $query ->execute(array($uname,$pwd));
         
         return $query;
        
    }


    public function checkExistsMailByEmail($email){

        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_user  WHERE email = ?");
         $query ->execute(array($email));
         
         return $query;

    }

    public function addUserWithRole($uname,$pwd,$email,$role){

        global $conn;

        $query = $conn->prepare("INSERT INTO tbl_user (uname,pwd,email,role) VALUES (?,?,?,?)");
        $query->execute(array($uname,$pwd,$email,$role));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function getAdminPnlMemberBYId($userId,$UserRole){

        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_user  WHERE id = ? AND role = ?");
         $query ->execute(array($userId,$UserRole));
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);
         return $allinfo;
    }

    public function updateUserInfoByid($name,$uname,$email,$detail,$userId){
        global $conn;

         $query = $conn->prepare("UPDATE tbl_user SET 
                                  name = ?, 
                                  uname = ?, 
                                  email = ?, 
                                  details = ?
                                 WHERE  id = ?");
         $query->execute(array($name,$uname,$email,$detail,$userId));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUserPassword($pass,$userId){
        global $conn;

         $query = $conn->prepare("UPDATE tbl_user SET 
                                  pwd = ?
                                 WHERE  id = ?");
         $query->execute(array($pass,$userId));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUserFromAdminPanel($delid){
         global $conn;

         $query = $conn-> prepare("DELETE FROM tbl_user WHERE id = ?");
         $query->execute(array($delid));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllCategory(){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_category");
         $query ->execute();
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
    }


    // Insert categori
    public function addcacagory($name){
        global $conn;

        $query = $conn->prepare("INSERT INTO tbl_category (name) VALUES (?)");
        $query->execute(array($name));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function getctegoriByid($id){
        global $conn;

         $query = $conn-> prepare("SELECT * FROM tbl_category WHERE id = ?");
         $query ->execute(array($id));
         $info = $query->fetchAll(PDO::FETCH_ASSOC);

         return $info;
    }


    public function updateCategori($name,$id){
         global $conn;

         $query = $conn-> prepare("UPDATE tbl_category SET name = ? WHERE id = ?");
         $query->execute(array($name,$id));

        if ($query) {
            return true;
        } else {
            return false;
        }

    }

    public function deleteCategori($delid){
         global $conn;

         $query = $conn-> prepare("DELETE FROM tbl_category WHERE id = ?");
         $query->execute(array($delid));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function insertPost($catid,$title,$body,$uploaded_image,$author,$tags,$uid){
         global $conn;

        $query = $conn->prepare("INSERT INTO tbl_post (cat,title,body,image,author,tags,userid) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $query->execute(array($catid,$title,$body,$uploaded_image,$author,$tags,$uid));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function getalldAdminPost(){
         global $conn;

         $query = $conn-> prepare("SELECT tbl_post.*, tbl_category.name FROM tbl_post INNER JOIN tbl_category ON tbl_post.cat = tbl_category.id ");
         $query ->execute();
         $info = $query->fetchAll(PDO::FETCH_ASSOC);
         //$info = $query->rowCount();

         return $info;
    }

    public function updatePostWNewImage($catid,$title,$body,$uploaded_image,$author,$tags,$uid,$editId){
        global $conn;

         $query = $conn->prepare("UPDATE tbl_post SET 
                                  cat = ?, 
                                  title = ?, 
                                  body = ?, 
                                  image = ?,
                                  author = ?,
                                  tags = ?,
                                  userid = ?
                                 WHERE  id = ?");
         $query->execute(array($catid,$title,$body,$uploaded_image,$author,$tags,$uid,$editId));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePostWOldImage($catid,$title,$body,$author,$tags,$uid,$editId){
        global $conn;

         $query = $conn->prepare("UPDATE tbl_post SET 
                                  cat = ?, 
                                  title = ?, 
                                  body = ?,
                                  author = ?,
                                  tags = ?,
                                  userid = ?
                                 WHERE  id = ?");
         $query->execute(array($catid,$title,$body,$author,$tags,$uid,$editId));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

      public function deletePostByID($delid){
         global $conn;

         $query = $conn-> prepare("DELETE FROM tbl_post WHERE id = ?");
         $query->execute(array($delid));

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function getTitleSlogan(){
        global $conn;

         $query = $conn-> prepare("SELECT * FROM tbl_title_slogan WHERE id = ?");
         $query ->execute(array(1));
         $info = $query->fetchAll(PDO::FETCH_ASSOC);

         return $info;
    }

  public function updateTitleSlogan($title,$slogan,$uploaded_image,$id){
        global $conn;

         $query = $conn->prepare("UPDATE tbl_title_slogan SET 
                                  title = ?, 
                                  slogan = ?, 
                                  logo = ?
                                 WHERE  id = ?");
         $query->execute(array($title,$slogan,$uploaded_image,$id));

        if ($query) {
            return true;
        } else {
            return false;
        }

     }

     public function updateTitleSloganWithOldImg($title,$slogan,$id){
        global $conn;

         $query = $conn->prepare("UPDATE tbl_title_slogan SET 
                                  title = ?, 
                                  slogan = ?
                                 WHERE  id = ?");
         $query->execute(array($title,$slogan,$id));

        if ($query) {
            return true;
        } else {
            return false;
        } 
     }

     public function getsocialsite($id){
         global $conn;

         $query = $conn-> prepare("SELECT * FROM tbl_social WHERE id = ?");
         $query ->execute(array($id));
         $info = $query->fetchAll(PDO::FETCH_ASSOC);

         return $info;

     }

     public function updateSocialSite($fb,$tw,$ln,$gp,$id){

        global $conn;

         $query = $conn->prepare("UPDATE tbl_social SET 
                                  fb = ?, 
                                  tw = ?,
                                  ln = ?,
                                  gp = ?
                                 WHERE  id = ?");
         $query->execute(array($fb,$tw,$ln,$gp,$id));

        if ($query) {
            return true;
        } else {
            return false;
        } 
     }


     public function getCopyRight($id){
        global $conn;

         $query = $conn-> prepare("SELECT * FROM tbl_footer WHERE id = ?");
         $query ->execute(array($id));
         $info = $query->fetchAll(PDO::FETCH_ASSOC);

         return $info;
     }

    public function updateCopyright($copy,$id){
      global $conn;

         $query = $conn->prepare("UPDATE tbl_footer SET 
                                  note = ?
                                 WHERE  id = ?");
         $query->execute(array($copy,$id));

        if ($query) {
            return true;
        } else {
            return false;
        }   
    }

     public function insertTablePage($name,$body){
        global $conn;

        $query = $conn->prepare("INSERT INTO tbl_page (name,body) VALUES (?,?)");
        $query->execute(array($name,$body));

        if ($query) {
            return true;
        } else {
            return false;
        }
     }

     public function getAllPage(){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_page");
         $query ->execute();
         $allinfo = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allinfo;
     }

     public function getPageById($pageid){
         global $conn;

         $query = $conn-> prepare("SELECT * FROM tbl_page WHERE id = ?");
         $query ->execute(array($pageid));
         $info = $query->fetchAll(PDO::FETCH_ASSOC);

         return $info;

     }

     public function updatePages($name,$body,$pageid){
        global $conn;

         $query = $conn->prepare("UPDATE tbl_page SET 
                                  name = ?, 
                                  body = ?
                                 WHERE  id = ?");
         $query->execute(array($name,$body,$pageid));

        if ($query) {
            return true;
        } else {
            return false;
        } 
     }

     public function deletePageByID($pageid){
        global $conn;

         $query = $conn-> prepare("DELETE FROM tbl_page WHERE id = ?");
         $query->execute(array($pageid));

        if ($query) {
            return true;
        } else {
            return false;
        }
     }

     public function insertEachContact($fname,$lname,$email,$body){
        global $conn;

        $query = $conn->prepare("INSERT INTO tbl_contact (firstname,lastname,email,body) VALUES (?,?,?,?)");
        $query->execute(array($fname,$lname,$email,$body));

        if ($query) {
            return true;
        } else {
            return false;
        }
     }

     public function getallCotactMessages(){
          global $conn;
          $status = 0;

         $query = $conn->prepare("SELECT * FROM tbl_contact WHERE status = ? ORDER BY id desc");
         $query ->execute(array($status));
         $allcat = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allcat;
     }

     public function getContactaMessagesById($id){
        global $conn;

         $query = $conn-> prepare("SELECT * FROM tbl_contact WHERE id = ?");
         $query ->execute(array($id));
         $info = $query->fetchAll(PDO::FETCH_ASSOC);

         return $info;
     }


     public function upStatusInTblContactById($seenid){
         global $conn;
         $status =1;

         $query = $conn->prepare("UPDATE tbl_contact SET 
                                  status = ?
                                 WHERE  id = ?");
         $query->execute(array($status,$seenid));

        if ($query) {
            return true;
        } else {
            return false;
        } 
     }


     public function getSeenBoxMessages(){
          global $conn;
          $status = 1;

         $query = $conn->prepare("SELECT * FROM tbl_contact WHERE status = ?");
         $query ->execute(array($status));
         $allcat = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allcat;
     }


     public function deleteTblContactMessages($delid){
        global $conn;

         $query = $conn-> prepare("DELETE FROM tbl_contact WHERE id = ?");
         $query->execute(array($delid));

        if ($query) {
            return true;
        } else {
            return false;
        }
     }

     public function sendToinboxByStatusUpdate($unseenid){
        global $conn;
         $status =0;

         $query = $conn->prepare("UPDATE tbl_contact SET 
                                  status = ?
                                 WHERE  id = ?");
         $query->execute(array($status,$unseenid));

        if ($query) {
            return true;
        } else {
            return false;
        } 
     }

     public function getNewMessagesNotice(){
         global $conn;
          $status = 0;

         $query = $conn->prepare("SELECT * FROM tbl_contact WHERE status = ?");
         $query ->execute(array($status));
         $num = $query->rowCount(); 

         return $num;
     }

     public function changeTheme($theme,$id){
        global $conn;

         $query = $conn->prepare("UPDATE tbl_theme SET 
                                  theme = ?
                                 WHERE  id = ?");
         $query->execute(array($theme,$id));

        if ($query) {
            return true;
        } else {
            return false;
        } 
     }

     public function selecttheme(){
         global $conn;
          $id = 1;

         $query = $conn->prepare("SELECT * FROM tbl_theme WHERE id = ?");
         $query ->execute(array($id));
         $allcat = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allcat;
     }

     public function insertSlider($title,$link,$uploaded_image){
         global $conn;

        $query = $conn->prepare("INSERT INTO tbl_slider (title,link,image) VALUES (?,?,?)");
        $query->execute(array($title,$link,$uploaded_image));

        if ($query) {
            return true;
        } else {
            return false;
        }
     }

     public function getAllSliders(){
        global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_slider");
         $query ->execute();
         $allcat = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allcat;
     }

     public function getsSliderById($editid){
         global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_slider WHERE id = ?");
         $query ->execute(array($editid));
         $allcat = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allcat;

     }

     public function updateSliderWithNewImage($title,$link,$uploaded_image,$editid){
        global $conn;

         $query = $conn->prepare("UPDATE tbl_slider SET 
                                  title = ?,
                                  link = ?,
                                  image = ?
                                 WHERE  id = ?");
         $query->execute(array($title,$link,$uploaded_image,$editid));

        if ($query) {
            return true;
        } else {
            return false;
        } 
     }

     public function updateSliderWithOldImage($title,$link,$editid){
        global $conn;

         $query = $conn->prepare("UPDATE tbl_slider SET 
                                  title = ?,
                                  link = ?
                                 WHERE  id = ?");
         $query->execute(array($title,$link,$editid));

        if ($query) {
            return true;
        } else {
            return false;
        } 
     }

     public function deleteSliderByid($delid){
         global $conn;

         $query = $conn-> prepare("DELETE FROM tbl_slider WHERE id = ?");
         $query->execute(array($delid));

        if ($query) {
            return true;
        } else {
            return false;
        }
     }

     public function selectAllSliderLimited5(){
         global $conn;

         $query = $conn->prepare("SELECT * FROM tbl_slider ORDER BY id limit 5");
         $query ->execute();
         $allcat = $query->fetchAll(PDO::FETCH_ASSOC);

         return $allcat;
     }


    }


?>

