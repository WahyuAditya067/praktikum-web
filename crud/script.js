// ==========================================
// FUNCTION - Fungsi untuk mengelola dropdown menu
// ==========================================

// Function untuk toggle dropdown menu
function toggleDropdown(dropdownElement) {
  const menu = dropdownElement.querySelector('.jadwal-menu, .tim-menu, .pembalap-menu');
  if (menu) {
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
  }
}

// Function untuk menutup semua dropdown
function closeAllDropdowns() {
  const allMenus = document.querySelectorAll('.jadwal-menu, .tim-menu, .pembalap-menu');
  allMenus.forEach(menu => {
    menu.style.display = 'none';
  });
}

// Arrow Function untuk animasi smooth scroll
const smoothScrollTo = (element) => {
  element.scrollIntoView({ behavior: 'smooth', block: 'start' });
};

// Function untuk menambahkan animasi pada card
function addCardAnimation(card) {
  card.style.transition = 'all 0.3s ease';
  card.addEventListener('mouseenter', function() {
    this.style.transform = 'translateY(-5px) scale(1.02)';
  });
  
  card.addEventListener('mouseleave', function() {
    this.style.transform = 'translateY(0) scale(1)';
  });
}

// Arrow Function untuk highlight current page
const highlightCurrentPage = () => {
  const currentPage = window.location.pathname.split('/').pop();
  const navLinks = document.querySelectorAll('nav ul li a');
  
  navLinks.forEach(link => {
    if (link.getAttribute('href') === currentPage) {
      link.style.color = '#e10600';
      link.style.borderBottom = '2px solid #e10600';
    }
  });
};

// ==========================================
// EVENT HANDLING - Menangani interaksi user
// ==========================================

// Function untuk setup semua event handlers
function setupEventHandlers() {
  console.log('Setting up event handlers...');
  
  // Event handling untuk race cards
  const raceCards = document.querySelectorAll('.race-card-full');
  console.log('Jumlah race cards ditemukan: ' + raceCards.length);
  
  raceCards.forEach(card => {
    card.addEventListener('click', function() {
      const raceName = this.querySelector('h5');
      if (raceName) {
        console.log('Race yang diklik: ' + raceName.textContent);
        alert('Halaman detail race akan segera tersedia');
      }
    });
  });

  // Event handling untuk driver cards - TIDAK PERLU LAGI karena sudah pakai <a> tag
  // Driver cards sekarang menggunakan link langsung ke pembalap.php?id=xxx

  // Event handling untuk team cards - TIDAK PERLU LAGI karena sudah pakai <a> tag
  // Team cards sekarang menggunakan link langsung ke tim.php?id=xxx

  // Event handling untuk button hero
  const heroButton = document.querySelector('.hero .btn');
  if (heroButton) {
    console.log('Hero button ditemukan');
    
    heroButton.addEventListener('mouseenter', function() {
      this.style.boxShadow = '0 8px 20px rgba(225, 6, 0, 0.6)';
      this.style.transform = 'scale(1.1)';
    });
    
    heroButton.addEventListener('mouseleave', function() {
      this.style.boxShadow = 'none';
      this.style.transform = 'scale(1)';
    });
  }

  // Tambahkan animasi pada race cards
  const raceCardsForAnimation = document.querySelectorAll('.race-card-full');
  raceCardsForAnimation.forEach(card => addCardAnimation(card));
}

// Arrow Function untuk mengubah warna header saat scroll
const changeHeaderOnScroll = () => {
  const header = document.querySelector('header');
  
  if (header) {
    console.log('Header ditemukan, menambahkan scroll event');
    
    window.addEventListener('scroll', function() {
      if (window.scrollY > 50) {
        header.style.background = 'linear-gradient(135deg, #0f0f0f, #1c1c1c)';
        header.style.boxShadow = '0 4px 10px rgba(225, 6, 0, 0.8)';
        header.style.transition = 'all 0.3s ease';
        console.log('Header berubah - scroll: ' + window.scrollY);
      } else {
        header.style.background = 'linear-gradient(135deg, #1c1c1c, #2c2c2c)';
        header.style.boxShadow = 'none';
        header.style.transition = 'all 0.3s ease';
      }
    });
  }
};

// Event load pada halaman
window.addEventListener('load', function() {
  console.log('Halaman F1Pedia telah selesai dimuat');
  
  // Highlight current page
  highlightCurrentPage();
  
  // Setup semua event handlers
  setupEventHandlers();
  
  // Setup header scroll effect
  changeHeaderOnScroll();
});

// Event handling untuk mega dropdown menus
document.addEventListener('DOMContentLoaded', function() {
  console.log('DOM Content Loaded');
  
  const megaDropdowns = document.querySelectorAll('.mega-dropdown');
  
  megaDropdowns.forEach(dropdown => {
    // Event mouseenter untuk menampilkan menu
    dropdown.addEventListener('mouseenter', function() {
      const menu = this.querySelector('.jadwal-menu, .tim-menu, .pembalap-menu');
      if (menu) {
        menu.style.display = 'block';
      }
    });
    
    // Event mouseleave untuk menyembunyikan menu
    dropdown.addEventListener('mouseleave', function() {
      const menu = this.querySelector('.jadwal-menu, .tim-menu, .pembalap-menu');
      if (menu) {
        menu.style.display = 'none';
      }
    });
  });
});

