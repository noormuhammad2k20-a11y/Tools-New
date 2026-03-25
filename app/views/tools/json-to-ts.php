

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




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






