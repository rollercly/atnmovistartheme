<?php
/* Template Name: Página Informe Recomendador */

get_header(); ?>
	<section id="primary" class="content-area paddingFixed">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->
	<p>hola está es la página del informe del recomendador</p>
	<?php 
	echo "<P>NOMBRE:".$_GET["nombre"]."</P>";
	echo "<P>email:".$_GET["email"]."</P>";
	echo "kk";

	?>
	

<?php
get_sidebar();
get_footer();
