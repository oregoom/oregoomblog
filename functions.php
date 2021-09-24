<?php


//ACTUALIZAR TEMA DESDE GITHUB
// set_site_transient('update_themes', null);
function geko_check_update( $transient ) {
    if ( empty( $transient->checked ) ) {
        return $transient;
    }

    $theme_data = wp_get_theme(wp_get_theme()->template);
    $theme_slug = $theme_data->get_template();

    //Delete '-master' from the end of slug
    $theme_uri_slug = preg_replace('/-master$/', '', $theme_slug);
    
    $remote_version = '0.0.0';
    $style_css = wp_remote_get("https://raw.githubusercontent.com/oregoom/".$theme_uri_slug."/master/style.css")['body'];
    if ( preg_match( '/^[ \t\/*#@]*' . preg_quote( 'Version', '/' ) . ':(.*)$/mi', $style_css, $match ) && $match[1] )
        $remote_version = _cleanup_header_comment( $match[1] );
    
    if (version_compare($theme_data->version, $remote_version, '<')) {
        $transient->response[$theme_slug] = array(
            'theme'       => $theme_slug,
            'new_version' => $remote_version,
            'url'         => 'https://github.com/oregoom/'.$theme_uri_slug,
            'package'     => 'https://github.com/oregoom/'.$theme_uri_slug.'/archive/master.zip',
        );
    }
    return $transient;
}
add_filter( 'pre_set_site_transient_update_themes', 'geko_check_update' );







add_theme_support( 'post-thumbnails' ); 

add_post_type_support( 'page', 'excerpt' );

add_theme_support( 'custom-logo', array(
		'height'      => 44,
		'flex-width' => true,
	) );

function oregoom_blog_registrar_areas(){

    register_sidebar(array(
        'name' => 'Barra lateral',
        'id' => 'sidebar_right_post',
        'before_widget' => '<div id="sidebar_right_post" class="mb-4">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="h4"><small>',
        'after_title' => '</small></h3>',
    ));

}
add_action( 'widgets_init', 'oregoom_blog_registrar_areas');








// Incluir Bootstrap JS y dependencia popper
function bootstrap_js() {

        // Incluir Bootstrap CSS  
        /*wp_enqueue_style( 'bootstrap_css', 
				'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css', 
				array(), 
				'4.6.0'
				);*/
        
        
        // Incluir Bootstrap 5.1 CSS  
        wp_enqueue_style( 'bootstrap_css', 
				'https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css', 
				array(), 
				'5.1.0'
				);

}
add_action( 'wp_enqueue_scripts', 'bootstrap_js');













//Agregar clase a <p> de the_content()
add_filter( 'the_content', 'hb_add_style_the_content', 10, 1 );
function hb_add_style_the_content( $content = null ){

    if( null === $content )
        return $content;

    $search = array('<p>');
    $replace = array('<p style="line-height: 1.5; margin-bottom: 1.5rem; font-size: 1.125rem; color: #333;">');

//    if(is_page_template('templates/template-curso.php')){
        return str_replace( $search, $replace, $content );  
//    } else {
//        return $content;
//    }       
}






