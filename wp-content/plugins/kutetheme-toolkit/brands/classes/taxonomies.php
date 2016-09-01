<?php
/**
 * @author  AngelsIT
 * @package KUTE TOOLKIT
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class KT_Product_Brand_Taxonomies {
    public function __construct(){
        //register taxonomy product_brand
        add_action( 'woocommerce_register_taxonomy', array( $this, 'kt_create_taxonomies' ) );
        
        //Add form
		add_action( 'product_brand_add_form_fields', array( $this, 'kt_add_product_brand_fields' ) );
		add_action( 'product_brand_edit_form_fields', array( $this, 'kt_edit_product_brand_fields' ), 10, 1 );
		add_action( 'created_term', array( $this, 'kt_save_product_brand_fields' ), 10, 3 );
		add_action( 'edit_term', array( $this, 'kt_save_product_brand_fields' ), 10, 3 );
        
        // Add columns
		add_filter( 'manage_edit-product_brand_columns', array( $this, 'kt_product_brand_columns' ) );
		add_filter( 'manage_product_brand_custom_column', array( $this, 'kt_product_brand_column' ), 10, 3 );
        
        /* create radiobox */
		add_action( 'admin_menu',array( $this,  'kt_product_brand_remove_meta_box'));
		add_action( 'add_meta_boxes',array( $this,  'kt_product_brand_add_meta_box'));
        
    }
    public function kt_create_taxonomies(){
        $capabilities = version_compare( WOOCOMMERCE_VERSION, '2.0', '<' ) ? 'manage_woocommerce_products' : 'edit_products';
        
        $labels = array(
			'name'              => __( 'Product Brands', 'kutetheme' ),
			'singular_name'     => __( 'Product Brand', 'kutetheme' ),
			'search_items'      => __( 'Search Genres', 'kutetheme' ),
			'all_items'         => __( 'All Brands', 'kutetheme' ),
			'parent_item'       => __( 'Parent Brands', 'kutetheme' ),
			'parent_item_colon' => __( 'Parent Brands:', 'kutetheme' ),
			'edit_item'         => __( 'Edit Product Brand', 'kutetheme' ),
			'update_item'       => __( 'Update Product Brand', 'kutetheme' ),
			'add_new_item'      => __( 'Add New Product Brand', 'kutetheme' ),
			'new_item_name'     => __( 'New Brand Name', 'kutetheme'),
			'menu_name'         => 'Brands',
		);
        
        $args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui' 				=> true,
			'show_in_nav_menus' 	=> true,
			'capabilities'			=> array(
				'manage_terms' 		=> $capabilities,
				'edit_terms' 		=> $capabilities,
				'delete_terms' 		=> $capabilities,
				'assign_terms' 		=> $capabilities
			),
			'rewrite' 				=> array( 'slug' => 'product_brand' , 'with_front' => false, 'hierarchical' => true )
		);
        register_taxonomy( 'product_brand', array('product'), apply_filters( 'kt_register_taxonomy_product_brand', $args ));
    }
    public function kt_add_product_brand_fields(){
        ?>
		<div class="form-field">
			<label><?php _e( 'Thumbnail', 'kutetheme' ); ?></label>
			<div id="product_brand_thumbnail" style="float: left; margin-right: 10px;">
                <img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" width="60px" height="60px" />
            </div>
			<div style="line-height: 60px;">
				<input type="hidden" id="product_brand_thumbnail_id" name="product_brand_thumbnail_id" />
				<button type="button" class="upload_image_button button"><?php _e( 'Upload/Add image', 'kutetheme' ); ?></button>
				<button type="button" class="remove_image_button button"><?php _e( 'Remove image', 'kutetheme' ); ?></button>
			</div>
			<script type="text/javascript">

				// Only show the "remove image" button when needed
				if ( ! jQuery( '#product_brand_thumbnail_id' ).val() ) {
					jQuery( '.remove_image_button' ).hide();
				}

				// Uploading files
				var file_frame;

				jQuery( document ).on( 'click', '.upload_image_button', function( event ) {

					event.preventDefault();

					// If the media frame already exists, reopen it.
					if ( file_frame ) {
						file_frame.open();
						return;
					}

					// Create the media frame.
					file_frame = wp.media.frames.downloadable_file = wp.media({
						title: '<?php _e( "Choose an image", "kutetheme" ); ?>',
						button: {
							text: '<?php _e( "Use image", "kutetheme" ); ?>'
						},
						multiple: false
					});

					// When an image is selected, run a callback.
					file_frame.on( 'select', function() {
						var attachment = file_frame.state().get( 'selection' ).first().toJSON();

						jQuery( '#product_brand_thumbnail_id' ).val( attachment.id );
						if( typeof(attachment.sizes.thumbnail) != undefined && attachment.sizes.thumbnail != null){
                            jQuery( '#product_brand_thumbnail img' ).attr( 'src', attachment.sizes.thumbnail.url );
                        }else{
                            jQuery( '#product_brand_thumbnail img' ).attr( 'src', attachment.url );
                        }
						jQuery( '.remove_image_button' ).show();
					});

					// Finally, open the modal.
					file_frame.open();
				});

				jQuery( document ).on( 'click', '.remove_image_button', function() {
					jQuery( '#product_brand_thumbnail img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
					jQuery( '#product_brand_thumbnail_id' ).val( '' );
					jQuery( '.remove_image_button' ).hide();
					return false;
				});

			</script>
			<div class="clear"></div>
		</div>
        <?php
    }
    public function kt_edit_product_brand_fields( $term ){
        $display_type = get_woocommerce_term_meta( $term->term_id, 'display_type', true );
		$thumbnail_id = absint( get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ) );

		if ( $thumbnail_id ) {
			$image = wp_get_attachment_thumb_url( $thumbnail_id );
		} else {
			$image = wc_placeholder_img_src();
		}
		?>
		<tr class="form-field">
			<th scope="row" valign="top"><label><?php _e( 'Thumbnail', 'kutetheme' ); ?></label></th>
			<td>
				<div id="product_brand_thumbnail" style="float: left; margin-right: 10px;">
                    <img src="<?php echo esc_url( $image ); ?>" width="60px" height="60px" />
                </div>
				<div style="line-height: 60px;">
					<input type="hidden" id="product_brand_thumbnail_id" name="product_brand_thumbnail_id" value="<?php echo esc_attr( $thumbnail_id ); ?>" />
					<button type="button" class="upload_image_button button"><?php _e( 'Upload/Add image', 'kutetheme' ); ?></button>
					<button type="button" class="remove_image_button button"><?php _e( 'Remove image', 'kutetheme' ); ?></button>
				</div>
				<script type="text/javascript">

					// Only show the "remove image" button when needed
					if ( '0' === jQuery( '#product_brand_thumbnail_id' ).val() ) {
						jQuery( '.remove_image_button' ).hide();
					}

					// Uploading files
					var file_frame;

					jQuery( document ).on( 'click', '.upload_image_button', function( event ) {

						event.preventDefault();

						// If the media frame already exists, reopen it.
						if ( file_frame ) {
							file_frame.open();
							return;
						}

						// Create the media frame.
						file_frame = wp.media.frames.downloadable_file = wp.media({
							title: '<?php _e( "Choose an image", "kutetheme" ); ?>',
							button: {
								text: '<?php _e( "Use image", "kutetheme" ); ?>'
							},
							multiple: false
						});

						// When an image is selected, run a callback.
						file_frame.on( 'select', function() {
							var attachment = file_frame.state().get( 'selection' ).first().toJSON();
							jQuery( '#product_brand_thumbnail_id' ).val( attachment.id );
                            if( typeof(attachment.sizes.thumbnail) != undefined && attachment.sizes.thumbnail != null){
                                jQuery( '#product_brand_thumbnail img' ).attr( 'src', attachment.sizes.thumbnail.url );
                            }else{
                                jQuery( '#product_brand_thumbnail img' ).attr( 'src', attachment.url );
                            }
							jQuery( '.remove_image_button' ).show();
						});

						// Finally, open the modal.
						file_frame.open();
					});

					jQuery( document ).on( 'click', '.remove_image_button', function() {
						jQuery( '#product_brand_thumbnail img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
						jQuery( '#product_brand_thumbnail_id' ).val( '' );
						jQuery( '.remove_image_button' ).hide();
						return false;
					});

				</script>
				<div class="clear"></div>
			</td>
		</tr>
        <?php
    }
    public function kt_save_product_brand_fields( $term_id, $tt_id = '', $taxonomy = '' ) {
		if ( isset( $_POST['product_brand_thumbnail_id'] ) && 'product_brand' === $taxonomy ) {
			update_woocommerce_term_meta( $term_id, 'thumbnail_id', absint( $_POST['product_brand_thumbnail_id'] ) );
		}
    }
    
    /**
	 * Thumbnail column added to category admin.
	 *
	 * @param mixed $columns
	 * @return array
	 */
	public function kt_product_brand_columns( $columns ) {
		$new_columns          = array();
		$new_columns['cb']    = $columns['cb'];
		$new_columns['thumb'] = __( 'Image', 'kutetheme' );

		unset( $columns['cb'] );

		return array_merge( $new_columns, $columns );
	}

	/**
	 * Thumbnail column value added to category admin.
	 *
	 * @param mixed $columns
	 * @param mixed $column
	 * @param mixed $id
	 * @return array
	 */
	public function kt_product_brand_column( $columns, $column, $id ) {

		if ( 'thumb' == $column ) {

			$thumbnail_id = get_woocommerce_term_meta( $id, 'thumbnail_id', true );

			if ( $thumbnail_id ) {
				$image = wp_get_attachment_thumb_url( $thumbnail_id );
			} else {
				$image = wc_placeholder_img_src();
			}

			// Prevent esc_url from breaking spaces in urls for image embeds
			// Ref: http://core.trac.wordpress.org/ticket/23605
			$image = str_replace( ' ', '%20', $image );

			$columns .= '<img src="' . esc_url( $image ) . '" alt="' . __( 'Thumbnail', 'kutetheme' ) . '" class="wp-post-image" height="48" width="48" />';

		}

		return $columns;
	}
    
    public function kt_product_brand_remove_meta_box(){
	   remove_meta_box('product_branddiv', 'product', 'normal');
	}


	 public function kt_product_brand_add_meta_box() {
		 add_meta_box( 'mytaxonomy_id', 'Brands',array( $this,'kt_product_brand_metabox'),'product' ,'side','core');
	 }

	//Callback to set up the metabox
	public function kt_product_brand_metabox( $post ) {
		//Get taxonomy and terms
		$taxonomy = 'product_brand';
	 
		//Set up the taxonomy object and get terms
		$tax = get_taxonomy($taxonomy);
		$terms = get_terms($taxonomy,array('hide_empty' => 0));
	 
		//Name of the form
		$name = 'tax_input[' . $taxonomy . ']';
	 
		//Get current and popular terms
		$popular = get_terms( $taxonomy, array( 'orderby' => 'count', 'order' => 'DESC', 'number' => 10, 'hierarchical' => false ) );
		$postterms = get_the_terms( $post->ID,$taxonomy );
		$current = ($postterms ? array_pop($postterms) : false);
		$current = ($current ? $current->term_id : 0);
		?>
	 
		<div id="taxonomy-<?php echo esc_attr( $taxonomy ); ?>" class="categorydiv">
	 
			<!-- Display tabs-->
			<ul id="<?php echo esc_attr( $taxonomy ); ?>-tabs" class="category-tabs">
				<li class="tabs"><a href="#<?php echo esc_attr( $taxonomy ); ?>-all" tabindex="3"><?php echo esc_attr( $tax->labels->all_items ); ?></a></li>
				<li class="hide-if-no-js"><a href="#<?php echo esc_attr( $taxonomy ); ?>-pop" tabindex="3"><?php _e( 'Most Used','woocommerce-brands' ); ?></a></li>
			</ul>
	 
			<!-- Display taxonomy terms -->
			<div id="<?php echo esc_attr( $taxonomy ); ?>-all" class="tabs-panel">
				<ul id="<?php echo esc_attr( $taxonomy ); ?>checklist" class="list:<?php echo esc_attr( $taxonomy )?> categorychecklist form-no-clear">
					<?php   
                    foreach($terms as $term):
						$id = $taxonomy.'-'.$term->term_id;
						echo "<li id='$id'>
                                <label class='selectit'>";
						   echo "<input type='radio' id='in-$id' name='{$name}'" . checked( $current, $term->term_id, false )."value='$term->term_id' />$term->name<br />";
					   echo "</label></li>";
					endforeach;
                    ?>
			   </ul>
			</div>
	 
			<!-- Display popular taxonomy terms -->
			<div id="<?php echo esc_attr( $taxonomy ); ?>-pop" class="tabs-panel" style="display: none;">
				<ul id="<?php echo esc_attr( $taxonomy ); ?>checklist-pop" class="categorychecklist form-no-clear" >
					<?php   
                    foreach($popular as $term) :
						$id = 'popular-'.$taxonomy.'-'.$term->term_id;
						echo "<li id='$id'><label class='selectit'>";
						echo "<input type='radio' id='in-$id'" . checked( $current, $term->term_id, false )."value='$term->term_id' />$term->name<br />";
						echo "</label></li>";
					endforeach;
                    ?>
			   </ul>
		   </div>
		</div>
		<?php
	}    
}
new KT_Product_Brand_Taxonomies();
