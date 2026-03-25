

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Beyond the Glyph: The Mechanics of Unicode Inspection</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">In the digital age, text is more than just visible shapes. Every character you see on your screen—from a simple 'A' to a complex Emoji like 👨‍💻—is represented by a unique numerical value within the Unicode Standard. Our <strong>Unicode Inspector</strong> is a professional-grade analyzer that peels back the visual layer of text to expose its underlying data structure.</p>
            
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">How many Unicode characters exist?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">The Unicode 15.1 standard contains 149,813 characters. This includes scripts for living languages, historic scripts, symbols, and emojis.</div>
                        </div>
                    </div>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->


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






