

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">NLP Essentials: The Role of Stop Words Removal</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">In the fields of search engine optimization and machine learning, text needs to be "distilled" to its most meaningful components. Our <strong>Stop Words Remover</strong> is a specialized utility that filters out common glue words—such as "the," "is," "and," and "in"—which carry little information but high frequency. By removing these, you allow algorithms (and readers) to focus on the semantic core of your text.</p>
            
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Can I add my own words to the list?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Yes! You can enter additional words in the "Custom" field to filter out specific jargon or brand names that you consider "noise" for your particular project.</div>
                        </div>
                    </div>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->


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






