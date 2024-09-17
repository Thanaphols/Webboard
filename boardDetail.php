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
            $sql2 = 'SELECT board.boardHeader, board.boardBody,board.userID AS userBoardID, board.categoryID,board.boardDate,board.boardTime ,
                    users.firstName AS userBoardFirstName , users.lastName AS userBoardLastName ,
                    category.categoryName 
                    FROM board INNER JOIN users ON users.userID = board.userID AND board.boardID = '.$_GET['boardID'].' 
                    INNER JOIN category  ON category.categoryID = board.categoryID  WHERE board.boardID = '.$_GET['boardID'].'' ;
             $board = getData($sql2);
            // $commentSQL = 'SELECT * FROM comment WHERE boardID = '.$baord['boardID'].' ';
            //  print_r ($board);
            // if(isset($_POST['categoryID'])) {
            //         if($_POST['boardHeader']=='' || $_POST['boardBody']==''){
            //             echo ' <script>
            //             $(function() {
            //                 Swal.fire({
            //                     showCancelButton: true,
            //                     showConfirmButton: false,
            //                     cancelButtonText: "ปิด",
            //                     title: "ไม่สามารถโพสต์ได้ !",
            //                     text: "กรุณากรอกข้อมูลให้สมบูรณ์ !",
            //                     icon: "error"
            //                 });
            //             });
            //         </script>';
            //         }else{
            //             if($_FILES["boardImage"]["tmp_name"]!=''){
                            
            //                 // if(is_uploaded_file($_FILES['imgStat']['tmp_name'])){
            //                 //     if(($_FILES['imgStat']['type']=='image/jpeg') OR
            //                 //        ($_FILES['imgStat']['type']=='image/jpeg')){
            //                 //    move_uploaded_file($_FILES['imgStat']['tmp_name'],
            //                 //            'img/stat_img/'.$_FILES['imgStat']['name']);
            //                 //    $SQL = 'INSERT INTO statuses (o_id,stat_text,stat_img,stat_date,f_id)'
            //                 //            . ' VALUES ("'.$_SESSION['user_id'].'","'.$txt.'",'
            //                 //            . ' "img/stat_img/'.$_FILES['imgStat']['name'].'","'.$stat_date.'","'.$_SESSION['user_id'].'" ) ';
            //                 //     } 
            //                 // }else{
            //                 //     $SQL = 'INSERT INTO statuses (o_id,stat_text,stat_date,f_id)'
            //                 //             . ' VALUES ("'.$_SESSION['user_id'].'","'.$txt.'","'.$stat_date.'","'.$_SESSION['user_id'].'") ';
            //                 // }
            //             }else{
            //                 if($_POST['categoryID'] != $board['categoryID']) {
                                
            //                 $updateBoardSQL = 'UPDATE board SET boardHeader = "'.$_POST['boardHeader'].'",
            //                 boardBody = "'.$_POST['boardBody'].'", categoryID = "'.$_POST['categoryID'].'" WHERE boardID = '.$_GET['boardID'].' ';
            //                 echo $updateBoardSQL;
            //                 // $result2 = mysqli_query($GLOBALS['conn'],$updateBoardSQL);
            //                 echo ' <script>
            //                 $(function() {
            //                     Swal.fire({
            //                         showCancelButton: true,
            //                         showConfirmButton: false,
            //                         cancelButtonText: "ปิด",
            //                         title: "แก้ไขบอร์ดสำเร็จ !",
            //                         text: "กรุณารอสักครู่ !",
            //                         icon: "success"
            //                     });
            //                 });
            //                 </script>';
            //              //  header ( 'refresh: 2; url = index.php ' );
            //                 }else{
            //                     $updateBoardSQL = 'UPDATE board SET boardHeader = "'.$_POST['boardHeader'].'",
            //                     boardBody = "'.$_POST['boardBody'].'"  WHERE boardID = '.$_GET['boardID'].' ';
            //                     $result2 = mysqli_query($GLOBALS['conn'],$updateBoardSQL);
            //                     echo ' <script>
            //                     $(function() {
            //                         Swal.fire({
            //                             showCancelButton: true,
            //                             showConfirmButton: false,
            //                             cancelButtonText: "ปิด",
            //                             title: "แก้ไขบอร์ดสำเร็จ !",
            //                             text: "กรุณารอสักครู่ !",
            //                             icon: "success"
            //                         });
            //                     });
            //                     </script>';
            //                  //  header ( 'refresh: 2; url = index.php ' );
            //                 }
            //             }
            //         }
            // }
            if(isset($_POST['commnetDetail'])) {
                echo 'comment';
            }


    ?>
