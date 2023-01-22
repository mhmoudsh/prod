<?php
include('conection.php');
    if (isset($_POST['cat_add'])) 
    {
        add_cat();
    }

    if (isset($_POST['cat_edit']))
     {
        cat_edit();
    }

    /* if (isset($_POST['cat_show'])) {
        show_catuct();
    }
 */
    if (isset($_POST['cat_delete'])) {
        delete_cat();
    }

    function add_cat(){
        global $db, $errors;
        $name   = e($_POST['name']);
        /* $image  = e($_POST['image']); */
        $des    = e($_POST['description']);
          

        if (empty($name)) {
            array_push($errors, "cat name require");
        }
        /* if (empty($image)) {
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
        } */
        if (empty($des)) {
            array_push($errors, "cat description require");
        }
        

        
        if (count($errors) == 0) {
        ////////////////////////////////////////////
            $query = "INSERT INTO categories (name, description)
            VALUES('$name', '$des')";
            mysqli_query($conn, $query);
            array_push($success, "cat added!");
        }
        header('location: admin/producttable.php');

        
    }

function cat_edit(){
   
    $id = e($_POST['id']);
    $query = "SELECT * FROM categories WHERE id=" . $id;
    $product = mysqli_query($conn, $query);
    
    $product_arr = [];

    $product_arr = $product->fetch_all(MYSQLI_ASSOC);

    global $db, $errors;
    $name =     e($_POST['name']);    
    $des =      e($_POST['description']);
    

    if (empty($name)) {
        array_push($errors, "product name require");
    }

    /* if (empty($image)) {
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
    } */
    if (empty($des)) {
        array_push($errors, "product description require");
    }
    

   
    if (count($errors) == 0) {
    ////////////////////////////////////////////
    $query = "UPDATE categories SET name='$name',  description='$des' WHERE
    id='$id' ";
    
    mysqli_query($db, $query);
        array_push($success, "cat updated!");
    }
    header('location: admin/category_table.php');

}

function delete_cat(){
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

