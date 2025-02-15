/*
<slide-show> web component
*/

const config = {
  datasetActive: 'data-active',
  datasetPause: 'data-pause',
  intersectThreshold: 0.3
};

class SlideShow extends HTMLElement {

  constructor() {
    super();
  }

  // initialise
  connectedCallback() {

    // only one item or an iframe?
    if (this.children.length < 2 || this.querySelector('iframe')) return;

    // initialize
    Array.from( this.children ).forEach(i => {

      // pause all
      this.pause(i);

      // remove class
      i.dataset.class = i.className;
      i.className = '';

      // CSS animation
      i.addEventListener('animationend', e => {
        const t = e.target;
        if (!this.#isVideo(t)) this.#nextSlide(t);
      });

      if (this.#isVideo(i)) {

        // remove video looping
        i.loop = false;

        // speed
        i.playbackRate = parseFloat(i.dataset.rate || 1);

        // video playback ended event
        i.addEventListener('ended', e => {
          const t = e.target;
          this.#nextSlide(t);
        });

      }

    });

    // window/tab active?
    document.addEventListener('visibilitychange',
      () => this.#eventVisibility(document.visibilityState !== 'hidden')
    );

    // component in view?
    const observer = new IntersectionObserver(entries => {
      this.#eventVisibility(entries[0].intersectionRatio >= config.intersectThreshold);
    }, {
      threshold: config.intersectThreshold
    });
    observer.observe(this);


    // activate first slide
    this.#nextSlide();

  }


  // video and/or animation has ended
  #nextSlide(active) {

    const
      currentActive = this.#getActive(),
      nextActive = currentActive?.nextElementSibling || this.firstElementChild,
      isVideo = this.#isVideo(nextActive);

    // rewind next video
    if (isVideo) {
      nextActive.currentTime = 0;
    }

    // activate
    if (currentActive) {
      currentActive.removeAttribute(config.datasetActive);
      currentActive.className = '';
    }
    nextActive.setAttribute(config.datasetActive, '');

    // reapply animated effect
    nextActive.className = nextActive.dataset.class;
    this.play(nextActive);

  }


  // tab/component visibility change
  #eventVisibility(visible) {
    this.inView = visible;
    if (this.inView) this.play();
    else this.pause();
  }


  // play video/animation
  play(e) {

    const active = e || this.#getActive();

    if (this.#isVideo(active)) active.play();
    active.removeAttribute(config.datasetPause);

    // console.log('play', active);

  }


  // pause video/animation
  pause(e) {

    const active = e || this.#getActive();

    if (this.#isVideo(active)) active.pause();
    active.setAttribute(config.datasetPause, '');

    // console.log('pause', active);

  }


  // get active item
  #getActive() {
    return this.querySelector(`[${ config.datasetActive }]`);
  }


  // is node a <video> element?
  #isVideo(e) {
    return (e.nodeName.toUpperCase() === 'VIDEO');
  }

}

// register component
window.customElements.define('slide-show', SlideShow);
