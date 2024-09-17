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
                        $email = $_POST['email'];
                        $password = md5($_POST['userPassword']);
                        
                        $sql = 'SELECT * from users WHERE email = ? AND userPassword = ? ';
                        $prepareUser =  $GLOBALS['conn']->prepare($sql);
                        $prepareUser->bind_param("ss",$email,$password);
                        $prepareUser->execute();
                        $result = $prepareUser->get_result();
                        if($result->num_rows > 0) {
                           $row = $result->fetch_assoc();
                                $_SESSION['userID'] = $row['userID'];
                                // print_r($_SESSION);
                                echo ' <script>
                                        $(function() {
                                            Swal.fire({
                                                showCancelButton: true,
                                                showConfirmButton: false,
                                                cancelButtonText: "ปิด",
                                                title: "เข้าสู่ระบบสำเร็จ !",
                                                text: "ยินดีต้อนรับสู่ Webboard!",
                                                icon: "success"
                                            });
                                        });
                                    </script>';
                                   header( "refresh:2; url=index.php" );
                            
                        } else {
                                     echo ' <script>
                                    $(function() {
                                        Swal.fire({
                                            showCancelButton: true,
                                            showConfirmButton: false,
                                            cancelButtonText: "ปิด",
                                            title: "ไม่สามารถเข้าสู่ระบบได้",
                                            text: "Email หรือ Password ผิดพลาด กรุณาลองใหม่อีกครั้ง !",
                                            icon: "error"
                                        });
                                    });
                                    </script>';
                        }
                    }
                    
    ?>
</head>
<body>
    <?php require 'req/navbar.php' ?>

    <div class="container-fluid mt-5 mb-2 ">
    <form method="post">
        <div class="row mt-4 ">
            <div class="col-lg-4 "> 
               
            </div>
                    
            <div class="col-lg-4">
           
                <div class="card border-light  shadow-lg ">
                    <div class="card-body">
                        <h5 class="card-title text-center ">เข้าสู่ระบบ</h5>
                        <p class="card-text form-inline">

                            <div class="mb-3 row">
                            <label for="email" class="col-sm-3  col-form-label text-while">อีเมล</label>
                                <div class="col-sm-9 ">
                                <input type="email"  class="form-control " id="email" name="email" placeholder="Enter Email" value="" >
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="userPassword" class="col-sm-3 col-form-label" >รหัสผ่าน</label>
                                <div class="col-sm-9">
                                <input type="password" class="form-control" id="userPassword" name="userPassword"  placeholder="Enter Password" >
                                </div>
                            </div>
                           

                            <div class="row mb-2 ">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4 text-center"> <a href="register.php" class="text-dark text-decoration-none" > สมัครสมาชิก </a></div>
                                   
                                <div class="col-lg-4"></div>
                            </div>

                            <div class="row ">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8"> <button type="submit" class="btn btn-success w-100" >เข้าสู่ระบบ</button></div>
                                   
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