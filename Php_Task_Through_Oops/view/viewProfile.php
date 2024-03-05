<?php 
    $sr=$_GET['id'];
    require_once '../model/modelLogin.php';
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
    <link rel="stylesheet" href="../assets/css/viewProfile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <span class="head1">Hello
                        <?php echo $row["firstname"];?>
                    </span>
                    <img class="rounded-circle mt-5" width="200px" src=<?php echo $row["imgurl"];?>>
                    <span class="font-weight-bold mt-3">
                        <?php echo $row["firstname"];?>
                        <?php echo $row["lastname"];?>
                    </span>
                    <span class="text-black-50">
                        <?php echo $row["email"];?>
                    </span>
                    <span> </span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Your Profile</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">First Name:</label><input type="text" class="form-control" placeholder="first name" value="<?php echo $row["firstname"];?>">
                        </div>
                        <div class="col-md-6"><label class="labels">Last Name:</label><input type="text" class="form-control" value="<?php echo $row["lastname"];?>" placeholder="surname">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email ID:</label><input type="text" class="form-control" placeholder="enter email id" value=<?php echo $row["email"];?>>
                        </div>
                        <div class="col-md-12"><label class="labels">Mobile Number:</label><input type="text" class="form-control" placeholder="enter phone number" value="<?php echo $row["phoneno"];?>"></div>
                        <div class="col-md-12"><label class="labels">User Address:</label><input type="text" class="form-control" placeholder="enter address " value="<?php echo $row["useraddress"];?>"></div>
                        <div class="col-md-12"><label class="labels">Postcode:</label><input type="text" class="form-control" placeholder="enter pincode" value="<?php echo $row["pincode"];?>">
                        </div>
                        <div class="col-md-12"><label class="labels">State:</label><input type="text" class="form-control" placeholder="state" value="<?php echo $row["userstate"];?>"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="<?php echo $row["usercountry"];?>">
                        </div>
                        <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="<?php echo $row["usercity"];?>" placeholder="city"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Gender:</label><input type="text" class="form-control" placeholder="gender" value="<?php echo $row["gender"];?>" disabled></div>
                    </div>

                </div>
            </div>



            <div class="col-md-4 mt-3">
                <span id="hintpost" class="hint-css postjob">Create New Job</span><br>
                <span class="plus-icon hpost"><a href="http://localhost/html/Php_Task_Through_Oops/view/viewJobPost.php?id=<?php echo $row["sr"];?> & mail=<?php echo $row["email"];?>" class="text-white"><i class="fa-solid fa-plus"></i></a></span>
                <a href="../controller/conSession.php"><input type="submit" name="submit" value="LOGOUT" class="preview " onclick="return logout()"></a>
                <div class="p-3 py-5 ">
                    <div class="col-md-12"><label class="labels">About Mr. <?php echo $row["firstname"];?>:
                        </label><input type="text" class="form-control" placeholder="about your self"
                            value="<?php echo $row["aboutuser"];?>"></div> <br>
                    <a href="http://localhost/html/Php_Task_Through_Oops/view/viewUserPostedJobs.php?id=<?php echo $row["sr"];?> & mail=<?php echo $row["email"];?>"><input type="submit" name="submit" value="View Your Posted Jobs" class="pre-post">
                    </a>
                </div>
                <div class=" ">
                    <a href="http://localhost/html/Php_Task_Through_Oops/view/viewProfileEdit.php?id=<?php echo $row["sr"];?>" class="edit-view text-decoration-none" onclick="return cnfEdit()">Edit Profile</a>
                </div>


            </div>


        </div>
    </div>
    </div>
    </div>

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
        function cnfEdit() {
            return confirm("Do you really want to Edit it");
        }
        function logout() {
            return confirm("Do you really want to Logout");
        }

        $(document).ready(function () {
            $("#hintpost").hide();

            $(".hpost").hover(function () {
                $("#hintpost").show();
            }, function () {
                $("#hintpost").hide();
            });
        });

    </script>
</body>

</html>