<!DOCTYPE html>
<html lang="en">
<head>
<?php 
require 'db/db_connect.php';
connect();
    $board['img']='';
    $sql = 'SELECT users.userID, users.firstName , users.lastName ,
    board.boardID, board.boardHeader, board.boardBody , board.boardDate, board.boardTime ,
    category.categoryName 
    FROM board INNER JOIN users ON users.userID = board.userID 
    INNER JOIN category ON category.categoryID = board.categoryID 
    ORDER BY board.boardDate DESC , board.boardTime DESC ';
    $boardResult = mysqli_query($GLOBALS['conn'],$sql);
?>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Webboard</title>
</head>
<body>
    <?php require 'req/navbar.php' ?>
    <div class="container-fluid  mt-3 mb-2">
    <div class="row">
        <div class="col-sm-4">
            
        </div>
        <div class="col-sm-4 text-center"><h5>ข้อมูลสมาชิก </h5>
    </div>
        <div class="col-sm-4 text-end"></div>
    </div>
        <div class="row  mt-2 mb-2">
            <div class="col-sm-2">
            <div class="row border">
                    
                        <h5 class="mt-2">ข้อมูลสมาชิก</h5>
                        <div class="border"></div>
                        <h5 class="card-title">ข้อมูลบอร์ด</h5>
                        <div class="border"></div>
                        <h5 class="card-title">ข้อมูลคอมเม้น</h5>
                        <div class="border"></div>
                        <h5 class="card-title">ข้อมูลหมวดหมู่</h5>
                        <div class="border"></div>
            </div>
            </div>
           <div class="col-sm-8">
           <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
           </div>
            <div class="col-lg-2"></div> 
        </div>
        <div class="row text-center">
            <div class="col-sm-4 "></div>
            <div class="col-sm-4">
                <!-- <a href="#" class=" text-decoration-none btn-sm btn-primary disable">แสดงบอร์ดทั้งหมด</a> -->
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>
</html>