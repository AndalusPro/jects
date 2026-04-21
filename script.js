// 1. Reveal Animation on Scroll
function reveal() {
    const reveals = document.querySelectorAll(".reveal");
    reveals.forEach(el => {
        const windowHeight = window.innerHeight;
        const elementTop = el.getBoundingClientRect().top;
        const elementVisible = 150;
        if (elementTop < windowHeight - elementVisible) {
            el.classList.add("active");
        }
    });
}

window.addEventListener("scroll", reveal);
window.addEventListener("load", reveal);

// 2. Theme Toggle (Light/Dark)
function toggleTheme() {
    const body = document.body;
    body.classList.toggle('dark-theme');
    
    const isDark = body.classList.contains('dark-theme');
    const mainLogo = document.getElementById('main-logo');
    
    // Update Logo based on theme
    mainLogo.src = isDark ? 
        "https://andalus-projects.com/Logo.png" : 
        "https://andalus-projects.com/darklogo.png";
}

// 3. Modal System
const servicesData = {
    badkamer: { 
        title: "Badkamerrenovatie", 
        desc: "Complete renovatie van A tot Z...", 
        items: ["Inloopdouches", "Sanitair", "Tegelwerk"] 
    }
    // Add other services data here...
};

function openDetails(id) {
    const data = servicesData[id];
    const modalContent = document.getElementById('modal-content');
    
    modalContent.innerHTML = `
        <h2 class="text-3xl font-black text-brand-orange uppercase italic">${data.title}</h2>
        <p class="my-4 opacity-80">${data.desc}</p>
        <ul class="space-y-2 mb-6">
            ${data.items.map(i => `<li class="font-bold"><i class="fas fa-check text-brand-orange mr-2"></i>${i}</li>`).join('')}
        </ul>
        <a href="https://wa.me/32483404778" class="block bg-brand-orange text-white py-4 rounded-xl text-center font-bold">CONTACT VIA WHATSAPP</a>
    `;
    
    document.getElementById('detail-layer').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeDetails() {
    document.getElementById('detail-layer').style.display = 'none';
    document.body.style.overflowY = 'auto';
}
