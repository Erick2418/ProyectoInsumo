<?php
class SubProductionData {
	public static $tablename = "subproduccion";
   
       
	public function SubProductionData(){
        $this->id = null;
        $this->fecha_fin = null;
        $this->id_empleado = null;
        $this->id_labores = null;
        $this->id_productProduction = null;
        $this->status = null;
        $this->idProduccion = null;

 
	}



	public function add(){

		$sql = "insert into subproduccion (fecha_fin,id_empleado,id_labores,id_productProduction,idProduccion)";
		//$sql .= "value (\"$this->name\",$this->num_lot)";
        $sql .= "value (\"$this->fecha_fin\",\"$this->id_empleado\",\"$this->id_labores\",$this->id_productProduction,$this->idProduccion)";
	
		Executor::doit($sql);

	

	}

	public function addSubProduccion($idProduccion){
		
	/*	$sql = "insert into subproduccion (fecha_fin,id_empleado,id_labores,id_productProduction,idProduccion)";
		//$sql .= "value (\"$this->name\",$this->num_lot)";
        $sql .= "value (\"$this->fecha_fin\",\"$this->id_empleado\",\"$this->id_labores\",\"$this->id_productProduction\",\"$idProduccion\")";
      
		Executor::doit($sql);*/
	}


    public function lastId(){
		$sql = "SELECT MAX(id) AS id FROM subproduccion;";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		$r = $query[0]->fetch_array();
		return $r;
	}
    

	public static function delById($id){
		/*$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);*/
	}
	public function del(){
		/*//$sql = "delete from ".self::$tablename." where id=$this->id";
		$sql = "update ".self::$tablename." set condicion=0 where id=$this->id";
		
		Executor::doit($sql);*/
	}

// partiendo de que ya tenemos creado un objecto CategoryData previamente utilizamos el contexto
	public function update(){
	/*	//$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		$sql = "update ".self::$tablename." set name=\"$this->name\",num_lot=\"$this->num_lot\",dimension=\"$this->dimension\" where id=$this->id";
		
		Executor::doit($sql);*/
	}

	public function updateIdSubProduccion($idProductProduccion, $idSubProduccion){
		// UPDATE `product_production` SET id_subProduccion= 1 WHERE id = 
			$sql = "update product_production set id_subProduccion=$idSubProduccion where id=$idProductProduccion";
			
			Executor::doit($sql);
	}


	public function updateProductProduccionID( $idSubProduccion,$idProduccion){
		// UPDATE `product_production` SET id_subProduccion= 1 WHERE id = 
			$sql = "UPDATE product_production SET id_subProduccion = $idSubProduccion WHERE id_temp = $idProduccion  AND $idProduccion = id_subProduccion;";
			
			Executor::doit($sql);
	}
	
	public static function getById($id){
	/*	$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new ProductionData();
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



	public static function getAll($idProduccion){
		$sql = "select * from ".self::$tablename." where status = 1 AND idProduccion = $idProduccion";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ProductionData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->fecha_fin = $r['fecha_fin'];
            $array[$cnt]->id_empleado = $r['id_empleado'];
			$array[$cnt]->id_labores = $r['id_labores']; 
			$array[$cnt]->id_productProduction = $r['id_productProduction']; 
			$array[$cnt]->idProduccion = $r['idProduccion']; 
			$cnt++;
		}
		return $array;
	}

	 

	public static function getAllById($idProduccion){
		$sql = "SELECT subp.id as id, per.name as name, lab.nombre as nombre, subp.id_productProduction as idprodctt, subp.idProduccion as productts, lote.name as nombrelote FROM subproduccion as subp INNER JOIN person as per ON subp.id_empleado = per.id INNER JOIN labores as lab ON subp.id_labores = lab.idlabores INNER JOIN production as prod ON subp.idProduccion = prod.id INNER JOIN lot as lote ON prod.id_lote = lote.id WHERE subp.idProduccion = $idProduccion ORDER BY subp.id ASC";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new SubProductionData();
			$array[$cnt]->id = $r['name'];
			$array[$cnt]->fecha_fin = $r['nombre'];
            $array[$cnt]->id_empleado = $r['idprodctt'];
			$array[$cnt]->id_labores = $r['productts']; 
			$array[$cnt]->id_productProduction = $r['nombrelote']; 
			$array[$cnt]->status = $r['id']; 
			$cnt++;
		}
		return $array;
	}

	 


	public static function getLike($q){
		/*$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new CategoryData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;*/
	}


	


}

?>