<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <!-- Stats Grid (Top) -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-gray-50 border border-gray-100 rounded-xl p-4 text-center">
                <div id="stat-words" class="text-2xl font-bold text-gray-900">0</div>
                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider mt-1">Words</div>
            </div>
            <div class="bg-gray-50 border border-gray-100 rounded-xl p-4 text-center">
                <div id="stat-chars" class="text-2xl font-bold text-gray-900">0</div>
                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider mt-1">Characters</div>
            </div>
            <div class="bg-gray-50 border border-gray-100 rounded-xl p-4 text-center">
                <div id="stat-sentences" class="text-2xl font-bold text-gray-900">0</div>
                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider mt-1">Sentences</div>
            </div>
            <div class="bg-gray-50 border border-gray-100 rounded-xl p-4 text-center">
                <div id="stat-reading" class="text-2xl font-bold text-gray-900">0m</div>
                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider mt-1">Reading Time</div>
            </div>
        </div>

        <div class="relative mb-6">
            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Enter Your Text</label>
            <textarea id="input-text" class="w-full h-64 p-5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all duration-200 text-gray-700 text-lg placeholder-gray-400 resize-none outline-none" placeholder="Start typing or paste your text here..."></textarea>
            
            <!-- Quick Actions Floating -->
            <div class="absolute bottom-4 right-4 flex gap-2">
                <button id="clear-btn" class="p-2.5 bg-white border border-gray-200 text-gray-400 hover:text-red-500 hover:border-red-100 rounded-lg shadow-sm transition-all duration-200 group" title="Clear All">
                    <i class="fa-solid fa-trash-can transition-transform group-hover:scale-110"></i>
                </button>
                <button id="copy-btn" class="px-4 py-2 bg-primary text-white rounded-lg shadow-md shadow-primary/20 hover:bg-primary-hover transition-all duration-200 font-bold flex items-center gap-2 group">
                    <i class="fa-solid fa-copy transition-transform group-hover:scale-110"></i>
                    <span>Copy</span>
                </button>
            </div>
        </div>

        <!-- Detailed Breakdown -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
            <div class="p-5 bg-blue-50/50 border border-blue-100/50 rounded-xl">
                <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-chart-line text-blue-500"></i>
                    Keyword Density
                </h3>
                <div id="keyword-list" class="space-y-3">
                    <div class="text-gray-400 italic text-sm">Enter text to see keyword analysis...</div>
                </div>
            </div>
            <div class="p-5 bg-purple-50/50 border border-purple-100/50 rounded-xl">
                <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-microscope text-purple-500"></i>
                    Technical Metrics
                </h3>
                <div class="grid grid-cols-1 gap-3 text-sm text-gray-600">
                    <div class="flex justify-between items-center bg-white p-3 rounded-lg border border-gray-100">
                        <span>Average Word Length</span>
                        <span id="avg-word" class="font-bold text-gray-900">0.0</span>
                    </div>
                    <div class="flex justify-between items-center bg-white p-3 rounded-lg border border-gray-100">
                        <span>Paragraph Count</span>
                        <span id="stat-paragraphs" class="font-bold text-gray-900">0</span>
                    </div>
                    <div class="flex justify-between items-center bg-white p-3 rounded-lg border border-gray-100">
                        <span>Estimated Syllables</span>
                        <span id="stat-syllables" class="font-bold text-gray-900">0</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-content.php'; ?>

<!-- Suggested Tools Strip -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-suggested.php'; ?>

