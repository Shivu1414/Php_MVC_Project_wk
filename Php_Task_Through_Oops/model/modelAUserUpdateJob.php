<?php
require_once '../helper/helperDb.php';
session_start();
class updateJob{
    public function storeData($id,$sr,$mail,$name,$email,$title,$location,$file_path){

        $database=new dataBase();

        $conndb=$database->adminDbConn();

        $sql ="UPDATE postedjob set username='$name', email='$email', postlocation='$location', jobtitle='$title',imgurl='$file_path' WHERE sr='$sr' ";

        if ($conndb->query($sql) === TRUE) {
        // return redirect()->back();

        ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewAllData.php?id=<?php echo $id;?> & mail=<?php echo $mail;?>" /> 
        <?php
        } else {
        echo "<script>alert('Error: . $sql . '<br>' . $conndb->error')</script>";
        }
        $conndb->close();

    }
}
?>
