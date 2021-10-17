<!--<div style="position: -webkit-sticky; position: sticky; top: 10px;">-->

    <!--//GOOGLE ADSENSE (PC y Movil) -->
    <?php if(get_option('template_oregoom_adsense_300_250') != ''  && esc_textarea(get_option('template_oregoom_uasr_google_adsense')) == 'template_oregoom_uasr_google_adsense_yes'){ ?>    
                
        <div class="pb-4 text-center d-none d-xl-block">

            <?php  echo get_option('template_oregoom_adsense_300_250'); ?>

        </div>    
    
    <?php } ?>

    <div class="d-none d-xl-block px-xxl-4 px-xl-2">

        <?php 

        if( is_active_sidebar('sidebar_right_post') ){

            dynamic_sidebar('sidebar_right_post');

        } ?>

    </div>

    <!--//GOOGLE ADSENSE (PC y Movil) -->
    <?php if(get_option('template_oregoom_adsense_300_600') != ''  && esc_textarea(get_option('template_oregoom_uasr_google_adsense')) == 'template_oregoom_uasr_google_adsense_yes'){ ?>    
                
        <div class="pb-4 text-center d-none d-xl-block">

            <?php  echo get_option('template_oregoom_adsense_300_600'); ?>

        </div>    
    
    <?php } ?>

    <!--//GOOGLE ADSENSE (PC y Movil) -->
    <?php if(get_option('template_oregoom_adsense_160_600') != ''  && esc_textarea(get_option('template_oregoom_uasr_google_adsense')) == 'template_oregoom_uasr_google_adsense_yes'){ ?>    
        
        <div class="text-center d-xl-none">

            <?php  echo get_option('template_oregoom_adsense_160_600'); ?>

        </div>    
    
    <?php } ?>


<!--</div>-->