const myCarouselElement = document.querySelector('#myCarousel');

const carousel = new bootstrap.Carousel(myCarouselElement, {
  interval: 10000, // 10 secondes
  ride: 'carousel',
  pause: false // Empêche l'arrêt au survol de la souris
});