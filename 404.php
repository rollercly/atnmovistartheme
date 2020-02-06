<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
	<div class="paginaError paddingFixed"> 
		<div class="container">
			<h1 class="tituloCabecera"><span>¡Ups!</span> No hemos encontrado la página que buscabas</h1>
			<p>A continuación elige a dónde quieres ir</p>
			<ul>
				<li class="bloqueError">
					<a href="javascript:history.back();" title="Volver atrás">
						<?php $imagen = get_theme_file_uri( 'imagenes/flecha-error.svg' );?>
						<img src="<?php echo $imagen;?>" alt="volver atrás" title="Volver atrás" />
						<span>Volver atrás</span>
					</a>
				</li>
				<li class="bloqueError">
					<a href="/" title="Ir la página de inicio">
						<?php $imagen = get_theme_file_uri( 'imagenes/pag-inicio.svg' );?>
						<img src="<?php echo $imagen;?>" alt="Ir la página de inicio" title="Ir la página de inicio" />
						<span>Ir la página de inicio</span>
					</a>
				</li>
				<li class="bloqueError">
					<a href="/contacto" title="Contacta con nosotros">
					
						<?php $imagen = get_theme_file_uri( 'imagenes/atencion-cliente.svg' );?>
						<img src="<?php echo $imagen;?>" alt="Contacta con nosotros" title="Contacta con nosotros" />
						<span>Contacta con nosotros</span>
					</a>
				</li>
			</ul>	
		</div>		
	</div>
<?php
get_sidebar();
get_footer();
