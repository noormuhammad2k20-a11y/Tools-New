<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">

<div class="pro-card">
    
    
    <div class="row g-4">
        <div class="col-md-8">
            <div class="row g-3">
                <div class="col-md-6"><label class="fw-bold small mb-1">First Name</label><input type="text" id="vcfFirst" class="form-control bg-light" oninput="generatePreview()"></div>
                <div class="col-md-6"><label class="fw-bold small mb-1">Last Name</label><input type="text" id="vcfLast" class="form-control bg-light" oninput="generatePreview()"></div>
                <div class="col-md-6"><label class="fw-bold small mb-1">Phone Number</label><input type="tel" id="vcfPhone" class="form-control bg-light" oninput="generatePreview()"></div>
                <div class="col-md-6"><label class="fw-bold small mb-1">Email Address</label><input type="email" id="vcfEmail" class="form-control bg-light" oninput="generatePreview()"></div>
                <div class="col-md-6"><label class="fw-bold small mb-1">Company</label><input type="text" id="vcfCompany" class="form-control bg-light" oninput="generatePreview()"></div>
                <div class="col-md-6"><label class="fw-bold small mb-1">Job Title</label><input type="text" id="vcfTitle" class="form-control bg-light" oninput="generatePreview()"></div>
                <div class="col-md-12"><label class="fw-bold small mb-1">Website URL</label><input type="url" id="vcfUrl" class="form-control bg-light" placeholder="https://" oninput="generatePreview()"></div>
            </div>
            
            <button onclick="downloadVcf()" class="btn btn-primary btn-lg w-100 fw-bold mt-4 shadow-sm">Export .VCF File <i class="fa-solid fa-download ms-2"></i></button>
        </div>
        
        <div class="col-md-4">
            <div class="p-4 bg-white border rounded-3 shadow-sm text-center h-100 d-flex flex-column justify-content-center">
                <h5 class="fw-bold mb-3 fs-6 text-muted">SCAN TO IMPORT <span class="badge bg-gradient-primary ms-2" style="font-size:0.6rem;">PRO</span></h5>
                <canvas id="vcfQrCanvas" class="img-fluid mx-auto mb-3" style="border:1px solid #eee; border-radius:12px; padding:10px;"></canvas>
                <div class="small text-muted fw-bold">Point iPhone/Android camera to save contact instantly.</div>
                <button onclick="downloadQr()" class="btn btn-outline-dark btn-sm fw-bold mt-3">Download QR Code</button>
            </div>
        </div>
    </div>
</div>

