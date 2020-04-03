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
    $content .= '<div class="form-container z-depth-5">';
    $content .= '<div class="row">';
    $content .= '<div id="closepopupbutton">X</div>';
    $content .= '<form class="col s12" id="reused_form">';
    $content .= '<div class="row">';
    $content .= '<img src=" '.plugins_url("responsive-popup-form/images/bgimage.jpg").' " alt="Zalando" id="backgroundimg" >';
    $content .= '<h3 id="discount-heading3-text">Vil du have 10% rabat på din næste ordre?</h3>';
    $content .= '</div>';
    $content .= '<div class="row">';
    $content .= '<img src="https://mosaic02.ztat.net/nvg/z-header-fragment/zalando-logo/logo_default.svg" alt="Zalandologo" class="z-navicat-header_svgLogo">';
    $content .= '</div>';
    $content .= '<div class="row">';
    $content .= '<div class="input-field col s12">';
    
    $content .= '<input id="name" type="text" name="name" required class="validate">';
    $content .= '<label for="name">Name</label>';
    $content .= '</div>';
    $content .= '</div>';
    $content .= '<div class="row">';
    $content .= '<div class="input-field col s12">';
    $content .= '<input id="email" type="email" name="email" required class="validate">';
    $content .= '<label for="email">Email</label>';
    $content .= '</div>';
    $content .= '</div>';
    $content .= '<div>';
    $content .= '<button class="waves-effect waves-light btn submitbtn" type="submit">Få 10% på dit næste køb</button>';
    $content .= '<p id="gdpr-text">Se vores <a href="https://www.zalando.dk/zalando-databeskyttelse/"> databeskyttelseserklæring</a> for information om, hvordan Zalando behandler dine data.</p>';
    $content .= '</div>';
    $content .= '</form>';
    $content .= '</div>';
    $content .= '</div>';
    
    return $content;
    
}
    #First parameter is a self choosen name for a unique short-code. Second parameter is the name of the function that creates the newsletter
    add_shortcode('show_responsive_popup_form','responsive_popup_form');

    #Use action Hook to execute wp_enqueue_scripts with the function register_styles_and_scripts_for_responsive_discount_popup_plugin
    add_action('wp_enqueue_scripts','register_styles_and_scripts_for_responsive_popup_form');

    
    # Enqueue stylesheets and javascript files
    function register_styles_and_scripts_for_responsive_popup_form() 
    {
        
        wp_enqueue_style('CustomMaterializeCSS','https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css');
        
        wp_enqueue_style('CustomFontMaterialIcons','https://fonts.googleapis.com/icon?family=Material+Icons');
        
        wp_enqueue_style('CustomStylesheet', plugins_url('responsive-popup-form/css/style.css'));
        
        wp_deregister_script('jquery');

        wp_enqueue_script('CustomJqueryScript','https://code.jquery.com/jquery-2.1.1.min.js', array(), null, true);
        
        wp_enqueue_script('CustomMaterializeScript','https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js', array('CustomJqueryScript'), null, true);
        
        wp_enqueue_script('CustomScript', plugins_url('responsive-popup-form/js/script.js'), array('CustomMaterializeScript'), null, true);
    }

?>
