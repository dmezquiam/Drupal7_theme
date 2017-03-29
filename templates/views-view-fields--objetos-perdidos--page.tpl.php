<?php
//print "<pre>";
//print_r($row);
//print "</pre>";
//die;
?>
<div id="datos-nodo">
  <div class="titulo-contenido"><h2> <?php print $row->node_title; ?> </h2> </div>  
  <div class="datos-nodo-texto">
    <?php print format_date($row->node_created, 'custom', "j-M-Y", null, 'es'); ?>
  </div>
  <div class="cuerpo-noticia">
    <div class="full-noticia"><?php print $row->_field_data['nid']['entity']->body['und'][0]['safe_value']; ?></div>
  </div>
  <?php print "<p class='datos-objeto'><b>Contactar a: </b><i>" . $row->_field_data['nid']['entity']->field_contactar_a['und'][0]['value'] . "</i></p>"; ?>
  <?php print "<p class='datos-objeto'><b>Correo: </b><i>" . $row->_field_data['nid']['entity']->field_correo['und'][0]['value'] . "</i></p>"; ?>
  <?php
  if ($row->_field_data['nid']['entity']->field_tel_fono['und'][0]['value'] != '') {
    print "<p class='datos-objeto'><b>Teléfono: </b><i>" . $row->_field_data['nid']['entity']->field_tel_fono['und'][0]['value'] . "</i></p>";
  }
  ?>
  <div class="cleared"></div>
</div>
