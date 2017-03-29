<?php
//print "<pre>";
//print_r($node);
//print "</pre>";
//die;
?>

<div id="datos-nodo">
  <div class="datos-nodo-texto">
    <?php print format_date($node->created, 'custom', "j-M-Y", null, 'es') . " // "; ?>
    <?php print "<b>Sección: " . $node->field_seccion_articulo['und'][0]['taxonomy_term']->name . "</b> // "; ?>
    <?php print "<b>Por: </b><i>" . $node->field_autor_articulo['und'][0]['value'] . "</i> // "; ?>
    <?php print "<b>" . $content['links']['statistics']['#links']['statistics_counter']['title'] . "</b>"; ?>
  </div>

  <?php
  if ($node->field_image['und'][0]['uri']) {
    $ruta = file_create_url($node->field_image['und'][0]['uri']);
    $medidas = marco_imagen(270, 15, $ruta);
    $ancho_desc_texto = $medidas['ancho'] + 15;
    ?>
    <div class="imagen-noticia">
      <div class="imagen-imagen-noticia" style="width: <?php print $medidas['ancho'] ?>; height: <?php $medidas['alto'] ?>; padding: 15px;">
        <img src="<?php print $ruta; ?>" width="<?php print $medidas['x'] ?>">    
      </div>
      <div class="autor-imagen-noticia" style="width: <?php print $ancho_desc_texto . 'px' ?>"> <?php print "<i>" . $node->field_image['und'][0]['alt'] . "</i>" ?></div>
    </div>
  <?php } ?>

  <div class="cuerpo-noticia">
    <div class="full-noticia"><?php print $node->body['und'][0]['safe_value']; ?></div>
  </div>
  <div class="comentario">
    <?php print render($content['comments']); ?>
  </div>
  <div class="cleared"></div>
</div>
