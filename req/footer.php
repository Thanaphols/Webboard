<!-- Footer -->
<footer class="text-center text-white mt-auto" style="background-color: #F0A04B;">
    <!-- Grid container -->
     <?php if(@$_SESSION['userID']=='') { ?>
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3">Register for free !</span>
          <button data-mdb-ripple-init type="button" class="btn btn-outline-light btn-rounded">
            <a href="register.php" class="text-white">Sing Up</a>
          </button>
        </p>
      <!-- Section: CTA -->
    </div>
    <?php } ?>
    <!-- Grid container -->
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2025 Copyright:
      <a class="text-white" href="index.php">Fuck That. Fuck Everyone. Fuck Everything</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->