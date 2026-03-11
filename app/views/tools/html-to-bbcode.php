<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="relative">
                <label id="input-label" class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2 block">HTML Source</label>
                <textarea id="html-input" class="w-full h-80 p-6 bg-slate-900 border border-transparent rounded-2xl text-emerald-400 text-xs font-mono placeholder-emerald-800 resize-none outline-none shadow-inner" placeholder="<strong>Bold Text</strong>"></textarea>
                <button id="clear-btn" class="absolute bottom-4 right-4 p-2 bg-white/10 text-white/30 hover:text-red-400 rounded-lg transition-colors">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
            </div>

            <div class="relative">
                <label id="output-label" class="text-xs font-black text-primary uppercase tracking-widest mb-2 block lowercase italic">BBCode Output</label>
                <textarea id="bbcode-output" class="w-full h-80 p-6 bg-blue-50/10 border border-blue-100 rounded-2xl text-gray-900 text-sm font-mono resize-none outline-none" readonly placeholder="[b]..."></textarea>
                <button id="copy-btn" class="absolute bottom-4 right-4 px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg shadow-lg hover:shadow-primary/20 transition-all">
                    Copy
                </button>
            </div>
        </div>

    </div>
</main>

<!-- Content Area -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('html-input');
    const output = document.getElementById('bbcode-output');

    function htmlToBbcode(html) {
        if(!html) return "";
        let res = html;
        const tags = [
            { h: /<strong>(.*?)<\/strong>/gi, bb: '[b]$1[/b]' },
            { h: /<b>(.*?)<\/b>/gi, bb: '[b]$1[/b]' },
            { h: /<em>(.*?)<\/em>/gi, bb: '[i]$1[/i]' },
            { h: /<i>(.*?)<\/i>/gi, bb: '[i]$1[/i]' },
            { h: /<u>(.*?)<\/u>/gi, bb: '[u]$1[/u]' },
            { h: /<strike>(.*?)<\/strike>/gi, bb: '[s]$1[/s]' },
            { h: /<a.*?href="(.*?)".*?>(.*?)<\/a>/gi, bb: '[url=$1]$2[/url]' },
            { h: /<img.*?src="(.*?)".*?\/>/gi, bb: '[img]$1[/img]' },
            { h: /<span.*?style="color:(.*?)".*?>(.*?)<\/span>/gi, bb: '[color=$1]$2[/color]' },
            { h: /<code>(.*?)<\/code>/gi, bb: '[code]$1[/code]' },
            { h: /<br.*?>/gi, bb: '\n' },
            { h: /<p.*?>(.*?)<\/p>/gi, bb: '$1\n' }
        ];

        tags.forEach(t => res = res.replace(t.h, t.bb));
        // Strip remaining HTML tags
        return res.replace(/<[^>]*>?/gm, '').trim();
    }

    input.addEventListener('input', () => {
        output.value = htmlToBbcode(input.value);
    });

    document.getElementById('clear-btn').addEventListener('click', () => { input.value = ''; output.value = ''; input.focus(); });
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
