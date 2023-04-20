setTimeout(function() {
  const message = document.querySelector('#message');
  message.style.transition = 'opacity 5s ease';
  message.style.opacity = 0;
  message.addEventListener('transitionend', function() {
    this.remove();
  });
}, 1000);
