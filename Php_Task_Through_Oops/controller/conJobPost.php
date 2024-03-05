<?php
    $id=$_GET['id'];
    session_start();
    require_once '../model/modelJobPost.php';

class jobpostController{
  function __construct(){
    global $id;
    if($_SERVER['REQUEST_METHOD']==='POST'){
      $this->handle($id);
    }
    else{
      $this->showLogin();
    }
  }

  private function showLogin(){
    header("Location:http://localhost/html/Php_Task_Through_Oops/view/viewUserRegForm.php");
  }

  private function handle($id){
    $name=$_POST['name'];
    $mail=$_POST['email'];
    $title=$_POST['title'];
    $location=$_POST['location'];

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

    $postjob=new postJob();
    $postjob->storeData($id,$name,$mail,$title,$location,$file_path);


    // $loginM =new loginModel();
    // if($loginM->authenticate($mail,$pass)){
    //   echo "Login Successful";
    // }
    // else{
    //   echo "Wrong Input";
    // }
  }
}
$job=new jobpostController();
?>