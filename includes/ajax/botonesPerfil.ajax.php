<?php
echo '<div class="pull-right acciones">';
echo '<button class="btn pull-right cancel"> '.file_get_contents($_SERVER['DOCUMENT_ROOT'].'/assets/images/SVG/cancelar.svg').'</button>';
echo '<button class="btn pull-right done"> '.file_get_contents($_SERVER['DOCUMENT_ROOT'].'/assets/images/SVG/done.svg').'</button>';
echo '</div>';
?>