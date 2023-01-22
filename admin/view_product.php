<?php 
include('required/conection.php');
include_once('required/productfunction.php');
/* include_once('required/functions.php'); */
if (!isLoggedIn()) {
     header('location: ..\login.php');
  }
  
  $id=$_SESSION['product'];    
  $query = "SELECT * FROM proudcts WHERE id= $id";
  $product = $conn->query($query);
  $prod_data=$product->fetch_assoc();

  $subid=$prod_data['sub_id'];  
  $query = "SELECT * FROM sub_cats WHERE id= $subid";  
  $result = $conn->query($query);
  
  if($result->num_rows> 0){
    $sub=$result->fetch_assoc();
    $sub_name=$sub['name'];
  }else{
    $sub_name='no data found';
  }
  




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title> Products</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="../assets/img/hero-img.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
</head>

<body>
    
    <!-- ======= Header ======= -->
    <?php
    include_once('required/header.php');
    ?>


    <section class="h-100 h-custom">
        <div class="container h-200 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card" dir="ltr" align="left">

                        <div class="card-header" id="print">

                            <h5 class="card-title">Product:</h5>
                            <!-- <?php echo $sub['name'];?> -->
                            
                        </div>
                        <div class="card-body">
                             <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"
                                 enctype="multipart/form-data" class="form">
                                     <div class="row">
                                         <div class="col-md-6 col-12">
                                             <div class="form-group">
                                                <input type="hidden" name="id" value="<?php echo $prod_data['id'];?>">
                                                 <label for="name">name </label>
                                                 <input disabled type="text" id="name" class="form-control"
                                                     placeholder="name"
                                                     value="<?php echo $prod_data['name'];?>" name="name" />
                                             </div>
                                         </div>
                                         <div class="col-md-6 col-12">
                                             <div class="form-group">
                                                 <label for="description">description</label>
                                                 <input disabled type="text" id="description" class="form-control"
                                                     placeholder="description"
                                                     value="<?php echo $prod_data['description'];?>"
                                                     name="description" />
                                             </div>
                                         </div>
                                         <div class="col-md-6 col-12">
                                             <div class="form-group">
                                                 <label for="price">Product Price:</label>
                                                 <input class="form-control" value="<?php echo $prod_data['price'];?>"
                                                     type="text" disabled placeholder="price" id="price"
                                                     name="price" />
                                             </div>
                                         </div> 

                                         <div class="col-md-6 col-12">
                                             <div class="form-group">
                                                 <label for="price">sub_category:</label>
                                                 <input class="form-control" value="<?php echo $sub_name;?>"
                                                     type="text" disabled placeholder="price" id="price"
                                                     name="price" />
                                             </div>
                                         </div>       
                                          
                                              
                                    </div>
                                         
                                         
                                    </div>
                                </form>
                                 
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card" dir="ltr" align="left">

                        <div class="card-body" id="print">

                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
        </div>
        </div>
        </div>
    </section>

    <?php
include_once('required/footer.php');
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
<script type="text/javascript">
    function print_data() {
        var printContents = document.getElementById("print").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>