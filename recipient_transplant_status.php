<?php
session_start();
include('recipient_header.php');
?>
<div class="card">
    <div class="card-header">
    <strong>Transplant Status</strong>
    </div>
    <div class="row p-2">
        <div class="col-sm-12">
            <div class="row">
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>#</th>

                                <th>Donor Name</th>
                                <th>Recipient Name</th>

                                <th>Blood Group</th>
                                <th>Organ</th>
                                <th>Request Date</th>
                                <th>Response Date</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once('config.php');
                            $i = 1;
                            //    echo "SELECT * FROM donor where st='-'";
                            $rid = $_SESSION["rid"];
                           
                            $sql = mysqli_query($mysqli, "SELECT * FROM transplant where rid='$rid'");
                            while ($rs = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>


                                    <td><?php echo $rs['dname']; ?></td>
                                    <td><?php echo $rs['rname']; ?></td>
                                    <td><?php echo $rs['bgroup']; ?></td>
                                    <td><?php echo $rs['organ']; ?></td>
                                    <td><?php echo $rs['dt1']; ?></td>
                                    <td><?php echo $rs['dt2']; ?></td>
                                    

                                    <td>

                                        <?php
                                        $st1 = $rs['st'];

                                        if (strcmp($st1, "-") == 0) {
                                        ?>
                                            <div class="badge bg-danger">
                                                Pending
                                            </div>

                                        <?php
                                        } else {
                                        ?>
                                            <div class="badge bg-success">
                                                Donated
                                            </div>
                                        <?php
                                        }

                                        ?>
                                    </td>
                                    

                                </tr>
                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>


    </div>
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
   $rid=$_SESSION["rid"];
    
    $sql = "insert into transplant (dname,rname,bgroup,organ,dt1,dt2,st,rid) values('$dname','$rname','$bgroup','$organ','$dt1','-','-','$rid')";
    if ($mysqli->query($sql) === TRUE) {
        
        echo("<script> alert('Organ Booking Successfully'); </script>");
    }
    else{
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    } 
}
?>