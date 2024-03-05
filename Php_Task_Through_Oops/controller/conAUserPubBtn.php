<?php
    $sr=$_GET['sr'];
    $id=$_GET['id'];
    $gmail=$_GET['mail'];

session_start();
require_once '../helper/helperDb.php';
class publishController{
    public function publishJob(){
        global $sr;
        global $id;
        global $gmail;

        $database=new dataBase();
        $conndb=$database->adminDbConn();
        $database->createPublishPost($conndb);

        $conndb=$database->adminDbConn();
        $sql = "SELECT * FROM postedjob WHERE sr='$sr' ";
        $result=mysqli_query($conndb,$sql);
        $row = mysqli_fetch_assoc($result);
        $name=$row['username'];
        $mail=$row['email'];
        $location=$row['postlocation'];
        $title=$row['jobtitle'];
        $file_path=$row['imgurl'];

// now first we need to update
        $sql = "INSERT INTO publishpost(username, email, postlocation, jobtitle, imgurl) VALUES('$name','$mail','$location','$title','$file_path')";
        if ($conndb->query($sql) === TRUE) {
            // echo "<script> confirm('Job posted in publish post')</script>";
        }    

// Now delete the row
        $sql = "DELETE FROM postedjob WHERE sr='$sr' ";
        if ($conndb->query($sql) === TRUE) {
        // echo "<script> confirm('Data deleted')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewAllData.php?id=<?php echo $id;?> & mail=<?php echo $gmail;?>" /> 
        <?php
        } else {
        echo "<script>alert('Error: . $sql . '<br>' . $conn->error')</script>";
        }
        $conndb->close();

    }
}
$publish=new publishController();
$publish->publishJob();
?>sr