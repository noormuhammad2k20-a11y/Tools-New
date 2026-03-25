

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            
            <div class="mb-4">
                <label class="form-label fw-bold text-muted small"><i class="fa-solid fa-link me-2"></i>Target URL</label>
                <div class="input-group input-group-lg shadow-sm">
                    <input type="url" id="in-url" class="form-control border-2" placeholder="https://api.example.com:8080/v1/users/search?role=admin&active=true#section-4" style="font-family: var(--font-mono);">
                    <button class="btn btn-primary px-4 fw-bold" type="button" onclick="parseUrl()"><i class="fa-solid fa-wand-magic-sparkles me-2"></i>Analyze</button>
                    <button class="btn btn-outline-secondary px-3" type="button" onclick="document.getElementById('in-url').value=''; hideOutput();"><i class="fa-solid fa-trash-can"></i></button>
                </div>
            </div>

            <!-- Error Banner -->
             <div id="error-alert" class="alert alert-danger d-none border-0 shadow-sm rounded-4 mb-4">
                <i class="fa-solid fa-triangle-exclamation me-2"></i> Invalid URL Structure. Ensure protocol scheme (e.g. `https://`) exists.
            </div>

            <!-- Output Panels -->
            <div id="output-area" class="row gx-4 d-none">
                
                <!-- Core Components -->
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h5 class="fw-bold mb-3 border-bottom pb-2"><i class="fa-solid fa-microchip me-2 text-primary"></i>Structural Anatomy</h5>
                    
                    <ul class="list-group rounded-4 shadow-sm border-0">
                        <li class="list-group-item p-3 border-bottom d-flex flex-column">
                            <span class="text-muted small fw-bold text-uppercase tracking-wider mb-1">Protocol / Scheme</span>
                            <span id="o-protocol" class="fw-bold text-dark fs-5" style="font-family: var(--font-mono); color: #0284c7 !important;">https:</span>
                        </li>
                        <li class="list-group-item p-3 border-bottom d-flex flex-column">
                            <span class="text-muted small fw-bold text-uppercase tracking-wider mb-1">Hostname (Domain)</span>
                            <span id="o-host" class="fw-bold text-dark fs-5" style="font-family: var(--font-mono);">api.example.com</span>
                        </li>
                        <li class="list-group-item p-3 border-bottom d-flex flex-column">
                            <span class="text-muted small fw-bold text-uppercase tracking-wider mb-1">Port</span>
                            <span id="o-port" class="fw-bold text-dark fs-5" style="font-family: var(--font-mono);">8080</span>
                        </li>
                        <li class="list-group-item p-3 border-bottom d-flex flex-column">
                            <span class="text-muted small fw-bold text-uppercase tracking-wider mb-1">Pathname</span>
                            <span id="o-path" class="fw-bold text-dark fs-5" style="font-family: var(--font-mono); color: #16a34a !important;">/v1/users/search</span>
                        </li>
                        <li class="list-group-item p-3 d-flex flex-column border-0">
                            <span class="text-muted small fw-bold text-uppercase tracking-wider mb-1">Hash (Fragment)</span>
                            <span id="o-hash" class="fw-bold text-dark fs-5" style="font-family: var(--font-mono); color: #d97706 !important;">#section-4</span>
                        </li>
                    </ul>
                </div>

                 <!-- Query Parameters -->
                 <div class="col-lg-6">
                    <h5 class="fw-bold mb-3 border-bottom pb-2"><i class="fa-solid fa-magnifying-glass me-2 text-primary"></i>Extracted Search Parameters</h5>
                    
                    <div id="query-container" class="bg-light rounded-4 border p-3" style="min-height: 250px;">
                        <!-- JS injects table here -->
                        <div class="d-flex justify-content-center align-items-center h-100 text-muted fw-bold">No query parameters detected.</div>
                    </div>

                    <div class="mt-3 text-end">
                        <button class="btn btn-sm btn-outline-dark rounded-pill shadow-sm px-4" id="copy-json-btn" onclick="copyQueryParams()"><i class="fa-solid fa-code me-2"></i>Export Params as JSON</button>
                    </div>

                </div>

            </div>

        
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Deconstructing Resource Locators</h2>
                    <p class="lead">Uniform Resource Locators (URLs) are the structural lifelines of the internet, acting fundamentally as strings of semantic instructions enabling web browsers to retrieve data packets globally. Our <strong>Pro URL Parser</strong> rips these monolithic strings apart natively utilizing standard global API syntaxes.</p>
            <!-- Features Cards -->
            
            </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">The `URL` JavaScript Constructor Engine</h3>
                    <p>Historically, developers utilized brutal Regular Expressions (Regex) to map subdomains, ports, and queries simultaneously resulting in massive vulnerability bugs. Modern systems now utilize the native W3C <code>const url = new URL(string)</code> browser API implementation, which adheres strictly to WHATWG URL Standards. It intrinsically sanitizes malformed endpoints.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Query Parameter Extraction Dynamics</h3>
                    <p>Data contained after the question mark `?` delimiter drives massive system architectures from pagination structures (e.g., `?page=2`) to robust marketing analysis. This tool natively extracts URLSearchParams abstractions and renders them into isolated key-value matrices instantly, circumventing any necessary URL decoding string manipulators.</p>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->



