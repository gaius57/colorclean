<?php

/**
 * This file contains the code for generating metaboxs of different posts formats (quote, gallery, video, ...)
 * 
 * add_meta_box : http://codex.wordpress.org/Function_Reference/add_meta_box
 * get_post_meta : http://codex.wordpress.org/Function_Reference/get_post_meta
 * update_post_meta : http://codex.wordpress.org/Function_Reference/update_post_meta
 * 
 *
 * @package WordPress
 * @subpackage Color&Clean
 * @since Color&Clean 1.0
 */



add_action('add_meta_boxes','init_metaboxes');

function init_metaboxes(){
  //Init of metaboxs
  add_meta_box('cc_quotes', 'Quote', 'meta_quote', 'post', 'normal', 'high');
  add_meta_box('cc_gallery', 'Gallery', 'meta_gallery', 'post', 'normal', 'high');
  add_meta_box('cc_audio', 'Audio', 'meta_audio', 'post', 'normal', 'high');
  add_meta_box('cc_video', 'Video', 'meta_video', 'post', 'normal', 'high');
  
  add_meta_box('cc_portfolio_working_time', 'Working Time', 'meta_portfolio_working_time', 'portfolio', 'normal', 'high');
}

/**
 * QUOTES
 * @param type $post
 */
function meta_quote($post){
  $val = get_post_meta($post->ID,'cc_author_quotes',true);
  echo '<label for="cc_author_quotes">Author : </label>';
  echo '<input style="width:100%;" value="'.$val.'" id="cc_author_quotes" type="text" name="cc_author_quotes" />';
}

/**
 * GALLERY
 * @param type $post
 */
function meta_gallery($post){
  $val = get_post_meta($post->ID,'cc_gallery_url',true);
  $id = get_post_meta($post->ID,'cc_gallery_id',true);
  $height = '300';
  $time = '3000';
  if(get_post_meta($post->ID,'cc_gallery_height',true)&& get_post_meta($post->ID,'cc_gallery_height',true)!='')
      $height = get_post_meta($post->ID,'cc_gallery_height',true);
  if(get_post_meta($post->ID,'cc_gallery_time',true) && get_post_meta($post->ID,'cc_gallery_time',true)!='')
      $time = get_post_meta($post->ID,'cc_gallery_time',true);
  
  $tabImg = split(",", $id);
  echo '<label for="cc_gallery_height">Height : </label><i>(Define the height of the slide show, you can choose the unit "px" or "%". Your pics will be crop to match. Default:300px)</i>
        <br><input value="'.$height.'" id="cc_gallery_height" type="text" name="cc_gallery_height"/><br><br>';
  echo '<label for="cc_gallery_time">Time : </label><i>(Milliseconds between the end of the sliding effect and the start of the next one. Default:3000)</i>
        <br><input value="'.$time.'" id="cc_gallery_time" type="text" name="cc_gallery_time"/>';
  echo '<input id="cc_gallery_button" class="button button-primary button-large" type="button" name="cc_gallery_button" value="Choose Pictures" />';
  echo '<div id="cc-pic-gallery">';
  foreach ($tabImg as $key => $value) {
      echo get_image_send_to_editor($value, '', '', '', '', '', 'cc-archive-thumbnail');
  }
  echo '</div>';
  echo '<input value="'.$val.'" id="cc_gallery_url" type="hidden" name="cc_gallery_url" readonly="readonly"/>';
  echo '<input value="'.$id.'" id="cc_gallery_id" type="hidden" name="cc_gallery_id" readonly="readonly"/>';
  
  
}

/**
 * AUDIO
 * @param type $post
 */
function meta_audio($post){
  $val = get_post_meta($post->ID,'cc_audio_url',true);
  echo '<label for="cc_audio_url">Souncloud Widget Code : </label>';
  echo '<textarea  style="width:100%;" id="cc_audio_url" type="text" name="cc_audio_url">'.$val.' </textarea>';
  echo '<i>You can change the height of the player with the height="xxx" attribute (Best: default=>1song 300=>playlist)</i>';
}

/**
 * VIDEO
 * @param type $post
 */
function meta_video($post){
  $val = get_post_meta($post->ID,'cc_video_url',true);
  echo '<label for="cc_video_url">Embed Video Code : </label>';
  echo '<textarea style="width:100%;"  id="cc_video_url" type="text" name="cc_video_url">'.$val.'</textarea>';
  echo '<i>Just put the iframe markups from Youtube, Dailymotion,... They\'re automaticaly responsive design</i>';
}


/**
 * WORKING TIME (portfolio)
 * @param type $post
 */
function meta_portfolio_working_time($post){
  $val = get_post_meta($post->ID,'cc_portfolio_working_time',true);
  echo '<label for="cc_portfolio_working_time">Duration : </label>';
  echo '<input style="width:50%;" value="'.$val.'" id="cc_portfolio_working_time" type="text" name="cc_portfolio_working_time" />';
}


add_action('save_post','save_metaboxes');
function save_metaboxes($post_ID){
  // if metabox's values is defined, we save it.
  if(isset($_POST['cc_author_quotes'])){
    update_post_meta($post_ID,'cc_author_quotes', esc_html($_POST['cc_author_quotes']));
  }
  // if metabox's values is defined, we save it.
  if(isset($_POST['cc_gallery_url'])){
    update_post_meta($post_ID,'cc_gallery_url', esc_html($_POST['cc_gallery_url']));
    update_post_meta($post_ID,'cc_gallery_id', esc_html($_POST['cc_gallery_id']));
    update_post_meta($post_ID,'cc_gallery_height', esc_html($_POST['cc_gallery_height']));
    update_post_meta($post_ID,'cc_gallery_time', esc_html($_POST['cc_gallery_time']));
  }
  // if metabox's values is defined, we save it.
  if(isset($_POST['cc_audio_url'])){
    update_post_meta($post_ID,'cc_audio_url', esc_html($_POST['cc_audio_url']));
  }
  // if metabox's values is defined, we save it.
  if(isset($_POST['cc_video_url'])){
    update_post_meta($post_ID,'cc_video_url', esc_html($_POST['cc_video_url']));
  }
  
  // if metabox's values is defined, we save it.
  if(isset($_POST['cc_portfolio_working_time'])){
    update_post_meta($post_ID,'cc_portfolio_working_time', esc_html($_POST['cc_portfolio_working_time']));
  }
  
}