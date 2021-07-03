<?php
require_once("connection.model.php");

Class ModelProducts{

    static public function mdlNewProd($data){
        $stmt = Connection::connect()->prepare("INSERT INTO  products 
        (
        prod_id,
        prod_name,
            prod_sku,
        prod_cats,
        prod_cost,
        prod_desc,
        prod_barcode,
        prod_active)
        VALUES (
        NULL, 
        :prod_name, 
        :prod_sku, 
        :prod_cats, 
        :prod_cost,
        :prod_desc, 
        :prod_barcode, 
        :prod_active)
        ");

        $stmt -> bindParam(":prod_name", $data["prod_name"], PDO::PARAM_STR);
        $stmt -> bindParam(":prod_cats", $data["prod_cats"], PDO::PARAM_STR);
        $stmt -> bindParam(":prod_sku", $data["prod_sku"], PDO::PARAM_STR);
        $stmt -> bindParam(":prod_cost", $data["prod_cost"], PDO::PARAM_STR);
        $stmt -> bindParam(":prod_desc", $data["prod_desc"], PDO::PARAM_STR);
        $stmt -> bindParam(":prod_barcode", $data["prod_barcode"], PDO::PARAM_STR);
        $stmt -> bindParam(":prod_active", $data["prod_active"], PDO::PARAM_INT);

        $stmt->execute();

        $stmt->close();

        $stmt =  null;

    }

    static public function mdlGetProdsAll(){
        $stmt = Connection::connect()->prepare("SELECT * FROM vw_prods_all");

        $stmt ->execute();

        return $stmt -> fetchAll();

        $stmt->close();

        $stmt =  null;
    }

    static public function mdlGetProdSearch($search){
        $stmt = Connection::connect()->prepare(
            "SELECT * 
            FROM products 
            WHERE prod_name LIKE '%".$search."%' 
            OR prod_sku LIKE '".$search."' 
            OR prod_barcode LIKE '".$search."'");

        $stmt ->execute();

        return $stmt -> fetchAll();

        $stmt->close();

        $stmt =  null;
    }



    static public function mdlUpdateProd($data){
        $stmt = Connection::connect()->prepare("UPDATE products 
        SET 
        prod_name       = :prod_name, 
        prod_cats       = :prod_cats, 
        prod_cost       = :prod_cost,
        prod_desc       = :prod_desc,
        prod_barcode    = :prod_barcode, 
        prod_active     = :prod_active  
        WHERE prod_id   = :prod_id");

        
        $stmt -> bindParam(":prod_name", $data["prod_name"], PDO::PARAM_STR);
        $stmt -> bindParam(":prod_cats", $data["prod_cats"], PDO::PARAM_STR);
        $stmt -> bindParam(":prod_cost", $data["prod_cost"], PDO::PARAM_STR);
        $stmt -> bindParam(":prod_desc", $data["prod_desc"], PDO::PARAM_STR);
        $stmt -> bindParam(":prod_barcode", $data["prod_barcode"], PDO::PARAM_STR);
        $stmt -> bindParam(":prod_active", $data["prod_active"], PDO::PARAM_INT);
        $stmt -> bindParam(":prod_id", $data["prod_id"], PDO::PARAM_INT);

        $stmt->execute();

        $stmt->close();

        $stmt =  null;

    }



    
    
    
}
?>