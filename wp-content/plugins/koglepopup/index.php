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


/*Indhenter HTML ind i PHP så wordpress kan læse det. = betyder hvad er der i funktionen. .= man lægger noget til funktionen.*/
function responsive_popup_form()
{

    $content = '';
    $content .= '<div class="box slide-top" id="slideBox">';
    $content .= '<img id="koglelogo" src=" '.plugins_url("koglepopup/img/logoanimate.gif").' " ';
    $content .= 'alt="kogleanimation">';
    $content .= '<h1 id="promotion-header-title">KOGLE</h1>';
    $content .= '<h2 id="promotion-subheader-title">Er du over den lovlige drikkealder i Danmark?</h2>';
    $content .= '<section class="janej">';
    $content .= '<div>';
    $content .= '<h3 id="close" class="popupCloseButton">JA</h3>';
    $content .= '</div>';
    $content .= '<div>';
    $content .= '<a href="https://www.sum.dk/Aktuelt/Nyheder/Forebyggelse/2013/Januar/Lovstramning_skal_begraense_unges_ryge_og_drukvaner">NEJ</a>';
    $content .= '</div>';
    $content .= '</section>';
    $content .= '</div>';
    $content .= '<script>
    // Fordi vi vælger at bruge Wordpress egen jQuery version, pakker vi vores kode ind således at et $ er tilsvarende jQuery
    (function($){
        $(document).ready(function() {
            $("#close").click(function() {
                $("#slideBox").hide();
            });
        });
    })(jQuery)
</script>';
   
    return $content;
    
}
    /*Første parameter er et selvvalgt navn på den shortcode, vi skal bruge til at aktivere plugin. 
    
    Nedenstående linje kode ville overskrive Wordpress' egen jQuery version og derved ødelægge temaet's burgermenu
    derfor har vi fjernet den fra linje 31.
        $content .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>';
    
    Andet parameter er navnet på den funktion som skal anvendes (HTML content som skal hentes ned) for at bruge plugin*/
    add_shortcode('show_responsive_kogle_popup_form','responsive_popup_form');

    #Use action Hook to execute wp_enqueue_scripts with the function register_styles_and_scripts_for_responsive_discount_popup_plugin
    add_action('wp_enqueue_scripts','register_styles_and_scripts_for_responsive_popup_form');
    
    # Indhenter stylesheets og jQuery bibliotek
    function register_styles_and_scripts_for_responsive_popup_form() 
    {
        
      wp_enqueue_style('CustomStylesheet', plugins_url('koglepopup/css/style.css')); 
        
        /*Fjerner linket til jQuery biblioteket som wordpress evt. har linket til.*/
        
      // Da vi gerne vil gøre brug af Wordpress' egen jQuery og respekterer temaet, har vi udkommenteret afregistrering af indbygget jQuery.  
      //wp_deregister_script('jquery'); 
        
        /*Linker til den version af jQuery bibliotek jeg vil anvende.
        Første parameter et unikt navn custom-jquery, andet parameter er en url til jQuery bibliotek (CDN). 
Der kommer så et array (tredje parameter), indeni det kan man skrive en script fil, som skal loade før jQuery bibliotek, hvis det er afhængigt af, at andre filer skal loade først. 
Fjerdeparamenter: '1.0' versionsnummer eller null (ikke angivet versionsnummer af biblioteket)
Femte parameter: true, hvor ønsker man at loade jQuery biblioteket, kan loade i header eller footer. */

    // Igen, da vi bruger Wordpress' jQuery, behøver vi ikke at hente jQuery bibliotek ned.
    //wp_enqueue_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
      
    }
?>
