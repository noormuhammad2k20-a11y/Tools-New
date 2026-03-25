

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            
            <div class="row align-items-center mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold text-muted small"><i class="fa-solid fa-code me-2"></i>Input JSON Vector</label>
                </div>
                <div class="col-md-6 text-md-end mt-2 mt-md-0 d-flex justify-content-md-end gap-2">
                    <button class="btn btn-sm btn-outline-secondary rounded-pill" onclick="loadSample()"><i class="fa-solid fa-flask me-1"></i>Sample Data</button>
                    <button class="btn btn-sm btn-outline-danger rounded-pill" onclick="clearAll()"><i class="fa-solid fa-trash-can me-1"></i>Clear All</button>
                </div>
            </div>

            <div class="row gx-4 mb-4">
                <!-- JSON Input -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <textarea id="in-json" class="form-control border-2 bg-light rounded-4 p-4 shadow-sm" rows="12" placeholder='[\n  {\n    "id": 1,\n    "name": "Jane Doe",\n    "role": "Engineer"\n  }\n]' style="font-family: var(--font-mono); font-size: 14px; resize: vertical;"></textarea>
                    
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="opt-flatten" checked>
                            <label class="form-check-label small fw-bold text-muted" for="opt-flatten">Auto-Flatten Nested Objects</label>
                        </div>
                        <button class="btn btn-primary rounded-pill px-4 shadow-sm fw-bold" onclick="convert()"><i class="fa-solid fa-arrow-right-arrow-left me-2"></i>Convert</button>
                    </div>
                </div>

                <!-- CSV Output -->
                <div class="col-md-6">
                    <textarea id="out-csv" class="form-control border-2 border-success border-opacity-25 bg-success bg-opacity-10 rounded-4 p-4 shadow-sm" rows="12" readonly placeholder="CSV output will render here..." style="font-family: var(--font-mono); font-size: 14px; resize: vertical;"></textarea>
                    
                    <div class="d-flex justify-content-end gap-2 mt-3">
                        <button class="btn btn-outline-success rounded-pill px-4 fw-bold" onclick="copyCsv()"><i class="fa-regular fa-copy me-2"></i>Copy CSV</button>
                        <button class="btn btn-success rounded-pill px-4 shadow-sm fw-bold" onclick="downloadCsv()"><i class="fa-solid fa-download me-2"></i>Export .csv</button>
                    </div>
                </div>
            </div>

            <!-- Error Banner -->
            <div id="error-alert" class="alert alert-danger d-none border-0 shadow-sm rounded-4 mb-0"><i class="fa-solid fa-triangle-exclamation me-2"></i> <span id="error-msg">Invalid JSON syntax detected.</span></div>
            
        
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Data Interoperability Engineered</h2>
                    <p class="lead">Virtually all modern REST and GraphQL APIs transmit data across the wire utilizing JavaScript Object Notation (JSON). However, non-technical stakeholders, financial analysts, and marketing teams overwhelmingly rely on Microsoft Excel or Google Sheets. Our <strong>Pro JSON to CSV Converter</strong> bridges this gap by automatically flattening complex API responses into tabular rows and columns.</p>
            <!-- Features Cards -->
            
            </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">The Anatomy of Data Flattening</h3>
                    <p>JSON is an inherently <i>hierarchical</i> format. A single user object might contain a nested `address` object, which itself contains a nested `coordinates` object. CSV, conversely, is strictly two-dimensional (flat).</p>
                    <p>When the "Auto-Flatten" algorithm is engaged, this tool recursively traverses deep object trees and concatenates parent-child keys using dot notation. For example, <code>user.address.zipcode</code> becomes its own distinct spreadsheet column header natively, preserving 100% of the payload's integrity.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Complete Privacy via Client-Side Parsing</h3>
                    <p>Converting highly sensitive customer data payloads or proprietary financial API dumps requires strict operational security. Because this tool handles the Cartesian mapping execution utilizing your browser's local JS engine, absolutely zero bytes of your proprietary data are transmitted to any external backend server.</p>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->



