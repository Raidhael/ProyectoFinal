<nav class="ss-navBar">
    <div class="ss-navigation">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <ul>
        <li id="ss-navBar-index">
            <a href="/index.php">
                <span class="ss-home-icon">
                    <?php echo file_get_contents('./assets/images/SVG/013-cinema.svg');?>
                </span>
                        <span class="ss-texto-animado">INICIO</span> 
            </a>
        </li>
        <li id="ss-navBar-registro">
            <a href="/registro.php">
                <span class="ss-profile-icon">
                <?php echo file_get_contents('./assets/images/SVG/usuario.svg');?>
                </span>
                <span class="ss-texto-animado">REGISTRO</span> 
            </a>
        </li>
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
    </ul>
    <div class="ss-logo-cine-mobile">
        <a href="/">
            <img src="assets/images/PNG/logo-cine.png" alt="Logotipo">
        </a>
    </div>
</nav>