<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <!-- Tool UI -->
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">JSON Input</label>
                        <textarea id="json-input" class="form-control" rows="15" placeholder='{"id": 1, "name": "John Doe", "active": true}'></textarea>
                    </div>
                    <div class="d-grid">
                        <button id="convert-btn" class="btn btn-primary btn-lg rounded-pill fw-bold shadow">
                            Convert to TypeScript <i class="fa-solid fa-bolt ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label fw-bold mb-0">TS Interface Output</label>
                            <button class="btn btn-link btn-sm text-primary fw-bold text-decoration-none" onclick="copyResult()">
                                <i class="fa-solid fa-copy me-1"></i> Copy Code
                            </button>
                        </div>
                        <div id="ts-output" class="bg-light p-3 rounded-3" style="height: 380px; overflow: auto; border: 1px solid var(--border);">
                            <pre class="mb-0"><code id="result-code" class="language-typescript">// Generated code will appear here...</code></pre>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button id="download-btn" class="btn btn-outline-primary btn-lg rounded-pill fw-bold" disabled>
                            Download .ts File <i class="fa-solid fa-download ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-typescript.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const jsonInput = document.getElementById('json-input');
    const convertBtn = document.getElementById('convert-btn');
    const downloadBtn = document.getElementById('download-btn');
    const resultCode = document.getElementById('result-code');

    convertBtn.addEventListener('click', () => {
        const val = jsonInput.value.trim();
        if (!val) {
            showToast('Please enter JSON content', 'error');
            return;
        }

        try {
            const data = JSON.parse(val);
            const ts = generateInterfaces(data, 'RootObject');
            resultCode.textContent = ts;
            Prism.highlightElement(resultCode);
            downloadBtn.disabled = false;
            showToast('Converted Successfully!');
        } catch (e) {
            showToast('Invalid JSON: ' + e.message, 'error');
        }
    });

    downloadBtn.addEventListener('click', () => {
        const blob = new Blob([resultCode.textContent], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'interfaces.ts';
        a.click();
        URL.revokeObjectURL(url);
    });
});

function copyResult() {
    const code = document.getElementById('result-code').textContent;
    if (code.includes('// Generated')) return;
    navigator.clipboard.writeText(code).then(() => {
        showToast('Copied to clipboard!');
    });
}

function generateInterfaces(obj, rootName) {
    let output = '';
    const interfaces = new Map();

    function walk(data, name) {
        if (Array.isArray(data)) {
            if (data.length > 0 && typeof data[0] === 'object' && data[0] !== null) {
                walk(data[0], name);
            }
            return;
        }

        let fields = [];
        for (const [key, value] of Object.entries(data)) {
            let type = typeof value;
            if (value === null) {
                type = 'any';
            } else if (Array.isArray(value)) {
                let subType = value.length > 0 ? typeof value[0] : 'any';
                if (subType === 'object' && value[0] !== null) {
                    subType = key.charAt(0).toUpperCase() + key.slice(1);
                    walk(value[0], subType);
                }
                type = `${subType}[]`;
            } else if (type === 'object') {
                type = key.charAt(0).toUpperCase() + key.slice(1);
                walk(value, type);
            }
            fields.push(`  ${key}: ${type};`);
        }
        
        const interfaceCode = `export interface ${name} {\n${fields.join('\n')}\n}\n\n`;
        if (!interfaces.has(name)) {
            interfaces.set(name, interfaceCode);
        }
    }

    walk(obj, rootName);
    
    // Sort interfaces to have root first or last? Let's just join them
    for (const [name, code] of interfaces) {
        output += code;
    }
    return output;
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>