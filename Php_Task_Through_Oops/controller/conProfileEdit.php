<?php
    $sr=$_GET['id'];


    session_start();
    require_once '../model/modelProfileEdit.php';

class editProfileController{

  function __construct(){
    global $sr;
    if($_SERVER['REQUEST_METHOD']==='POST'){
      $this->handle($sr);
    }
    else{
      $this->showLogin();
    }
  }

  private function showLogin(){
    header("Location:http://localhost/html/Php_Task_Through_Oops/view/viewUserRegForm.php");
  }

  private function handle($sr){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $mail=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $about=$_POST['about'];
    $address=$_POST['address'];
    $pincode=$_POST['pincode'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];

    // $file_path=$_POST['fileToUpload'];

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
      $sql = "SELECT * FROM userregistration WHERE sr='$sr' ";
      $result=mysqli_query($conndb,$sql);
      $row = mysqli_fetch_assoc($result);
      $file_path=$row['imgurl']; 
    }
    // echo "<script>alert('$country')</script>";
    // echo "<script>alert('$state')</script>";
    // echo "<script>alert('$city')</script>";

    $profile=new profileEdit();
    $profile->storeData($sr,$fname,$lname,$mail,$phone,$gender,$about,$file_path,$address,$pincode,$country,$state,$city);

  }
}
$user=new editProfileController();
?>