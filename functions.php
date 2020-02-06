<?php


/*
 * Añadimos funcion para cargar css style y base
 */

function enqueue_styles_child_theme() {

	$parent_style = 'wp-bootstrap-starter-style';
	$child_style  = 'wp-bootstrap-starter-child01-style';

// 	wp_enqueue_style( $parent_style,
// 				get_template_directory_uri() . '/style.css' );

	wp_enqueue_style( 'base', 
				get_stylesheet_directory_uri() . '/css/base.css',
				false,
				'1.0',
				'all');
	
	wp_enqueue_style( 'ajustes', 
				get_stylesheet_directory_uri() . '/css/ajustes.css',
				false,
				'1.0',
				'all');
	
	wp_enqueue_style( 'owlcarousel', 
				get_stylesheet_directory_uri() . '/css/owl.carousel.min.css',
				false,
				'1.0',
				'all');
	
	wp_enqueue_style( 'owlthemecarousel', 
				get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css',
				false,
				'1.0',
				'all');
	
	wp_enqueue_style( $child_style,
				get_stylesheet_directory_uri() . '/style.css',
				array( $parent_style ),
				wp_get_theme()->get('Version')
				);
	

}
//CArgamos css indicando número de prioridad, en el último parámetro
add_action( 'wp_enqueue_scripts', 'enqueue_styles_child_theme',20 );


/*
 * Añadimos liberías javascript
 */
function dcms_insertar_js(){
//     wp_deregister_script('jquery');
//     wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false, '');
//     wp_enqueue_script('jquery');
    
    wp_register_script('scripts', get_stylesheet_directory_uri(). '/js/scripts.js', array('jquery'), '1', false );
    wp_enqueue_script('scripts');
    
    wp_enqueue_script( 'owlcarousel', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array ( 'jquery' ), '1', false);
    wp_enqueue_script('owlcarousel');
    
    wp_enqueue_script( 'picturefill', get_stylesheet_directory_uri() . '/js/picturefill.min.js', array ( 'jquery' ), '1', false);
    wp_enqueue_script('picturefill');
    
    
}
add_action("wp_enqueue_scripts", "dcms_insertar_js");

/*
 * Función para poder subir ficheros SVG a la biblioteca de WORDPRESS
*/
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


/*
 * Crear zona nueva de widgets
 */
