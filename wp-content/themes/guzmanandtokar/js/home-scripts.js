document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.tab-btn').forEach(button => {
        button.addEventListener('click', () => {
            const tabId = button.getAttribute('data-tab');
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
            button.classList.add('active');
            const tabContent = document.getElementById(tabId);
            if (tabContent) tabContent.classList.add('active');
        });
    });

    const firstHeader = document.querySelector('.accordion-item h3');

    if (firstHeader) {
        const firstContent = firstHeader.nextElementSibling;
        firstHeader.classList.add('active');
        firstContent.style.maxHeight = firstContent.scrollHeight + 'px';

        document.querySelectorAll('.accordion-item h3').forEach(header => {
            header.addEventListener('click', () => {
                const content = header.nextElementSibling;
                const isOpen = header.classList.contains('active');

                document.querySelectorAll('.accordion-item h3').forEach(h => h.classList.remove('active'));
                document.querySelectorAll('.accordion-item p').forEach(c => c.style.maxHeight = null);

                if (!isOpen) {
                    header.classList.add('active');
                    content.style.maxHeight = content.scrollHeight + 'px';
                }
            });
        });
    }

    const mountIfExists = (selector, options = {}, extensions = null) => {
        const el = document.querySelector(selector);
        if (el && typeof Splide !== 'undefined') {
            try {
                const splide = new Splide(el, options);
                splide.mount(extensions || {});
            } catch (e) {
                console.error(`Failed to mount Splide on ${selector}:`, e);
            }
        }
    };

    const splideExtensions = typeof Splide !== 'undefined' && Splide.Extensions ? Splide.Extensions : undefined;

    mountIfExists('#home-loop-slider', {
        type: 'loop',
        perPage: 14,
        autoScroll: {
            speed: 1,
        },
    }, splideExtensions);

    mountIfExists('#home-reviews-slider', {
        type: 'loop',
        perPage: 3,
        perMove: 3,
        speed: 2000,
    });

    mountIfExists('#home-awards-slider', {
        type: 'loop',
        perPage: 5,
        autoplay: true,
        perMove: 1,
        interval: 2000,
        speed: 2500,
    });

    mountIfExists('#home-posts-slider', {
        type: 'loop',
        perPage: 3,
        perMove: 1,
        speed: 2000,
    });

    mountIfExists('#home-results-slider', {
        type: 'loop',
        autoplay: true,
        perPage: 4,
        perMove: 1,
        interval: 2000,
        speed: 2500,
    });

    mountIfExists('#home-practice-slider', {
        type: 'loop',
        autoplay: true,
        perPage: 4,
        perMove: 1,
        interval: 2000,
        speed: 2500,
    });

    mountIfExists('#home-practice-areas', {
        type: 'loop',
        perMove: 1,
        perPage: 3,
        mediaQuery: 'min',
        breakpoints: {
            640: {
                destroy: true,
            },
        },
    });
});


