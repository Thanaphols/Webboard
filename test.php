<!-- <script src="jquery-3.3.1.min.js"></script> -->
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->


<!-- 
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.all.min.js"></script>
<?php 

    // session_start();
    // $_SESSION['a'] = 'aaa';
    // print_r($_SESSION);

// echo ' <script>
//                 $(function() {
           
//                 Swal.fire({
//                 title: "Good job!",
//                 text: "You clicked the button!",
//                 icon: "error"
// });
//         });
//     </script>';

// echo ' <script>
//                 $(function() {
           
//                 Swal.fire({
                
//                 title: "Good job!",
//                 showCancelButton: true,
//                 showConfirmButton: false,
//                 cancelButtonText: "No, cancel!",
//                 text: "You clicked the button!",
//                 icon: "error"
                
// });
//         });
//     </script>';


?>


<p><!-- Button trigger modal -->
                                    <!-- <button type="button" class="btn btn-sm-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                        </svg>
                                    </button>
                                </p>
                                <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header ">
                                        
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title text-center ">แก้ไขบอร์ดหมายเลข <?php echo $i; ?></h5>
                                                    <p class="card-text form-inline">

                                                        <div class="mb-3 row">
                                                        <label for="email" class="col-sm-3 col-form-label text-while">ห้อข้อบอร์ด</label>
                                                            <div class="col-sm-12 ">
                                                            <input type="text"  class="form-control " id="boardHeader" name="boardHeader"  value="<?php echo $data['boardHeader'] ?>" >
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 row">
                                                            <label for="userPassword" class="col-sm-3 col-form-label" >เนื้อหาบอร์ด</label>
                                                            <div class="col-sm-12">
                                                            <textarea class="form-control" name="boardBody" id="boardBody" aria-label="With textarea" placeholder="Enter Board Body"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="input-group mb-3 ">
                                                            <label class="input-group-text" for="categoryID">เลือกหมวดหมู่</label>
                                                            <select class="form-select" id="categoryID" name="categoryID">
                                                            <option selected value="">หมวดหมู่</option>
                                                            <?php while($category = mysqli_fetch_assoc($result1)) { ?>
                                                            <option value=" <?php echo $category['categoryID']; ?> "><?php echo $category['categoryName']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formFileSm" class="form-label">เลือกรูปภาพ *ไม่ใส่ก็ได้*</label>
                                                            <input class="form-control form-control-sm" id="boardImage" name="boardImage" type="file">
                                                        </div>
                                                        <div class="row ">
                                                            <div class="col-sm-12"> <button type="submit" class="btn btn-success w-100" >โพสต์บอด</button></div>
                                                        </div>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Understood</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div> -->
                                <!-- EndModal -->