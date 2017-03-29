<?php
//print "<pre>";
//print_r($node);
//print "</pre>";
//die;
?>
<div id="datos-nodo">
  <div class="datos-nodo-texto">
    <?php print format_date($node->created, 'custom', "j-M-Y", null, 'es') . " // "; ?>
    <?php print "<b>Categoría: " . $node->field_categor_a_de_la_noticia['und'][0]['taxonomy_term']->name . "</b> // "; ?>
    <?php
    if ($node->field_fuente['und'][0]['value'] != '')
      print "<b>" . $node->field_fuente['und'][0]['value'] . "</b> // ";
    else
      print "<b>" . $node->field_autor['und'][0]['value'] . "</b> // ";

    print "<b>" . $content['links']['statistics']['#links']['statistics_counter']['title'] . "</b>";
    ?>
  </div>

  <?php
  if ($node->field_imagen['und'][0]['uri']) {
    $ruta = file_create_url($node->field_imagen['und'][0]['uri']);
    $medidas = marco_imagen(270, 15, $ruta);
    $ancho_desc_texto = $medidas['ancho'] + 15;
    ?>
    <div class="imagen-noticia">
      <div class="imagen-imagen-noticia" style="width: <?php print $medidas['ancho'] ?>; height: <?php $medidas['alto'] ?>; padding: 15px;">
        <a class="yoxview" href="<?php print $ruta; ?>">
          <img src="<?php print $ruta; ?>" width="<?php print $medidas['x'] ?>"> 
        </a>
      </div>
      <div class="autor-imagen-noticia" style="width: <?php print $ancho_desc_texto . 'px' ?>"> <?php print "<i>" . $node->field_imagen['und'][0]['alt'] . "</i>" ?></div>
    </div>
  <?php } ?>

  <div class="cuerpo-noticia">
    <div class="summary-noticia"><?php print $node->body['und'][0]['summary']; ?></div>
    <div class="full-noticia"><?php print $node->body['und'][0]['safe_value']; ?></div>
  </div>
  <div class="comentario">
  <?php print render($content['comments']); ?>
  </div>
  <div class="cleared"></div>
</div>
