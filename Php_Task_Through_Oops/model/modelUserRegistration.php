<?php
require_once '../helper/helperDb.php';
class userRegistration{
    public function storeData($fname,$lname,$mail,$phone,$gender,$about,$address,$pincode,$pass,$file_path,$country,$state,$city){
        $database=new dataBase();
        // $connect=$database->dbConn();
        // $database->createDb($connect);

        $conndb=$database->adminDbConn();
        $database->createUserTable($conndb);

        $conndb=$database->adminDbConn();
        $sql = "INSERT INTO userregistration(firstname, lastname, email, phoneno, gender, aboutuser, userpassword, imgurl, useraddress, pincode,usercountry, userstate, usercity) VALUES('$fname','$lname','$mail','$phone','$gender','$about','$pass','$file_path','$address','$pincode','$country','$state','$city')";
        if ($conndb->query($sql) === TRUE) {
        // echo "<script> confirm('Data Saved')</script>";
        // echo "<script>alert('Data created successfully')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewUserRegForm.php" /> 
        <?php
        } else {
        echo "<script>alert('Error: . $sql . '<br>' . $conn->error')</script>";
        }
        $conndb->close();

    }
}
?>