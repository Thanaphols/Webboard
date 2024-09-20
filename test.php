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
  <?php 
 require 'db/db_connect.php';
 connect();
 $boardID = 3;
$getcommentSQL = 'SELECT * FROM comment WHERE boardID = ? ORDER BY  commentDate DESC , commentTime  DESC ';
$prepareComment = $GLOBALS['conn']->prepare($getcommentSQL);
$prepareComment->bind_param("i",$boardID);
$prepareComment->execute();
$resultComment = $prepareComment->get_result();
$i=0; 
  if(isset($POST['my'])){
    echo '123';
  }
?>
</head>
<body>

<div class="container mt-4">


<button onclick="getData()">Get Data</button>

<script>
function getData() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "getData.php", true); // เรียกใช้ไฟล์ PHP
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText; // ข้อมูลที่ได้จาก PHP
            alert("Data from PHP: " + response);
        }
    };
    xhr.send();
}
</script>


<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>