import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
import Lenis from 'lenis';

document.addEventListener('DOMContentLoaded', () => {
  gsap.registerPlugin(ScrollTrigger);

  // Lenis smooth scrolling
  const lenis = new Lenis();
  lenis.on('scroll', ScrollTrigger.update);
  gsap.ticker.add((time) => lenis.raf(time * 1000));
  gsap.ticker.lagSmoothing(0);

  const canvas = document.querySelector('canvas');
  const context = canvas.getContext('2d');

  function setCanvasSize() {
    const pixelRatio = window.devicePixelRatio || 1;
    const horizontalInset = 8; // 8px on left and right
    const topInset = 8; // 8px from the top
    const bottomInset = 8; // optional if you want a gap at the bottom

    const displayWidth = window.innerWidth - horizontalInset * 4;
    const displayHeight = window.innerHeight - topInset - bottomInset;

    canvas.width = displayWidth * pixelRatio;
    canvas.height = displayHeight * pixelRatio;
    canvas.style.width = displayWidth + 'px';
    canvas.style.height = displayHeight + 'px';

    // Position canvas with insets
    canvas.style.position = 'absolute';
    canvas.style.top = topInset + 'px';
    canvas.style.left = horizontalInset + 'px';
    canvas.style.right = horizontalInset + 'px';

    context.setTransform(1, 0, 0, 1, 0, 0); // reset scale
    context.scale(pixelRatio, pixelRatio);
    render();
  }

  window.addEventListener('resize', setCanvasSize);

  const frameCount = 205;
  const currentFrame = (index) =>
    `../../../../wp-content/themes/wsk-theme/assets/img/frames/frame_${(index + 1)
      .toString()
      .padStart(3, '0')}.jpg`;

  let images = [];
  let videoFrames = { frame: 0 };
  let loaded = 0;

  function onImageLoad() {
    loaded++;
    if (loaded === frameCount) {
      setCanvasSize();
      setupScrollTrigger();
    }
  }

  for (let i = 0; i < frameCount; i++) {
    const img = new Image();
    img.onload = onImageLoad;
    img.onerror = onImageLoad;
    img.src = currentFrame(i);
    images.push(img);
  }

  function render() {
    const canvasWidth = canvas.width / (window.devicePixelRatio || 1);
    const canvasHeight = canvas.height / (window.devicePixelRatio || 1);
    context.clearRect(0, 0, canvasWidth, canvasHeight);

    const img = images[videoFrames.frame];
    if (!img || !img.complete) return;

    const imageAspect = img.naturalWidth / img.naturalHeight;
    const canvasAspect = canvasWidth / canvasHeight;
    let drawWidth, drawHeight, drawX, drawY;

    if (imageAspect > canvasAspect) {
      drawHeight = canvasHeight;
      drawWidth = drawHeight * imageAspect;
      drawX = (canvasWidth - drawWidth) / 2;
      drawY = 0;
    } else {
      drawWidth = canvasWidth;
      drawHeight = drawWidth / imageAspect;
      drawX = 0;
      drawY = (canvasHeight - drawHeight) / 2;
    }
    context.drawImage(img, drawX, drawY, drawWidth, drawHeight);
  }

  function setupScrollTrigger() {
    ScrollTrigger.create({
      trigger: '.layout--parallax-hero',
      start: 'top top',
      end: `+=${window.innerHeight * 7}px`,
      pin: true,
      pinSpacing: true,
      scrub: 1,
      onUpdate: (self) => {
        const progress = self.progress;

        const animationProgress = Math.min(progress / 0.9, 1);
        const targetFrame = Math.round(animationProgress * (frameCount - 1));
        videoFrames.frame = targetFrame;
        render();
      },
    });
  }
});
