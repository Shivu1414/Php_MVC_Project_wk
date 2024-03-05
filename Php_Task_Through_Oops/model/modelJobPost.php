<?php
require_once '../helper/helperDb.php';
class postJob{
    public function storeData($id,$name,$mail,$title,$location,$file_path){
        $database=new dataBase();
        // $connect=$database->dbConn();
        // $database->createDb($connect);

        $conndb=$database->adminDbConn();
        $database->createJobPost($conndb);

        $conndb=$database->adminDbConn();
        $sql = "INSERT INTO postedjob(username, email, postlocation, jobtitle, imgurl) VALUES('$name','$mail','$location','$title','$file_path')";
        if ($conndb->query($sql) === TRUE) {
        // echo "<script> confirm('Job posted')</script>";
        // echo "<script>alert('Data created successfully')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewJobPost.php?id=<?php echo $id;?> & mail=<?php echo $mail;?>" /> 
        <?php
        } else {
        echo "<script>alert('Error: . $sql . '<br>' . $conn->error')</script>";
        }
        $conndb->close();

    }
}
?>