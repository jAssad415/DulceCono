<?php
require_once('config.php');
require_once(DBAPI);

header('Content-Type: text/html; charset=utf-8');


//////// MOSTRAR USUARIO EN INDEX ////////
function find_id($name_user) {
    $database = open_database();
    $table = 'tbl_users';

    $id_user = mysqli_query($database,"SELECT * FROM " . $table . " WHERE name_user = " . "'$name_user'");
    $result = mysqli_fetch_array($id_user);

    return $result[0];
}

/**
 *  Pesquisa Tipo de Conta por ID
 */
function find_acc($name_user) {
    $database = open_database();
    $table = 'tbl_users';

    $acc_user = mysqli_query($database,"SELECT type_user FROM " . $table . " WHERE name_user = " . "'$name_user'");
    $result = mysqli_fetch_array($acc_user);

    return $result[0];
}


//////// MOSTRAR TABLA PRODUCTOS ////////

function find_all_products() {
    $database = open_database();
    $table = 'tbl_products'; // Suponiendo que la tabla de productos se llama 'tbl_products'
    
    $products = mysqli_query($database, "SELECT * FROM " . $table);
    
    $result = [];
    if ($products) {
        while ($row = mysqli_fetch_assoc($products)) {
            $result[] = $row;
        }
    }
    
    close_database($database);
    
    return $result;
}

function get_almacen_address($id_almacen) {
    $database = open_database();

    $sql = "SELECT dir_almacen FROM tbl_almacenes WHERE id_almacen = ?";
    $stmt = $database->prepare($sql);
    $stmt->bind_param('i', $id_almacen);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        return $row['dir_almacen'];
    } else {
        return 'No disponible'; // O un mensaje adecuado si no se encuentra el almacén
    }

    close_database($database);
}


//////// AGREGAR PRODUCTO ////////

function add_product($product) {
    $database = open_database();

    $sql = "INSERT INTO tbl_products (desc_prd, cat_prd, fabr_prd, stock_prd, costo_prd, estado_prd, tbl_almacenes_id_almacen, minimo_prd, name_pvd) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $database->prepare($sql);
        $stmt->bind_param('sssiissis', 
            $product['desc_prd'], 
            $product['cat_prd'], 
            $product['fabr_prd'], 
            $product['stock_prd'], 
            $product['costo_prd'], 
            $product['estado_prd'], 
            $product['tbl_almacenes_id_almacen'], 
            $product['minimo_prd'],
            $product['name_pvd']
        );

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    } finally {
        close_database($database);
    }
}


function last_prd() {
    $database = open_database();
    $table = 'tbl_products';

    $all_client = mysqli_query($database,"SELECT MAX(id_prd) FROM " . $table);
    $result_last = mysqli_fetch_array($all_client);

    return $result_last[0];
}



//////// AGREGAR ALMACEN ////////

function add_almacen($almacen) {
    $database = open_database();

    $sql = "INSERT INTO tbl_almacenes (dir_almacen) VALUES (?)";

    try {
        $stmt = $database->prepare($sql);
        $stmt->bind_param('s', 
            $almacen['dir_almacen']);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    } finally {
        close_database($database);
    }
}

function last_alm() {
    $database = open_database();
    $table = 'tbl_almacenes';

    $all_client = mysqli_query($database,"SELECT MAX(id_almacen) FROM " . $table);
    $result_last = mysqli_fetch_array($all_client);

    return $result_last[0];
}

 

//////// MOSTRAR TABLA ALMACENES ////////

function find_all_almacenes() {
    $database = open_database();
    $table = 'tbl_almacenes'; // Suponiendo que la tabla de productos se llama 'tbl_products'
    
    $almacenes = mysqli_query($database, "SELECT * FROM " . $table);
    
    $result = [];
    if ($almacenes) {
        while ($row = mysqli_fetch_assoc($almacenes)) {
            $result[] = $row;
        }
    }
    
    close_database($database);
    
    return $result;
}