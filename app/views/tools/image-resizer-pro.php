<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    
    <!-- Hero / Title Area -->
    <div class="resizer-hero animate-fade-up">
        <span class="badge bg-light text-primary border border-primary-subtle mb-3 px-3 py-2 rounded-pill fw-bold" style="font-size: 0.8rem; letter-spacing: 1px;">PREMIUM IMAGE TOOL</span>
        <h1>Resize Any <span>Image Online</span> — Free &amp; Instant</h1>
        <p>Re-size your images online in seconds for free. Adjust dimensions instantly without losing quality.</p>
    </div>

    <!-- The Tool Area -->
    <div class="upload-card animate-fade-up" style="animation-delay: 0.1s;">
        <input type="file" id="imageInput" accept="image/png, image/jpeg, image/webp" style="display: none;">
        
        <div class="upload-area" id="dropZone" onclick="document.getElementById('imageInput').click()">
            <div id="uploadDefaultState">
                <i class="fa-solid fa-cloud-arrow-up upload-icon"></i>
                <div class="upload-text">Choose an image or drop it here</div>
                <div class="upload-subtext">Supports JPG, PNG, WEBP (Max 10MB)</div>
            </div>
            <div id="uploadPreviewState" style="display: none; align-items: center; flex-direction: column;">
                <img id="imagePreview" src="" alt="Preview" style="max-height: 150px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); margin-bottom: 15px;">
                <div id="fileInfoLabel" class="badge bg-primary rounded-pill px-3 py-2"></div>
                <button class="btn btn-sm btn-outline-danger mt-2" id="btnRemoveImage" onclick="event.stopPropagation(); removeImage();">Remove Image</button>
            </div>
        </div>

        <div class="mt-4 text-center">
            <span style="font-size: 0.85rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px;">Dimensions</span>
        </div>

        <div class="settings-row">
            <div class="input-group-custom">
                <label>Width</label>
                <input type="number" id="resizeWidth" placeholder="Auto">
                <span class="suffix">px</span>
            </div>
            
            <div class="aspect-lock" id="btnToggleLock" title="Lock Aspect Ratio">
                <i class="fa-solid fa-link"></i>
            </div>
            
            <div class="input-group-custom">
                <label>Height</label>
                <input type="number" id="resizeHeight" placeholder="Auto">
                <span class="suffix">px</span>
            </div>

            <div style="margin-left: 1rem; border-left: 1px solid #e2e8f0; padding-left: 1rem; position: relative;">
                <label style="position: absolute; top: -25px; left: 1rem; font-size: 0.85rem; color: #64748b; font-weight: 600;">Format Output</label>
                <select id="resizeFormat" class="format-select">
                    <option value="image/jpeg">JPG</option>
                    <option value="image/png">PNG</option>
                    <option value="image/webp">WEBP</option>
                </select>
            </div>
        </div>

        <div class="text-center mt-4 pt-2">
            <button id="btnResizeExecute" class="btn btn-primary btn-lg rounded-pill fw-bold shadow px-5" style="letter-spacing: 0.5px;">
                Resize Image <i class="fa-solid fa-wand-magic-sparkles ms-2"></i>
            </button>
        </div>
        
        <!-- Action Result Display -->
        <div id="resizeResult" class="mt-4 pt-4 border-top d-none" style="text-align: center;">
            <div class="alert alert-success fw-bold d-inline-block rounded-pill"><i class="fa-solid fa-check-circle me-1"></i> Resized Successfully</div>
            <div>
                <a id="downloadLink" href="#" download="resized_image.jpg" class="btn btn-dark fw-bold px-4 rounded-pill mt-2">Download Image <i class="fa-solid fa-download ms-2"></i></a>
            </div>
            <div class="text-muted mt-2 small" id="resultStats"></div>
        </div>
    </div>

    <!-- Explore More Image Tools -->
    <div class="mt-5 pt-4 text-center">
        <h2 class="section-title">Explore More Image Tools</h2>
        <p class="section-subtitle">Check out other Ultra Bst Pro tools for more image formatting options.</p>
        
        <div class="tools-grid">
            <a href="&lt;?=%20url('image-tools/batch-image-compressor')%20?&gt;" class="tool-card-mini">
                <h4>Compress Image</h4>
                <p>Make your image file size smaller for web optimization effortlessly.</p>
            </a>
            <a href="#" class="tool-card-mini" onclick="event.preventDefault(); alert('Available in premium suite.')">
                <h4>Convert to JPG</h4>
                <p>Turn whatever image you have into a lightweight standard JPG format.</p>
            </a>
            <a href="#" class="tool-card-mini" onclick="event.preventDefault(); alert('Available in premium suite.')">
                <h4>Convert to PNG</h4>
                <p>Turn whatever image you have into a transparent PNG file format.</p>
            </a>
            <a href="#" class="tool-card-mini" onclick="event.preventDefault(); alert('Available in PDF suite.')">
                <h4>PDF to JPG</h4>
                <p>Convert your large PDF document pages into high-quality JPG image slices.</p>
            </a>
        </div>
    </div>

    <!-- Accordion Links Placeholder -->
    <div class="accordion custom-accordion mt-4" id="imageLinksAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc1">JPG to PDF</button></h2>
            <div id="acc1" class="accordion-collapse collapse"><div class="accordion-body">Easily assemble images into a single PDF document.</div></div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc2">HEIC to JPG</button></h2>
            <div id="acc2" class="accordion-collapse collapse"><div class="accordion-body">Convert Apple high-efficiency photos to standard JPG format.</div></div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#acc3">Compress JPEG</button></h2>
            <div id="acc3" class="accordion-collapse collapse"><div class="accordion-body">Massively reduce JPEG sizes with smart lossy compression algorithms.</div></div>
        </div>
    </div>

    <div style="margin: 6rem 0; border-top: 1px solid var(--border);"></div>

    <!-- Content Feature Section -->
    <div class="row align-items-center g-5 mb-5 pb-5">
        <div class="col-lg-5 order-2 order-lg-1">
            <div class="mockup-graphic shadow-sm">
                <div class="mockup-window">
                    <div class="mockup-window-header">
                        <div class="mockup-dot"></div><div class="mockup-dot"></div><div class="mockup-dot"></div>
                    </div>
                    <div class="mockup-content">
                        <i class="fa-solid fa-image mockup-image-icon"></i><br>
                        RESIZE<br>IMAGE<br>ONLINE
                    </div>
                </div>
                <!-- Floating Badges -->
                <div class="mockup-badge b1"><i class="fa-solid fa-check text-success"></i> 1080px</div>
                <div class="mockup-badge b2"><i class="fa-solid fa-compress"></i> PDF</div>
                <div class="mockup-badge" style="top: 15%; left: -5%; color: #8b5cf6;"><i class="fa-solid fa-file-image"></i> PNG</div>
            </div>
        </div>
        
        <div class="col-lg-7 order-1 order-lg-2">
            <span class="text-primary fw-bold text-uppercase" style="letter-spacing: 1px; font-size: 0.85rem;">PREMIUM UTILITY</span>
            <h2 class="fw-bold fs-2 text-dark mt-2 mb-4">Why Use Ultra Bst Pro's Image Resizer?</h2>
            <p class="text-muted fs-5 mb-4">Ultra Bst Pro’s Image Resizer is the best tool to resize any picture. Whether you need an image for social media, print, or web, you can use our application to reduce dimensions and crop without losing value.</p>
            
            <ul class="feature-list">
                <li>
                    <div class="feature-list-icon"><i class="fa-solid fa-check"></i></div>
                    <div class="feature-list-content">
                        <h5>Custom Dimensions</h5>
                        <p>Type the exact width and height you need, or scale by percentage. Choose to keep aspect ratio securely locked or stretch it to perfectly fit your canvas container constraints.</p>
                    </div>
                </li>
                <li>
                    <div class="feature-list-icon"><i class="fa-solid fa-check"></i></div>
                    <div class="feature-list-content">
                        <h5>Format Selection</h5>
                        <p>Resize and convert your file to JPG, PNG, or WEBP in one click. Web formats load faster online and are universally accessible natively across systems.</p>
                    </div>
                </li>
                <li>
                    <div class="feature-list-icon"><i class="fa-solid fa-check"></i></div>
                    <div class="feature-list-content">
                        <h5>100% Free &amp; Secure</h5>
                        <p>We never store your files. All images are processed securely directly in your browser client and deleted right after you’re done without touching remote servers.</p>
                    </div>
                </li>
            </ul>
            
            <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="btn btn-primary rounded-pill px-4 mt-3 fw-bold">Start Resizing Online <i class="fa-solid fa-arrow-up ms-2"></i></button>
        </div>
    </div>

    <!-- How It Works Section -->
    <div class="mb-5 pb-5 pt-4 text-center">
        <span class="text-primary fw-bold text-uppercase" style="letter-spacing: 1px; font-size: 0.85rem;">STEP BY STEP</span>
        <h2 class="section-title mt-2">How Ultra Bst Pro's Image Resizer Tool Works</h2>
        <p class="section-subtitle">Follow this brief step-by-step guide to get started effortlessly.</p>
        
        <div class="row g-4 mt-2">
            <div class="col-md-4">
                <div class="step-column">
                    <div class="step-icon-wrapper shadow-sm"><i class="fa-solid fa-laptop-file"></i></div>
                    <h4>Upload Image</h4>
                    <p>Start by clicking 'Upload' or dragging your picture directly into the dashed upload area box near the top.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="step-column">
                    <div class="step-icon-wrapper shadow-sm"><i class="fa-solid fa-sliders"></i></div>
                    <h4>Adjust Settings</h4>
                    <p>Set the absolute new width and height in pixels. Select your desired image final output format (JPG/PNG).</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="step-column">
                    <div class="step-icon-wrapper shadow-sm"><i class="fa-solid fa-file-arrow-down"></i></div>
                    <h4>Download Result</h4>
                    <p>Click 'Resize Image' and securely save your perfectly sized picture directly back onto your local device drive.</p>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="btn btn-dark btn-lg rounded-pill fw-bold shadow px-5 text-white">Start Resizing For Free</button>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="mb-5 pb-5">
        <div class="text-center mb-5">
            <h2 class="section-title">Frequently Asked Questions — Image Resizer</h2>
            <p class="section-subtitle">Find answers to our user’s most widely asked questions regarding our image sizing tool.</p>
        </div>
        
        <div class="faq-grid">
            <div class="faq-item">
                <h5>Is this image resizer completely free to use?</h5>
                <p>Yes, Ultra Bst Pro's image resizer tool is 100% free to use for anyone without any arbitrary arbitrary subscription tiers or hidden export fees attached.</p>
            </div>
            <div class="faq-item">
                <h5>Are my uploaded image files secure?</h5>
                <p>Absolutely. Security is our top priority. All images are processed safely within your local internet browser itself. The data never actually crosses to our external proxy servers.</p>
            </div>
            <div class="faq-item">
                <h5>Does it reduce or compromise the quality of the image?</h5>
                <p>No, our tool uses high-quality resizing pixel interpolation algorithms via HTML5 canvas, ensuring the resulting export retains its maximum possible fidelity without artifacting.</p>
            </div>
            <div class="faq-item">
                <h5>Can I resize an image using my mobile phone?</h5>
                <p>Yes, our natively responsive Image Resizer is fully compatible with any modern browser layout on iOS and Android smart device platforms unhindered.</p>
            </div>
        </div>
    </div>

    <!-- Explore More Grid -->
    <div class="mt-4 mb-5 pt-4">
        <h2 class="section-title mb-5">Explore More on Ultra Bst Pro</h2>
        
        <div class="row g-4">
            <div class="col-md-4">
                <a href="&lt;?=%20url('categories')%20?&gt;" class="explore-bottom-card">
                    <div class="explore-bottom-icon"><i class="fa-solid fa-star"></i></div>
                    <h5>Our Tools</h5>
                    <p>Explore all our completely free online tools spanning SEO suites, PDF parsing, text generators, formatting elements, and more.</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="explore-bottom-card">
                    <div class="explore-bottom-icon"><i class="fa-solid fa-book-open"></i></div>
                    <h5>Our Blog</h5>
                    <p>Read our newest articles and tutorials detailing modern productivity tools, internet guides, and development best practices.</p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="explore-bottom-card">
                    <div class="explore-bottom-icon"><i class="fa-solid fa-users"></i></div>
                    <h5>About Us</h5>
                    <p>Learn more about the engineering team dedicated to providing the very best free online web utilities natively for the everyday user.</p>
                </a>
            </div>
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


