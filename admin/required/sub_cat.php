<?php
include('conection.php');
if (isset($_POST['sub_add'])) {
    add_sub();
}
if (isset($_POST['sub_edit'])) {
    edit_sub();
}
/* if (isset($_POST['prod_show'])) {
    show_prod();
} */
if (isset($_POST['sub_delete'])) {
    delete_sub();
}

function add_sub(){
    global $db, $errors;
    $name   = e($_POST['name']);
    /* $image  = e($_POST['image']);  */   
    $cat_id = e($_POST['cat_id']);   

    if (empty($name)) {
        array_push($errors, "subcat name require");
    }
    /* if (empty($image)) {
        array_push($errors, "subcat image require");
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
    
    if (empty($cat_id)) {
        array_push($errors, " categoriy require");
    }

    
    if (count($errors) == 0) {
    ////////////////////////////////////////////
        $query = "INSERT INTO sub_cats (name, cat_id)
        VALUES('$name', '$cat_id')";
        mysqli_query($conn, $query);
        array_push($success, "subcat added!");
    }
    header('location: admin/subcattable.php');

    
}

function edit_sub(){
   $id = e($_POST['id']);
   $db = "SELECT * FROM sub_cats WHERE id=" . $id;
   $subcat = $db->query($query);
   $subcat_arr = [];

   $subcat_arr = $result->fetch_all(MYSQLI_ASSOC);

    global $db, $errors;
    $name =     e($_POST['name']);
    /* $image =    e($_POST['image']);  */   
    $sub_id =   e($_POST['sub_id']);

    if (empty($name)) {
        array_push($errors, "subcat name require");
    }
    /* if (empty($image)) {
        $fileName = $subcat['image'];
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
    
    if (empty($sub_id)) {
        array_push($errors, "subcat categoriy require");
    }

   
    if (count($errors) == 0) {
    ////////////////////////////////////////////
    $query = "UPDATE sub_cats SET name='$name', sub_id='$sub_id' WHERE
    id='$id' ";
    
    mysqli_query($conn, $query);
        array_push($success, "subcat updated!");
    }
    header('location: admin/subcattable.php');

}

function delete_sub(){
    $id = e($_POST['id']);
    
    $sql = "DELETE FROM sub_cats WHERE id = $id";
    
    if (mysqli_query($conn, $sql)) {
        array_push($success, "Record deleted successfully!");
        header('location: admin/subcattable.php');
    } else {
        array_push($errors, "Error deleting subcat". mysqli_error($conn));
    }
   
}



