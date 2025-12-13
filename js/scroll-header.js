
    const mainHeader = document.querySelector('.main-header-container');
    const topHeader = document.querySelector('.top-header');
    let stickyPoint = 90; // Default fallback

    // Hitung tinggi Top Header setelah DOM dimuat
    window.addEventListener('load', () => {
        if (topHeader) {
            stickyPoint = topHeader.offsetHeight;
            // Jika ada margin atau border, Anda mungkin perlu menambahkan window.getComputedStyle()
        }
    });

    function handleScroll() {
        // Jika posisi scroll vertikal (scrollY) lebih besar atau sama dengan tinggi Top Header
        if (window.scrollY >= stickyPoint) {
            mainHeader.classList.add('scrolled');
        } else {
            mainHeader.classList.remove('scrolled');
        }
    }
    window.addEventListener('scroll', handleScroll);
