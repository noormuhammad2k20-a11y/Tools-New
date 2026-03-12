<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <!-- UI -->
        <div id="tool-ui" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2 space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Video Title or Topic</label>
                    <input type="text" id="topic-input" 
                        class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-medium text-gray-700 focus:ring-4 focus:ring-primary/5 focus:border-primary outline-none transition-all" 
                        placeholder="e.g. 10 Life Hacks for Web Developers...">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">Target Duration</label>
                    <select id="duration-select" class="w-full p-4 bg-gray-50 border border-gray-100 rounded-2xl font-bold text-gray-700 outline-none focus:ring-4 focus:ring-primary/5 transition-all">
                        <option value="shorts">Shorts (60s)</option>
                        <option value="5min" selected>Standard (5-8 min)</option>
                        <option value="15min">In-depth (15+ min)</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-4 pt-2">
                <button id="gen-btn" class="w-full sm:w-auto px-10 py-4 bg-primary text-white rounded-2xl font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                    <i class="fa-solid fa-clapperboard"></i>
                    Generate Script
                </button>
                <button onclick="location.reload()" class="text-sm font-bold text-gray-400 hover:text-gray-600 uppercase tracking-widest transition-colors">Reset</button>
                <div class="sm:ml-auto flex items-center gap-2 px-4 py-2 bg-primary/5 rounded-xl border border-primary/10">
                    <i class="fa-solid fa-bolt text-primary text-xs"></i>
                    <span class="text-[10px] font-black text-primary uppercase tracking-widest">AI Script Wizard</span>
                </div>
            </div>
        </div>

        <!-- Loading -->
        <div id="ai-loading" class="hidden py-24 text-center space-y-6">
            <div class="relative w-20 h-20 mx-auto">
                <div class="absolute inset-0 bg-primary/20 rounded-full animate-ping"></div>
                <div class="relative w-20 h-20 bg-white border-4 border-primary border-t-transparent rounded-full animate-spin flex items-center justify-center">
                    <i class="fa-solid fa-film text-primary text-xl"></i>
                </div>
            </div>
            <div>
                <h3 class="text-xl font-black text-gray-900 uppercase tracking-tight">Structuring Your Video</h3>
                <p class="text-sm text-gray-500">Crafting hooks, body sections, and CTAs...</p>
            </div>
        </div>

        <!-- Results -->
        <div id="result-wrapper" class="hidden mt-10 pt-10 border-t border-gray-100 space-y-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h3 class="text-xl font-black text-gray-900 uppercase tracking-tight">Generated YouTube Script</h3>
                    <p class="text-xs text-gray-400 font-bold uppercase tracking-widest mt-1">Ready for production</p>
                </div>
                <div class="flex gap-2 w-full sm:w-auto">
                    <button id="copy-btn" class="flex-1 sm:flex-none px-8 py-4 bg-primary text-white rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl shadow-primary/20 hover:scale-[1.05] transition-all">
                        <i class="fa-solid fa-copy me-2"></i> Copy Script
                    </button>
                </div>
            </div>
            <div id="script-result" class="p-8 bg-gray-50 border border-gray-100 rounded-3xl text-gray-700 text-lg leading-relaxed font-serif whitespace-pre-wrap min-h-[400px]"></div>
        </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            <h1 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Professional AI YouTube Script Generator: High-Retention Scripts in Seconds</h1>
            
            <div class="seo-section mb-5">
                <h2 class="h3 fw-bold mb-3">Introduction: The Art of Digital Storytelling</h2>
                <p class="lead lh-base">In the hyper-competitive world of video content, your script is the literal backbone of your success. It doesn't matter how expensive your camera is or how flashy your transitions are; if your story doesn't hook the viewer in the first five seconds and provide consistent value throughout, they will click away. Our <strong>AI YouTube Script Generator</strong> is a precision tool built for modern creators, designed to take the guesswork out of the writing process.</p>
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
                <p>By combining psychological "hook" frameworks with advanced <strong>Generative AI</strong>, this tool helps you structure your videos for maximum retention. Whether you are creating educational deep-dives, high-energy product reviews, or quiet "day in the life" vlogs, our generator understands the specific "language" of YouTube. It anticipates audience fatigue points and suggests natural segues, calls to action (CTAs), and engagement prompts that feel organic rather than forced.</p>
            </div>

            <hr class="my-5 opacity-10">

            <div class="seo-section mb-5">
                <h2 class="h3 fw-bold mb-4">Step-by-Step User Guide: From Concept to Viral Content</h2>
                <p>Crafting a script that converts views into subscribers is simple with our AI-driven workflow:</p>
                <div class="row g-4 mt-2">
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light border-start border-primary border-4 h-100">
                            <h5 class="fw-bold">1. Define Your Video Concept</h5>
                            <p class="mb-0 small text-muted">Enter your main topic or "Working Title." Be as specific as possible—for example, "10 Productivity Hacks for Remote Developers" is better than just "productivity."</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light border-start border-primary border-4 h-100">
                            <h5 class="fw-bold">2. Choose Your Narrative Style</h5>
                            <p class="mb-0 small text-muted">Select the tone that fits your channel. Use <em>High Energy</em> for tutorials or <em>Storyteller</em> for documentaries and personal essays.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light border-start border-primary border-4 h-100">
                            <h5 class="fw-bold">3. Generate the Skeleton</h5>
                            <p class="mb-0 small text-muted">Click the "Generate Script" button. The AI will provide a structured outline including a Hook, Intro, Main Body Points, and an Outro.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 rounded-4 bg-light border-start border-primary border-4 h-100">
                            <h5 class="fw-bold">4. Refine Your Voice</h5>
                            <p class="mb-0 small text-muted">Read through the AI draft and add your "channel-specific" inside jokes, anecdotes, and unique stylistic flourishes before recording.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="seo-section mb-5">
                <h2 class="h4 fw-bold mb-4">Key Features of the AI Script Architect</h2>
                <ul class="list-unstyled row g-3">
                    <li class="col-md-6 d-flex gap-2">
                        <i class="fa-solid fa-circle-check text-primary mt-1"></i>
                        <span><strong>Algorithmic Hook Generation:</strong> Identifies the "curiosity gap" needed to keep viewers from skipping your video.</span>
                    </li>
                    <li class="col-md-6 d-flex gap-2">
                        <i class="fa-solid fa-circle-check text-primary mt-1"></i>
                        <span><strong>Structured Pacing Logic:</strong> Breaks content into segments that correspond perfectly with YouTube Chapters.</span>
                    </li>
                    <li class="col-md-6 d-flex gap-2">
                        <i class="fa-solid fa-circle-check text-primary mt-1"></i>
                        <span><strong>Strategic CTA Placement:</strong> Suggests the best times to ask for engagement without interrupting the flow of value.</span>
                    </li>
                    <li class="col-md-6 d-flex gap-2">
                        <i class="fa-solid fa-circle-check text-primary mt-1"></i>
                        <span><strong>Visual Prompting:</strong> Includes "B-Roll" suggestions and screen direction hints within the script to aid editing.</span>
                    </li>
                    <li class="col-md-6 d-flex gap-2">
                        <i class="fa-solid fa-circle-check text-primary mt-1"></i>
                        <span><strong>Topic Research Integration:</strong> AI scans current trends to ensure your vocabulary aligns with viewer searches.</span>
                    </li>
                    <li class="col-md-6 d-flex gap-2">
                        <i class="fa-solid fa-circle-check text-primary mt-1"></i>
                        <span><strong>Multi-Format Compatibility:</strong> Whether it's a 60s Short or a 20min essay, the logic scales beautifully.</span>
                    </li>
                </ul>
            </div>

            <div class="seo-article-main lh-lg">
                <h2 class="h3 fw-bold mb-4">Detailed Article: Retention is King — The Psychology of the Perfect YouTube Script</h2>
                <p>In the attention economy, YouTube is the ultimate battlefield. With over 500 hours of content uploaded every minute, "good" isn't enough anymore. You need to be magnetic. This starts with the script.</p>

                <h3 class="h5 fw-bold mt-4">The Science of the "First Five"</h3>
                <p>Data shows that if a viewer stays past the 30-second mark, they are 70% more likely to watch the entire video. Our AI logic is built around the "Inverted Pyramid" of storytelling. We put the most vital, curiosity-inducing information at the very top. This "Hook" isn't a clickbait trick; it's a promise of value that the rest of the script works to fulfill.</p>

                <h3 class="h5 fw-bold mt-4">Avoiding the "Dead Mid-Roll"</h3>
                <p>Most videos see a massive dip in viewership around the 40-60% mark. This is usually because the creator has finished their main point and is "fluffing" the video to reach the 8-minute mark. Our script generator uses a "Circular Narrative" structure, ensuring that every few minutes, a new question is raised or value is introduced.</p>

                <h3 class="h5 fw-bold mt-4">The "Parasocial" Connection</h3>
                <p>YouTube is unique because of the relationship between creator and fan. A script shouldn't sound like a textbook; it should sound like a conversation with a friend. Our AI is tuned to use "inclusive" language—using "we," "us," and direct address ("you")—to build that vital parasocial bond that turns casual viewers into loyal subscribers.</p>

                <h3 class="h5 fw-bold mt-4">SEO vs. Human Value</h3>
                <p>A common mistake is writing for the algorithm while forgetting the human. Our generator finds the "Golden Mean." It naturally integrates your target keywords into the script without making the dialogue sound robotic or repetitive.</p>

                <h3 class="h5 fw-bold mt-4">The Power of the "Pattern Interrupt"</h3>
                <p>To keep modern, short-attention-span viewers engaged, you need to change the energy of a video every 90 to 120 seconds. Our script suggestions include "Pattern Interrupt" cues—moments where you should change your camera angle or add an on-screen graphic.</p>

                <h3 class="h5 fw-bold mt-4">Writing for the "Edit"</h3>
                <p>A great script is written with the final video in mind. Our AI includes placeholders for "Visual Assets." If you mention a specific product, the script will suggest: <em>[Show B-Roll of Product here]</em>. This bridges the gap between the writer and the editor.</p>

                <h3 class="h5 fw-bold mt-4">The Ethics of "Automatic" Creativity</h3>
                <p>We don't view AI as a replacement for the creator's soul. We view it as a research assistant that never gets tired. The best YouTube channels are built on authenticity. Our tool provides the structure (the "skeleton"), but we always encourage our users to provide the "heart".</p>

                <h3 class="h5 fw-bold mt-4">Future-Proofing Your Channel</h3>
                <p>YouTube's algorithm changes constantly, but human psychology stays the same. People will always love a well-told story. By mastering the fundamentals of scripting through our AI-assisted tool, you are building a resilient channel that can withstand platform shifts.</p>
            </div>

            <div class="seo-section my-5">
                <h2 class="h3 fw-bold mb-4">Comparison: Effortless Scripting vs. The Old Way</h2>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="bg-light">
                            <tr>
                                <th>Metric</th>
                                <th class="text-primary">AI Script Generator</th>
                                <th>Manual Brainstorming</th>
                                <th>Old Templates</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Speed</strong></td>
                                <td class="text-success">45 Seconds</td>
                                <td>2-4 Hours</td>
                                <td>10 Minutes</td>
                            </tr>
                            <tr>
                                <td><strong>Pacing</strong></td>
                                <td class="text-success">Precision</td>
                                <td>Inconsistent</td>
                                <td>Rigid/Boring</td>
                            </tr>
                            <tr>
                                <td><strong>Retention</strong></td>
                                <td class="text-success">High (Hooks)</td>
                                <td>Hit-or-Miss</td>
                                <td>Basic</td>
                            </tr>
                            <tr>
                                <td><strong>SEO Synergy</strong></td>
                                <td class="text-success">Native</td>
                                <td>Manual</td>
                                <td>None</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="seo-section mb-5">
                <h2 class="h3 fw-bold mb-4">FAQ Section: Elevate Your Production Quality</h2>
                <div class="accordion" id="seoFaq">
                    <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                        <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">
                                1. Can I use these scripts for YouTube Shorts?
                            <span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                        <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">
                                Absolutely. The generator is flexible. To get a high-quality Short, simply enter your topic and keep your Body Points focused on a single, high-impact revelation.
                            </div>
                    </div>
                    <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                        <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">
                                2. Does the script include time-stamps?
                            <span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                        <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">
                                The AI structures the content into clear segments. We recommend speaking naturally and then adding Chapters in your description based on the script's layout.
                            </div>
                    </div>
                    <div class="group bg-gray-50 border border-gray-200 rounded-xl overflow-hidden mb-4 shadow-sm">
                        <summary class="flex items-center justify-between cursor-pointer p-5 font-semibold text-gray-900">
                                3. Is the content copyright-free?
                            <span class="transition group-open:rotate-180"><i class="fa-solid fa-chevron-down text-gray-400"></i></span></summary>
                        <div class="px-5 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-3">
                                Yes. You own the specific synthesis generated. However, always double-check specific factual claims or statistics before publishing.
                            </div>
                    </div>
                </div>
            </div>

            <div class="seo-conclusion text-center py-4 rounded-4" style="background: var(--bg-body);">
                <h2 class="h4 fw-bold mb-3">Conclusion: Stop Staring at the Blank Screen</h2>
                <p class="mb-0 text-muted">The <strong>AI YouTube Script Generator</strong> is the ultimate shortcut to professional-grade content. Start writing your next viral hit today!</p>
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
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('gen-btn');
        const loading = document.getElementById('ai-loading');
        const ui = document.getElementById('tool-ui');
        const resultWrapper = document.getElementById('result-wrapper');
        const resultBox = document.getElementById('script-result');
        const topicInput = document.getElementById('topic-input');

        btn.addEventListener('click', () => {
            const topic = topicInput.value.trim();
            if(!topic) return;

            loading.classList.remove('hidden');
            ui.classList.add('hidden');
            resultWrapper.classList.add('hidden');

            // High-quality template logic
            setTimeout(() => {
                const script = AITools.generateYoutubeScript(topic);
                resultBox.innerText = script;
                
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