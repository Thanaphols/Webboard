<!-- <script src="jquery-3.3.1.min.js"></script> -->
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- 
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "webboard";

  // Create connection
  $GLOBALS['conn'] = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($GLOBALS['conn']->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // prepare and bind
  // Prepare the SQL statement
$stmt = $GLOBALS['conn']->prepare('SELECT * FROM board WHERE boardID = ?');
// Bind the parameter (in this case, the email) as a string
$stmt->bind_param("i", $email);

// Set the email parameter and execute the statement
$email = 1;
$stmt->execute();

// Get the result set
$result = $stmt->get_result();
// Fetch the data if necessary (optional, depends on what you want to do)
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Process each row
        echo "User: " . $row['boardHeader']; // Example of output
    }
} else {
    echo "No user found with this email.";
}


  $stmt->close();
  $GLOBALS['conn']->close();
?>
</body>
</html>