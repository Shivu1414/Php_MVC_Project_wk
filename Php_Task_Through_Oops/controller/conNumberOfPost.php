<?php
session_start();
require_once '../helper/helperDb.php';

class numberOfPosts{
    public function getPost($mail){
        $database=new dataBase();
        $conndb=$database->adminDbConn();
        $sql = "SELECT * FROM postedjob WHERE email='$mail' ";
        $result=mysqli_query($conndb,$sql);
        if ($result) {
            $alljobs=mysqli_num_rows($result);
            return $alljobs;
        }
    }
}

?>