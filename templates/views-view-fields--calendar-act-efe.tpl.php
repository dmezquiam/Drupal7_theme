<?php
//print "<pre>";
//print_r($row);
//print "</pre>";
//die;
global $base_url;
?>
<div id="datos-nodo">
  <?php
  if ($row->_field_data['nid']['entity']->field_imagen_actividades['und'][0]['uri'] != '') {
    $ruta = file_create_url($row->_field_data['nid']['entity']->field_imagen_actividades['und'][0]['uri']);
    ?>
    <div class="imagen-norequerida-contenidos">
      <div class="field-content"> <img src="<?php print $ruta; ?>" width="118" height="106"> </div>
    </div> 
    <div class="resto-contenido con-imagen">
      <?php
    }
    else {
      ?>
      <div class="resto-contenido sin-imagen">
      <?php } ?>

      <div class="titulo-contenido"><h2> <a href="<?php print $base_url . '/node/' . $row->nid; ?>"><?php print $row->node_title; ?> </a></h2></div>
      <div class="datos-nodo-texto">
          <?php print '<b>' . fix_date($row->_field_data['nid']['entity']->field_fecha_actividades['und'][0]['value'], 'long') . '</b>'; ?>     

      </div>
      <div class="cuerpo-noticia">

        <div class="full-noticia"><?php print myTruncate($row->_field_data['nid']['entity']->body['und'][0]['value'], $limit=220, $break=" ", $pad="..."); ?></div>

      </div>
    </div>
  </div>
  <div class="cleared"></div>

