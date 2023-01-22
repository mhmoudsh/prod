<?php
include('conection.php');
include('functions.php');
if (isset($_POST['sub_add'])) {
    add_sub();
}
if (isset($_POST['sub_edit'])) {
    edit_sub();
}

if (isset($_POST['sub_update'])) {
     update_sub();
}
/* if (isset($_POST['prod_show'])) {
    show_prod();
} */
if (isset($_POST['sub_delete'])) {
    delete_sub();
}

function add_sub(){
    global $db,$conn, $errors;
    $name   = e($_POST['name']);
    /* $image  = e($_POST['image']);  */   
    $cat_id = e($_POST['cat_id']);   

    if (empty($name)) {
        array_push($errors, "subcat name require");
    }
    
    
    if (empty($cat_id)) {
        array_push($errors, " categoriy require");
    }

    
    if (count($errors) == 0) {
    ////////////////////////////////////////////
        $sql ="INSERT INTO sub_cats SET name='$name', cat_id='$cat_id'";
        
        if(mysqli_query($conn, $sql)){
            array_push($success, "subcat added!");
            header('location: subcattable.php');
        } else {
        echo "Error updating record: " . mysqli_error($conn);
        }
    }
    

    
}

function edit_sub()
{
    global $db, $conn, $errors;
    $id = e($_POST['id']);
    $_SESSION['sub'] = $id;
    header('location: edit_sub.php');
}


function update_sub(){
   $id = e($_POST['id']);
   $db = "SELECT * FROM sub_cats WHERE id=" . $id;
   $subcat = $db->query($query);
   $subcat_arr = [];

   $subcat_arr = $result->fetch_all(MYSQLI_ASSOC);

    global $db, $errors;
    $name =     e($_POST['name']);     
    $cat_id =   e($_POST['cat_id']);

    if (empty($name)) {
        array_push($errors, "subcat name require");
    }
    
    
    if (empty($cat_id)) {
        array_push($errors, " categoriy require");
    }

   
    if (count($errors) == 0) {
    ////////////////////////////////////////////
        $query = "UPDATE sub_cats SET name='$name', cat_id='$cat_id' WHERE
        id='$id' ";
        if(mysqli_query($conn, $query)){
        
            array_push($success, "subcat updated!");
            header('location: admin/subcattable.php');
        } else {
        echo "Error updating record: " . mysqli_error($conn);
        }
    }else{
        echo'err';
    }
    

}

function delete_sub(){
    global $db, $conn, $errors;
    $id = e($_POST['id']);
    
    $sql = "DELETE FROM sub_cats WHERE id = $id";
    
    if (mysqli_query($conn, $sql)) {
        array_push($success, "Record deleted successfully!");
        header('location: subcattable.php');
    } else {
        array_push($errors, "Error deleting subcat". mysqli_error($conn));
    }
   
}



