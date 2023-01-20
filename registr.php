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
                <h2><strong>تسجيل المستخدمين</strong></h2>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form method="POST" id="msform" enctype="multipart/form-data">                    
                           <fieldset>
                            <div class="form-card">
                                <h2 class="title" align="right">المعلومات الشخصية</h2> 
                                <input type="text" name="real_name" id="real_name" placeholder="الاسم " />
                                <label for="gender">Gender</label>
                                 <input type="text" name="user_name" id="user_name" placeholder="اسم المستخدم" />
                                <select name="gender" id="gender">
                                    <option disabled>select</option>
                                    <option >male</option>
                                    <option >female</option>
                                </select>
                                 <!-- <input type="text" name="gender" id="gender" placeholder="" /> -->
                                
                                <input type="email" name="email" id="email" placeholder="البريد الالكتروني"/>
                                
                          
                                <div>
                                <input type="password" name="password1" id="password1" placeholder="كلمة المرور" />
                                <input type="password" name="password2" id="password2" placeholder="تاكيد كلمة المرور" />  
                                </div>
                                <?php display_error(); ?>
                                <h6 align="right">  <button type="submit"  name="register_btn" class="btn btn-secondary rounded submit">تسجيل</button></h6>
                               <h6 align="right"> <label for="name" class="col-sm-10 col-form-label"> اذا كان لديك حساب بالفعل يمكنك   <a href="login.php">تسجيل الدخول</a> <small class="text-danger"></small></label></h6>
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
