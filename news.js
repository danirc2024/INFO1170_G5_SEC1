const myCarousel = document.querySelector('#newsCarousel');
const carousel = new bootstrap.Carousel(myCarousel, {
    interval: 2000,  // Cambia la imagen cada 2 segundos
    ride: 'carousel'
});