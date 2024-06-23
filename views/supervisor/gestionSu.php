<h1>Gestión Supervisor</h1>

<a href="<?=base_url?>supervisor/registro" class="button solid-color">
    Agregar Nuevo
</a>

<br><br>
<?Php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <strong class="alert_green">Registro ingresado/modificado Correctamente</strong>
<?Php elseif(isset($_SESSION['register']) && $_SESSION['register'] != 'complete'): ?>
    <strong class="alert_red">Error: Introduce bien los datos</strong>
<?Php endif; ?>
<?Php Utils::deleteSession('register');?>

<?Php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <strong class="alert_green">Registro Eliminado correctamente</strong>
<?Php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <strong class="alert_red">Error: Registro No Eliminado</strong>
<?Php endif; ?>
<?Php Utils::deleteSession('delete');?>
<br>

<table class="tablita">
    <tr>
        <th style="width: 40px;">ID</th>
        <th style="width: 90px;">NOMBRE</th>
        <th style="width: 90px;">APELLIDOS</th>
        <th style="width: 70px;">CELULAR</th>
        <th style="width: 40px;">ACCIONES</th>
    </tr>
    <?Php while($sup = $super->fetch_object()): ?>
    <tr>
        <td style="width: 40px;"><?=$sup->id?></td>
        <td style="width: 90px;"><?=$sup->snombre?></td>
        <td style="width: 90px;"><?=$sup->sapellidos?></td>
        <td style="width: 70px;"><?=$sup->celular?></td>
        <td style="width: 40px;">
            <a href="<?=base_url?>supervisor/editar&id=<?=$sup->id?>" class="button solid-colort">Editar</a>
            <a href="<?=base_url?>supervisor/eliminar&id=<?=$sup->id?>" class="button extra-colort">Eliminar</a>
        </td>
    </tr>
    <?Php endwhile; ?>
</table>