<style>
/* Custom Styles for Image Resizer based on Screenshot and Theme */
.resizer-hero { text-align: center; margin-bottom: 2rem; }
.resizer-hero h1 { font-weight: 800; font-size: 2.2rem; color: var(--text-dark); margin-bottom: 0.5rem; }
.resizer-hero h1 span { color: var(--primary); }
.resizer-hero p { color: var(--text-muted); font-size: 1.1rem; }

.upload-card { background: #fff; border: 1px solid var(--border); border-radius: 16px; padding: 2rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); max-width: 800px; margin: 0 auto; }
.upload-area { border: 2px dashed #cbd5e1; border-radius: 12px; padding: 3rem 1rem; text-align: center; background: #f8fafc; cursor: pointer; transition: all 0.3s ease; display:flex; flex-direction:column; align-items:center; justify-content:center; min-height: 200px; }
.upload-area:hover, .upload-area.dragover { border-color: var(--primary); background: #f0fdf4; }
.upload-icon { font-size: 3rem; color: #94a3b8; margin-bottom: 1rem; }
.upload-text { font-size: 1.1rem; color: #475569; font-weight: 600; }
.upload-subtext { font-size: 0.9rem; color: #94a3b8; margin-top: 0.5rem; }

.settings-row { display: flex; align-items: center; justify-content: center; gap: 1rem; flex-wrap: wrap; margin-top: 1.5rem; }
.input-group-custom { position: relative; width: 140px; }
.input-group-custom input { padding-right: 40px; font-weight: 600; text-align: center; border-radius: 8px; border: 1px solid #cbd5e1; width: 100%; padding-top: 0.7rem; padding-bottom: 0.7rem; }
.input-group-custom .suffix { position: absolute; right: 12px; top: 50%; transform: translateY(-50%); color: #64748b; font-size: 0.9rem; font-weight: 500; }
.input-group-custom label { position: absolute; top: -25px; left: 0; font-size: 0.85rem; color: #64748b; font-weight: 600; }

.aspect-lock { color: var(--primary); font-size: 1.2rem; cursor: pointer; padding: 0.5rem; background: #f0fdf4; border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
.aspect-lock.unlocked { color: #94a3b8; background: #f1f5f9; }

.format-select { border-radius: 8px; border: 1px solid #cbd5e1; padding: 0.7rem 1rem; font-weight: 600; color: #475569; min-width: 150px; background-color: #fff; cursor: pointer; }

/* Grid Sections */
.section-title { text-align: left; font-weight: 800; font-size: 1.8rem; margin-bottom: 0.5rem; color: var(--text-dark); text-align: center; }
.section-subtitle { text-align: center; color: var(--text-muted); margin-bottom: 2rem; font-size: 1.05rem; }

.tools-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-top: 2rem; }
.tool-card-mini { background: #fff; border: 1px solid var(--border); border-radius: 12px; padding: 1.5rem; transition: transform 0.2s, box-shadow 0.2s; text-decoration: none; display: block; }
.tool-card-mini:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.08); border-color: var(--primary); }
.tool-card-mini h4 { color: var(--primary); font-size: 1.1rem; font-weight: 700; margin-bottom: 0.5rem; }
.tool-card-mini p { color: var(--text-muted); font-size: 0.85rem; margin: 0; line-height: 1.5; }

/* Mockup Graphic CSS */
.mockup-graphic { background: #f8fafc; border-radius: 12px; padding: 20px; position: relative; min-height: 250px; display: flex; align-items: center; justify-content: center; border: 1px solid var(--border); overflow: hidden; }
.mockup-window { background: #fff; border-radius: 8px; width: 80%; height: 70%; box-shadow: 0 20px 40px rgba(0,0,0,0.1); border: 1px solid #e2e8f0; position: relative; z-index: 2; padding: 1rem; display:flex; flex-direction:column; align-items:center; justify-content:center;}
.mockup-window-header { position: absolute; top: 0; left: 0; width: 100%; background: #0f172a; height: 25px; border-top-left-radius: 8px; border-top-right-radius: 8px; display: flex; align-items: center; padding-left: 10px; gap: 5px; }
.mockup-dot { width: 8px; height: 8px; background: #ef4444; border-radius: 50%; }
.mockup-dot:nth-child(2) { background: #f59e0b; }
.mockup-dot:nth-child(3) { background: #22c55e; }
.mockup-content { text-align: center; padding-top: 25px; color: var(--primary); font-weight: 900; font-size: 1.5rem; letter-spacing: 1px; }
.mockup-image-icon { font-size: 3rem; color: #38bdf8; margin-bottom: 15px; }
.mockup-badge { position: absolute; background: white; border: 1px solid var(--border); border-radius: 30px; padding: 8px 15px; font-weight: bold; color: #10b981; box-shadow: 0 4px 10px rgba(0,0,0,0.05); z-index: 3; display: flex; align-items: center; gap: 8px; font-size: 0.85rem; }
.mockup-badge.b1 { top: 20%; right: -10%; transform: rotate(5deg); }
.mockup-badge.b2 { bottom: 15%; left: -5%; transform: rotate(-5deg); color: #3b82f6; }

/* Features List */
.feature-list { list-style: none; padding: 0; margin: 0; }
.feature-list li { display: flex; gap: 12px; margin-bottom: 1.5rem; align-items: flex-start; }
.feature-list-icon { color: white; background: var(--primary); width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.7rem; flex-shrink: 0; margin-top: 4px; box-shadow: 0 2px 5px rgba(16, 185, 129, 0.3); }
.feature-list-content h5 { font-size: 1.1rem; font-weight: 700; color: var(--text-dark); margin-bottom: 4px; }
.feature-list-content p { font-size: 0.95rem; color: var(--text-muted); line-height: 1.6; margin: 0; }

/* How it works */
.step-column { text-align: center; padding: 1rem; }
.step-icon-wrapper { width: 80px; height: 80px; background: #f0fdf4; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; color: var(--primary); margin: 0 auto 1.5rem; border: 2px dashed #bbf7d0; position: relative; }
.step-column h4 { font-weight: 700; font-size: 1.2rem; color: var(--text-dark); margin-bottom: 0.5rem; }
.step-column p { color: var(--text-muted); font-size: 0.9rem; line-height: 1.5; }

/* FAQ */
.faq-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; }
.faq-item h5 { font-weight: 700; color: var(--primary); font-size: 1.1rem; margin-bottom: 0.75rem; }
.faq-item p { color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; }

/* Standard Accordion overrides */
.custom-accordion .accordion-item { border: 1px solid var(--border); border-radius: 8px !important; margin-bottom: 0.5rem; overflow: hidden; }
.custom-accordion .accordion-button { font-weight: 600; color: var(--text-dark); padding: 1rem 1.5rem; background: #fff; box-shadow: none; }
.custom-accordion .accordion-button:not(.collapsed) { color: var(--primary); background: #f8fafc; }
.custom-accordion .accordion-body { padding: 1rem 1.5rem; color: var(--text-muted); background: #fff; }

/* Explore More Bottom */
.explore-bottom-card { background: #fff; border: 1px solid var(--border); border-radius: 12px; padding: 2rem 1.5rem; text-align: center; transition: all 0.3s ease; height: 100%; display: flex; flex-direction: column; align-items: center; text-decoration: none; cursor: pointer; }
.explore-bottom-card:hover { border-color: var(--primary); box-shadow: 0 10px 30px rgba(0,0,0,0.05); transform: translateY(-3px); }
.explore-bottom-icon { width: 60px; height: 60px; background: #f0fdf4; color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 1rem; }
.explore-bottom-card h5 { font-weight: 700; color: var(--text-dark); margin-bottom: 0.5rem; }
.explore-bottom-card p { color: var(--text-muted); font-size: 0.85rem; margin: 0; line-height: 1.5; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    let currentFile = null;
    let originalImage = null; // HTMLImageElement
    let originalWidth = 0;
    let originalHeight = 0;
    let keepAspect = true;

    const inputImage = document.getElementById('imageInput');
    const dropZone = document.getElementById('dropZone');
    const defaultState = document.getElementById('uploadDefaultState');
    const previewState = document.getElementById('uploadPreviewState');
    const imagePreview = document.getElementById('imagePreview');
    const fileInfoLabel = document.getElementById('fileInfoLabel');
    
    const inputW = document.getElementById('resizeWidth');
    const inputH = document.getElementById('resizeHeight');
    const btnLock = document.getElementById('btnToggleLock');
    const selectFormat = document.getElementById('resizeFormat');
    const btnResize = document.getElementById('btnResizeExecute');
    const resultBox = document.getElementById('resizeResult');
    const btnDownload = document.getElementById('downloadLink');
    const resultStats = document.getElementById('resultStats');

    // Remove existing File Input global listeners from main.js if any, use precise local ones
    
    // Drag & Drop Handlers
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false)
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => dropZone.classList.add('dragover'), false)
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, () => dropZone.classList.remove('dragover'), false)
    });

    dropZone.addEventListener('drop', (e) => {
        const dt = e.dataTransfer;
        const files = dt.files;
        if(files.length) handleFile(files[0]);
    });

    inputImage.addEventListener('change', function() {
        if(this.files && this.files.length) handleFile(this.files[0]);
    });

    function handleFile(file) {
        if (!file.type.match('image.*')) {
            if(window.showToast) showToast('Please select a valid image file.', 'error');
            return;
        }
        currentFile = file;
        
        // Auto-select format based on input
        if (file.type === 'image/png') selectFormat.value = 'image/png';
        else if (file.type === 'image/webp') selectFormat.value = 'image/webp';
        else selectFormat.value = 'image/jpeg';

        const reader = new FileReader();
        reader.onload = (e) => {
            const img = new Image();
            img.onload = () => {
                originalImage = img;
                originalWidth = img.width;
                originalHeight = img.height;
                
                inputW.value = originalWidth;
                inputH.value = originalHeight;
                
                imagePreview.src = e.target.result;
                fileInfoLabel.innerHTML = `<i class="fa-solid fa-file-image me-1"></i> ${file.name} (${formatBytes(file.size)})`;
                
                defaultState.style.display = 'none';
                previewState.style.display = 'flex';
                resultBox.classList.add('d-none'); // Hide old result
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }

    // Export function to global scope for the inline onclick handler
    window.removeImage = function() {
        currentFile = null;
        originalImage = null;
        inputImage.value = '';
        inputW.value = '';
        inputH.value = '';
        
        defaultState.style.display = 'block';
        previewState.style.display = 'none';
        resultBox.classList.add('d-none');
    };

    // Aspect Ratio Lock Logic
    btnLock.addEventListener('click', () => {
        keepAspect = !keepAspect;
        if (keepAspect) {
            btnLock.classList.remove('unlocked');
            btnLock.innerHTML = '<i class="fa-solid fa-link"></i>';
            // Trigger recalculation if possible
            if (originalWidth > 0 && inputW.value) {
                inputH.value = Math.round((inputW.value * originalHeight) / originalWidth);
            }
        } else {
            btnLock.classList.add('unlocked');
            btnLock.innerHTML = '<i class="fa-solid fa-link-slash"></i>';
        }
    });

    inputW.addEventListener('input', () => {
        if (keepAspect && originalWidth > 0) {
            const w = parseInt(inputW.value) || 0;
            if (w > 0) inputH.value = Math.round((w * originalHeight) / originalWidth);
        }
    });

    inputH.addEventListener('input', () => {
        if (keepAspect && originalHeight > 0) {
            const h = parseInt(inputH.value) || 0;
            if (h > 0) inputW.value = Math.round((h * originalWidth) / originalHeight);
        }
    });

    // Client-side Resize Execution using Canvas
    btnResize.addEventListener('click', () => {
        if (!originalImage) {
            if(window.showToast) showToast('Please upload an image first.', 'warning');
            return;
        }

        const targetW = parseInt(inputW.value) || originalWidth;
        const targetH = parseInt(inputH.value) || originalHeight;
        
        if (targetW <= 0 || targetH <= 0 || targetW > 10000 || targetH > 10000) {
             if(window.showToast) showToast('Invalid dimensions. Please use sane sizes.', 'error');
             return;
        }

        const btnOriginalText = btnResize.innerHTML;
        btnResize.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Processing...';
        btnResize.disabled = true;

        // Use a slight timeout to allow UI update before heavy locking task
        setTimeout(() => {
            try {
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');
                canvas.width = targetW;
                canvas.height = targetH;

                // Handle transparency for JPEG by filling white background first
                const format = selectFormat.value;
                if (format === 'image/jpeg') {
                    ctx.fillStyle = '#ffffff';
                    ctx.fillRect(0, 0, targetW, targetH);
                }

                // Smooth resize
                ctx.imageSmoothingEnabled = true;
                ctx.imageSmoothingQuality = 'high';
                ctx.drawImage(originalImage, 0, 0, targetW, targetH);

                const ext = format === 'image/jpeg' ? 'jpg' : (format === 'image/webp' ? 'webp' : 'png');
                const quality = format === 'image/png' ? undefined : 0.92; // 92% quality for jpg/webp
                
                const dataUrl = canvas.toDataURL(format, quality);
                
                // Calculate rough size
                const base64Length = dataUrl.length - (dataUrl.indexOf(',') + 1);
                const padding = (dataUrl.charAt(dataUrl.length - 2) === '=') ? 2 : ((dataUrl.charAt(dataUrl.length - 1) === '=') ? 1 : 0);
                const fileSize = (base64Length * 0.75) - padding;

                // Setup Download
                btnDownload.href = dataUrl;
                let origName = currentFile.name.split('.').slice(0, -1).join('.') || 'image';
                btnDownload.download = origName + '_resized.' + ext;
                
                // Show Results
                resultBox.classList.remove('d-none');
                resultStats.innerHTML = `Output: ${targetW}x${targetH} px &nbsp;|&nbsp; Approx Size: ${formatBytes(fileSize)} &nbsp;|&nbsp; Format: ${ext.toUpperCase()}`;
                
                if(window.showToast) showToast('Image processed securely in browser!', 'success');
            } catch (err) {
                if(window.showToast) showToast('Error processing image. It might be too large.', 'error');
                console.error(err);
            } finally {
                btnResize.innerHTML = btnOriginalText;
                btnResize.disabled = false;
            }
        }, 50);
    });

    function formatBytes(bytes, decimals = 2) {
        if (!+bytes) return '0 Bytes';
        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return `${parseFloat((bytes / Math.pow(k, i)).toFixed(dm))} ${sizes[i]}`;
    }
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>