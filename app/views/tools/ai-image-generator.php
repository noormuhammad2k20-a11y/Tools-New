<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border">
                        <div class="mb-4">
                            <label class="form-label fw-bold small">Describe your image</label>
                            <textarea id="prompt-input" class="form-control" rows="5" placeholder="A futuristic city at sunset, cyberpunk style, high detail, cinematic lighting..."></textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold small">Aspect Ratio</label>
                            <div class="row g-2">
                                <div class="col-4">
                                    <input type="radio" class="btn-check" name="ratio" id="r-sq" value="1024x1024" checked>
                                    <label class="btn btn-outline-primary w-100 rounded-3" for="r-sq">Square</label>
                                </div>
                                <div class="col-4">
                                    <input type="radio" class="btn-check" name="ratio" id="r-wide" value="1280x720">
                                    <label class="btn btn-outline-primary w-100 rounded-3" for="r-wide">Wide</label>
                                </div>
                                <div class="col-4">
                                    <input type="radio" class="btn-check" name="ratio" id="r-tall" value="720x1280">
                                    <label class="btn btn-outline-primary w-100 rounded-3" for="r-tall">Tall</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid shadow-premium">
                            <button id="gen-btn" class="btn btn-primary btn-lg rounded-pill fw-bold">
                                Generate Art <i class="fa-solid fa-bolt ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="pro-card shadow-none border bg-white h-100 text-center d-flex flex-column justify-content-center p-0 overflow-hidden position-relative" style="min-height: 480px;">
                        <div id="gen-overlay" class="position-absolute w-100 h-100 bg-white d-flex flex-column align-items-center justify-content-center d-none" style="z-index: 5; opacity: 0.9;">
                             <div class="premium-spinner mb-3" style="width: 50px; height: 50px;"></div>
                             <p class="fw-bold text-primary mb-0">Generating your masterpiece...</p>
                        </div>
                        
                        <img id="result-img" class="img-fluid d-none" style="width: 100%; height: 100%; object-fit: contain;">
                        
                        <div id="placeholder" class="p-4">
                            <i class="fa-solid fa-wand-magic fa-5x mb-3 text-muted opacity-25"></i>
                            <p class="text-muted mb-0 fw-bold">Visualized prompt will appear here</p>
                            <p class="small text-muted opacity-50">Powered by Pollinations AI</p>
                        </div>
                        
                        <div id="result-actions" class="position-absolute bottom-0 end-0 p-3 d-none">
                            <button class="btn btn-light shadow-sm rounded-pill fw-bold" onclick="downloadImg()">
                                <i class="fa-solid fa-download me-1"></i> Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            <h1 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">AI Image & Art Generator: Transform Words into Visual Masterpieces Instantly</h1>
            
            <div class="seo-section mb-5">
                <h2 class="h3 fw-bold mb-3">Introduction: The New Era of Digital Creativity</h2>
                <p class="lead lh-base">In the age of Artificial Intelligence, the boundary between imagination and reality is dissolving. Our <strong>AI Image & Art Generator</strong> leverages the power of advanced diffusion models to translate your textual descriptions into high-resolution, professional-grade artwork in seconds.</p>
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
                <p>Whether you are looking for a photorealistic landscape, a vibrant cyberpunk city, or a sleek logo concept, this tool understands the nuances of style, lighting, and composition. It is designed for creators who need high-impact visuals without the traditional overhead. Just describe what you see in your mind, and watch as our AI brings it to life with stunning clarity and artistic depth.</p>
            </div>

            <hr class="my-5 opacity-10">

            <div class="seo-section mb-5">
                <h2 class="h3 fw-bold mb-4">Step-by-Step User Guide: How to Generate AI Art Like a Pro</h2>
                <div class="row g-4 mt-2">
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light shadow-sm h-100 border-start border-primary border-4">
                            <h5>1. Craft Your Prompt</h5>
                            <p class="small text-muted">Start with a clear subject followed by descriptive modifiers (e.g., "snow-capped mountain at sunrise, cinematic lighting").</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light shadow-sm h-100 border-start border-primary border-4">
                            <h5>2. Select Aspect Ratio</h5>
                            <p class="small text-muted">Choose Square (1:1), Wide (16:9), or Tall (9:16) to fit your specific platform needs.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light shadow-sm h-100 border-start border-primary border-4">
                            <h5>3. Generate & Refine</h5>
                            <p class="small text-muted">Hit Generate and watch the magic happen. Not perfect? Add words like "unreal engine 5" to change the style.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light shadow-sm h-100 border-start border-primary border-4">
                            <h5>4. Download & Share</h5>
                            <p class="small text-muted">Once satisfied, download your high-resolution JPG file instantly with one click.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="seo-section mb-5">
                <h2 class="h4 fw-bold mb-4">Key Features of the AI Art Production Suite</h2>
                <ul class="list-unstyled row g-3">
                    <li class="col-md-6 d-flex gap-2">
                        <i class="fa-solid fa-bolt text-primary mt-1"></i>
                        <span><strong>High-Fidelity Rendering:</strong> Generates crisp details and vibrant colors suitable for professional use.</span>
                    </li>
                    <li class="col-md-6 d-flex gap-2">
                        <i class="fa-solid fa-bolt text-primary mt-1"></i>
                        <span><strong>Dynamic Style Interpreting:</strong> Understands a massive library of artistic movements from Renaissance to Solarpunk.</span>
                    </li>
                    <li class="col-md-6 d-flex gap-2">
                        <i class="fa-solid fa-bolt text-primary mt-1"></i>
                        <span><strong>No-Logo Clean Output:</strong> Provides professional images without any intrusive watermarks.</span>
                    </li>
                    <li class="col-md-6 d-flex gap-2">
                        <i class="fa-solid fa-bolt text-primary mt-1"></i>
                        <span><strong>High-Speed Processing:</strong> Leveraging optimized API calls to ensure you get your results in seconds.</span>
                    </li>
                </ul>
            </div>

            <div class="seo-article-main lh-lg">
                <h2 class="h3 fw-bold mb-4">Detailed Article: The Technology and Artistry Behind AI Art</h2>
                <p>Artificial Intelligence has fundamentally changed how we perceive visual media. At the heart of our generator is a process known as <strong>Latent Diffusion</strong>. This doesn't just "search" for an image; it literally builds one from a field of random noise based on the linguistic structure of your prompt.</p>

                <h3 class="h5 fw-bold mt-4">Mastering the "Art of the Prompt"</h3>
                <p>Prompting is the new coding. To get professional results, you must think like a director. Consider medium, lighting, lens, and vibe. By combining these elements, you move from being a user to being a creator.</p>

                <h3 class="h5 fw-bold mt-4">Artistic Diversity: From Picasso to Pixar</h3>
                <p>One of the most powerful aspects of our generator is its stylistic range. You can request an image in the style of Van Gogh and immediately follow up with a request for a Pixar-style 3D animation. This versatility allows for unprecedented experimentation.</p>
            </div>

            <div class="seo-section my-5">
                <h2 class="h3 fw-bold mb-4">Comparison: AI Generated Art vs. Stock Photography</h2>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="bg-light">
                            <tr>
                                <th>Feature</th>
                                <th class="text-primary">Our AI Art Generator</th>
                                <th>Traditional Stock Photo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Originality</strong></td>
                                <td class="text-success">100% Unique</td>
                                <td>Used by Millions</td>
                            </tr>
                            <tr>
                                <td><strong>Customization</strong></td>
                                <td class="text-success">Infinite</td>
                                <td>Zero</td>
                            </tr>
                            <tr>
                                <td><strong>Price</strong></td>
                                <td class="text-success">Free / Instant</td>
                                <td>Often Expensive</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="seo-section mb-5">
                <h2 class="h3 fw-bold mb-4">FAQ: Common Questions About AI Art Generation</h2>
                <div class="accordion" id="imageFaq">
                    <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                        <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">
                                Does the AI copy other artists' work?
                            <span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                        <div id="imgfaq1" class="accordion-collapse collapse show" data-bs-parent="#imageFaq">
                            <div class="accordion-body text-muted">No. The AI creates entirely new pixel arrangements from scratch based on learned concepts.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="seo-conclusion text-center py-4 rounded-4" style="background: var(--bg-body);">
                <h2 class="h4 fw-bold mb-3">Conclusion: Empower Your Imagination Today</h2>
                <p class="mb-0 text-muted">Generate your first masterpiece now and see the future of digital art!</p>
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
.bg-primary-soft { background-color: rgba(37, 99, 235, 0.05); }
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
.tool-icon-circle {
    display: flex;
    align-items: center;
    justify-content: center;
}
.premium-spinner {
    border: 4px solid #f3f3f3;
    border-top: 4px solid var(--primary);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}
@keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
</style>



<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>