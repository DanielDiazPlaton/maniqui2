$(document).scroll(function() {
    var isScrolled = $(this).scrollTop() > $(".topBar").height();
    $(".topBar").toggleClass("scrolled", isScrolled);
})

function previewEnded() {

    // alterna al onended del video
    $(".previewVideo").toggle();
    $(".previewImage").toggle();

} // fin de la funcion previewEnded

function watchProduct(productoId) {
    window.location.href = "producto.php?id=" + productoId;
} // end the function watchProduct()