// Event keyboard untuk navigasi dengan arrow keys
document.addEventListener('keydown', function(event) {
  if (event.key === 'Escape') {
    closeAllDropdowns();
    console.log('Dropdown ditutup dengan tombol Escape');
  }
  
  if (event.key === 'ArrowUp') {
    window.scrollBy({ top: -100, behavior: 'smooth' });
  }
  
  if (event.key === 'ArrowDown') {
    window.scrollBy({ top: 100, behavior: 'smooth' });
  }
});

// ==========================================
// DOM MANIPULATION - Memanipulasi elemen DOM
// ==========================================

// Function untuk menambahkan loading indicator
function showLoadingIndicator() {
  const loadingDiv = document.createElement('div');
  loadingDiv.id = 'loading-indicator';
  loadingDiv.textContent = 'Loading...';
  loadingDiv.style.position = 'fixed';
  loadingDiv.style.top = '50%';
  loadingDiv.style.left = '50%';
  loadingDiv.style.transform = 'translate(-50%, -50%)';
  loadingDiv.style.background = '#e10600';
  loadingDiv.style.color = '#fff';
  loadingDiv.style.padding = '1rem 2rem';
  loadingDiv.style.borderRadius = '10px';
  loadingDiv.style.fontSize = '1.2rem';
  loadingDiv.style.zIndex = '9999';
  
  document.body.appendChild(loadingDiv);
  
  // Hapus loading indicator setelah 2 detik
  setTimeout(() => {
    loadingDiv.remove();
  }, 2000);
}

// Function untuk menambahkan badge "NEW" pada race
function addNewBadge(raceCard) {
  const badge = document.createElement('span');
  badge.textContent = 'NEW';
  badge.style.position = 'absolute';
  badge.style.top = '10px';
  badge.style.right = '10px';
  badge.style.background = '#00d4aa';
  badge.style.color = '#000';
  badge.style.padding = '4px 10px';
  badge.style.borderRadius = '4px';
  badge.style.fontSize = '0.7rem';
  badge.style.fontWeight = 'bold';
  badge.style.zIndex = '10';
  
  raceCard.style.position = 'relative';
  raceCard.appendChild(badge);
  console.log('Badge NEW ditambahkan');
}

// Function untuk menambahkan counter view pada footer
function addViewCounter() {
  const footer = document.querySelector('footer');
  if (footer) {
    const counterDiv = document.createElement('div');
    counterDiv.id = 'view-counter';
    counterDiv.style.marginTop = '1rem';
    counterDiv.style.fontSize = '0.9rem';
    counterDiv.style.color = '#8b949e';
    
    // Simulasi counter (dalam aplikasi nyata, ini akan menggunakan database)
    const viewCount = Math.floor(Math.random() * 10000) + 1000;
    counterDiv.textContent = 'Total Views: ' + viewCount.toLocaleString();
    
    footer.appendChild(counterDiv);
    console.log('View counter ditambahkan: ' + viewCount);
  }
}

// Arrow Function untuk toggle dark/light mode
const toggleTheme = () => {
  const body = document.body;
  const currentBg = body.style.background;
  
  if (currentBg.includes('0f0f0f')) {
    body.style.background = 'linear-gradient(135deg, #f5f5f5, #e0e0e0, #ffffff)';
    body.style.color = '#000';
  } else {
    body.style.background = 'linear-gradient(135deg, #0f0f0f, #1c1c1c, #2c0000)';
    body.style.color = '#f1f1f1';
  }
};

// Function untuk menambahkan timestamp
function addTimestamp() {
  const main = document.querySelector('main');
  if (main) {
    const timestamp = document.createElement('p');
    const now = new Date();
    timestamp.textContent = 'Last updated: ' + now.toLocaleString('id-ID');
    timestamp.style.fontSize = '0.9rem';
    timestamp.style.color = '#8b949e';
    timestamp.style.marginTop = '1rem';
    timestamp.style.textAlign = 'center';
    
    main.appendChild(timestamp);
    console.log('Timestamp ditambahkan');
  }
}

// Jalankan DOM manipulation functions
document.addEventListener('DOMContentLoaded', function() {
  addViewCounter();
  addTimestamp();
  
  // Tambahkan badge NEW pada featured race
  setTimeout(() => {
    const featuredRace = document.querySelector('.race-card-full.featured');
    if (featuredRace) {
      addNewBadge(featuredRace);
    }
  }, 500);
});

// Console log untuk debugging
console.log('Script F1Pedia berhasil dimuat!');
console.log('Menggunakan Function, Arrow Function, Event Handling, dan DOM Manipulation');