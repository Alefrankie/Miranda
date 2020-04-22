<?php

//Para redireccionar página

function redireccionar($pagina){
    header('localhost' . RUTA_URL . $pagina);
}