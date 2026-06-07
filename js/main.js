/* ==========================================================================
   Project Birthday Surprise - Interactive Javascript Logic
   ========================================================================== */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Custom Cursor Tracking
    const cursor = document.querySelector('.custom-cursor');
    const follower = document.querySelector('.custom-cursor-follower');
    
    let mouseX = window.innerWidth / 2;
    let mouseY = window.innerHeight / 2;
    let followerX = mouseX;
    let followerY = mouseY;
    
    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
    });

    function updateCursorPosition() {
        // Linear interpolation for smooth follower catchup
        followerX += (mouseX - followerX) * 0.15;
        followerY += (mouseY - followerY) * 0.15;
        
        if (cursor) {
            cursor.style.left = `${mouseX}px`;
            cursor.style.top = `${mouseY}px`;
        }
        if (follower) {
            follower.style.left = `${followerX}px`;
            follower.style.top = `${followerY}px`;
        }
        requestAnimationFrame(updateCursorPosition);
    }
    requestAnimationFrame(updateCursorPosition);

    // 2. Cursor Hover State Listeners (Event Delegation)
    document.addEventListener('mouseover', (e) => {
        const target = e.target;
        if (!target) return;
        
        const isHoverable = target.tagName === 'A' || 
                            target.tagName === 'BUTTON' || 
                            target.tagName === 'INPUT' || 
                            target.tagName === 'TEXTAREA' ||
                            target.closest('button') || 
                            target.closest('a') ||
                            target.classList.contains('interactive') ||
                            target.closest('.interactive') ||
                            target.closest('.glass-card');
                            
        if (isHoverable) {
            document.body.classList.add('cursor-hover');
        } else {
            document.body.classList.remove('cursor-hover');
        }
    });

    // 3. 3D Card Tilt Math
    const setupTiltCards = () => {
        const tiltCards = document.querySelectorAll('.tilt-card');
        tiltCards.forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                // Maximum tilt degrees
                const maxTilt = 8;
                
                // Rotation equations
                const rotateX = ((centerY - y) / centerY) * maxTilt;
                const rotateY = ((x - centerX) / centerX) * maxTilt;
                
                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg)';
                card.style.transition = 'transform 0.5s ease';
            });

            card.addEventListener('mouseenter', () => {
                card.style.transition = 'transform 0.1s ease-out';
            });
        });
    };
    setupTiltCards();

    // 4. Scroll Reveal via Intersection Observer API
    const setupScrollReveal = () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: '0px 0px -40px 0px'
        });
        
        const reveals = document.querySelectorAll('.reveal');
        reveals.forEach(element => {
            observer.observe(element);
        });
    };
    setupScrollReveal();

    // 5. Parallax Scrolling on Scroll Event
    const setupParallax = () => {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            
            // Background shapes parallax
            const bgShapes = document.querySelectorAll('.parallax-shape');
            bgShapes.forEach((shape, index) => {
                const speed = 0.2 * (index % 2 === 0 ? 1 : -1);
                shape.style.transform = `translateY(${scrolled * speed}px)`;
            });

            // Card vertical shift parallax
            const parallaxCards = document.querySelectorAll('.parallax-card');
            parallaxCards.forEach((card, index) => {
                const speed = 0.05 * (index % 2 === 0 ? 1 : -0.7);
                card.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });
    };
    setupParallax();

    // 6. Hearts Particle Generator
    const heartContainer = document.getElementById('heart-container');
    if (heartContainer) {
        const createHeart = () => {
            const heart = document.createElement('span');
            heart.classList.add('material-symbols-outlined', 'heart-particle');
            heart.innerText = 'favorite';
            
            const startX = Math.random() * window.innerWidth;
            const size = Math.random() * 22 + 12; // 12px to 34px
            const duration = Math.random() * 10 + 8; // 8s to 18s
            const opacity = Math.random() * 0.35 + 0.15;
            
            heart.style.left = `${startX}px`;
            heart.style.fontSize = `${size}px`;
            heart.style.animationDuration = `${duration}s`;
            heart.style.opacity = opacity;
            heart.style.fontVariationSettings = "'FILL' 1";
            
            heartContainer.appendChild(heart);
            
            setTimeout(() => {
                heart.remove();
            }, duration * 1000);
        };
        
        // Spawn hearts on interval
        setInterval(createHeart, 900);
        
        // Spawn initial batch
        for (let i = 0; i < 6; i++) {
            setTimeout(createHeart, Math.random() * 4000);
        }
    }
});
