jQuery(document).ready(function($) {
    
    $("#buscar").click(function() {
        $("#formulario-search").show();
        $("#formulario1-search").show();
        $("#search-block-form").show();
        $("#cerrar-search").show();

        $("#user-login").hide();
        $("#login").hide();
        $(".user").hide();
        $("#cerrar-login").hide();

        $(this).hide();
    });
	
    $("#edit-submit").click(function() {		
        $("#login").show();
        $("#buscar").show();
        $("#formulario-search").hide();
        $("#cerrar-search").hide();
        $("#cerrar-login").hide();
    }); 
                
    $('.form-submit').click(function() {	
        $("#formulario-search").hide();
        $("#cerrar-search").hide();
    });
    
    $("#lcerrar").click(function() {
        $("#login").show();
        $("#user-login").hide();
        $("#cerrar-login").hide();
    });
    
    $("#bcerrar").click(function() {
        $("#buscar").show();
        $("#login").show();
        $(".user").show();
        $("#search-block-form").hide();
        $("#formulario-search").hide();
        $("#formulario1-search").hide();
        $("#cerrar-search").hide();
    });
    
    $("#login").click(function() {
        $("#user-login").show();
        $("#cerrar-login").show();

        $(this).hide();
        $("#edit-name--2").daplaceholder({
            initValue: 'Usuario'
        });
    });
    
    
});
