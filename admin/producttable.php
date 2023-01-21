<?php 
include('required/conection.php');
include_once('required/productfunction.php');
include_once('required/functions.php');
if (!isLoggedIn()) {
     header('location: ..\login.php');
  }
  
  $sql = "SELECT * FROM proudcts";
  $result = mysqli_query($db, $sql);


/* if (isset($_POST['addNewValue'])) {

  $sql = "UPDATE invoices SET status =1 where id=".$_POST['id']."";
  echo $sql;
  mysqli_query($db, $sql);
  header('location: payments.php');
 

}  */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title> شركة الكهرباء </title>
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



    <section class="h-100 h-custom">
        <div class="container h-200 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card" dir="ltr" align="left">

                        <div class="card-body" id="print">

                            <h5 class="card-title">Product:</h5>
                            <a href="addproduct.php" class="btn add-new btn-primary mt-50 mb-2">Add New subcat</a>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card" dir="rtl" align="right">

                        <div class="card-body" id="print">

                            <table class=" table">
                                <thead>
                                    <tr>
                                        <td>name</td>
                                        <td>description</td>
                                        <td>image</td>
                                    </tr>
                                </thead>

                                <?php
                            if (mysqli_num_rows($result) > 0) {

                             

                              while($row = mysqli_fetch_assoc($result)) {
                              echo "<tr>";
                                  echo "<td>" . $row["name"] . "</td>";
                                  echo "<td>" . $row["description"] . "</td>";                          
                                  echo "<td>" . "<img src=".'"'." uploads/product" . $row["image"] .'"'."
                                          calss=".'"'."img-fluid".'"'." width=".'"'."100px".'"'. " </td>" ;
                                  
                                  echo "</tr>";
                              }
                              
                            } else {
                            echo "No results found.";
                            }?>
                            </table>
                            
                        </div>
                        
                    </div>
                </div>
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