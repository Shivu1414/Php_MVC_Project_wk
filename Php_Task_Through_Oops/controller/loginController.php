<?php
session_start();
class loginController{

  public function index(){
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
    require_once 'model/modelLogin.php';
    $check=$_POST['checkbox'];
    if($check=="Admin"){
        $check=1;
        // echo "<script>alert('$check')</script>";
    }
    else{
      $check=0;
      // echo "<script>alert('$check')</script>";
    }
    $mail=$_POST['email'];
    $pass=$_POST['password'];

    $loginM =new loginModel();
    $loginM->authenticate($check,$mail,$pass);

    
  }


}
?>