// Register Navigation Menus
function hb_register_menus() {

	$locations = array(
		'menu-principal' => __( 'Menú Principal', 'oregoom_domain' )
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'hb_register_menus' );

function oregoom_navegation_menus(){
    
    $oregoom_menu_name = 'menu-principal';
    $oregoom_locations = get_nav_menu_locations();
    $oregoom_menu = wp_get_nav_menu_object( $oregoom_locations[ $oregoom_menu_name ] );
    $oregoomMenus = wp_get_nav_menu_items( $oregoom_menu->term_id);
    
    $menuPrincipal = '';
    $subMenu = '';
    
    
//echo '<div class="p-3 mb-2 bg-white text-dark"><pre>'; print_r($oregoomMenus); echo '</pre></div>';//imprimir el array 
    
    if( ! empty($oregoomMenus) ){

        foreach ($oregoomMenus as $oregoomMenu) {
            
            $subMenuExist = false;
            
            $idMenu = $oregoomMenu->ID;
            
            if($oregoomMenu->menu_item_parent == 0){
                ?>
                <li class="nav-item active dropdown">                    
                    <?php

                    $menuPrincipal = '<a class="nav-link ml-1" href="'.esc_url($oregoomMenu->url).'" target="'.$oregoomMenu->target.'">'.$oregoomMenu->title.'</a>';
                    
                    foreach ($oregoomMenus as $oregoomSubMenu) {
                        if($idMenu == $oregoomSubMenu->menu_item_parent){
                            
                            $subMenuExist = true;
                            
                            $inicioSubMenu = '<div class="dropdown-menu border-0 shadow-sm" style="border-top: 2px #8B3D88 solid!important;" aria-labelledby="navbarDropdown'.$oregoomSubMenu->menu_item_parent.'">';
                            $finSubMenu = '</div>';
                            $subMenu = $subMenu . '<a class="dropdown-item" href="'.esc_url($oregoomSubMenu->url).'" target="'.$oregoomSubMenu->target.'">'.$oregoomSubMenu->title.'</a>';
                            
                        }
                    }

                    if($subMenuExist == false){
                        
                        echo $menuPrincipal;
                        
                    } else {
                        
                        echo '<a class="nav-link dropdown-toggle" href="'.esc_url($oregoomMenu->url).'" id="navbarDropdown'.$idMenu.'" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" target="'.$oregoomMenu->target.'">'.$oregoomMenu->title.'</a>'.$inicioSubMenu.$subMenu.$finSubMenu;
                        
                        $inicioSubMenu = '';
                        $finSubMenu = '';
                        $subMenu = '';
                    }             
                    ?>
                </li>
                <?php            
            }
        }                    
    }
}


/* =================================================================
 * Function para agregar un Menú y Página del Template Oregoom
 * en Admin de WordPress
 */
function google_adsense_add_admin_menu_page(){
    
    //PD: https://codex.wordpress.org/Adding_Administration_Menus
    
    $page_title = 'Google AdSense en Template Oregoom';     //Título de la página
    $menu_title = 'Ads Oregoom';                            //Título para Menú
    $capability = 'manage_options';                         //Capacidad - manage_option => Adminsitrar opción
    $menu_slug = 'google-adsense-oregoom';                  //El nombre del slug para referirse a este menú
    $function = 'google_adsense_content_page_menu';         //La función que muestra el contenido de la página del menú.
    $icon_url = 'dashicons-carrot';                         //La url del icono que se utilizará para este menú.
    
    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url);
    
}
add_action('admin_menu','google_adsense_add_admin_menu_page');

