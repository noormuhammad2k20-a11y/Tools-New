<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="row gx-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h5 class="fw-bold mb-3 border-bottom pb-2">1. Token Configuration</h5>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">Algorithm</label>
                        <select id="jwt-alg" class="form-select border-2">
                            <option value="HS256" selected>HS256 (HMAC with SHA-256)</option>
                            <option value="none">None (Unsecured Token)</option>
                        </select>
                        <small class="text-muted">RS256/ES256 require private key ingestion and are scoped only for server-to-server issuing.</small>
                    </div>

                    <div id="secret-group" class="mb-4">
                        <label class="form-label fw-bold small text-muted">Secret Key (for Signature)</label>
                        <input type="text" id="jwt-secret" class="form-control border-2" value="your-256-bit-secret" placeholder="Enter your secret key">
                    </div>

                    <h5 class="fw-bold mb-3 mt-4 border-bottom pb-2">2. Token Payload (Claims)</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <small class="text-muted fw-bold">JSON Data</small>
                        <button class="btn btn-sm btn-outline-secondary py-0" onclick="resetPayload()">Reset Claims</button>
                    </div>
                    <textarea id="jwt-payload" class="form-control border-2 rounded-3 text-monospace" rows="10" style="font-family: var(--font-mono);">
{
  "sub": "1234567890",
  "name": "John Doe",
  "admin": true,
  "iat": 1516239022
}</textarea>
                    
                    <button class="btn btn-primary w-100 mt-4 rounded-pill py-2 shadow-sm" onclick="generateJWT()"><i class="fa-solid fa-shield-halved me-2"></i>Generate Signed Token</button>
                    <div id="error-msg" class="text-danger small fw-bold mt-2 text-center d-none">Error generating token. Check JSON syntax.</div>
                </div>

                <div class="col-lg-6">
                    <h5 class="fw-bold mb-3 border-bottom pb-2 text-primary">3. Generated Output</h5>
                    
                    <div class="mb-3 position-relative">
                        <label class="form-label fw-bold small text-muted">Encoded JWT String</label>
                        <textarea id="jwt-output" class="form-control bg-light border-0 rounded-4 p-4 text-break" rows="12" readonly placeholder="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..." style="font-family: var(--font-mono); font-size: 1.1rem; line-height: 1.6;"></textarea>
                    </div>

                    <div class="d-flex gap-3">
                        <button class="btn btn-outline-primary flex-grow-1 rounded-pill" onclick="copyJWT()"><i class="fa-regular fa-copy me-2"></i>Copy Token</button>
                    </div>

                    <div class="mt-4 p-4 bg-light rounded-4 border">
                        <h6 class="fw-bold fs-6 mb-3 text-muted"><i class="fa-solid fa-circle-info me-2 text-primary"></i>Security Breakdown</h6>
                        <ul class="mb-0 small text-muted lh-lg">
                            <li><strong>Header:</strong> Base64Url Encoded (<span class="text-danger fw-bold">Red</span> portion typically)</li>
                            <li><strong>Payload:</strong> Base64Url Encoded JSON Claims (<span class="text-primary fw-bold">Purple</span> portion)</li>
                            <li><strong>Signature:</strong> Cryptographic Hash verifying authenticity (<span class="text-info fw-bold">Blue</span> portion)</li>
                        </ul>
                    </div>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Creating Auth Tokens with JSON Web Tokens</h2>
                    <p class="lead">JSON Web Tokens (JWT) are an open, industry-standard (RFC 7519) method for representing claims securely between two parties. Our <strong>Pro JWT Generator</strong> allows developers to craft custom cryptographic tokens on the fly without needing backend infrastructure or writing custom signing scripts.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Understanding Token Structure</h3>
                    <p>Every JWT consists of three parts separated by dots (<code>.</code>):</p>
                    <ul>
                        <li><strong>Header:</strong> Dictates the hashing algorithm being used (e.g., HMAC SHA-256 or RSA) and the type of token (JWT).</li>
                        <li><strong>Payload:</strong> The body containing the actual "claims." These are statements about an entity (typically, the user) and additional data like expiration times (<code>exp</code>) and subjects (<code>sub</code>).</li>
                        <li><strong>Signature:</strong> To create the signature, the encoded header, encoded payload, a secret key, and the algorithm specified in the header are passed through a cryptographic hashing function. This ensures the token hasn't been tampered with mid-transit.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why Generate JWTs Client-Side?</h3>
                    <p>Developers routinely need test tokens to validate custom API endpoints in Postman or cURL scripts. However, sending your proprietary secret keys to an external server-based token generator is a massive security risk. </p>
                    <p>This Pro tool integrates <code>crypto-js</code> strictly within your browser. The HS256 HMAC algorithm signs your payload locally. <strong>Your secret key never leaves your CPU memory</strong>, preventing it from being leaked into third-party server logs.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #e11d48, #f59e0b); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
