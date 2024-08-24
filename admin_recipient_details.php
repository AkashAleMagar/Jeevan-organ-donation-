<?php
include('admin_header.php')
?>
<form action="" method="post">
<div class="card">
    <div class="card-header  bg-primary pb-0 text-white">
        <nav style="--bs-breadcrumb-divider: '>';">
  <ol class="breadcrumb text-white">
    <li class="breadcrumb-item  text-white"><a href="#">Recipient</a></li>
    <li class="breadcrumb-item active  text-white" aria-current="page">Recipient List</li>
  </ol>
</nav>  
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
                            <th>Father Name</th>
                            <th>Address</th>
                            <th>Age</th>
                            <th>Gender</th>
                            
                            <th>Blood Group</th>
                            <th>Organ</th>
                            <th>Occupation</th>
                            <th>E-Mail ID</th>
                            <th>Contact Number</th>
                            <th>Status</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php
            include_once('config.php');
            $i = 1;
        //    echo "SELECT * FROM donor where st='-'";
            $sql = mysqli_query($mysqli, "SELECT * FROM recipient");
            while ($rs = mysqli_fetch_array($sql)) {
            ?>
                            <tr>
                                <td><?php echo $i ; ?></td>
                                
                                <td><?php echo $rs['rname']; ?></td>
                                <td><?php echo $rs['fname']; ?></td>
                                <td><?php echo $rs['addr']; ?></td>
                                <td><?php echo $rs['dob']; ?></td>
                                <td><?php echo $rs['gender']; ?></td>
                                <td><?php echo $rs['bgroup']; ?></td>
                                <td><?php echo $rs['organ']; ?></td>
                                <td><?php echo $rs['occu']; ?></td>
                                <td><?php echo $rs['email']; ?></td>
                                <td><?php echo $rs['cno']; ?></td>
                                
                                <td>
                                    
                                    <?php
                                    $st1=$rs['st'];
                                   
                                    if(strcmp($st1,"-")==0)
                                    {
                                    ?>
                                    <div class="badge bg-danger">
                                    Not Donated
                                    </div>
                                    
                                    <?php
                                    }
                                    else
                                    {
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
    </form>
<a href="admin_recipient_details.php?id=1" class="btn btn-warning text-white mt-2">Process</a>
<?php
include('footer.php');
include('config.php');
if (isset($_GET["id"])) {
    $bgroup = array("O+", "O-", "A+", "A-", "AB+", "AB-", "B+", "B-");
    $organ = array('Eyes','Kidneys','Lungs','Heart','Liver');
    for($i=0;$i<8;$i++)
    {
        for($j=0;$j<5;$j++)
        {
            $sql = mysqli_query($mysqli, "SELECT * FROM recipient where bgroup='$bgroup[$i]' and organ='$organ[$j]' and st='-' order by dob asc");
            if ($rs = mysqli_fetch_array($sql)) {
                $sql1=mysqli_query($mysqli, "SELECT * FROM donor where bgroup='$bgroup[$i]' and organ='$organ[$j]' and st='-'");
                if ($rs1 = mysqli_fetch_array($sql1)) {
                   
                    $rid=$rs['id'];
                    $did=$rs1['id'];
                    
                    $sql2 = "update recipient set st='donated' where id=$rid";
                    $sql3 = "update donor set st='donated' where id=$did";
                    $mysqli->query($sql2);
                    $mysqli->query($sql3);
                    
                    echo $sql2;
                    echo $sql3;
                    
                }
            }
        }
    }
    
    // $sql = "insert into recipient (rname,fname,addr,dob,gender,bgroup,organ,occu,email,cno,st,uname,pass) values('$dname','$fname','$addr','$dob','$gender','$bgroup','$organ','$occu','$email','$cno','-','$uname','$pass')";
    // if ($mysqli->query($sql) === TRUE) {

    //     echo ("<script> alert('Donor Register Successfully'); </script>");
    // } else {
    //     echo "Error: " . $sql . "<br>" . $mysqli->error;
    // }
}
?>