<style>
.text-gradient-primary { background: linear-gradient(45deg, #10b981, #3b82f6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
textarea.form-control:focus { box-shadow: none !important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    
    const inJson = document.getElementById('in-json');
    const outCsv = document.getElementById('out-csv');
    const errAlert = document.getElementById('error-alert');
    const errMsg = document.getElementById('error-msg');
    const optFlatten = document.getElementById('opt-flatten');

    // Deep Flatten Object
    function flattenObject(ob, prefix = '', result = null) {
        result = result || {};
        for (const i in ob) {
            if (ob.hasOwnProperty(i)) {
                if (typeof ob[i] === 'object' && ob[i] !== null && !Array.isArray(ob[i])) {
                    flattenObject(ob[i], prefix + i + '.', result);
                } else {
                    result[prefix + i] = ob[i];
                }
            }
        }
        return result;
    }

    // Escape CSV values gracefully
    function escapeCsvValue(val) {
        if (val === null || val === undefined) return '""';
        
        let str = '';
        if (typeof val === 'object') {
            str = JSON.stringify(val); // Arrays are stringified
        } else {
            str = String(val);
        }

        // Escape quotes
        str = str.replace(/"/g, '""');
        
        // Wrap in quotes if it contains commas, newlines, or quotes
        if (str.includes(',') || str.includes('"\n') || str.includes('"') || str.includes('\r')) {
            return `"${str}"`;
        }
        
        // If it looks like a formula risk, force format
        if (str.startsWith('=') || str.startsWith('+') || str.startsWith('-') || str.startsWith('@')) {
             return `" ${str}"`;
        }

        return `"${str}"`;
    }

    window.convert = () => {
        errAlert.classList.add('d-none');
        outCsv.value = '';

        const raw = inJson.value.trim();
        if(!raw) return;

        let data;
        try {
            data = JSON.parse(raw);
        } catch(e) {
            errMsg.textContent = 'Invalid JSON: ' + e.message;
            errAlert.classList.remove('d-none');
            return;
        }

        // Ensure we are working with an array of objects
        if (!Array.isArray(data)) {
            if (typeof data === 'object' && data !== null) {
                // If it's a single object, wrap in array
                data = [data];
            } else {
                errMsg.textContent = 'JSON root must be an Object or an Array of Objects.';
                errAlert.classList.remove('d-none');
                return;
            }
        }

        if (data.length === 0) {
            outCsv.value = 'No data to export.';
            return;
        }

        const isFlatten = optFlatten.checked;
        const processedList = [];
        const globalKeys = new Set();

        // Pass 1: Flatten and collect all possible keys (since Objects in array might have differing schemas)
        data.forEach(item => {
            let processed = item;
            if (isFlatten && typeof item === 'object' && item !== null) {
                processed = flattenObject(item);
            } else if (typeof item !== 'object') {
                 // edge case: array of primitives
                 processed = { 'Value': item };
            }
            
            processedList.push(processed);
            Object.keys(processed).forEach(k => globalKeys.add(k));
        });

        const headers = Array.from(globalKeys);

        // Build CSV String
        let csvString = headers.map(h => escapeCsvValue(h)).join(',') + '\n';

        processedList.forEach(row => {
            const rowArr = headers.map(header => escapeCsvValue(row[header]));
            csvString += rowArr.join(',') + '\n';
        });

        outCsv.value = csvString;
        showToast('Successfully converted to CSV!', 'success');
    };

    window.loadSample = () => {
        inJson.value = JSON.stringify([
            {
                "id": "U-12A",
                "name": "Alex Mitchell",
                "contact": { "email": "alex@example.com", "phone": "+1-555-0102" },
                "tags": ["admin", "beta"],
                "active": true
            },
            {
                "id": "U-14B",
                "name": "Sarah Connor",
                "contact": { "email": "s.connor@example.com" },
                "tags": ["user"],
                "active": false
            }
        ], null, 2);
        convert();
    };

    window.clearAll = () => {
        inJson.value = '';
        outCsv.value = '';
        errAlert.classList.add('d-none');
    };

    window.copyCsv = () => {
        if(!outCsv.value) return;
        outCsv.select();
        document.execCommand('copy');
        showToast('CSV Copied to clipboard!');
    };

    window.downloadCsv = () => {
        if(!outCsv.value) return;
        const blob = new Blob([outCsv.value], { type: 'text/csv;charset=utf-8;' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `export_${Date.now()}.csv`;
        a.click();
        window.URL.revokeObjectURL(url);
    };

});
</script>






