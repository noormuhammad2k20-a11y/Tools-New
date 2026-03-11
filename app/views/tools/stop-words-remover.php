<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6 text-uppercase small tracking-wider">Source Content</label>
                    <textarea id="input-text" class="form-control" rows="8" placeholder="Paste your text or article here..."></textarea>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Language Preset</label>
                        <select id="lang-preset" class="form-select">
                            <option value="en">English (Commonly used)</option>
                            <option value="es">Spanish (Español)</option>
                            <option value="fr">French (Français)</option>
                            <option value="de">German (Deutsch)</option>
                            <option value="it">Italian (Italiano)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Custom Stop Words (Secondary)</label>
                        <input type="text" id="custom-words" class="form-control" placeholder="example: however, therefore, etc.">
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center">
                    <button id="process-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Remove Stop Words <i class="fa-solid fa-broom ms-2"></i>
                    </button>
                    <button id="clear-btn" class="btn btn-link text-muted text-decoration-none fw-bold">Reset</button>
                </div>
            </div>

            <!-- Results Section -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-4 border">
                            <span class="text-muted small fw-bold text-uppercase">Words Removed</span>
                            <h4 id="stat-removed" class="fw-bold text-primary mb-0 mt-1">0</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-4 border">
                            <span class="text-muted small fw-bold text-uppercase">Retention Rate</span>
                            <h4 id="stat-retention" class="fw-bold text-primary mb-0 mt-1">0%</h4>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Cleaned Result</h5>
                    <button class="btn btn-sm btn-outline-primary" onclick="copyResult()">Copy Cleaned Text</button>
                </div>
                <div id="text-output" class="p-4 rounded-4 bg-light border shadow-sm lh-lg" style="white-space: pre-wrap;"></div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">NLP Essentials: The Role of Stop Words Removal</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">In the fields of search engine optimization and machine learning, text needs to be "distilled" to its most meaningful components. Our <strong>Stop Words Remover</strong> is a specialized utility that filters out common glue words—such as "the," "is," "and," and "in"—which carry little information but high frequency. By removing these, you allow algorithms (and readers) to focus on the semantic core of your text.</p>
            <!-- Features Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 not-prose mt-8 mb-8">
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-bolt"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Lightning Fast</h4>
                    <p class="text-sm text-gray-500">Get your results instantly without waiting or reloading.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-shield-halved"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Secure</h4>
                    <p class="text-sm text-gray-500">All data processing happens securely in your own browser.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Easy to Use</h4>
                    <p class="text-sm text-gray-500">No complex settings, just drop your data and execute.</p>
                </div>
            </div>
                        <p>Whether you're creating a word cloud, training an AI model, or optimizing URL slugs, removing stop words is a standard first step in professional text processing pipeline.</p>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">What are Stop Words?</h3>
                    <p>Stop words are the most common words in any language. They provide the grammatical framework of a sentence but often act as "noise" when performing statistical analysis. In English, words like "a," "an," "be," and "to" account for a significant percentage of any text body. Eliminating them reduces the dimensionality of your data without sacrificing the primary meaning.</p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Why Remove Them for SEO?</h3>
                    <p>When search engines index pages, they often give more weight to nouns, verbs, and unique adjectives. Excessively wordy subheadlines or meta descriptions filled with stop words can dilute your primary keyword density. Using a remover tool helps you identify the "Keyword Essence" of your content, ensuring that your most important terms stand out.</p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Professional Applications</h3>
                    <ul>
                        <li><strong>Content Analysis:</strong> Identify which topics your article is *truly* about by looking at the remaining high-frequency words.</li>
                        <li><strong>Slug Optimization:</strong> Create shorter, more punchy URLs by removing unnecessary filler words from your titles.</li>
                        <li><strong>Sentiment Analysis:</strong> Pre-process data for machine learning models to improve prediction accuracy by removing insignificant tokens.</li>
                        <li><strong>Memory Efficiency:</strong> Reduce the size of text indexes in search databases by up to 20-30%.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Global Language Support</h3>
                    <p>Different languages have different stop word patterns. Our tool supports multiple major languages, including Spanish, French, German, and Italian. Each preset uses a curated list of linguistic "noise" unique to that tongue, providing a localized cleaning experience.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Data Cleaning and Filtering</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Will removing stop words change the meaning of my text?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Grammatically, the text will no longer be "correct" in a human-readable sense, but the semantic keywords (the main ideas) will remain intact. It is primarily for data analysis, not for final publishing.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Can I add my own words to the list?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Yes! You can enter additional words in the "Custom" field to filter out specific jargon or brand names that you consider "noise" for your particular project.</div>
                        </div>
                    </div>
        </article>
    </div>
