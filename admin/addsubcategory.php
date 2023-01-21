<?php 
include('required/conection.php');
include_once('required/productfunction.php');
/* include_once('required/functions.php'); */
if (!isLoggedIn()) {
     header('location: ..\login.php');
  }
  
  $sql = "SELECT * FROM categories";
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
    <title> Sub Categories </title>
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
                            
                        </div>
                        <div class="card-body">
                             <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"
                                 enctype="multipart/form-data" class="form">
                                     <div class="row">
                                         <div class="col-md-6 col-12">
                                             <div class="form-group">
                                                 <label for="name">name </label>
                                                 <input type="text" id="name" class="form-control"
                                                     placeholder="name" name="name" />
                                             </div>
                                         </div>
                                         
                                        
                                         <div class="col-md-6 col-12">
                                             <div class="form-group">
                                                 <label for="image">image</label>
                                                 <input type="file" id="image" class="form-control"
                                                     placeholder="image" class="form-control" 
                                                     name="image" />
                                             </div>
                                         </div>

                                           <div class="col-md-6 col-12">
                                               <div class="form-group">
                                                   <label class="form-label" for="user-role">category</label>
                                                   <select name="sub_id" id="sub_id"
                                                       class="form-control form-control-sm">
                                                       <option value="">Select </option>
                                                       <?php 
                                                            $query ="SELECT id, name FROM categories";
                                                            $result = $db->query($query);
                                                            if($result->num_rows> 0){
                                                                while($optionData=$result->fetch_assoc()){
                                                                $option =$optionData['name'];
                                                                $id =$optionData['id'];
                                                        ?>
                                                       <option value="<?php echo $id; ?>"><?php echo $option; ?>
                                                       </option>
                                                       <?php
                                                         }}
                                                        ?>
                                                   </select>
                                               </div>
                                               
                                           </div>
                                         <div class="col-12">
                                             <input type="submit" name="prod_add" class="btn btn-primary" value="add">
                                             <button type="reset" class="btn btn-outline-secondary">Reset</button>
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