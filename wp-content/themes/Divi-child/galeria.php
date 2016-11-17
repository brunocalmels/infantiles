<?php
/**
 * Devuelve una galerería con las imágenes de un post (o custom post).
 * Máximo 5 imágenes.
 *
 * @param int $post_id Post ID.
 * @param int $ancho Ancho de las imágenes.
 * @param int $alto Alto de las imágenes.
 */
function galeria_anunciante( $post_id, $ancho, $alto ) {
    $args = array(
        'posts_per_page' => -1,
        'order'          => 'ASC',
        'post_mime_type' => 'image',
        'post_status'    => null,
        'post_type'      => 'attachment',
        'meta_query'     => array(
            array(
                'key' => '_en_galeria_de',
                'value' => $post_id
                )
            )
    );
 
    $attachments = get_children( $args );
 
    if ( $attachments ) {
        $apertura = '[tabs slidertype="images" auto="no"]';
        $contenido = '';
        foreach ( $attachments as $attachment ) {
            ?>
            <a class="a-popup" href="<?php echo wp_get_attachment_image_url( $attachment->ID, 'original' ) ?>">
                <img src="<?php echo wp_get_attachment_image_url( $attachment->ID, 'medium' ) ?>" srcset="<?php echo wp_get_attachment_image_srcset( $attachment->ID, 'medium' ) ?>" sizes="<?php echo wp_get_attachment_image_sizes( $attachment->ID, 'medium' ) ?>" />
            </a>
            <?php
            /*
            $dims = array();
            $dims[] = $ancho;
            $dims[] = $alto;
            $image_attributes = wp_get_attachment_image_src( $attachment->ID, $dims );
            $contenido .= '[imagetab width="230" height="300"]';
            $contenido .= esc_url( $image_attributes[0] );
            $contenido .= '[/imagetab]';
            */
        }
        $clausura = '[/tabs]';
        //echo do_shortcode( $apertura . $contenido . $clausura );
        ?>
        <?php
        return 1;
    }
    else 
        return 0;
}

?>