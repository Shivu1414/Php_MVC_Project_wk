<?php
    require_once '../model/modelUserRegistration.php';

class userController{
  function __construct(){
    if($_SERVER['REQUEST_METHOD']==='POST'){
      $this->handle();
    }
    else{
      $this->showLogin();
    }
  }

  private function showLogin(){
    header("Location:http://localhost/html/Php_Task_Through_Oops/view/viewUserRegForm.php");
  }

  private function handle(){
    $fname=$_POST['name'];
    $lname=$_POST['lname'];
    $mail=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $about=$_POST['comment'];
    $address=$_POST['address'];
    $pincode=$_POST['pincode'];
    $pass=$_POST['pass1'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    // echo "<script> confirm('$country')</script>";
    // echo "<script> confirm('$state')</script>";
    // echo "<script> confirm('$city')</script>";
    // $file_path=$_POST['fileToUpload'];

    if(isset($_FILES['fileToUpload'])){
        $file_name=$_FILES['fileToUpload']['name'];
        $file_size=$_FILES['fileToUpload']['size'];
        $file_tmp=$_FILES['fileToUpload']['tmp_name'];
        $file_type=$_FILES['fileToUpload']['type'];
        $file_path="../assets/upload/".$file_name;
        move_uploaded_file($file_tmp,"../assets/upload/".$file_name);

        // if($file_size>50000){
        //   $imgErr="Img size is more than 50kb";
        // }
        // else{
        //   $imgErr="";
        //   move_uploaded_file($file_tmp,"upload-images/".$file_name);
        // }  
      }
      else{
        echo "<script>alert('Image not uploaded')</script>";
      }
      require_once '../helper/helperDb.php';
      $database=new dataBase();
      $conndb=$database->adminDbConn();
      $sql="SELECT * FROM userregistration WHERE email='$mail' ";
      $result=mysqli_query($conndb,$sql);

      if($result){
        if(mysqli_num_rows($result)>=1){
           echo "<script> confirm('User Already Register')</script>";
           ?>
           <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewUserRegForm.php" /> 
           <?php
        }
        else{
          $userreg=new userRegistration();
          $userreg->storeData($fname,$lname,$mail,$phone,$gender,$about,$address,$pincode,$pass,$file_path,$country,$state,$city);
        }
      }
      


  }
}
$user=new userController();
?>