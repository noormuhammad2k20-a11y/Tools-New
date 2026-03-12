<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card shadow-lg border-0 rounded-4 p-4 overflow-hidden">
            <div class="position-absolute top-0 end-0 m-4">
                <span class="badge rounded-pill bg-purple px-3 py-2 shadow-sm" style="font-size: 0.8rem; letter-spacing: 1px; background: #7c3aed;">ULTRA BST PRO</span>
            </div>

            

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border shadow-sm h-100">
                        <h5 class="fw-bold mb-4 d-flex align-items-center">
                            <i class="fa-solid fa-wand-sparkles me-2 text-primary"></i> Story Elements
                        </h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Genre / Mood</label>
                            <input type="text" id="ai-genre" class="form-control" placeholder="e.g. Noir Mystery, High Fantasy, Cyberpunk">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Starting Prompt / Premise</label>
                            <textarea id="ai-prompt" class="form-control" rows="4" placeholder="e.g. A detective who can hear the whispers of ghosts walks into a neon-lit bar..."></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Creative Fluidity</label>
                            <input type="range" class="form-range" id="ai-fluidity" min="0" max="100" value="70">
                            <div class="d-flex justify-content-between small text-muted">
                                <span>Strict</span>
                                <span>Wild</span>
                            </div>
                        </div>

                        <button id="btn-story-generate" class="btn btn-dark w-100 py-3 rounded-pill fw-bold shadow-sm" style="background: #1e1b4b;">
                            Craft Story <i class="fa-solid fa-feather ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="h-100 d-flex flex-column">
                        <div id="ai-loading" class="flex-grow-1 d-none align-items-center justify-content-center flex-column py-5 bg-white border border-dashed rounded-4">
                            <div class="spinner-grow text-primary mb-3" style="width: 3rem; height: 3rem;" role="status"></div>
                            <h6 class="fw-bold mb-1">Spinning Atmospheric Narratives...</h6>
                        </div>

                        <div id="ai-result-container" class="bg-white rounded-4 shadow-sm mb-4 flex-grow-1 border overflow-hidden d-flex flex-column" style="min-height: 450px;">
                            <div class="p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                                <h6 class="fw-bold mb-0">The Manuscript</h6>
                                <button onclick="copyStory()" class="btn btn-sm btn-white border px-3"><i class="fa-solid fa-copy me-1"></i> Copy Story</button>
                            </div>
                            <div id="ai-story-body" class="p-4 flex-grow-1 overflow-auto bg-white font-serif" style="line-height: 2; color: #1e293b; font-size: 1.2rem; font-family: 'Georgia', serif;">
                                <div class="text-center py-5 opacity-25">
                                    <i class="fa-solid fa-pen-nib fa-4x mb-3"></i>
                                    <h5>Your story begins here.</h5>
                                </div>
                            </div>
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
.text-gradient-purple { 
    background: linear-gradient(45deg, #7c3aed, #db2777); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
.btn-white { background: white; color: #1e293b; }
.border-dashed { border-style: dashed !important; border-width: 2px !important; border-color: #e2e8f0 !important; }
</style>

<script>
const genreIn = document.getElementById('ai-genre');
const promptIn = document.getElementById('ai-prompt');
const loading = document.getElementById('ai-loading');
const resultCont = document.getElementById('ai-story-body');
const genBtn = document.getElementById('btn-story-generate');

const STORY_DATA = {
    openers: [
        "The sky over [GENRE] was the color of a bruised plum, hanging heavy with secrets.",
        "It wasn't supposed to end this way, especially not in a place as [GENRE] as this.",
        "Lightning arched across the horizon, illuminating the [GENRE] landscape for a fleeting second."
    ],
    mids: [
        "With a heavy sigh, the protagonist reached for the one thing they swore they'd never use again.",
        "Every step felt like a gamble. In this world, trust was a currency few could afford.",
        "The shadows seemed to stretch of their own accord, whispering names that had been forgotten for centuries."
    ],
    cols: [
        "As the dust settled, only one truth remained: the journey was just beginning.",
        "They looked back one last time, then vanished into the fog, leaving only memories behind.",
        "The cycle had been broken, but the cost had been higher than anyone could have imagined."
    ]
};

async function generateStory() {
    const prompt = promptIn.value.trim();
    if (!prompt) {
        toast('Please enter a story prompt.');
        return;
    }

    loading.classList.remove('d-none');
    loading.classList.add('d-flex');
    resultCont.innerHTML = '';
    
    await new Promise(r => setTimeout(r, 2500));

    loading.classList.remove('d-flex');
    loading.classList.add('d-none');

    const genre = genreIn.value || 'Mystery';
    
    let html = `<p class="mb-4"><i>${STORY_DATA.openers[Math.floor(Math.random()*3)].replace('[GENRE]', genre)}</i></p>`;
    html += `<p class="mb-4">${prompt}</p>`;
    html += `<p class="mb-4">${STORY_DATA.mids[Math.floor(Math.random()*3)]}</p>`;
    html += `<p class="mb-4">${STORY_DATA.cols[Math.floor(Math.random()*3)]}</p>`;

    resultCont.innerHTML = html;
}

function copyStory() {
    navigator.clipboard.writeText(resultCont.innerText);
    toast('Story copied!');
}

genBtn.addEventListener('click', generateStory);

function toast(msg) {
    const t = document.createElement('div');
    t.style.position = 'fixed';
    t.style.bottom = '20px';
    t.style.right = '20px';
    t.style.background = '#7c3aed';
    t.style.color = 'white';
    t.style.padding = '12px 24px';
    t.style.borderRadius = '12px';
    t.style.zIndex = '9999';
    t.textContent = msg;
    document.body.appendChild(t);
    setTimeout(() => t.remove(), 2500);
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>