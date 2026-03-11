<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="row gx-5">
                
                <!-- Left Configuration UI -->
                <div class="col-lg-6 mb-4 mb-lg-0 border-end pe-lg-4">
                    
                    <div class="input-group input-group-lg mb-4 shadow-sm">
                        <select id="req-method" class="form-select bg-light fw-bold border-primary border-2 text-primary" style="max-width: 140px;">
                            <option value="GET" selected>GET</option>
                            <option value="POST">POST</option>
                            <option value="PUT">PUT</option>
                            <option value="PATCH">PATCH</option>
                            <option value="DELETE">DELETE</option>
                            <option value="OPTIONS">OPTIONS</option>
                        </select>
                        <input type="text" id="req-url" class="form-control border-2 border-primary" placeholder="https://api.example.com/v1/users">
                    </div>

                    <h5 class="fw-bold mb-3 border-bottom pb-2 mt-4 text-muted"><i class="fa-solid fa-list-ul me-2"></i>Headers</h5>
                    <div id="headers-container" class="mb-3">
                        <!-- Default Header -->
                        <div class="row header-row g-2 mb-2 align-items-center">
                            <div class="col-4">
                                <input type="text" class="form-control header-key border-2 bg-light" value="Content-Type" placeholder="Key">
                            </div>
                            <div class="col-7">
                                <input type="text" class="form-control header-value border-2" value="application/json" placeholder="Value">
                            </div>
                            <div class="col-1 text-end">
                                <button class="btn btn-sm btn-outline-danger border-0 h-remove" disabled><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-outline-primary rounded-pill mb-4" onclick="addHeaderRow()"><i class="fa-solid fa-plus me-1"></i> Add Header</button>

                    <h5 class="fw-bold mb-3 border-bottom pb-2 text-muted mt-2"><i class="fa-solid fa-key me-2"></i>Authentication</h5>
                    <div class="row mb-4">
                        <div class="col-md-5">
                            <select id="auth-type" class="form-select border-2">
                                <option value="none" selected>No Auth</option>
                                <option value="bearer">Bearer Token</option>
                                <option value="basic">Basic Auth</option>
                            </select>
                        </div>
                        <div class="col-md-7 mt-3 mt-md-0" id="auth-input-container">
                            <input type="text" class="form-control border-2" placeholder="Select Auth Type..." disabled>
                        </div>
                    </div>

                    <h5 id="body-title" class="fw-bold mb-3 border-bottom pb-2 text-muted d-none"><i class="fa-solid fa-database me-2"></i>Request Body (Payload)</h5>
                    <div id="body-container" class="mb-4 d-none">
                        <textarea id="req-body" class="form-control border-2 rounded-4 p-3" rows="6" placeholder='{"key": "value"}' style="font-family: var(--font-mono);"></textarea>
                    </div>

                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" id="flag-silent">
                        <label class="form-check-label small fw-bold text-muted" for="flag-silent">Silent Output (-s)</label>
                    </div>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" id="flag-insecure">
                        <label class="form-check-label small fw-bold text-muted" for="flag-insecure">Ignore SSL Warnings (-k)</label>
                    </div>
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" id="flag-verbose">
                        <label class="form-check-label small fw-bold text-muted" for="flag-verbose">Verbose Output (-v)</label>
                    </div>
                </div>

                <!-- Right Output Side -->
                <div class="col-lg-6 ps-lg-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold text-dark small text-uppercase tracking-wider mb-0"><i class="fa-solid fa-terminal me-2"></i>Generated Bash Command</label>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-dark rounded-start-pill px-3 shadow-sm" onclick="copyCurl()"><i class="fa-regular fa-copy me-2"></i>Copy String</button>
                            <button class="btn btn-sm btn-outline-dark rounded-end-pill px-3" onclick="downloadBash()"><i class="fa-solid fa-download"></i></button>
                        </div>
                    </div>
                    
                    <!-- Pro Terminal output styling -->
                    <div class="bg-dark rounded-4 p-1 shadow-sm mt-3" style="border: 1px solid #333;">
                        <div class="mac-header px-3 py-2 d-flex gap-2 border-bottom" style="border-color: #333 !important;">
                            <div class="rounded-circle bg-danger" style="width:12px; height:12px;"></div>
                            <div class="rounded-circle bg-warning" style="width:12px; height:12px;"></div>
                            <div class="rounded-circle bg-success" style="width:12px; height:12px;"></div>
                            <div class="text-center w-100 flex-grow-1" style="margin-top:-3px; color:#888; font-size: 12px; font-family: monospace;">bash -- curl.sh</div>
                        </div>
                        <textarea id="out-curl" class="form-control bg-transparent text-light border-0 p-4" rows="18" readonly style="font-family: var(--font-mono); font-size: 14px; line-height: 1.6; resize: none;"></textarea>
                    </div>

                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Engineering Server API Workflows</h2>
                    <p class="lead">The 'Client URL' (<strong>cURL</strong>) command-line tool is the de facto industry standard for interacting with HTTP servers and RESTful APIs directly from terminal environments. However, assembling complex authentication variables and stringified JSON payloads directly into a CLI window is famously error-prone. Our <strong>Pro cURL Generator</strong> bridges the gap between graphical UI configuration and raw Bash syntaxes.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Escaping Complex String Architectures</h3>
                    <p>When sending POST bodies across Linux command lines, developers must wrap nested quotes perfectly using either bash-specific single-quote escaping (`'{"key":"value"}'`) or backslash escapes. This generator algorithmically traverses your configured JSON payload and properly escapes newline carriages and JSON structures into a highly robust, execution-ready bash script.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Understanding cURL Flags</h3>
                    <ul>
                        <li><strong>-X [METHOD]:</strong> Explicitly dictates the HTTP method (GET, POST, PUT, DELETE). Without this, cURL assumes a GET request, unless a body payload is passed, in which case it inherently assumes POST. Standardizing the `-X` flag ensures predictability across proxy architectures.</li>
                        <li><strong>-H "Key: Value":</strong> Injects specific headers into the transmission network request. Essential for `Authorization: Bearer [token]` flows or acknowledging `Content-Type: application/json` bounds.</li>
                        <li><strong>-d / --data:</strong> Encodes the raw body payload. When using REST architectures, this represents the exact structural graph transmitted.</li>
                    </ul>
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


