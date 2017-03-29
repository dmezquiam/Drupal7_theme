<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//print "<pre>";
//print_r($row);
//print "</pre>";
?>
<div id="datos-nodo">

  <?php
  if ($row->_field_data['nid']['entity']->field_imagen_aviso['und'][0]['uri'] != '') {
    $ruta = file_create_url($row->_field_data['nid']['entity']->field_imagen_aviso['und'][0]['uri']);
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

      <div class="titulo-contenido"><h2> <a href="<?php print 'node/'.$row->nid; ?>"><?php print $row->node_title; ?> </a></h2></div>
      <div class="datos-nodo-texto">
        <?php print format_date($row->node_created, 'custom', "j-M-Y", null, 'es'); ?>
        <?php
        if ($row->_field_data['nid']['entity']->field_emitido_por['und'][0]['value'] != '') {
          print ' // <b>Emitido por: </b><i>' . $row->_field_data['nid']['entity']->field_emitido_por['und'][0]['safe_value'] . '</i>';
        }

        if ($row->node_counter_totalcount != '') {
          print ' // <b>' . format_plural($row->node_counter_totalcount, '1 lectura', '@count lecturas') . '</b>';
        }
        else {
          print ' // <b>0 lecturas</b>';
        }
        ?>
      </div>
      <div class="cuerpo-noticia">
        <div class="full-noticia">
          <?php
          if ($row->_field_data['nid']['entity']->body['und'][0]['summary'] != '') {
            print $row->_field_data['nid']['entity']->body['und'][0]['summary'];
          }
          else {
            print myTruncate($row->_field_data['nid']['entity']->body['und'][0]['value'], $limit=220, $break=" ", $pad="...");
            /*$pad = '... '.l('[leer más]','node/'.$row->nid);
            print myTruncate($row->_field_data['nid']['entity']->body['und'][0]['value'], $limit=210, $break=" ", $pad);*/
          }
          ?> 
        </div>
      </div>
    </div>
  </div>
  <div class="cleared"></div>