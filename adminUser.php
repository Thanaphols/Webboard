<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Webboard</title>
    <?php 
      require 'db/db_connect.php';
      connect();
          
      ?>
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
            <div class="row mt-2 ">
              <div class="col-sm-1"></div>
              <div class="col-sm-10">
              <a href = "adminUser.php"class=" text-decoration-none text-dark mt-2"><h5>ข้อมูลสมาชิก</h5></a>
              <div class="border"></div>
              <a href = "adminboard.php"class=" text-decoration-none text-dark mt-2"><h5>ข้อมูลบอร์ด</h5></a>
              <div class="border"></div>
              <a href = "adminUser.php"class=" text-decoration-none text-dark mt-2"><h5>ข้อมูลคอมเม้น</h5></a>
              <div class="border"></div>
              <a href = "adminCategory.php"class=" text-decoration-none text-dark mt-2"><h5>ข้อมูลหมวดหมู่</h5></a>
              <div class="border"></div>
              </div>
                        
            </div>
            </div>
           <div class="col-sm-10">
           <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" >ไอดีสมาชิก</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">นามสกุล</th>
                        <th scope="col">Email</th>
                        <th scope="col">รหัสผ่าน</th>
                        <th scope="col">วันที่สมัคร</th>
                        <th scope="col">เวลาที่สมัคร</th>
                        <th scope="col">สิทธ์</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <?php  
                        $usersql = 'SELECT * FROM users';
                        $result = mysqli_query($GLOBALS['conn'],$usersql);
                         while($user = mysqli_fetch_assoc($result) ) {
                          
                    ?>  
                    <tbody>
                      <tr>
                        <th scope="row"><?php echo $user['userID']; ?></th>
                        <td><?php echo $user['firstName']; ?></td>
                        <td><?php echo $user['lastName']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['userPassword']; ?></td>
                        <td>
                          <?php $date=date_create($user['userDate']);
                                echo date_format($date,"d/m/Y"); ?>
                        </td>
                        <td><?php echo $user['userTime']; ?></td>
                        <td>
                          <?php if($user['userRole']==1) {
                            echo "ผู้ดูแลระบบ";
                          }else{
                            echo "ผู้ใช้งาน";
                          } ?>
                        </td>
                        <td>
                          <a href="manageUser.php?userID=<?php echo $user['userID']; ?>&u=1" class="btn btn-sm btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                          </a>
                          <a href="manageUser.php?userID=<?php echo $user['userID']; ?>&d=1" class="btn btn-sm  btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                          </a>
                      </td>
                      </tr>
                    </tbody>
                    <?php  } ?>
                  </table>
           </div>
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