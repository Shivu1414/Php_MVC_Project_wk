<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <link rel="stylesheet" href="../assets/css/viewCommon.css">
    <link rel="stylesheet" href="../assets/css/viewUserRegForm.css">
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

<body onload="generate()">
    <div class="container-fluid m-0 p-0">
        <div class="row m-0">
            <div class="col-lg-12 p-0">
                <nav class="navbar nav-clr p-0">
                    <div class="div1">
                        <div class="child1">
                            <a class="navbar-brand" href="#">
                                <img src="../assets/img/nav_logo.png" width="300" height="100"
                                    class="d-inline-block img align-top" alt="">
                            </a>
                        </div>

                        <div class="child2">
                            <a href="http://localhost/html/Php_Task_Through_Oops/view/viewLogin.php" class="reg">Login</a>
                            <a href="http://localhost/html/Php_Task_Through_Oops/view/viewAdminLogin.php" class="reg a-reg">ADMIN REGISTRATION</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="div2 p-3">
            <div class="child3">
                <h3 class="head1">User Registration Form</h3>
            </div>
            <p><span class="error req-fd">* required field</span></p>
            <form method="post" action="../controller/conUserRegistration.php" enctype="multipart/form-data" onsubmit="return cnfRegister()"  >
                <div class="form-content">
                    <span class="para1">First Name:</span>
                    <span class="error req-fd" id="nameHint">*</span>
                    <span id="okname" class="status ok-g hcn"><i class="fa-regular fa-circle-check"></i></span>
                    <span id="unokname" class="status unok-r hcn"><i class="fa-regular fa-circle-xmark"></i></span>
                    <span id="hintn" class="hint-css"></span>
                    <br><input type="text" name="name" value="<?php echo $name;?>" class="inp" id="nameVal">
                    <br>
                </div>


                <div class="form-content">
                    <span class="para1">Last Name:</span>
                    <span class="error req-fd" id="namelHint">*</span>
                    <span id="oklname" class="status ok-g hcln"><i class="fa-regular fa-circle-check"></i></span>
                    <span id="unoklname" class="status unok-r hcln"><i class="fa-regular fa-circle-xmark"></i></span>
                    <span id="hintln" class="hint-css"></span>
                    <br><input type="text" name="lname" value="<?php echo $lname;?>" class="inp" id="lnameVal">
                    <br>
                </div>


                <div class="form-content">
                    <span class="para1">E-mail:</span>
                    <span class="error req-fd" id="emailHint">*
                        <?php echo $emailErr;?>
                    </span>
                    <span id="okmail" class="status ok-g hcm"><i class="fa-regular fa-circle-check"></i></span>
                    <span id="unokmail" class="status unok-r hcm"><i class="fa-regular fa-circle-xmark"></i></span>
                    <span id="hintm" class="hint-css"></span>
                    <br><input type="text" name="email" value="<?php echo $email;?>" class="inp" id="emailVal">
                    <br>
                </div>

                <div class="form-content">
                    <span class="para1">Phone No:</span>
                    <span class="error req-fd" id="phnHint">*
                        <?php echo $phnErr;?>
                    </span>
                    <span id="okphn" class="status ok-g hcph"><i class="fa-regular fa-circle-check"></i></span>
                    <span id="unokphn" class="status unok-r hcph"><i class="fa-regular fa-circle-xmark"></i></span>
                    <span id="hintphn" class="hint-css"></span>
                    <br><input type="tel" class="inp" name="phone" id="phnVal" placeholder="Ex: 6974512311">
                    <br>
                </div>
     

                <div class="form-content mt-4 mb-4">
                    <span class="para1">Gender:</span>
                    <input type="radio" name="gender" value="female" id="gen" class="gendr">
                    <span class="para1">Female</span>   
                    <input type="radio" name="gender" value="male" id="gen" class="gendr">
                    <span class="para1">Male</span>   
                    <input type="radio" name="gender" value="other" id="gen" class="gendr">
                    <span class="para1">Other</span>                   
                    <span id="" class="error req-fd">*</span>
                    <span id="okgender" class="status ok-g hg"><i class="fa-regular fa-circle-check"></i></span>
                    <span id="unokgender" class="status unok-r hg"><i class="fa-regular fa-circle-xmark"></i></span>
                    <span id="hintgender" class="hint-css-p"></span>
                </div>
                

                <div class="form-content">
                <span class="para1" >About Yourself:</span> 
                <span class="error req-fd" id="titleHint">*</span>
                <span id="okabout" class="status ok-g habt"><i class="fa-regular fa-circle-check"></i></span>
                <span id="unokabout" class="status unok-r habt"><i class="fa-regular fa-circle-xmark"></i></span>
                <span id="hintabout" class="hint-css-p"></span>
                <br><textarea name="comment" rows="3" cols="40" class="inp1" id="habout"><?php echo $comment;?></textarea>
                <br>
               </div>

               <div class="form-content">
                <span class="para1" >Address:</span> 
                <span class="error req-fd" id="titleHint">*</span>
                <span id="okadd" class="status ok-g hadd"><i class="fa-regular fa-circle-check"></i></span>
                <span id="unokadd" class="status unok-r hadd"><i class="fa-regular fa-circle-xmark"></i></span>
                <span id="hintadd" class="hint-css-p"></span>
                <br><textarea name="address" rows="3" cols="40" class="inp1" id="haddress"><?php echo $comment;?></textarea>
                <br>
               </div>

               <div class="form-content">
                    <div class="select_option ">
                    <select name="country" class="form-select country inp1" aria-label="Default select example" onchange="return loadStates()">
                        <option selected>Select Country</option>
                    </select>
                    <div class="select_option ">
                    <select name="state" class="form-select state inp1 " aria-label="Default select example" onchange="loadCities()">
                        <option selected>Select State</option>
                    </select>
                    <select name="city" class="form-select city inp1" aria-label="Default select example">
                        <option selected>Select City</option>
                    </select>
                    </div>
                </div>



               <div class="form-content">
                    <span class="para1">Pin Code:</span>
                    <span class="error req-fd" id="pinHint">*</span>•••
                    <span id="okpin" class="status ok-g hpin"><i class="fa-regular fa-circle-check"></i></span>
                    <span id="unokpin" class="status unok-r hpin"><i class="fa-regular fa-circle-xmark"></i></span>
                    <span id="hintpin" class="hint-css"></span>
                    <br><input type="tel" class="inp" name="pincode" id="pinVal" placeholder="Ex: 276304">
                    <br>
                </div>

                <div class="form-content">
                    <span class="para1">Password:</span>
                    <span class="error req-fd">*
                        <?php echo $passErr;?>
                        <?php echo $passSucc;?>
                    </span>
                    <span id="okpass" class="status ok-g hcp"><i class="fa-regular fa-circle-check"></i></span>
                    <span id="unokpass" class="status unok-r hcp"><i class="fa-regular fa-circle-xmark"></i></span>
                    <span id="hintpass" class="hint-css-p"></span>
                    <br><input type="password" name="pass1" value="" class="inp" id="passVal">
                    <br>
                </div>

                <div class="form-content">
                    <span class="para1">Confirm Password:</span>
                    <span class="error req-fd">*
                        <?php echo $passErr;?>
                        <?php echo $passSucc;?>
                    </span>
                    <span id="okpasscnf" class="status ok-g hcpc"><i class="fa-regular fa-circle-check"></i></span>
                    <span id="unokpasscnf" class="status unok-r hcpc"><i class="fa-regular fa-circle-xmark"></i></span>
                    <span id="hintpasscnf" class="hint-css-p"></span>
                    <br><input type="password" name="pass2" value="" class="inp" id="passCnfVal">
                    <br><br>
                </div>

                <div class="form-content">
                <span class="error req-fd" id="imgHint">*IMG Size less than 500KB and Ext: jpg, png, jpeg </span>
                    <label for="fileToUpload" class="up-img">Upload Image</label>
                         <input type="file" name="fileToUpload" id="fileToUpload" value="" class="upload-img bg-success" >   
                         <span id="okimg" class="status ok-g himg"><i class="fa-regular fa-circle-check"></i></span>
                         <span id="unokimg" class="status unok-r himg"><i class="fa-regular fa-circle-xmark"></i></span>
                         <span id="hintimg" class="hint-css-p"></span>       
                </div>

                <div class="form-content captcha-div">
                    <div class="e-captcha" >
                        <label for="" class="c-lable">Enter Captcha:</label>
                        <span id="okcaptcha" class="status ok-g hcc"><i class="fa-regular fa-circle-check"></i></span>
                        <span id="unokcaptcha" class="status unok-r hcc"><i class="fa-regular fa-circle-xmark"></i></span>
                        <span id="hintcaptcha" class="hint-captcha"></span>
                        <input type="text" id="captch" class="c-code">
                    </div>

                    <div class="inline reboot" onclick="generate()" id="hc">
                        <br>
                        <i class="fa-solid fa-rotate-right logo"></i>
                    </div>

                    <div id="cImg" class="inline i-captcha" selectable="False">
                        <label for="" class="c-lable">Captcha Code:</label><br>
                        <p class="i-rnd"><del><span id="random"></span></del></p>
                    </div>
                </div>  
                
                <div class="form-content">
                    <input type="checkbox" name="" value=" " class="check-box-term" id = "checkbox">
                    <label for="">I accept the Terms and Conditions.</label>
                    <span class="error req-fd">*</span>
                        <span id="okcb" class="status ok-g hcb"><i class="fa-regular fa-circle-check"></i></span>
                        <span id="unokcb" class="status unok-r hcb"><i class="fa-regular fa-circle-xmark"></i></span>
                        <span id="hintcb" class="hint-css-p"></span>
                </div>

                <div class="form-content">
                    <input type="submit" name="submit" value="REGISTER NOW" class="preview ">
                </div>
            </form>
        </div>
    </div>

    <div class="container-fluid p-0 footer-div">

<footer class="bg-dark text-center text-white pt-5">
<div class="container p-4 pb-0">
  <section class="mb-4">
    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
  </section>
</div>

<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  © 2020 Copyright:
  <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
</div>
</footer>

</div>


    <script>
            function cnfRegister(){
                 if(trm==1 && statn==0 && statln==0 && statay==0 && statgen==0 && statp==0 && statcp==0 && statm==0 && statphn==0  && statc==0 && statimg==0 ){
                      return confirm("Do you want to register it");
                 }
                 else{
                       confirm("Please fill all field correctly");
                       return false;
                     }
                }
    </script>
   
    <script src="../assets/js/viewUserRegForm.js"></script>
</body>

</html>