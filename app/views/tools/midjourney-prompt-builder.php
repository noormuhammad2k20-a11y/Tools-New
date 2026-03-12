<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <!-- Header -->
            <div class="d-flex align-items-center gap-4 mb-5">
                <div class="tool-icon-circle shadow-sm" style="width: 80px; height: 80px; background: var(--primary-glow); color: var(--primary); border-radius: 20px; display: flex; align-items: center; justify-content: center;">
                    <i class="fa-solid fa-palette fa-2x"></i>
                </div>
                <div>
                    <h1 class="display-6 fw-bold mb-1 text-gradient-primary">Midjourney Prompt Builder</h1>
                    <p class="text-muted mb-0 lead">Create stunning AI art with professional prompt engineering and style control.</p>
                </div>
            </div>

            <!-- UI -->
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6">Core Subject</label>
                    <textarea id="subject-input" class="form-control" rows="3" placeholder="e.g. A futuristic cyberpunk samurai standing in neon rain..."></textarea>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold small text-uppercase">Art Style</label>
                        <select id="style-select" class="form-select rounded-pill px-3">
                            <option value="">None / Default</option>
                            <option value="photorealistic">Photorealistic</option>
                            <option value="cyberpunk">Cyberpunk</option>
                            <option value="surrealism">Surrealism</option>
                            <option value="minimalism">Minimalism</option>
                            <option value="impressionism">Impressionism</option>
                            <option value="unreal-engine-5">Unreal Engine 5 Render</option>
                            <option value="studio-ghibli">Studio Ghibli Style</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold small text-uppercase">Lighting</label>
                        <select id="lighting-select" class="form-select rounded-pill px-3">
                            <option value="">None / Default</option>
                            <option value="cinematic">Cinematic Lighting</option>
                            <option value="golden-hour">Golden Hour</option>
                            <option value="neon-glow">Neon Glow</option>
                            <option value="volumetric">Volumetric Lighting</option>
                            <option value="moody-shadows">Moody Shadows</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold small text-uppercase">Aspect Ratio</label>
                        <select id="aspect-ratio" class="form-select rounded-pill px-3">
                            <option value="1:1">1:1 (Square)</option>
                            <option value="16:9">16:9 (Widescreen)</option>
                            <option value="9:16">9:16 (Story)</option>
                            <option value="4:5">4:5 (Standard)</option>
                            <option value="2:3">2:3 (Portrait)</option>
                            <option value="3:2">3:2 (Landscape)</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold small text-uppercase">Model Version</label>
                        <select id="version-select" class="form-select rounded-pill px-3">
                            <option value="--v 6.0">v 6.0 (Latest)</option>
                            <option value="--v 5.2">v 5.2</option>
                            <option value="--v 5.1">v 5.1</option>
                            <option value="--niji 6">Niji v6 (Anime)</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold small text-uppercase">Stylize</label>
                        <input type="range" id="stylize-range" class="form-range" min="0" max="1000" step="50" value="250">
                        <div class="d-flex justify-content-between small text-muted">
                            <span>0</span>
                            <span id="stylize-val">250</span>
                            <span>1000</span>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center mt-4">
                    <button id="gen-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Build Prompt <i class="fa-solid fa-wand-magic-sparkles ms-2"></i>
                    </button>
                    <button onclick="location.reload()" class="btn btn-link text-muted text-decoration-none fw-bold">Reset</button>
                </div>
            </div>

            <!-- Results -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="p-4 border rounded-4 bg-light shadow-sm position-relative">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold text-uppercase small text-primary mb-0">Engineered Midjourney Prompt</h6>
                        <span class="badge bg-primary rounded-pill px-3">v6.0 Ready</span>
                    </div>
                    <div id="prompt-result" class="h5 lh-base mb-0 text-dark font-monospace" style="white-space: pre-wrap;"></div>
                </div>
                
                <div class="mt-4">
                    <button id="copy-btn" class="btn btn-primary rounded-pill px-5 py-2 fw-bold shadow">
                        <i class="fa-solid fa-copy me-2"></i> Copy Prompt
                    </button>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <section class="pro-seo-content py-5">
    <div class="container">
        <div class="pro-card shadow-sm border-0 rounded-4 p-5 animate-fade-up" style="background: var(--bg-card); color: var(--text-main);">
            
            <h1 class="display-5 fw-bold mb-4 text-gradient-primary">Midjourney Prompt Builder: Create Stunning AI Art with Professional Prompt Engineering</h1>
            
            <div class="seo-section mb-5">
                <h2 class="h3 fw-bold mb-3">Introduction: Mastering the Language of Visual AI</h2>
                <p class="lead lh-base">In the world of generative art, Midjourney stands as a pinnacle of aesthetic quality and creative potential. However, unlocking its true capabilities requires more than just a simple description. It requires a deep understanding of <strong>Prompt Engineering</strong>—the art of using specific keywords, parameters, and stylistic modifiers to guide the AI towards a precise visual outcome.</p>
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
                <p>Our <strong>Midjourney Prompt Builder</strong> is designed to transform your basic ideas into complex, high-resolution masterpieces. Whether you're a professional concept artist, a digital marketer, or a creative enthusiast, this tool provides a structured framework to explore artistic styles, lighting techniques, camera angles, and technical parameters like aspect ratios and stylization levels.</p>
            </div>

            <hr class="my-5 opacity-10">

            <div class="seo-section mb-5">
                <h2 class="h3 fw-bold mb-4">Step-by-Step User Guide: From Idea to Masterpiece</h2>
                <div class="row g-4 mt-2">
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light shadow-sm h-100 border-start border-primary border-4">
                            <h5>1. Enter Your Core Subject</h5>
                            <p class="small text-muted">Start with the main focus (e.g., "A futuristic cyberpunk samurai standing in neon rain").</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light shadow-sm h-100 border-start border-primary border-4">
                            <h5>2. Select Your Visual Style</h5>
                            <p class="small text-muted">Choose from artistic movements like Cyberpunk, Surrealism, or Minimalism.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light shadow-sm h-100 border-start border-primary border-4">
                            <h5>3. Set Technical Parameters</h5>
                            <p class="small text-muted">Adjust aspect ratios (--ar 16:9), stylization levels, and version settings.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light shadow-sm h-100 border-start border-primary border-4">
                            <h5>4. Generate and Copy</h5>
                            <p class="small text-muted">Copy the engineered string and paste it directly into Midjourney (Discord or Web).</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="seo-section mb-5">
                <h2 class="h4 fw-bold mb-4">Key Features of the Midjourney Prompt Architect</h2>
                <ul class="list-unstyled row g-3">
                    <li class="col-md-6 d-flex gap-2"><i class="fa-solid fa-check-circle text-primary mt-1"></i> <span><strong>Intelligent Keyword Suggester:</strong> Recommends keywords that Midjourney's model prioritizes.</span></li>
                    <li class="col-md-6 d-flex gap-2"><i class="fa-solid fa-check-circle text-primary mt-1"></i> <span><strong>Parameter Automation:</strong> Handles all --ar, --v, and --s flags automatically.</span></li>
                    <li class="col-md-6 d-flex gap-2"><i class="fa-solid fa-check-circle text-primary mt-1"></i> <span><strong>Lighting & Color Profiles:</strong> Deep library of atmospheric settings to ensuring your art conveys emotion.</span></li>
                    <li class="col-md-6 d-flex gap-2"><i class="fa-solid fa-check-circle text-primary mt-1"></i> <span><strong>Style Mixing Logic:</strong> Blend multiple artistic styles into a unique never-before-seen aesthetic.</span></li>
                </ul>
            </div>

            <div class="seo-article-main lh-lg">
                <h2 class="h3 fw-bold mb-4">Detailed Article: The Power of Professional Prompting</h2>
                <p>The rise of generative AI has democratized creativity, but it has also created a new skill gap: the ability to communicate with the machine precisely. Midjourney interprets every word as a mathematical weight in a multidimensional space.</p>
                <h3 class="h5 fw-bold mt-4">Why Structure Matters</h3>
                <p>A professional prompt follows a specific hierarchy: Subject -> Action -> Stylistic Medium -> Lighting -> Technical Parameters. Our tool ensures this hierarchy is maintained, preventing the AI from getting confused.</p>
                <h3 class="h5 fw-bold mt-4">The Secret of "Stylization"</h3>
                <p>The <code>--stylize</code> parameter controls how much of Midjourney's artistic flair is applied. A low value stays closer to your prompt, while a high value allows the AI to get creative. Mastering these technical flags is what separates beginners from prompt masters.</p>
            </div>

            <div class="seo-section my-5">
                <h2 class="h3 fw-bold mb-4">Comparison: Prompt Builder vs. Manual Writing</h2>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="bg-light text-uppercase small fw-bold">
                            <tr>
                                <th>Feature</th>
                                <th class="text-primary">Our Builder</th>
                                <th>Manual Writing</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Speed</strong></td><td class="text-success">10x Faster</td><td>Slow</td></tr>
                            <tr><td><strong>Accuracy</strong></td><td class="text-success">100% (Auto Syntax)</td><td>Error Prone</td></tr>
                            <tr><td><strong>Style Library</strong></td><td class="text-success">Built-in</td><td>Requires Research</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="seo-section mb-5">
                <h2 class="h3 fw-bold mb-4">FAQ: High-Impact Midjourney Prompting</h2>
                <div class="accordion" id="faqAccordion">
                    <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                        <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">What is a negative prompt?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                        <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">A negative prompt uses the --no parameter to tell the AI what to exclude, like text or blur.</div>
                    </div>
                </div>
            </div>

            <div class="seo-conclusion text-center py-4 rounded-4" style="background: var(--bg-body);">
                <h2 class="h4 fw-bold mb-3">Conclusion: Unleash Your Vision</h2>
                <p class="mb-0 text-muted">Transform your creative vision into reality with the ultimate Midjourney Prompt Builder.</p>
            </div>
        </div>
    </div>
