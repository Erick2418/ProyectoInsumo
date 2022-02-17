

 <div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Tablero
      
      <small>Panel de Control</small>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tablero</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">
  
      
    <?php  
	
	$u=null;
    if(Session::getUID()!=""):
    $u = UserData::getById(Session::getUID());
?>
	<?php if($u->is_admin):

      include "inicio/cajas-superiores.php";     
      include "reportes/grafico-ventas.php";
	  include "reportes/productos-mas-vendidos.php";
      include "inicio/productos-recientes.php";
           ?>
            <?php endif;?>
<?php endif;?>
            
                         <div class="box-header">

             <h1>Bienvenido</h1>

             </div>

             </div>

            
                
        </div>
        
         </div>

     </div>
 
</div>