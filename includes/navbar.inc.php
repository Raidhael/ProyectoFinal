<nav class="ss-navBar">
    <div class="ss-navigation">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <ul>
        <li id="ss-navBar-index">
            <a href="/index.php">
                <span class="ss-home-icon">
                    <?php echo file_get_contents('./assets/images/SVG/home.svg');?>
                </span>
                        <span class="ss-texto-animado">INICIO</span> 
            </a>
        </li>
        <?php
        if (isset($_SESSION['email']) && $_SESSION['email'] != null){
            echo '<li id="ss-navBar-perfil"><a href="/perfil.php">  
                        <span class="ss-profile-icon">'.file_get_contents('./assets/images/SVG/usuario.svg').' </span>
                        <span class="ss-texto-animado">PERFIL</span> 
                        </a>
                    </li>';
        }else{
            echo '<li id="ss-navBar-registro"><a href="/registro.php">  
                    <span class="ss-profile-icon">'.file_get_contents('./assets/images/SVG/usuario.svg').' </span>
                    <span class="ss-texto-animado">Inicio Sesion</span> 
                    </a>
                </li>';
        }


        ?>
        <li id="ss-navBar-cartelera">
        <a href="/cartelera.php">
            <span class="ss-movies-icon">
            <?php echo file_get_contents('./assets/images/SVG/012-clapperboard.svg');?>
            </span>
            <span class="ss-texto-animado">CARTELERA</span> 
            </a>
        </li>
        <li id="ss-navBar-promociones">
        <a href="/promociones.php">
            <span class="ss-promotions-icon">
            <?php echo file_get_contents('./assets/images/SVG/caja-para-regalo.svg');?>
            </span>
            <span class="ss-texto-animado">PROMOCIONES</span> 
            </a>
        </li>
        <li id="ss-navBar-faq">
            <a href="/faq.php">
                <span class="ss-faq-icon">
                <?php echo file_get_contents('./assets/images/SVG/shapes.svg');?>
                </span>
                <span class="ss-texto-animado">F.A.Q</span> 
            </a>
        </li>
    <?php
        if (isset($_SESSION['email']) && $_SESSION['email'] != null){
            echo '<li id="ss-navBar-logout"><a href="/logout.php">  
                        <span class="ss-logout-icon">'.file_get_contents('./assets/images/SVG/logout.svg').' </span>
                        <span class="ss-texto-animado">SALIR</span> 
                        </a>
                    </li>';
        }
    ?>
    </ul>
    <div class="ss-logo-cine-mobile">
        <a href="/">
            <img src="assets/images/PNG/logo-cine.png" alt="Logotipo">
        </a>
    </div>
</nav>