<style>
.text-gradient-primary { background: linear-gradient(45deg, #2563eb, #059669); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.param-pill { background-color: #e2e8f0; color: #475569; padding: 3px 8px; border-radius: 6px; font-weight: bold; font-family: var(--font-mono); font-size:12px; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const uiIn = document.getElementById('in-url');
    const outArea = document.getElementById('output-area');
    const errAlert = document.getElementById('error-alert');

    // Sub-elements
    const oProt = document.getElementById('o-protocol');
    const oHost = document.getElementById('o-host');
    const oPort = document.getElementById('o-port');
    const oPath = document.getElementById('o-path');
    const oHash = document.getElementById('o-hash');
    const qCont = document.getElementById('query-container');
    const btnJson = document.getElementById('copy-json-btn');

    let currentJsonBlob = '';

    window.hideOutput = () => {
        outArea.classList.add('d-none');
        errAlert.classList.add('d-none');
    }

    window.parseUrl = () => {
        errAlert.classList.add('d-none');
        outArea.classList.add('d-none');
        btnJson.style.display = 'none';

        const raw = uiIn.value.trim();
        if(!raw) return;

        let parsed;
        try {
            parsed = new URL(raw);
        } catch(e) {
            errAlert.classList.remove('d-none');
            return;
        }

        // It's valid. Show area.
        outArea.classList.remove('d-none');

        // Core mappings
        oProt.textContent = parsed.protocol || '/';
        oHost.textContent = parsed.hostname || '/';
        oPort.textContent = parsed.port || 'Default (80/443)';
        oPath.textContent = parsed.pathname || '/';
        oHash.textContent = parsed.hash || 'None';

        // Query params engine
        const params = new URLSearchParams(parsed.search);
        const entries = Array.from(params.entries());

        if (entries.length === 0) {
            qCont.innerHTML = `<div class="d-flex justify-content-center align-items-center h-100 text-muted fw-bold">No query parameters detected.</div>`;
            currentJsonBlob = '{}';
            btnJson.style.display = 'none';
        } else {
            
            let html = `<div class="table-responsive"><table class="table table-sm table-borderless align-middle mb-0">`;
            html += `<thead class="border-bottom text-muted small tracking-wider text-uppercase"><tr><th>Key</th><th>Decoded Value</th></tr></thead><tbody>`;
            
            let jsonObj = {};

            entries.forEach(([k, v]) => {
                html += `<tr>
                    <td style="width: 40%;"><span class="param-pill text-primary">${k}</span></td>
                    <td class="fw-bold" style="font-family: var(--font-mono); font-size: 14px; word-break:break-all;">${v}</td>
                </tr>`;
                jsonObj[k] = v;
            });
            
            html += `</tbody></table></div>`;
            qCont.innerHTML = html;

            currentJsonBlob = JSON.stringify(jsonObj, null, 2);
            btnJson.style.display = 'inline-block';
        }
    }

    window.copyQueryParams = () => {
        navigator.clipboard.writeText(currentJsonBlob);
        showToast('Extracted JSON Payload Copied!');
    };

});
</script>






