// Setisan — Framer Motion inspired animations + interactivity

document.addEventListener('DOMContentLoaded', () => {

  // --- 1. Architectural Text Split (Framer Motion Vibe) ---
  const splitElements = document.querySelectorAll('.split-line');
  splitElements.forEach(el => {
    const lines = el.innerHTML.split('<span>');
    // It's already wrapped in spans in the HTML, we just need to observe it
  });

  // --- 2. Smooth Scroll Reveal ---
  const reveals = document.querySelectorAll('.reveal, .split-line');
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) { 
        e.target.classList.add('visible'); 
        observer.unobserve(e.target); 
      }
    });
  }, observerOptions);
  reveals.forEach(el => observer.observe(el));

  // --- 3. Hero Parallax (Subtle & Professional) ---
  const parallaxImg = document.querySelector('.parallax-img');
  if (parallaxImg) {
    window.addEventListener('scroll', () => {
      const scrolled = window.scrollY;
      if (scrolled < window.innerHeight) {
        // Very slow, professional parallax translation
        parallaxImg.style.transform = `translateY(${scrolled * 0.25}px) scale(1.05)`;
      }
    }, { passive: true });
  }

  // --- 4. Category Filter ---
  const filterBtns = document.querySelectorAll('.filter-btn');
  const serviceCards = document.querySelectorAll('.service-card');

  if (filterBtns.length > 0) {
    filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        // Remove active class from all
        filterBtns.forEach(b => b.classList.remove('active'));
        // Add active to clicked
        btn.classList.add('active');

        const filterValue = btn.getAttribute('data-filter');

        // Step 1: Animate all cards out
        serviceCards.forEach(card => {
          card.classList.remove('visible');
        });

        // Step 2: Wait for fade out, then swap display states and animate in
        setTimeout(() => {
          serviceCards.forEach(card => {
            if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
              card.style.display = 'grid'; // show in DOM
              
              // Step 3: Trigger reflow and animate in
              requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                  card.classList.add('visible');
                });
              });
            } else {
              card.style.display = 'none'; // hide from DOM
            }
          });
        }, 400); // 400ms delay gives enough time for a smooth fade out before snapping layout
      });
    });
  }

  // --- 5. Sticky Navbar ---
  const navbar = document.querySelector('.navbar');
  if (navbar) {
    window.addEventListener('scroll', () => {
      navbar.classList.toggle('scrolled', window.scrollY > 40);
    }, { passive: true });
  }

  // --- Mobile Nav ---
  const toggle = document.querySelector('.navbar__toggle');
  const nav    = document.querySelector('.navbar__nav');
  if (toggle && nav) {
    toggle.addEventListener('click', () => nav.classList.toggle('open'));
    document.addEventListener('click', (e) => {
      if (!navbar.contains(e.target)) nav.classList.remove('open');
    });
  }

  // --- Number Counter Animation ---
  const counters = document.querySelectorAll('.stat__number[data-target]');
  if (counters.length) {
    const cObs = new IntersectionObserver((entries) => {
      entries.forEach(e => {
        if (!e.isIntersecting) return;
        const el = e.target;
        const target = parseFloat(el.dataset.target);
        const suffix = el.dataset.suffix || '';
        const prefix = el.dataset.prefix || '';
        const duration = 1500;
        const start = performance.now();
        const animate = (now) => {
          const t = Math.min((now - start) / duration, 1);
          const val = Math.floor(t * target);
          el.textContent = prefix + val + suffix;
          if (t < 1) requestAnimationFrame(animate);
          else el.textContent = prefix + target + suffix;
        };
        requestAnimationFrame(animate);
        cObs.unobserve(el);
      });
    }, { threshold: 0.5 });
    counters.forEach(c => cObs.observe(c));
  }

  // --- Project Filter ---
  const filterTabs = document.querySelectorAll('.filter-tab[data-filter]');
  const projectCards = document.querySelectorAll('.project-card[data-service]');
  if (filterTabs.length && projectCards.length) {
    filterTabs.forEach(tab => {
      tab.addEventListener('click', () => {
        filterTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        const filter = tab.dataset.filter;
        projectCards.forEach(card => {
          const show = filter === 'all' || card.dataset.service === filter;
          card.style.transition = 'opacity .3s, transform .3s';
          card.style.opacity  = show ? '1' : '0';
          card.style.transform = show ? 'scale(1)' : 'scale(.97)';
          card.style.pointerEvents = show ? '' : 'none';
        });
      });
    });
  }

  // --- Form Submit Loading State ---
  const forms = document.querySelectorAll('form.contact-form');
  forms.forEach(form => {
    form.addEventListener('submit', () => {
      const btn = form.querySelector('[type="submit"]');
      if (btn) { btn.disabled = true; btn.textContent = 'Gönderiliyor…'; }
    });
  });

  // --- Marquee auto-scroll ---
  const marquee = document.querySelector('.marquee__track');
  if (marquee) {
    let pos = 0;
    const speed = 0.5;
    const tick = () => {
      pos -= speed;
      if (pos <= -marquee.scrollWidth / 2) pos = 0;
      marquee.style.transform = `translateX(${pos}px)`;
      requestAnimationFrame(tick);
    };
    requestAnimationFrame(tick);
  }
});
