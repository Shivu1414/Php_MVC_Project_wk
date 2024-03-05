<?php
$id=$_GET["id"];
$mail=$_GET["mail"];
$search=$_POST["search"];

session_start();
$userprofile=$_SESSION['user-email'];
if($userprofile==true){
}
else{
    header("Location:http://localhost/html/Php_Task_Through_Oops/view/viewLogin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = test_input($search);
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

require_once '../helper/helperDb.php';
$database=new dataBase();
$conn=$database->adminDbConn();

$query ="SELECT * FROM publishpost WHERE jobtitle LIKE '%$search%'";
$result=mysqli_query($conn,$query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posted jobs</title>
    <link rel="stylesheet" href="../assets/css/viewPublishAndUnpublish.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</head>

<body class="bod">

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
                            <a href="http://localhost/html/Php_Task_Through_Oops/view/viewPublish.php?id=<?php echo $id;?> & mail=<?php echo $mail;?>" class="link1">All Post</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="container bg-muted p-0">
                <div class="row m-0 mt-4 div2">
                    <div class="row-lg-12 p-3 ">

                    <?php
                    
                          while($row = mysqli_fetch_assoc($result)) { 
                    ?>

                        <div class="row m-3 card1 ">
                            <div class="col-lg-12 d-flex">
                                <div class="col-lg-3 p-2">
                                    <div class="img1 bg-muted"><img src="<?php echo $row["imgurl"];?>" class="img-job"></div>
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
                    <?php
                          }
                    ?>   
                    </div>

                </div>
            </div>
        </div>

    </div>

</body>

</html>
<?php
   $conn->close();
?>