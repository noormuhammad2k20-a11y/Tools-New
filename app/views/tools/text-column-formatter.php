<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
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
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Structural Clarity: Mastering the Text Column Formatter</h2>
                    
                    <div class="seo-section mb-5">
                        <p class="lead">Managing large lists of data often leads to vertical fatigue—where a reader loses context due to excessive scrolling. Our <strong>Text Column Formatter</strong> is a specialized utility designed to transform messy, unorganized vertical lists into clean, structured, and horizontally aligned columns. This improves both the aesthetic appeal and the readability of your documentation.</p>
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
                        <p>Whether you're preparing a list of products for a catalog, organizing names for a directory, or formatting logs for technical reports, column-based presentation is a hallmark of professional text processing.</p>
                    </div>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">The Benefits of Columnar Layouts</h3>
                    <p>In the world of typography and information design, "Line Length" is a critical variable. Very long vertical lists can be difficult to scan quickly. By breaking a list into multiple columns, you decrease the cognitive load on the reader, allowing them to compare items side-by-side more effectively.</p>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Advanced Formatting Options</h3>
                    <p>Unlike basic list tools, our professional formatter gives you total control over the output structure:</p>
                    <ul>
                        <li><strong>Fixed Width Alignment:</strong> Ensure every item in a column occupies the same horizontal space, creating perfectly straight edges.</li>
                        <li><strong>Custom Separators:</strong> Use pipes (|), dashes (-), or custom symbols to define the boundaries between your data sets.</li>
                        <li><strong>Padding Logic:</strong> Automatically adds spaces to shorter items to maintain the structural integrity of the column grid.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">Professional Use Cases</h3>
                    <ol>
                        <li><strong>Markdown Documentation:</strong> Quickly format plain text lists into multi-column layouts for README files or technical guides.</li>
                        <li><strong>CLI output cleanup:</strong> Professional developers often use this to tidy up raw data extracted from scripts or terminal logs before presenting them to stakeholders.</li>
                        <li><strong>Email Marketing:</strong> Format feature lists or price tables in columns to ensure a balanced look on desktop email clients.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mb-3">How the Algorithm Works</h3>
                    <p>The formatter first parses your input line by line, calculating the total item count. Based on your desired column count, it calculates the items per column and uses string padding to ensure that every cell matches the specified column width. It then joins these padded cells with your chosen separator, resulting in a perfectly aligned text block.</p>

                    <hr class="my-5">

                    <h4 class="fw-bold mb-4">FAQ: Refining Columnar Structures</h4>
                    <div class="accordion" id="faqAccordion">
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">What happens if an item is longer than the column width?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">If an item exceeds the width, the tool will still display it, but it may cause the columns to become misaligned. We recommend setting a width slightly larger than your longest list item for the best visual result.</div>
                        </div>
                        <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Does this tool support HTML tables?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                            <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">This tool is specifically for "Plain Text" column formatting. For web-based data, we offer a separate HTML Table Generator that creates standard &lt;table&gt; tags.</div>
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


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>