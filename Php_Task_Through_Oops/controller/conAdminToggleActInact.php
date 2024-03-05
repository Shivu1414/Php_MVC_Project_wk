<?php
$id=$_GET['id'];
$mail=$_GET['mail'];

session_start();
class linkController{

  public function checkLink(){
    global $id;
    global $mail;
    if($_SERVER['REQUEST_METHOD']==='POST'){

    $check=$_POST['checkbox'];
    // echo "<script>alert('$check')</script>";
    if($check=="Active"){
        $check=1;
        ?>
        <meta http-equiv="refresh" content="0; url=../view/viewAllData.php?id=<?php echo $id;?> & mail=<?php echo $mail;?>" /> 
        <?php   
    }
    else{
      $check=0;
    //  echo "<script>confirm('Link Is Not Active')</script>"; 
     ?>
     <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewAdminProfile.php?id=<?php echo $id;?>" /> 
     <?php
    }
}  
}


}
$link=new linkController();
$link->checkLink();
?>

