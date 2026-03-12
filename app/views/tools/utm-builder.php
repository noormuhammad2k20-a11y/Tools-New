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
                    
                    <h5 class="fw-bold mb-0 text-muted"><i class="fa-solid fa-earth-americas me-2"></i>Destination Target</h5>
                    <p class="small text-muted mb-3 border-bottom pb-2">Where should the user ultimately land?</p>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold small">Website URL <span class="text-danger">*</span></label>
                        <input type="url" id="utm-url" class="form-control form-control-lg border-2 border-primary" placeholder="https://www.example.com/landing-page" required>
                    </div>

                    <h5 class="fw-bold mb-0 text-muted mt-4"><i class="fa-solid fa-bullseye me-2"></i>Campaign Parameters</h5>
                    <p class="small text-muted mb-3 border-bottom pb-2">Define how traffic is segmented in Analytics.</p>

                    <div class="mb-3">
                        <label class="form-label fw-bold small">Campaign Source <code>utm_source</code> <span class="text-danger">*</span></label>
                        <input type="text" id="utm-source" class="form-control border-2" placeholder="e.g. google, newsletter, facebook" required>
                        <div class="form-text">The referrer driving the traffic.</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label fw-bold small">Campaign Medium <code>utm_medium</code></label>
                            <input type="text" id="utm-medium" class="form-control border-2" placeholder="e.g. cpc, banner, email">
                            <div class="form-text">Marketing medium.</div>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold small">Campaign Name <code>utm_campaign</code></label>
                            <input type="text" id="utm-name" class="form-control border-2" placeholder="e.g. spring_sale, promo_code">
                            <div class="form-text">The specific campaign identifier.</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label fw-bold small">Campaign Term <code>utm_term</code></label>
                            <input type="text" id="utm-term" class="form-control border-2" placeholder="e.g. running+shoes">
                            <div class="form-text">Identify paid keywords.</div>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold small">Campaign Content <code>utm_content</code></label>
                            <input type="text" id="utm-content" class="form-control border-2" placeholder="e.g. logolink or textlink">
                            <div class="form-text">A/B testing different ads.</div>
                        </div>
                    </div>
                    
                    <button class="btn btn-outline-secondary btn-sm rounded-pill px-4 mt-2" onclick="resetForm()"><i class="fa-solid fa-arrow-rotate-right me-1"></i>Reset Fields</button>

                </div>

                <!-- Right Output Side -->
                <div class="col-lg-6 ps-lg-4 d-flex flex-column">
                    <div class="flex-grow-1 position-relative">
                        
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label fw-bold text-dark small text-uppercase tracking-wider mb-0"><i class="fa-solid fa-wand-magic-sparkles me-2 text-primary"></i>Generated URL</label>
                        </div>
                        
                        <textarea id="out-url" class="form-control bg-light border-2 rounded-4 p-4 shadow-sm mb-3" rows="8" readonly placeholder="Fill out the fields to generate your tracked URL..." style="font-family: var(--font-mono); font-size: 14px; 1.6; resize: none; word-break: break-all; color: #0284c7;"></textarea>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-outline-primary px-4 rounded-pill fw-bold" onclick="testUrl()"><i class="fa-solid fa-arrow-up-right-from-square me-2"></i>Test Link</button>
                            <button class="btn btn-primary px-5 rounded-pill shadow-sm fw-bold" onclick="copyUrl()"><i class="fa-regular fa-copy me-2"></i>Copy Tracking URL</button>
                        </div>

                    </div>
                    
                    <div class="alert alert-info border-0 rounded-4 mt-4 mb-0">
                        <h6 class="fw-bold mb-1"><i class="fa-solid fa-circle-info me-2"></i>URL Encoding Active</h6>
                        <p class="small mb-0">Spaces and special characters are automatically converted (e.g., spaces become <code>%20</code>) to ensure your URL complies perfectly with W3C web standards.</p>
                    </div>

                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Attributing Marketing ROI Flawlessly</h2>
                    <p class="lead">Whenever a user visits your website, servers struggle to inherently understand <i>why</i> they are visiting. Did they click a link in your email newsletter, or did they find you via a Google search? <strong>Urchin Tracking Module (UTM)</strong> parameters solve this by appending invisible metadata directly to the URL string.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Google Analytics Intergration</h3>
                    <p>Platforms like Google Analytics 4 (GA4) or Mixpanel are specifically engineered to intercept these URL query parameters the microsecond your page loads. Without these codes, all external inbound traffic is clumped into a generic, unhelpful "Direct / None" bucket, blinding your marketing department to what campaigns are actually generating ROI.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Decoding the 5 Parameters</h3>
                    <ul>
                        <li><strong>Source (`utm_source`):</strong> The overarching platform driving traffic. Examples include `google`, `facebook`, or `mailchimp`.</li>
                        <li><strong>Medium (`utm_medium`):</strong> The financial mechanism or specific channel. Paid traffic becomes `cpc` (Cost Per Click). Organic social posts become `social`. Emails become `email`.</li>
                        <li><strong>Campaign (`utm_campaign`):</strong> The name of your internal marketing push. For example, `black_friday_2024` or `summer_promo`.</li>
                        <li><strong>Term (`utm_term`):</strong> Primarily used for Paid Search to identify the exact keyword bid that triggered the ad (e.g. `buy+nike+shoes`).</li>
                        <li><strong>Content (`utm_content`):</strong> Crucial for A/B testing. If an email has two links—one in the logo and one in a button—this tracks which one was actually clicked (e.g., `header_logo` versus `red_button`).</li>
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
.text-gradient-primary { background: linear-gradient(45deg, #2563eb, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
textarea.form-control:focus { box-shadow: 0 0 0 .25rem rgba(13,110,253,.25) !important; border-color: #86b7fe !important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    
    // Inputs
    const uiUrl = document.getElementById('utm-url');
    const uiSrc = document.getElementById('utm-source');
    const uiMed = document.getElementById('utm-medium');
    const uiName = document.getElementById('utm-name');
    const uiTerm = document.getElementById('utm-term');
    const uiContent = document.getElementById('utm-content');
    
    // Output
    const outUrl = document.getElementById('out-url');

    function build() {
        const base = uiUrl.value.trim();
        if (!base) {
            outUrl.value = '';
            uiUrl.classList.remove('is-valid');
            return;
        }

        // Extremely basic URL validation
        if (!base.startsWith('http://') && !base.startsWith('https://')) {
            outUrl.value = 'Error: Valid URL must start with http:// or https://';
            uiUrl.classList.add('is-invalid');
            return;
        }
        uiUrl.classList.remove('is-invalid');

        let parsed;
        try {
            parsed = new URL(base);
        } catch(e) {
            outUrl.value = 'Error: Malformed core URL.';
            return;
        }

        // Add params carefully using URLSearchParams for automatic encoding
        const params = new URLSearchParams(parsed.search);

        if (uiSrc.value.trim()) params.set('utm_source', uiSrc.value.trim());
        if (uiMed.value.trim()) params.set('utm_medium', uiMed.value.trim());
        if (uiName.value.trim()) params.set('utm_campaign', uiName.value.trim());
        if (uiTerm.value.trim()) params.set('utm_term', uiTerm.value.trim());
        if (uiContent.value.trim()) params.set('utm_content', uiContent.value.trim());

        // Re-construct URL
        parsed.search = params.toString();
        // Decode equal signs and ampersands for cleaner look, but keep spaces as %20.
        // URL object natively handles it perfectly.
        
        // Only output if at least source is provided, otherwise just base (but UX demands source)
        if (uiSrc.value.trim()) {
            outUrl.value = parsed.toString();
        } else {
             outUrl.value = base + '\n\n* Waiting for Campaign Source to generate tracking parameters...';
        }
    }

    [uiUrl, uiSrc, uiMed, uiName, uiTerm, uiContent].forEach(el => {
        el.addEventListener('input', build);
    });

    window.copyUrl = () => {
        if(!outUrl.value || outUrl.value.startsWith('Error') || outUrl.value.includes('* Waiting')) return showToast('Generate a valid URL first.', 'error');
        outUrl.select();
        document.execCommand('copy');
        showToast('Tracking URL Copied!');
    };

    window.testUrl = () => {
        if(!outUrl.value || outUrl.value.startsWith('Error') || outUrl.value.includes('* Waiting')) return showToast('Generate a valid URL first.', 'error');
        window.open(outUrl.value, '_blank');
    };

    window.resetForm = () => {
        uiUrl.value = '';
        uiSrc.value = '';
        uiMed.value = '';
        uiName.value = '';
        uiTerm.value = '';
        uiContent.value = '';
        build();
    };

});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>