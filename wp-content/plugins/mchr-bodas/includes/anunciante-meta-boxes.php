<?php
// Añade una sección en Nueva anunciante para los meta.
function anunciantes_meta_box_init() {
	$id = 'anunciante_meta';
	$title = 'Datos del anunciante';
	$callback = 'anunciante_meta_box';
	$page = 'anunciante';
	$context = 'normal';
	$priority = 'default';
	//write_log("Hookeando la meta_box...");
	add_meta_box($id, $title, $callback, $page, $context, $priority);
}
// Función para mostrar el meta_box para la anunciante.
function anunciante_meta_box ( $anunciante, $box ) {
	// Retrieve the custom meta box values
	$logo_url = get_post_meta( $anunciante->ID, '_logo_url', true );
	$auspiciante = get_post_meta( $anunciante->ID, '_auspiciante', true );
	$direccion = get_post_meta( $anunciante->ID, '_direccion', true );
	$ciudad = get_post_meta( $anunciante->ID, '_ciudad', true );
	$telefono1 = get_post_meta( $anunciante->ID, '_telefono1', true );
	$telefono2 = get_post_meta( $anunciante->ID, '_telefono2', true );
	$telefono3 = get_post_meta( $anunciante->ID, '_telefono3', true );
	$email = get_post_meta( $anunciante->ID, '_email', true );
	$web = get_post_meta( $anunciante->ID, '_web', true );
	$facebook = get_post_meta( $anunciante->ID, '_facebook', true );
	// Nonce for security
	wp_nonce_field( plugin_basename( __FILE__ ), 'anunciante_guardar_meta_box' );
	?>
	<div class="logo_upload">
		<img id="logo_img" src="<?php echo $logo_url; ?>" width="150">
		<a id="img_upload" class="button">Elegir imagen</a>
		<input type="hidden" id="logo_url" name="logo_url" value='<?php echo $logo_url ?>' />
	</div>
	<?php
	// custom meta box form elements
	echo '<p>Auspiciante <input type="checkbox" name="auspiciante" value="1"';
	if( $auspiciante === "1" )
		echo 'checked';
	echo '/></p>';
	echo '<p>Dirección <input type="text" name="direccion" value="'.esc_attr( $direccion ).'" size="40" /></p>';
	echo '<p>Ciudad <input type="text" name="ciudad" value="'.esc_attr( $ciudad ).'" size="40" /></p>';
	echo '<p>Teléfono <input type="text" name="telefono1" value="'.esc_attr( $telefono1 ).'" size="20" /></p>';
	echo '<p>Teléfono opt. <input type="text" name="telefono2" value="'.esc_attr( $telefono2 ).'" size="20" /></p>';
	echo '<p>Teléfono opt. 2 <input type="text" name="telefono3" value="'.esc_attr( $telefono3 ).'" size="20" /></p>';
	echo '<p>Email <input type="text" name="email" value="'.esc_attr( $email ).'" size="40" /></p>';
	echo '<p>Facebook <input type="text" name="facebook" value="'.esc_attr( $facebook ).'" size="40" /></p>';
	echo '<p>Sitio web <input type="text" name="web" value="'.esc_attr( $web ).'" size="40" /></p>';

	?>
	<div id="fotos_galeria">
		<?php
			   $args = array(
        'posts_per_page' => 5,
        'order'          => 'ASC',
        'post_mime_type' => 'image',
        'post_parent'    => $anunciante->ID,
        'post_status'    => null,
        'post_type'      => 'attachment',
    );
 
    $attachments = get_children( $args );
 
    if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
            $dims = array();
            $dims[] = 150;
            $dims[] = 150;
            $image_attributes = wp_get_attachment_image_src( $attachment->ID, $dims );
            echo '<img src="' . esc_url( $image_attributes[0] ) . '" class="foto_galeria" />';
        }
      }
		?>
		<a id="nueva_foto_upload" class="button">Agregar foto</a>
		<!--<input type="hidden" id="nueva_foto_url" name="nueva_foto_url" value='<?php echo $nueva_foto_url ?>' /> -->
	</div>

	<?php
}
?>

<?php
add_action( 'save_post', 'anunciante_guardar_meta_box' );
// Funcion para guardar los atributos cargados en la vista edit/new anunciante
function anunciante_guardar_meta_box( $post_id ) {
	// guarda solamente si 'direccion' esta seteado
	if( isset( $_POST['direccion'] ) ) {
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return;
		wp_verify_nonce( plugin_basename( __FILE__ ), 'anunciante_guardar_meta_box' );

		update_post_meta( $post_id, '_logo_url', sanitize_text_field( $_POST['logo_url'] ) );
		update_post_meta( $post_id, '_direccion', sanitize_text_field( $_POST['direccion'] ) );
		update_post_meta( $post_id, '_auspiciante', sanitize_text_field( $_POST['auspiciante'] ) );
		update_post_meta( $post_id, '_ciudad', sanitize_text_field( $_POST['ciudad'] ) );
		update_post_meta( $post_id, '_telefono1', sanitize_text_field( $_POST['telefono1'] ) );
		update_post_meta( $post_id, '_telefono2', sanitize_text_field( $_POST['telefono2'] ) );
		update_post_meta( $post_id, '_telefono3', sanitize_text_field( $_POST['telefono3'] ) );
		update_post_meta( $post_id, '_email', sanitize_text_field( $_POST['email'] ) );
		update_post_meta( $post_id, '_web', sanitize_text_field( $_POST['web'] ) );
		update_post_meta( $post_id, '_facebook', sanitize_text_field( $_POST['facebook'] ) );
	}
}
?>