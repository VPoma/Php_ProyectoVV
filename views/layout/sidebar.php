    <!--Lateral-->

    <aside id="lateral">
            <div id="login" class="block_aside">
                <?Php if(!isset($_SESSION['identity'])): ?>
                    <h3>Iniciar Sesión</h3>
                    <form action="<?=base_url?>operador/login" method="POST">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario" />
                        <label for="password">Password</label>
                        <input type="password" name="password" />
                        <input type="submit" value="Login" class="button solid-color" style="padding: 4px 25px;">
                    </form>
                <?Php else: ?>
                    <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>

                    <!--<li><a href="<//?=base_url?>usuario/editu&id=<//?=$_SESSION['identity']->id?>">Editar Perfil</a></li>-->
                    <!--<li><a href="<//?=base_url?>usuario/editp&id=<//?=$_SESSION['identity']->id?>">Cambiar Password</a></li>-->
                    <li><a href="<?=base_url?>operador/logout">Cerrar Sesión</a></li>

                        <!--<//?Php if($_SESSION['identity']->imagen != null): ?>-->
                            <div class="fila">
                                <!--<img src="<//?=base_url?>uploads/images/<//?=$_SESSION['identity']->imagen?>" class="ft"/>-->
                            </div>
                            <br>
                            <!--
                            <li><a href="<//?=base_url?>usuario/editu&id=<//?=$_SESSION['identity']->id?>">Editar Perfil</a></li>
                            <li><a href="<//?=base_url?>usuario/editp&id=<//?=$_SESSION['identity']->id?>">Cambiar Password</a></li>
                            <li><a href="<//?=base_url?>usuario/logout">Cerrar Sesión</a></li>
                            -->

                        <!--<//?Php else: ?>-->
                            <div class="fila">
                                <!--<img src="<//?=base_url?>assets/images/fotop.png" class="ftp"/>-->
                            </div>
                            <br>
                            <!--
                            <li><a href="<//?=base_url?>usuario/editu&id=<//?=$_SESSION['identity']->id?>">Editar Perfil</a></li>
                            <li><a href="<//?=base_url?>usuario/editp&id=<//?=$_SESSION['identity']->id?>">Cambiar Password</a></li>
                            <li><a href="<//?=base_url?>usuario/logout">Cerrar Sesión</a></li>
                            -->
                        <!--<//?Php endif; ?>-->

                <?Php endif; ?>
                <ul>
                        <!--<li><a href="#">Registrate Aquí</a></li>-->
                </ul>
            </div>
        </aside>
            <!-- CONTENIDO CENTRAL -->
        <div id="central">
            <!-- banner -->
    <!--
    <section class="banner_main">
        <div class="text-bg">
            
        </div>
    </section>
    -->
    <!-- end banner -->