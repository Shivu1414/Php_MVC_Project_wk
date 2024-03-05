<?php
require_once '../helper/helperDb.php';
session_start();
class profileEdit{
    public function storeData($sr,$fname,$lname,$mail,$phone,$gender,$about,$file_path,$address,$pincode,$country,$state,$city){
        $database=new dataBase();
        // $connect=$database->dbConn();
        // $database->createDb($connect);

        // $conndb=$database->adminDbConn();
        // $database->createTable($conndb);

        $conndb=$database->adminDbConn();
        $sql ="UPDATE userregistration set firstname='$fname', lastname='$lname', email='$mail', phoneno='$phone', gender='$gender', aboutuser='$about', imgurl='$file_path', useraddress='$address', usercountry='$country', userstate='$state', usercity='$city', pincode='$pincode' WHERE sr='$sr'";

        if ($conndb->query($sql) === TRUE) {
        // echo "<script> confirm('Data Updated')</script>";
        // return redirect()->back();
        // echo "<script>alert('Data created successfully')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewProfile.php?id=<?php echo $sr;?>" /> 
        <?php
        } else {
        echo "<script>alert('Error: . $sql . '<br>' . $conn->error')</script>";
        }
        $conndb->close();

    }
}
?>
