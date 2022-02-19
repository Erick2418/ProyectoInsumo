<?php
class ProductionData {
	public static $tablename = "production";
   


	public function ProductionData(){
        $this->id = null;
        $this->id_lote = null;
        $this->fecha_inicio = null;
        $this->fecha_fin = null;
        $this->id_empleado = null;
        $this->id_labores = null;
        $this->id_productProduction = null;
        $this->status = null;

	}

	public function add(){
		$sql = "insert into production (id_lote,fecha_inicio,fecha_fin,id_empleado,id_labores,id_productProduction)";
		//$sql .= "value (\"$this->name\",$this->num_lot)";
        $sql .= "value (\"$this->id_lote\",\"$this->fecha_inicio\",\"$this->fecha_fin\",\"$this->id_empleado\",\"$this->id_labores\",\"$this->id_productProduction\")";
        Executor::doit($sql);
	}
    public function lastId(){
		$sql = "SELECT MAX(id) AS id FROM production;";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		$r = $query[0]->fetch_array();
		return $r;
	}
    

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		//$sql = "delete from ".self::$tablename." where id=$this->id";
		$sql = "update ".self::$tablename." set condicion=0 where id=$this->id";
		
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto CategoryData previamente utilizamos el contexto
	public function update(){
		//$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		$sql = "update ".self::$tablename." set name=\"$this->name\",num_lot=\"$this->num_lot\",dimension=\"$this->dimension\" where id=$this->id";
		
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



	public static function getAll(){
		$sql = "select * from ".self::$tablename." where status = 1";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ProductionData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->id_lote = $r['id_lote'];
			$array[$cnt]->fecha_inicio = $r['fecha_inicio'];
			$array[$cnt]->fecha_fin = $r['fecha_fin'];
            $array[$cnt]->id_empleado = $r['id_empleado'];
			$array[$cnt]->id_labores = $r['id_labores']; 
			$array[$cnt]->id_productProduction = $r['id_productProduction']; 
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