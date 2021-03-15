(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.modal').modal();
	$(".dropdown-button").dropdown();
    $('.scrollspy').scrollSpy();
    $('select').material_select();
    $('.slider').slider();
    $('.parallax').parallax();
	$('.datepicker').pickadate({  
  		today: 'Hoy',
		clear: 'Limpiar',
		close: 'Listo',
		format: 'dd/mm/yyyy',
	
  });

  }); // end of document ready
})(jQuery); // end of jQuery name space
