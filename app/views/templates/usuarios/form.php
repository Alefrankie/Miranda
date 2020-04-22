<!--PRUEBA PARA HABILITAR Y DESHABILITAR INPUT EN EL FORMULARIO  -->
<!DOCTYPE html>
<html class="no-js">

<head>
</head>

<body>
    <select name=categoria>
        <option selected>CATEGORIA...</option>
        <option>BACHILLER</option>
        <option>T.S.U</option>
        <option>UNIVERSITARIO</option>
        <option onclick="document.getElementById('condicion').disabled=true;">MAESTRIA</option>
        <option onclick="document.getElementById('condicion').disabled=false">DOCTORADO</option>
    </select>

    <select id="condicion">
        <option selected>CONDICION...</option>
        <option>DIRECTIVO</option>
        <option>CONTRATADO</option>
        <option>FIJO</option>
    </select>




    <script type="text/javascript">
        function activar() {
            document.getElementById('mitext').readOnly = true;
        }

        function desactivar() {
            document.getElementById('mitext').readOnly = false;
        }

        function habilitar() {
            document.getElementById('mitext2').disabled = false;
        }

        function deshabilitar() {
            document.getElementById('mitext2').disabled = true;
        }
    </script>


    con disabled<input type="text" id="condicion" disabled="disabled" value="dos" /><br />
    <input type="button" value="desactivar_disabled" onclick="document.getElementById('condicion').disabled=false" />
    <input type="button" value="activar_disabled" onclick="document.getElementById('condicion').disabled=true;" />

</body>

</html>