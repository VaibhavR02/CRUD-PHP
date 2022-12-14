<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRUD</title>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <div class="container my-5">
      <h2>List of Students</h2>
      <a href='/crud/create.php' class="btn btn-primary" role="button"
        >New Student</a>
      <br />
      <br />
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
           
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

            <?php 
            $servername="localhost";
            $username="root";
            $password="Root@123";
            $database="crud";

$connection= new mysqli($servername, $username , $password , $database);
if($connection -> connect_error){
    die("Connection failed : ".$connection->connect_error);
}
$sql="SELECT * from students";
$result=$connection->query($sql);

if(!$result){
    die("Invalid query: ".$connection->error);
}
while($row=$result->fetch_assoc()){
    echo " 
    <tr>
    <td>$row[id]</td>
    <td>$row[name]</td>
    <td>$row[email]</td>
    <td>$row[phone]</td>
    <td>$row[address]</td>
  
    <td>
<a href='/crud/edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
<a href='/crud/delete.php?id=$row[id]' class='btn btn-danger btn-sm'>Delete</a>
    </td>
</tr>
    ";
}

            ?>
           
        </tbody>
      </table>
    </div>
  </body>
</html>
