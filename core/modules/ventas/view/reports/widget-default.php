<div class="row">
    <div class="col-md-12">
        <h1>Reportes</h1>
        <div class="well">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tipo de Reporte</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <b>Costo Producciones</b> </td>
                        <td><a href="index.php?view=ReporteProducciones" class="btn btn-sm btn-primary">Generar Reporte</a></td>
                    </tr>
                    <tr>
                        <td> <b>Costo Cajas</b> </td>
                        <td><a href="index.php?view=ReportePorCajaView" class="btn btn-sm btn-primary">Generar Reporte</a></td>
                    </tr>
                    <tr>
                        <td> <b>Reporte Kilos</b> </td>
                        <td><a href="index.php?view=ReportePorKiloView" class="btn btn-sm btn-primary">Generar Reporte</a></td>
                    </tr>
                    <tr>
                        <td> <b>Reporte Hectareas</b> </td>
                        <td><a href="index.php?view=ReportePorHectarea"class="btn btn-sm btn-primary">Generar Reporte</a></td>
                    </tr>
                    <tr>
                        <td> <b>Reporte Resultado Operativo</b> </td>
                        <td><a href="index.php?view=ReportePorResultadoOperativo"class="btn btn-sm btn-primary">Generar Reporte</a></td>
                    </tr>
                </tbody>
            </table>
            <div class="alert alert-danger" id="alert">
                <strong></strong>
            </div>
        </div>
    </div>
</div>

<script>
        function generarPdfkilo() {


            window.open('GenerarReportes/GenerarReporteKilo.php','_black');

        //    window.open('GenerarReportes/GenerarReporteProducciones.php?id=' + id, '_black');






        }
        </script>
