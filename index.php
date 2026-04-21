<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php
// جلب البيانات من ملف الـ JSON
$jsonData = file_get_contents('data.json');
$data = json_decode($jsonData, true);
?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Andalus Projects | Meesters in Renovatie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        :root {
            scroll-behavior: smooth;
            --brand-orange: #f37321;
            --brand-orange-soft: rgba(243, 115, 33, 0.1);
            --transition-speed: 0.4s;
            --bg-body: #fdfdfd;
            --text-main: #1a1a1a;
            --card-bg: #ffffff;
            --nav-bg: rgba(255, 255, 255, 0.85);
        }

        body.dark-theme {
            --bg-body: #1a1a1a;
            --text-main: #f3f4f6;
            --card-bg: #242424;
            --nav-bg: rgba(26, 26, 26, 0.85);
        }

        body {
            user-select: none;
            -webkit-user-select: none;
            font-family: 'Poppins', sans-serif;
            margin: 0; padding: 0;
            overflow-x: hidden;
            background-color: var(--bg-body);
            color: var(--text-main);
            transition: background-color var(--transition-speed), color var(--transition-speed);
        }

        .hero-title {
            font-weight: 900;
            text-transform: uppercase;
            font-style: italic;
            color: white;
            font-size: clamp(2.2rem, 8vw, 7.5rem); 
            line-height: 1.1;
            letter-spacing: -1px;
        }

        .text-brand-orange { color: var(--brand-orange); }
        .bg-brand-orange { background-color: var(--brand-orange); }

        .glass-header {
            background: var(--nav-bg) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--brand-orange-soft);
            border-top: 3px solid var(--brand-orange);
        }

        .theme-toggle-btn {
            width: 40px; height: 40px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            transition: all 0.3s ease; background: var(--brand-orange-soft); color: var(--brand-orange);
        }

        .hero-gradient {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1920');
            background-size: cover; background-position: center;
            min-height: 100vh; display: flex; align-items: center;
        }

        .slider-container {
            position: relative; width: 100%; height: 450px;
            overflow: hidden; border-radius: 2rem; margin-bottom: 3rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }
        .slider-wrapper { display: flex; transition: transform 0.7s cubic-bezier(0.85, 0, 0.15, 1); height: 100%; }
        .slide { min-width: 100%; height: 100%; position: relative; }
        .slide img { width: 100%; height: 100%; object-fit: cover; }
        .slide-overlay {
            position: absolute; bottom: 0; left: 0; right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.9));
            padding: 50px 30px 30px; color: white;
        }

        .service-card {
            background: var(--card-bg);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-bottom: 4px solid transparent;
            transition: all var(--transition-speed);
        }
        .service-card:hover { transform: translateY(-10px); border-bottom-color: var(--brand-orange); box-shadow: 0 20px 30px rgba(0,0,0,0.2); }

        #detail-layer, #admin-layer {
            position: fixed; inset: 0; background: rgba(0,0,0,0.8);
            z-index: 9999; display: none; align-items: center; justify-content: center;
            backdrop-filter: blur(8px);
        }
        .modal-container {
            width: 95%; max-width: 650px; background: var(--card-bg);
            border-radius: 1.5rem; padding: 2.5rem; position: relative;
            border-top: 6px solid var(--brand-orange);
            max-height: 90vh; overflow-y: auto;
        }

        .reveal { opacity: 0; transform: translateY(20px); transition: 0.6s ease-out; }
        .reveal.active { opacity: 1; transform: translateY(0); }
        .container-custom { width: 100%; max-width: 1100px; margin: 0 auto; padding: 0 20px; }
        
        .dot { width: 8px; height: 8px; border-radius: 50%; background: rgba(255,255,255,0.3); cursor: pointer; transition: 0.3s; }
        .dot.active { background: var(--brand-orange); width: 24px; border-radius: 10px; }

        /* Admin Styles */
        .admin-input { width: 100%; padding: 10px; margin-bottom: 15px; background: rgba(0,0,0,0.05); border: 1px solid var(--brand-orange-soft); border-radius: 8px; color: var(--text-main); }
        body.dark-theme .admin-input { background: rgba(255,255,255,0.05); }
    </style>
