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
            $sql1 = 'SELECT * FROM category';
            $result1 = mysqli_query($GLOBALS['conn'],$sql1);
            $boardID = $_GET['boardID'];
            $boardSQL = 'SELECT board.* ,category.* FROM board INNER JOIN category ON boardID = ? AND category.categoryID = board.categoryID;';
            $prepareBoard= $GLOBALS['conn']->prepare($boardSQL);
            $prepareBoard->bind_param("i",$boardID);
            $prepareBoard->execute();
            $result = $prepareBoard->get_result();
            $board = $result->fetch_assoc();
            if($_SESSION['userID'] != $board['userID'] && $_SESSION['userRole'] != 1){
                header("refresh:0;url=index.php");
            }
            if(isset($_POST['categoryID'])) {
                $boardHeader = $_POST['boardHeader'];
                $boardBody = $_POST['boardBody'];
                $categoryID = $_POST['categoryID'];
                    if($_POST['boardHeader']=='' || $_POST['boardBody']==''){
                        echo ' <script>
                        $(function() {
                            Swal.fire({
                                showCancelButton: true,
                                showConfirmButton: false,
                                cancelButtonText: "ปิด",
                                title: "ไม่สามารถโพสต์ได้ !",
                                text: "กรุณากรอกข้อมูลให้สมบูรณ์ !",
                                icon: "error"
                            });
                        });
                    </script>';
                    }else{
                        if($_FILES["boardImage"]["tmp_name"]!=''){
                            
                            // if(is_uploaded_file($_FILES['imgStat']['tmp_name'])){
                            //     if(($_FILES['imgStat']['type']=='image/jpeg') OR
                            //        ($_FILES['imgStat']['type']=='image/jpeg')){
                            //    move_uploaded_file($_FILES['imgStat']['tmp_name'],
                            //            'img/stat_img/'.$_FILES['imgStat']['name']);
                            //    $SQL = 'INSERT INTO statuses (o_id,stat_text,stat_img,stat_date,f_id)'
                            //            . ' VALUES ("'.$_SESSION['user_id'].'","'.$txt.'",'
                            //            . ' "img/stat_img/'.$_FILES['imgStat']['name'].'","'.$stat_date.'","'.$_SESSION['user_id'].'" ) ';
                            //     } 
                            // }else{
                            //     $SQL = 'INSERT INTO statuses (o_id,stat_text,stat_date,f_id)'
                            //             . ' VALUES ("'.$_SESSION['user_id'].'","'.$txt.'","'.$stat_date.'","'.$_SESSION['user_id'].'") ';
                            // }
                        }else{
                            if($_POST['categoryID'] != $board['categoryID']) {
                            $updateBoardSQL = 'UPDATE board SET boardHeader = ?,
                            boardBody = ? , categoryID = ? WHERE boardID = ? ';
                            $prepareUpdateBoard =  $GLOBALS['conn']->prepare($updateBoardSQL);
                            $prepareUpdateBoard->bind_param("ssii",$boardHeader,$boardBody,$categoryID,$boardID);
                            $prepareUpdateBoard->execute();
                            //echo $updateBoardSQL;
                            // $result2 = mysqli_query($GLOBALS['conn'],$updateBoardSQL);
                            echo ' <script>
                            $(function() {
                                Swal.fire({
                                    showCancelButton: true,
                                    showConfirmButton: false,
                                    cancelButtonText: "ปิด",
                                    title: "แก้ไขบอร์ดสำเร็จ !",
                                    text: "กรุณารอสักครู่ !",
                                    icon: "success"
                                });
                            });
                            </script>';
                           header ( 'refresh: 2; url = index.php ' );
                            }else{
                                $updateBoardSQL = 'UPDATE board SET boardHeader = ?,
                                boardBody = ?  WHERE boardID = ? ';
                                $prepareUpdateBoard =  $GLOBALS['conn']->prepare($updateBoardSQL);
                                $prepareUpdateBoard->bind_param("ssi",$boardHeader,$boardBody,$boardID);
                                $prepareUpdateBoard->execute();
                                echo ' <script>
                                $(function() {
                                    Swal.fire({
                                        showCancelButton: true,
                                        showConfirmButton: false,
                                        cancelButtonText: "ปิด",
                                        title: "แก้ไขบอร์ดสำเร็จ !",
                                        text: "กรุณารอสักครู่ !",
                                        icon: "success"
                                    });
                                });
                                </script>';
                               header ( 'refresh: 2; url = index.php ' );
                            }
                        }
                    }
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
                        <h5 class="card-title text-center ">แก้ไขบอร์ด หมายเลข <?php echo $board['boardID'] ?></h5>
                        <p class="card-text form-inline">

                            <div class="mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label text-while">ห้อข้อบอร์ด</label>
                                <div class="col-sm-12 ">
                                <input type="text"  class="form-control " id="boardHeader" name="boardHeader" placeholder="Enter Board Header" value="<?php echo $board['boardHeader'] ?>" >
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="userPassword" class="col-sm-3 col-form-label" >เนื้อหาบอร์ด</label>
                                <div class="col-sm-12">
                                <textarea class="form-control" name="boardBody" id="boardBody" aria-label="With textarea" 
                                placeholder="Enter Board Body"><?php echo $board['boardBody'] ?></textarea>
                                </div>
                            </div>

                            <div class="input-group mb-3 ">
                                <label class="input-group-text" for="categoryID">เลือกหมวดหมู่</label>
                                <select class="form-select" id="categoryID" name="categoryID">
                                    <option selected value="<?php echo $board['categoryID']?>"><?php echo $board['categoryName']?></option>
                                    <?php while($data = mysqli_fetch_assoc($result1)) { ?>
                                        <?php if($data['categoryID'] != $board['categoryID'] ) { ?>
                                    <option value=" <?php echo $data['categoryID']; ?> "><?php echo $data['categoryName']; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">เลือกรูปภาพ *ไม่ใส่ก็ได้*</label>
                                <input class="form-control form-control-sm" id="boardImage" name="boardImage" type="file">
                            </div>
                            <div class="row ">
                                <div class="col-sm-12"> <button type="submit" class="btn btn-success w-100" >แก้ไข</button></div>
                                   
                            </div>
                            
                        </p>
                    </div>
                </div>
                
            </div>

            <div class="col-lg-3"> </div>
            </form>
        </div>
    </div>
    </body>
</html>