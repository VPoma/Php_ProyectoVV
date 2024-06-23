<h1>Gestión Registro de Incidencias</h1>

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
<!--Tabla de FILTRO-->
<form action="<?=base_url?>rincidencias/filtrori" method="POST" enctype="multipart/form-data">
    <table >
        <tr>
            <th class="tbf">ID</th>
            <th class="tbf">FECHA</th>
            <th class="tbf">CÁMARA</th>
            <th class="tbf">DELITO</th>
        </tr>
        <tr>
            <td><input type="text"  name="id" class="fildt"/></td>
            <td><input type="date"  name="fecha" class="fildt"/></td>
            <td>
                <?Php $camaras = utils::showCamara(); ?>
                <select name="camara" id="">
                        <option value="" >
                                TODOS
                        </option>
                    <?Php while($cam = $camaras->fetch_object()): ?>
                        <option value="<?=$cam->id?>">
                            <?=$cam->camara?>
                        </option>
                    <?Php endwhile; ?>
                </select>
            </td>
            <td>
                <?Php $tdelitos = utils::showTipodelito(); ?>
                <select name="tipodelito" id="">
                        <option value="" >
                                TODOS
                        </option>
                    <?Php while($td = $tdelitos->fetch_object()): ?>
                        <option value="<?=$td->id?>">
                            <?=$td->delito?>
                        </option>
                    <?Php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th class="tbf">MEDIO ALERTA</th>
            <th class="tbf">OPERADOR</th>
            <th class="tbf">¿SE INTERVINO?</th>
            <th rowspan="2"><input type="submit" value="BUSCAR" name="filtro" id="buttonfil" class="button solid-colort fil" style="margin-left: 12%; padding: 5%;"/></th>
        </tr>
        <tr>
            <td>
                <?Php $malertas = utils::showMedioalerta(); ?>
                <select name="medioalerta" id="">
                        <option value="" >
                                TODOS
                        </option>
                    <?Php while($mea = $malertas->fetch_object()): ?>
                        <option value="<?=$mea->id?>">
                            <?=$mea->medioalerta?>
                        </option>
                    <?Php endwhile; ?>
                </select>
            </td>
            <td>
                <?Php $operadores = utils::showOperador(); ?>
                <select name="operador" id="">
                        <option value="" >
                                TODOS
                        </option>
                    <?Php while($ope = $operadores->fetch_object()): ?>
                        <option value="<?=$ope->id?>">
                            <?=$ope->nombre?> <?=$ope->apellidos?>
                        </option>
                    <?Php endwhile; ?>
                </select>
            </td>
            <td>
                <Select name="intervino" id="">
                    <option value="" >
                        TODOS
                    </option>
                    <option value="SI">
                        SI
                    </option>
                    <option value="NO">
                        NO
                    </option>
                </Select>
            </td>
        </tr>
    </table>
</form>
<br>

<!--Tabla de Busqueda-->
<table class="tablita">
    <tr>
        <th style="width: 20px;">ID</th>
        <th style="width: 60px;">FECHA</th>
        <th style="width: 120px;">CAMARA</th>
        <th style="width: 60px;">DELITO</th>
        <th style="width: 70px;">ALERTA</th>
        <th style="width: 70px;">OPERADOR</th>
        <th style="width: 30px;">INTRV</th>
        <th style="width: 90px;">DESCRIPCIÓN</th>
        <th style="width: 40px;">HORA</th>
        <th style="width: 20px;">ACCIONES</th>
    </tr>
    <?Php while($inc = $incide->fetch_object()): ?>
    <tr>
        <td style="width: 20px;"><?=$inc->id?></td>
        <td style="width: 60px;"><?=$inc->fecha?></td>
        <td style="width: 120px;"><?=$inc->camara?></td>
        <td style="width: 60px;"><?=$inc->delito?></td>
        <td style="width: 70px;"><?=$inc->alerta?></td>
        <td style="width: 70px;"><?=$inc->nombre?> <?=$inc->apellidos?></td>
        <td style="width: 30px;"><?=$inc->intervino?></td>
        <td style="width: 90px;"><?=$inc->descripcion?></td>
        <td style="width: 40px;"><?=$inc->horaincid?></td>
        <td style="width: 20px;">
            <a href="<?=base_url?>rincidencias/detalle&id=<?=$inc->id?>" class="button solid-colort">Detalle</a>
        </td>
    </tr>
    <?Php endwhile; ?>
    <tr>
        <!--Paginador-->
        <td class="text-center" colspan="10">
        <?Php if(isset($totalPag)): ?>
            <?Php for($i=1; $i<=$totalPag; $i++): ?>
                <a href="<?=base_url?>rincidencias/gestion&pag=<?=$i?>"><?=$i?></a> -
            <?Php endfor; ?>
        <?Php endif; ?>
        </td>
    </tr>
</table>