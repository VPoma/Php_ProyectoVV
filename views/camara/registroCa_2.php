<?Php if(isset($edit) && isset($cam) && is_object($cam)):?>
    <h1>Editar Cámara: <?=$cam->camara?></h1>
    <?Php $url_action = base_url."camara/save&id=".$cam->id;?>
<?Php else:?>
    <h1>Registro de Cámaras</h1>
    <?Php $url_action = base_url."camara/save";?>
<?Php endif;?>

<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">

    <div style="display: flex;">
        <select name="camara" id="caja1" style="margin-left: 8%; margin-top:7px;" disabled>
            <option value="Calle N°1">Problemas Frecuentes:</option>
            <option value="Jr N°2">Value 2</option>
            <option value="Prolongación 3">Value 3</option>
        </select>
        
        <input type="button" value="Activar" class="button solid-color" style="padding: 4px; margin-left: 3.5px;" onclick="activarcaja()">
        <input type="button" value="Desactv" class="button solid-color" style="padding: 4px; margin-left: -8px;" onclick="desactivarcaja()">
    </div>

    <label for="nombre">Cámara</label>
    <input type="text" name="camara" id="caja2" value="<?=isset($cam) && is_object($cam) ? $cam->camara : ''; ?>" required/>

    <input type="submit" value="Aceptar" class="button solid-color">

    <div class="fila-2">
        <a href="<?=base_url?>camara/gestion" class="button extra-color regresar">
            Regresar
        </a>
    </div>

</form>

<br><br><br><br>

<form>

<!--
    <select name="camara" id="caja2">
        <option value="value1">Value 1</option>
        <option value="value2">Value 2</option>
        <option value="value3">Value 3</option>
    </select>
<hr>
    <input type="text" name="camara" id="caja1" disabled>
-->
</form>

<script type="text/javascript">
    function activarcaja(){
        document.getElementById('caja1').disabled=false
        document.getElementById('caja2').disabled=true
    }
    function desactivarcaja(){
        document.getElementById('caja1').disabled=true
        document.getElementById('caja2').disabled=false
    }
</script>