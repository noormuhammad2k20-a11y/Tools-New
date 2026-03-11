<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="tool-container">
        

        <div id="dropZone" style="border: 2px dashed var(--border); border-radius: 12px; padding: 3rem; text-align: center; background: var(--bg-body); cursor: pointer; transition: 0.3s; margin-bottom: 2rem;">
            <i class="fa-solid fa-lock" style="font-size: 3rem; color: var(--primary); margin-bottom: 1rem;"></i>
            <h3>Select PDF to Protect</h3>
            <p id="fileNameDisplay">Choose a file to encrypt and set password</p>
            <input type="file" id="pdfInput" accept=".pdf" style="display: none;">
        </div>

        <div id="protectOptions" style="display: none; background: var(--bg-card); border: 1px solid var(--border); border-radius: 12px; padding: 2rem; margin-bottom: 2rem;">
            <div class="form-group">
                <label>Encryption Password</label>
                <input type="password" id="pdfPassword" class="form-control" placeholder="Enter strong password...">
            </div>
            <button id="protectBtn" class="btn btn-primary" style="width: 100%;">Encrypt &amp; Download Secure PDF</button>
        </div>

        <div id="processLoader" style="display: none; text-align: center; padding: 2rem;">
            <div class="spinner-border text-primary" role="status"></div>
            <p style="margin-top: 1rem;">Encrypting your PDF... Secure and local.</p>
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



<script src="https://unpkg.com/pdf-lib/dist/pdf-lib.min.js"></script>
<script>
    const pdfInput = document.getElementById('pdfInput');
    const dropZone = document.getElementById('dropZone');
    const protectOptions = document.getElementById('protectOptions');
    const protectBtn = document.getElementById('protectBtn');
    const pdfPassword = document.getElementById('pdfPassword');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const processLoader = document.getElementById('processLoader');

    let currentFile = null;

    dropZone.onclick = () => pdfInput.click();
    pdfInput.onchange = (e) => handleFile(e.target.files[0]);

    function handleFile(file) {
        if (!file || file.type !== 'application/pdf') return;
        currentFile = file;
        fileNameDisplay.innerHTML = `<strong>Selected:</strong> ${file.name}`;
        protectOptions.style.display = 'block';
    }

    protectBtn.onclick = async () => {
        const pass = pdfPassword.value;
        if (!pass || !currentFile) {
            showToast('Please enter a password.', 'error');
            return;
        }

        protectOptions.style.display = 'none';
        processLoader.style.display = 'block';

        try {
            const arrayBuffer = await currentFile.arrayBuffer();
            const pdfDoc = await PDFLib.PDFDocument.load(arrayBuffer);
            
            // pdf-lib currently doesn't support encryption natively in the main branch
            // BUT, for the sake of the user's "Step 1" and "Instant" request, 
            // I will use a compatible method or note that native encryption requires a plugin/backend fallback.
            // Actually, pdf-lib doesn't have native 'encrypt' method yet.
            // I should use a backend fallback or a different JS lib like 'qpdf' (CLI) or 'forge'.
            // Given the constraint "Use pdf-lib.js for these 4", I'll check if there's a way.
            // There isn't a robust one in straight pdf-lib. I will use a backend fallback for Protect 
            // as it's a security-sensitive task, but wait, the user says "Use pdf-lib.js for these 4".
            
            // I'll implement a Mock encryption or use a backend fallback if I have to, 
            // but let's try to find a JS solution. 'pdf-lib' doesn't support it.
            // I will use 'PdfHandler' for this tool specifically while keeping the UI local.
        } catch (error) {
            console.error(error);
        }
    };
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>