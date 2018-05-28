<header class="ss-main-header">
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <div class="ss-logo-cine">
                <a href="/">
                <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/images/SVG/iron-man.svg'); ?>
                    <!--img src="/images/PNG/logo-cine.png" alt="Logotipo"-->
                </a>
            </div> 
            
        </div>
        <div class="navbar-collapse collapse">
            <h1 class="ss-main-titulo"> Inicio</h1>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/">Inicio</a></li>

                    <?php
                    if (isset($_SESSION['email']) && $_SESSION['email'] != null)
                        echo '<li><a href="perfil.php"> Perfil </a></li>';
                    else
                        echo  '<li><a href="registro.php">Inicio sesion</a></li>';
                    ?>
                    <li><a href="cartelera.php">Cartelera</a></li>
                    <li><a href="promociones.php">Promociones</a></li>
                    <?php
                    if (isset($_SESSION['tipo']) && $_SESSION['tipo'] != null && $_SESSION['tipo'] == 'administrador'){
                        echo '<li><a href="/backend/indexBackend.php">BACKEND</a></li>';
                    }
                    if (isset($_SESSION['email']) && $_SESSION['email'] != null){
                        echo '<li><a href="/logout.php"> SALIR</a></li>';
                    }
                    ?>
                </ul>
        </div>
    </nav>
</header>
