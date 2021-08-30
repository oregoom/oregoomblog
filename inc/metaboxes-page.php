<?php
if ( ! defined( 'ABSPATH' ) ) exit;



/*
 * Metaboxes Post
 */
function hb_agregar_metaboxes_post(){
   
  add_meta_box( 'hb_meta_box_post', 'ID de YouTube', 'hb_metaboxes_post', 'post', 'normal', 'high', null );
}
add_action( 'add_meta_boxes', 'hb_agregar_metaboxes_post' );


function hb_metaboxes_post($post) { ?>






<!-- ID de YouTube -->
<div>
    <p class="post-attributes-label-wrapper page-template-label-wrapper">
        <label class="post-attributes-label" for="hb_idyoutube_post">* ID de YouTube (Oregoom.com)</label>
    </p>
    <p><input type="text" maxlength="12" id="hb_idyoutube_post" name="hb_idyoutube_post" value="<?php echo get_post_meta($post->ID, 'hb_idyoutube_post', true); ?>"></p>
</div>

<?php
}


//function para GUARDAR LOS METABOXES
function hb_guardar_metaboxes_post($post_id, $post, $update){
    
    $hb_idyoutube_post = '';
    
    /*
     * ID de YouTube
     */
    if(isset($_POST['hb_idyoutube_post'])){
        $hb_idyoutube_post = sanitize_text_field($_POST['hb_idyoutube_post']);
    }
    update_post_meta($post_id, 'hb_idyoutube_post', $hb_idyoutube_post);
    
    
}
add_action('save_post', 'hb_guardar_metaboxes_post',10,3);