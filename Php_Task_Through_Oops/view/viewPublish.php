<?php
  $id=$_GET['id'];
  $mail=$_GET['mail'];
  
  session_start();
  $userprofile=$_SESSION['user-email'];
  if($userprofile==true){
  }
  else{
      header("Location:http://localhost/html/Php_Task_Through_Oops/view/viewLogin.php");
  }

  $limit=3;
  if(isset($_GET['page'])){
    $page=$_GET['page'];
  }
  else{
    $page=1;
  }  
  $offset=($page-1)*$limit;

    require_once '../helper/helperDb.php';
    $database=new dataBase();
    $conn=$database->adminDbConn();

    $query = "SELECT * FROM publishpost WHERE email='$mail' ORDER BY sr DESC LIMIT {$offset},{$limit}";
    $result = $conn->query($query);  
  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posted jobs</title>
    <link rel="stylesheet" href="../assets/css/viewPublishAndUnpublish.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bod">
    <div class="body">
    <div class="container-fluid bg-muted p-0">
        <div class="row m-0">
            <div class="col-lg-12 p-0">
                <nav class="navbar nav1 p-0">
                    <div class="div1">
                        <div class="child1">
                            <a class="navbar-brand" href="#">
                                <img src="../assets/img/nav_logo.png" width="200" height="60" class="d-inline-block img align-top"
                                    alt="">
                            </a>
                        </div>

                        <div class="child2">
                           <a href="http://localhost/html/Php_Task_Through_Oops/view/viewProfile.php?id=<?php echo $id;?>" class="link2">User Profile</a>
                            <a href="../controller/conSession.php" class="link1">LOG OUT</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="mini-container p-0 pb-5">
                <div class="row src-row m-0 p-0">
                    <div class="col-lg-12 p-0 m-0">
                        <nav class="navbar navbar-light bg-nav p-5">
                            <form method="post" action="viewSearchData.php?id=<?php echo $id;?> & mail=<?php echo $mail;?>" class="search-form">
                                <div class="form1">
                                    <input name="search" class="form-control mr-sm-2 w-75" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn1 del-btn btn-outline-success my-2 my-sm-0 text-white p-2"
                                        type="submit" >SEARCH FOR A JOB</button>
                                </div>
                            </form>
                        </nav>
                    </div>
                </div>






                <div class="div3">
                    <div class="btm-para btm-para2">PUBLISHED POSTS</div>
                </div>

                <div class="row m-0 mt-4 div2 div4">
                    <div class="row-lg-12 p-3">

                    <?php
                          while($row = mysqli_fetch_assoc($result)) { 
                    ?>
                        <div class="row m-3 card1 mb-2">
                            <div class="col-lg-12 d-flex">
                                <div class="col-lg-3 p-2">
                                    <div class="img1 bg-muted"><img src="<?php echo $row["imgurl"];?>" alt="" class="img-job"></div>
                                </div>
                                <div class="col-lg-9 pt-3">
                                    <div class="card-content">
                                        <h6 class="card-hd">Job Title for this Awesome post simply goes here</h6>
                                        <p class="card-para m-0">Posted By -
                                        <span class="dt">
                                         <?php echo $row["username"];?>
                                        </span>
                                        </p>
                                        <span class="card-para">Job Title -
                                        <span class="dt">
                                         <?php echo $row["jobtitle"];?>
                                        </span>
                                        </span>
                                        <span class="card-para card-para2">Location -
                                        <span class="dt">
                                         <?php echo $row["postlocation"];?>
                                        </span>
                                        </span>
                                        <br>
                                        <p class="card-para m-0">Contact Email -
                                        <span class="dt">
                                         <?php echo $row["email"];?>
                                        </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row src-row m-0 p-0">
                        <div class="col-lg-12 p-0 m-0 d-flex">
                        <div class="col-lg-2 ">
                        <a href="../controller/conDeletePublish.php?sr=<?php echo $row["sr"];?> & id=<?php echo $id;?> & mail=<?php echo $mail;?>" class="edit-btn del-btn" onclick="return cnfdel()">Delete Post </a>
                        </div>

                        <!-- <div class="col-lg-2">
                        <a href="" class="pbls-btn unpbls-btn bg-warning" onclick="return cnfunpublish()">UNPUBLISH POST </a>
                        </div> -->

                        <div class="col-lg-8"></div>

                        </div>
                        </div>

                    <?php
                          }
                          $sql1="SELECT * FROM publishpost WHERE email='$mail'";
                          $result1= mysqli_query($conn,$sql1) or die("Query failed.");

                          if(mysqli_num_rows($result1)>0){
                            $total_card=mysqli_num_rows($result1);
                            $total_page=ceil($total_card/$limit);

                            echo '<ul class="pgn-ul">';
                            if($page>1){
                                echo '<li class="pgn-ul pgn-li"><a href="http://localhost/html/Php_Task_Through_Oops/view/viewPublish.php?page='.($page -1).' & id='.$id.' & mail='.$mail.'" class="text-decoration-none text-light">Prev</a></li>';
                            }
                            for($i=1;$i<=$total_page;$i++){
                                if($i==$page){
                                    $active="active";
                                }
                                else{
                                    $active="";
                                }
                                echo '<li class="pgn-ul pgn-li '.$active.'"><a href="http://localhost/html/Php_Task_Through_Oops/view/viewPublish.php?page='.$i.' & id='.$id.' & mail='.$mail.'" class="text-decoration-none text-light">'.$i.'</a></li>';
                            }
                            if($total_page >$page){
                                echo '<li class="pgn-ul pgn-li"><a href="http://localhost/html/Php_Task_Through_Oops/view/viewPublish.php?page='.($page +1).' & id='.$id.' & mail='.$mail.'" class="text-decoration-none text-light">Next</a></li>';
                            }
                            echo '</ul>';
                          }
                    ?>

                    </div>
                </div>

            </div>
        </div>

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
    function cnfdel(){
        return confirm("Do You really want to Delete it?");
    }
    
    function cnfunpublish(){
        return confirm("Do you really want to Unpublish it?");
    }
</script>   
</body>

</html>