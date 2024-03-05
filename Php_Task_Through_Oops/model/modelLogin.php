<?php
session_start();
    class loginModel{
        public $servername = "localhost";
        public $username = "root";
        public $password = "webkul";
        public $dbname="PhpOopsTaskDb";
        public $connDb="";

        public function authenticate($check,$mail, $pass){
            $this->connDb = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($this->connDb->connect_error) {
                die("Connection failed: " . $this->connDb->connect_error);
            }



            $sql = "SELECT * FROM adminregistration WHERE email='$mail' AND adminpassword='$pass' ";
            $result=mysqli_query($this->connDb,$sql);

            $sql1 = "SELECT * FROM userregistration WHERE email='$mail' AND userpassword='$pass' ";
            $result1=mysqli_query($this->connDb,$sql1);

            if($check===1){
                if ($result) {
                   if(mysqli_num_rows($result)>=1){
                    //   echo "<script>alert('Login Admin  Successfully...')</script>";
                      $row = mysqli_fetch_assoc($result);
                      $_SESSION['user-email']=$mail;
                      ?>
                      <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewAdminProfile.php?id=<?php echo $row["sr"];?>" /> 
                      <?php
                    }
                    else{
                       echo "<script>alert('No Admin Found...')</script>";
                       $this->connDb->close();
                        ?>
                       <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewLogin.php" /> 
                        <?php              
                    }
                }
                else 
                {
                    echo "<script>alert('Error: . $sql . '<br>' . $this->connDb->error')</script>";
                    $this->connDb->close();
                 }
            }
            else if($check===0){
               if ($result1) {
                   if(mysqli_num_rows($result1)>=1){
                    // echo "<script>alert('Login data  Successfully...')</script>";
                    $row = mysqli_fetch_assoc($result1);

                   $_SESSION['user-email']=$mail;
                   ?>
                   <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewProfile.php?id=<?php echo $row["sr"];?>" /> 
                   <?php
                  }
                  else{
                    echo "<script>alert('No user Found...')</script>";
                    $this->connDb->close();
                     ?>
                    <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewLogin.php" /> 
                     <?php              
                 }
               }
               else 
                {
                    echo "<script>alert('Error: . $sql1 . '<br>' . $this->connDb->error')</script>";
                    $this->connDb->close();
                 }
            } 

        }
    }
?>


        <!-- else if(mysqli_num_rows($result1)==0 && mysqli_num_rows($result)>=1){
             echo "<script>document.getElementById('msgPara').innerHTML('Login Credential not found please register first..');</script>";
               echo "<script>alert('Hello Mr. Admin Welcome to our job Post Website')</script>";
                $this->connDb->close();
            
                <meta http-equiv="refresh" content="0; url=http://localhost/html/Php_Task_Through_Oops/view/viewLogin.php" /> 
               
             }
             else if(mysqli_num_rows($result1)==0 && mysqli_num_rows($result)==0){
                 echo "<script>alert('Account is not found.')</script>";
                $this->connDb->close();
            } -->
            