<?php
//print "<pre>";
//print_r($node);
//print "</pre>";
//die;

?>

<div id="datos-nodo">

  <?php  
  if ($node->field_fecha_actividades['und'][0]['value'] != '')
  print "<div style='margin-bottom: 20px; width: 100%'><b>Fecha: " . fix_date($node->field_fecha_actividades['und'][0]['value'], 'long') . "</b></div>";
  ?>

  <?php
  if (!empty($node->field_imagen_actividades)) {
    $ruta = file_create_url($node->field_imagen_actividades['und'][0]['uri']);
    $medidas = marco_imagen(270, 15, $ruta);
    $ancho_desc_texto = $medidas['ancho'] + 15;
    ?>
    <div class="imagen-noticia">
      <div class="imagen-imagen-noticia" style="width: <?php print $medidas['ancho'] ?>; height: <?php $medidas['alto'] ?>; padding: 15px;">
        <img src="<?php print $ruta; ?>" width="<?php print $medidas['x'] ?>">    
      </div>
      <div class="autor-imagen-noticia" style="width: <?php print $ancho_desc_texto . 'px' ?>"> <?php print "<i>" . $node->field_imagen_actividades['und'][0]['alt'] . "</i>" ?></div>
    </div>
  <?php } ?>

  <div class="cuerpo-noticia">
    <div class="full-noticia"><?php print $node->body['und'][0]['safe_value']; ?></div>
  </div>
  <div class="cleared"></div>
</div>



