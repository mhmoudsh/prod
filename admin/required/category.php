<?php
include('conection.php');
include('functions.php');
if (isset($_POST['cat_add'])) {
    add_cat();
}
if (isset($_POST['cat_edit'])) {
    edit_cat();
}
if (isset($_POST['cat_update'])) {
    update_cat();
}
if (isset($_POST['cat_show'])) {
    show_cat();
}
if (isset($_POST['cat_delete'])) {
    delete_cat();
}

function add_cat(){
    global $db, $conn, $errors;
    $name=e($_POST['name']);    
    $des =e($_POST['description']);
      

    if (empty($name)) {
        
        array_push($errors, "cat name require");
    }    
    if (empty($des)) {
        
        array_push($errors, "cat description require");
    }
        
    if (count($errors) == 0) {
    ////////////////////////////////////////////
    $query = "INSERT INTO categories (name,description)
    VALUES('$name','$des')";
    mysqli_query($conn, $query);
    array_push($success, "subcat added!");
    header('location: producttable.php');
    }
    

    
}

function edit_cat()
{
    global $db, $conn, $errors;
    $id = e($_POST['id']);    
    $_SESSION['cat'] = $id;
    header('location: edit_cat.php');
}

function show_cat()
{
    global $db, $conn, $errors;
    $id = e($_POST['id']);    
    $_SESSION['cat'] = $id;
    header('location: category_table.php');
}

function update_cat(){
    global $db, $conn, $errors;
   $id = e($_POST['id']);
   if (empty($id)) {
    echo "id";
    array_push($errors, "id require");
   }
   
    global $db, $conn, $errors;
    $name       =   e($_POST['name']);    
    $des        =   e($_POST['description']);    
    

    if (empty($name)) {
        echo "name";
        array_push($errors, "subcat name require");
    }        

    if (empty($des)) {
        echo "des";
        array_push($errors, "product description require");
    }

    
        if (count($errors) == 0) {
            ////////////////////////////////////////////
            $sql = "UPDATE categories SET name='$name', description='$des' WHERE id='$id'";

            if (mysqli_query($conn, $sql)) {
                echo "Record updated successfully";
                header('location: category_table.php');
                unset($_SESSION['cat']);
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
            /*  */
             
            
        }
       

}

function delete_cat(){
     global $db, $conn, $errors;
    $id = e($_POST['id']);    
    if (empty($id)) {
        array_push($errors, " product id require");
    }
    $sql = "DELETE FROM categories WHERE id='" .$id . "'";
    $delete=mysqli_query($db, $sql);
    if ($delete) {
        array_push($success, "Record deleted successfully!");
         header('location: category_table.php');
    } else {
        array_push($errors, "Error deleting product");    
    }
   
}