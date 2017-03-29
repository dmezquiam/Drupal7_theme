<?php
//print "<pre>";
//print_r($node);
//print "</pre>";
//die;
?>

<div id="datos-nodo">
  <div class="datos-nodo-texto">
    <?php print format_date($node->created, 'custom', "j-M-Y", null, 'es'); ?>    
  </div>

  <div class="cuerpo-noticia">
    <div class="summary-noticia"><?php print $node->body['und'][0]['summary']; ?></div>
    <div class="full-noticia"><?php print $node->body['und'][0]['safe_value']; ?></div>
  </div>
  <?php print "<p class='datos-objeto'><b>Contactar a: </b><i>" . $node->field_contactar_a['und'][0]['value'] . "</i></p>"; ?>
  <?php print "<p class='datos-objeto'><b>Correo: </b><i>" . $node->field_correo['und'][0]['value'] . "</i></p>"; ?>
  <?php if ($node->field_tel_fono['und'][0]['value'] != '') {
    print "<p class='datos-objeto'><b>Teléfono: </b><i>" . $node->field_tel_fono['und'][0]['value'] . "</i></p>";
  } ?>    
  <div class="cleared"></div>
</div>



