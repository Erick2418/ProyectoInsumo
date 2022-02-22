<?php
class ProductionProduct {
	public static $tablename = "product_production";
   


	public function ProductionProduct(){
        $this->id="";
        $this->idProducto="";
        $this->cantidad="";
        $this->condicion="";
        $this->id_temp="";
	}

	public function add(){
		$sql = "insert into product_production (idProducto,cantidad,id_temp,condicion) ";
		//$sql .= "value (\"$this->name\",$this->num_lot)";
        $sql .= "value (\"$this->idProducto\",\"$this->cantidad\",$this->id_temp,1)";
		
		Executor::doit($sql);
	}

	public function addProductSubProduccion(){
		$sql = "insert into product_production (idProducto,cantidad,id_produccion,id_temp,id_subProduccion ) ";
		//$sql .= "value (\"$this->name\",$this->num_lot)";
        $sql .= "value (\"$this->idProducto\",\"$this->cantidad\",$this->id_temp,$this->id_temp,$this->id_temp)";
		 

		Executor::doit($sql);
	}

	public static function delById($id){
	/*	$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);*/
	}
	public function del(){
	/*	//$sql = "delete from ".self::$tablename." where id=$this->id";
		$sql = "update ".self::$tablename." set condicion=0 where id=$this->id";
		
		Executor::doit($sql);*/
	}

// partiendo de que ya tenemos creado un objecto CategoryData previamente utilizamos el contexto
	public function updateIdProduction($idProducto,$idProduccion){
		//$sql = "update product_production set name=\"$this->name\" where id=$this->id";
		$sql = "UPDATE ".self::$tablename." SET id_produccion=\"$idProduccion\" WHERE id=$idProducto";
		//echo $sql ;
		
		Executor::doit($sql);
	}
	public function getCantidadARestar($idProducto){
	//	$sql = "SELECT MAX(id) AS id FROM production;";
	//
		$sql = "SELECT cantidad,idProducto FROM product_production WHERE id= $idProducto";
		$query = Executor::doit($sql);
		$found = null;
		$data = new ProductData();
		while($r = $query[0]->fetch_array()){
			$data->idProducto = $r['idProducto'];
			$data->cantidad = $r['cantidad'];
		
			$found = $data;
			break;
		}
		
		return $found;



	}
	
	public static function getById($id){
	/*	$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new ProductionProduct();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->name = $r['name'];
			$data->num_lot = $r['num_lot'];
			$data->dimension = $r['dimension'];
			$found = $data;
			break;
		}
		return $found;*/
	}



	public static function getAll(){
    //    echo "Value is:";
    $valor_cookie = "0";
       if(isset($_COOKIE["var_cookie"])) {
           $valor_cookie = $_COOKIE["var_cookie"];
          // echo $valor_cookie;
        }

		$sql = "SELECT pp.id, pp.idProducto, pp.cantidad, pp.id_temp, pp.condicion, pp.id_produccion, prod.name FROM product_production as pp INNER JOIN product as prod ON pp.idProducto = prod.id WHERE id_temp = $valor_cookie";
		 

		$query = Executor::doit($sql);

		$array = array();
		$cnt = 0;
      
        while($r = $query[0]->fetch_array()){
            $array[$cnt] = new ProductionProduct();
            $array[$cnt]->id = $r['id'];
            $array[$cnt]->idProducto = $r['idProducto'];
            $array[$cnt]->cantidad = $r['cantidad'];
            $array[$cnt]->condicion = $r['condicion'];
            $array[$cnt]->id_temp = $r['id_temp'];
			$array[$cnt]->name = $r['name'];
			

            $cnt++;
        }
		return $array;
	}

	public static function getAllByProduccion($idProduccion){
		//    echo "Value is:";
	 
			$sql = "SELECT pp.id, pp.idProducto, pp.cantidad, pp.id_temp, pp.condicion, pp.id_produccion, prod.name FROM product_production as pp INNER JOIN product as prod ON pp.idProducto = prod.id WHERE id_produccion = $idProduccion";
			 
	
			$query = Executor::doit($sql);
	
			$array = array();
			$cnt = 0;
		  
			while($r = $query[0]->fetch_array()){
				$array[$cnt] = new ProductionProduct();
				$array[$cnt]->id = $r['id'];
				$array[$cnt]->idProducto = $r['idProducto'];
				$array[$cnt]->cantidad = $r['cantidad'];
				$array[$cnt]->condicion = $r['condicion'];
				$array[$cnt]->id_temp = $r['id_temp'];
				$array[$cnt]->name = $r['name'];
				
	
				$cnt++;
			}
			return $array;
		}
	

	public static function getLike($q){
	
	}

 
	public static function getAguaCantidad($idProduccion){
		//	$sql = "SELECT MAX(id) AS id FROM production;";
		//
		$sql = "SELECT  idProducto, cantidad,  id_produccion FROM product_production WHERE id_produccion = $idProduccion and idProducto = 5"; // 
			$query = Executor::doit($sql);
			$found = null;
			$data = new ProductData();
			while($r = $query[0]->fetch_array()){
				$data->cantidad = $r['cantidad'];
				$found = $data;
				break;
			}
			
			return $found;
	
	
	
	}

	public static function getEquipoCantidad($idProduccion){
		//	$sql = "SELECT MAX(id) AS id FROM production;";
		//
		$sql = "SELECT  idProducto, cantidad,  id_produccion FROM product_production WHERE id_produccion = $idProduccion and idProducto = 5"; // 
			$query = Executor::doit($sql);
			$found = null;
			$data = new ProductData();
			while($r = $query[0]->fetch_array()){
				$data->cantidad = $r['cantidad'];
				$found = $data;
				break;
			}
			
			return $found;
	
	
	
	}

	public static function getInsumosCantidadPrecio($idProduccion){
		//    echo "Value is:";
	 
		$sql = "SELECT produccion.cantidad, producto.price_in, producto.unit FROM product_production as produccion INNER JOIN product as producto ON produccion.idProducto = producto.id WHERE produccion.id_produccion = $idProduccion AND producto.category_id = 4;";
	
		$query = Executor::doit($sql);

		$array = array();
		$cnt = 0;
	  
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ProductionProduct();
			$array[$cnt]->idProducto = $r['price_in']; //idProducto == PRECIO ENTRADA
			$array[$cnt]->cantidad = $r['cantidad']; // cantidad== CANTIDAD
			$array[$cnt]->condicion = $r['unit']; // condicion == UNIDAD
			$cnt++;
		}
		return $array;
	}
		
	public static function getEquiposCantidadPrecio($idProduccion){
		//    echo "Value is:";
	 
		$sql = "SELECT produccion.cantidad, producto.id as idProducto, producto.name as nombre FROM product_production as produccion INNER JOIN product as producto ON produccion.idProducto = producto.id WHERE produccion.id_produccion = $idProduccion AND producto.category_id = 5;";
	
		$query = Executor::doit($sql);

		$array = array();
		$cnt = 0;
	  
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ProductionProduct();
			$array[$cnt]->idProducto = $r['idProducto'];  
			$array[$cnt]->cantidad = $r['cantidad']; 
			$array[$cnt]->condicion = $r['nombre']; 
			$cnt++;
		}
		return $array;
	}
		


}

?>