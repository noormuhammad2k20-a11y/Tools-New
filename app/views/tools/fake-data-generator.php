<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6 text-center pt-8 pb-12 bg-gray-50 border border-dashed border-gray-200 rounded-2xl group overflow-hidden">
            <div id="data-display" class="relative z-10 text-gray-700 transition-all duration-300 transform group-hover:scale-[1.02]">
                <div id="fake-title" class="text-3xl font-black text-primary mb-2">John Doe</div>
                <div id="fake-email" class="text-gray-400 font-mono tracking-wide mb-4 italic">john.doe@example.com</div>
                <div id="fake-address" class="text-sm text-gray-500 max-w-sm mx-auto leading-relaxed">123 Maple Street, Springfield, IL 62704</div>
            </div>
            
            <!-- Abstract background element -->
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-primary/5 rounded-full blur-3xl group-hover:bg-primary/10 transition-colors"></div>
            <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-indigo-500/5 rounded-full blur-3xl group-hover:bg-indigo-500/10 transition-colors"></div>
        </div>

        <div class="flex flex-col md:flex-row gap-4 mb-8">
            <button id="gen-btn" class="flex-grow py-4 bg-primary text-white rounded-xl font-black uppercase tracking-[0.2em] shadow-xl shadow-primary/20 hover:bg-primary-hover transition-all flex items-center justify-center gap-3">
                <i class="fa-solid fa-user-plus text-xl"></i>
                Generate Person
            </button>
            <button id="copy-btn" class="px-8 py-4 bg-white border border-gray-200 text-gray-700 rounded-xl font-black uppercase tracking-[0.1em] shadow-sm hover:border-primary transition-all">
                Copy Details
            </button>
        </div>

        <div class="bg-indigo-50/50 p-6 rounded-2xl border border-indigo-100/50 text-center">
            <h4 class="text-xs font-black text-indigo-500 uppercase tracking-widest mb-2">Testing Tool</h4>
            <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest leading-relaxed underline decoration-indigo-200 decoration-2 underline-offset-4">This tool creates placeholder identity data for development and design prototyping. No real data is stored or retrieved.</p>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const title = document.getElementById('fake-title');
    const email = document.getElementById('fake-email');
    const address = document.getElementById('fake-address');
    const genBtn = document.getElementById('gen-btn');
    const copyBtn = document.getElementById('copy-btn');

    const firstNames = ["James", "Mary", "Robert", "Patricia", "John", "Jennifer", "Michael", "Linda", "David", "Elizabeth"];
    const lastNames = ["Smith", "Johnson", "Williams", "Brown", "Jones", "Garcia", "Miller", "Davis", "Rodriguez", "Martinez"];
    const domains = ["gmail.com", "outlook.com", "yahoo.com", "example.com", "proto.me"];
    const streets = ["Maple Street", "Oak Avenue", "Washington Blvd", "Lakeview Drive", "Park Way"];
    const cities = ["Springfield", "Riverside", "Georgetown", "Franklin", "Clinton"];

    function generate() {
        const fn = firstNames[Math.floor(Math.random() * firstNames.length)];
        const ln = lastNames[Math.floor(Math.random() * lastNames.length)];
        const str = Math.floor(Math.random() * 999) + ' ' + streets[Math.floor(Math.random() * streets.length)];
        const city = cities[Math.floor(Math.random() * cities.length)];
        const dom = domains[Math.floor(Math.random() * domains.length)];
        
        title.innerText = fn + ' ' + ln;
        email.innerText = (fn.charAt(0) + ln).toLowerCase() + '@' + dom;
        address.innerText = str + ', ' + city + ', US';
    }

    genBtn.addEventListener('click', () => {
        document.getElementById('data-display').classList.add('opacity-0');
        setTimeout(() => {
            generate();
            document.getElementById('data-display').classList.remove('opacity-0');
        }, 150);
    });

    copyBtn.addEventListener('click', () => {
        const text = `${title.innerText}\n${email.innerText}\n${address.innerText}`;
        navigator.clipboard.writeText(text);
        copyBtn.innerText = 'Copied!';
        setTimeout(() => copyBtn.innerText = 'Copy Details', 2000);
    });

    generate();
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
