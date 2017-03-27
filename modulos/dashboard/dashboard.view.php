<script src="modulos/dashboard/dashboard.controller.js"></script>
<div class="submodulo" id="principal">
    <ul class="breadcrumb">
        <li><a href="./">Home</a></li>
        <li class="active">Dashboard</li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading">Visitas</div>
        <div class="panel-body">
            Panel content
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"><a href="?modulo=avisos">Avisos </a></div>
        <!--
        <div class="panel-body">
            <div class="alert alert-danger" role="alert"> <strong>Oh snap!</strong> Change a few things up and try submitting again. </div>
            <div class="alert alert-danger" role="alert"> <strong>Oh snap!</strong> Change a few things up and try submitting again. </div>
            <div class="alert alert-danger" role="alert"> <strong>Oh snap!</strong> Change a few things up and try submitting again. </div>
        </div>
        -->
        <div class="list-group">
            <a href="?modulo=avisos&filtro=alertas" class="list-group-item list-group-item-danger">Altertas <span class="badge">14</span></a>
            <a href="?modulo=avisos&filtro=avisos" class="list-group-item list-group-item-warning">Avisos <span class="badge">2</span></a>
            <a href="?modulo=avisos&filtro=mensajes" class="list-group-item list-group-item-info">Mensajes <span class="badge">1</span></a>
        </div>
    </div>
</div>
