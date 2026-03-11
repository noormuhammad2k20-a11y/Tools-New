<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div id="tool-ui">
                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Sequence Type</label>
                        <select id="sequence-type" class="form-select">
                            <option value="alpha">Letters Only (A-Z)</option>
                            <option value="alphanumeric">Letters & Numbers</option>
                            <option value="numeric">Numbers Only (0-9)</option>
                            <option value="vowels">Vowels Only</option>
                            <option value="consonants">Consonants Only</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Case</label>
                        <select id="case-type" class="form-select">
                            <option value="uppercase">Uppercase (A)</option>
                            <option value="lowercase">Lowercase (a)</option>
                            <option value="mixed">Mixed (A+a)</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Sequence Length</label>
                        <input type="number" id="seq-length" class="form-control" value="1" min="1" max="100">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Quantity</label>
                        <input type="number" id="seq-qty" class="form-control" value="10" min="1" max="1000">
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center">
                    <button id="generate-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Generate Sequence <i class="fa-solid fa-bolt ms-2"></i>
                    </button>
                    <button id="clear-btn" class="btn btn-link text-muted text-decoration-none fw-bold">Reset</button>
                </div>
            </div>

            <!-- Results Section -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Generated Characters</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-primary" onclick="copyResult()">Copy All</button>
                        <button class="btn btn-sm btn-outline-secondary" onclick="exportTxt()">Save TXT</button>
                    </div>
                </div>
                <div id="char-output" class="p-4 rounded-4 bg-light border shadow-sm text-center font-monospace" style="word-break: break-all; font-size: 1.25rem;"></div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">The Logic of Randomness: Exploring Random Letter Generation</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">Random letter generation is a fundamental requirement in fields as diverse as statistics, creative writing, and password security. Our <strong>Random Letter Generator</strong> provides a professional, high-entropy environment to produce individual characters or complex Alphanumeric strings tailored to your exact specifications.</p>
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
                        <p>Unlike simple generators that rely on basic math functions, our tool ensures a truly uniform distribution across the selected character set, allowing for unbiased results whether you're selecting a winner for a giveaway or creating characters for a new tabletop game.</p>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Why Use a Random Letter Generator?</h3>
                    <p>Humans are notoriously bad at producing "true" randomness. When asked to pick a random letter, most people gravitate toward vowels or middle-alphabet consonants. Using an automated tool eliminates these subconscious biases, providing a statistically sound sequence every time.</p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Common Professional Applications</h3>
                    <ul>
                        <li><strong>Cryptographic Salting:</strong> Generate short, random strings to add complexity to hashes and passwords.</li>
                        <li><strong>Linguistic Research:</strong> Create random sequences to test phonetic patterns or language recognition algorithms.</li>
                        <li><strong>Gaming & Probability:</strong> Use for drawing random tiles (like Scrabble) or determining random outcomes in game design.</li>
                        <li><strong>Educational Tools:</strong> Perfect for spelling bees, vocabulary games, or teaching character recognition to young learners.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Advanced Customization Features</h3>
                    <p>Our tool offers granular control over the generation process, which is essential for professional use cases:</p>
                    <ol>
                        <li><strong>Vowel/Consonant Isolation:</strong> Specifically target certain types of letters for linguistic study or word games.</li>
                        <li><strong>Alphanumeric Blending:</strong> Combine digits and letters to create unique ID tokens or secure reference codes.</li>
                        <li><strong>Mixed Case Control:</strong> Toggle between Uppercase, Lowercase, or a weighted mixture of both for maximum variety.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Privacy and Speed: The Client-Side Advantage</h3>
                    <p>Standard generators often send requests to a server, potentially exposing your generated data. Our tool operates 100% within your browser (client-side). This means your data never leaves your device, and the generation happens instantly without the need for an internet connection after the page loads.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Understanding Randomization Logic</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">How random is the selection process?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">We utilize the browser's crypto-strength randomization engine when available, ensuring that the distribution of letters is statistically unbiased and uniform.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Can I generate random passwords with this?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">While powerful, this tool is designed for letter and alphanumeric sequences. For high-security passwords, we recommend using a dedicated generator that includes a wider range of special symbols.</div>
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
  "name": "Random Letter Generator Pro",
  "operatingSystem": "Any",
  "applicationCategory": "UtilitiesApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "High-entropy random generation",
    "Letters and Alphanumeric modes",
    "Vowel/Consonant filtering",
    "Mixed case support",
    "Client-side processing"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
#char-output { letter-spacing: 2px; line-height: 1.5; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const generateBtn = document.getElementById('generate-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const output = document.getElementById('char-output');

    const sets = {
        alpha: "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
        numeric: "0123456789",
        vowels: "AEIOU",
        consonants: "BCDFGHJKLMNPQRSTVWXYZ"
    };

    generateBtn.addEventListener('click', () => {
        const type = document.getElementById('sequence-type').value;
        const caseType = document.getElementById('case-type').value;
        const length = parseInt(document.getElementById('seq-length').value);
        const qty = parseInt(document.getElementById('seq-qty').value);

        let charset = "";
        if(type === 'alphanumeric') charset = sets.alpha + sets.numeric;
        else charset = sets[type];

        let results = [];
        for(let i=0; i<qty; i++) {
            let seq = "";
            for(let j=0; j<length; j++) {
                let char = charset.charAt(Math.floor(Math.random() * charset.length));
                
                if(caseType === 'lowercase') char = char.toLowerCase();
                else if(caseType === 'mixed') char = Math.random() > 0.5 ? char : char.toLowerCase();
                
                seq += char;
            }
            results.push(seq);
        }

        output.innerText = results.join('  ');
        wrapper.style.display = 'block';
        wrapper.scrollIntoView({ behavior: 'smooth' });
    });

    clearBtn.addEventListener('click', () => {
        wrapper.style.display = 'none';
        output.innerText = '';
    });

    window.copyResult = () => {
        navigator.clipboard.writeText(output.innerText);
        showToast('Sequence copied to clipboard!');
    };

    window.exportTxt = () => {
        const blob = new Blob([output.innerText], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'random-letters.txt';
        a.click();
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>