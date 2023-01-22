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
if (isset($_POST['prod_show'])) {
    show_prod();
}
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

function show_prod()
{
    global $db, $conn, $errors;
    $id = e($_POST['id']);    
    $_SESSION['product'] = $id;
    header('location: view_product.php');
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
    echo "id";
    array_push($errors, "id require");
   } 
   
    global $db, $conn, $errors;
    $name       =   e($_POST['name']);
    $sub_id     =   e($_POST['sub_id']);
    $des        =   e($_POST['description']);
    $price      =   e($_POST['price']);
    

    if (empty($name)) {
        echo "name";
        array_push($errors, "subcat name require");
    }
     
    
        if (empty($sub_id)) {
            echo "sub";
            array_push($errors, "subcat categoriy require");
        }

        if (empty($des)) {
            echo "des";
            array_push($errors, "product description require");
        }

    
        if (count($errors) == 0) {
            ////////////////////////////////////////////
            $sql = "UPDATE proudcts SET name='$name', description='$des', price='$price', sub_id='$sub_id'
            WHERE id='$id'";

            if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
            header('location: producttable.php');
            unset($_SESSION['product']);
            } else {
                array_push($errors, "Error updating record: " . mysqli_error($conn));
            
            }
            /*  */
             
            
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