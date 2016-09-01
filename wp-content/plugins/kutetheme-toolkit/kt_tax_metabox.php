<?php

require_once("Tax-meta-class/Tax-meta-class.php");
if (is_admin()){
  /* 
   * prefix of meta keys, optional
   */
  $prefix = 'kt_';
  /* 
   * configure your meta box
   */
  $config = array(
    'id'             => 'kt_meta_box',          // meta box id, unique per meta box
    'title'          => 'Kute Meta Box',          // meta box title
    'pages'          => array('product_cat'),        // taxonomy name, accept categories, post_tag and custom taxonomies
    'context'        => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'fields'         => array(),            // list of meta fields (can be added by field arrays)
    'local_images'   => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => false          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  
  
  /*
   * Initiate your meta box
   */
  $my_meta =  new Tax_Meta_Class($config);
  
  /*
   * Add fields to your meta box
   */
  //Image field
  $my_meta->addImage($prefix.'category_slider',array('name'=> __('Category slider', 'kutetheme' ),'multiple'=>'multiFile'));
  
  //Finish Meta Box Decleration
  $my_meta->Finish();
}
