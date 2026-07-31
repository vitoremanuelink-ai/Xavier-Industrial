const autoplays = {};
    let currentImageIndex = 0;
    let portfolioImages = [];

    function scrollCarousel(carouselId, direction, manual = false) {
      const container = document.getElementById(carouselId);
      if (!container) return;
      
      if (manual) {
        container.dataset.interacted = "true";
        stopAutoplay(carouselId);
      }
      
      const scrollAmount = 524; // Card width (500px) + Gap (24px)
      const maxScroll = container.scrollWidth - container.clientWidth;
      
      let newScroll = container.scrollLeft + (direction * scrollAmount);
      
      // Se for automático e chegar no final, volta para o início
      if (!manual && direction > 0 && container.scrollLeft >= maxScroll - 10) {
        newScroll = 0;
      } else if (!manual && direction < 0 && container.scrollLeft <= 10) {
        newScroll = maxScroll;
      } else {
        // Correções normais de limite
        if (newScroll < 0) newScroll = 0;
        if (newScroll > maxScroll) newScroll = maxScroll;
      }

      container.scrollTo({
        left: newScroll,
        behavior: 'smooth'
      });
    }

    function startAutoplay(carouselId) {
      if (autoplays[carouselId]) return;
      autoplays[carouselId] = setInterval(() => {
        scrollCarousel(carouselId, 1, false);
      }, 3500); // Passa a cada 3.5 segundos
    }

    function stopAutoplay(carouselId) {
      if (autoplays[carouselId]) {
        clearInterval(autoplays[carouselId]);
        delete autoplays[carouselId];
      }
    }

    // Funções do Lightbox
    function openLightbox(imgElement) {
      const lightbox = document.getElementById('portfolio-lightbox');
      const lightboxImg = document.getElementById('lightbox-img');
      const lightboxCaption = document.getElementById('lightbox-caption');
      if (!lightbox || !lightboxImg || !lightboxCaption) return;

      // Coleta todas as imagens se ainda não foi feito
      if (portfolioImages.length === 0) {
        portfolioImages = Array.from(document.querySelectorAll('.portfolio-card img'));
      }

      currentImageIndex = portfolioImages.indexOf(imgElement);

      updateLightboxContent();
      lightbox.classList.add('active');
      document.body.style.overflow = 'hidden'; // Bloqueia o scroll da página
    }

    function updateLightboxContent() {
      const lightboxImg = document.getElementById('lightbox-img');
      const lightboxCaption = document.getElementById('lightbox-caption');
      if (!lightboxImg || !lightboxCaption || portfolioImages.length === 0) return;

      const currentImg = portfolioImages[currentImageIndex];
      lightboxImg.src = currentImg.src;
      lightboxImg.alt = currentImg.alt;
      lightboxCaption.innerText = currentImg.alt;
    }

    function closeLightbox(event) {
      if (event && event.target.closest('.lightbox-arrow')) return;

      const lightbox = document.getElementById('portfolio-lightbox');
      if (lightbox) {
        lightbox.classList.remove('active');
        document.body.style.overflow = ''; // Restaura scroll
      }
    }

    function navigateLightbox(direction, event) {
      if (event) event.stopPropagation();

      if (portfolioImages.length === 0) return;
      currentImageIndex = (currentImageIndex + direction + portfolioImages.length) % portfolioImages.length;
      updateLightboxContent();
    }

    // Atalhos do teclado para o Lightbox
    document.addEventListener('keydown', (event) => {
      const lightbox = document.getElementById('portfolio-lightbox');
      if (!lightbox || !lightbox.classList.contains('active')) return;

      if (event.key === 'Escape') {
        closeLightbox();
      } else if (event.key === 'ArrowRight') {
        navigateLightbox(1);
      } else if (event.key === 'ArrowLeft') {
        navigateLightbox(-1);
      }
    });

    // Inicializa o Autoplay e listeners de interação para os 3 carrosséis
    document.addEventListener('DOMContentLoaded', () => {
      const carousels = ['usinagem-carousel', 'caldeiraria-carousel', 'metalizacao-carousel'];
      
      carousels.forEach(id => {
        const container = document.getElementById(id);
        if (!container) return;
        
        startAutoplay(id);

        // Se o usuário passar o mouse por cima, pausa temporariamente. Ao sair, retoma.
        const wrapper = container.closest('.portfolio-carousel-wrapper');
        if (wrapper) {
          wrapper.addEventListener('mouseenter', () => stopAutoplay(id));
          wrapper.addEventListener('mouseleave', () => {
            // Só retoma se não tiver sido cancelado definitivamente por um clique
            if (!container.dataset.interacted) {
              startAutoplay(id);
            }
          });
        }

        // Detecta interações diretas como toque, scroll com mouse ou wheel para cancelar definitivamente o autoplay
        const userInteractionHandler = () => {
          container.dataset.interacted = "true";
          stopAutoplay(id);
        };
        
        container.addEventListener('touchstart', userInteractionHandler, { passive: true });
        container.addEventListener('wheel', userInteractionHandler, { passive: true });
      });

      // Adiciona o listener de clique para ampliar as imagens
      const cardImages = document.querySelectorAll('.portfolio-card-img-container');
      cardImages.forEach(container => {
        container.style.cursor = 'pointer';
        container.addEventListener('click', () => {
          const img = container.querySelector('img');
          if (img) {
            // Se abrir o lightbox, pausa o autoplay dos carrosséis correspondentes
            const carousel = container.closest('.portfolio-carousel-container');
            if (carousel) {
              carousel.dataset.interacted = "true";
              stopAutoplay(carousel.id);
            }
            openLightbox(img);
          }
        });
      });
    });
