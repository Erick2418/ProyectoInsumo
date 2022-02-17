<?php
  include "conexion.php";
?>
<body>
<div class="todo">
  
  
  <div id="contenido">
  	<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<span> <h1>Labores</h1>
  		<h1>
  <label>Id labor: </label>
  		  <input type="text" id="idlabores" name="idlabores"><br>
  		  
  		  <label>nombre: </label>
  		  <input type="text" id="nombre" name="nombre" ><br>
  		  
  		  <label>Descripcion: </label>
  		  <textarea style="border-radius: 10px;" rows="3" cols="50" name="descripcion" ></textarea><br>
  		  
  		  <br>
	    </h1>
  		</span>
  		<form action="nuevo_prod2.php" method="POST" style="border-collapse: separate; border-spacing: 10px 5px;">
  		  <button type="submit" class="btn btn-success">Guardar</button>
     </form>
  	</div>
  	
  </div>
  
	
</div>


</body>
