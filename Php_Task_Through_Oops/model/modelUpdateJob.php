<?php
require_once '../helper/helperDb.php';
session_start();
class updateJob{
    public function storeData($id,$sr,$name,$mail,$title,$location,$file_path){

        $database=new dataBase();

        $conndb=$database->adminDbConn();

        $sql ="UPDATE postedjob set username='$name', email='$mail', postlocation='$location', jobtitle='$title',imgurl='$file_path' WHERE sr='$sr' ";

        if ($conndb->query($sql) === TRUE) {
        // return redirect()->back();
        // echo "<script>alert('Data created successfully')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewUserPostedJobs.php?id=<?php echo $id;?> & mail=<?php echo $mail;?>" /> 
        <?php
        } else {
        echo "<script>alert('Error: . $sql . '<br>' . $conn->error')</script>";
        }
        $conndb->close();

    }
}
?>
