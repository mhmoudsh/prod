  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">الرئيسية</a></li>
 
       <?php  if (!isLoggedIn()) {
               echo '<li><a href="login.php">دخول</a></li>';
             }

             
               echo '
                     <li><a class="nav-link scrollto" href="readCounter.php">قراءة عداد  </a></li>
                     <li><a class="nav-link scrollto" href="payments.php">الدفعات </a></li>
                     <li><a class="nav-link scrollto" href="Invoices.php">الفواتير </a></li>
                     <li><a class="nav-link scrollto" href="users.php"> المستخدمين </a></li>
                     <li><a href="">'. $_SESSION['user']['user_name'].'</a></li>
                     <li class="dropdown"><a href="#"><span></span> <i class="bi bi-chevron-down"></i></a>
                     <ul>
                     <li class="dropdown"><a href="index.php?logout=\'1\'"><span>تسجيل  الخروج</span></a></li>
                     </ul>
                     </li>

                     <li><a class="nav-link scrollto" style="color:red;">(Admin) </a></li>';
             
             ?>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="../index.php" class="logo d-flex align-items-center">
        <span> شركة الكهرباء  </span>
      </a>
    </div>
  </header>