<?php
include "./../../model/ProductData.php";
include "./../../../../controller/Database.php";
include "./../../../../controller/Executor.php";

$categ = $_POST['Categoria'];
$listproductos = ProductData::getAllByCategoryId($categ);

?>

<label for="exampleInputPassword1">Seleccione Producto: </label>
<select name="id_producto" class="form-control">
    <option value="">-- NINGUNA --</option>
    <?php foreach($listproductos as $product):?>
    <option value="<?php echo $product->id;?>"><?php echo $product->name;?></option>
    <?php endforeach;?>
</select>
             
 