<?php
global $user;
?>
<!-- Header. -->
<div id="header">

  <!--  <div id="relleno_izq"></div>-->
  <div id="header-inside">
    <div id="top_menu">
      <div id="fecha"><?php print format_date(time(), 'custom', "l\, j \d\e F \d\e Y", null, 'es'); ?></div>
      <div id="top_links">
        <?php
        global $user;
        if (!$user->uid) {
          ?>

          <div id="login"><img src="<?php print base_path() . drupal_get_path('theme', 'portal'); ?>/images/login.png"/><a href="#user-login" id="login1">Autenticación</a></div>
          <div id="login-formulario">
            <?php
            // Change the following line's text to whatever you want.
            print drupal_render(drupal_get_form('user_login'));
            ?>
            <div id="cerrar-login">
              <a href="#principal" id="lcerrar">cancelar</a>
            </div>
          </div>

          <?php
        }
        elseif ($user->uid) {
          // The following line will display the username you are logged in as.
          ?>   <div id="login-datos">
            <div class="user">
              <?php print $user->name; ?> 
            </div>
            <div class="cerrar">
              <a href="<?php print base_path(); ?>/user/logout" id="login">cerrar sesión</a>
            </div>
          </div>
        <?php } ?> 

        <li><div id="buscar"><div style="margin-top: 3px;"><img class="img_buscar" src="<?php print base_path() . drupal_get_path('theme', 'portal'); ?>/images/buscar.png"/><a href="#search_form" id="buscar1">Buscar</a></div></div></li>

        <div id="formulario-search"><?php print drupal_render(drupal_get_form('search_block_form')); ?>

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


  </div><!-- EOF: #header-inside -->
  <!--  <div id="relleno_der"></div>-->
  <div id="logo">
    <a href="<?php print base_path(); ?>"><img src="<?php print base_path() . drupal_get_path('theme', 'portal'); ?>/images/logo.png"/></a>
  </div>
  <div id="fac1">
    <img src="<?php print base_path() . drupal_get_path('theme', 'portal'); ?>/images/fac1.png"/>
  </div>


</div><!-- EOF: EOF: #header -->

<!--<div id="contenido">
<?php //print render($page['content']);      ?>
</div>-->

<div id="main">
  <p class="noti">Noticias en Portada</p>
  <div id="noticias">
    <div id="not_principal">
      <?php print render($page['principal']); ?>
    </div>
    <div id="secundarias">
      <?php print render($page['secundarias']); ?>
    </div>
    <div class="cleared"></div>
  </div>

  <div id="primera">
    <div class="cabecera">
      <div class="centrar">Avisos</div>
      <div class="centrar">Actividades y Efemérides</div>
      <div class="centrar">Menú del Comedor</div>
    </div>
    <div class="contenedor">
      <div class="izda">
        <div id="avisos">
          <?php print render($page['avisos']); ?>
        </div>
      </div>
      <div class="izda">
        <div id="efemerides">
          <?php print render($page['efemerides']); ?>
        </div>
        <div class="more-link-efe">
          <a href="efemerides-hoy">Ver Efemérides de Hoy</a>
        </div>
      </div>
      <div class="der">
        <div id="comedor">
          <?php print render($page['comedor']); ?>
        </div>
      </div>
    </div>
    <div class="sombra_modular"></div>
  </div>


  <div class="cleared"></div>

  <div id="segunda">
    <div class="cabecera">
      <div class="centrar">Columnas Temáticas</div>
    </div>
    <div class="contenedor">
      <div id="columnas">
        <div id="columnas-header">
          <?php print render($page['columnas_header']); ?>
        </div>
        <!--        <div class="cleared"></div>
                <div id="columnas-body">
        <?php //print render($page['columnas_body']);    ?>
                </div>-->
      </div>
    </div>

    <div class="cleared"></div>
    <div class="sombra_modular"></div>

    <div class="cleared"></div>

    <div id="tercera">
      <div id="fon_objetos" class="izda">
        <div class="centro">Objetos Perdidos</div>
        <div id="objetos">
          <?php print render($page['objetos']); ?>
        </div>
      </div>
      <div id="fon_cumples" class="izda">
        <div class="centro">Cumples de Hoy</div>
        <div id="cumples">
          <?php print render($page['cumples']); ?>
        </div>
      </div>
      <div id="fon_secciones" class="izda">
        <div class="centro">Encuestas</div>
        <div id="secciones">
          <?php print render($page['secciones']); ?>
        </div>
      </div>
    </div>

    <div class="cleared"></div>

    <div id="cuarta">
      <div class="cabecera">
        <div class="centrar">Lo Último en Galería</div>
        <div class="centrar">Galería de Imágenes</div>
        <div class="centrar">Video Portada</div>
      </div>
      <div class="contenedor">
        <div class="izda">
          <div id="ultimo">

            <span>
              <?php print render($page['ultimo']); ?>
            </span>
            <img class="nuevo" src="<?php print base_path() . drupal_get_path('theme', 'portal'); ?>/images/nuevo.png"/>
          </div>
        </div>
        <div class="izda">
          <div id="galeria">
            <?php print render($page['galeria']); ?>
          </div>
        </div>
        <div class="der">
          <div id="video">
<!--            <img src="<?php print base_path() . drupal_get_path('theme', 'portal'); ?>/images/video.png"/>-->
            <?php print render($page['video']); ?>
          </div>
        </div>
      </div>
    </div>

    <div class="cleared"></div>
    <div class="sombra_modular"></div>
  </div>
</div>

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

