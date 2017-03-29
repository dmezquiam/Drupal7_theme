<!-- Header. -->
<div id="header">

  <div id="relleno_izq"></div>
  <div id="header-inside">
    <div id="top_menu">
      <div id="fecha"><?php print format_date(time(), 'custom', "l\, j \d\e F \d\e Y", null, 'es'); ?></div>
       <div id="top_links">
      
         	<?php
			global $user;
			if (!$user->uid) {?>
			
		    <div id="login"><img src="<?php print base_path() . drupal_get_path('theme', 'portal'); ?>/images/login.png"/><a href="#user-login" id="login1">Autenticación</a></div>
			<div id="login-formulario">
				<?php
  // Change the following line's text to whatever you want.
				print drupal_render(drupal_get_form('user_login')); ?>
				<div id="cerrar-login">
				<a href="#principal" id="lcerrar">cancelar</a>
				</div>
			</div>
			
<?php } elseif ($user->uid) {
  // The following line will display the username you are logged in as.
?>   <div id="login-datos">
		<div class="user">
		<?php print $user->name;?> 
		</div>
		<div class="cerrar">
		<a href="<?php print base_path();?>/user/logout" id="login">cerrar sesión</a>
		</div>
     </div>
     
<?php } ?> 

        <li><div id="buscar"><div style="margin-top: 3px;"><img class="img_buscar" src="<?php print base_path() . drupal_get_path('theme', 'portal'); ?>/images/buscar.png"/><a href="#" id="buscar1">Buscar</a></div></div></li>
			<div id="formulario-search"><?php print drupal_render(drupal_get_form('search_block_form'));?>
			<div id="cerrar-search">
			<a href="#principal" id="bcerrar" title="Cancelar Búsqueda"><img src="<?php print base_path() . drupal_get_path('theme', 'portal'); ?>/images/cerrar.png"/></a>
			</div>
		   </div>
</div>
      <div class="cleared"></div>
      <div id="menu-principal-uno">
        <?php
        $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'menu-menu-principal-uno'));
        print drupal_render($main_menu_tree);
        ?>
      </div>
      <div id="menu-principal-dos">
        <?php
        $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'menu-menu-principal-dos'));
        print drupal_render($main_menu_tree);
        ?>
      </div>
    </div>


  </div> <!--EOF: #header-inside -->
  <!--  <div id="relleno_der"></div>-->
  <div id="logo">
    <a href="<?php print base_path(); ?>"><img src="<?php print base_path() . drupal_get_path('theme', 'portal'); ?>/images/logo.png"/></a>
  </div>
  <div id="fac1">
    <img src="<?php print base_path() . drupal_get_path('theme', 'portal'); ?>/images/fac1.png"/>
  </div>


</div><!-- EOF: EOF: #header -->

<div id="main">



  <div id="contenedor-contenidos-interior">

    <?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>

    <?php if ($tabs): ?>
      <div class="tabs">
        <?php print render($tabs); ?>
      </div>
    <?php endif; ?>

    <?php if ($title) { ?>
      <div class="titulo-contenido">
        <?php print render($title_prefix); ?>
        <?php if ($page): ?>
          <h2<?php print $title_attributes; ?> >
            <?php print $title; ?>
          </h2>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
      </div>
    <?php } ?>

    <?php print render($page['help']); ?>

    <?php print render($page['content']); ?>

    <?php print $feed_icons; ?>

  </div>

  <div id="contenedor-bloques-interior">
    <?php print render($page['content_bloques']); ?>
  </div>

</div>
<div class='cleared'></div>
<!-- Footer -->
<div id="footer-relleno">
  <div id="footer-new"> 
    <div id="footer-inside">

      <!--      <div class="footer-separador"></div>-->
<div class="separador-vertical first"></div>
      <div class="footer-area first">
        <?php print render($page['footer_first']); ?>
      </div><!-- EOF: .footer-area -->

      <!--      <div class="footer-separador"></div>-->
<div class="separador-vertical second"></div>
      <div class="footer-area second">
        <?php print render($page['footer_second']); ?>
      </div><!-- EOF: .footer-area -->

      <!--      <div class="footer-separador"></div>-->
<div class="separador-vertical third"></div>
      <div class="footer-area third">
        <?php print render($page['footer_third']); ?>
      </div><!-- EOF: .footer-area -->
      <!--      
            <div class="footer-separador"></div>-->
<div class="separador-vertical forth"></div>
      <div class="footer-area forth">
        <?php print render($page['footer_forth']); ?>
      </div><!-- EOF: .footer-area -->
<div class="separador-vertical fifth"></div>
      <div class="footer-area fifth">
        <?php print render($page['footer_fifth']); ?>
      </div><!-- EOF: .footer-area -->
<div class="separador-vertical last"></div>
      <div class="cleared"> </div>

      <div class="footer-texto"> 
        <span class="footer-texto-texto">Facultad 1 | Universidad de las Ciencias Informáticas. Copyright &copy; 2012 - Todos los derechos reservados.</span>
        <img src="<?php print base_path() . drupal_get_path('theme', 'portal'); ?>/images/subir_scroll.png"/>
        <span class="footer-texto-subir"><a href="#">Subir</a></span>
      </div>

    </div><!-- EOF: #footer-inside -->
  </div><!-- EOF: #footer -->
</div>
