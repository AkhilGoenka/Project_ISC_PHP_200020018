<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <title>Project_PHP</title>
  </head>
  <body>
  <div class="container mt-3">
<h1>Please Enter your Name and Roll Number</h1>
    <form action="/akhilphp/Project_ISC_PHP_200020018.php" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name">
    </div>

    <div class="form-group">
        <label for="rollno">Roll Number</label>
        <input type="int" name="rollno" class="form-control" id="rollno"> 
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $rollno = $_POST['rollno'];
        
      
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "project_isc_php";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        $sql = "INSERT INTO `name_rollno` (`name`, `rollno`) VALUES ('$name', '$rollno')";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Hurray!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Oops Error!</strong> We are facing some technical issue and your entry was not submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }

      }

    

$sql = "SELECT * FROM `name_rollno`";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
echo " Records found in the DataBase<br>";
// Display the rows returned by the sql query

echo "<table>";
echo "<tr><th>Name</th><th>Roll number</th><tr>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>";
        echo $row['sno'];
        echo "</td><td>";
        echo $row['name'];
        echo "</td><td>";
        echo $row['rollno'];
        echo "</td></tr>";
    }
    }
?>


 </body>
</html>