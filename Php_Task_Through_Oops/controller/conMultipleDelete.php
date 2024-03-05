<?php
$id=$_GET['id'];
$mail=$_GET['mail'];
    session_start();
require_once '../helper/helperDb.php';
class multiDeleteController{
    public function deleteJobs(){
        global $id;
        global $mail;

        $database=new dataBase();
        $conndb=$database->adminDbConn();

        if(isset($_POST['mul_delete']))
        {
            $all_del=$_POST['multiple_delete'];
            $extract=implode(',',$all_del);
            // echo "<script> confirm('$extract')</script>";
        }
        $sql = "DELETE FROM postedjob WHERE sr IN ($extract) ";
        $query_run=mysqli_query($conndb,$sql);
        if($query_run){
            echo "<script> confirm('All Data Deleted')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewUserPostedJobs.php?id=<?php echo $id;?> & mail=<?php echo $mail;?>" /> 
        <?php
        } else {
        echo "<script>alert('Error: . $sql . '<br>' . $conn->error')</script>";
        }
        $conndb->close();
        }
}
$delete=new multiDeleteController();
$delete->deleteJobs();
?>

