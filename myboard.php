<!DOCTYPE html>
<html lang="en">
<head>
<?php 
require 'db/db_connect.php';
connect();
$board['img']='';
    $sql = 'SELECT firstName,lastName FROM users WHERE userID = '.$_SESSION['userID'].' ';
    $data = getData($sql);
    $boardSql = 'SELECT * FROM board WHERE userID = '.$_SESSION['userID'].' ';
    //echo $boardSql;
    $boardResult = mysqli_query($GLOBALS['conn'],$boardSql);
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
        <div class="col-sm-4 text-center"><h5>บอร์ดทั้งหมดของคุณ <?php echo $data['firstName']; echo ' '; echo $data['lastName']; ?></h5>
    
    </div>
        <div class="col-sm-4 text-end">
        <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    หมวดหมู่
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div>
        <div class="row  mt-2 mb-2">
            
            <div class="col-sm-2"></div>

            <div class="col-sm-8 ">
                <div class="row ">
                    <?php while ( $data = mysqli_fetch_assoc($boardResult) ) { 
                        $categorySql = 'SELECT categoryName FROM category WHERE categoryID = '.$data['categoryID'].' ';
                        $category = getData($categorySql);
                        ?>
                    <div class="col-sm-6 border mb-2">
                        <?php if(isset($board['img'])) { ?>
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
                                </p></div>
                                <div class="col sm-2"></div>
                                    <div class="col-sm-5 text-end">
                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                                </svg> Comment 0
                                </p></div>
                                </div>
                                
                            </div>
                        </div>
                        <?php } else { ?>
                            <div class="row">
                            <div class="col-sm-12">
                                
                                <h5 class="text-start mt-2 mb-1"><?php echo $data['boardHeader'] ?></h5>
                                <p class="text-start mb-1">Category</p>
                                <p class="text-start mb-1">Date Create</p>
                                <p class="text-end">Comment 0</p>
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