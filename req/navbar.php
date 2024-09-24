<?php 
  if(isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $sql = 'SELECT email,userRole,firstName,userRole FROM users WHERE userID = ? ';
    $prepareUser = $GLOBALS['conn']->prepare($sql);
    $prepareUser->bind_param("i",$userID);
    $prepareUser->execute();
    $result = $prepareUser->get_result();
    $user = $result->fetch_assoc();;
    
    //print_r($user);
}

?>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">WebBoard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">หน้าแรก</a>
        </li> -->
        <?php if(isset($_SESSION['userID'])) { ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="addboard.php">โพสต์บอด</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg>
            <?php if(isset($_SESSION['userID'])) { echo $user['firstName']; } else { echo 'Profile'; } ?>
            
          </a>
          
          <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
          
            <li><a class="dropdown-item" href="profile.php">ข้อมูลส่วนตัว</a></li>
            <li><a class="dropdown-item" href="myboard.php">กระทู้ของฉัน</a></li>

            <?php if($user['userRole']==1) { ?>
            <div class="dropdown-divider"></div>
            <div class="li"><a href="admin.php"  class="dropdown-item  ml-3"> ผู้ดูแลระบบ </a></div>
            <?php } ?>
            <div class="dropdown-divider"></div>
            <div class="li"><a href="logout.php"  class="dropdown-item  ml-3"> ออกจากระบบ </a></div>
            
          </ul>
          
        </li>
        <li class="nav-item">
          <a href="#" role="button" class="nav-link active   position-relative " aria-expanded="false">
           
            <svg svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
            </svg>
            การแจ้งเตือน
            <span class=" position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger">
              0
            <span class="visually-hidden">unread messages</span>
            </span>
          </a>
        </li>
        <?php } ?>
        <li class="nav-item justify-content-end">
            <?php if(!isset($_SESSION['userID'])) { ?>
              <a href="login.php"  class="nav-link active ml-3"> เข้าสู่ระบบ </a>
            <?php } ?>
        </li> 
      </ul>
      
    </div>
  </div>
</nav>
