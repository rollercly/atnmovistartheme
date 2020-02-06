<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>

	<footer>
            	
    	<div id="bqmifooter" class="">
 			<?php dynamic_sidebar( 'bqbottomfooter1' );?>
    	</div>
    	 <?php 

        if ( has_nav_menu( 'sidebarmenu2' ) ) {
             
    //         wp_nav_menu( array( 'subpaginas' => 'menu mapa web' ) );
            $args = array(
                'theme_location'   =>      'bqbottomfooter2',	// Esto se verá más adelante, la posición debe estar registrada con register_nav_menu para poder seleccionarla.
                'menu'             =>      'menumapaweb',				// Acepta, en este orden, id, slug o nombre del menú a mostrar.
                'container'        =>      'div',		// Dentro de qué elemento se engloba el menú. Admite div y nav. Para no englobarlo en nada, usar false.
                'container-class'  =>      'subpaginas',	// Atributo class del container establecido antes.
                'container-id'     =>      '',		// Atributo id del container establecido antes.
                'menu_class'       =>      'footer-large-links',	// Atributo class del elemento ul que engloba al menú. Es posible establecer múltiples clases separadas por espacios.
                'menu_id'          =>      '',			// Atributo id del elemento ul que engloba al menú. Por defecto será menu-{menu slug}.
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
                'walker'            =>      new WP_Movistar_Menu_Footer()			// Objeto walker a usar (debe ser un objeto, no un string)
            );
            echo '<div id="footermapasitio">
                        <div class="container-fluid">
    					   <div class="row justify-content-between">				
    					       <div class="col-12">
                                   ';
            wp_nav_menu($args);
            echo '       
                                          </div>
                                    </div>
                             </div>
                        </div>
                    
                       ';
           } 
        ?>
    	<div id="bqmifooter2" class="">
    		<?php dynamic_sidebar( 'bqbottomfooter2' );?>
    	</div>
    		
            	
	</footer>
	

<?php endif; ?>
</div>
<!-- #page -->

<?php wp_footer(); ?>
</body>
</html>