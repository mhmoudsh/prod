<?php 
include_once('required/functions.php');
if (!isLoggedIn()) {
     header('location: ..\login.php');
  }

?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>  شركة الكهرباء  </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="../assets/img/hero-img.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <!-- ======= Header ======= -->
<?php 
include_once('required/header.php');
?>
 <section id="hero" class="d-flex align-items-center" dir="rtl">
     <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-2 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center" align="right">
          <h1>سارع بالتسجيل في  الموقع<br> ... يمكنك متابعة فواتير الكهرباء الخاصة بك بكل سهولة.</h1>         
         <ul>
            <li><i class="ri-check-line"></i>  قم بانشاء حساب جديد    </li>
            <li><i class="ri-check-line"></i> قم بالاطلاع على الفواتير </li>
            <li><i class="ri-check-line"></i> التسجيل مجاني   </li>          
          </ul>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="../assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section>


<?php
include_once('../required/footer.php');
?>
 
  <!-- Vendor JS Files -->
  <script src="js/bootstrap.bundle.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>
</body>
</html>