<?php 
    $sr=$_GET['id'];
    // require_once '../model/modelLogin.php';
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
    $sql = "SELECT * FROM userregistration WHERE sr='$sr' ";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile page</title>
    <link rel="stylesheet" href="../assets/css/viewProfileEdit.css">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar p-0">
            <a class="navbar-brand " href="#">
                <img src="../assets/img/webkul_logo.png" class="logo" alt=""><span class="logo-content"> Webkul</span>
            </a>
        </nav>
    </div>


    <div class="container rounded bg-white mt-2 mb-5">
        <div class="row">

            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <span class="head1">Hello <?php echo $row["firstname"];?></span>
                    <img class="rounded-circle mt-5" width="200px" src=<?php echo $row["imgurl"];?>>
                    <span class="font-weight-bold mt-3"><?php echo $row["firstname"];?> <?php echo $row["lastname"];?></span>
                    <span class="text-black-50"><?php echo $row["email"];?></span>
                    <span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Edit Profile</h4>
                    </div>

                    <form method="post" action="../controller/conProfileEdit.php?id=<?php echo $row["sr"];?>" enctype="multipart/form-data" onsubmit="return cnfRegister()">
                    <div class="row mt-2">
                         <div class="col-md-6">
                            <label class="labels">First Name:</label>
                            <span class="para1">First Name:</span>
                            <span class="error req-fd" id="nameHint">*</span>
                            <span id="okname" class="status ok-g hcn"><i class="fa-regular fa-circle-check"></i></span>
                            <span id="unokname" class="status unok-r hcn"><i class="fa-regular fa-circle-xmark"></i></span>
                            <span id="hintn" class="hint-css"></span>       
                            <input type="text" name="fname" class="form-control" id="nameVal" placeholder="first name" value="<?php echo $row["firstname"];?>">
                        </div>

                         <div class="col-md-6">
                            <label class="labels">Last Name:</label>
                            <span class="error req-fd" id="namelHint">*</span>
                            <span id="oklname" class="status ok-g hcln"><i class="fa-regular fa-circle-check"></i></span>
                             <span id="unoklname" class="status unok-r hcln"><i class="fa-regular fa-circle-xmark"></i></span>
                             <span id="hintln" class="hint-css"></span>
                            <input type="text" name="lname" class="form-control" id="lnameVal" value="<?php echo $row["lastname"];?>" placeholder="surname">
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Email ID:</label>
                            <span class="error req-fd" id="emailHint">*</span>
                            <span id="okmail" class="status ok-g hcm"><i class="fa-regular fa-circle-check"></i></span>
                            <span id="unokmail" class="status unok-r hcm"><i class="fa-regular fa-circle-xmark"></i></span>
                            <span id="hintm" class="hint-css"></span>
                            <input type="text" name="email" class="form-control" id="emailVal" placeholder="enter email id" value=<?php echo $row["email"];?>>
                        </div>


                        <div class="col-md-12">
                            <label class="labels">Mobile Number:</label>
                            <span class="error req-fd" id="phnHint">*</span>
                            <span id="okphn" class="status ok-g hcph"><i class="fa-regular fa-circle-check"></i></span>
                           <span id="unokphn" class="status unok-r hcph"><i class="fa-regular fa-circle-xmark"></i></span>
                           <span id="hintphn" class="hint-css"></span>
                            <input type="text" name="phone" class="form-control" id="phnVal" placeholder="enter phone number" value="<?php echo $row["phoneno"];?>">
                        </div>
                        
                        
                        
                        <div class="col-md-12">
                            <label class="labels">User Address:</label>
                            <span class="error req-fd" id="titleHint">*</span>
                           <span id="okadd" class="status ok-g hadd"><i class="fa-regular fa-circle-check"></i></span>
                           <span id="unokadd" class="status unok-r hadd"><i class="fa-regular fa-circle-xmark"></i></span>
                            <span id="hintadd" class="hint-css-p"></span>
                            <input type="text" name="address" class="form-control" id="haddress" placeholder="enter address " value="<?php echo $row["useraddress"];?>">
                        </div>
                        
                        
                        <div class="col-md-12">
                            <label class="labels">Postcode:</label>
                            <span class="error req-fd" id="pinHint">*</span>
                           <span id="okpin" class="status ok-g hpin"><i class="fa-regular fa-circle-check"></i></span>
                           <span id="unokpin" class="status unok-r hpin"><i class="fa-regular fa-circle-xmark"></i></span>
                           <span id="hintpin" class="hint-css"></span>
                            <input type="text" name="pincode" id="pinVal" class="form-control" placeholder="enter pincode" value="<?php echo $row["pincode"];?>">
                        </div>
                        
                        <div class="col-md-12">
                            <label class="labels">State:</label><input type="text" name="state" class="form-control" placeholder="state" value="<?php echo $row["userstate"];?>">
                        </div>


                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Country</label><input name="country" type="text" class="form-control" placeholder="country" value="<?php echo $row["usercountry"];?>""></div>
                        <div class="col-md-6"><label class="labels">State/Region</label><input name="city" type="text" class="form-control" value="<?php echo $row["usercity"];?>"" placeholder="city"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Gender:</label><input type="text" name="gender" class="form-control" placeholder="gender" value="<?php echo $row["gender"];?>" ></div>                   
                    </div>

                    <div class="mt-4 text-center"><input type="submit" name="submit" value="Save Profile" class="btn btn-primary profile-button" onclick="return cnfEdit()"></div>

                </div>
            </div>

 

            <div class="col-md-4 mt-3">
                <a href="../controller/conSession.php"><input type="button" name="submit"  value="LOGOUT" class="preview" onclick="return logout()"></a>
               
                <div class="p-3 py-5 ">
                   <div class="col-md-12">
                            <label class="labels">About Mr. <?php echo $row["firstname"];?>:</label>
                            <span class="error req-fd" id="titleHint">*</span>
                           <span id="okabout" class="status ok-g habt"><i class="fa-regular fa-circle-check"></i></span>
                          <span id="unokabout" class="status unok-r habt"><i class="fa-regular fa-circle-xmark"></i></span>
                            <span id="hintabout" class="hint-css-p"></span>
                            <input type="text" name="about" class="form-control" id="habout"  placeholder="about your self" value="<?php echo $row["aboutuser"];?>">
                    </div> 
                    <br>

                    <div class="form-content">
                        <label for="fileToUpload" class="up-img">Upload Image</label>
                         <input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $row["imgurl"];?>" class="upload-img bg-success" >   <br>
                         <span class="error req-fd req-txt" id="imgHint">*IMG Size less than 500KB and Ext: jpg, png, jpeg
                            <?php echo $imgErr;?>
                        </span><br>
                         <span id="okimg" class="status ok-g himg"><i class="fa-regular fa-circle-check"></i></span>
                         <span id="unokimg" class="status unok-r himg"><i class="fa-regular fa-circle-xmark"></i></span>
                         <span id="hintimg" class="hint-css-p"></span>       
                    </div>

                </div>

            </div>

        </div>
    </div>
    </div>
    </div>
</form>


    <div class="container-fluid p-0 mt-5">

  <footer class="bg-dark text-center text-white pt-5">
  <div class="container p-4 pb-0">
    <section class="mb-4">
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>

      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
  </div>

  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
</footer>
  
</div>

    <script>
        function logout(){
                return confirm("Do you really want to Logout");
        }

        function cnfEdit(){
                return confirm("Do you really want to Edit it");
             }

    </script>

    <script src="../assets/js/viewProfileEdit.js"></script>
</body>
</html>