</section>

<!-- Suggested Tools Strip -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-suggested.php'; ?>

<!-- Popular Tools Section -->
<section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Most Popular Tools</h2>
            <a href="<?php echo URL_ROOT; ?>" class="text-sm font-medium text-primary hover:text-primary-hover transition-colors">See All &rarr;</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php 
            $allToolsRegistry = require CONFIG . DS . 'tools_registry.php';
            $popularTools = array_slice($allToolsRegistry, 0, 4, true); 
            foreach ($popularTools as $pSlug => $pTool): 
            ?>
            <a href="<?php echo URL_ROOT; ?>/<?php echo $pSlug; ?>" class="group bg-gray-50 border border-gray-200 rounded-xl p-5 flex gap-4 items-start hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all duration-200">
                <div class="flex-shrink-0 w-12 h-12 bg-white text-primary rounded-lg flex items-center justify-center text-xl group-hover:bg-primary group-hover:text-white transition-colors duration-200 shadow-sm border border-gray-100">
                    <?php echo render_tool_icon($pTool['icon']); ?>
                </div>
                <div class="flex-grow min-w-0">
                    <h3 class="text-base font-semibold text-gray-900 truncate mb-1 group-hover:text-primary transition-colors"><?php echo htmlspecialchars($pTool['title']); ?></h3>
                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed"><?php echo htmlspecialchars($pTool['desc']); ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "Stop Words Remover Pro",
  "operatingSystem": "Any",
  "applicationCategory": "UtilitiesApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Multi-language stop word filtering",
    "Custom exclusion lists",
    "NLP pre-processing logic",
    "Retention rate and removal statistics"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
