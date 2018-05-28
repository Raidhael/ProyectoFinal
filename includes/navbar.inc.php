<div id="ss-show-navBar">
    <?php echo  file_get_contents($_SERVER['DOCUMENT_ROOT'].'/images/SVG/muestra-navBar.svg')?>
</div>

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
                    <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/images/SVG/home.svg');?>
                </span>
                        <span class="ss-texto-animado">INICIO</span> 
            </a>
        </li>
        <?php
        if (isset($_SESSION['email']) && $_SESSION['email'] != null){
            echo '<li id="ss-navBar-perfil"><a href="/perfil.php">  
                        <span class="ss-profile-icon">'.file_get_contents($_SERVER['DOCUMENT_ROOT'].'/images/SVG/usuario.svg').' </span>
                        <span class="ss-texto-animado">PERFIL</span> 
                        </a>
                    </li>';
        }else{
            echo '<li id="ss-navBar-registro"><a href="/registro.php">  
                    <span class="ss-profile-icon">'.file_get_contents($_SERVER['DOCUMENT_ROOT'].'/images/SVG/usuario.svg').' </span>
                    <span class="ss-texto-animado">Inicio Sesion</span> 
                    </a>
                </li>';
        }


        ?>
        <li id="ss-navBar-cartelera">
        <a href="/cartelera.php">
            <span class="ss-movies-icon">
            <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/images/SVG/012-clapperboard.svg');?>
            </span>
            <span class="ss-texto-animado">CARTELERA</span> 
            </a>
        </li>
        <li id="ss-navBar-promociones">
        <a href="/promociones.php">
            <span class="ss-promotions-icon">
            <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/images/SVG/caja-para-regalo.svg');?>
            </span>
            <span class="ss-texto-animado">PROMOCIONES</span> 
            </a>
        </li>
        <li id="ss-navBar-faq">
            <a href="/faq.php">
                <span class="ss-faq-icon">
                <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/images/SVG/shapes.svg');?>
                </span>
                <span class="ss-texto-animado">F.A.Q</span> 
            </a>
        </li>
    <?php
        if (isset($_SESSION['tipo']) && $_SESSION['tipo'] != null && $_SESSION['tipo'] == 'administrador'){
            echo '<li id="ss-navBar-index">
                <a href="/backend/indexBackend.php">  
                    <span class="ss-home-icon">'.file_get_contents($_SERVER['DOCUMENT_ROOT'].'/backend/images/SVG/tools.svg').' </span>
                    <span class="ss-texto-animado">BACKEND</span> 
                </a>
            </li>';
        }
        if (isset($_SESSION['email']) && $_SESSION['email'] != null){
            echo '<li id="ss-navBar-logout"><a href="/logout.php">  
                        <span class="ss-logout-icon">'.file_get_contents($_SERVER['DOCUMENT_ROOT'].'/images/SVG/logout.svg').' </span>
                        <span class="ss-texto-animado">SALIR</span> 
                        </a>
                    </li>';
        }
    ?>
    </ul>
    <div class="ss-logo-cine-mobile">
        <a href="/">
            <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/images/SVG/iron-man.svg')?>
        </a>   
    </div>
    <h1 class="ss-main-titulo">a</h1>
</nav>