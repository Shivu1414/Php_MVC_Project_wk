<?php
    $id=$_GET['id'];
    $mail=$_GET['mail'];

    $sr=$id;

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
    // $sql = "SELECT * FROM postedjob WHERE email='$mail' ";
    // $result=mysqli_query($conn,$sql);

    $limit=10;
    if(isset($_GET['page'])){
      $page=$_GET['page'];
    }
    else{
      $page=1;
    }
    $offset=($page-1)*$limit;

    $query = "SELECT * FROM postedjob WHERE email='$mail' ORDER BY sr DESC LIMIT {$offset},{$limit}";
    $result = $conn->query($query); 
     
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Posted Job</title>

  <link rel="stylesheet" href="../assets/css/viewUserPostedJobs.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="">   
  <div class="body">    
    <div class="container-fluid p-0">
        <nav class="navbar navbar p-0">
          <div class="nav-left">
            <div>
            <a class="p-0" href="#">
                <img src="../assets/img/webkul_logo.png" class="logo" alt="">
            </a>
            </div>
            <div class="">
            <span class="logo-content"> Webkul</span>
            </div>
          </div>
          <div class="nav-right">
          <a href="http://localhost/html/Php_Task_Through_Oops/view/viewProfile.php?id=<?php echo $id;?>" class="link1">User Profile</a>
          <a href="../controller/conSession.php" class="link1" onclick="return logout()">LOGOUT</a>
          </div>
        </nav>
    </div>


    <div class="row m-5">
      <div class="col-lg-2 ">
        <div class="f-link">
           <a href="../view/viewPublish.php?id=<?php echo $id;?> & mail=<?php echo $mail;?>" class="btn-a" onclick="return publishpost()">Your Publish Post</a>
        </div>   
       </div>
      <div class="col-lg-8">
           <div class="m-link">
           <div class="btm-para">You can edit your post only here before publishing it.</div>
           </div>   
      </div>
      <div class="col-lg-2 ">
          <div class="f-link s-link">
           <a href="../controller/conAllDelete.php?id=<?php echo $id;?> & mail=<?php echo $mail;?>" class="btn-a" onclick="return alldel()">All Delete</a>
           </div>              
      </div>
    </div>



    <div class="div2 ">
      <form method="POST" action="../controller/conMultipleDelete.php?id=<?php echo $id;?> & mail=<?php echo $mail;?>">
      <table class="table1" border="1" cellSpacing="0"> 

        <thead class="thead-dark">
          <tr >
            <th class="col" width="9%"><input type="submit" name="mul_delete" class="mul-del" value="Delete" onclick="return mulDel()"> </th>
            <th class="col" width="9%">Company </th>
            <th class="col" width="16%">Name</th>
            <th class="col" width="24%">Email</th>
            <th class="col" width="12%">Location</th>
            <th class="col" width="15%">Title</th>
            <th class="col" width="15%">Actions</th>

          </tr>
        </thead>
      </table>
        <?php
          while($row = mysqli_fetch_assoc($result)) { 
        ?>
      <table class="table1 table2" border="1" cellSpacing="0" >
        <tbody>
          <tr height="">
            <td width="9%"><input type="checkbox" name="multiple_delete[]" value="<?= $row['sr'];?>"> </td>
            <td width="9%"><img src="<?php echo $row['imgurl'];?>" alt="" class="img-data"></td>
            <td width="16%"><?php echo $row['username'];?></td>
            <td width="24%"><?php echo $row['email'];?></td>
            <td width="12%"><?php echo $row["postlocation"];?></td>
            <td width="15%"><?php echo $row['jobtitle'];?></td>
            <td width="15%"><a href="../controller/conDeleteJobs.php?sr=<?php echo $id;?> & id=<?php echo $row['sr'];?> & mail=<?php echo $row['email'];?>" class="delete" onclick="return cnfDelete();"><i class="fa-solid fa-trash"></i></a>
                <a href="../view/viewUpdateJob.php?sr=<?php echo $id;?> & id=<?php echo $row['sr'];?>" class="update" onclick="return cnfEdit();"><i class="fa-solid fa-pen" ></i></a>
                <a href="../controller/conPublishJobs.php?sr=<?php echo $id;?> & id=<?php echo $row['sr'];?> & mail=<?php echo $row['email'];?>" class="publish" onclick="return cnfPublish();"><i class="fa-solid fa-upload"></i></a>
            </td>
          </tr>
        </tbody>
        </table>


        <?php
          }   
          ?>
          </form>
          <?php
          $sql1="SELECT * FROM postedjob WHERE email='$mail'";
          $result1= mysqli_query($conn,$sql1) or die("Query failed.");

          if(mysqli_num_rows($result1)>0){
          $total_card=mysqli_num_rows($result1);
          $total_page=ceil($total_card/$limit);

          echo '<ul class="pgn-ul">';
          if($page>1){
                echo '<li class="pgn-ul pgn-li"><a href="http://localhost/html/Php_Task_Through_Oops/view/viewUserPostedJobs.php?page='.($page -1).' & id='.$sr.' & mail='.$mail.'" class="text-decoration-none text-light">Prev</a></li>';
          }
          for($i=1;$i<=$total_page;$i++){
              if($i==$page){
                 $active="active";
              }
              else{
                  $active="";
              }
              echo '<li class="pgn-ul pgn-li '.$active.'"><a href="http://localhost/html/Php_Task_Through_Oops/view/viewUserPostedJobs.php?page='.$i.' & id='.$sr.' & mail='.$mail.'" class="text-decoration-none text-light">'.$i.'</a></li>';
          }
          if($total_page >$page){
              echo '<li class="pgn-ul pgn-li"><a href="http://localhost/html/Php_Task_Through_Oops/view/viewUserPostedJobs.php?page='.($page +1).' & id='.$sr.' & mail='.$mail.'" class="text-decoration-none text-light">Next</a></li>';
          }
          echo '</ul>';
          }
        ?>
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
        function cnfPublish(){
                return confirm("Do you really want to Publish it");
        }
        function cnfEdit(){
                return confirm("Do you really want to Update it");
        }
        function cnfDelete(){
                return confirm("Do you really want to Delete it");
        }
        function logout(){
                return confirm("Do you really want to Logout");
        }
        function alldel(){
                return confirm("Warning: Do you really want to Delete all the data.");
        }
        function mulDel(){
          return confirm("Warning: Do you really want to Delete all selected data.");
        }
</script>
  </body>

</html>