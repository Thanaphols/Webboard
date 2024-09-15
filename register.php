<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Webboard</title>
    <?php 
            require 'db/db_connect.php';
            connect();
                    if(isset($_POST['email'])){  
                        if(($_POST['email']=='' || $_POST['userPassword']=='' || $_POST['confirmuserPassword']==''
                        || $_POST['firstName']=='' || $_POST['lastName']=='' ) ) {
                            echo ' <script>
                                    $(function() {
                                        Swal.fire({
                                            showCancelButton: true,
                                            showConfirmButton: false,
                                            cancelButtonText: "ปิด",
                                            title: "ข้อมูลไม่สมบูรณ์ !",
                                            text: "กรุณากรอกข้อมูลให้ครบ !",
                                            icon: "error"
                                        });
                                    });
                                    </script>';
                        } else if(countRow('users','email',$_POST['email'])!=0) {
                            //echo countRow('users','email',$_POST['email']);
                            echo ' <script>
                                $(function() {
                                        Swal.fire({
                                            showCancelButton: true,
                                            showConfirmButton: false,
                                            cancelButtonText: "ปิด",
                                            title: "อีเมลนี้ถูกใช้งานแล้ว !",
                                            text: "กรุณาใช้อีเมลอื่น !",
                                            icon: "error"
                                        });
                                    });
                                </script>';
                            
                        }else if( $_POST['confirmuserPassword'] != $_POST['userPassword'] ){
                            echo ' <script>
                                    $(function() {
                                        Swal.fire({
                                            showCancelButton: true,
                                            showConfirmButton: false,
                                            cancelButtonText: "ปิด",
                                            title: "รหัสผ่านไม่ถูกต้อง !",
                                            text: "กรุณากรอกรหัสผ่านใหม่อีกครั้ง !",
                                            icon: "error"
                                        });
                                    });
                                </script>';
                        } else {
                        $sql = 'INSERT INTO Users (email,userPassword,firstName,lastName,userDate,userTime) VALUES 
                        ("'.$_POST['email'].'","'.$_POST['userPassword'].'","'.$_POST['firstName'].'","'.$_POST['lastName'].'" ,
                        CURRENT_DATE,CURRENT_TIME) ';
                        echo $sql;
                    // $result= mysqli_query($conn,$sql);
                        echo ' <script>
                                    $(function() {
                                        Swal.fire({
                                            showCancelButton: true,
                                            showConfirmButton: false,
                                            cancelButtonText: "ปิด",
                                            title: "สมัครสมาชิกสำเร็จ !",
                                            text: "ยินดีต้อนรับสู่การเป็นสมาชิก !",
                                            icon: "success"
                                        });
                                    });
                                </script>';
                                header( "refresh:2; url=login.php" );
                            }
                    }
    ?>
</head>
<body>
    <?php require 'req/navbar.php' ?>

    <div class="container-fluid mt-5 mb-2">
    <form method="post">
        <div class="row mt-4">
            <div class="col-lg-4 "> 
            </div>

            <div class="col-lg-4">
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title text-center ">สมัครสมาชิก</h5>
                        <p class="card-text form-inline">

                            <div class="mb-3 row">
                            <label for="email" class="col-sm-3  col-form-label text-while">อีเมล</label>
                                <div class="col-sm-9 ">
                                <input type="email"  class="form-control " id="email" name="email" placeholder="Enter Email" value="" >
                                </div>
                            </div>

                            <div class="mb-3 row">
                            <label for="firstName" class="col-sm-3 col-form-label text-while">ชื่อจริง</label>
                                <div class="col-sm-9">
                                <input type="text"  class="form-control" id="firstName" name="firstName" placeholder="Enter First Name" value="" >
                                </div>
                            </div>

                            <div class="mb-3 row">
                            <label for="lastName" class="col-sm-3 col-form-label text-while">นามสกุล</label>
                                <div class="col-sm-9 ">
                                <input type="text"  class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name" value="" >
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="userPassword" class="col-sm-3 col-form-label" >รหัสผ่าน</label>
                                <div class="col-sm-9">
                                <input type="password" class="form-control" id="userPassword" name="userPassword"  placeholder="Enter Password" >
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="confirmuserPassword" class="col-sm-3 col-form-label" >ยืนยันรหัสผ่าน</label>
                                <div class="col-sm-9">
                                <input type="password" class="form-control" id="confirmuserPassword" name="confirmuserPassword"  placeholder="Enter Confirm Password">
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8"> <button type="submit" class="btn btn-success w-100" >ยืนยัน</button></div>
                                   
                                <div class="col-lg-2"></div>
                            </div>
                            
                        </p>
                    </div>
                </div>
            
            </div>

            <div class="col-lg-4"> </div>
            </form>
        </div>
    </div>
    </body>
</html>