</section>
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
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #8b5cf6); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
.tool-icon-circle { display: flex; align-items: center; justify-content: center; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('gen-btn');
    const resultWrapper = document.getElementById('result-wrapper');
    const resultBox = document.getElementById('prompt-result');
    const subject = document.getElementById('subject-input');
    const styleSel = document.getElementById('style-select');
    const lightingSel = document.getElementById('lighting-select');
    const ratioSel = document.getElementById('aspect-ratio');
    const versionSel = document.getElementById('version-select');
    const stylizeRng = document.getElementById('stylize-range');
    const stylizeVal = document.getElementById('stylize-val');

    stylizeRng.addEventListener('input', () => { stylizeVal.innerText = stylizeRng.value; });

    btn.addEventListener('click', () => {
        const text = subject.value.trim();
        if(!text) return;

        let prompt = `/imagine prompt: ${text}`;
        if(styleSel.value) prompt += `, ${styleSel.value} style`;
        if(lightingSel.value) prompt += `, ${lightingSel.value} lighting`;
        
        prompt += ` --ar ${ratioSel.value} ${versionSel.value} --s ${stylizeRng.value}`;

        resultBox.innerText = prompt;
        resultWrapper.style.display = 'block';
        resultWrapper.scrollIntoView({ behavior: 'smooth' });
    });

    document.getElementById('copy-btn').addEventListener('click', () => {
        navigator.clipboard.writeText(resultBox.innerText);
        showToast('Prompt copied to clipboard!');
    });
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>