<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <!-- UI -->
        <div id="tool-ui" class="space-y-6">
            <div class="space-y-2">
                <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Your Simple Idea</label>
                <textarea id="idea-input" 
                    class="w-full p-6 bg-gray-50 border border-gray-100 rounded-3xl font-medium text-gray-700 focus:ring-4 focus:ring-primary/5 focus:border-primary outline-none transition-all resize-none shadow-inner h-[160px]" 
                    placeholder="e.g. A cat in a space suit exploring Mars..."></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Model Target</label>
                    <select id="type-select" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700 outline-none focus:ring-4 focus:ring-primary/5 transition-all">
                        <option value="image">Image Model (Midjourney/DALL-E)</option>
                        <option value="text">Text Model (ChatGPT/Claude)</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-4 pt-2">
                <button id="gen-btn" class="w-full sm:w-auto px-10 py-4 bg-primary text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-wand-sparkles"></i>
                    Expand Prompt
                </button>
                <button onclick="location.reload()" class="text-sm font-bold text-gray-400 hover:text-gray-600 uppercase tracking-widest transition-colors">Reset</button>
            </div>
        </div>

        <!-- Loading -->
        <div id="ai-loading" class="hidden py-24 text-center space-y-6">
            <div class="relative w-20 h-20 mx-auto">
                <div class="absolute inset-0 bg-primary/20 rounded-full animate-ping"></div>
                <div class="relative w-20 h-20 bg-white border-4 border-primary border-t-transparent rounded-full animate-spin flex items-center justify-center">
                    <i class="fa-solid fa-rocket text-primary text-xl"></i>
                </div>
            </div>
            <div>
                <h3 class="text-xl font-black text-gray-900 uppercase tracking-tight">Enhancing Prompt</h3>
                <p class="text-sm text-gray-500">Adding technical depth and artistic modifiers...</p>
            </div>
        </div>

        <!-- Results -->
        <div id="result-wrapper" class="hidden mt-10 pt-10 border-t border-gray-100 space-y-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="text-xl font-black text-gray-900 uppercase tracking-tight">Professional AI Prompt</h3>
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mt-1">Ready to use</p>
                </div>
                <button id="copy-btn" class="w-full sm:w-auto px-8 py-4 bg-primary text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-[1.05] transition-all">
                    <i class="fa-solid fa-copy me-2"></i> Copy Prompt
                </button>
            </div>
            <div id="prompt-result" class="p-8 bg-gray-50 border border-gray-100 rounded-3xl text-gray-700 text-lg leading-relaxed font-serif whitespace-pre-wrap min-h-[200px]"></div>
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
            
            <h1 class="display-5 fw-bold mb-4 text-gradient-primary">ChatGPT Mega-Prompt Generator: Master the Art of Professional AI Prompt Engineering</h1>
            
            <div class="seo-section mb-5">
                <h2 class="h3 fw-bold mb-3">Introduction: Why Your Prompts Are the Key to Excellence</h2>
                <p class="lead lh-base">In the rapidly evolving world of Generative AI, the quality of the output you receive is directly proportional to the quality of the instructions you provide. Most users treat AI like a simple search engine, resulting in generic and often unhelpful responses. However, to unlock the true power of Large Language Models (LLMs), you need <strong>Mega-Prompts</strong>—highly structured, context-rich frameworks that guide the AI through complex logic, specific personas, and precise output formats.</p>
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
                <p>Our <strong>ChatGPT Mega-Prompt Generator</strong> is a professional-grade architect for your AI interactions. It eliminates the guesswork and "trial-and-error" of prompt engineering by automatically constructing comprehensive prompt structures based on proven frameworks. Whether you're designing a complex business strategy or a detailed software architecture, this tool ensures that ChatGPT understands not just <em>what</em> to do, but <em>how</em> to do it at an expert level.</p>
            </div>

            <hr class="my-5 opacity-10">

            <div class="seo-section mb-5">
                <h2 class="h3 fw-bold mb-4">Step-by-Step User Guide: Building the Ultimate AI Instruction Set</h2>
                <p>Creating high-impact mega-prompts is a simple, structured journey through our interface:</p>
                <div class="row g-4 mt-2">
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light border-start border-primary border-4 h-100">
                            <h5 class="fw-bold">1. Define Your Goal</h5>
                            <p class="mb-0 small text-muted">Start by entering your primary objective in the "Role/Context" field. Tell the AI who it should be (e.g., "Senior Python Security Expert").</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light border-start border-primary border-4 h-100">
                            <h5 class="fw-bold">2. Add Domain Knowledge</h5>
                            <p class="mb-0 small text-muted">Provide specific details about your project, target audience, and any constraints. The more data, the more tailored the prompt.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light border-start border-primary border-4 h-100">
                            <h5 class="fw-bold">3. Generate the Mega-Prompt</h5>
                            <p class="mb-0 small text-muted">Click "Build Mega-Prompt." Our engine will weave your inputs into a multi-layered instruction set containing persona and task context.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light border-start border-primary border-4 h-100">
                            <h5 class="fw-bold">4. Copy and Deploy</h5>
                            <p class="mb-0 small text-muted">Copy the generated text and paste it into ChatGPT, Claude, or Gemini. Watch as the AI delivers results that are 10x more relevant.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="seo-section mb-5">
                <h2 class="h4 fw-bold mb-4">Key Features of the Mega-Prompt Builder Engine</h2>
                <ul class="list-unstyled row g-3">
                    <li class="col-md-6 d-flex gap-2">
                        <i class="fa-solid fa-circle-check text-primary mt-1"></i>
                        <span><strong>Persona Injection Logic:</strong> Assigns a "Mastery" level persona to ensure the AI uses high-level professional logic.</span>
                    </li>
                    <li class="col-md-6 d-flex gap-2">
                        <i class="fa-solid fa-circle-check text-primary mt-1"></i>
                        <span><strong>Step-by-Step Chain-of-Thought:</strong> Embeds logical steps in the prompt to force the AI to think through problems deeply.</span>
                    </li>
                    <li class="col-md-6 d-flex gap-2">
                        <i class="fa-solid fa-circle-check text-primary mt-1"></i>
                        <span><strong>Structured Output Formatting:</strong> Includes clear instructions for markdown tables, JSON, or lists for actionable results.</span>
                    </li>
                    <li class="col-md-6 d-flex gap-2">
                        <i class="fa-solid fa-circle-check text-primary mt-1"></i>
                        <span><strong>Constraint-Based Fine Tuning:</strong> Sets "negative prompts" to avoid common hallucinations or clichés.</span>
                    </li>
                    <li class="col-md-6 d-flex gap-2">
                        <i class="fa-solid fa-circle-check text-primary mt-1"></i>
                        <span><strong>Contextual Scaffolding:</strong> Organizes messy ideas into a coherent hierarchy for maximum processing efficiency.</span>
                    </li>
                    <li class="col-md-6 d-flex gap-2">
                        <i class="fa-solid fa-circle-check text-primary mt-1"></i>
                        <span><strong>Multi-Model Compatibility:</strong> Optimized for ChatGPT (GPT-4), Claude 3.5 Sonnet, and Google Gemini Pro 1.5.</span>
                    </li>
                </ul>
            </div>

            <div class="seo-article-main lh-lg">
                <h2 class="h3 fw-bold mb-4">Detailed Article: The Science of Prompt Engineering — Moving Beyond "Just Asking"</h2>
                <p>Large Language Models are like highly talented but sometimes literal-minded interns. If you give them a vague task, you'll get a vague result. Mega-Prompting is the process of providing the "Working Memory" the AI needs to succeed.</p>

                <h3 class="h5 fw-bold mt-4">The Problem with Zero-Shot Prompting</h3>
                <p>"Zero-shot" is when you ask a question with no context. The AI has to guess everything—the tone, length, and audience. Mega-prompting shifts this to <strong>Full-Spectrum Prompting</strong>, where every variable is defined before the AI begins its generation.</p>

                <h3 class="h5 fw-bold mt-4">The Power of "System Instructions"</h3>
                <p>Professional prompt engineering treats the first message as a "System Override." You aren't just chatting; you are <em>configuring</em> a biological-like machine. By defining a persona, you activate specific regions of the model's training data.</p>

                <h3 class="h5 fw-bold mt-4">Incorporating "Few-Shot" Examples</h3>
                <p>The most effective mega-prompts include examples of what "Great" looks like. Our generator allows you to include "Example Output" structures, which the AI uses as a template for its own response.</p>

                <h3 class="h5 fw-bold mt-4">The Role of "Recursive Improvement"</h3>
                <p>A truly "Mega" prompt includes instructions for the AI to critique its own work. We include "self-correction" loops in our advanced templates, forcing the AI to review its draft against your constraints.</p>

                <h3 class="h5 fw-bold mt-4">Why Structure Matters</h3>
                <p>LLMs are mathematical engines. While being polite is fine, what matters is <strong>Clarity and Hierarchy</strong>. Our Mega-Prompt Generator prioritizes clear headings because the AI's attention mechanism focuses on structured delimiters.</p>

                <h3 class="h5 fw-bold mt-4">Future-Proofing for GPT-5 and Beyond</h3>
                <p>As models become more capable, they become more sensitive to subtle nuances. Mastering mega-prompts today prepares you for the next generation of AI agents—tools that won't just write text, but will perform multi-step actions.</p>
            </div>

            <div class="seo-section my-5">
                <h2 class="h3 fw-bold mb-4">Comparison: Mega-Prompting vs. Basic Chatting</h2>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="bg-light">
                            <tr>
                                <th>Feature</th>
                                <th class="text-primary">ChatGPT Mega-Prompt</th>
                                <th>Standard Prompt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Context Depth</strong></td>
                                <td class="text-success">Multi-Layered</td>
                                <td>Surface-Level</td>
                            </tr>
                            <tr>
                                <td><strong>Output Format</strong></td>
                                <td class="text-success">Precisely Defined</td>
                                <td>Random/Generative</td>
                            </tr>
                            <tr>
                                <td><strong>Logic Chain</strong></td>
                                <td class="text-success">Step-by-Step</td>
                                <td>Direct/Binary</td>
                            </tr>
                            <tr>
                                <td><strong>Accuracy</strong></td>
                                <td class="text-success">High (Reduced Hallucination)</td>
                                <td>Variable</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="seo-section mb-5">
                <h2 class="h3 fw-bold mb-4">FAQ Section: Perfecting Your Prompt Strategy</h2>
                <div class="accordion" id="seoFaq">
                    <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                        <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">
                                1. Is this compatible with Claude and Gemini?
                            <span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                        <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">
                                Yes. The logic used in our Mega-Prompts is based on generalized LLM principles that work exceptionally well across all top-tier models.
                            </div>
                    </div>
                    <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                        <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">
                                2. Will a long prompt use more tokens?
                            <span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                        <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">
                                Yes, but the efficiency gain is worth it. A 500-token mega-prompt that gets the job done right the first time is cheaper than endless follow-ups.
                            </div>
                    </div>
                    <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                        <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">
                                3. How specific should my role description be?
                            <span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                        <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">
                                The more specific, the better. Instead of "Marketing Expert," try "Direct-Response Copywriter specializing in SaaS email sequences."
                            </div>
                    </div>
                </div>
            </div>

            <div class="seo-conclusion text-center py-4 rounded-4" style="background: var(--bg-body);">
                <h2 class="h4 fw-bold mb-3">Conclusion: Unleash the Full Potential of Artificial Intelligence</h2>
                <p class="mb-0 text-muted">Master the bridge between AI as a toy and AI as a professional powerhouse. Build your first Mega-Prompt right now!</p>
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
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('gen-btn');
        const loading = document.getElementById('ai-loading');
        const ui = document.getElementById('tool-ui');
        const ideaInput = document.getElementById('idea-input');
        const typeSelect = document.getElementById('type-select');
        const resultWrapper = document.getElementById('result-wrapper');
        const resultBox = document.getElementById('prompt-result');

            btn.addEventListener('click', async () => {
                const idea = ideaInput.value.trim();
                if(!idea) return;

                loading.classList.remove('hidden');
                ui.classList.add('hidden');
                resultWrapper.classList.add('hidden');

                setTimeout(() => {
                    const prompt = AITools.generatePrompt(idea, typeSelect.value);
                    resultBox.innerText = prompt;
                    loading.classList.add('hidden');
                    resultWrapper.classList.remove('hidden');
                    resultWrapper.scrollIntoView({ behavior: 'smooth' });
                    ui.classList.remove('hidden');
                }, 800);
            });

            document.getElementById('copy-btn').addEventListener('click', () => {
                navigator.clipboard.writeText(resultBox.innerText);
                const originalText = document.getElementById('copy-btn').innerHTML;
                document.getElementById('copy-btn').innerHTML = '<i class="fa-solid fa-check me-2"></i> Copied!';
                setTimeout(() => document.getElementById('copy-btn').innerHTML = originalText, 2000);
            });
    });
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>