function google_adsense_content_page_menu(){
    ?>

        <div class="wrap">        
        <h1>Agregar códigos de Google AdSense en Plantilla Oregoom</h1>        
         
        <?php settings_errors();//Muestra los mensajes de éxito o de error cuando se envía el formulario ?>
        
        <h2>Bloque de anuncios</h2>
        <form method="post" action="<?php echo esc_url(admin_url('options.php') ); ?>">
            	    
            <?php 
            //Para proteger formularios
            wp_nonce_field(basename(__FILE__), 'template_oregoom_form_nonce'); 
            ?>
            
            <?php settings_fields( 'template_oregoom_custom_admin_settings_group' ); ?>
	    <?php do_settings_sections( 'template_oregoom_custom_admin_settings_group' ); ?>
            
            <table class="form-table" role="presentation">
                <tbody>

                                    
                    <!--CODE ADSENSE (300x250)-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_uasr_google_adsense_yes">Usar Google AdSense</label>
                        </th>
                        <td>

                            <div style="margin-bottom: 20px;">

                                <input type="radio" <?php if(esc_textarea(get_option('template_oregoom_uasr_google_adsense')) == 'template_oregoom_uasr_google_adsense_not'){ echo 'checked'; } ?> id="template_oregoom_uasr_google_adsense_not" name="template_oregoom_uasr_google_adsense" value="template_oregoom_uasr_google_adsense_not">
                                <label for="template_oregoom_uasr_google_adsense_not"><?php _e('Not', 'oregoom'); ?></label>
                                
                                <input type="radio" <?php if(esc_textarea(get_option('template_oregoom_uasr_google_adsense')) == 'template_oregoom_uasr_google_adsense_yes'){ echo 'checked'; } ?> id="template_oregoom_uasr_google_adsense_yes" name="template_oregoom_uasr_google_adsense" value="template_oregoom_uasr_google_adsense_yes" style="margin-left: 20px;">
                                <label for="template_oregoom_uasr_google_adsense_yes"><?php _e('Yes', 'oregoom'); ?></label>

                            </div>                            
                            <p class="description">¿Estas listo para monitizar tu Sitio Web con Google AdSense?</p>
                        </td>                        
                    </tr> 

                    
                    <!--CODE ADSENSE (300x250)-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_adsense_300_250">Code AdSense (300x250)</label>
                        </th>
                        <td>
                            
                            <textarea name="template_oregoom_adsense_300_250" id="template-oregoom-adsense-300-250" style="min-height: 124px; width: 100%;"><?php echo esc_textarea(get_option('template_oregoom_adsense_300_250')); ?></textarea>
                            <p class="description">Este formato, también denominado "rectángulo mediano", suele ofrecer un 
                                mayor inventario de anuncios de anunciantes, lo que puede aumentar los ingresos si se 
                                habilitan tanto los anuncios de texto como los anuncios de imagen.</p>
                            <p class="description">Ofrece un buen rendimiento cuando se inserta en contenido de 
                                texto o al final de los artículos.</p>
                            <p class="description"><strong>NOTA:</strong> Opción recomendada para móviles</p>
                        </td>                        
                    </tr>  
                    
                    <!--CODE ADSENSE (728x90)-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_adsense_728_90">Code AdSense (728x90)</label>
                        </th>
                        <td>
                            
                            <textarea name="template_oregoom_adsense_728_90" id="template-oregoom-adsense-728-90" style="min-height: 124px; width: 100%;"><?php echo esc_textarea(get_option('template_oregoom_adsense_728_90')); ?></textarea>
                            <p class="description">Este formato, también denominado "rectángulo mediano", suele ofrecer un 
                                mayor inventario de anuncios de anunciantes, lo que puede aumentar los ingresos si se 
                                habilitan tanto los anuncios de texto como los anuncios de imagen.</p>
                            <p class="description">Ofrece un buen rendimiento cuando se inserta en contenido de 
                                texto o al final de los artículos.</p>
                            <p class="description"><strong>NOTA:</strong> Opción recomendada para móviles</p>
                        </td>                        
                    </tr>  
                    
                    <!--CODE ADSENSE (160x600)-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_adsense_160_600">Code AdSense (160x600)</label>
                        </th>
                        <td>
                            
                            <textarea name="template_oregoom_adsense_160_600" id="template-oregoom-adsense-160-600" style="min-height: 124px; width: 100%;"><?php echo esc_textarea(get_option('template_oregoom_adsense_160_600')); ?></textarea>
                            <p class="description">Este formato, también denominado "rectángulo mediano", suele ofrecer un 
                                mayor inventario de anuncios de anunciantes, lo que puede aumentar los ingresos si se 
                                habilitan tanto los anuncios de texto como los anuncios de imagen.</p>
                            <p class="description">Ofrece un buen rendimiento cuando se inserta en contenido de 
                                texto o al final de los artículos.</p>
                            <p class="description"><strong>NOTA:</strong> Opción recomendada para móviles</p>
                        </td>                        
                    </tr>                 
                    
                    <!--CODE ADSENSE (300x600)-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_adsense_300_600">Code AdSense (300x600)</label>
                        </th>
                        <td>
                            
                            <textarea name="template_oregoom_adsense_300_600" id="template-oregoom-adsense-300-600" style="min-height: 124px; width: 100%;"><?php echo esc_textarea(get_option('template_oregoom_adsense_300_600')); ?></textarea>
                            <p class="description">Este formato, también denominado "rectángulo mediano", suele ofrecer un 
                                mayor inventario de anuncios de anunciantes, lo que puede aumentar los ingresos si se 
                                habilitan tanto los anuncios de texto como los anuncios de imagen.</p>
                            <p class="description">Ofrece un buen rendimiento cuando se inserta en contenido de 
                                texto o al final de los artículos.</p>
                            <p class="description"><strong>NOTA:</strong> Opción recomendada para móviles</p>
                        </td>                        
                    </tr>                 
                    
                    <!--CODE ADSENSE (970x250)-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_adsense_970_250">Code AdSense (970x250)</label>
                        </th>
                        <td>
                            
                            <textarea name="template_oregoom_adsense_970_250" id="template-oregoom-adsense-970-250" style="min-height: 124px; width: 100%;"><?php echo esc_textarea(get_option('template_oregoom_adsense_970_250')); ?></textarea>
                            <p class="description">Este formato, también denominado "rectángulo mediano", suele ofrecer un 
                                mayor inventario de anuncios de anunciantes, lo que puede aumentar los ingresos si se 
                                habilitan tanto los anuncios de texto como los anuncios de imagen.</p>
                            <p class="description">Ofrece un buen rendimiento cuando se inserta en contenido de 
                                texto o al final de los artículos.</p>
                            <p class="description"><strong>NOTA:</strong> Opción recomendada para móviles</p>
                        </td>                        
                    </tr>    
                                        
                    
                    
                    
                    <!--CODE ADSENSE (Google AMP Auto)-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_adsense_google_amp_auto">Code AdSense (Google AMP Auto)</label>
                        </th>
                        <td>
                            
                            <textarea name="template_oregoom_adsense_google_amp_auto" id="template_oregoom_adsense_google_amp_auto" style="min-height: 124px; width: 100%;"><?php echo esc_textarea(get_option('template_oregoom_adsense_google_amp_auto')); ?></textarea>
                            <p class="description">Permita que Google coloque anuncios gráficos en sus sitios de AMP</p>
                            <p class="description">Active los anuncios automáticos para AMP y Google mostrará automáticamente anuncios en todos los sitios de AMP en su cuenta. Solo debe agregar 2 fragmentos de código a cada sitio de AMP en los que desea publicar anuncios.</p>
                            <p class="description"><strong>NOTA:</strong> Opción recomendada</p>
                            
                        </td>                        
                    </tr>
                    
                    
                    
                    
                    <!--CODE ADSENSE (Responsivo)-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_adsense_auto">Code AdSense (Responsivo)</label>
                        </th>
                        <td>
                            
                            <textarea name="template_oregoom_adsense_auto" id="template-oregoom-adsense-auto" style="min-height: 124px; width: 100%;"><?php echo esc_textarea(get_option('template_oregoom_adsense_auto')); ?></textarea>
                            <p class="description">Este formato, también denominado "rectángulo mediano", suele ofrecer un 
                                mayor inventario de anuncios de anunciantes, lo que puede aumentar los ingresos si se 
                                habilitan tanto los anuncios de texto como los anuncios de imagen.</p>
                            <p class="description">Ofrece un buen rendimiento cuando se inserta en contenido de 
                                texto o al final de los artículos.</p>
                            <p class="description"><strong>NOTA:</strong> Opción recomendada para móviles</p>
                        </td>                        
                    </tr>                 
                    
                    <!--CODE Google Analytics-->
                    <tr>
                        <th scope="row">
                            <label for="template_oregoom_google_analytics">Code Google Analytics</label>
                        </th>
                        <td>         
                            <input type="text" name="template_oregoom_google_analytics" id="template_oregoom_google_analytics" style="width: 30%;" value="<?php echo esc_textarea(get_option('template_oregoom_google_analytics')); ?>">
                            <p class="description">Google Analytics.</p>
                        </td>                        
                    </tr>                 
                    
                </tbody>
            </table>   
            
            <?php submit_button(); ?>
            
        </form>    
    </div>
    <?php
}

function template_oregoom_register_options_admin_page() {
    
    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_uasr_google_adsense');

    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_adsense_970_250');
    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_adsense_300_250');
    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_adsense_728_90');
    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_adsense_160_600');
    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_adsense_300_600');
    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_adsense_auto');
    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_adsense_google_amp_auto');
    register_setting( 'template_oregoom_custom_admin_settings_group', 'template_oregoom_google_analytics');
    
}
add_action('admin_init','template_oregoom_register_options_admin_page');


//include_once 'inc/shortcode.php';
include_once 'inc/metaboxes-page.php';



/*
 * ===============================================================
 * Funcion para extraer 100 caracteres de descripción de cada post
 */
function hb_excerpt_100_caracteres($get_the_excerpt){
    
    $excerpt_post = $get_the_excerpt;
    $excerpt_post = mb_substr($excerpt_post, 0, 100, "utf-8"); 
    echo '<p class="text-muted mb-2">'.$excerpt_post.'...</p>'; 
    
}