<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar Session</title>

    <!-- Bootstrap core CSS -->
    <link href="res/bootstrap3/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="js/jquery-1.10.2.js"></script>

  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">SISTEMA INVENTARIO <sup><small><span class="label label-danger"></span></small></sup> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
<?php 
$u=null;
if(Session::getUID()!=""):
  $u = UserData::getById(Session::getUID());
?>
          <ul class="nav navbar-nav side-nav">
          <li><a href="index.php?view=home"><i class="fa fa-home"></i> Inicio</a></li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i> <span>Bodega</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?view=products"><i class="fa fa-circle-o"></i> Productos</a></li>
          <li><a href="index.php?view=inventary"><i class="fa fa-area-chart"></i> Inventario</a></li></ul>
           <li><a href="index.php?view=produccion"><i class="fa fa-area-chart"></i> Producción <small><span class="label label-success">Nuevo</span></small></a></li>
                     <p>
                       <?php if($u->is_admin):?>
                                                  <li><a href="index.php?view=clients"><i class="fa fa-smile-o"></i> Empleados </a></li>
                                                  <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i> <span>Control</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
         
           <li><a href="index.php?view=categories"><i class="fa fa-th-list"></i> Categorias </a></li>
                            
                    <li><a href="index.php?view=lote"><i class="fa fa-glass"></i> Lote <small><span class="label label-success">Nuevo</span></small></a></li>
                     <li><a href="index.php?view=labores"><i class="fa fa-usd"></i> Labores del Cultivo</a></li>
<li><a href="index.php?view=novedad"><i class="fa fa-tasks"></i> Novedades</a></li>
                     <li><a href="index.php?view=users"><i class="fa fa-users"></i> Usuarios </a></li>
         
                     </ul>
                                    <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i> <span>Compra</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">            
          <li><a href="index.php?view=re"><i class="fa fa-refresh"></i> Compra <small><span class="label label-success">Nuevo</span></small></a></li>
          <li><a href="index.php?view=res"><i class="fa fa-th-list"></i> Reabastecimientos <small><span class="label label-success">Nuevo</span></small></a></li>
          <li><a href="index.php?view=providers"><i class="fa fa-truck"></i> Proveedores <small><span class="label label-success">Nuevo</span></small></a></li>
          
          </ul></li>
          <li><a href="index.php?view=reports"><i class="fa fa-tasks"></i> Reportes</a></li>
                   
           
        <?php endif;?>
          </ul>
<?php endif;?>



<?php if(Session::getUID()!=""):?>
<?php 
$u=null;
if(Session::getUID()!=""){
  $u = UserData::getById(Session::getUID());
  $user = $u->name." ".$u->lastname;

  }?>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php echo $user; ?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=configuration">Configuracion</a></li>
          <li><a href="logout.php">Salir</a></li>
        </ul>
<?php else:?>
<?php endif; ?>




        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

<?php 
  // puedo cargar otras funciones iniciales
  // dentro de la funcion donde cargo la vista actual
  // como por ejemplo cargar el corte actual
  View::load("login");
?>


      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->

<script src="res/bootstrap3/js/bootstrap.min.js"></script>
<script src="res/datepicker/js/bootstrap-datepicker.js"></script>
<script>
            $('.tip').tooltip();

            $('#alert').hide();
  var startDate = new Date();
      var endDate = new Date();
      $('#dp4').attr('data-date',startDate);
      $('#dp5').attr('data-date',endDate);

      $('#startDate').text($('#dp4').data('date'));
      $('#endDate').text($('#dp5').data('date'));
      $('#dp4').datepicker()
        .on('changeDate', function(ev){
          if (ev.date.valueOf() > endDate.valueOf()){
            $('#alert').show().find('strong').text('La fecha de inicio no debe ser mayor que la fecha de fin.');
          } else {
            $('#alert').hide();
            startDate = new Date(ev.date);
            $('#startDate').text($('#dp4').data('date'));
            $('#stdate').val($('#dp4').data('date'));
          }
          $('#dp4').datepicker('hide');
        });

      $('#dp5').datepicker()
        .on('changeDate', function(ev){
          if (ev.date.valueOf() < startDate.valueOf()){
            $('#alert').show().find('strong').text('La fecha de fin no debe ser menor que la fecha de inicio.');
          } else {
            $('#alert').hide();
            endDate = new Date(ev.date);
            $('#endDate').text($('#dp5').data('date'));
            $('#endate').val( $('#dp5').data('date') );
          }
          $('#dp5').datepicker('hide');
        });


</script>

  </body>
</html>
