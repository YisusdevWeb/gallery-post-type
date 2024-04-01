<?php

// Shortcode para mostrar la galería en el contenido del post
function galeria_shortcode($atts)
{
  ob_start(); // Inicia el búfer de salida

  global $post;
  $imagenes_galeria = obtener_imagenes_galeria($post->ID);

  if (!empty($imagenes_galeria)) {
    echo '<div class="elementor-gallery__container e-gallery-container e-gallery-grid e-gallery--ltr e-gallery--lazyload display-flex-galery" style="">';

    $lightbox_slideshow_id = uniqid(); // Genera un ID único para el carrusel del lightbox

    $index = 0;
    foreach ($imagenes_galeria as $imagen) {
      $index++;

      echo '<a class="e-gallery-item elementor-gallery-item elementor-animated-content" href="' . esc_url($imagen['url']) . '" data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="' . $lightbox_slideshow_id . '" data-elementor-lightbox-title="' . esc_attr($imagen['caption']) . '" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6' . $index . esc_url($imagen['url']) . '" style="--column: ' . ($index - 1) . '; --row: 0;">';
      echo '<img src="' . esc_url($imagen['url']) . '" alt="' . esc_attr($imagen['caption']) . '" class="e-gallery-image elementor-gallery-item__image elementor-animated-item--grow e-gallery-image-loaded" loading="lazy" width="300" height="183" />';
      echo '<div class="elementor-gallery-item__overlay"></div>';
      echo '</a>';
    }

    echo '</div>';
  } else {
    echo '<p>No hay imágenes en la galería.</p>';
  }

  return ob_get_clean();
}
add_shortcode('galeria_shortcode', 'galeria_shortcode');



// Registra el shortcode también en el hook 'init'
function registrar_shortcode_galeria()
{
  add_shortcode('galeria_shortcode', 'galeria_shortcode');
}
add_action('init', 'registrar_shortcode_galeria');
