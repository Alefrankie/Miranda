<?php

//Para redireccionar página

function redireccionar($pagina){
    header("location:" . RUTA_URL . $pagina);
}