</head>
<body>
    <?php require 'req/navbar.php' ?>
    <div class="container-fluid mt-5 mb-2 ">
    <form method="post" enctype="multipart/form-data">
        <div class="row mt-4 ">
            <div class="col-lg-3 "> 
            </div>
            <div class="col-lg-6">
                <div class="card border ">
                    <div class="card-body">
                        <h5 class="card-title text-center ">บอร์ดหมายเลข <?php echo $_GET['boardID'] ?></h5>
                        <p class="card-text form-inline">
                            <div class="mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label text-while">ห้วข้อบอร์ด</label>
                                <h5 class="text-start"><?php echo $board['boardHeader'] ?></h5>
                            </div>
                            <div class="mb-3 row">
                                <label for="userPassword" class="col-sm-3 col-form-label" >เนื้อหาบอร์ด</label>
                                <div class="col-sm-12">
                                <span disabled class="form-control" name="boardBody" id="boardBody" diabled  
                                placeholder="Enter Board Body"><?php echo $board['boardBody']; ?></span>
                                </div>
                            </div>
                            <div class=" mb-3 ">
                            <label for="email" class="col-sm-3 col-form-label text-while">หมวดหมู่</label><br>
                                <span    class="btn btn-sm btn-primary  mt-2 ml-2"> <?php echo $board['categoryName'] ?></span>
                            </div>
                            <div class="mb-3 row">
                                <label for="userPassword" class="col-sm-3 col-form-label" >
                                </label>
                                <div class="col-sm-12">
                                <span >สมาชิกหมายเลข <?php echo $board['userBoardID'] ?> :  <?php echo $board['userBoardFirstName'].' '. $board['userBoardLastName'] ?> </span><br>
                                <span classs="card-text" ><?php echo $board['boardDate'].' '.$board['boardTime']; ?> </span>
                            </div>
                            </div>
                        </p>
                    </div>
                </div>
                <?php  if(isset($_SESSION['userID'])) { ?>
                <div class="card mt-2 ">
                    <div class="card-body">
                        <h5 class="card-title "> ความคิดเห็น</h5>
                                <p class="card-text mb-1"> หมายเลขสมาชิก 123 : คุณ 123 456  </p>  
                                <span classs="card-text" ><?php echo $board['boardDate'].' '.$board['boardTime']; ?> </span>      
                                <p class="card-text">ความคิดเห็น  </p>             
                                <div class="col-sm-12">
                                <span disabled class="form-control" name="boardBody" id="boardBody" diabled  
                                placeholder="Enter Board Body"><?php echo $board['boardBody']; ?></span>
                                </div> <br>
                                <p class="border"></p>
                                <p class="card-text mb-1">คุณ 123 456</p>  
                                <p class="card-text">หมายเลขสมาชิก 123</p>       
                                <p class="card-text">แสดงความคิดเห็น  </p>             
                                <textarea  class="form-control" name="commnetDetail" id="commnetDetail" aria-label="With textarea" 
                                placeholder="Enter Board Body"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary -25"> commnet </button>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-lg-3"> </div>
            </form>
        </div>
    </div>
    </body>
</html>