

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6 text-uppercase small tracking-wider">Source Content (Lines of Text)</label>
                    <textarea id="input-text" class="form-control" rows="8" placeholder="Enter items separated by new lines..."></textarea>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Columns</label>
                        <input type="number" id="col-count" class="form-control" value="2" min="1" max="10">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Column Width</label>
                        <input type="number" id="col-width" class="form-control" value="20" min="5" max="100">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Alignment</label>
                        <select id="col-align" class="form-select">
                            <option value="left">Left</option>
                            <option value="center">Center</option>
                            <option value="right">Right</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Separator</label>
                        <input type="text" id="col-sep" class="form-control" value=" | " maxlength="5">
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center">
                    <button id="format-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Format Columns <i class="fa-solid fa-table ms-2"></i>
                    </button>
                    <button id="clear-btn" class="btn btn-link text-muted text-decoration-none fw-bold">Reset</button>
                </div>
            </div>

            <!-- Results Section -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Formatted Result</h5>
                    <button class="btn btn-sm btn-outline-primary" onclick="copyResult()">Copy Formatted Text</button>
                </div>
                <pre id="column-output" class="p-4 rounded-4 bg-light border shadow-sm font-monospace lh-sm" style="overflow-x: auto; font-size: 0.9rem;"></pre>
            </div>
        
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Structural Clarity: Mastering the Text Column Formatter</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">Managing large lists of data often leads to vertical fatigue—where a reader loses context due to excessive scrolling. Our <strong>Text Column Formatter</strong> is a specialized utility designed to transform messy, unorganized vertical lists into clean, structured, and horizontally aligned columns. This improves both the aesthetic appeal and the readability of your documentation.</p>
            
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Does this tool support HTML tables?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">This tool is specifically for "Plain Text" column formatting. For web-based data, we offer a separate HTML Table Generator that creates standard &lt;table&gt; tags.</div>
                        </div>
                    </div>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "Text Column Formatter",
  "operatingSystem": "Any",
  "applicationCategory": "UtilitiesApplication",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "featureList": [
    "Multi-column text alignment",
    "Custom column width controls",
    "Left/Center/Right padding logic",
    "Real-time text block generation"
  ]
}
</script>
<style>
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
#column-output { white-space: pre; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const formatBtn = document.getElementById('format-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');
    const output = document.getElementById('column-output');

    formatBtn.addEventListener('click', () => {
        const text = input.value.trim();
        if(!text) return;

        const colCount = parseInt(document.getElementById('col-count').value);
        const colWidth = parseInt(document.getElementById('col-width').value);
        const align = document.getElementById('col-align').value;
        const sep = document.getElementById('col-sep').value;

        const lines = text.split('\n').filter(l => l.trim() !== "");
        const rowsCount = Math.ceil(lines.length / colCount);
        
        let result = "";

        for(let r=0; r<rowsCount; r++) {
            let rowText = "";
            for(let c=0; c<colCount; c++) {
                const index = r + (c * rowsCount);
                const item = lines[index] || "";
                
                rowText += formatItem(item, colWidth, align);
                if(c < colCount - 1) rowText += sep;
            }
            result += rowText + "\n";
        }

        output.innerText = result;
        wrapper.style.display = 'block';
        wrapper.scrollIntoView({ behavior: 'smooth' });
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        wrapper.style.display = 'none';
        output.innerText = '';
    });

    function formatItem(str, width, align) {
        if(str.length >= width) return str;
        
        const space = width - str.length;
        if(align === 'left') return str.padEnd(width, ' ');
        if(align === 'right') return str.padStart(width, ' ');
        
        // Center
        const left = Math.floor(space / 2);
        const right = space - left;
        return ' '.repeat(left) + str + ' '.repeat(right);
    }

    window.copyResult = () => {
        navigator.clipboard.writeText(output.innerText);
        showToast('Formatted text copied!');
    };
});
</script>






