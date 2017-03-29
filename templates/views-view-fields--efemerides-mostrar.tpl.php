<?php
//print "<pre>";
//print_r($row);
//print "</pre>";
//die;
$row->_field_data['nid']['entity']->language = 'und';
?>
<div id="datos-nodo">
    
  <div class="titulo-contenido"><h2> <?php print $row->node_title; ?> </h2></div>
  
  <div class="datos-nodo-texto">
     <?php print fix_date($row->_field_data['nid']['entity']->field_fecha_efem_mostrar[$row->_field_data['nid']['entity']->language][0]['value'], 'small'); ?>   
  </div>
  
  <div class="cuerpo-noticia">
    <div class="full-noticia"><?php print $row->_field_data['nid']['entity']->body[$row->_field_data['nid']['entity']->language][0]['safe_value']; ?></div>
  </div>
  
  <div class="cleared"></div>
  
</div>


