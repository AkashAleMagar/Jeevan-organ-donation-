<?php
session_start();
include('recipient_header.php');
?>
<div class="card">
    <div class="card-header">
    Transplant Request
    </div>

<form action="" method="post" enctype="multipart/form-data">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-7">
        <img src="img/12.png" class="img-fluid" alt="">
        </div>
        <div class="col-sm-5">
            <div class="text-center mt-2 pb-2">
                
            </div>
            <div class="row">
                <?php
                $rname=$_SESSION["rname"];
                $bgroup=$_SESSION["bgroup"];
                $organ=$_SESSION["organ"];
                $dname=$_GET['dname'];
                $did=$_GET['did'];
                
                $dt1=date('d-m-Y');
                ?>
                
            <div class="col-sm-4 pb-2">
            Donor Name
                    </div>
                    <div class="col-sm-8 pb-2">
                        <input type="text" value="<?php echo $dname; ?>" class="form-control" name="dname">
                    <input type="hidden" name="did" value="<?php echo $did; ?>">
                    </div>
                    <div class="col-sm-4 pb-2">
                    Recipient Name
                    </div>
                    <div class="col-sm-8 pb-2">
                        <input type="text" value="<?php echo $rname; ?>" class="form-control" name="rname">
                    </div>
                    <div class="col-sm-4 pb-2">
                    Blood group
                    </div>
                    <div class="col-sm-8 pb-2">
                    <input type="text" value="<?php echo $bgroup; ?>" class="form-control" name="bgroup">
                    </div>
                    <div class="col-sm-4 pb-2">
                    Organ
                    </div>
                    <div class="col-sm-8 pb-2">
                    <input type="text" value="<?php echo $organ; ?>" class="form-control" name="organ">
                    </div>
                    <div class="col-sm-4 pb-2">
                    Request Date
                    </div>
                    <div class="col-sm-8 pb-2">
                    <input type="text" value="<?php echo $dt1; ?>" class="form-control" name="dt1">
                    </div>
                    
                    
                    
                <div class="col-sm-4 pb-2">
                    
                </div>
                <div class="col-sm-8 pb-2">
                    <input type="submit" value="Request" class="btn btn-success shadow-none" name="save">

                </div>
                

            </div>
        </div>

    </div>
</div>
</form>
</div>
<?php
include('home_footer.php');
include('config.php');
if(isset($_POST["save"]))
{
   
    $dname=$_POST["dname"];
    $rname=$_POST["rname"];
   
    $bgroup=$_POST["bgroup"];
    $organ=$_POST["organ"];
    $dt1=$_POST["dt1"];
    $did=$_POST["did"];
   
   $rid=$_SESSION["rid"];
    
    $sql = "insert into transplant (dname,rname,bgroup,organ,dt1,dt2,st,rid,did) values('$dname','$rname','$bgroup','$organ','$dt1','-','-','$rid','$did')";
    if ($mysqli->query($sql) === TRUE) {
        
        echo("<script> alert('Organ Booking Successfully'); </script>");
    }
    else{
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    } 
}
?>