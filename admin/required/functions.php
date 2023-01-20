<?php 
	include('conection.php');
	session_start();

	$username = "";
	$email    = "";
	$errors   = array(); 
	$success   = array(); 

	if (isset($_POST['register_btn'])) {
		register();
		}
		date_default_timezone_set('Asia/Jerusalem');

	if (isset($_POST['login_btn'])) {
		login();
	}

	if (isset($_GET['logout'])) {
		
		session_destroy();
		unset($_SESSION['user']);
		header("location:index.php");
	}
    
      if (isset($_POST['add'])) {
	    readCounter();
	}

	function register(){
		global $db, $errors;

		$real_name    =  e($_POST['real_name']);
		$user_name    =  e($_POST['user_name']);
		$gender       =  e($_POST['gender']);
		$email        =  e($_POST['email']);		
 		$password1    =  e($_POST['password1']);
		$password2    =  e($_POST['password2']);

        if (empty($real_name)) {
            array_push($errors, "please enter the name");
        }

		if (empty($user_name)) {
			array_push($errors, "please enter the username");
		}else {
            if (strlen($_POST['user_name']) >= 6) {

                if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['user_name'])) {
                    $usr1_msg = "please enter just a-z";
                    array_push($errors, "please enter just a-z");
                }
            } else {
                array_push($errors, "please enter mor than 6 char");;
            }
		}

		if (empty($gender)) {
			array_push($errors, "please choose gender");
		}
		if (empty($email)) { 
			array_push($errors, "البريد الاكتروني مطلوب"); 
		}else {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $email1_msg = " please enter valid email ";
            }
		}

		if (empty($password1)) { 
			array_push($errors, "كلمة المرور مطلوبة"); 
		}
		if (empty($password2)) { 
			array_push($errors, "تاكيد كلمة المرور مطلوب"); 
		}
		if ($password1 != $password2) {
			array_push($errors, "كلمتي المرور غير متطابقة");
		}

		$sql1 = "SELECT email FROM users WHERE email='$email' ";
		$result = mysqli_query($db, $sql1);
		if (mysqli_num_rows($result) > 0) {
			array_push($errors, "ناسف هذا البريد مستخدم لدينا بالفعل");
		}	
		$sql1 = "SELECT email FROM users WHERE user_name='$user_name' ";
		$result = mysqli_query($db, $sql1);
		if (mysqli_num_rows($result) > 0) {
			array_push($errors, "ناسف اسم المستخدم مستخدم لدينا بالفعل");
		}	


		if (count($errors) == 0) {
			////////////////////////////////////////////
			$query = "INSERT INTO users (real_name, user_name, gender, email, password ) 
					VALUES('$real_name', '$user_name', '$gender', '$email', '$password1')";
				mysqli_query($db, $query);
				// get id of the created user
				$logged_in_user_id = mysqli_insert_id($db);
				$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
				$_SESSION['success']  = "You are now logged in";
			 	 header('location: index.php');				
		}

	}



	function login(){
		global $db, $username, $errors;

		$username = e($_POST['username']);
		$password = e($_POST['password']);
	
		if ($username == NULL) {
			array_push($errors, "Email or phone is required");
		}
		if ($password == NULL) {
			array_push($errors, "Password is required");
		}
		if (count($errors) == 0) {
		

		$query = "SELECT * FROM users WHERE email = '$username' or user_name='$username' LIMIT 1";

		$result = $db->query($query);
		$row = $result->fetch_assoc();
	
		if ($password == $row['password']) {

			if (mysqli_num_rows($result) == 1) { // user found
				$_SESSION['user'] = $row;					
				header('location: admin/index.php'); 
			}else {
				array_push($errors, "Wrong username or password");
			}
		  }
		}
	}

	

	function getUserById($id){
		global $db;
		$query = "SELECT * FROM users WHERE id=" . $id;
		$result = mysqli_query($db, $query);
		$user = mysqli_fetch_assoc($result);
		return $user;
	}


	//print_r( $_SESSION); 
	@$FullName  = $_SESSION["user"]["user_name"];
	function isLoggedIn()
	{
		
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}
 



	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="alert alert-danger" align="right">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}


	function display_success() {
		global $success;

		if (count($success) > 0){
			echo '<div class="alert alert-success" align="right">';
				foreach ($success as $succes){
					echo $succes .'<br>';
				}
			echo '</div>';
		}
	}



 










?>