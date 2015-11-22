jQuery(document).ready(function ($) {
    
    
    /*
     * fix menu toggle after click 
     */
    jQuery(document).ready(function () {
        jQuery(".navbar-nav li a").click(function (event) {
            jQuery(".navbar-collapse").collapse('hide');
        });
    });

});
