<?php
    require_once '../model/modelAdminRegistration.php';

class adminController{
  function __construct(){
    if($_SERVER['REQUEST_METHOD']==='POST'){
      $this->handle();
    }
    else{
      $this->showLogin();
    }
  }

  private function showLogin(){
    header("Location:http://localhost/html/Php_Task_Through_Oops/view/viewLogin.php");
  }

  private function handle(){
    $name=$_POST['name'];
    $mail=$_POST['email'];
    $pass=$_POST['pass1'];

    require_once '../helper/helperDb.php';
    $database=new dataBase();
    $conndb=$database->adminDbConn();
    $sql="SELECT * FROM adminregistration WHERE email='$mail' ";
    $result=mysqli_query($conndb,$sql);

    if($result){
      if(mysqli_num_rows($result)>=1){
         echo "<script> confirm('Email Already Register')</script>";
         ?>
         <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewAdminLogin.php" /> 
         <?php
      }
      else{
        $adminreg=new adminRegistration();
        $adminreg->storeData($name,$mail,$pass);
      }
    // $loginM =new loginModel();
    // if($loginM->authenticate($mail,$pass)){
    //   echo "Login Successful";
    // }
    // else{
    //   echo "Wrong Input";
    // }
    }
  }
}
$admin=new adminController();
?>