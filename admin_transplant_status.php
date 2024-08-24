<?php
include('admin_header.php')
?>
<form action="" method="post">
<div class="card">
    <div class="card-header  bg-primary pb-0 text-white">
        <nav style="--bs-breadcrumb-divider: '>';">
  <ol class="breadcrumb text-white">
    <li class="breadcrumb-item  text-white"><a href="#">Donor</a></li>
    <li class="breadcrumb-item active  text-white" aria-current="page">Donor List</li>
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
                                <th>Recipient Name</th>

                                <th>Blood Group</th>
                                <th>Organ</th>
                                <th>Request Date</th>
                                <th>Response Date</th>
                                <th>Donor ID</th>
                                <th>Recipient ID</th>
                                <th>Status</th>
                                <th>Process</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once('config.php');
                            $i = 1;
                            //    echo "SELECT * FROM donor where st='-'";

                           
                            $sql = mysqli_query($mysqli, "SELECT * FROM transplant ");
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
                                    <td>D<?php echo $rs['did']; ?></td>
                                    <td>R<?php echo $rs['rid']; ?></td>
                                    

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
                                    <td>
                                        <?php
                                        $st1 = $rs['st'];

                                        if (strcmp($st1, "-") == 0) {
                                        ?>
                                            <a href="admin_transplant_status.php?did=<?php echo $rs['did']; ?>&rid=<?php echo $rs['rid']; ?>&id=<?php echo $rs['id']; ?>" class="btn btn-success btn-sm shadow-none text-white">Transplant</a>

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

    <?php
include('home_footer.php');
include('config.php');
if(isset($_GET["did"]))
{
   
    $did=$_GET["did"];
    $rid=$_GET["rid"];
    $id=$_GET["id"];
    $dt2=date('d-m-Y');
    
    $sql = "update transplant set st='Donated',dt2='$dt2' where id=$id";
    
    if ($mysqli->query($sql) === TRUE) {
        $sql = "update donor set st='Donated' where id=$did";
        $mysqli->query($sql);
        $sql = "update recipient set st='Donated' where id=$rid";
        $mysqli->query($sql);
        
        echo("<script> alert('Organ Transplant Successfully'); </script>");
    }
    else{
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    } 
}
?>