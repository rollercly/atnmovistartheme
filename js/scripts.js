jQuery(document).ready(function() {
	/* Hacer menú fixed y que cambien estilos*/
	(function() {
		window.onscroll = function() {scrollFunction()};
		var menuSup = document.getElementById("bqtopbar");
		var navegacion = document.getElementById("navegacion");
		function scrollFunction() {
		  if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
			navegacion.style.height = "60px";
			menuSup.style.position = "absolute";
			menuSup.style.top = "-9999px";
			menuSup.style.left = "-9999px";
			jQuery('div[class*="subpaginas"]').css("top", "59px");
			jQuery(".cabeceraProducto").css("top", "60px");
		  } else {
			menuSup.style.position = "unset";
			jQuery('div[class*="subpaginas"]').css("top", "124px");
			if(jQuery(window).width() < 767) { 
				navegacion.style.height = "70px";
			} else if (jQuery(window).width() > 767 && jQuery(window).width() < 1199) {
				navegacion.style.height = "90px";
				jQuery(".cabeceraProducto").css("top", "90px");
			} else if (jQuery(window).width() > 1199) {
				navegacion.style.height = "90px";
				jQuery(".cabeceraProducto").css("top", "125px");
			} 
		  }
		}
	})();
	/* Desplegable mapaWeb footer*/  
	(function() {
		jQuery(".footer-large__title").click(function(){
			jQuery(this).toggleClass("active");
			jQuery(this).next().toggleClass("active");
		});
	})();
	/*Botonoes mañana/tarde modal contratar*/
	(function() {
		jQuery("#recibirLlamadaCntc > div > input, #recibirLlamadaCntr > div > input").click(function(){
			if (!jQuery(this).hasClass('activo')) {
				jQuery(this).toggleClass("activo");
				jQuery(this).parent().siblings().children().toggleClass("activo");
			}
		});
	})();
	/* Mostrar/esconder el menú al pinchar en la hamburguesa */
	(function() {
		jQuery("#navigationButton").click(function(){
			jQuery(this).parents("body").toggleClass("contraerBody");
			jQuery(this).parents("#navegacion").next().toggleClass("expanderNav");
		});
	})();
	/* Mostrar/esconder el menú al pinchar fuera de la hamburguesa */
	(function() {
		jQuery("#cerrarMenu").click(function(){
			jQuery(this).parents("body").toggleClass("contraerBody");
			jQuery(this).parents("#navegacionN2").toggleClass("expanderNav");
		});
		jQuery(".select-label").click(function(){
			jQuery(this).next().addClass("active");
		});
	})();
	/* Pasar del primer nivel de páginas al siguiente nivel en el menú hamburguesa */
	(function() {
		jQuery(".primerNivelN2 nav li").click(function(){
			var clasesPag = jQuery(this).attr('class');
			var claseSplit = clasesPag.split("-");
			var indice = parseInt(claseSplit[1].charAt(0));
			jQuery(this).parents(".primerNivelN2").addClass("inactivo");
			jQuery(this).parents(".primerNivelN2").siblings(".subNivel-"+indice).addClass("activo");
		});
	})();
	/* Ocultar el 2ndo nivel del menú hamburgersa y mostrar el primero */
	(function() {
		jQuery(".paginaPrimerN").click(function(){
			jQuery(this).parent().removeClass("activo");
			jQuery(this).parent().siblings(".primerNivelN2").removeClass("inactivo");
		});
	})();
	/* Slider aplicaciones*/
	/*(function() {
		jQuery( ".slider > .slide" ).each(function( index ) {
			var numItems = jQuery(this).find('.card-item').length;
			var indice = 1;
			if(numItems == 3) {
				jQuery(this).find(".owl-stage-outer").addClass("trio");
			} else if (numItems == 2){
				jQuery(this).find(".owl-stage-outer").addClass("duo")
			} else if (numItems == 1){
				jQuery(this).find(".owl-stage-outer").addClass("solitario")
			}
			
			
			
		});
	})();
	*/
	(function() {
		jQuery( ".mistarjeteros" ).each(function( index ) {
		    var numItems = jQuery(this).find('.card-item').length;
		    var indice = 1;
		    if(numItems == 3) {
		    	jQuery(this).find(".owl-stage-outer").addClass("trio");
		    } else if (numItems == 2){
		    	jQuery(this).find(".owl-stage-outer").addClass("duo")
		    } else if (numItems == 1){
		    	jQuery(this).find(".owl-stage-outer").addClass("solitario")
		    }
		    
		    
			
		});
	})();
	/****** Mostrar el slider con la pestaña correspondiente *******/
	(function() {

		jQuery(".tabsApps li").click(function(){
			jQuery(this).addClass("active");
			jQuery(this).siblings().removeClass("active");
			var idTab = jQuery(this).attr('id');
			
			//debug
			console.log("idTab n:" + idTab);
			
			var idTabSplit = idTab.split("-");
			var indiceTab= idTabSplit[1];
			
			jQuery(this).parents(".sliderpadre").find(".slide").removeClass("active");
			jQuery(this).parents(".sliderpadre").find("#opcionesSlider-"+indiceTab).addClass("active");
			
			
		});
	})();
	/****** OWL plugin *******/
	
	(function() {
		jQuery(".owl-carousel").owlCarousel({
			center: false,
			loop: false,
			dots: true,
			nav: true,
			autoWidth: true,
			items: 1,
		});		
	})();
	
	/****** Cambiar pestaña activa menú ficha de producto *****/
	(function() {
		jQuery(".cabeceraProducto ul li").click(function() {
			jQuery(this).addClass("active");
			jQuery(this).siblings().removeClass("active");
		});
	})();	
	
	
});
