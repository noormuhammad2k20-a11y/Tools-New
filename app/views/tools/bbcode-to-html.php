<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="relative">
                <label id="input-label" class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 block lowercase italic">BBCode Source</label>
                <textarea id="bbcode-input" class="w-full h-80 p-6 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-gray-700 text-sm font-mono placeholder-gray-400 resize-none outline-none" placeholder="[b]Bold Text[/b]\n[i]Italics[/i]"></textarea>
                <button id="clear-btn" class="absolute bottom-4 right-4 p-2 bg-white/80 border border-gray-100 text-gray-300 hover:text-red-400 rounded-lg transition-colors">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>

            <div class="relative">
                <label id="output-label" class="text-xs font-black text-primary uppercase tracking-widest mb-2 block">HTML Output</label>
                <textarea id="html-output" class="w-full h-80 p-6 bg-blue-50/10 border border-blue-100 rounded-2xl text-gray-900 text-sm font-mono resize-none outline-none group-hover:border-primary/20 transition-all" readonly placeholder="<strong>..."></textarea>
                <button id="copy-btn" class="absolute bottom-4 right-4 px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-lg hover:shadow-primary/20 transition-all">
                    Copy
                </button>
            </div>
        </div>

        <div class="p-6 bg-gray-900 rounded-2xl border border-transparent shadow-2xl relative overflow-hidden group">
            <h4 class="text-xs font-black text-emerald-400 uppercase tracking-[0.2em] mb-4">Live Preview</h4>
            <div id="preview-area" class="text-white text-sm bg-gray-800/50 p-6 rounded-xl min-h-[100px] border border-gray-700/50 prose prose-invert prose-sm max-w-none">
                <p class="text-gray-500 italic">Result preview will appear here...</p>
            </div>
            <!-- Glow -->
            <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-emerald-500/5 rounded-full blur-3xl group-hover:bg-emerald-500/10 transition-colors"></div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('bbcode-input');
    const output = document.getElementById('html-output');
    const preview = document.getElementById('preview-area');

    function bbcodeToHtml(str) {
        if(!str) return "";
        let res = str;
        const tags = [
            { bb: /\[b\](.*?)\[\/b\]/gi, html: '<strong>$1</strong>' },
            { bb: /\[i\](.*?)\[\/i\]/gi, html: '<em>$1</em>' },
            { bb: /\[u\](.*?)\[\/u\]/gi, html: '<u>$1</u>' },
            { bb: /\[s\](.*?)\[\/s\]/gi, html: '<strike>$1</strike>' },
            { bb: /\[url\](.*?)\[\/url\]/gi, html: '<a href="$1">$1</a>' },
            { bb: /\[url=(.*?)\](.*?)\[\/url\]/gi, html: '<a href="$1">$2</a>' },
            { bb: /\[img\](.*?)\[\/img\]/gi, html: '<img src="$1" />' },
            { bb: /\[color=(.*?)\](.*?)\[\/color\]/gi, html: '<span style="color:$1">$2</span>' },
            { bb: /\[size=(.*?)\](.*?)\[\/size\]/gi, html: '<span style="font-size:$1px">$2</span>' },
            { bb: /\[code\](.*?)\[\/code\]/gi, html: '<code>$1</code>' }
        ];

        tags.forEach(t => res = res.replace(t.bb, t.html));
        return res.replace(/\n/g, '<br>');
    }

    function update() {
        const html = bbcodeToHtml(input.value);
        output.value = html;
        preview.innerHTML = html || '<p class="text-gray-500 italic">Result preview will appear here...</p>';
    }

    input.addEventListener('input', update);
    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; update(); input.focus(); });
    document.getElementById('copy-btn').addEventListener('click', () => {
        output.select();
        document.execCommand('copy');
        const original = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = 'Copied!';
        setTimeout(() => document.getElementById('copy-btn').innerHTML = original, 2000);
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
