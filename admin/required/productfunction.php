<?php
include('conection.php');
include('functions.php');
if (isset($_POST['prod_add'])) {
    add_prod();
}
if (isset($_POST['prod_edit'])) {
    edit_prod();
}
if (isset($_POST['prod_update'])) {
    update_prod();
}
/* if (isset($_POST['prod_show'])) {
    show_prod();
} */
if (isset($_POST['prod_delete'])) {
    delete_prod();
}

function add_prod(){
    global $db, $conn, $errors;
    $name       =   e($_POST['name']);
    $price      =   e($_POST['price']);
    $des        =   e($_POST['description']);
    $sub_id     =   e($_POST['sub_id']);   

    if (empty($name)) {
        array_push($errors, "product name require");
    }
    if (empty($price)) {
        array_push($errors, "product price require");
    }
    if (empty($des)) {
        array_push($errors, "product description require");
    }
   /*  if (empty($image)) {
        array_push($errors, "subcat image require");
        }
        else{
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

                }
                else{
                    array_push($errors, "Sorry, there was an error uploading your file.");

                }
            }else{
                array_push($errors, "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.");

        }
    } */
    
    if (empty($sub_id)) {
        array_push($errors, " sub_categoriy is require");
    }

    
    if (count($errors) == 0) {
    ////////////////////////////////////////////
        $query = "INSERT INTO proudcts (name, description, price, sub_id)
        VALUES('$name', '$des', '$price', '$sub_id')";
        mysqli_query($conn, $query);
        array_push($success, "subcat added!");
         header('location: producttable.php');
    }
    

    
}

function edit_prod()
{
    global $db, $conn, $errors;
    $id = e($_POST['id']);    
    $_SESSION['product'] = $id;
    header('location: edit_product.php');
}

function update_prod(){
    global $db, $conn, $errors;
   $id = e($_POST['id']);
   if (empty($id)) {
    array_push($errors, "id require");
   }
   $query = "SELECT * FROM products WHERE id=" . $id;
   $product = mysqli_query($conn, $query);   
   $product_arr = [];
   $subcat_arr = $result->fetch_all(MYSQLI_ASSOC);

    global $db, $errors;
    $name       =   e($_POST['name']);
    $sub_id     =   e($_POST['sub_id']);
    $des        =   e($_POST['description']);
    $price      =   e($_POST['price']);

    if (empty($name)) {
        array_push($errors, "subcat name require");
    }
     /*if (empty($image)) {
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
        } 
    */
    
        if (empty($sub_id)) {
            array_push($errors, "subcat categoriy require");
        }

        if (empty($des)) {
            array_push($errors, "product description require");
        }

    
        if (count($errors) == 0) {
        ////////////////////////////////////////////
            $query = "UPDATE proudcts SET name='$name', sub_id='$sub_id', description=$des, price=$price  WHERE
            id='$id' ";
        
            mysqli_query($conn, $query);
            if(mysqli_query($conn, $query)){
                array_push($success, "subcat updated!");
                header('location: producttable.php');
            }else{
                array_push($errors, "filed to edit !");
            }
             
            
        }
       

}

function delete_prod(){
     global $db, $conn, $errors;
    $id = e($_POST['id']);    
    if (empty($id)) {
        array_push($errors, " product id require");
    }
    $sql = "DELETE FROM proudcts WHERE id='" .$id . "'";
    $delete=mysqli_query($db, $sql);
    if ($delete) {
        array_push($success, "Record deleted successfully!");
         header('location: producttable.php');
    } else {
        array_push($errors, "Error deleting product");    
    }
   
}
