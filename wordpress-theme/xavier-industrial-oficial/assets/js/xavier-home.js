(function () {
      var isMobile = window.matchMedia('(max-width: 768px)');

      function initLogoObserver() {
        if (!isMobile.matches) return; // só atua no mobile

        var logos = document.querySelectorAll('.client-logo');
        if (!('IntersectionObserver' in window)) {
          // fallback: mostra todas
          logos.forEach(function (el) { el.classList.add('is-visible'); });
          return;
        }

        var observer = new IntersectionObserver(function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              entry.target.classList.add('is-visible');
              observer.unobserve(entry.target); // ativa uma vez
            }
          });
        }, { threshold: 0.2 });

        logos.forEach(function (el) { observer.observe(el); });
      }

      // IntersectionObserver: Animação de contagem de números
      function initCounters() {
        var counters = document.querySelectorAll('.counter');
        if (counters.length === 0) return;

        var observer = new IntersectionObserver(function(entries) {
          entries.forEach(function(entry) {
            if (entry.isIntersecting) {
              var el = entry.target;
              var target = parseInt(el.getAttribute('data-target'), 10);
              var duration = 2000; // 2 segundos
              var start = null;

              function step(timestamp) {
                if (!start) start = timestamp;
                var progress = timestamp - start;
                // easeOutQuad
                var ease = 1 - Math.pow(1 - Math.min(progress / duration, 1), 3);
                var current = Math.floor(ease * target);

                el.innerText = current.toLocaleString('pt-BR');

                if (progress < duration) {
                  window.requestAnimationFrame(step);
                } else {
                  el.innerText = target.toLocaleString('pt-BR');
                }
              }
              window.requestAnimationFrame(step);
              observer.unobserve(el);
            }
          });
        }, { threshold: 0.5 });

        counters.forEach(function(el) { observer.observe(el); });
      }

      // Inicializa após DOM carregar
      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initLogoObserver);
        document.addEventListener('DOMContentLoaded', initCounters);
      } else {
        initLogoObserver();
        initCounters();
      }

      // Re-verifica se a janela for redimensionada
      isMobile.addEventListener('change', initLogoObserver);
    })();
