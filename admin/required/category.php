<?php
include('conection.php');
if (isset($_POST['prod_add'])) {
    add_product();
}
if (isset($_POST['prod_edit'])) {
    edit_product();
}
if (isset($_POST['prod_show'])) {
    show_product();
}
if (isset($_POST['prod_delete'])) {
    delete_product();
}

function add_product(){
    global $db, $errors;
    $name   = e($_POST['name']);
    $image  = e($_POST['image']);
    $des    = e($_POST['description']);
    $sub_id = e($_POST['sub_id']);   

    if (empty($name)) {
        array_push($errors, "product name require");
    }
    if (empty($image)) {
        array_push($errors, "product image require");
    }else{
        // File upload path
        $targetDir = "uploads/";
        $fileName = basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
        // Insert image file name into database

        }else{
        array_push($errors, "Sorry, there was an error uploading your file.");

        }
        }else{
        array_push($errors, "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.");

        }
    }
    if (empty($des)) {
        array_push($errors, "product description require");
    }
    if (empty($sub_id)) {
        array_push($errors, "product categoriy require");
    }

    
    if (count($errors) == 0) {
    ////////////////////////////////////////////
        $query = "INSERT INTO products (name, image, description, sub_id)
        VALUES('$name', '$fileName', '$des', '$sub_id')";
        mysqli_query($db, $query);
        array_push($success, "product added!");
    }
    header('location: admin/producttable.php');

    
}

function prod_edit(){
   $id = e($_POST['id']);
   $db = "SELECT * FROM products WHERE id=" . $id;
   $product = $db->query($query);
   $product_arr = [];

   $product_arr = $result->fetch_all(MYSQLI_ASSOC);

    global $db, $errors;
    $name =     e($_POST['name']);
    $image =    e($_POST['image']);
    $des =      e($_POST['description']);
    $sub_id =   e($_POST['sub_id']);

    if (empty($name)) {
        array_push($errors, "product name require");
    }
    if (empty($image)) {
        $fileName = $product['image'];
    }else{
         // File upload path
         $targetDir = "uploads/";
         $fileName = basename($_FILES["image"]["name"]);
         $targetFilePath = $targetDir . $fileName;
         $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


         // Allow certain file formats
         $allowTypes = array('jpg','png','jpeg','gif','pdf');
         if(in_array($fileType, $allowTypes)){
         // Upload file to server
         if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
         // Insert image file name into database

         }else{
         array_push($errors, "Sorry, there was an error uploading your file.");

         }
         }else{
         array_push($errors, "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.");

         }
    }
    if (empty($des)) {
        array_push($errors, "product description require");
    }
    if (empty($sub_id)) {
        array_push($errors, "product categoriy require");
    }

   
    if (count($errors) == 0) {
    ////////////////////////////////////////////
    $query = "UPDATE student SET name='$name', image='$fileName', description='$des', sub_id='$sub_id' WHERE
    id='$id' ";
    
    mysqli_query($db, $query);
        array_push($success, "product updated!");
    }
    header('location: admin/producttable.php');

}

function delete_product(){
    $id = e($_POST['id']);
    $sql = "DELETE FROM products WHERE id='" .$id . "'";
    if (mysqli_query($conn, $sql)) {
        array_push($success, "Record deleted successfully!");
        header('location: admin/producttable.php');
    } else {
        array_push($errors, "Error deleting product");    
    }
   
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

