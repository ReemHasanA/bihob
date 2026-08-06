import '../css/app.css'; 
import Alpine from 'alpinejs'

Alpine.data('revealOnView', (options = {}) => ({
    isInView: false,
    init() {
        // Hero-style: reveal immediately after mount
        if (options.immediate) {
            setTimeout(() => this.isInView = true, options.delay ?? 100);
            return;
        }
        // Scroll-style: reveal on intersection
        this.$nextTick(() => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.isInView = true;
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: options.threshold ?? 0.5 });
            observer.observe(this.$el);
        });
    }
}));

window.Alpine = Alpine

Alpine.start()