<article class="tool-seo-article container mt-5 border-top pt-4">
    <header>
        <h2 class="fs-3 fw-bold mb-3">What is the VCF Generator?</h2>
        <p>The VCF (Virtual Contact File) Generator is an advanced digital networking utility designed for salespeople, executives, and marketers. VCF files (commonly referred to as vCards) are the universal standard file format across all iOS, Android, macOS, and Windows ecosystems for transferring rich contact data reliably. When opened, it instantly prompts the device to save a new address book entry with all attributes pre-filled.</p>
        <p>This utility not only structures your raw data into standard vCard 3.0 syntax, but it dynamically cross-compiles that massive text string into an ultra-dense, scannable QR Code. This allows for modern, physical-to-digital data bridging without requiring server-hosted middleware.</p>
    </header>

    <section class="mt-4">
        <div class="pro-tip-box bg-primary-light p-4 rounded-3 shadow-sm" style="background:#f8fafc; border-left: 4px solid var(--primary);">
            <h3 class="fs-5 fw-bold mb-2"><i class="fa-solid fa-lightbulb text-warning me-2"></i> How to Use This Tool Like a Pro <span class="badge" style="background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;">PRO</span></h3>
            <ul class="mb-0 text-muted">
                <li class="mb-1"><strong>Physical Business Cards:</strong> Generate your VCF code using the PRO QR scanner preview. Download the QR image and print it directly onto your physical paper business cards. Associates can scan it instantly during conferences instead of typing out your long e-mail address.</li>
                <li class="mb-1"><strong>Email Signatures:</strong> Download the exported .VCF file and hyperlink it at the bottom of your Outlook or Gmail signature ("Click here to add me to your contacts!"), skyrocketing your retention rates with clients.</li>
            </ul>
        </div>
    </section>

    <section class="mt-4">
        <h3 class="fs-4 fw-bold mb-3">Key Features &amp; Premium Benefits</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-qrcode text-success fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Instant QR Sync</h4><p class="text-muted small mb-0">Packs absolute contact dictionaries directly into matrix barcodes.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-brands fa-apple text-primary fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Universal vCard 3.0</h4><p class="text-muted small mb-0">Adheres to strict RFC specs. Perfectly recognized by Apple iOS and Android.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-database text-warning fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Offline Portability</h4><p class="text-muted small mb-0">Unlike "LinkTree" style QR codes, this QR code holds the data itself offline.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-download text-info fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Direct File Exports</h4><p class="text-muted small mb-0">Exports physical .vcf byte files to attach directly to marketing CRMs.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <h3 class="fs-4 fw-bold mb-3">Frequently Asked Questions (FAQs)</h3>
        <div class="accordion" id="toolFaqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">Will the QR Code expire?</button></h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">Never! Unlike dynamic QR codes sold by marketing platforms (which actually just point to a website URL that redirects to data), this QR code literally contains the raw text data of your contact card. It will work forever without an internet connection.</div></div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Why isn't my photo included in the QR?</button></h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">Adding a base64 string of a photograph physically breaks the QR code matrix limit (making the squares too dense for standard cameras to read). For photo inclusion, you must use hosted `.vcf` URLs, which sacrifices offline portability.</div></div>
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



<script src="<?php echo URL_ROOT; ?>/assets/js/pdf-developer-tools.js"></script>
<script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.3/build/qrcode.min.js"></script>
<script>
let currentVcf = '';

function buildVcfString() {
    const fn = document.getElementById('vcfFirst').value.trim();
    const ln = document.getElementById('vcfLast').value.trim();
    const phone = document.getElementById('vcfPhone').value.trim();
    const email = document.getElementById('vcfEmail').value.trim();
    const comp = document.getElementById('vcfCompany').value.trim();
    const title = document.getElementById('vcfTitle').value.trim();
    const url = document.getElementById('vcfUrl').value.trim();
    
    // vCard 3.0 Standard
    let vcf = `BEGIN:VCARD\nVERSION:3.0\n`;
    vcf += `N:${ln};${fn};;;\n`;
    vcf += `FN:${fn} ${ln}\n`;
    if(comp) vcf += `ORG:${comp}\n`;
    if(title) vcf += `TITLE:${title}\n`;
    if(phone) vcf += `TEL;TYPE=CELL,VOICE:${phone}\n`;
    if(email) vcf += `EMAIL;TYPE=PREF,INTERNET:${email}\n`;
    if(url) vcf += `URL:${url}\n`;
    vcf += `END:VCARD`;
    
    return vcf;
}

function generatePreview() {
    currentVcf = buildVcfString();
    
    // Generate QR
    QRCode.toCanvas(document.getElementById('vcfQrCanvas'), currentVcf, {
        width: 250,
        margin: 1,
        color: { dark: '#1e293b', light: '#ffffff' }
    }, function (error) {
        if (error) console.error(error);
    });
}

function downloadVcf() {
    if(!document.getElementById('vcfFirst').value && !document.getElementById('vcfCompany').value) {
        return alert("Please enter at least a name or company.");
    }
    PdfDevPro.downloadTextAsFile(currentVcf, 'contact_card.vcf');
}

function downloadQr() {
    const cvs = document.getElementById('vcfQrCanvas');
    PdfDevPro.downloadCanvas(cvs, 'contact_qr.png', 'image/png');
}

// init
generatePreview();
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>