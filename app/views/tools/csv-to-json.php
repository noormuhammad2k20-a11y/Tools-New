

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            
            <div class="row gx-4">
                <!-- CSV Input -->
                <div class="col-md-6 mb-4 mb-md-0 border-end pe-md-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="fw-bold mb-0 text-muted"><i class="fa-solid fa-file-csv me-2"></i>Dataset Input</h5>
                        <button class="btn btn-sm btn-light text-primary" onclick="loadSample()"><i class="fa-solid fa-flask"></i> Sample</button>
                    </div>
                    
                    <textarea id="in-csv" class="form-control border-2 bg-light rounded-4 p-4 shadow-sm mb-3" rows="12" placeholder='id,name,role,active\n1,"Jane Doe","Engineer",true\n2,"John Smith","Designer",false' style="font-family: var(--font-mono); font-size: 14px; resize: vertical; white-space: pre; overflow-wrap: normal; overflow-x: auto;"></textarea>
                    
                    <div class="bg-light border rounded-3 p-3">
                        <label class="form-label fw-bold small text-muted text-uppercase tracking-wider">Parsing Options</label>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="opt-header" checked>
                            <label class="form-check-label small fw-bold" for="opt-header">First row is Header (Keys)</label>
                        </div>
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="opt-types" checked>
                            <label class="form-check-label small fw-bold" for="opt-types">Auto-cast Data Types (Numbers/Booleans)</label>
                        </div>
                        <div class="row gx-2 align-items-center">
                            <div class="col-8">
                                <label class="form-label small mb-0 fw-bold">Delimiter Override</label>
                            </div>
                            <div class="col-4">
                                <select id="opt-dlm" class="form-select form-select-sm border-2">
                                    <option value="auto" selected>Auto (,)</option>
                                    <option value=";">Semicolon (;)</option>
                                    <option value="\t">Tab</option>
                                    <option value="|">Pipe (|)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary rounded-pill px-5 shadow-sm fw-bold w-100 mt-4 py-2" onclick="convert()"><i class="fa-solid fa-arrow-right-arrow-left me-2"></i>Compile to JSON</button>

                </div>

                <!-- JSON Output -->
                <div class="col-md-6 ps-md-4 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-code me-2 text-primary"></i>JSON Output Vector</h5>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="opt-minify">
                            <label class="form-check-label small fw-bold text-muted" for="opt-minify">Minify</label>
                        </div>
                    </div>
                    
                    <textarea id="out-json" class="form-control border-2 flex-grow-1 rounded-4 p-4 shadow-sm" readonly placeholder="JSON structure will render here..." style="font-family: var(--font-mono); font-size: 14px; resize: vertical; background-color: #f8fafc; border-color: #cbd5e1;"></textarea>
                    
                    <div class="d-flex justify-content-end gap-2 mt-3">
                        <button class="btn btn-outline-dark rounded-pill px-4 fw-bold" onclick="copyJson()"><i class="fa-regular fa-copy me-2"></i>Copy Data</button>
                        <button class="btn btn-dark rounded-pill px-4 shadow-sm fw-bold" onclick="downloadJson()"><i class="fa-solid fa-download me-2"></i>Download .json</button>
                    </div>

                    <!-- Error Banner -->
                    <div id="error-alert" class="alert alert-danger d-none border-0 shadow-sm rounded-4 mt-3 mb-0"><i class="fa-solid fa-triangle-exclamation me-2"></i> <span id="error-msg">Syntax Error</span></div>

                </div>
            </div>

        
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Database Seeding Engine</h2>
                    <p class="lead">Migrating legacy system data into modern cloud schemas often requires porting massive <code>.csv</code> spreadsheet exports into strictly serialized JSON architectures. Our <strong>Pro CSV to JSON Converter</strong> elegantly reconstructs tabular data into programmable arrays instantly inside your browser.</p>
            <!-- Features Cards -->
            
            </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Intelligent Auto-Casting</h3>
                    <p>Unlike basic algorithmic converters that strictly wrap every spreadsheet cell as a string (e.g., `"age": "25"`), this parser intelligently monitors content variables. When activated, the "Auto-cast" mechanism evaluates properties securely: true numerical sequences become Integers (`25`), floats remain decimaled, and explicit keywords become valid Booleans (`true` / `false`). This removes the necessity of writing a secondary mutating handler inside your backend API controllers.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Configurable Delimiters (TSV / PSV support)</h3>
                    <p>While Comma-Separated Values are the gold standard, legacy architectural exports from mainframes or specialized financial platforms often utilize localized delimiters to prevent internal caching collisions. This tool seamlessly handles semicolon matrices, Pipe-Separated Values (PSV), and Tab-Separated Values (TSV).</p>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->



<style>
.text-gradient-primary { background: linear-gradient(45deg, #f59e0b, #e11d48); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
textarea.form-control:focus { box-shadow: none !important; }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.4.1/papaparse.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {

    const inCsv = document.getElementById('in-csv');
    const outJson = document.getElementById('out-json');
    const errAlert = document.getElementById('error-alert');
    const errMsg = document.getElementById('error-msg');
    
    const optHeader = document.getElementById('opt-header');
    const optTypes = document.getElementById('opt-types');
    const optDlm = document.getElementById('opt-dlm');
    const optMinify = document.getElementById('opt-minify');

    window.convert = () => {
        errAlert.classList.add('d-none');
        outJson.value = '';

        const raw = inCsv.value.trim();
        if(!raw) return;

        let delimiter = optDlm.value;
        if (delimiter === 'auto') delimiter = ''; // Papaparse auto-detect
        if (delimiter === '\\t') delimiter = '\t';

        Papa.parse(raw, {
            delimiter: delimiter,
            header: optHeader.checked,
            dynamicTyping: optTypes.checked, // Auto-casts numbers/booleans beautifully
            skipEmptyLines: true,
            complete: function(results) {
                if (results.errors.length > 0 && results.errors[0].type !== "Delimiter") {
                    errMsg.textContent = `Parse Error: ${results.errors[0].message} on line ${results.errors[0].row}`;
                    errAlert.classList.remove('d-none');
                    return;
                }

                const data = results.data;
                const spaces = optMinify.checked ? 0 : 2;
                
                outJson.value = JSON.stringify(data, null, spaces);
                showToast('Successfully compiled to JSON!', 'success');
            }
        });
    };

    optMinify.addEventListener('change', () => {
        if(outJson.value) convert(); // Re-render instantly
    });

    window.loadSample = () => {
        inCsv.value = `id,username,email,age,is_admin,score\n101,"jdoe","jdoe@example.com",28,true,99.5\n102,"sconnor","sarah@sky.net",32,false,84.0\n103,"tstark","tony@stark.com",45,true,100.0`;
        optHeader.checked = true;
        optTypes.checked = true;
        optDlm.value = 'auto';
        convert();
    };

    window.copyJson = () => {
        if(!outJson.value) return;
        outJson.select();
        document.execCommand('copy');
        showToast('JSON Copied to clipboard!');
    };

    window.downloadJson = () => {
        if(!outJson.value) return;
        const blob = new Blob([outJson.value], { type: 'application/json' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `data_${Date.now()}.json`;
        a.click();
        window.URL.revokeObjectURL(url);
    };

});
</script>






