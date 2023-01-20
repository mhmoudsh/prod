<?php
include_once('admin/required/functions.php');
?>
<!doctype html>
<html>
    <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>التسجيل</title>
    <link href='css/style.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class='snippet-body'> 
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2"dir="rtl">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3" >
                <h2><strong>تسجيل  الدخول</strong></h2>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form method="POST" id="msform">                    
                           <fieldset>
                            <div class="form-card">
                                  <h6 align="right"> <label for="name" class="col-sm-10 col-form-label">اسم المستخدم<small class="text-danger"> : </small></label></h6>
                                <input type="text" name="username" id="username" placeholder="يمكن تسجيل الدخول من خلال البريد الالكتروني او اسم المستخدم" />
                                <div>
                                    <h6 align="right"> <label for="name" class="col-sm-10 col-form-label">كلمة المرور <small class="text-danger">:</small></label></h6>
                                <input type="password" name="password" id="password1" placeholder="*********" />    
                                </div>
                                <?php display_error(); ?>
                                <h6 align="right">  <button type="submit" name="login_btn" class="btn btn-secondary rounded submit"> لنبدأ</button></h6>

                                 <h6 align="right"> <label for="name" class="col-sm-10 col-form-label">اذا كنت لا تمتلك حسابا <a href="registr.php">يمكنك التسجيل </a> <small class="text-danger"></small></label></h6>
                                </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


