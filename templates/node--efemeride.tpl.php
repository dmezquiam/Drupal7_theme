<?php
//print "<pre>";
//print_r($node);
//print "</pre>";
//die;
?>

<div id="datos-nodo">
  <div class="datos-nodo-texto">
    <?php print fix_date($node->field_fecha_efem_mostrar['und'][0]['value'], 'small'); ?>   
  </div>
  <div class="cuerpo-noticia">
    <div class="full-noticia"><?php print $node->body['und'][0]['safe_value']; ?></div>
  </div>
  <div class="cleared"></div>
</div>