</head>
<body oncontextmenu="return false;" class="dark-theme">

    <div id="mobile-menu" class="fixed inset-0 bg-black/95 z-[9500] hidden flex-col items-center justify-center space-y-8">
        <button onclick="toggleMenu()" class="absolute top-8 right-8 text-white text-3xl"><i class="fas fa-times"></i></button>
        <a href="#home" onclick="toggleMenu()" class="text-3xl font-bold text-white hover:text-brand-orange">Home</a>
        <a href="https://andalus-projects.com/overons.html" class="text-3xl font-bold text-white hover:text-brand-orange">Over Ons</a>
        <a href="#services" onclick="toggleMenu()" class="text-3xl font-bold text-white hover:text-brand-orange">Diensten</a>
        <div class="flex flex-col items-center gap-6">
            <a href="#contact" onclick="toggleMenu()" class="text-3xl font-bold text-brand-orange">Contact</a>
            <button onclick="toggleTheme()" class="w-16 h-16 rounded-full bg-white/10 flex items-center justify-center text-white text-2xl">
                <i class="fas fa-sun theme-icon"></i>
            </button>
        </div>
    </div>

    <nav class="fixed top-0 w-full z-50 glass-header transition-all">
        <div class="container-custom py-4 flex justify-between items-center">
            <a href="#" class="flex items-center gap-2 group">
                <img src="https://andalus-projects.com/Logo.png" id="main-logo" alt="Logo" class="h-9 transition-transform group-hover:scale-110">
                <span class="font-black text-xl tracking-tighter uppercase italic">ANDALUS <span class="text-brand-orange">PROJECTS</span></span>
            </a>
            <div class="hidden md:flex items-center gap-6">
                <div class="flex items-center gap-8 text-[11px] font-bold uppercase tracking-widest mr-4">
                    <a href="https://andalus-projects.com/overons.html" class="nav-link font-bold">Over Ons</a>
                    <a href="#services" class="nav-link font-bold">Diensten</a>
                </div>
                <button onclick="toggleTheme()" class="theme-toggle-btn"><i class="fas fa-sun theme-icon"></i></button>
                <a href="#contact" class="bg-brand-orange px-6 py-2 rounded-full text-white font-bold text-[11px] uppercase tracking-widest hover:scale-105 transition shadow-lg shadow-orange-500/20">Contact</a>
            </div>
            <button onclick="toggleMenu()" class="md:hidden text-2xl text-brand-orange"><i class="fas fa-bars-staggered"></i></button>
        </div>
    </nav>

    <section id="home" class="hero-gradient">
        <div class="container-custom">
            <div class="max-w-4xl">
                <div class="inline-block border-l-4 border-brand-orange px-4 py-1 mb-6">
                    <span class="text-white text-xs font-bold uppercase tracking-[0.3em]">Est. 2004 | Premium Renovatie</span>
                </div>
                <h1 class="hero-title">
                    PROFESSIONELE BOUW EN <br><span class="text-brand-orange"> RENOVATIEDIENSTEN</span>
                </h1>
                <p class="text-gray-300 text-lg md:text-xl mb-10 font-light leading-relaxed max-w-xl">
                    Geef uw woning een nieuw leven met ons vakmanschap.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#services" class="bg-brand-orange text-white px-10 py-4 rounded-xl font-bold hover:bg-orange-600 transition shadow-xl">ONTDEK DIENSTEN</a>
                    <a href="https://wa.me/32483404778" class="bg-white/10 text-white backdrop-blur-md px-10 py-4 rounded-xl font-bold hover:bg-white/20 transition border border-white/20">CONTACTEER ONS</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="py-24">
        <div class="container-custom">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 reveal">
                <div>
                    <h2 class="text-4xl md:text-6xl font-black uppercase italic">Onze <span class="text-brand-orange">Expertise</span></h2>
                    <div class="w-20 h-1 bg-brand-orange mt-4"></div>
                </div>
                <p class="text-gray-500 max-w-sm mt-4 md:mt-0 text-sm">Vakmanschap en precisie verwerkt in elk detail van uw project.</p>
            </div>

            <div class="slider-container reveal">
                <div class="slider-wrapper" id="main-slider">
                    <div class="slide"><img src="https://andalus-projects.com/badkamerrenovatie.jpg"><div class="slide-overlay"><h3 class="text-2xl font-black uppercase italic">Badkamer Transformaties</h3></div></div>
                    <div class="slide"><img src="https://andalus-projects.com/tegelwerk.jpg"><div class="slide-overlay"><h3 class="text-2xl font-black uppercase italic">Tegelwerk</h3></div></div>
                    <div class="slide"><img src="https://andalus-projects.com/stucwerk.jpg"><div class="slide-overlay"><h3 class="text-2xl font-black uppercase italic">Stucwerk</h3></div></div>
                </div>
                <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-3 z-10" id="dots-container"></div>
                <button onclick="moveSlide(-1)" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-black/20 hover:bg-brand-orange text-white rounded-full transition"><i class="fas fa-chevron-left"></i></button>
                <button onclick="moveSlide(1)" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-black/20 hover:bg-brand-orange text-white rounded-full transition"><i class="fas fa-chevron-right"></i></button>
            </div>

            <div id="services-grid" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                </div>
        </div>
    </section>

    <section id="contact" class="py-20 bg-brand-orange text-white">
        <div class="container-custom flex flex-col md:flex-row items-center justify-between gap-10">
            <div class="text-center md:text-left">
                <h2 class="text-4xl md:text-6xl font-black uppercase italic mb-4">Start uw project</h2>
                <p class="font-light opacity-90 text-lg">Neem vandaag nog contact op voor een vrijblijvende offerte.</p>
            </div>
            <a href="tel:+32483404778" class="bg-white text-brand-orange px-12 py-6 rounded-2xl font-black text-2xl md:text-4xl shadow-2xl hover:scale-105 transition-transform">+32 483 404 778</a>
        </div>
    </section>

    <footer class="py-12 border-t border-brand-orange-soft text-center">
        <img src="https://andalus-projects.com/Logo.png" id="footer-logo" class="h-8 mx-auto mb-4 grayscale opacity-50">
        <p class="text-gray-400 font-bold uppercase tracking-widest text-[10px] mb-2">&copy; 2026 Andalus Projects</p>
        <button onclick="initAdmin()" class="text-[9px] uppercase tracking-[0.3em] text-gray-500 hover:text-brand-orange transition-colors duration-300">
            <span class="font-black">Andalus Projects</span>
        </button>
    </footer>

    <div id="detail-layer" onclick="closeDetails()">
        <div class="modal-container" onclick="event.stopPropagation()">
            <button onclick="closeDetails()" class="absolute top-4 right-4 text-gray-400 hover:text-brand-orange transition"><i class="fas fa-times text-2xl"></i></button>
            <div id="modal-content" class="animate__animated animate__fadeInUp animate__faster"></div>
        </div>
    </div>

    <div id="admin-layer">
        <div class="modal-container">
            <button onclick="closeAdmin()" class="absolute top-4 right-4 text-gray-400 hover:text-brand-orange transition"><i class="fas fa-times text-2xl"></i></button>
            <div id="admin-auth">
                <h2 class="text-2xl font-bold mb-4">Admin Login</h2>
                <input type="password" id="admin-pass" class="admin-input" placeholder="Password">
                <button onclick="checkAdminPass()" class="w-full bg-brand-orange text-white py-3 rounded-lg font-bold">Login</button>
            </div>
            <div id="admin-content" class="hidden">
                <h2 class="text-2xl font-bold mb-4">Edit Services</h2>
                <div id="admin-services-list" class="space-y-4"></div>
                <hr class="my-6 opacity-20">
                <h2 class="text-2xl font-bold mb-4">Change Password</h2>
                <input type="password" id="new-admin-pass" class="admin-input" placeholder="New Password">
                <button onclick="changeAdminPass()" class="w-full bg-gray-500 text-white py-2 rounded-lg font-bold mb-4">Update Password</button>
                <button onclick="saveAdminChanges()" class="w-full bg-brand-orange text-white py-4 rounded-lg font-bold text-xl shadow-lg">Save All Changes</button>
            </div>
        </div>
    </div>

    <a href="https://wa.me/32483404778" target="_blank" class="fixed bottom-8 right-8 w-14 h-14 bg-[#25D366] rounded-full flex items-center justify-center text-white text-2xl shadow-2xl z-[9999] hover:scale-110 transition">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script>
        // Data & Management
        let servicesData = JSON.parse(localStorage.getItem('andalus_services')) || {
            badkamer: { title: "Badkamerrenovatie", desc: "Wilt u uw badkamer volledig vernieuwen? Wij bieden professionele badkamerrenovaties van A tot Z. Van sloopwerk tot luxe afwerking.", items: ["Volledige renovatie", "Tegelwerk & waterdichting", "Sanitair installatie", "Luxe afwerking"], img: "https://andalus-projects.com/badkamerrenovatie.jpg" },
            tegelwerk: { title: "Professionele Tegelwerken", desc: "Hoogwaardige tegelwerken voor badkamers, keukens en vloeren. Wij garanderen een strak resultaat.", items: ["Natuursteen & Keramiek", "Wand- en vloertegels", "Terrasaanleg", "Grote formaten"], img: "https://andalus-projects.com/tegelwerk.jpg" },
            stucwerk: { title: "Stuc- en Pleisterwerk", desc: "Perfect afgewerkte muren en plafonds. Gladde oppervlakken klaar voor schilderwerk.", items: ["Glad pleisterwerk", "Sierpleister", "Reparatie muren", "Strakke hoeken"], img: "https://andalus-projects.com/stucwerk.jpg" },
            schilderwerk: { title: "Schilder- en Decoratiewerk", desc: "Professioneel schilderwerk voor binnen en buiten. Wij gebruiken alleen hoogwaardige verf.", items: ["Binnen- & Buitenschilderwerk", "Lakwerk kozijnen", "Muur- & plafondsauswerk", "Kleuradvies"], img: "https://andalus-projects.com/schilderwerk.jpg" },
            schoonmaken: { title: "Reinigingsdiensten", desc: "Grondige reiniging na bouw of renovatie. Wij maken uw ruimte direct klaar voor gebruik.", items: ["Bouwschoonmaak", "Tuinonderhoud", "Trappenhallen", "Kantoorschoonmaak"], img: "https://andalus-projects.com/schoonmaken.jpg" },
            laminaatleggen: { title: "Vloeren & Laminaat", desc: "Specialist in het leggen van laminaat, visgraat og PVC vloeren met perfecte afwerking.", items: ["Laminaat & PVC", "Visgraat motieven", "Plintafwerking", "Vloer egalisatie"], img: "https://andalus-projects.com/laminaatleggen.jpg" }
        };

        function renderServices() {
            const grid = document.getElementById('services-grid');
            grid.innerHTML = '';
            Object.keys(servicesData).forEach(key => {
                const s = servicesData[key];
                grid.innerHTML += `
                    <div onclick="openDetails('${key}')" class="service-card rounded-2xl overflow-hidden cursor-pointer reveal">
                        <div class="h-48 overflow-hidden"><img src="${s.img}" class="w-full h-full object-cover"></div>
                        <div class="p-6 flex justify-between items-center">
                            <h3 class="font-bold uppercase text-sm tracking-widest">${s.title}</h3>
                            <i class="fas fa-arrow-right text-brand-orange"></i>
                        </div>
                    </div>
                `;
            });
            reveal();
        }

        // Admin Functions
        function initAdmin() {
            document.getElementById('admin-layer').style.display = 'flex';
            document.getElementById('admin-auth').classList.remove('hidden');
            document.getElementById('admin-content').classList.add('hidden');
        }

        function checkAdminPass() {
            const pass = document.getElementById('admin-pass').value;
            const savedPass = localStorage.getItem('andalus_admin_pass') || '1234';
            if (pass === savedPass) {
                document.getElementById('admin-auth').classList.add('hidden');
                document.getElementById('admin-content').classList.remove('hidden');
                loadAdminEditor();
            } else {
                alert('
