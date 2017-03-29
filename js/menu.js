jQuery(document).ready(function($) {
    
    $("#accordion h3.menos a").html(' + ' + $("#accordion h3.menos a").html());
    $("#accordion h3.mas a").html(' - ' + $("#accordion h3.mas a").html());
    $("#accordion div.menos").hide();
    
    $("#almuerzo").hover(function() {
        if ($(this).hasClass('menos'))
        {
            $("#almuerzo a").html(' - Almuerzo');
            $("#comida a").html(' + Comida');
            
            $(this).addClass('mas');
            $(this).removeClass('menos');
            $("#almuerzo_div").show();
            
            $("#comida").addClass('menos');
            $("#comida").removeClass('mas');
            $("#comida_div").hide();
        }
    });
    
    $("#comida").hover(function() {
        if ($(this).hasClass('menos'))
        {
            $("#almuerzo a").html(' + Almuerzo');
            $("#comida a").html(' - Comida');

            $(this).addClass('mas');
            $(this).removeClass('menos');
            $("#comida_div").show();
            
            $("#almuerzo").addClass('menos');
            $("#almuerzo").removeClass('mas');
            $("#almuerzo_div").hide();
        }
    });

});


