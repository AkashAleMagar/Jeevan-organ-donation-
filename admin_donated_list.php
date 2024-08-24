<?php
include('admin_header.php')
?>
<form action="" method="post">
<div class="card">
    <div class="card-header  bg-primary pb-0 text-white">
        <nav style="--bs-breadcrumb-divider: '>';">
  <ol class="breadcrumb text-white">
    <li class="breadcrumb-item  text-white"><a href="#">Donor</a></li>
    <li class="breadcrumb-item active  text-white" aria-current="page">Donated List</li>
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
            $sql = mysqli_query($mysqli, "SELECT * FROM donor where st<>'-'");
            while ($rs = mysqli_fetch_array($sql)) {
            ?>
                            <tr>
                                <td><?php echo $i ; ?></td>
                                
                                <td><?php echo $rs['dname']; ?></td>
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
                                   
                                    if(strcmp($st1,"-")!=0)
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

    <?php
include('footer.php')
?>