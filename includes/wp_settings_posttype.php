<?php

// Funciones para la galería de imágenes entradas
function obtener_imagenes_galeria($post_id) {
    $galeria_imagenes = get_post_meta($post_id, '_gallery_images', true);

    if ($galeria_imagenes) {
        $galeria = explode(',', $galeria_imagenes);

        // Devolver un array de imágenes con formato adecuado para Elementor
        $imagenes_elementor = array();
        foreach ($galeria as $imagen_url) {
            $imagenes_elementor[] = array(
                'url' => $imagen_url,
                'caption' => '', // Puedes ajustar esto según tus necesidades
            );
        }

        return $imagenes_elementor;
    }

    return array(); // Devolver un array vacío si no hay imágenes
}

function agregar_campo_galeria() {
    add_meta_box(
        'galeria_imagenes',
        'Galería de Imágenes',
        'mostrar_campo_galeria',
        'post', //  Tipo de post al que se aplica el campo (en este caso, solo los posts)
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'agregar_campo_galeria');

function mostrar_campo_galeria($post) {
    $galeria_imagenes = get_post_meta($post->ID, '_gallery_images', true);
    ?>
    <div class="header-Galery">
        <label for="gallery_images" class="label_galeria">Selecciona las imágenes:</label>
    <input type="text" id="gallery_images" name="gallery_images" class="url_galeria" value="<?php echo esc_attr($galeria_imagenes); ?>" />
        <input type="button" value="Seleccionar Imágenes" class="abrir_galeria button" />
</div>
    <div id="galeria-preview" style="display: grid; grid-template-columns: repeat(8, 1fr); justify-items: center;">
        <?php
        if ($galeria_imagenes) {
            $galeria = explode(',', $galeria_imagenes);
            foreach ($galeria as $imagen_url) {
                echo '<div class="galeria-item" >';
                echo '<img src="' . esc_url($imagen_url) . '" alt="" style="max-width: 100px; margin-right: 10px;">';
                echo '<button class="eliminar-imagen button" data-imagen="' . esc_url($imagen_url) . '">X</button>';
                echo '</div>';
            }
        }
        ?>
    </div>
   
    <?php

    // Muestra el shortcode para ser copiado
    echo '<p>Para copiar este shortcode, selecciona el siguiente texto y cópialo:</p>';
    echo '<code>[galeria_shortcode]</code>';
}

function guardar_galeria_imagenes($post_id) {
    if (isset($_POST['gallery_images'])) {
        update_post_meta($post_id, '_gallery_images', sanitize_text_field($_POST['gallery_images']));
    }
}
add_action('save_post', 'guardar_galeria_imagenes');
