<?php
            $servername="localhost";
            $username="root";
            $password="Root@123";
            $database="crud";

$connection= new mysqli($servername, $username , $password , $database);

$name="";
$email="";
$phone="";
$address="";

$errMessage="";
$successMessage="";

$name=$_POST["name"];   
$email=$_POST["email"];   
$phone=$_POST["phone"];   
$address=$_POST["address"]; 
    
    do{
if( empty($name)|| empty($email)|| empty($phone)|| empty($address) ){
 $errMessage="All the fields are reuired"; 
 break;  
}

//new student
$sql="INSERT INTO students(name,email,phone,address)".
"VALUES('$name','$email','$phone','$address')";
$result=$connection->query($sql);

if(!$result){
$errMessage="Invalid query:".$connection->error;
break;
}


$name="";
$email="";
$phone="";
$address="";
$successMessage="Student added Successfully.";
header("location: /crud/index.php");
exit;

    }while(false);

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

        <div class="row mb-3">
<label class="col-sm-3 col-form-label">Name</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="name" value="<?php echo $name; ?>"> 
    </div>
</div>

    <div class="row mb-3">
<label class="col-sm-3 col-form-label">Email</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="email" value="<?php echo $email; ?>"> 
    </div>
    </div>

    <div class="row mb-3">
<label class="col-sm-3 col-form-label">Phone</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>"> 
    </div>
    </div>

    <div class="row mb-3">
<label class="col-sm-3 col-form-label">Address</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="address" value="<?php echo $address; ?>"> 
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