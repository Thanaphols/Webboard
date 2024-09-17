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
    INNER JOIN category ON category.categoryID = board.categoryID ';
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
        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center"><h5>บอร์ดทั้งหมด </h5>
    </div>
        <div class="col-sm-4 text-end"></div>
    </div>
        <div class="row  mt-2 mb-2">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 ">
                <div class="row ">
                    <?php $i=0; while ( $data = mysqli_fetch_assoc($boardResult) ) { 
                        $userID =  $data['userID'];
                        $commnet = countROW('comment','boardID',$data['boardID']);
                        //echo $commnet;
                        ?>
                    <div class="col-sm-6 border shadow-sm mb-2">
                        <?php if(!isset($data['img'])==null) { ?>
                        <div class="row">
                            <div class="col-sm-4">
                            <img src="img/noimg.jpg" class="img-fluid mt-2 mb-2" alt="...">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="text-start mt-2 mb-1"><?php echo $data['boardHeader'] ?></h5>
                                <p class="text-start mb-1">Category : <?php echo $category['categoryName']; ?></p>
                                <p></p>
                                <div class="row">
                                    <div class="col-sm-5"><p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                                    <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                    </svg> 
                                    <?php echo $data['boardDate']; ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                    </svg>
                                    <?php echo $data['boardTime']; ?>
                                </p></div>
                                <div class="col-sm-2"></div>
                                    <div class="col-sm-5 mt-4 text-end">
                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                        <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                                    </svg> Comment <?php echo $commnet; ?>
                                </p></div>
                                </div>
                            </div>
                        </div>
                        <?php } else { ?>
                            <div class="row">
                            <div class="col-sm-12">
                                <h5 class="text-start mt-2 mb-1"><?php echo $data['boardHeader'] ?> 
                                <?php if(@$_SESSION['userID'] == $userID ) { ?>
                                <a href="editBoard.php?boardID=<?php echo $data['boardID']; ?>" class="btn btn-sm btn-outline-primary ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </a>
                                <?php } ?>
                                </h5>
                                <p class="text-start mb-1">Category : <?php echo $data['categoryName']; ?>
                            </p>
                                <div class="row">
                                    <div class="col-sm-5"><p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                                    <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                    </svg> 
                                    <?php echo $data['boardDate']; ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                    </svg>
                                    <?php echo $data['boardTime']; ?>
                                </p>
                                </div>
                                <div class="col sm-2"></div>
                                    <div class="col-sm-5 text-end">
                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                                </svg> Comment <?php echo $commnet; ?>
                                </p>
                                </div>
                                </div>
                                <a href="boardDetail.php?boardID=<?php echo $data['boardID']  ?>" class="btn btn-outline-primary mb-2">ดูรายละเอียด</a>
                            </div>
                        </div>
                            <?php }  ?>
                    </div>
                     <?php } ?>
                </div> 
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