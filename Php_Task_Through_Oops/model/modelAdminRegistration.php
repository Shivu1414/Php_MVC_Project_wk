<?php
require_once '../helper/helperDb.php';
class adminRegistration{
    public function storeData($name,$mail,$pass){
        $database=new dataBase();
        // $connect=$database->dbConn();
        // $database->createDb($connect);

        $conndb=$database->adminDbConn();
        $database->createTable($conndb);

        $conndb=$database->adminDbConn();
        $sql = "INSERT INTO adminregistration(adminname, email, adminpassword) VALUES('$name', '$mail', '$pass')";
        if ($conndb->query($sql) === TRUE) {
        echo "<script> confirm('Data Saved')</script>";
        // echo "<script>alert('Data created successfully')</script>";
        ?>
        <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewAdminLogin.php" /> 
        <?php
        } else {
        echo "<script>alert('Error: . $sql . '<br>' . $conn->error')</script>";
        }
        $conndb->close();

    }
}
?>
