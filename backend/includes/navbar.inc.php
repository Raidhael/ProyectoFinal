<nav class="ss-navBar">
    <div class="ss-navigation">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <ul>
        
        <li id="ss-navBar-index">
            <a href="/backend/indexBackend.php">
                <span class="ss-home-icon">
                    <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/backend/images/SVG/tools.svg');?>
                </span>
                <span class="ss-texto-animado">BACKEND</span> 
            </a>
        </li>
        <li id="ss-navBar-perfil">
            <a href="/backend/perfil.php">  
                <span class="ss-profile-icon">
                    <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/backend/images/SVG/people.svg');?>
                </span>
                <span class="ss-texto-animado">Perfil</span> 
            </a>
        </li>
        <li id="ss-navBar-cartelera">
        <a href="backend/cartelera.php">
            <span class="ss-movies-icon">
            <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/backend/images/SVG/ticket.svg');?>
            </span>
            <span class="ss-texto-animado">PELICULAS</span> 
            </a>
        </li>
        <li id="ss-navBar-promociones">
        <a href="/backend/promociones.php">
            <span class="ss-promotions-icon">
            <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/backend/images/SVG/caja-para-regalo.svg');?>
            </span>
            <span class="ss-texto-animado">PROMOCIONES</span> 
            </a>
        </li>
        <li id="ss-navBar-index">
            <a href="/index.php">
                <span class="ss-home-icon">
                    <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/backend/images/SVG/013-cinema.svg');?>
                </span>
                <span class="ss-texto-animado">FRONTEND</span> 
            </a>
        </li>
    <?php
        if (isset($_SESSION['email']) && $_SESSION['email'] != null){
            echo '<li id="ss-navBar-logout"><a href="/logout.php">  
                        <span class="ss-logout-icon">'.file_get_contents($_SERVER['DOCUMENT_ROOT'].'/backend/images/SVG/logout.svg').' </span>
                        <span class="ss-texto-animado">SALIR</span> 
                        </a>
                    </li>';
        }
    ?>
    </ul>
    <div class="ss-logo-cine-mobile">
        <a href="/backend/indexBackend.php">
            <img src="/backend/images/PNG/logo-cine.png" alt="Logotipo">
        </a>
    </div>
</nav>