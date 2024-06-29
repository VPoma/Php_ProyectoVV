<?Php if(isset($detail) && isset($inc) && is_object($inc)):?>
    <h1>Incidencia N° <?=$inc->id?></h1>
<?Php else:?>
    <?Php require_once 'views/rincidencias/gestionRi.php'; ?>
<?Php endif;?>

<h2 style="margin-left: 6%; color: #5cb9a2;">Operador: <?=$inc->nombre?> <?=$inc->apellidos?></h2>

<div class="fila-2" style="	margin-top: -3%;">
    <a href="<?=base_url?>rincidencias/gestion" class="button solid-color">
        Regresar
    </a>
</div>

<br>

<table class="tablaseg">
    <tr>
        <th class="t-i">▀ Cámara</th>
        <th class="t-i">▀ Referencia</th>
        <th class="t-i">▀ Tipo de Delito</th>
    </tr>
    <tr>
        <td class="t-i"> ○ <?=$inc->camara?></td>
        <td class="t-i"> ○ <?=$inc->referencia?></td>
        <td class="t-i"> ○ <?=$inc->delito?></td>
    </tr>
    <tr>
        <th class="t-i">▀ Descripción</th>
        <th class="t-i">▀ Medio de Alerta</th>
        <th class="t-i">▀ Fecha</th>
    </tr>
    <tr>
        <td class="t-i"> ○ <?=$inc->descripcion?></td>
        <td class="t-i"> ○ <?=$inc->alerta?></td>
        <td class="t-i"> ○ <?=$inc->fecha?></td>
    </tr>
    <tr>
        <th class="t-i">▀ Hora Incidencia</th>
        <th class="t-i">▀ ¿Se Intervino?</th>
        <th class="t-i">▀ Hora Intervención</th>
    </tr>
    <tr>
        <td class="t-i"> ○ <?=$inc->horaincid?></td>
        <td class="t-i"> ○ <?=$inc->intervino?></td>
        <td class="t-i"> ○ <?=$inc->horainterv?></td>
    </tr>
    <tr>
        <th class="t-i">▀ Turno</th>
        <th class="t-i">▀ Unidad</th>
        <th class="t-i">▀ Número de Unidad</th>
    </tr>
    <tr>
        <td class="t-i"> ○ <?=$inc->turno?></td>
        <td class="t-i"> ○ <?=$inc->unidad?></td>
        <td class="t-i"> ○ <?=$inc->nunidad?></td>
    </tr>
    <tr>
        <th class="t-i">▀ CECOM</th>
        <th class="t-i">▀ PNP</th>
        <th class="t-i">▀ Supervisor</th>
    </tr>
    <tr>
        <td class="t-i"> ○ <?=$inc->cnombre?> <?=$inc->capellidos?></td>
        <td class="t-i"> ○ <?=$inc->pnombre?> <?=$inc->papellidos?></td>
        <td class="t-i"> ○ <?=$inc->snombre?> <?=$inc->sapellidos?></td>
    </tr>
    <tr>
        <th class="t-i">▀ Operador</th>
        <th class="t-i" colspan="2">▀ Observaciones</th>
    </tr>
    <tr>
        <td class="t-i"> ○ <?=$inc->nombre?> <?=$inc->apellidos?></td>
        <td class="t-i" colspan="2"> ○ <?=$inc->observaciones?></td>
    </tr>
    <tr>
        <th class="t-i" colspan="3">▀ Imagen</th>
    </tr>
    <tr>
        <td class="t-i" colspan="3"> ○ <?=$inc->imagen?>
        <br>
        <img src="<?=base_url?>uploads/images/<?=$inc->imagen?>" class="thumb"/>
        </td>
    </tr>
</table>

<!--
<br><br>
-->

<!--<div class="fila-1" style="margin-bottom: -5.8%;">-->
<div class="fila-1" style="margin-bottom: -5%;">
    <a href="<?=base_url?>rincidencias/editar&id=<?=$inc->id?>" class="button solid-color">
        Editar
    </a>

    <a href="<?=base_url?>rincidencias/eliminar&id=<?=$inc->id?>" class="button extra-color">
        Eliminar
    </a>
</div>