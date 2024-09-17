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
            $boardSql = 'SELECT board.boardHeader, board.boardBody,board.userID AS userBoardID, board.categoryID,board.boardDate,board.boardTime ,
                    users.firstName AS userBoardFirstName , users.lastName AS userBoardLastName ,
                    category.categoryName 
                    FROM board INNER JOIN users ON users.userID = board.userID AND board.boardID = '.$_GET['boardID'].' 
                    INNER JOIN category  ON category.categoryID = board.categoryID  WHERE board.boardID = '.$_GET['boardID'].'' ;
             $board = getData($boardSql);
             $comment = countRow('comment','boardID',$_GET['boardID']);
            
            if(isset($_POST['commentDetail'])) {
                if($_POST['commentDetail']=='') {
                    echo ' <script>
                            $(function() {
                                Swal.fire({
                                    showCancelButton: true,
                                    showConfirmButton: false,
                                    cancelButtonText: "ปิด",
                                    title: "ไม่สามารถแสดงความคิดเห็นได้",
                                    text: "ข้อความเป็นค่าว่าง กรุณากรอกข้อคิดเห็น !",
                                    icon: "error"
                                });
                            });
                            </script>';
                }else{
                    // INSERT Comment userID FROM $_SESSSINO['userID'] boardID FROM $_GET['boardID']
                    $commnetSQL = 'INSERT INTO comment (userID,boardID,commentDetail,commentDate,commentTime) VALUES 
                    ( '.$_SESSION['userID'].', '.$_GET['boardID'].',"'.$_POST['commentDetail'].'" , CURRENT_DATE  , CURRENT_TIME ) ';
                   // echo $commnetSQL;
                    $result = mysqli_query($GLOBALS['conn'],$commnetSQL);
                    echo ' <script>
                            $(function() {
                                Swal.fire({
                                    showCancelButton: true,
                                    showConfirmButton: false,
                                    cancelButtonText: "ปิด",
                                    title: "แสดงความคิดเห็นสำเร็จ !",
                                    text: "",
                                    icon: "success"
                                });
                            });
                            </script>';
                }
            }
            $getcommentSQL = 'SELECT * FROM comment WHERE boardID = '.$_GET['boardID'].' ';
           
            $resultComment = mysqli_query($GLOBALS['conn'],$getcommentSQL);
           
    ?>
</head>
<body>
    <?php require 'req/navbar.php' ?>
    <div class="container-fluid mt-5 mb-2 ">
    <form method="post" enctype="multipart/form-data">
        <div class="row mt-4 mb-4 ">
            <div class="col-lg-3 "> 
            </div>
            <div class="col-lg-6">
                <div class="card border mb-2  shadow-lg ">
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
                <div class="row ">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h5 class="card-title">Title</h5> -->
                                <p class="card-text">แสดงความคิดเห็น  </p>             
                                <textarea  class="form-control" name="commentDetail" id="commentDetail" aria-label="With textarea" 
                                placeholder="แสดงความคิดเห็น"></textarea>
                                <button type="submit" class="btn btn-primary w-100 mt-2"> แสดงความคิดเห็น </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>  
                <div class="row mt-3">
                <div class="border"></div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6 mt-2 mb-2">
                    <span class> ความคิดเห็นทั้งหมด <?php echo $comment; ?></span>
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="border "></div>
                </div>
               
                <div class="card mt-4 shadow-lg  ">
                    <div class="card-body mb-2">
                        <h5 class="card-title "> </h5>
                                <?php $i=0; while($data = mysqli_fetch_assoc($resultComment)) { 
                                    $i++; 
                                    $userCommentSQL = 'SELECT firstName,lastName FROM users WHERE userID = '.$data['userID'].' ';
                                    $userData = getData($userCommentSQL);
                                    ?>
                                    <label  class="col-sm-3 col-form-label">ความคิดเห็นที่  <?php echo $i;if(@$_SESSION['userID'] == $data['userID'] ) { ?>
                                    <a href="editBoard.php?boardID=<?php echo $data['boardID']; ?>" class="btn btn-sm btn-outline-primary ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                        </svg>
                                    </a>
                                    <?php } ?> </label>           
                                <div class="col-sm-12">
                                <span disabled class="form-control" name="boardBody" id="boardBody" diabled  
                                placeholder="Enter Board Body"><?php echo $data['commentDetail']; ?></span>
                                </div> <br>
                                <p class="card-text mb-1"> หมายเลขสมาชิก :  <?php echo $data['userID']." คุณ ".$userData['firstName'].' '.$userData['lastName'];  ?>   </p>  
                                <span classs="card-text" ><?php echo $data['commentDate'].' '.$data['commentTime']; ?> </span>  <br> <br>
                                <p class="border"></p> 
                                <?php } ?> 
                                </div> 
                    </div>
            </div>
            <div class="col-lg-3"> </div>
            </form>
        </div>
    </div>
    </body>
</html>