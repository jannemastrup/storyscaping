<?php
/*
* Plugin Name: Kogle pop up plugin
* Plugin URI: https://mynordicstory.dk/koglebeer
* Description: This is a pop-up for Kogle. The Plugin is based on HTML5, CSS, JS and PHP
* Version: 1.9
* Author: Janne, Cecillie og Cathrine
* Author: https://mynordicstory.dk/koglebeer
* License: GPL2
*/


# Creating a responsive discount popup form
function responsive_popup_form()
{

    $content = '';
    $content .= '<div class="box slide-top" id="slideBox">';
    $content .= '<img src="img/logoanimate.gif" id="koglelogo" alt="animereret gif logo kogle">';
    $content .= '<div id="closepopupbutton">X</div>';
    $content .= '<h1 id="promotion-header-title">KOGLE</h1>';
    $content .= '<<h2 id="promotion-subheader-title">Er du over den lovlige drikkealder i Danmark?</h2>>';
    $content .= '<section class="janej">';
    $content .= '<h3 id="close" class="popupCloseButton">JA</h3>';
    $content .= '<a href="https://www.sum.dk/Aktuelt/Nyheder/Forebyggelse/2013/Januar/Lovstramning_skal_begraense_unges_ryge_og_drukvaner.aspx">NEJ</a>;
    $content .= '</section>';
    $content .= '</div>';
    $content .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';
    $content .= '<script>
        $(document).ready(function() {
            $("#close").click(function() {
                $("#slideBox").hide();
            });
        });
</script>';
   
    return $content;
    
}
    /*First parameter is a self choosen name for a unique short-code. Second parameter is the name of the function that creates the newsletter*/
    add_shortcode('show_responsive_kogle_popup_form','responsive_popup_form');

    #Use action Hook to execute wp_enqueue_scripts with the function register_styles_and_scripts_for_responsive_discount_popup_plugin
    add_action('wp_enqueue_scripts','register_styles_and_scripts_for_responsive_popup_form');

    
    # Enqueue stylesheets and javascript files
    function register_styles_and_scripts_for_responsive_popup_form() 
    {
        
        
    
        
     wp_enqueue_style('CustomStylesheet', plugins_url('koglepopup/css/style.css')); 
        
        
        wp_deregister_script('jquery');

        wp_enqueue_script('CustomJqueryScript','https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), null, true);
        
    
    }

?>
