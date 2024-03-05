<?php
require_once '../controller/loginController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../assets/css/viewCommon.css">
    <link rel="stylesheet" href="../assets/css/viewLogin.css">

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

<body class="m-0" onload="generate()">
    <div class="container-fluid">
        <div class="row">
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
                            <a href="http://localhost/html/Php_Task_Through_Oops/view/viewAdminLogin.php" class="reg">ADMIN
                                REGISTRATION</a>
                            <a href="http://localhost/html/Php_Task_Through_Oops/view/viewUserRegForm.php"
                                class="reg a-reg">USER REGISTER</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>




        <div class="text-center fw-bold">
            <span class="error req-fd fw-bold">
                <?php echo $msgErr;?>
            </span>
        </div>

        <div class="div2 p-2">
            <div class="child3">
                <h3 class="head1">Login</h3>
            </div>


            <form method="post" autocomplete="off" action="../index.php" onsubmit="return cnfLogin()">
            
            <p>
                <span class="error req-fd">* required field</span>
                <span class="toggle tgl">
                <label class="switch" >
                <input type="checkbox" name="checkbox" value="Admin" >
                <span class="slider round" ></span>
                </label>
                <span id="hinttoggle" class="hint-css">For Admin Mode</span>
                </span>
            </p>

            <!-- <form method="post" autocomplete="off" action="../index.php" onsubmit="return cnfLogin()"> -->
                <div class="form-content">
                    <span class="para1">E-mail:</span>
                    <span class="error req-fd" id="mailErr">*
                        <?php echo $emailErr;?>
                    </span>
                    <span id="okmail" class="status ok-g hcm"><i class="fa-regular fa-circle-check"></i></span>
                    <span id="unokmail" class="status unok-r hcm"><i class="fa-regular fa-circle-xmark"></i></span>
                    <span id="hint" class="hint-css"></span>
                    <br><input type="text" name="email" value="<?php echo $email;?>" class="inp" id="emailVal">
                    <br>
                </div>

                <div class="form-content">
                    <span class="para1">Password:</span>
                    <span class="error req-fd" id="passErr">*
                        <?php echo $passErr;?>
                    </span>
                    <span id="okpass" class="status ok-g hcp"><i class="fa-regular fa-circle-check"></i></span>
                    <span id="unokpass" class="status unok-r hcp"><i class="fa-regular fa-circle-xmark"></i></span>
                    <span id="hintpass" class="hint-css-p"></span>
                    <br><input type="password" name="password" value="" class="inp" id="passVal">
                    <br>
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
                        <span id="hintcb" class="hint-css-p  hint-css-cb"></span>
                </div>

                <div class="form-content text-center">
                    <input type="submit" name="submit" value="LOGIN NOW" class="preview ">
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
        stats=1;
        function cnfLogin(){
             if(statm===0 && statp===0 && statc===0 && trm===1){
                return confirm("Do you really want to login");
             }
             else{
                confirm("Please fill all field correctly");
                return false;
             }
            }
    </script>
    <script src="../assets/js/viewLogin.js"></script>


</body>

</html>