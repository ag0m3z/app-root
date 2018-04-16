<?php
include "../../core/core.php";
include "../../core/session.php";

use core\CoreApp,
    core\Session;

    if(!Session::getExisteSesion()){
        CoreApp::returnHome();
    }
    
?>
<script>
    getListarMesas();
</script>
<div class="row row-xs">
    <div class="col-md-12">
        <div class="form-group">
        <button id="btnAbrirMesa" class="btn btn-default waves-effect btn-sm">Abrir mesa</button>
        </div>
    </div>
</div>

<div id="content-mesas" class="row row-xs">
    <div class="col-md-2"><button class="btn btn-default text-bold btn-app">Mesa <br>1</div></div>
</div>