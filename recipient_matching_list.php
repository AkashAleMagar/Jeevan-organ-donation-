<?php
session_start();
include('recipient_header.php');
?>
<div class="card">
    <div class="card-header"></div>
    <div class="row p-2">
        <div class="col-sm-12">
            <div class="row">
                <div class="table-responsive">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>#</th>

                                <th>Date-Of-Birth</th>
                                <th>Gender</th>

                                <th>Blood Group</th>
                                <th>Organ</th>

                                <th>Status</th>
                                <th>Process</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once('config.php');
                            $i = 1;
                            //    echo "SELECT * FROM donor where st='-'";
                            $bgroup = $_SESSION["bgroup"];
                            $organ = $_SESSION["organ"];

                            $sql = mysqli_query($mysqli, "SELECT * FROM donor where st='-' and bgroup='$bgroup' and organ='$organ'");
                            while ($rs = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>


                                    <td><?php echo $rs['dob']; ?></td>
                                    <td><?php echo $rs['gender']; ?></td>
                                    <td><?php echo $rs['bgroup']; ?></td>
                                    <td><?php echo $rs['organ']; ?></td>

                                    <td>

                                        <?php
                                        $st1 = $rs['st'];

                                        if (strcmp($st1, "-") == 0) {
                                        ?>
                                            <div class="badge bg-success">
                                                Available
                                            </div>

                                        <?php
                                        } else {
                                        ?>
                                            <div class="badge bg-danger">
                                                Not Available
                                            </div>
                                        <?php
                                        }

                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $st1 = $rs['st'];

                                        if (strcmp($st1, "-") == 0) {
                                        ?>
                                            <a href="recipient_transplant_request.php?dname=<?php echo $rs['dname']; ?>&bgroup=<?php echo $rs['bgroup']; ?>&organ=<?php echo $rs['organ']; ?>&did=<?php echo $rs['id']; ?>" class="btn btn-success btn-sm shadow-none text-white">Transplant</a>

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
if (isset($_POST["save"])) {


    $uname = $_POST["uname"];
    $pass = $_POST["pass"];
    $dname = $_POST["dname"];
    $fname = $_POST["fname"];
    $addr = $_POST["addr"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $bgroup = $_POST["bgroup"];
    $organ = $_POST["organ"];
    $occu = $_POST["occu"];
    $email = $_POST["email"];
    $cno = $_POST["cno"];
    $sql = "insert into recipient (rname,fname,addr,dob,gender,bgroup,organ,occu,email,cno,st,uname,pass) values('$dname','$fname','$addr','$dob','$gender','$bgroup','$organ','$occu','$email','$cno','-','$uname','$pass')";
    if ($mysqli->query($sql) === TRUE) {

        echo ("<script> alert('Donor Register Successfully'); </script>");
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}
?>