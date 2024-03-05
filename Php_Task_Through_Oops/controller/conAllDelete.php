<?php
    $id=$_GET['id'];
    $mail=$_GET['mail'];

    session_start();
require_once '../helper/helperDb.php';
class allDeleteController{
    public function deleteJobs(){
        global $id;
        global $mail;

        $database=new dataBase();

        $conndb=$database->adminDbConn();
        $sql = "DELETE FROM postedjob WHERE email='$mail' ";
        if ($conndb->query($sql) === TRUE) {
        echo "<script> confirm('All Data Deleted')</script>";
        // return redirect()->back();
        ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewProfile.php?id=<?php echo $id;?>" /> 
        <?php
        } else {
        echo "<script>alert('Error: . $sql . '<br>' . $conn->error')</script>";
        }
        $conndb->close();

        }
}
$delete=new allDeleteController();
$delete->deleteJobs();
?>

