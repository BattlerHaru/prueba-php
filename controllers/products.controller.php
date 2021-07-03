<?php


Class ControllerProducts{

    // new product
    static public function ctrNewProd(  $prod_name, $prod_cats, $prod_sku, $prod_cost, $prod_desc, $prod_barcode, $prod_active){

        $data = array(
            "prod_name" => $prod_name,
            "prod_cats" => $prod_cats,
            "prod_sku" => $prod_sku,
            "prod_cost" => $prod_cost,
            "prod_desc" => $prod_desc,
            "prod_barcode" => $prod_barcode,
            "prod_active" => $prod_active,
          );


        $resp = ModelProducts::mdlNewProd($data);
        }


    // list of products
    static public function ctrGetProdsAll(){

        $resp = ModelProducts::mdlGetProdsAll();

        return $resp;
    }

    // list of product search
    static public function ctrGetProdSearch($search){

        $resp = ModelProducts::mdlGetProdSearch($search);

        return $resp;
    }

     // update and delete product
    static public function ctrUpdateProd( $prod_id, $prod_name, $prod_cats, $prod_cost, $prod_desc, $prod_barcode, $prod_active){

        $data = array(
            "prod_id" => $prod_id,
            "prod_name" => $prod_name,
            "prod_cats" => $prod_cats,
            "prod_cost" => $prod_cost,
            "prod_desc" => $prod_desc,
            "prod_barcode" => $prod_barcode,
            "prod_active" => $prod_active,
          );


        $resp = ModelProducts::mdlUpdateProd($data);
        }

   
}
?>