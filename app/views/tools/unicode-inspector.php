<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6 text-uppercase small tracking-wider">Inspect Your Text</label>
                    <textarea id="input-text" class="form-control" rows="8" placeholder="Paste symbols, emoji, or foreign characters here..."></textarea>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center">
                    <button id="inspect-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Inspect Characters <i class="fa-solid fa-microscope ms-2"></i>
                    </button>
                    <button id="clear-btn" class="btn btn-link text-muted text-decoration-none fw-bold">Clear</button>
                </div>
            </div>

            <!-- Results Section -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Character Breakdown</h5>
                    <button class="btn btn-sm btn-outline-primary" onclick="exportJSON()">Export JSON Metadata</button>
                </div>
                
                <div class="table-responsive rounded-4 border overflow-hidden shadow-sm bg-white">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="ps-4">Char</th>
                                <th>Unicode (Hex)</th>
                                <th>Decimal</th>
                                <th>General Category</th>
                                <th class="pe-4">UTF-16 Code Units</th>
                            </tr>
                        </thead>
                        <tbody id="inspector-table-body"></tbody>
                    </table>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Beyond the Glyph: The Mechanics of Unicode Inspection</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">In the digital age, text is more than just visible shapes. Every character you see on your screen—from a simple 'A' to a complex Emoji like 👨‍💻—is represented by a unique numerical value within the Unicode Standard. Our <strong>Unicode Inspector</strong> is a professional-grade analyzer that peels back the visual layer of text to expose its underlying data structure.</p>
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
                        <p>Understanding Unicode is essential for developers, linguists, and data scientists. Whether you're debugging "Mojibake" (garbled text) or identifying hidden control characters, having a high-precision inspector is the difference between guessing and knowing.</p>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">What is Unicode?</h3>
                    <p>Unicode is an international standard for the consistent encoding, representation, and handling of text in most of the world's writing systems. Before Unicode, different systems used conflicting character sets (like ASCII or Shift JIS), making global data exchange a nightmare. Today, Unicode supports over 140,000 characters across hundreds of scripts.</p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">The Significance of 'Code Points'</h3>
                    <p>A "Code Point" is the atomic unit of the Unicode standard, usually written in hex format as <code>U+XXXX</code>. For example, the code point for the letter 'A' is <code>U+0041</code>. Complex symbols, such as emojis with different skin tones, are often sequences of multiple code points joined by invisible "Zero Width Joiners" (ZWJ). Our tool breaks these down into their constituent parts.</p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Why Professionals Use an Inspector</h3>
                    <ul>
                        <li><strong>Data Sanitization:</strong> Detect hidden non-breaking spaces, zero-width spaces, or legacy control characters that can break database queries.</li>
                        <li><strong>Cybersecurity:</strong> Identify "Homoglyph Attacks"—where look-alike characters from different scripts are used to spoof URLs or filenames.</li>
                        <li><strong>Internationalization (i18n):</strong> Verify that your web application correctly handles right-to-left (RTL) marks or complex ligatures in scripts like Arabic or Devanagari.</li>
                        <li><strong>Emoji Analysis:</strong> Deconstruct complex emoji sequences to understand how they are rendered across different platforms.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Decoding UTF-16 and Surrogate Pairs</h3>
                    <p>JavaScript uses UTF-16 encoding internally. For characters outside the "Basic Multilingual Plane" (like many Emojis), JavaScript uses "Surrogate Pairs"—two 16-bit values that represent a single character. Our inspector explicitly shows these pairs, providing invaluable insight for developers working with string manipulation.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Unicode Logic</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">What is the General Category of a character?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">Unicode classifies characters into categories like "Uppercase Letter" (Lu), "Decimal Number" (Nd), "Space Separator" (Zs), and "Other Symbol" (So). This metadata is crucial for regular expressions and text processing.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">How many Unicode characters exist?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">The Unicode 15.1 standard contains 149,813 characters. This includes scripts for living languages, historic scripts, symbols, and emojis.</div>
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
  "name": "Unicode Inspector Pro",
  "operatingSystem": "Any",
  "applicationCategory": "UtilitiesApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Code point hex decomposition",
    "Decimal value mapping",
    "UTF-16 surrogate pair detection",
    "General Category metadata identification",
    "Real-time character analysis"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
.char-cell {
    font-size: 1.5rem;
    font-family: serif;
    background: #f8fafc;
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const inspectBtn = document.getElementById('inspect-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const tableBody = document.getElementById('inspector-table-body');

    let currentData = [];

    inspectBtn.addEventListener('click', () => {
        const text = input.value;
        if(!text) return;

        // Correctly iterate over Unicode code points (handles surrogate pairs)
        const chars = [...text];
        currentData = chars.map(char => {
            const codePoint = char.codePointAt(0);
            const hex = codePoint.toString(16).toUpperCase().padStart(4, '0');
            const units = [];
            for(let i=0; i<char.length; i++) {
                units.push('0x' + char.charCodeAt(i).toString(16).toUpperCase().padStart(4, '0'));
            }

            return {
                char: char,
                hex: `U+${hex}`,
                dec: codePoint,
                category: getGeneralCategory(char),
                units: units.join(', ')
            };
        });

        renderResults();
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        wrapper.style.display = 'none';
        tableBody.innerHTML = '';
        input.focus();
    });

    function renderResults() {
        tableBody.innerHTML = currentData.map(d => `
            <tr>
                <td class="ps-4">
                    <div class="char-cell border shadow-sm">${d.char}</div>
                </td>
                <td class="font-monospace fw-bold text-primary">${d.hex}</td>
                <td class="text-muted">${d.dec}</td>
                <td><span class="badge bg-light text-dark border">${d.category}</span></td>
                <td class="pe-4 font-monospace small">${d.units}</td>
            </tr>
        `).join('');

        wrapper.style.display = 'block';
        wrapper.scrollIntoView({ behavior: 'smooth' });
    }

    // Heuristic for General Category using Regex (Limited but effective for UI)
    function getGeneralCategory(char) {
        if(/\p{Lu}/u.test(char)) return "Uppercase Letter (Lu)";
        if(/\p{Ll}/u.test(char)) return "Lowercase Letter (Ll)";
        if(/\p{Nd}/u.test(char)) return "Decimal Number (Nd)";
        if(/\p{P}/u.test(char)) return "Punctuation (P)";
        if(/\p{S}/u.test(char)) return "Symbol (S)";
        if(/\p{Z}/u.test(char)) return "Separator (Z)";
        if(/\p{M}/u.test(char)) return "Mark (M)";
        if(/\p{C}/u.test(char)) return "Control / Other (C)";
        return "Unknown / Unassigned";
    }

    window.exportJSON = () => {
        const blob = new Blob([JSON.stringify(currentData, null, 2)], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'unicode-analysis.json';
        a.click();
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>