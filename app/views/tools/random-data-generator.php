<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6 text-center pt-8 pb-12 bg-gray-50 border border-dashed border-gray-200 rounded-2xl group overflow-hidden">
            <div id="data-display" class="relative z-10 p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-4 bg-white rounded-xl shadow-sm border border-gray-100 text-left">
                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-1">Company</span>
                        <div id="fake-company" class="text-lg font-bold text-gray-900 leading-tight italic underline decoration-gray-100 decoration-2 underline-offset-4">Acme Corp</div>
                    </div>
                    <div class="p-4 bg-white rounded-xl shadow-sm border border-gray-100 text-left">
                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest block mb-1">Phone</span>
                        <div id="fake-phone" class="text-lg font-bold text-gray-900 font-mono tracking-tighter decoration-primary/20 decoration-2 underline underline-offset-4">+1 (555) 123-4567</div>
                    </div>
                </div>
            </div>
            
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-primary/5 rounded-full blur-3xl"></div>
        </div>

        <div class="text-center">
            <button id="gen-btn" class="px-12 py-4 bg-primary text-white rounded-pill font-black uppercase tracking-[0.2em] shadow-xl shadow-primary/20 hover:scale-[1.05] active:scale-[0.95] transition-all flex items-center gap-3 mx-auto">
                <i class="fa-solid fa-sync"></i>
                Heal My Data
            </button>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const companyDisplay = document.getElementById('fake-company');
    const phoneDisplay = document.getElementById('fake-phone');
    const genBtn = document.getElementById('gen-btn');

    const companies = ["Globex Corp", "Soylent Corp", "Initech", "Umbrella Corp", "Wayne Enterprises", "Stark Industries", "Hooli", "Pied Piper"];
    
    function generate() {
        const company = companies[Math.floor(Math.random() * companies.length)];
        const phone = `+1 (${Math.floor(Math.random()*900)+100}) ${Math.floor(Math.random()*900)+100}-${Math.floor(Math.random()*9000)+1000}`;
        
        companyDisplay.innerText = company;
        phoneDisplay.innerText = phone;
    }

    genBtn.addEventListener('click', () => {
        document.getElementById('data-display').classList.add('opacity-0');
        setTimeout(() => {
            generate();
            document.getElementById('data-display').classList.remove('opacity-0');
        }, 150);
    });

    generate();
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
