<?php
    $sr=$_GET['id'];
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
    $limit=5;
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }
    else{
        $page=1;
    }
    $offset=($page-1)*$limit;
      
    $query = "SELECT * FROM userregistration ORDER BY sr DESC LIMIT {$offset},{$limit}";
    $result = $conn->query($query); 
           
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="../assets/css/viewAdminProfile.css">

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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<div class="body">
<div class="container-fluid p-0">
        <nav class="navbar navbar p-0">
          <div class="left-part">
            <a class="navbar-brand " href="#">
                <img src="../assets/img/nav_logo_black.png" class="logo" alt=""><span class="logo-content"> Webkul</span>
            </a>
          </div>
          <div class="right-part">
             <a href="../controller/conSession.php" class="link1" onclick="return logout()">Logout</a>
          </div>
        </nav>
    </div>

    <div class="row m-5">
      <div class="col-lg-2 "></div>
      <div class="col-lg-8">
           <div class="m-link">
           <div class="btm-para">Here are all the users of Webkul</div>
           </div>   
      </div>
      <div class="col-lg-2 ">
          <div class="f-link s-link">
           <a href="../controller/conAdminAllDelete.php?id=<?php echo $sr;?>" class="btn-a" onclick="return alldel()">All Delete</a>
           </div>              
      </div>
    </div>


    <div class="div2 ">
    <form method="POST" action="../controller/conAdminMultiDel.php?id=<?php echo $sr;?>" >
      <table id="supact" class="table1" border="1" cellSpacing="0"> 

        <thead class="thead-dark">
          <tr >
            <th class="col" width="7%"><input type="submit" name="mul_delete" class="mul-del" value="Delete" onclick="return mulDel()"> </th>
            <th class="col" width="15%">Picture </th>
            <th class="col" width="13%">Name</th>
            <th class="col" width="21%">Email</th>
            <th class="col" width="13%">No. of Posts</th>
            <th class="col" width="13%">Publish Posts</th>
            <th class="col" width="18%">Actions</th>
          </tr>
        </thead>
      </table>

        <?php
          require_once '../controller/conNumberOfPost.php';
          require_once '../controller/conNumberOfPubPost.php';
          $pubdata=new PublishPosts();
          $getdata=new numberOfPosts();
          while($row = mysqli_fetch_assoc($result)) { 
        ?>
      <table class="table1 table2" border="1" cellSpacing="0" >
        <tbody>
          <tr height="" class="">
            <td width="7%"><input type="checkbox" name="multiple_delete[]" value="<?= $row['sr'];?>"> </td>
            </form>

            <td width="15%"><img src="<?php echo $row['imgurl'];?>" alt="" class="img-data"></td>
            <td width="13%"><?php echo $row['firstname'];?> <?php echo $row['lastname'];?></td>
            <td width="21%"><?php echo $row['email'];?></td>

            <form method="POST" action="../controller/conAdminToggleActInact.php?id=<?php echo $sr;?> & mail=<?php echo $row['email'];?>" >
            
            <td width="13%"><input type="submit" name="activelink" class="all-posts" value="<?php echo $getdata->getPost($row["email"]);?>"></td>
            <td width="13%"><input type="submit" formaction="../controller/conAUserPublish.php?id=<?php echo $sr;?> & mail=<?php echo $row['email'];?>" name="" class="all-posts" value="<?php echo $pubdata->getPost($row["email"]);?>"></td>
            
            <td width="18%">
                <span id="hinttoggle" class="hint-css">Make Link Active Or Inactive</span><br>
                <span class="toggle tgl">
                <label class="switch" >
                <input type="checkbox" name="checkbox" id="checkbox" class="checkbox" value="Active" >
                <span class="slider round" ></span>
                </label>
                </span>             
            </td>
            </form>

          </tr>
        </tbody>
        </table>

        <?php
          }  
 
          $sql1="SELECT * FROM userregistration";
          $result1= mysqli_query($conn,$sql1) or die("Query failed.");

          if(mysqli_num_rows($result1)>0){
          $total_card=mysqli_num_rows($result1);
          $total_page=ceil($total_card/$limit);

          echo '<ul class="pgn-ul">';
          if($page>1){
                echo '<li class="pgn-ul pgn-li"><a href="http://localhost/html/Php_Task_Through_Oops/view/viewAdminProfile.php?page='.($page -1).' & id='.$sr.'" class="text-decoration-none text-light">Prev</a></li>';
          }
          for($i=1;$i<=$total_page;$i++){
              if($i==$page){
                 $active="active";
              }
              else{
                  $active="";
              }
              echo '<li class="pgn-ul pgn-li '.$active.'"><a href="http://localhost/html/Php_Task_Through_Oops/view/viewAdminProfile.php?page='.$i.' & id='.$sr.'" class="text-decoration-none text-light">'.$i.'</a></li>';
          }
          if($total_page >$page){
              echo '<li class="pgn-ul pgn-li"><a href="http://localhost/html/Php_Task_Through_Oops/view/viewAdminProfile.php?page='.($page +1).' & id='.$sr.'" class="text-decoration-none text-light">Next</a></li>';
          }
          echo '</ul>';
          }
        ?>
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
        function alldel(){
                return confirm("Warning: Do you really want to Delete all the data.");
        }
        function logout(){
                return confirm("Do you really want to Logout");
        }
        function mulDel(){
                return confirm("Do you really want to Delete it");
        }
</script>     

<script src="../assets/js/viewAdminProfile.js"></script>

</body>
</html>