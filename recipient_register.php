<?php
session_start();
include('home_header.php');
?>
<form action="" method="post" enctype="multipart/form-data">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-7">
        <img src="img/134.png" class="img-fluid" alt="">
        </div>
        <div class="col-sm-5">
            <div class="text-center mt-2 pb-2">
                <h4>Recipient Registration</h4>
            </div>
            <div class="row">
                
                
            <div class="col-sm-4 pb-2">
            Recipient Name
                    </div>
                    <div class="col-sm-8 pb-2">
                        <input type="text" class="form-control" name="dname">
                    </div>
                    <div class="col-sm-4 pb-2">
                    Father's/Mother's Name
                    </div>
                    <div class="col-sm-8 pb-2">
                        <input type="text" class="form-control" name="fname">
                    </div>
                    <div class="col-sm-4 pb-2">
                    Residential Address
                    </div>
                    <div class="col-sm-8 pb-2">
                        <textarea name="addr" id="" class="form-control" cols="30" rows="3"></textarea>
                        
                    </div>
                    <div class="col-sm-4 pb-2">
                    Age
                    </div>
                    <div class="col-sm-8 pb-2">
                        <input type="text" class="form-control" name="dob">
                    </div>
                    <div class="col-sm-4 pb-2">
                    Gender
                    </div>
                    <div class="col-sm-8 pb-2">
                       
                        <select name="gender" class="form-select">
                        <option>-Select-</option>
                        <option>Male</option>
                        <option>Female</option>
                            
                        </select>
                    </div>
                    <div class="col-sm-4 pb-2">
                    Blood Group
                    </div>
                    <div class="col-sm-8 pb-2">
                    <select name="bgroup" class="form-select">
                                        <option>O+</option>
                                        <option>O-</option>
                                        <option>B+</option>
                                        <option>B-</option>
                                        <option>AB+</option>
                                        <option>AB-</option>
                                        <option>A+</option>
                                        <option>A-</option>
                                       </select>
                    </div>
                    <div class="col-sm-4 pb-2">
                    Organs that i wish to donate
                    </div>
                    <div class="col-sm-8 pb-2">
                    <select name="organ" class="form-select">
                                       
                                        <option>Eyes</option>
                                        <option>Kidneys</option>
                                      <option>Lungs</option>
                                      <option>Heart</option>
                                      <option>Liver</option>
                                      
                                      
                                       </select>
                    </div>
                    <!-- <div class="col-sm-4 pb-2">
                    Organ Condition
                    </div>
                    <div class="col-sm-8 pb-2">
                    <select name="condi" class="form-select">
                                        <option>Good</option>
                                        <option>Not Good</option>
                                        
                                       </select>
                    </div> -->
                    <div class="col-sm-4 pb-2">
                    Occupation
                    </div>
                    <div class="col-sm-8 pb-2">
                        <input type="text" class="form-control" name="occu">
                    </div>
                    <div class="col-sm-4 pb-2">
                    E-Mail
                    </div>
                    <div class="col-sm-8 pb-2">
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="col-sm-4 pb-2">
                    Contact No
                    </div>
                    
                <div class="col-sm-8 pb-2">
                    <input type="text" class="form-control" name="cno">
                </div>
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
                    <input type="submit" value="Register" class="btn btn-success shadow-none" name="save">

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
    
  
    $uname=$_POST["uname"];
    $pass=$_POST["pass"];
    $dname=$_POST["dname"];
    $fname=$_POST["fname"];
    $addr=$_POST["addr"];
    $dob=$_POST["dob"];
    $gender=$_POST["gender"];
    $bgroup=$_POST["bgroup"];
    $organ=$_POST["organ"];
    $occu=$_POST["occu"];
    $email=$_POST["email"];
    $cno=$_POST["cno"];
    // $condi=$_POST["condi"];
    
    $sql = "insert into recipient (rname,fname,addr,dob,gender,bgroup,organ,occu,email,cno,st,uname,pass) values('$dname','$fname','$addr','$dob','$gender','$bgroup','$organ','$occu','$email','$cno','-','$uname','$pass')";
    if ($mysqli->query($sql) === TRUE) {
        
        echo("<script> alert('Donor Register Successfully'); </script>");
    }
    else{
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
   

    
}
?>