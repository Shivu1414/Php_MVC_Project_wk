<?php 
    $sr=$_GET['sr'];
    $id=$_GET['id'];
    $mail=$_GET['mail'];

    session_start();
    $userprofile=$_SESSION['user-email'];

    if($userprofile==true){
    }
    else{
        header("Location:http://localhost/html/Php_Task_Through_Oops/view/viewLogin.php");
    }

    require_once '../helper/helperDb.php';
    $database=new dataBase();
    $conn=$database->adminDbConn();
    $sql = "SELECT * FROM postedjob WHERE sr='$sr' ";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Jobs</title>
    <link rel="stylesheet" href="../assets/css/viewJobPost.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-muted">
  
    <div class="container-fluid bg-muted p-0">
        <div class="row m-0">
            <div class="col-lg-12 p-0">
                <nav class="navbar nav1 ">
                    <div class="div1">
                        <div class="child1">
                            <a class="navbar-brand" href="#">
                                <img src="../assets/img/nav_logo.png" width="300" height="100" class="d-inline-block img align-top"
                                    alt="">
                            </a>
                        </div>

                        <div class="child2">
                            <a href="http://localhost/html/Php_Task_Through_Oops/view/viewAllData.php?id=<?php echo $id;?> & mail=<?php echo $mail;?>" class="link1">Back</a>
                            <a href="../controller/conSession.php" class="link1" onclick="return logout()">LOGOUT</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>


        <div class="div2 p-3">
            <div class="child3">
            <h3 class="head1">EDIT JOB</h3>
            </div>
            <p><span class="error req-fd">* required field</span></p>
            <form method="post" action="../controller/conAUserUpdate.php?sr=<?php echo $sr;?> & id=<?php echo $id;?> & mail=<?php echo $mail;?>" enctype="multipart/form-data" onsubmit="return cnfForm()">
                
            <div class="form-content">
                   <span class="para1" >Name:</span> 
                   <span class="error req-fd" id="nameHint">*
                        <?php echo $nameErr;?>
                    </span>
                    <span id="okname" class="status ok-g hcn"><i class="fa-regular fa-circle-check"></i></span>
                    <span id="unokname" class="status unok-r hcn"><i class="fa-regular fa-circle-xmark"></i></span>
                    <span id="hintn" class="hint-css"></span>
                <br><input type="text" name="name" value="<?php echo $row['username'];?>" class="inp" id="nameVal">               
                <br>
            </div>
            

            <div class="form-content">
                   <span class="para1" >E-mail:</span> 
                   <span class="error req-fd" id="mailErr">*
                        <?php echo $emailErr;?>
                    </span>
                    <span id="okmail" class="status ok-g hcm"><i class="fa-regular fa-circle-check"></i></span>
                    <span id="unokmail" class="status unok-r hcm"><i class="fa-regular fa-circle-xmark"></i></span>
                    <span id="hintm" class="hint-css"></span>
                <br><input type="text" name="email" value="<?php echo $row['email'];?>" class="inp" id="emailVal" >              
                <br>
            </div>

            <div class="form-content">
            <span class="para1" >Location:</span> 
                <span class="error req-fd" id="locationHint">*
                    <?php echo $websiteErr;?>
                </span>
                <span id="oklocation" class="status ok-g hloc"><i class="fa-regular fa-circle-check"></i></span>
                <span id="unoklocation" class="status unok-r hloc"><i class="fa-regular fa-circle-xmark"></i></span>
                <span id="hintloc" class="hint-css"></span>
                <br><input type="text" name="location" value="<?php echo $row['postlocation'];?>" class="inp" id="locVal">
                <br>
            </div>

            <div class="form-content">
            <span class="para1" >Job Title:</span> 
               <span class="error req-fd" id="titleHint">*
                    <?php echo $websiteErr;?>
                </span>
                <span id="oktitle" class="status ok-g htitle"><i class="fa-regular fa-circle-check"></i></span>
                <span id="unoktitle" class="status unok-r htitle"><i class="fa-regular fa-circle-xmark"></i></span>
                <span id="hinttitle" class="hint-css"></span>
                <br><textarea name="title" rows="5" cols="40" class="inp1" id="titleVal"><?php echo $row['jobtitle'];?></textarea>
                <br>
            </div>
            

            <div class="form-content">
                    <label for="fileToUpload" class="up-img">Upload Image</label>
                         <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $row['imgurl'];?>" class="upload-img bg-success"  >   
                         <span class="error req-fd" id="imgHint">*
                            <?php echo $imgErr;?>
                        </span>
                         <span id="okimg" class="status ok-g himg"><i class="fa-regular fa-circle-check"></i></span>
                         <span id="unokimg" class="status unok-r himg"><i class="fa-regular fa-circle-xmark"></i></span>
                         <span id="hintimg" class="hint-css-p"></span>       
                </div>
            

            <div class="form-content">
                <input type="submit" name="submit" value="preview post" class="preview ">
            </div>
            </form>
        </div>
    </div>



<script>
        function cnfForm(){
             if( statn==0){
                return confirm("Do you really want to update it");
             }
             else{
                confirm("Please fill all field correctly");
                return false;
             }
        }
        function logout(){
                return confirm("Do you really want to Logout");
        }
</script>

<script src="../assets/js/viewJobPost.js"></script>
</body>




</html>
