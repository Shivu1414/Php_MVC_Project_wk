<?php
$sr=$_GET['sr'];
$id=$_GET['id'];
$mail=$_GET['mail'];

session_start();
require_once '../helper/helperDb.php';
class deleteController{
    public function deleteJob(){
        global $sr;
        global $id;
        global $mail;

        $database=new dataBase();

        $conndb=$database->adminDbConn();
        // echo "<script> confirm('$id')</script>";
        $sql = "DELETE FROM postedjob WHERE sr='$sr' ";
        if ($conndb->query($sql) === TRUE) {
        // echo "<script> confirm('Data deleted')</script>";
        // return redirect()->back();
        ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewAllData.php?id=<?php echo $id;?> & mail=<?php echo $mail;?>" /> 
        <?php
        } else {
        echo "<script>alert('Error: . $sql . '<br>' . $conn->error')</script>";
        }
        $conndb->close();

    }
}
$delete=new deleteController();
$delete->deleteJob();
?>
?>