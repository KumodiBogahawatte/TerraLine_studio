class Lightbox {
    constructor() {
        this.currentIndex = 0;
        this.images = [];
        this.init();
    }
    
    init() {
        // Create lightbox container
        this.createLightbox();
        
        // Add click event to gallery images
        document.querySelectorAll('[data-lightbox]').forEach((img, index) => {
            img.addEventListener('click', (e) => {
                e.preventDefault();
                this.open(index);
            });
            
            // Store image data
            this.images.push({
                src: img.src,
                caption: img.getAttribute('data-caption') || '',
                alt: img.alt
            });
        });
    }
    
    createLightbox() {
        const lightbox = document.createElement('div');
        lightbox.className = 'lightbox-gallery';
        lightbox.id = 'lightbox';
        
        lightbox.innerHTML = `
            <span class="lightbox-close">&times;</span>
            <span class="lightbox-prev">&#10094;</span>
            <span class="lightbox-next">&#10095;</span>
            <div class="lightbox-content">
                <img src="" alt="">
                <div class="lightbox-caption"></div>
            </div>
        `;
        
        document.body.appendChild(lightbox);
        
        // Add event listeners
        this.lightbox = lightbox;
        this.closeBtn = lightbox.querySelector('.lightbox-close');
        this.prevBtn = lightbox.querySelector('.lightbox-prev');
        this.nextBtn = lightbox.querySelector('.lightbox-next');
        this.imgElement = lightbox.querySelector('img');
        this.captionElement = lightbox.querySelector('.lightbox-caption');
        
        this.closeBtn.addEventListener('click', () => this.close());
        this.prevBtn.addEventListener('click', () => this.navigate(-1));
        this.nextBtn.addEventListener('click', () => this.navigate(1));
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!this.lightbox.classList.contains('active')) return;
            
            if (e.key === 'Escape') this.close();
            if (e.key === 'ArrowLeft') this.navigate(-1);
            if (e.key === 'ArrowRight') this.navigate(1);
        });
        
        // Click outside to close
        this.lightbox.addEventListener('click', (e) => {
            if (e.target === this.lightbox) {
                this.close();
            }
        });
    }
    
    open(index) {
        this.currentIndex = index;
        this.updateImage();
        this.lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    
    close() {
        this.lightbox.classList.remove('active');
        document.body.style.overflow = '';
    }
    
    navigate(direction) {
        this.currentIndex = (this.currentIndex + direction + this.images.length) % this.images.length;
        this.updateImage();
    }
    
    updateImage() {
        const image = this.images[this.currentIndex];
        this.imgElement.src = image.src;
        this.imgElement.alt = image.alt;
        this.captionElement.textContent = image.caption;
    }
}

// Initialize lightbox when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new Lightbox();
});