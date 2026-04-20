/* يجعل التمرير يتوقف قبل العنوان بمسافة مناسبة */
section {
    scroll-margin-top: 100px;
}
.service-card {
    background: var(--card-bg);
    border: 1px solid rgba(243, 115, 33, 0.1); /* إضافة حدود خفيفة بلون البراند */
    backdrop-filter: blur(5px);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.service-card:hover {
    border-color: var(--brand-orange);
    box-shadow: 0 15px 30px rgba(243, 115, 33, 0.15);
}
/* تخصيص شكل السكرول بار */
::-webkit-scrollbar {
    width: 10px;
}

::-webkit-scrollbar-track {
    background: var(--bg-body);
}

::-webkit-scrollbar-thumb {
    background: var(--brand-orange);
    border-radius: 10px;
    border: 3px solid var(--bg-body);
}

::-webkit-scrollbar-thumb:hover {
    background: #d65d1a;
}
body {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-rendering: optimizeLegibility;
}

/* إضافة تأثير بسيط للنصوص البرتقالية */
.text-brand-orange {
    text-shadow: 0 0 1px rgba(243, 115, 33, 0.2);
}
/* الحالة الابتدائية للعنصر (مخفي ومنزاح للأسفل) */
.reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease-out;
}

/* الحالة عند التفعيل (يظهر ويعود لمكانه) */
.reveal.active {
    opacity: 1;
    transform: translateY(0);
}
<script>
function reveal() {
    // نحدد كل العناصر التي تحمل كلاس reveal
    const reveals = document.querySelectorAll(".reveal");

    for (let i = 0; i < reveals.length; i++) {
        const windowHeight = window.innerHeight;
        const elementTop = reveals[i].getBoundingClientRect().top;
        const elementVisible = 150; // المسافة التي يظهر بعدها العنصر

        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        }
    }
}

// تفعيل الوظيفة عند التمرير
window.addEventListener("scroll", reveal);

// تفعيلها مرة واحدة عند تحميل الصفحة لإظهار العناصر الموجودة في الأعلى
window.addEventListener("load", reveal);
</script>
