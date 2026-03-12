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
                    <i class="fa-solid fa-code fa-2x"></i>
                </div>
                <div>
                    <h1 class="display-6 fw-bold mb-1 text-gradient-primary"><?php echo $tool['title']; ?></h1>
                    <p class="text-muted mb-0 lead"><?php echo $tool['desc']; ?></p>
                </div>
            </div>

            <!-- UI -->
            <div id="tool-ui">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold h6">Paste your code (JS, Python, PHP, etc.)</label>
                    <textarea id="code-input" class="form-control font-monospace" rows="10" placeholder="function hello() { console.log('world'); }"></textarea>
                </div>

                <div class="d-grid gap-3 d-md-flex align-items-center mt-4">
                    <button id="gen-btn" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow">
                        Explain & Optimize <i class="fa-solid fa-wand-magic-sparkles ms-2"></i>
                    </button>
                    <button onclick="location.reload()" class="btn btn-link text-muted text-decoration-none fw-bold">Reset</button>
                </div>
            </div>

            <!-- Loading -->
            <div id="ai-loading" class="text-center py-5" style="display: none;">
                <div class="spinner-grow text-primary mb-4" style="width: 3rem; height: 3rem;" role="status"></div>
                <h5 class="fw-bold">Analyzing Syntax...</h5>
                <p class="text-muted">Deciphering logic patterns and identifying optimization bottlenecks.</p>
            </div>

            <!-- Results -->
            <div id="result-wrapper" class="mt-5 pt-4 border-top" style="display: none;">
                <div class="row g-4">
                    <div class="col-md-7">
                        <div class="p-4 border rounded-4 bg-light shadow-sm h-100">
                            <h5 class="fw-bold mb-3 text-primary text-uppercase small">Plain English Explanation</h5>
                            <div id="explain-result" class="lh-lg mb-0" style="white-space: pre-wrap;"></div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="p-4 border rounded-4 bg-primary-soft shadow-sm h-100">
                            <h5 class="fw-bold mb-3 text-primary">Performance Tips</h5>
                            <div id="tips-result" class="small lh-base mb-0"></div>
                        </div>
                    </div>
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
            
            <h1 class="display-5 fw-bold mb-4 text-gradient-primary">AI Code Explainer & Generator: Master Any Programming Language Faster</h1>
            
            <div class="seo-section mb-5">
                <h2 class="h3 fw-bold mb-3">Introduction: Demystifying the Architecture of Software</h2>
                <p class="lead lh-base">In the fast-paced world of software development, the ability to read and write code efficiently is the most valuable skill you can possess. Our <strong>AI Code Explainer & Generator</strong> is a powerful bridge between confusion and clarity.</p>
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
                <p>Powered by advanced Large Language Models, this tool serves as your personal technical mentor. Whether you need to understand a cryptic REGEX pattern, refactor a messy Python function, or generate a complete React component from scratch, our AI provides instantaneous insights. Stop getting stuck on syntax and start focusing on logic and architecture.</p>
            </div>

            <hr class="my-5 opacity-10">

            <div class="seo-section mb-5">
                <h2 class="h3 fw-bold mb-4">Step-by-Step User Guide: How to Explain & Generate Code</h2>
                <div class="row g-4 mt-2">
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light shadow-sm h-100 border-start border-primary border-4">
                            <h5>1. Input Your Code</h5>
                            <p class="small text-muted">Paste the snippet you're struggling with into the editor or type a natural language prompt.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light shadow-sm h-100 border-start border-primary border-4">
                            <h5>2. Select Your Language</h5>
                            <p class="small text-muted">Specify the programming language (Python, JS, PHP, etc.) for high contextual accuracy.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light shadow-sm h-100 border-start border-primary border-4">
                            <h5>3. Analyze Output</h5>
                            <p class="small text-muted">Receive a line-by-line breakdown, a logic summary, and suggestions for optimization.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light shadow-sm h-100 border-start border-primary border-4">
                            <h5>4. Copy & Implement</h5>
                            <p class="small text-muted">One-click copy the high-quality, documented code directly into your IDE.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="seo-section mb-5">
                <h2 class="h4 fw-bold mb-4">Key Features of the AI Development Hub</h2>
                <ul class="list-unstyled row g-3">
                    <li class="col-md-6 d-flex gap-2"><i class="fa-solid fa-code-commit text-primary mt-1"></i> <span><strong>Multi-Language Proficiency:</strong> Expert understanding of 50+ languages and frameworks.</span></li>
                    <li class="col-md-6 d-flex gap-2"><i class="fa-solid fa-code-commit text-primary mt-1"></i> <span><strong>Logic Breakdown:</strong> Deciphers complex nested loops and asynchronous patterns into plain English.</span></li>
                    <li class="col-md-6 d-flex gap-2"><i class="fa-solid fa-code-commit text-primary mt-1"></i> <span><strong>Security Detection:</strong> Identifies potential risks like SQL injection or vulnerable patterns.</span></li>
                    <li class="col-md-6 d-flex gap-2"><i class="fa-solid fa-code-commit text-primary mt-1"></i> <span><strong>Modernization Suggester:</strong> Offers suggestions to update legacy code to modern standards.</span></li>
                </ul>
            </div>

            <div class="seo-article-main lh-lg">
                <h2 class="h3 fw-bold mb-4">Detailed Article: The Rise of AI-Assisted Development</h2>
                <p>The role of the software developer is shifting from Syntactician to Architect. As tools like ours become more prevalent, the bottleneck is no longer how fast you can type semicolons, but how well you can design systems.</p>
                <h3 class="h5 fw-bold mt-4">Understanding Intent</h3>
                <p>Our engine uses specialized models fine-tuned on high-quality repositories. It doesn't just guess; it understands the intent behind common programming patterns, identifying what a loop is trying to achieve even with unhelpful variable names.</p>
                <h3 class="h5 fw-bold mt-4">Education Through Explanation</h3>
                <p>One of the biggest problems with copy-pasting code is not learning why it works. Our Explainer changes that by providing a technical narrative, ensuring you gain knowledge with every interaction.</p>
            </div>

            <div class="seo-section my-5">
                <h2 class="h3 fw-bold mb-4">Comparison: AI Code Assistance vs. Traditional Research</h2>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="bg-light">
                            <tr>
                                <th>Feature</th>
                                <th class="text-primary">AI Code Explainer</th>
                                <th>Searching Docs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td><strong>Response Time</strong></td><td class="text-success">&lt; 1 Second</td><td>5-15 Minutes</td></tr>
                            <tr><td><strong>Logic Explanation</strong></td><td class="text-success">Contextual</td><td>Generic</td></tr>
                            <tr><td><strong>Bug Detection</strong></td><td class="text-success">Proactive</td><td>Manual</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="seo-section mb-5">
                <h2 class="h3 fw-bold mb-4">FAQ: Maximizing Your Coding Efficiency</h2>
                <div class="accordion" id="codeFaq">
                    <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                        <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">Is the AI-generated code safe?<span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                        <div id="cq1" class="accordion-collapse collapse show" data-bs-parent="#codeFaq">
                            <div class="accordion-body text-muted">Treat the AI as a very smart collaborator. We always recommend reviewing code before deploying to production.</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="seo-conclusion text-center py-4 rounded-4" style="background: var(--bg-body);">
                <h2 class="h4 fw-bold mb-3">Conclusion: Code Smarter, Build Faster, Learn Daily</h2>
                <p class="mb-0 text-muted">Step into the future of programming with an AI mentor in your corner. Start coding with confidence!</p>
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
.font-monospace { font-family: 'Fira Code', 'Courier New', monospace; font-size: 0.9rem; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('gen-btn');
        const loading = document.getElementById('ai-loading');
        const ui = document.getElementById('tool-ui');
        const codeInput = document.getElementById('code-input');
        const resultWrapper = document.getElementById('result-wrapper');
        const explainBox = document.getElementById('explain-result');
        const tipsBox = document.getElementById('tips-result');

        btn.addEventListener('click', async () => {
            const code = codeInput.value.trim();
            if(!code) return;

            loading.style.display = 'block';
            ui.style.display = 'none';
            resultWrapper.style.display = 'none';

            setTimeout(() => {
                const res = AITools.explainCode(code);
                explainBox.innerText = res.explanation;
                tipsBox.innerHTML = `<ul>${res.tips.map(t => `<li class="mb-2">${t}</li>`).join('')}</ul>`;

                loading.style.display = 'none';
                resultWrapper.style.display = 'block';
                resultWrapper.scrollIntoView({ behavior: 'smooth' });
                ui.style.display = 'block';
            }, 1200);
        });
    });
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>