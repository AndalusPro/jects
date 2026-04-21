/* --- Slider Logic --- */
let slideIdx = 0;
const sliderWrapper = document.getElementById('main-slider');
const slides = document.querySelectorAll('.slide');
const dotsBox = document.getElementById('dots-container');

slides.forEach((_, i) => {
    const dot = document.createElement('div');
    dot.className = `dot ${i === 0 ? 'active' : ''}`;
    dot.onclick = () => jumpToSlide(i);
    dotsBox.appendChild(dot);
});

function updateSlider() {
    sliderWrapper.style.transform = `translateX(-${slideIdx * 100}%)`;
    document.querySelectorAll('.dot').forEach((d, i) => d.classList.toggle('active', i === slideIdx));
}

function moveSlide(n) {
    slideIdx = (slideIdx + n + slides.length) % slides.length;
    updateSlider();
}

function jumpToSlide(i) {
    slideIdx = i;
    updateSlider();
}

// Auto play slider
setInterval(() => moveSlide(1), 5000);

/* --- Theme Toggle --- */
function toggleTheme() {
    const body = document.body;
    const icons = document.querySelectorAll('.theme-icon');
    const mainLogo = document.getElementById('main-logo');
    const footerLogo = document.getElementById('footer-logo');

    body.classList.toggle('dark-theme');
    const isDark = body.classList.contains('dark-theme');
    
    // Fixed Logo URLs based on theme
    const lightLogoUrl = "https://andalus-projects.com/darklogo.png";
    const darkLogoUrl = "https://andalus-projects.com/Logo.png";

    icons.forEach(icon => {
        if (isDark) {
            icon.classList.replace('fa-moon', 'fa-sun');
        } else {
            icon.classList.replace('fa-sun', 'fa-moon');
        }
    });

    mainLogo.src = isDark ? darkLogoUrl : lightLogoUrl;
    footerLogo.src = isDark ? darkLogoUrl : lightLogoUrl;
}

/* --- UI Controls --- */
function toggleMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
    menu.classList.toggle('flex');
}

const servicesData = {
    badkamer: { title: "Badkamerrenovatie", desc: "Wilt u uw badkamer volledig vernieuwen? Wij bieden professionele badkamerrenovaties van A tot Z, volledig afgestemd op uw wensen en budget. Van sloopwerk en leidingen tot tegelwerk, stucwerk en afwerking.", items: ["Inloopdouches", "Luxe badkamermeubels", "Leidingwerk"] },
    tegelwerk: { title: "Professionele Tegelwerken", desc: "Kwaliteit en Precisie. Wij bieden hoogwaardige tegelwerken voor badkamers, keukens, vloeren en terrassen met oog voor detail.", items: ["Vakkundige plaatsing", "Hoogwaardige materialen", "Nauwkeurige uitvoering"] },
    stucwerk: { title: "Professioneel Stucwerk", desc: "Op zoek naar perfect afgewerkte muren en plafonds? Wij bieden professioneel stucwerk voor zowel nieuwbouw als renovatieprojecten.", items: ["Glad pleisterwerk", "Renovatie en nieuwbouw", "Betaalbare prijzen"] },
    schilderwerk: { title: "Professioneel Schilderwerk", desc: "Wilt u uw woning een frisse uitstraling geven? Wij bieden professioneel schilderwerk voor binnen- en buitentoepassingen.", items: ["Binnen- en buitenwerk", "Strakke afwerking", "Topkwaliteit verf"] },
    schoonmaken: { title: "Reinigingsdiensten", desc: "Eindschoonmaak na bouw of renovatie. Wij verwijderen alle bouwresten, stof en vuil zodat uw ruimte direct klaar is voor gebruik.", items: ["Bouwschoonmaak", "Tuinonderhoud", "Gebouwenreiniging"] },
    laminaatleggen: { title: "Vloerplaatsing", desc: "Gespecialiseerd in het plaatsen van laminaat, visgraat en PVC vloeren voor woningen en commerciële ruimtes.", items: ["Laminaat & PVC", "Visgraat patronen", "Ondervloer preparatie"] }
};

function openDetails(id) {
    const data = servicesData[id];
    document.getElementById('modal-content').innerHTML = `
        <h2 class="text-3xl font-black mb-2 uppercase italic text-brand-orange">${data.title}</h2>
        <div class="w-12 h-1 bg-brand-orange mb-6"></div>
        <p class="mb-6 leading-relaxed opacity-80">${data.desc}</p>
        <ul class="space-y-3 mb-8">
            ${data.items.map(i => `<li class="flex items-center gap-3 font-bold text-sm"><i class="fas fa-check text-brand-orange"></i> ${i}</li>`).join('')}
        </ul>
        <a href="https://wa.me/32483404778" class="block bg-brand-orange text-white py-4 rounded-xl font-bold text-center uppercase tracking-widest hover:bg-orange-600 transition">Offerte via WhatsApp</a>
    `;
    document.getElementById('detail-layer').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeDetails() {
    document.getElementById('detail-layer').style.display = 'none';
    document.body.style.overflowY = 'auto';
}

/* --- Scroll Reveal --- */
function reveal() {
    document.querySelectorAll(".reveal").forEach(el => {
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight - 50) el.classList.add("active");
    });
}

window.addEventListener("scroll", reveal);
window.addEventListener('load', reveal);
