<!DOCTYPE html>
<html amp <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    
    <title><?php wp_title(); ?></title>           
    
    <style amp-custom>


        /*Paginación*/
        .page-numbers{
            background-color: #ffffff;
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 4px;
            border-radius: 5px;
        }
        .current{
            /*background-color: #006ba1;*/
            color: #000000;
        }



        
        .lightbox { 
            /*background: rgba(0,0,0,.8);*/
            background: rgba(0,0,0,.9);
            width: 100%;
            height: 100%;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        ul{
            font-family: 'Roboto', sans-serif;
            font-size: 18px;
            font-weight: 300;
            line-height: 1.7em;
        }
        p{
            font-family: 'Roboto', sans-serif;
            font-size: 18px;
            font-weight: 300;
            line-height: 1.7em;
        }
        p strong{
            font-weight: bold !important;
        }
        h2{
            line-height: 1.2em; font-family: Raleway, sans-serif; font-weight: 700!important; font-size: 30px!important; padding-bottom: 5px; padding-top: 10px;
        }
        
        #btn-sidebarclose{
            background-color: #000; 
            border: none; 
            cursor: pointer; 
            padding: 3px 10px 3px 10px; 
            border-radius: 100px; 
            color: #fff; 
            position: absolute;
            top: 0; margin-top: 10px;
            right: 0;
            margin-right: 10px;
        }
        .hb-parrafo
        {
            font-size: 50px;
        }
        
        #img-bg-page-home{
            /*padding-top: 220px;*/
            /*height: 394px;*/
            background:linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5)),  url(<?php echo get_the_post_thumbnail_url(); ?>);
            background-repeat: no-repeat;
            background-size: 100%, cover;
        }
        
        #img-bg-page{
            /*padding-top: 220px;*/
            height: 394px;
            background:linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5)),  url(<?php echo get_the_post_thumbnail_url(); ?>);
            background-repeat: no-repeat;
            background-size: 100%, cover;
        }
        
        #img-bg-search{
            height: 270px;
            background:linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5)),  url(<?php echo get_the_post_thumbnail_url(); ?>);
            background-repeat: no-repeat;
            background-size: 100%, cover;
        }
        .breadcrumb-item::before{
            /*color: #ffffff !important;*/
        }
        
        
                
        
        /*
        Solo en Celulares
        */
        @media (max-width: 575.98px) { 
            h1{
                font-size: 30px!important;
            }
            h2{
                font-size: 24px!important;
            }
            h3{
                font-size: 18px!important;
            }      
            
            
        }
        
        
        @media (max-width: 767.98px) { 
            
            #oregoom-container{
/*                box-shadow: 0 0 0 !important;
                border-radius: .0rem !important;*/
            }
            
        }

        @media (min-width: 1199.98px) {

            #oregoom-1140-width{
                width: 1140px !important;
            }

        }
        
        
    </style>
    
    <?php wp_head(); ?>
    
    <?php 
    

    /*
     * ==================
     * Google Ananalytics
     */    
    if(is_user_logged_in() != true && get_option('template_oregoom_google_analytics') != ""){ ?>

        <amp-analytics type="gtag" data-credentials="include">
            <script type="application/json">
                {
                    "vars" : {
                        "gtag_id": "<?php echo get_option('template_oregoom_google_analytics'); ?>",
                        "config" : {
                            "<?php echo get_option('template_oregoom_google_analytics'); ?>": { "groups": "default" }
                        }
                    }
                }
            </script>
        </amp-analytics>        
    <?php } ?>
	





</head>
    <body <?php body_class(); ?>>



        <!-- Google Tag Manager -->
        <amp-analytics config="https://www.googletagmanager.com/amp.json?id=GTM-KXV2MR2&gtm.url=SOURCE_URL" data-credentials="include"></amp-analytics>

        
        
        <!--//GOOGLE ADSENSE Google AMP (Auto) -->
        <?php if(get_option('template_oregoom_adsense_google_amp_auto') != ''){ ?>                        
                <?php  echo get_option('template_oregoom_adsense_google_amp_auto'); ?>
        <?php } ?>
                
        
        
        
        <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">

<div class="container"><?php

        if ( has_custom_logo() ) {
            the_custom_logo();
        } else {
            echo get_bloginfo();
        } ?>

    <!--Boton de Menú (Movil)-->
    <button class="navbar-toggler border-0" type="button" aria-label="open sidebar" on="tap:sidebar-top.open" tabindex="0">
        <span class="navbar-toggler-icon"></span>
    </button>



    <div class="collapse navbar-collapse ms-3" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <?php oregoom_navegation_menus(); ?>

        </ul>

        <div class="d-flex">
            <a class="btn btn-outline-primary me-2 d-none d-xl-block" href="https://oregoom.com/precios/" target="_self" role="button">Precios y planes</a>
            <a class="btn btn btn-primary" href="https://oregoom.com/cursos/" target="_blank" role="button">Cursos</a>
        </div>

    </div>

    <!--Menú Movil-->
    <amp-sidebar id="sidebar-top" class="bg-white" layout="nodisplay" side="right">

        <div class="p-2 pe-3 border-bottom d-flex justify-content-between align-items-center">
                
                <?php

                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    echo get_bloginfo();
                } ?>

                <!--Botón de Close menú-->
                <span class="rounded-circle ms-3" id="btn-sidebarclose" on="tap:sidebar-top.close" >X</span>

        </div>

        <div class="navbar-collapse pt-3 p-3">

            <ul class="navbar-nav">

                <?php oregoom_navegation_menus(); ?>

                <li class="nav-item mb-2 mt-2">
                    <a class="btn btn-outline-primary" href="https://oregoom.com/precios/" target="_self" role="button">Precios y planes</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn btn-primary" href="https://oregoom.com/cursos/" target="_blank" role="button">Cursos</a>
                </li>

            </ul>

        </div>

    </amp-sidebar>

</div>
</nav>
            
        </header>