<!-- Popular Tools Section -->
<section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
    <div class="max-w-7xl mx-auto text-center md:text-left">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Most Popular Tools</h2>
                <p class="text-gray-500 mt-1">Discover other highly useful tools in our directory.</p>
            </div>
            <a href="<?php echo URL_ROOT; ?>" class="inline-flex items-center px-6 py-3 bg-gray-50 text-gray-700 font-bold rounded-xl border border-gray-200 hover:bg-white hover:border-primary transition-all duration-200">
                View All Tools <i class="fa-solid fa-arrow-right-long ms-3"></i>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php 
            $allToolsRegistry = require CONFIG . DS . 'tools_registry.php';
            $batchPopular = array_slice($allToolsRegistry, 0, 4, true); 
            foreach ($batchPopular as $pSlug => $pTool): 
            ?>
            <a href="<?php echo URL_ROOT; ?>/<?php echo $pSlug; ?>" class="group bg-white border border-gray-200 rounded-2xl p-6 flex flex-col items-center text-center hover:border-primary/50 hover:shadow-xl hover:shadow-primary/5 transition-all duration-300 transform hover:-translate-y-1">
                <div class="w-16 h-16 bg-gray-50 text-primary rounded-2xl flex items-center justify-center text-2xl group-hover:bg-primary group-hover:text-white transition-all duration-300 shadow-sm mb-4 border border-gray-100">
                    <?php echo render_tool_icon($pTool['icon']); ?>
                </div>
                <h3 class="text-lg font-bold text-gray-900 truncate w-full mb-2 group-hover:text-primary transition-colors"><?php echo htmlspecialchars($pTool['title']); ?></h3>
                <p class="text-sm text-gray-500 line-clamp-2 leading-relaxed"><?php echo htmlspecialchars($pTool['desc']); ?></p>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const stats = {
        words: document.getElementById('stat-words'),
        chars: document.getElementById('stat-chars'),
        sentences: document.getElementById('stat-sentences'),
        reading: document.getElementById('stat-reading'),
        paragraphs: document.getElementById('stat-paragraphs'),
        syllables: document.getElementById('stat-syllables'),
        avgWord: document.getElementById('avg-word'),
        keywords: document.getElementById('keyword-list')
    };

    function countSyllables(word) {
        word = word.toLowerCase();
        if(word.length <= 3) return 1;
        word = word.replace(/(?:[^laeiouy]es|ed|[^laeiouy]e)$/, '');
        word = word.replace(/^y/, '');
        const syl = word.match(/[aeiouy]{1,2}/g);
        return syl ? syl.length : 1;
    }

    function updateStats() {
        const text = input.value;
        const words = text.trim().split(/\s+/).filter(w => w.length > 0);
        const sentences = text.split(/[.!?]+/).filter(s => s.trim().length > 0);
        const paragraphs = text.split(/\n+/).filter(p => p.trim().length > 0);
        
        // Basic Stats
        stats.words.innerText = words.length.toLocaleString();
        stats.chars.innerText = text.length.toLocaleString();
        stats.sentences.innerText = sentences.length.toLocaleString();
        stats.paragraphs.innerText = paragraphs.length.toLocaleString();
        
        // Reading Time (225 wpm)
        const totalMinutes = Math.ceil(words.length / 225);
        stats.reading.innerText = totalMinutes + 'm';

        // Syllable Logic
        let totalSyllables = 0;
        words.forEach(w => {
            totalSyllables += countSyllables(w);
        });
        stats.syllables.innerText = totalSyllables.toLocaleString();

        // Averages
        stats.avgWord.innerText = words.length ? (text.replace(/\s/g, '').length / words.length).toFixed(1) : '0.0';

        // Keyword Density
        const density = {};
        words.filter(w => w.length > 3).forEach(w => {
            const key = w.toLowerCase().replace(/[.,!?;:]/g, '');
            density[key] = (density[key] || 0) + 1;
        });

        const sortedKeywords = Object.entries(density)
            .sort((a, b) => b[1] - a[1])
            .slice(0, 5);

        if(sortedKeywords.length) {
            stats.keywords.innerHTML = sortedKeywords.map(([k, v]) => `
                <div class="flex justify-between items-center bg-white p-3 rounded-lg border border-gray-100 shadow-sm">
                    <span class="font-medium text-gray-700 truncate mr-4">${k}</span>
                    <span class="text-xs bg-gray-100 text-gray-500 px-2 py-1 rounded-md font-bold">${v} (${((v/words.length)*100).toFixed(1)}%)</span>
                </div>
            `).join('');
        } else {
            stats.keywords.innerHTML = '<div class="text-gray-400 italic text-sm">Need more text for analysis...</div>';
        }
    }

    input.addEventListener('input', updateStats);

    document.getElementById('clear-btn').addEventListener('click', () => {
        input.value = '';
        updateStats();
        input.focus();
    });

    document.getElementById('copy-btn').addEventListener('click', () => {
        if(!input.value) return;
        input.select();
        document.execCommand('copy');
        
        // Simple success state
        const originalText = document.getElementById('copy-btn').innerHTML;
        document.getElementById('copy-btn').innerHTML = '<i class="fa-solid fa-check"></i> <span>Copied!</span>';
        setTimeout(() => {
            document.getElementById('copy-btn').innerHTML = originalText;
        }, 2000);
    });
});
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>
?>