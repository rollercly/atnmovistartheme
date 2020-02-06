<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	
	<header id="masthead" class="site-header navbar-static-top <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">
    
    	<div id="bqtopbar" class="navbar">
    		<div class="container">
        		<?php dynamic_sidebar( 'bqtopbar' ); ?>
    		</div>
    	</div>
        
    	
          
    	<div id="navegacion">
            <div class="container">
            	<div class="row">
            		
        			<div class="logo">
                    	<?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                            <a href="<?php echo esc_url( home_url( '/' )); ?>">
                                <picture>
                                	<?php 
//                                 	$imagen = get_theme_file_uri( 'images/movistar-verde.svg' );
//                                 	$imagen = get_template_directory_uri( 'images/movistar-verde.svg' );
                                	$imagen = get_stylesheet_directory_uri(  );
//                                 	echo "<img src='$imagen' /><br>";
                                	?>

        							<source media="(min-width: 768px)" srcset="<?php echo $imagen."/imagenes/movistar-verde.svg";?>">
                                    <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
        			
	    						</picture>
                            </a>
                        <?php else : ?>
                            <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                        <?php endif; ?>
                	</div>
        		
        		
        			<nav class="navbar navbar-expand-xl p-0">                       
                        <?php
                                /*
                                 * Comprobar si estamos en modo administrador o no
                                 */
                                	// Argumentos opcionales para mostrar un menú
                            	$args = array(
                                	'theme_location'   =>      'primary',	// Esto se verá más adelante, la posición debe estar registrada con register_nav_menu para poder seleccionarla.
                                	'menu'             =>      '',				// Acepta, en este orden, id, slug o nombre del menú a mostrar.
                                	'container'        =>      'div',		// Dentro de qué elemento se engloba el menú. Admite div y nav. Para no englobarlo en nada, usar false.
                                 	'container-class'  =>      'subpaginas',	// Atributo class del container establecido antes.
                                	'container-id'     =>      '',		// Atributo id del container establecido antes.
//                                 	'menu_class'       =>      'menu',	// Atributo class del elemento ul que engloba al menú. Es posible establecer múltiples clases separadas por espacios.
//                                 	'menu_id'          =>      'menprincipal',			// Atributo id del elemento ul que engloba al menú. Por defecto será menu-{menu slug}.
                                	'echo'             =>      true,			// Si lo que queremos es guardar el menú en una variable, establecemos este valor en 0.
                                	'fallback_cb'      =>      'wp_page_menu',	// ¿Qué pasa si el menú que estamos definiendo no existe? Que la función aquí definida se llamará. Por defecto, wp_page_menu. false para no llamar a nada.
                                	'before'           =>      '',			// Texto antes del <a>
                                	'after'            =>      '',			// Texto después del </a>
                                	'link_before'      =>      '',		// Texto antes del texto del enlace
                                	'link_after'       =>      '',		// Texto después del texto del enlace
                                	'items_wrap'       =>      '<ul id="%1$s" class="%2$s">%3$s</ul>',	
    															// Formato de la cadena de una expresión con sprintf. Incorpora otros parámetros: %1$s es el valor de 'menu_id", %2$s es el valor de 'menu_class", y %3$s el valor de la lista de items. Podemos omitir un token para que no aparezca.
                                	'depth'            =>      0,				// Niveles de jerarquía incluidos en el menú. Por defecto, 0, que implica a todos los submenús. -1 rompe la jerarquía y muestra todos los menús y submenús en un menú simple no jerárquico.
//                                 	'walker'           =>      new wp_bootstrap_navwalker()			// Objeto walker a usar (debe ser un objeto, no un string)
                            	   'walker'            =>      new WP_Movistar_Walker2()			// Objeto walker a usar (debe ser un objeto, no un string)
                            	);
                            	wp_nav_menu($args);	// Llamamos al menú
                            
                            ?>
        
                    </nav>
        		
        		
        			<div class="navDcha">
        				<button data-toggle="modal" data-target="#modalContacto">Contacto</button>      
        				<img id="navigationButton" src="<?php echo get_theme_file_uri( 'imagenes/navegacion.svg');?>" alt="Botón hamburguesa para navegar"/>		
        				
        			</div>
            		
            	</div>
            	
                
                
            </div>
        </div>
        <?php 
        menupersonalizaado("menu principal");
        ?>

		<!-- Menú navegación -->
        
	</header>
	     
   <!-- Modal Formulario contacto -->
		<div class="modal fade" id="modalContacto" tabindex="-1" role="dialog" aria-labelledby="modalContacto" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-body text-center">
		      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <i class="fas fa-times" aria-hidden="true"></i>
		        </button>
		      	<h5 class="modal-title titformodal" id="exampleModalCenterTitle">Solicita una llamada</h5>
				<p>Déjanos tus datos para ponernos en contacto contigo o si lo prefieres llámanos al <a title="Contacta con nosotros" href="tel:0992765812" class="teltxtpiecontacta">0992765812</a></p>			      	 
		      	<form>
					<div id="recibirLlamadaCntc">
						<div id="btmanianaCntc">
							<input class="btn text-center activo" type="button" value="Por la mañana">
						</div>
						<div id="btardeCntc">
							<input class="btn text-center" type="button" value="Por la tarde">
						</div>
					</div>
					<div class="form-group" id="nombreUsuarioCntc">
						<label class="d-none" for="nombreCntc">Indícanos tu nombre</label>
						<input class="form-control inputformmodal" id="nombreCntc" placeholder="Indícanos tu nombre" type="text">
					</div>
					<div class="form-group" id="telefonoUsuarioCntc">
						<label class="d-none" for="numeroCntc">Introduce tu número de teléfono</label>
						<input class="form-control inputformmodal" id="numeroCntc" placeholder="Introduce tu número de teléfono" type="text">
					</div>
					<div class="custom-control custom-checkbox" id="aceptarPrivacidadCntc">
						<input class="custom-control-input" id="checkCntc" type="checkbox">
						<label class="custom-control-label" for="checkCntc">Acepto la <a href="#" title="política de privacidad"><span class="enlace">política de privacidad</span></a></label>
					</div>
					<button id="programarLlamadaCntc" type="submit">Programar llamada</button>
				</form>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Modal Formulario contacto -->
		
		<!-- Modal Formulario contratacion: Al pinchar en el botón lo quiero de cada ficha del slider se mostrará una modal por cada uno -->
		<div class="modal fade" id="modalContratacion" tabindex="-1" role="dialog" aria-labelledby="modalContratacion" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <i class="fas fa-times" aria-hidden="true"></i>
		        </button>
				<p>Estoy interesado/a en:</p>
				<div class="detalleModalProducto">
					<span>Office 365 - Business Premium</span>
					<p>$12,50 usuario/mes (impuestos no incluidos)</p>
				</div>			      	 
		      	<form>
					<div id="recibirLlamadaCntr">
						<div id="btmanianaCntr">
							<input class="btn text-center activo" type="button" value="Por la mañana">
						</div>
						<div id="btardeCntr">
							<input class="btn text-center" type="button" value="Por la tarde">
						</div>
					</div>
					<div class="form-group" id="nombreUsuarioCntr">
						<label class="d-none" for="nombreCntr">Indícanos tu nombre</label>
						<input class="form-control inputformmodal" id="nombreCntr" placeholder="Indícanos tu nombre" type="text">
					</div>
					<div class="form-group" id="telefonoUsuarioCntr">
						<label class="d-none" for="numeroCntr">Introduce tu número de teléfono</label>
						<input class="form-control inputformmodal" id="numeroCntr" placeholder="Introduce tu número de teléfono" type="text">
					</div>
					<div class="custom-control custom-checkbox" id="aceptarPrivacidadCntr">
						<input class="custom-control-input" id="checkCntr" type="checkbox">
						<label class="custom-control-label" for="checkCntr">Acepto la <a href="#" title="Política de privacidad"><span class="enlace">política de privacidad</span></a></label>
					</div>
					<button id="programarLlamadaCntr" type="submit">Programar llamada</button>
				</form>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Modal Formulario contratacion -->
		  
		  
	<!-- #masthead -->
    <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
        <div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
            <div class="container">
                <h1>
                    <?php
                    if(get_theme_mod( 'header_banner_title_setting' )){
                        echo get_theme_mod( 'header_banner_title_setting' );
                    }else{
                        echo 'WordPress + Bootstrap';
                    }
                    ?>
                </h1>
                <p>
                    <?php
                    if(get_theme_mod( 'header_banner_tagline_setting' )){
                        echo get_theme_mod( 'header_banner_tagline_setting' );
                }else{
                        echo esc_html__('To customize the contents of this header banner and other elements of your site, go to Dashboard > Appearance > Customize','wp-bootstrap-starter');
                    }
                    ?>
                </p>
                <a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
            </div>
        </div>
    <?php endif; ?>
	<div id="content" class="site-content">
		<div class="">
			<div class="">
                <?php endif; ?>