textarea.form-control { transition: box-shadow 0.3s ease; }
textarea.form-control:focus { box-shadow: 0 0 0 4px rgba(225, 29, 72, 0.15); border-color: #e11d48; }
.text-monospace { font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace !important; }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const algSelect = document.getElementById('jwt-alg');
    const secretInput = document.getElementById('jwt-secret');
    const secretGroup = document.getElementById('secret-group');
    const payloadInput = document.getElementById('jwt-payload');
    const output = document.getElementById('jwt-output');
    const errorMsg = document.getElementById('error-msg');

    algSelect.addEventListener('change', () => {
        if (algSelect.value === 'none') {
            secretGroup.classList.add('d-none');
            secretInput.value = '';
        } else {
            secretGroup.classList.remove('d-none');
            if(!secretInput.value) secretInput.value = 'your-256-bit-secret';
        }
        generateJWT();
    });

    // Utility: Base64Url Encode
    function base64url(source) {
        let encodedSource = CryptoJS.enc.Base64.stringify(source);
        encodedSource = encodedSource.replace(/=+$/, '');
        encodedSource = encodedSource.replace(/\+/g, '-');
        encodedSource = encodedSource.replace(/\//g, '_');
        return encodedSource;
    }

    function base64urlEncodeString(str) {
        return base64url(CryptoJS.enc.Utf8.parse(str));
    }

    window.generateJWT = () => {
        errorMsg.classList.add('d-none');
        
        // 1. Validate JSON
        let payloadString = payloadInput.value;
        try {
            // Re-stringify to ensure clean JSON without spaces
            const parsed = JSON.parse(payloadString);
            payloadString = JSON.stringify(parsed);
        } catch (e) {
            errorMsg.classList.remove('d-none');
            output.value = '';
            return;
        }

        // 2. Create Header
        const alg = algSelect.value;
        const header = {
            "alg": alg,
            "typ": "JWT"
        };
        const encodedHeader = base64urlEncodeString(JSON.stringify(header));

        // 3. Create Payload
        const encodedPayload = base64urlEncodeString(payloadString);

        // 4. Create Signature
        const tokenData = encodedHeader + "." + encodedPayload;
        let signature = "";
        
        if (alg === 'HS256') {
            const secret = secretInput.value;
            const hmac = CryptoJS.HmacSHA256(tokenData, secret);
            signature = base64url(hmac);
        }

        // 5. Assemble Token
        let token = tokenData;
        if (alg !== 'none') {
            token += "." + signature;
        } else {
            token += "."; // None alg requires trailing dot per spec usually
        }

        output.value = token;
    };

    window.resetPayload = () => {
        payloadInput.value = `{\n  "sub": "1234567890",\n  "name": "John Doe",\n  "admin": true,\n  "iat": ${Math.floor(Date.now() / 1000)}\n}`;
        generateJWT();
    };

    window.copyJWT = () => {
        if (!output.value) return showToast('No token to copy', 'error');
        output.select();
        document.execCommand('copy');
        showToast('JWT copied to clipboard!');
    };

    // Auto-generate on load
    generateJWT();

    // Live update on typing
    payloadInput.addEventListener('input', () => { setTimeout(generateJWT, 300); });
    secretInput.addEventListener('input', generateJWT);
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>