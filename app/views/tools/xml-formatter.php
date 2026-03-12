<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="relative mb-6">
            <textarea id="input-xml" class="w-full h-96 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-sm font-mono placeholder-gray-400 resize-none outline-none" placeholder='<root><item>Hello</item></root>'></textarea>
            
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-3 bg-white border border-gray-200 text-gray-400 hover:text-red-500 rounded-xl shadow-sm transition-all duration-200" title="Clear All">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                <div class="flex p-1 bg-white border border-gray-200 rounded-xl shadow-sm">
                    <button id="format-btn" class="px-6 py-2 bg-primary text-white rounded-lg font-bold shadow-lg shadow-primary/20 hover:bg-primary-hover transition-all">Beautify</button>
                    <button id="minify-btn" class="px-6 py-2 text-gray-500 hover:text-primary font-bold rounded-lg transition-all border-l border-gray-100 ml-1">Minify</button>
                </div>
            </div>
        </div>

        <!-- Feedback -->
        <div id="status-msg" class="hidden p-4 rounded-xl mb-4 font-bold text-center animate-fade-in"></div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-4 bg-gray-50 rounded-xl border border-gray-100 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center border border-gray-200 text-primary">
                        <i class="fa-solid fa-file-code"></i>
                    </div>
                    <div>
                        <h4 class="text-xs font-black text-gray-900 uppercase">XML Structure</h4>
                        <p id="size-badge" class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">0 B</p>
                    </div>
                </div>
                <button id="copy-btn" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 text-[10px] font-black uppercase rounded-lg hover:border-primary transition-all">Copy Result</button>
            </div>
            
            <div class="p-4 bg-gray-50 rounded-xl border border-gray-100 flex items-center justify-center">
                <span id="valid-badge" class="px-4 py-2 bg-gray-200 text-gray-600 rounded-full text-[10px] font-black uppercase tracking-[0.2em]">Pending Analysis</span>
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-xml');
    const formatBtn = document.getElementById('format-btn');
    const minifyBtn = document.getElementById('minify-btn');
    const status = document.getElementById('status-msg');
    const validBadge = document.getElementById('valid-badge');
    const sizeBadge = document.getElementById('size-badge');

    function updateStats() {
        const val = input.value;
        sizeBadge.innerText = val ? (val.length < 1024 ? val.length + ' B' : (val.length/1024).toFixed(2) + ' KB') : '0 B';
        if(!val) {
            validBadge.innerText = 'Pending Analysis';
            validBadge.className = "px-4 py-2 bg-gray-200 text-gray-600 rounded-full text-[10px] font-black uppercase tracking-[0.2em]";
            return;
        }
        const parser = new DOMParser();
        const xmlDoc = parser.parseFromString(val, "text/xml");
        const error = xmlDoc.getElementsByTagName("parsererror");
        if(error.length > 0) {
            validBadge.innerText = 'Invalid XML';
            validBadge.className = "px-4 py-2 bg-red-100 text-red-600 rounded-full text-[10px] font-black uppercase tracking-[0.2em]";
        } else {
            validBadge.innerText = 'Valid XML';
            validBadge.className = "px-4 py-2 bg-emerald-100 text-emerald-600 rounded-full text-[10px] font-black uppercase tracking-[0.2em]";
        }
    }

    function formatXml(xml) {
        let formatted = '';
        let reg = /(>)(<)(\/*)/g;
        xml = xml.replace(reg, '$1\r\n$2$3');
        let pad = 0;
        xml.split('\r\n').forEach(node => {
            let indent = 0;
            if (node.match(/.+<\/\w[^>]*>$/)) {
                indent = 0;
            } else if (node.match(/^<\/\w/)) {
                if (pad != 0) pad -= 1;
            } else if (node.match(/^<\w[^>]*[^\/]>.*$/)) {
                indent = 1;
            } else {
                indent = 0;
            }

            let padding = '';
            for (let i = 0; i < pad; i++) padding += '    ';
            formatted += padding + node + '\r\n';
            pad += indent;
        });
        return formatted.trim();
    }

    formatBtn.addEventListener('click', () => {
        const val = input.value;
        if(!val) return;
        try {
            input.value = formatXml(val.replace(/>\s*</g, '><'));
            status.innerText = "Beautified successfully!";
            status.className = "p-4 rounded-xl mb-4 font-bold text-center bg-emerald-50 text-emerald-600 border border-emerald-100 block";
            updateStats();
        } catch(e) {
            status.innerText = "Error processing XML";
            status.className = "p-4 rounded-xl mb-4 font-bold text-center bg-red-50 text-red-600 border border-red-100 block";
        }
        setTimeout(() => status.classList.add('hidden'), 3000);
    });

    minifyBtn.addEventListener('click', () => {
        const val = input.value;
        if(!val) return;
        input.value = val.replace(/>\s*</g, '><').trim();
        status.innerText = "Minified successfully!";
        status.className = "p-4 rounded-xl mb-4 font-bold text-center bg-indigo-50 text-indigo-600 border border-indigo-100 block";
        updateStats();
        setTimeout(() => status.classList.add('hidden'), 3000);
    });

    input.addEventListener('input', updateStats);
    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; updateStats(); input.focus(); });
    document.getElementById('copy-btn').addEventListener('click', () => {
        input.select();
        document.execCommand('copy');
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>