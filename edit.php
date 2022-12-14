<?php

$servername="localhost";
$username="root";
$password="Root@123";
$database="crud";

$connection= new mysqli($servername, $username , $password , $database);

$id="";
$name="";
$email="";
$phone="";
$address="";

$errMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='GET'){

    if(!isset($_GET["id"])){
header("location: /crud/index.php");
exit;

    }
    $id=$_GET["id"];

    //read data from students
    $sql="SELECT * FROM students WHERE id=$id";
    $result=$connection->query($sql);
    $row=$result->fetch_assoc();

    if(!$row){
        header("location: /crud/index.php");
        exit;
    }

  
    $name=$row['name'];   
    $email=$row['email'];   
    $phone=$row['phone'];   
    $address=$row['address']; 

}else{
//post method:update data od student
$id=$_POST["id"];
$name=$_POST["name"];   
$email=$_POST["email"];   
$phone=$_POST["phone"];   
$address=$_POST["address"]; 

do{
    if( empty($id)|| empty($name)|| empty($email)|| empty($phone)|| empty($address) ){
        $errMessage="All the fields are reuired"; 
        break;  
       }

$sql="UPDATE students
 SET name ='$name',email ='$email',phone ='$phone',
 address ='$address' WHERE id=$id";
     $result=$connection->query($sql);
     if(!$result){
        $errMessage="Invalid Query: ".$connection->error;
        break;
     }
     $successMessage="Student Updated Successfully.";
header("location: /crud/index.php");
exit;

}while(true);

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Student</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container my-5">
    <h2>New Student</h2>

<?php
if(!empty($errMessage)){
    echo "
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>$errMessage</strong>
    <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='close'></button>
    </div>";
}

?>


    <form method="post">
<input type="hidden" value="<?php echo $id ?>" name="id">
        <div class="row mb-3">
<label class="col-sm-3 col-form-label">Name</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="name" value="<?php echo $name ?>"> 
    </div>
</div>

    <div class="row mb-3">
<label class="col-sm-3 col-form-label">Email</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="email" value="<?php echo $email ?>"> 
    </div>
    </div>

    <div class="row mb-3">
<label class="col-sm-3 col-form-label">Phone</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="phone" value="<?php echo $phone ?>"> 
    </div>
    </div>

    <div class="row mb-3">
<label class="col-sm-3 col-form-label">Address</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="address" value="<?php echo $address ?>"> 
    </div>
    </div>

    <?php
    if(!empty($successMessage)){
        echo "
        <div class='row mb-3'>
        <div class='offset-sm-3 col-sm-3 col-sm-6'></div>
    <div class='alert alert-success alert-dismissible fade show role='alert'>
    <strong>$errMessage</strong>
    <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='close'></button>
    </div>
    </div>
    </div>"; 
    }
    ?>


  <div class="row mb-3">
    <div class="offset-sm-3 col-sm-3 d-grid">
        <button type="submit" href="/crud/index.php" class="btn btn-primary">Submit</button>
    </div>
    <div class="col-sm-3 d-grid">
        <a class="btn btn-outline-primary" href="/crud/index.php" role="button" >Cancel</a>
    </div>
  </div>

    </form>
</div>
    
</body>
</html>