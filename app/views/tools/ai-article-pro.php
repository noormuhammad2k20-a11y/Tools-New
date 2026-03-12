<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card shadow-lg border-0 rounded-4 p-4 overflow-hidden">
            <!-- Badge for Pro -->
            <div class="position-absolute top-0 end-0 m-4">
                <span class="badge rounded-pill bg-primary px-3 py-2 shadow-sm" style="font-size: 0.8rem; letter-spacing: 1px;">ULTRA BST PRO</span>
            </div>

            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border shadow-sm h-100">
                        <h5 class="fw-bold mb-4 d-flex align-items-center">
                            <i class="fa-solid fa-sliders me-2 text-primary"></i> Content Strategy
                        </h5>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Target Keywords / Topic</label>
                            <input type="text" id="ai-topic" class="form-control form-control-lg" placeholder="e.g. Benefits of Remote Work for SMEs">
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Tone of Voice</label>
                                <select id="ai-tone" class="form-select">
                                    <option value="professional">Professional</option>
                                    <option value="conversational">Conversational</option>
                                    <option value="persuasive">Persuasive</option>
                                    <option value="journalistic">Journalistic</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Language</label>
                                <select id="ai-lang" class="form-select">
                                    <option value="en">English (US)</option>
                                    <option value="uk">English (UK)</option>
                                    <option value="es">Spanish</option>
                                    <option value="fr">French</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Content Structure</label>
                            <div class="form-check small mb-2">
                                <input class="form-check-input" type="checkbox" checked id="incl-intro">
                                <label class="form-check-label" for="incl-intro">Include Hook &amp; Introduction</label>
                            </div>
                            <div class="form-check small mb-2">
                                <input class="form-check-input" type="checkbox" checked id="incl-sub">
                                <label class="form-check-label" for="incl-sub">Include SEO H2/H3 Headings</label>
                            </div>
                            <div class="form-check small">
                                <input class="form-check-input" type="checkbox" checked id="incl-conc">
                                <label class="form-check-label" for="incl-conc">Include Final Conclusion</label>
                            </div>
                        </div>

                        <button id="btn-pro-generate" class="btn btn-primary w-100 py-3 rounded-pill fw-bold shadow-sm">
                            Generate Pro Draft <i class="fa-solid fa-feather-pointed ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="h-100 d-flex flex-column">
                        <!-- Loading State -->
                        <div id="ai-loading" class="flex-grow-1 d-none align-items-center justify-content-center flex-column py-5 bg-white border border-dashed rounded-4">
                            <div class="spinner-border text-primary mb-3" style="width: 3rem; height: 3rem;" role="status"></div>
                            <h6 class="fw-bold mb-1">Synthesizing High-Quality Content...</h6>
                            <p class="text-muted small">AI is analyzing context and structuring your article.</p>
                        </div>

                        <!-- Result Area -->
                        <div id="ai-result-container" class="bg-white rounded-4 shadow-sm mb-4 flex-grow-1 border overflow-hidden d-flex flex-column" style="min-height: 450px;">
                            <div class="p-4 bg-light border-bottom d-flex justify-content-between align-items-center">
                                <h6 class="fw-bold mb-0">Generated Article Content</h6>
                                <div class="btn-group shadow-sm">
                                    <button onclick="copyArticle()" class="btn btn-sm btn-white border px-3"><i class="fa-solid fa-copy me-1"></i> Copy</button>
                                    <button onclick="downloadArticle()" class="btn btn-sm btn-white border px-3"><i class="fa-solid fa-download me-1"></i> TXT</button>
                                </div>
                            </div>
                            <div id="ai-article-body" class="p-4 flex-grow-1 overflow-auto bg-white" style="line-height: 1.8; color: #1e293b; font-size: 1.1rem;">
                                <!-- Placeholder -->
                                <div class="text-center py-5 opacity-25">
                                    <i class="fa-solid fa-robot fa-4x mb-3"></i>
                                    <h5>Your article will appear here.</h5>
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
.text-gradient-primary { 
    background: linear-gradient(45deg, #2563eb, #7c3aed); 
    -webkit-background-clip: text; 
    -webkit-text-fill-color: transparent; 
}
.bg-white { background-color: #ffffff !important; }
.btn-white { background: white; color: #1e293b; }
.btn-white:hover { background: #f1f5f9; }
.border-dashed { border-style: dashed !important; border-width: 2px !important; border-color: #e2e8f0 !important; }
</style>

<script>
const topicIn = document.getElementById('ai-topic');
const toneIn = document.getElementById('ai-tone');
const langIn = document.getElementById('ai-lang');
const loading = document.getElementById('ai-loading');
const resultCont = document.getElementById('ai-article-body');
const genBtn = document.getElementById('btn-pro-generate');

const AI_MOCK_DATA = {
    intro: [
        "In the rapidly evolving landscape of [TOPIC], one thing remains certain: change is the only constant.",
        "When considering the implications of [TOPIC], we must first understand the fundamental shifts occurring in the industry.",
        "The story of [TOPIC] is not just about technology or trends; it's about the humans behind the innovation."
    ],
    sections: [
        { h: "Understanding the Core Foundations", p: "The primary driver behind [TOPIC] has always been the need for efficiency and scalability. In today's market, this translates to a deeper integration of [TONE] methodologies." },
        { h: "The Impact on Global Workforces", p: "As [TOPIC] becomes a staple of modern workflows, we are seeing a significant shift in how professionals interact with their tools." },
        { h: "Key Strategies for Success", p: "To truly master [TOPIC], organizations must focus on three core pillars: adaptability, precision, and human-centric design." }
    ],
    conclusion: "In summary, while [TOPIC] presents challenges, the opportunities for growth and innovation far outweigh the risks. By staying informed and agile, you can leverage these trends for long-term success."
};

async function generateArticle() {
    const topic = topicIn.value.trim();
    if (!topic) {
        toast('Please enter a topic first.');
        return;
    }

    loading.classList.remove('d-none');
    loading.classList.add('d-flex');
    resultCont.innerHTML = '';
    
    // Simulate thinking
    await new Promise(r => setTimeout(r, 2000));

    loading.classList.remove('d-flex');
    loading.classList.add('d-none');

    const tone = toneIn.value;
    const inclIntro = document.getElementById('incl-intro').checked;
    const inclSub = document.getElementById('incl-sub').checked;
    const inclConc = document.getElementById('incl-conc').checked;

    let html = `<h4>${topic}</h4>`;
    
    if (inclIntro) {
        const intro = AI_MOCK_DATA.intro[Math.floor(Math.random() * AI_MOCK_DATA.intro.length)].replace('[TOPIC]', topic).replace('[TONE]', tone);
        html += `<p class="mb-4">${intro}</p>`;
    }

    if (inclSub) {
        AI_MOCK_DATA.sections.forEach(s => {
            html += `<h5 class="fw-bold mt-4">${s.h}</h5>`;
            html += `<p class="mb-3">${s.p.replace('[TOPIC]', topic).replace('[TONE]', tone)}</p>`;
        });
    }

    if (inclConc) {
        html += `<h5 class="fw-bold mt-4">Conclusion</h5>`;
        html += `<p>${AI_MOCK_DATA.conclusion.replace('[TOPIC]', topic)}</p>`;
    }

    resultCont.innerHTML = html;
    toast('Article generated successfully!');
}

function copyArticle() {
    const text = resultCont.innerText;
    if(!text.trim()) return;
    navigator.clipboard.writeText(text);
    toast('Article copied to clipboard!');
}

function downloadArticle() {
    const text = resultCont.innerText;
    if(!text.trim()) return;
    const blob = new Blob([text], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `${topicIn.value || 'ai-article'}.txt`;
    a.click();
}

genBtn.addEventListener('click', generateArticle);

function toast(msg) {
    // Simple alert-based toast if no global toast system exists
    const t = document.createElement('div');
    t.style.position = 'fixed';
    t.style.bottom = '20px';
    t.style.right = '20px';
    t.style.background = '#2563eb';
    t.style.color = 'white';
    t.style.padding = '12px 24px';
    t.style.borderRadius = '12px';
    t.style.zIndex = '9999';
    t.style.boxShadow = '0 10px 15px rgba(0,0,0,0.1)';
    t.textContent = msg;
    document.body.appendChild(t);
    setTimeout(() => t.remove(), 3000);
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>