function dcms_agregar_nueva_zona_widgets() {
    
    register_sidebar( array(
        'name'          => 'Zona topbar',
        'id'            => 'bqtopbar',
        'description'   => 'Descripción de la nueva Zona: bqtopbar',
        'before_widget' => '<div class="bqsupertobpar">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    
    
    register_sidebar( array(
        'name'          => 'Zona bottombar1',
        'id'            => 'bqbottomfooter1',
        'description'   => 'Descripción de la nueva Zona: bqbottomfooter1',
        'before_widget' => '<div class="bqsuperbottompar1">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
        'name'          => 'Zona bottombar2',
        'id'            => 'bqbottomfooter2',
        'description'   => 'Descripción de la nueva Zona: bqbottomfooter2',
        'before_widget' => '<div class="bqsuperbottompar2">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    
    
    
}
add_action( 'widgets_init', 'dcms_agregar_nueva_zona_widgets' );

/*
 * Borrar sidebar
 */
function borrar_sidebar() {
    unregister_sidebar('sidebar-1');
    unregister_sidebar('footer-1');
    unregister_sidebar('footer-2');
    unregister_sidebar('footer-3');
}
add_action ('widgets_init', 'borrar_sidebar', 11);


/*
 * Crear un menú personalizado
 */
class WP_Movistar_Walker2 extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

               
        if ( array_search( 'menu-item-has-children', $item->classes ) ) {
            if ($depth == 0){
                 $output .= sprintf( "\n<li class='primerNivel %s profundidad".$depth."'><a href='%s' class=\"bla\" data-toggle=\"\" >%s</a>\n", ( array_search( 'current-menu-item', $item->classes ) || array_search( 'current-page-parent', $item->classes ) ) ? 'active' : '', $item->url, $item->title.'<i class="fas fa-angle-down"></i>' );
//                  $output .= sprintf( "\n<li class='primerNivel %s profundidad".$depth."'><span class=\"bla\" data-toggle=\"\" >%s</span>\n", ( array_search( 'current-menu-item', $item->classes ) || array_search( 'current-page-parent', $item->classes ) ) ? 'active' : '', $item->title.'<i class="fas fa-angle-down"></i>' );
            }else{
//                 $output .= sprintf( "\n<li class='%s text-left profundidad".$depth."'><a href='%s' class=\"\" data-toggle=\"\" >%s</a>\n", ( array_search( 'current-menu-item', $item->classes ) || array_search( 'current-page-parent', $item->classes ) ) ? 'active' : '', $item->url, $item->title.'<i class="fas fa-angle-down"></i>' );            
//                 $output .= sprintf( "\n<li class='%s text-left profundidad".$depth."'><a href='%s' class=\"\" data-toggle=\"\" >%s</a>\n", ( array_search( 'current-menu-item', $item->classes ) || array_search( 'current-page-parent', $item->classes ) ) ? 'active' : '', $item->url, $item->title );            
                $output .= sprintf( "\n<li class='%s text-left profundidad".$depth."'><span class=\"\" data-toggle=\"\" >%s</span>\n", ( array_search( 'current-menu-item', $item->classes ) || array_search( 'current-page-parent', $item->classes ) ) ? 'active' : '', $item->title );            
            }
        } else {
            $output .= sprintf( "\n<li %s><a href='%s'>%s</a>\n", ( array_search( 'current-menu-item', $item->classes) ) ? ' class="active"' : '', $item->url, $item->title );
        }
    }
    
    /**
     * Ends the element output, if needed.
     *
     * @since 3.0.0
     *
     * @see Walker::end_el()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param WP_Post  $item   Page data object. Not used.
     * @param int      $depth  Depth of page. Not Used.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $output .= "</li>{$n}";
    }
    
    /**
     * Starts the list before the elements are added.
     *
     * @since 3.0.0
     *
     * @see Walker::start_lvl()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );
        
        // Default class.
        $classes = array( 'sub-menu' );
        
        /**
         * Filters the CSS class(es) applied to a menu list element.
         *
         * @since 4.8.0
         *
         * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
         * @param stdClass $args    An object of `wp_nav_menu()` arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        
        //         echo"<pre>";
        //         echo"valores:<br>";
        //         print_r($depth);
        //         echo"</pre>";
        //         $valor="primerNivel-".$item->menu_order;
        if (current_user_can( 'edit_posts' )){
//         if ( ! is_admin() ) {
            $clasefondo = "subpaginasadmin";
        } else {
            $clasefondo = "subpaginas";
        }
        if ($depth == 0){
//             $output .= "<div class='subpaginas-1 text-center profundidad".$depth."'>{$n}{$indent}<ul$class_names>{$n}";
            $output .= "<div class='".$clasefondo." text-center profundidad".$depth."'>{$n}{$indent}<ul$class_names>{$n}";
        }else{
            $output .= "<div class='profundidad".$depth."'>{$n}{$indent}<div class='text-left'><ul$class_names>{$n}";
        }
       
    }
    
    /**
     * Ends the list of after the elements are added.
     *
     * @since 3.0.0
     *
     * @see Walker::end_lvl()
     *
     * @param string   $output Used to append additional content (passed by reference).
     * @param int      $depth  Depth of menu item. Used for padding.
     * @param stdClass $args   An object of wp_nav_menu() arguments.
     */
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent  = str_repeat( $t, $depth );
        if ($depth == 0){
            $output .= "$indent</ul>{$n}</div>";
        }else{
            $output .= "$indent</ul></div>{$n}</div>";
            
        }
    }
    
}


class WP_Movistar_Menu_Footer extends Walker_Nav_Menu {
    // Start level, beginning tags
    function start_lvl( &$output, $depth = 0, $args = null )   {
//         echo "<pre>";
//         var_dump($output);
//         echo "</pre>";
        
//         echo "<pre>";
//         var_dump($args);
//         echo "</pre>";
        
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $output .= "\n$indent";
        $output .= '<ul class="collapsible-body">';
        
    }
    
    function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $output .= "$indent</ul>";
        
    }
    
    // Start element (beginning list items)
    function start_el( &$output, $item, $depth=0, $args=array(),$current_object_id=0 ) {
        $this->curItem = $item;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        $atts['slug']   = ! empty( $item->slug )        ? $item->slug      : '';
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
        $attributes = '';
        $item_output = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        
        // Check if it is a submenu
        if ( $depth == 1 ) {
            $output .= '<li><a'. $attributes. ' >';
            $output .= apply_filters( 'the_title', $item->title, $item->ID );
            $output .= '</a></li>';
            
        } elseif ( $depth == 0 ) {
            $item_output .= '<li class="footer-large-links-block"><div class="collapsible-header">';
//             $item_output .= '<a'. $attributes. '>';
//             $item_output .= apply_filters( 'the_title', $item->title, $item->ID );
//             $item_output .= '</a>';
            
            $item_output .= '<div class="footer-large__title"><span>';
            $item_output .= apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= '<i class="fas fa-angle-down" aria-hidden="true"></i>';
            $item_output .= '</span></div>';
        }
        
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $n = '';
        } else {
            $n = "\n";
        }
        if ( $depth == 0 ) {
            $output .= "</span></div>{$n}";
        } else {
            $output .= "{$n}";
        }
    }

}