#text-output { font-weight: 500; font-size: 1.05rem; color: #334155; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const processBtn = document.getElementById('process-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const output = document.getElementById('text-output');
    
    const removedEl = document.getElementById('stat-removed');
    const retentionEl = document.getElementById('stat-retention');

    const stopWords = {
        en: ["a", "about", "above", "after", "again", "against", "all", "am", "an", "and", "any", "are", "as", "at", "be", "because", "been", "before", "being", "below", "between", "both", "but", "by", "can", "did", "do", "does", "doing", "don't", "down", "during", "each", "few", "for", "from", "further", "had", "has", "have", "having", "he", "her", "here", "hers", "herself", "him", "himself", "his", "how", "i", "if", "in", "into", "is", "it", "its", "itself", "just", "me", "more", "most", "my", "myself", "no", "nor", "not", "now", "of", "off", "on", "once", "only", "or", "other", "ought", "our", "ours", "ourselves", "out", "over", "own", "s", "same", "she", "should", "so", "some", "such", "than", "that", "the", "their", "theirs", "them", "themselves", "then", "there", "these", "they", "this", "those", "through", "to", "too", "under", "until", "up", "very", "was", "we", "were", "what", "when", "where", "which", "while", "who", "whom", "why", "with", "would", "you", "your", "yours", "yourself", "yourselves"],
        es: ["a", "al", "algo", "algunas", "algunos", "ante", "antes", "como", "con", "contra", "cual", "cuando", "de", "del", "desde", "donde", "durante", "e", "el", "ella", "ellas", "ellos", "en", "entre", "era", "erais", "eramos", "eran", "eras", "eres", "es", "esa", "esas", "ese", "eses", "eso", "esos", "esta", "estaba", "estaban", "estado", "estamos", "estan", "estar", "estas", "este", "estos", "estoy", "fue", "fueron", "fui", "fuimos", "ha", "habeis", "habia", "habian", "habido", "habla", "hablan", "habre", "han", "has", "hasta", "hay", "la", "las", "le", "les", "lo", "los", "me", "mi", "mis", "mucho", "muchos", "muy", "nos", "nosotras", "nosotros", "o", "otra", "otras", "otro", "otros", "para", "pero", "poco", "por", "porque", "que", "quien", "quienes", "si", "sin", "sobre", "son", "su", "sus", "suya", "suyo", "tambien", "tanto", "te", "tendremos", "tendria", "tengo", "ti", "tiene", "tienen", "todo", "todos", "tu", "tus", "un", "una", "unas", "uno", "unos", "usted", "ustedes", "y", "ya", "yo"],
        fr: ["a", "au", "aux", "avec", "ce", "ces", "dans", "de", "des", "du", "elle", "en", "et", "eux", "il", "ils", "je", "la", "le", "les", "leur", "lui", "ma", "mais", "me", "même", "mes", "moi", "mon", "ne", "nos", "notre", "nous", "on", "ou", "par", "pas", "pour", "qu", "que", "qui", "sa", "se", "ses", "son", "sur", "ta", "te", "tes", "toi", "ton", "tu", "un", "une", "vos", "votre", "vous"],
        de: ["aber", "als", "am", "an", "auch", "auf", "aus", "bei", "bin", "bis", "bist", "da", "dadurch", "daher", "darum", "das", "daß", "dass", "dein", "deine", "dem", "den", "der", "des", "dessen", "deshalb", "die", "dies", "dieser", "dieses", "doch", "dort", "du", "durch", "ein", "eine", "einem", "einen", "einer", "eines", "er", "es", "euer", "euer", "für", "hatte", "hatten", "hattest", "hattet", "hier", "hinter", "ich", "im", "in", "ist", "ja", "jede", "jedem", "jeden", "jeder", "jedes", "jener", "jenes", "jetzt", "kann", "kannst", "können", "könnt", "machen", "mein", "meine", "mit", "muß", "mußt", "musst", "müssen", "müßt", "nach", "nachdem", "nein", "nicht", "nun", "oder", "seid", "sein", "seine", "sich", "sie", "sind", "soll", "sollen", "sollst", "sollt", "sonst", "soweit", "sowie", "und", "unser", "unsere", "unter", "vom", "von", "vor", "wann", "war", "waren", "warst", "wart", "was", "weg", "weil", "weiter", "welche", "welchem", "welchen", "welcher", "welches", "wenn", "werde", "werden", "werdet", "weshalb", "wie", "wieder", "wir", "wird", "wirst", "wo", "woher", "wohin", "zu", "zum", "zur", "zwar", "zwischen"],
        it: ["a", "ad", "al", "all", "alla", "alle", "agli", "allo", "anche", "ancora", "aveva", "avevano", "ben", "che", "chi", "con", "da", "di", "del", "della", "delle", "degli", "dello", "e", "ed", "era", "erano", "ha", "hanno", "i", "il", "in", "io", "l", "la", "le", "lei", "li", "lo", "loro", "lui", "ma", "mi", "mia", "mie", "miei", "mio", "ne", "non", "nos", "nostra", "nostre", "nostri", "nostro", "o", "per", "proprio", "quella", "quelle", "quelli", "quello", "questa", "queste", "questi", "questo", "s", "si", "sia", "siate", "siamo", "siano", "siete", "sono", "su", "sua", "sue", "sugli", "sui", "sul", "sulla", "sulle", "suo", "suoi", "tra", "un", "una", "uno", "vi", "voi", "vostra", "vostre", "vostri", "vostro"]
    };

    processBtn.addEventListener('click', () => {
        const text = input.value.trim();
        if(!text) return;

        const lang = document.getElementById('lang-preset').value;
        const custom = document.getElementById('custom-words').value.toLowerCase().split(/[\s,]+/).filter(w => w.length > 0);
        
        const filterSet = new Set([...stopWords[lang], ...custom]);
        
        // Regex to split while keeping punctuation as potential tokens (simplified)
        const tokens = text.split(/(\s+)/);
        let removedCount = 0;
        let totalWords = 0;

        const result = tokens.map(token => {
            const clean = token.trim().toLowerCase().replace(/[^\w]/g, '');
            if(clean && filterSet.has(clean)) {
                removedCount++;
                return '';
            }
            if(clean) totalWords++;
            return token;
        }).join('').replace(/\s+/g, ' ').trim();

        removedEl.innerText = removedCount.toLocaleString();
        const rate = totalWords + removedCount === 0 ? 0 : ((totalWords / (totalWords + removedCount)) * 100).toFixed(1);
        retentionEl.innerText = `${rate}%`;

        output.innerText = result;
        wrapper.style.display = 'block';
        wrapper.scrollIntoView({ behavior: 'smooth' });
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        wrapper.style.display = 'none';
        input.focus();
    });

    window.copyResult = () => {
        navigator.clipboard.writeText(output.innerText);
        showToast('Cleaned text copied!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>