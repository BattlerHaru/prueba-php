<?php
$search = "";

if(isset($_GET["prod-search"])){
  $search = $_GET["prod-search"];
  $listProducts = ControllerProducts::ctrGetProdSearch($search);

} else if(isset($_POST["prod_new"])){
  $prod_name = $_POST['prod_name'];
  $prod_cats = $_POST['prod_cats'];
  $prod_sku = $_POST['prod_sku'];
  $prod_cost = $_POST['prod_cost'];; 
  $prod_desc = $_POST['prod_desc']; 
  $prod_barcode = $_POST['prod_barcode']; 
  $prod_active = $_POST['prod_active'];

  ControllerProducts::ctrNewProd($prod_name, $prod_cats,$prod_sku, $prod_cost, $prod_desc, $prod_barcode, $prod_active);

}


else {
  $listProducts = ControllerProducts::ctrGetProdsAll();

}


if(isset($_POST['update'])){

  $prod_id = $_POST['prod_id'];
  $prod_name = $_POST['prod_name'];
  $prod_cats = $_POST['prod_cats'];
  $prod_cost = $_POST['prod_cost'];; 
  $prod_desc = $_POST['prod_desc']; 
  $prod_barcode = $_POST['prod_barcode']; 
  $prod_active = $_POST['prod_active'];

  ControllerProducts::ctrUpdateProd($prod_id, $prod_name, $prod_cats, $prod_cost, $prod_desc, $prod_barcode, $prod_active);

  $listProducts = ControllerProducts::ctrGetProdsAll();
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/styles.css" />
    <title>Store</title>
  </head>
  <body>
    <nav>
      <h1>Lista de Productos</h1>
    </nav>

    <article class="article-search">
      <h2>Buscar un producto</h2>
     
     <form method="GET">
     <input
        type="text"
        name="prod-search"
        id="prod-search"
        placeholder="Escriba el nombre / sku / codigo de barras"
        value="<?php if(isset($_GET["prod-search"]))
        {
          echo $_GET["prod-search"];
        }?>"
      />
      <button  type="submit">🔎</button>
     </form>
    </article>

    <article class="prod-new">
      <h2>Registrar un producto</h2>
     <form method="POST">
     <label for="prod_name">Nombre</label>
     <input 
                type="text" 
                name="prod_name"
                value="" >                     
            
    <label for="prod_sku">sku</label>   
    <input type="text" name="prod_sku" value="">

    <label for="prod_cats">Categorias</label>
    <input type="text" name="prod_cats" value="">

    <label for="prod_cost">Precio</label>
    <input type="text" name="prod_cost" value="">
            
    <label for="prod_desc">Descripcion</label>
    <input type="text" name="prod_desc" value=""></td>
            
    <label for="prod_barcode">Codigo de Barras</label>
    <input type="text" name="prod_barcode" value="">

    <label for="prod_active">Activo</label>
            <select name="prod_active">
              <option 
                value="1"
                name="prod_active"
                selected >🟢</option>

                <option 
                value="0"
                name="prod_active"
                >🔴</option>
            </select>
      <button type="submit" name="prod_new">📝</button>
     </form>
    </article>
    <article class="article-prod">
      <table>
        <thead>
          <tr>
            <td>Nombre</td>
            <td>Sku</td>
            <td>Categoria</td>
            <td>Precio</td>
            <td>Descripcion</td>
            <td>Codigo de barras</td>
            <td>Activo</td>
            <td>Acciones</td>
          </tr>
        </thead>
        <tbody>
        <?php
          foreach($listProducts as $key => $value):
          ?>
        <form method="post">

          <tr>
            <td>
            <input type="hidden" name="prod_id" value="<?php echo $value['prod_id'];?>">
             <input 
                type="text" 
                name="prod_name"
                value="<?php echo $value['prod_name'];?>" >                     
            </td>
            <td>
            <?php echo $value["prod_sku"];?>
            </td>
            <td>
            <input type="text" name="prod_cats" value="<?php echo $value['prod_cats'];?>">
           </td>
            <td>
              <input type="text" name="prod_cost" value="<?php echo $value["prod_cost"];?>
            ">
            </td>
            <td><input type="text" name="prod_desc" value="<?php echo $value["prod_desc"];?>"></td>
            <td>
            <input type="text" name="prod_barcode" value="<?php 
            echo $value["prod_barcode"];
            ?>">

            </td>
            <td>
            <select name="prod_active">
              <option 
                value="1"
                name="prod_active"
                <?php 
                if($value["prod_active"]==1){
                  echo "selected" ;
                  }?>
                >🟢</option>
                <option 
                value="0"
                name="prod_active"
                <?php 
                if($value["prod_active"]==0){
                  echo "selected" ;
                  } ?>
                >🔴</option>
            </select>
            </td>
            <td>
              <button type="submit" name="update" >💾</button>

            </td>
          </tr>
          </form>

          <?php endforeach; ?>
        </tbody>
      </table>
    </article>
    <footer>
    <?php
echo "Hoy es " . date("Y/m/d") . "<br>";
?>
    </footer>
  </body>
</html>