function menupersonalizaado($nombremenu){
    $valoradevolver = "";
    $n = 1;
    
    
    $items = wp_get_nav_menu_items($nombremenu);
    if( !empty( $items ) ){
//         echo "<pre>";
//         var_dump($items);
//         echo "</pre>";
// die();
        $mennav1start = "<div id='navegacionN2'>";
        $mennav1start .='<div class="primerNivelN2">
                            <div class="subNavHeader">
                                <div class="select-label">Soluciones digitales para tu negocio <i class="fas fa-angle-down"></i></div>
                                    <div class="select-wrap">
                                        <ul class="select">
                                            <li><a href="#" title="Soluciones digitales para tu negocio">Soluciones digitales para tu negocio</a></li>
                                            <li><a href="#" title="Centro de aprendizaje">Centro de aprendizaje</a></li>
                                        </ul>
                                    </div>
                                </div>
                              ';
        $mennav1start .="<nav><ul>";
        $subnivel = "";
        
        
        foreach ( $items as $item ){


            
            $id = $item->ID;
            $url = $item->url;
            $titulo = $item->title;
            $menuitemparent = $item->menu_item_parent;
            $menu_order = $item->menu_order;
            
            
            /*
             * Para debuggeo personal
             */  
            
//             echo "id:".$id."<br>";
//             echo "menuitemparent:".$menuitemparent."<br>";
//             echo "titulo:".$titulo."<br>";
//             echo "url:".$url."<br>";
//             echo "order:".$menu_order."<br>";
//             echo "<br><br>";
             
            if ($menuitemparent == 0){
                if ($menu_order != 1){
                    //cerramos ul
                    $subnivel .= '</ul></div>';
                }
                $valoradevolver .="<li class='subMenuItem-".$n."'><span>".$titulo."<i class='fas fa-angle-right' aria-hidden='true'></i></span></li>";
                //guardamos el id del padre
                $subnivel .= '<div class="subNivel-'.$n.'">';
                $subnivel .= '  <div class="paginaPrimerN">
                                       <span>
                                            <img src="'.get_theme_file_uri( 'imagenes/backBurger.svg').'" alt="">
                                            <span>'.$titulo.'</span>
                                        </span>
        						</div>
        					';
                $subnivel .= '<ul class="paginasHijas">';

                $n++;
            }else{
                if ($url == "#nada"){
                    
                }else{
                    //montamos el submenu de subNivel-n              
                    $subnivel .= '<li><a href="'.$url.'" title="'.$titulo.'">'.$titulo.'<i class="fas fa-angle-right" aria-hidden="true"></i></a></li>';                        
                    
                }
  
            }
        }
        //cerramos la última ul de los elementos de submenu
        $subnivel .= '</ul></div>
                        <div id="cerrarMenu"></div>';
        
        //cerramos el nav principal del menú principal
        $mennav1end = "</ul></nav>";
        
        $mennav1end .= '<div class="subNavFooter">
    					<a href="" title="Ir a mi Panel de Control">Ir a mi Panel de Control<i class="fas fa-angle-right" aria-hidden="true"></i></a>
    				</div>';
        $mennav1end .= "</div>";
    }
    $valoradevolver =$mennav1start.$valoradevolver.$mennav1end;
    $valoradevolver .=$subnivel;
    echo $valoradevolver;
}

/**
 * Llamamos una instactia del plugin
 */
ATN_Elementor_Componentes::get_instance();



// Resgirstramos menus en el theme, con el nombre "Menu footer", en el theme "Movistar ATN".
register_nav_menus( array(
    'sidebarmenu1' => __( 'Menu footer1', 'Movistar ATN' ),
    'sidebarmenu2' => __( 'Menu footer2', 'Movistar ATN' ),
    
) );