<?php
include('home_header.php')
?>
<form action="" method="post" enctype="multipart/form-data">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-7">
        <img src="img/654.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-sm-5">
            <div class="text-center mt-2 pb-2">
                <h3>Admin Login</h3>
            </div>
            <div class="row">
                
                
                <div class="col-sm-4 pb-2">
                    User Name
                </div>
                <div class="col-sm-8 pb-2">
                    <input type="text" class="form-control" name="uname">
                </div>
                <div class="col-sm-4 pb-2">
                    Password
                </div>
                <div class="col-sm-8 pb-2">
                    <input type="password" class="form-control" name="pass">
                </div>
                <div class="col-sm-4 pb-2">
                    
                </div>
                <div class="col-sm-8 pb-2">
                    <input type="submit" value="Login" class="btn btn-success shadow-none" name="save">
                </div>
            </div>
        </div>

    </div>
</div>
</form>
<?php
include('home_footer.php');
include('config.php');
if(isset($_POST["save"]))
{
    session_start();
  
    $uname=$_POST["uname"];
    $pass=$_POST["pass"];
    $sql = mysqli_query($mysqli,"select * from admin where uname='$uname' and pass='$pass'");
    if ($rs = mysqli_fetch_array($sql)) {
       
        // $_SESSION["uname"] = $rs['uname'];
        echo "<script> window.location.href='admin_donor_list.php' </script>";
    }
    else{
        echo("<script> alert('Invalid Username/Password'); </script>");
    }   
}
?>
