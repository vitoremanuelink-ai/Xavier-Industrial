var currentBranchSlide = 0;
    function showBranchSlide(index) {
      var slides = document.querySelectorAll('.branch-slide');
      var dots = document.querySelectorAll('.branch-dot');
      if (slides.length === 0) return;
      
      if (index >= slides.length) { currentBranchSlide = 0; }
      else if (index < 0) { currentBranchSlide = slides.length - 1; }
      else { currentBranchSlide = index; }
      
      slides.forEach(function(slide) { slide.classList.remove('active'); });
      dots.forEach(function(dot) { dot.classList.remove('active'); });
      
      slides[currentBranchSlide].classList.add('active');
      if (dots[currentBranchSlide]) dots[currentBranchSlide].classList.add('active');
    }
    
    function moveBranchSlide(n) {
      showBranchSlide(currentBranchSlide + n);
    }
    
    function setBranchSlide(index) {
      showBranchSlide(index);
    }
