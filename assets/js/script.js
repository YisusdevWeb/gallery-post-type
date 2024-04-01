jQuery(document).ready(function ($) {
  $(".abrir_galeria").on("click", function (e) {
    e.preventDefault();

    var galeria_frame = wp.media({
      title: "Selecciona Imágenes",
      multiple: true,
    });

    galeria_frame.on("select", function () {
      var attachment = galeria_frame.state().get("selection").toJSON();
      var galeria = attachment.map(function (item) {
        return item.url;
      });

      $("#gallery_images").val(galeria.join(","));
      mostrarGaleriaPreview(galeria);
    });

    galeria_frame.open();
  });

  $(document).on("click", ".eliminar-imagen", function () {
    var imagenUrl = $(this).data("imagen");
    var galeria = $("#gallery_images").val().split(",");
    galeria = galeria.filter(function (url) {
      return url !== imagenUrl;
    });

    $("#gallery_images").val(galeria.join(","));
    mostrarGaleriaPreview(galeria);
  });

  function mostrarGaleriaPreview(galeria) {
    var previewContainer = $("#galeria-preview");
    previewContainer.empty();

    galeria.forEach(function (imagen_url) {
      previewContainer.append(
        '<div class="galeria-item"><img src="' +
          imagen_url +
          '" alt="" style="max-width: 100px; margin-right: 10px;"><button class="eliminar-imagen button" data-imagen="' +
          imagen_url +
          '">X</button></div>'
      );
    });
  }
});
