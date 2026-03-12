<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">

<div class="pro-card">
    
    
    <div class="row g-4 justify-content-center">
        <div class="col-md-9">
            <div class="bg-light p-4 rounded-3 border">
                <h4 class="fw-bold mb-3 fs-5">Security Analysis Terminal <span class="badge bg-gradient-primary ms-2" style="font-size:0.7rem;">k-Anonymity API</span></h4>
                <div class="input-group input-group-lg mb-3 shadow-sm">
                    <span class="input-group-text bg-white border-end-0"><i class="fa-solid fa-key text-muted"></i></span>
                    <input type="text" id="ebcInput" class="form-control border-start-0 ps-0" placeholder="Enter a password to check against known breaches...">
                    <button class="btn btn-primary fw-bold px-4" onclick="checkBreach()">Audit Database</button>
                </div>
                <div class="text-muted small"><i class="fa-solid fa-lock text-success"></i> <strong>Cryptographically Secure:</strong> We use SHA-1 k-Anonymity. We never send your actual password over the internet, only the first 5 characters of its cryptographic hash.</div>
            </div>
            
            <div id="ebc-status" class="mt-4" style="display:none;"></div>
        </div>
    </div>
</div>

<article class="tool-seo-article container mt-5 border-top pt-4">
    <header>
        <h2 class="fs-3 fw-bold mb-3">What is the Breach Checker?</h2>
        <p>The Password Breach Checker is a vital cybersecurity utility that interfaces securely with the prominent <em>Have I Been Pwned</em> (HIBP) database accumulation. Utilizing military-grade cryptography known as the 'k-Anonymity' model, this browser tool allows you to safely query billions of exposed database records to verify if your master passwords or variations have been leaked to the dark web.</p>
        <p>This is legally and practically considered a "Zero-Knowledge" check. Your browser hashes your password locally, truncates the hash, and requests a broad range of matching hashes from the global database to cross-reference locally. The API server has literally zero mathematical ability to know what your original password actually was, guaranteeing safety while validating risk factors.</p>
    </header>

    <section class="mt-4">
        <div class="pro-tip-box bg-primary-light p-4 rounded-3 shadow-sm" style="background:#f8fafc; border-left: 4px solid var(--primary);">
            <h3 class="fs-5 fw-bold mb-2"><i class="fa-solid fa-lightbulb text-warning me-2"></i> How to Use This Tool Like a Pro <span class="badge" style="background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;">PRO</span></h3>
            <ul class="mb-0 text-muted">
                <li class="mb-1"><strong>The 10-Breach Rule:</strong> If your password returns positive for being exposed in 10 or more database breaches, it has likely been added to automated dictionary-attack software used by hackers. You must immediately change any accounts utilizing that string combination.</li>
                <li class="mb-1"><strong>Variation Testing:</strong> If your base password is "Thunder," do not just check "Thunder." Check variations you often use like "Thunder123!" to understand if your specific permutation has already been leaked in major corporate breaches (like LinkedIn or Adobe).</li>
            </ul>
        </div>
    </section>

    <section class="mt-4">
        <h3 class="fs-4 fw-bold mb-3">Key Features &amp; Premium Benefits</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-user-secret text-success fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">k-Anonymity Cryptography</h4><p class="text-muted small mb-0">Hash strings are deliberately truncated so APIs cannot backwards-solve the data.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-database text-primary fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">HIBP Core Access</h4><p class="text-muted small mb-0">Cross-references against nearly 13 billion known harvested accounts worldwide.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-bolt text-warning fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Local Text-Parsing</h4><p class="text-muted small mb-0">The heavy lifting of matching thousands of returned hashes happens in your CPU.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-shield-virus text-info fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Total Obfuscation</h4><p class="text-muted small mb-0">Nobody, not even us, can intercept your password request query log.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <h3 class="fs-4 fw-bold mb-3">Frequently Asked Questions (FAQs)</h3>
        <div class="accordion" id="toolFaqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">Can you explain k-Anonymity simply?</button></h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">Yes! Your browser encrypts your password into a 40-character "hash". It then cuts off the last 35 characters. It sends only the first 5 characters to the database and says "give me every password hash that starts with these 5". The database sends back 500 hashes, and your browser securely checks them locally to find an exact match. The database never knew which of the 500 you were actually looking for!</div></div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">What if it says my password was breached 0 times?</button></h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">That is excellent news! It means that exact password string has not appeared in any massive dark web data dumps currently tracked by the global security API. Continue to use 2-Factor Authentication alongside it for maximum safety.</div></div>
            </div>
        </div>
    </section>
</article>
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



<script>
async function cryptoSha1(message) {
    const msgBuffer = new TextEncoder().encode(message);
    const hashBuffer = await crypto.subtle.digest('SHA-1', msgBuffer);
    const hashArray = Array.from(new Uint8Array(hashBuffer));
    return hashArray.map(b => b.toString(16).padStart(2, '0')).join('').toUpperCase();
}

async function checkBreach() {
    const input = document.getElementById('ebcInput').value;
    const statusBox = document.getElementById('ebc-status');
    if(!input) return;
    
    statusBox.style.display = 'block';
    statusBox.innerHTML = `<div class="p-4 border border-warning bg-warning bg-opacity-10 rounded text-warning fw-bold text-center"><i class="fa-solid fa-spinner fa-spin me-2"></i> Executing Local SHA-1 Cryptography...</div>`;
    
    try {
        const hash = await cryptoSha1(input);
        const prefix = hash.substring(0, 5);
        const suffix = hash.substring(5);
        
        statusBox.innerHTML = `<div class="p-4 border border-info bg-info bg-opacity-10 rounded text-info fw-bold text-center"><i class="fa-solid fa-satellite-dish me-2"></i> Ping HIBP servers with prefix: ${prefix}***...</div>`;
        
        const response = await fetch(`https://api.pwnedpasswords.com/range/${prefix}`);
        if (!response.ok) throw new Error("API Connection Failed");
        const data = await response.text();
        
        const hashes = data.split('\n');
        let count = 0;
        
        for (let row of hashes) {
            const parts = row.split(':');
            if (parts[0] === suffix) {
                count = parseInt(parts[1]);
                break;
            }
        }
        
        if (count > 0) {
            statusBox.innerHTML = `
            <div class="p-4 border border-danger bg-danger bg-opacity-10 rounded text-center">
                <i class="fa-solid fa-triangle-exclamation text-danger fa-3x mb-3"></i>
                <h4 class="text-danger fw-bold">HIGH RISK: PASSWORD BREACHED</h4>
                <p class="text-danger mb-0">This password has been exposed in public data breaches <strong>${count.toLocaleString()} times</strong>. It is highly unsafe for use.</p>
            </div>`;
        } else {
            statusBox.innerHTML = `
            <div class="p-4 border border-success bg-success bg-opacity-10 rounded text-center">
                <i class="fa-solid fa-shield-check text-success fa-3x mb-3"></i>
                <h4 class="text-success fw-bold">SAFE: NO EXPOSURES FOUND</h4>
                <p class="text-success mb-0">This specific password does not appear in any known dark web databases or corporate leaks.</p>
            </div>`;
        }
        
    } catch(e) {
        statusBox.innerHTML = `<div class="p-4 border border-danger bg-danger bg-opacity-10 rounded text-danger fw-bold text-center">API Routing Error: Please try again.</div>`;
    }
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>