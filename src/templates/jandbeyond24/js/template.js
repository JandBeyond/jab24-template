"use strict";

document.querySelector('.headerbar__navtoggler').addEventListener('click', () => {
 document.body.classList.toggle('body--activenav');
 if(document.querySelector('.headerbar__navtoggler').innerText === 'MENU') {
   document.querySelector('.headerbar__navtoggler').innerText = 'CLOSE';
 } else {
   document.querySelector('.headerbar__navtoggler').innerText = 'MENU';
 }
});

window.addEventListener('scroll', () => {
 if(window.scrollY > 0) {
  document.body.classList.add('body--isscrolled');
 } else {
  document.body.classList.remove('body--isscrolled');
 }
});

// Scrollanimation Waves Top
let decorationwaves = document.querySelectorAll('.wavedecoration');
if (decorationwaves.length > 0 ) {
  for (let decorationwave of decorationwaves) {
    window.addEventListener('scroll', function () {
      // Wave below Viewport
      if (decorationwave.getBoundingClientRect().top > window.innerHeight && decorationwave.getBoundingClientRect().bottom > window.innerHeight) {
        return
      }
      // Wave above Viewport
      if (decorationwave.getBoundingClientRect().top < window.innerHeight && decorationwave.getBoundingClientRect().bottom < 0) {
        return
      }
      // Wave is in Viewport
      if (decorationwave.getBoundingClientRect().top < window.innerHeight && decorationwave.getBoundingClientRect().bottom > 0) {
        const Position = (map((decorationwave.getBoundingClientRect().top - window.innerHeight) * -1, 0, window.innerHeight * 2, 0, 150));
        decorationwave.style.backgroundPositionX = Position + '%';
      }
    })
  }
}

// Mapping function
function map (num, in_min, in_max, out_min, out_max) {
  return (num - in_min) * (out_max - out_min) / (in_max - in_min) + out_min;
}