<style>
.text-gradient-primary { background: linear-gradient(45deg, #4f46e5, #ec4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
textarea.form-control:focus { box-shadow: none !important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    
    const reqMethod = document.getElementById('req-method');
    const reqUrl = document.getElementById('req-url');
    const headersContainer = document.getElementById('headers-container');
    const authType = document.getElementById('auth-type');
    const authInputContainer = document.getElementById('auth-input-container');
    const reqBody = document.getElementById('req-body');
    const bodyTitle = document.getElementById('body-title');
    const bodyContainer = document.getElementById('body-container');
    
    const fSilent = document.getElementById('flag-silent');
    const fInsecure = document.getElementById('flag-insecure');
    const fVerbose = document.getElementById('flag-verbose');

    const outCurl = document.getElementById('out-curl');

    // Method Change Toggle Body Area
    reqMethod.addEventListener('change', () => {
        const met = reqMethod.value;
        if (met === 'POST' || met === 'PUT' || met === 'PATCH' || met === 'DELETE') {
            bodyTitle.classList.remove('d-none');
            bodyContainer.classList.remove('d-none');
        } else {
            bodyTitle.classList.add('d-none');
            bodyContainer.classList.add('d-none');
        }
        buildCurl();
    });

    // Auth Change Toggle Inputs
    authType.addEventListener('change', () => {
        const t = authType.value;
        let html = '';
        if (t === 'none') {
            html = `<input type="text" class="form-control border-2" placeholder="Select Auth Type..." disabled>`;
        } else if (t === 'bearer') {
            html = `<input type="text" id="auth-val-1" class="form-control border-2 attr-watch" placeholder="Enter Bearer Token (e.g. eyJhbGciOi...)">`;
        } else if (t === 'basic') {
            html = `<div class="input-group">
                        <input type="text" id="auth-val-1" class="form-control border-2 attr-watch" placeholder="Username">
                        <span class="input-group-text bg-white">:</span>
                        <input type="password" id="auth-val-2" class="form-control border-2 attr-watch" placeholder="Password">
                    </div>`;
        }
        authInputContainer.innerHTML = html;
        bindWatchersToContainer(authInputContainer);
        buildCurl();
    });

    // Dynamic Headers
    window.addHeaderRow = () => {
        const row = document.createElement('div');
        row.className = 'row header-row g-2 mb-2 align-items-center';
        row.innerHTML = `
            <div class="col-4">
                <input type="text" class="form-control header-key border-2 bg-light" placeholder="Key">
            </div>
            <div class="col-7">
                <input type="text" class="form-control header-value border-2" placeholder="Value">
            </div>
            <div class="col-1 text-end">
                <button class="btn btn-sm btn-outline-danger border-0 h-remove" onclick="removeHeader(this)"><i class="fa-solid fa-xmark"></i></button>
            </div>
        `;
        headersContainer.appendChild(row);
        bindWatchersToContainer(row);
        updateRemoveButtons();
    };

    window.removeHeader = (btn) => {
        btn.closest('.header-row').remove();
        updateRemoveButtons();
        buildCurl();
    };

    function updateRemoveButtons() {
        const rows = document.querySelectorAll('.header-row');
        rows.forEach((row, i) => {
            const btn = row.querySelector('.h-remove');
            if (rows.length === 1) btn.disabled = true;
            else btn.disabled = false;
        });
    }

    // Builder Logic
    function escapeBodyString(str) {
        // Simple escape for bash single quotes
        return str.replace(/'/g, "'\\''");
    }

    function buildCurl() {
        let cmd = 'curl';

        // Flags
        if (fSilent.checked) cmd += ' -s';
        if (fInsecure.checked) cmd += ' -k';
        if (fVerbose.checked) cmd += ' -v';

        // Method
        const method = reqMethod.value;
        if (method !== 'GET') {
            cmd += ` -X ${method}`;
        }

        // URL
        let urlStr = reqUrl.value.trim() || 'https://api.example.com';
        cmd += ` '${urlStr}' \\\n`;

        // Headers
        const headerRows = document.querySelectorAll('.header-row');
        headerRows.forEach(r => {
            const k = r.querySelector('.header-key').value.trim();
            const v = r.querySelector('.header-value').value.trim();
            if (k && v) {
                cmd += `  -H "${k}: ${v}" \\\n`;
            }
        });

        // Auth
        const aType = authType.value;
        if (aType === 'bearer') {
            const tok = document.getElementById('auth-val-1')?.value.trim() || 'YOUR_TOKEN';
            cmd += `  -H "Authorization: Bearer ${tok}" \\\n`;
        } else if (aType === 'basic') {
            const user = document.getElementById('auth-val-1')?.value.trim() || 'user';
            const pass = document.getElementById('auth-val-2')?.value.trim() || 'pass';
            cmd += `  -u "${user}:${pass}" \\\n`;
        }

        // Body
        if (method === 'POST' || method === 'PUT' || method === 'PATCH' || method === 'DELETE') {
            const bodyVal = reqBody.value.trim();
            if (bodyVal) {
                cmd += `  -d '${escapeBodyString(bodyVal)}' \\\n`;
            }
        }

        // Remove trailing slash-newline
        cmd = cmd.replace(/ \\\n$/, '');

        outCurl.value = cmd;
    }

    // Attach Event Listeners to all inputs
    function bindWatchersToContainer(container) {
        const inputs = container.querySelectorAll('input, select, textarea');
        inputs.forEach(inp => inp.addEventListener('input', buildCurl));
    }
    
    // Initial Bind
    bindWatchersToContainer(document.body);
    buildCurl(); // Initial render

    // Utilities
    window.copyCurl = () => {
        outCurl.select();
        document.execCommand('copy');
        showToast('Bash Command Copied!');
    };

    window.downloadBash = () => {
        // Wrap command in bash script boilerplate
        const script = `#!/bin/bash\n\n${outCurl.value}\n`;
        const blob = new Blob([script], { type: 'application/x-sh' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `request.sh`;
        a.click();
        window.URL.revokeObjectURL(url);
    };

});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>