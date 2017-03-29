<?php

/**
 * Add body classes if certain regions have content.
 */
function portal_preprocess_html(&$variables) {
  if (!empty($variables['page']['featured'])) {
    $variables['classes_array'][] = 'featured';
  }

  if (!empty($variables['page']['triptych_first'])
      || !empty($variables['page']['triptych_middle'])
      || !empty($variables['page']['triptych_last'])) {
    $variables['classes_array'][] = 'triptych';
  }

  if (!empty($variables['page']['footer_firstcolumn'])
      || !empty($variables['page']['footer_secondcolumn'])
      || !empty($variables['page']['footer_thirdcolumn'])
      || !empty($variables['page']['footer_fourthcolumn'])) {
    $variables['classes_array'][] = 'footer-columns';
  }

  // Add conditional stylesheets for IE
  drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));

  //add js
//  drupal_add_js(path_to_theme() . '/js/login.js');
  drupal_add_js(path_to_theme() . '/js/search.js');
//  drupal_add_js(path_to_theme() . '/js/submit.js');
//  drupal_add_js(path_to_theme() . '/js/ocultar.js');
}

/**
 * Override or insert variables into the page template for HTML output.
 */
function portal_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

/**
 * Override or insert variables into the page template.
 */
function portal_process_page(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name'] = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $variables['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $variables['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
  }
}

/**
 * Implements hook_preprocess_maintenance_page().
 */
function portal_preprocess_maintenance_page(&$variables) {
  // By default, site_name is set to Drupal if no db connection is available
  // or during site installation. Setting site_name to an empty string makes
  // the site and update pages look cleaner.
  // @see template_preprocess_maintenance_page
  if (!$variables['db_is_active']) {
    $variables['site_name'] = '';
  }
  drupal_add_css(drupal_get_path('theme', 'portal') . '/css/maintenance-page.css');
}

/**
 * Override or insert variables into the maintenance page template.
 */
function portal_process_maintenance_page(&$variables) {
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name'] = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
}

/**
 * Override or insert variables into the node template.
 */
function portal_preprocess_node(&$variables) {
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
}

/**
 * Override or insert variables into the block template.
 */
function portal_preprocess_block(&$variables) {
  // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
}

function portal_breadcrumb(&$variables) {
  $breadcrumb = $variables['breadcrumb'];
  
  if (arg(0) == 'search') {
    $breadcrumb = array(l('Inicio', 'node'), 'Buscar Contenidos');
  }

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' > ', $breadcrumb) . '</div>';
    return $output;
  }
}

//theme.inc linea 1780

/**
 * Implements theme_menu_tree().
 */
function portal_menu_tree($variables) {
  return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

/**
 * Implements theme_field__field_type().
 */
function portal_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '">' . $output . '</div>';

  return $output;
}

function marco_imagen($tope_x, $padding, $ruta) {
  //if (is_file($ruta)) {
  $info_img = getimagesize($ruta);
  $marco = array();
  if (($info_img[0] <= $tope_x)) {
    $marco['ancho'] = $info_img[0] + 2 * $padding;
    $marco['alto'] = $info_img[1] + 2 * $padding;
    $marco['x'] = $info_img[0];
  }
  else {
    $marco['ancho'] = $tope_x + 2 * $padding;
    $marco['alto'] = $info_img[1] + 2 * $padding;
    $marco['x'] = $tope_x;
  }
  return $marco;
  //}
}

function fix_date($param, $format) {
  $mes = array('01' => 'Ene', '02' => 'Feb', '03' => 'Mar', '04' => 'Abr', '05' => 'May', '06' => 'Jun', '07' => 'Jul', '08' => 'Ago', '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dic');
  $util = explode(' ', $param); //$util[0] está la fecha
  $trozos = explode('-', $util[0]);

  switch ($format) {
    case 'small':
      return $trozos[2] . '-' . $mes[$trozos[1]] . '-' . $trozos[0];
    case 'long':
      return $trozos[2] . '-' . $mes[$trozos[1]] . '-' . $trozos[0] . ' ' . $util[1];
  }
}

function get_month($mes, $format) {
  switch ($format) {
    case 'small':
      $meses = array('01' => 'Ene', '02' => 'Feb', '03' => 'Mar', '04' => 'Abr', '05' => 'May', '06' => 'Jun', '07' => 'Jul', '08' => 'Ago', '09' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dic');
    case 'long':
      $meses = array('01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre');
  }
  return $meses[$mes];
}

function portal_search_item($item, $type) {
  $output = ' <dt class="title"><a href="' . check_url($item['link']) . '">' . check_plain($item['title']) . '</a></dt>';
  $output .= ' <dd>' . ($item['snippet'] ? '<p>' . $item['snippet'] . '</p>' : '') . '</dd>';
  return $output;
}

function portal_preprocess_search_results() {

  $t[] = l('Inicio', 'inicio');
  drupal_set_breadcrumb($t);
}


    // Original PHP code by Chirp Internet: www.chirp.com.au
    // Please acknowledge use of this code by including this header.

    function myTruncate($string, $limit, $break=" ", $pad="...") {
    // return with no change if string is shorter than $limit
      if(strlen($string) <= $limit){
        return $string;
      }
      // is $break present between $limit and the end of the string?
      
      if(false !== ($breakpoint = strpos($string, $break, $limit))) {
        if($breakpoint < strlen($string) - 1) {
          $string = substr($string, 0, $breakpoint) . $pad;
        }
      }
      return $string;
    }


?>