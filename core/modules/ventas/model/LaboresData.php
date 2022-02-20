<?php
class LaboresData {
	public static $tablename = "labores";
   
 
	public function LaboresData(){
        $this->idlabores ="";
        $this->nombre ="";
        $this->descripcion ="";
        $this->condicion ="";
	}
	//INSERT INTO `labores`(`idlabores`, `nombre`, `descripcion`, `condicion`) VALUES ([value-1],[value-2],[value-3],[value-4])
	public function add(){
		$sql = "insert into labores (nombre,descripcion,condicion) ";
        $sql .= "value (\"$this->nombre\",\"$this->descripcion\",1)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		//$sql = "delete from ".self::$tablename." where id=$this->id";
		$sql = "update ".self::$tablename." set condicion=0 where idlabores=$this->idlabores";
		
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto CategoryData previamente utilizamos el contexto
	public function update(){
		//$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",descripcion=\"$this->descripcion\" where idlabores=$this->idlabores";
		
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where idlabores=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new LaboresData();
		while($r = $query[0]->fetch_array()){
			$data->idlabores = $r['idlabores'];
			$data->nombre = $r['nombre'];
			$data->descripcion = $r['descripcion'];
			$data->condicion = $r['condicion'];
			$found = $data;
			break;
		}
		return $found;
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." where condicion = 1";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new LaboresData();
			$array[$cnt]->idlabores = $r['idlabores'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->descripcion = $r['descripcion'];
            $array[$cnt]->condicion = $r['condicion'];
            
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