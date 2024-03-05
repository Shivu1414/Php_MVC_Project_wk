<?php
 $id=$_GET['id'];
 $sr=$_GET['sr'];
 $mail=$_GET['mail'];

 require_once '../model/modelAUserUpdateJob.php';
session_start();
class updateController{
  function __construct(){
    global $id;
    global $sr;
    global $mail;

    if($_SERVER['REQUEST_METHOD']==='POST'){
      $this->handle($sr,$id,$mail);
    }
    else{
      $this->showLogin();
    }
  }

  private function showLogin(){
    header("Location:http://localhost/html/Php_Task_Through_Oops/view/viewLogin.php");
  }

  private function handle($sr,$id,$mail){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $location=$_POST['location'];
    $title=$_POST['title'];

    if(isset($_FILES['fileToUpload'])){
        $file_name=$_FILES['fileToUpload']['name'];
        $file_size=$_FILES['fileToUpload']['size'];
        $file_tmp=$_FILES['fileToUpload']['tmp_name'];
        $file_type=$_FILES['fileToUpload']['type'];
        $file_path="../assets/upload/".$file_name;
        move_uploaded_file($file_tmp,"../assets/upload/".$file_name); 
      }
      else{
        echo "<script>alert('Image not uploaded')</script>";
      }
      if($file_name==""){
        require_once '../helper/helperDb.php';
        $database=new dataBase();
        $conndb=$database->adminDbConn();
        $sql = "SELECT * FROM postedjob WHERE sr='$sr' ";
        $result=mysqli_query($conndb,$sql);
        $row = mysqli_fetch_assoc($result);
        $file_path=$row['imgurl']; 
      }
      $updatejob=new updateJob();
      $updatejob->storeData($id,$sr,$mail,$name,$email,$title,$location,$file_path);

  }
}
$update=new updateController();
?>