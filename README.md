<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andalus Projects | Bouw en Renovatie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        .bg-brand-orange { background-color: #f37321; }
        .text-brand-orange { color: #f37321; }
        .bg-brand-dark { background-color: #2d3436; }
        
        .hero-gradient {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
        }

        .service-card:hover {
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        
        .floating-stars {
            position: absolute;
            color: rgba(243, 115, 33, 0.3);
            pointer-events: none;
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Navbar -->
    <nav class="bg-brand-dark text-white sticky top-0 z-50 shadow-lg">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-brand-orange rounded flex items-center justify-center font-bold text-xl">AP</div>
                <span class="text-xl font-bold tracking-wider">ANDALUS PROJECTS</span>
            </div>
            <div class="hidden md:flex space-x-8 font-medium">
                <a href="#home" class="hover:text-brand-orange transition">Home</a>
                <a href="#services" class="hover:text-brand-orange transition">Diensten</a>
                <a href="#about" class="hover:text-brand-orange transition">Over Ons</a>
                <a href="#contact" class="bg-brand-orange px-5 py-2 rounded-full hover:bg-orange-600 transition">Offerte aanvragen</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-gradient h-[80vh] flex items-center relative overflow-hidden text-white">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl">
                <h2 class="text-brand-orange font-bold text-2xl mb-2 uppercase tracking-widest">Professionele Bouw</h2>
                <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight">
                    EN RENOVATIEDIENSTEN
                </h1>
                <div class="inline-flex items-center bg-brand-orange text-white px-6 py-3 rounded-full text-lg font-semibold shadow-xl">
                    <i class="fas fa-sparkles mr-2"></i> Geef uw huis een nieuw leven! <i class="fas fa-sparkles ml-2"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Promo Section -->
    <section class="py-12 bg-white border-b">
        <div class="container mx-auto px-6 text-center">
            <p class="text-2xl italic text-gray-700">"Droomt u van een mooi en modern huis?"</p>
            <p class="mt-4 text-brand-dark font-semibold">Wij zijn gespecialiseerd in bouw en renovatie met topkwaliteit.</p>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-50 relative">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center mb-16">
                <div class="md:w-1/3 mb-10 md:mb-0">
                    <div class="bg-brand-orange p-10 rounded-3xl text-white shadow-2xl relative overflow-hidden">
                        <i class="fas fa-star absolute top-5 right-5 opacity-20 text-4xl"></i>
                        <h3 class="text-3xl font-bold mb-8">SERVICE CATEGORIES</h3>
                        <ul class="space-y-4 text-xl font-medium">
                            <li><i class="fas fa-circle text-xs mr-3"></i> Stucwerk</li>
                            <li><i class="fas fa-circle text-xs mr-3"></i> Tegelwerk</li>
                            <li><i class="fas fa-circle text-xs mr-3"></i> Schilderwerk</li>
                            <li><i class="fas fa-circle text-xs mr-3"></i> Schoonmaken</li>
                            <li><i class="fas fa-circle text-xs mr-3"></i> Laminaat leggen</li>
                            <li><i class="fas fa-circle text-xs mr-3"></i> Badkamers renovatie</li>
                        </ul>
                    </div>
                </div>
                
                <div class="md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-8 md:pl-12">
                    <!-- Service Image 1: Stucwerk -->
                    <div class="service-card bg-white rounded-2xl shadow-lg overflow-hidden border-4 border-white">
                        <div class="h-64 overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1589939705384-5185137a7f0f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Stucwerk" class="w-full h-full object-cover">
                            <div class="absolute top-4 right-4 bg-white px-4 py-1 rounded shadow-md font-bold text-brand-dark rotate-3">STUCWERK</div>
                        </div>
                    </div>
                    <!-- Service Image 2: Schilderwerk -->
                    <div class="service-card bg-white rounded-2xl shadow-lg overflow-hidden border-4 border-white mt-8 md:mt-16">
                        <div class="h-64 overflow-hidden relative">
                            <img src="https://images.unsplash.com/photo-1562259949-e8e7689d7828?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Schilderwerk" class="w-full h-full object-cover">
                            <div class="absolute top-4 right-4 bg-white px-4 py-1 rounded shadow-md font-bold text-brand-dark rotate-3">SCHILDERWERK</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA / Contact Section -->
    <section id="contact" class="py-20 bg-brand-dark text-white overflow-hidden relative">
        <!-- Floating Icons Background -->
        <i class="fas fa-broom absolute top-10 left-10 text-4xl opacity-10"></i>
        <i class="fas fa-trowel-bricks absolute bottom-10 right-10 text-4xl opacity-10"></i>
        <i class="fas fa-paint-roller absolute top-1/2 left-20 text-4xl opacity-10"></i>

        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto bg-gray-800 rounded-3xl p-8 md:p-12 shadow-2xl border border-gray-700">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold mb-4">Vraag vandaag nog uw gratis offerte aan</h2>
                    <div class="w-24 h-1 bg-brand-orange mx-auto"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <!-- Contact Info -->
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-brand-orange rounded-full flex items-center justify-center text-xl">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">Instagram</p>
                                <p class="font-bold">Andalus.Projects</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-brand-orange rounded-full flex items-center justify-center text-xl">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">Telefoon</p>
                                <p class="font-bold">+32 483 404 778</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-brand-orange rounded-full flex items-center justify-center text-xl">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">Website</p>
                                <p class="font-bold">www.Andalus-Projects.com</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-brand-orange rounded-full flex items-center justify-center text-xl">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">Email</p>
                                <p class="font-bold underline">Andalusprojects1@gmail.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- QR Code Mockup -->
                    <div class="text-center bg-white p-6 rounded-2xl text-brand-dark">
                        <p class="font-bold mb-4 uppercase text-sm tracking-widest text-brand-orange">Scan for Details</p>
                        <div class="bg-brand-orange p-2 rounded-lg inline-block">
                             <!-- Simple CSS QR Placeholder -->
                             <div class="w-40 h-40 bg-white p-2 flex items-center justify-center">
                                <i class="fas fa-qrcode text-8xl text-brand-dark"></i>
                             </div>
                        </div>
                        <p class="mt-4 text-xs font-semibold text-gray-500">ANDALUS PROJECTS</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-gray-500 py-8 border-t border-gray-900">
        <div class="container mx-auto px-6 text-center">
            <div class="flex items-center justify-center space-x-2 mb-4">
                <div class="w-6 h-6 bg-brand-orange rounded flex items-center justify-center font-bold text-xs text-white">AP</div>
                <span class="text-white font-bold tracking-widest text-sm uppercase">Andalus Projects</span>
            </div>
            <p class="text-sm">&copy; 2024 Andalus Projects. Alle rechten voorbehouden.</p>
        </div>
    </footer>

    <!-- Back to top -->
    <a href="#home" class="fixed bottom-6 right-6 bg-brand-orange text-white w-12 h-12 rounded-full flex items-center justify-center shadow-2xl hover:bg-orange-600 transition z-40">
        <i class="fas fa-arrow-up"></i>
    </a>

</body>
</html>
