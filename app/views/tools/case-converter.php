<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <!-- Case Selection Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-8">
            <button data-case="upper" class="case-btn flex flex-col items-center justify-center p-4 bg-gray-50 border border-gray-100 rounded-xl hover:bg-white hover:border-primary hover:shadow-lg transition-all duration-200 group">
                <span class="text-xl font-black text-gray-900 group-hover:text-primary transition-colors">ABC</span>
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1 group-hover:text-primary/70">Uppercase</span>
            </button>
            <button data-case="lower" class="case-btn flex flex-col items-center justify-center p-4 bg-gray-50 border border-gray-100 rounded-xl hover:bg-white hover:border-primary hover:shadow-lg transition-all duration-200 group">
                <span class="text-xl font-black text-gray-900 group-hover:text-primary transition-colors">abc</span>
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1 group-hover:text-primary/70">Lowercase</span>
            </button>
            <button data-case="title" class="case-btn flex flex-col items-center justify-center p-4 bg-gray-50 border border-gray-100 rounded-xl hover:bg-white hover:border-primary hover:shadow-lg transition-all duration-200 group">
                <span class="text-xl font-black text-gray-900 group-hover:text-primary transition-colors">Abc</span>
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1 group-hover:text-primary/70">Title Case</span>
            </button>
            <button data-case="sentence" class="case-btn flex flex-col items-center justify-center p-4 bg-gray-50 border border-gray-100 rounded-xl hover:bg-white hover:border-primary hover:shadow-lg transition-all duration-200 group">
                <span class="text-xl font-black text-gray-900 group-hover:text-primary transition-colors">A.b</span>
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1 group-hover:text-primary/70">Sentence</span>
            </button>
            <button data-case="camel" class="case-btn flex flex-col items-center justify-center p-4 bg-gray-50 border border-gray-100 rounded-xl hover:bg-white hover:border-primary hover:shadow-lg transition-all duration-200 group">
                <span class="text-xl font-black text-gray-900 group-hover:text-primary transition-colors">aB</span>
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1 group-hover:text-primary/70">camelCase</span>
            </button>
            <button data-case="snake" class="case-btn flex flex-col items-center justify-center p-4 bg-gray-50 border border-gray-100 rounded-xl hover:bg-white hover:border-primary hover:shadow-lg transition-all duration-200 group">
                <span class="text-xl font-black text-gray-900 group-hover:text-primary transition-colors">a_b</span>
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1 group-hover:text-primary/70">snake_case</span>
            </button>
            <button data-case="pascal" class="case-btn flex flex-col items-center justify-center p-4 bg-gray-50 border border-gray-100 rounded-xl hover:bg-white hover:border-primary hover:shadow-lg transition-all duration-200 group">
                <span class="text-xl font-black text-gray-900 group-hover:text-primary transition-colors">AB</span>
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1 group-hover:text-primary/70">PascalCase</span>
            </button>
            <button data-case="kebab" class="case-btn flex flex-col items-center justify-center p-4 bg-gray-50 border border-gray-100 rounded-xl hover:bg-white hover:border-primary hover:shadow-lg transition-all duration-200 group">
                <span class="text-xl font-black text-gray-900 group-hover:text-primary transition-colors">a-b</span>
                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1 group-hover:text-primary/70">kebab-case</span>
            </button>
        </div>

        <div class="relative mb-6">
            <textarea id="input-text" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-300 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none" placeholder="Paste your text here to transform cases..."></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200" title="Clear All">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                <button id="copy-btn" class="px-6 py-3 bg-primary text-white rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-hover transition-all duration-200 font-bold flex items-center gap-2 group">
                    <i class="fa-solid fa-copy transition-transform group-hover:scale-110"></i>
                    <span>Copy</span>
                </button>
            </div>
        </div>

        <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 border-dashed text-center">
            <p id="helper-text" class="text-gray-500 text-sm italic">Select a case button above to instantly transform your text.</p>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const helper = document.getElementById('helper-text');
    const caseBtns = document.querySelectorAll('.case-btn');

    const transformations = {
        upper: (t) => t.toUpperCase(),
        lower: (t) => t.toLowerCase(),
        title: (t) => t.toLowerCase().split(' ').map(s => s.charAt(0).toUpperCase() + s.substring(1)).join(' '),
        sentence: (t) => t.charAt(0).toUpperCase() + t.slice(1).toLowerCase(),
        camel: (t) => t.toLowerCase().replace(/[^a-zA-Z0-9]+(.)/g, (m, chr) => chr.toUpperCase()),
        snake: (t) => t.match(/[A-Z]{2,}(?=[A-Z][a-z]+[0-9]*|\b)|[A-Z]?[a-z]+[0-9]*|[A-Z]|[0-9]+/g).map(x => x.toLowerCase()).join('_'),
        pascal: (t) => t.match(/[A-Z]{2,}(?=[A-Z][a-z]+[0-9]*|\b)|[A-Z]?[a-z]+[0-9]*|[A-Z]|[0-9]+/g).map(x => x.charAt(0).toUpperCase() + x.slice(1).toLowerCase()).join(''),
        kebab: (t) => t.match(/[A-Z]{2,}(?=[A-Z][a-z]+[0-9]*|\b)|[A-Z]?[a-z]+[0-9]*|[A-Z]|[0-9]+/g).map(x => x.toLowerCase()).join('-')
    };

    caseBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const caseType = btn.getAttribute('data-case');
            if(!input.value) return;

            try {
                input.value = transformations[caseType](input.value);
                helper.innerText = `Transformed to ${btn.querySelector('span:last-child').innerText}!`;
                helper.className = "text-primary font-bold text-sm italic";
                setTimeout(() => {
                    helper.className = "text-gray-500 text-sm italic";
                }, 2000);
            } catch(e) {
                console.error(e);
            }
        });
    });

    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = ''; input.focus();
    });

    document.getElementById('copy-btn').addEventListener('click', () => {
        if(!input.value) return;
        input.select();
        document.execCommand('copy');
        
        const btnText = document.querySelector('#copy-btn span');
        const original = btnText.innerText;
        btnText.innerText = 'Copied!';
        setTimeout(() => btnText.innerText = original, 2000);
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>