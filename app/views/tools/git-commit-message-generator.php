<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        <div class="pro-app-main-full animate-fade-up">

<div class="pro-card">
    
    
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <label class="fw-bold mb-2 small text-muted">Type</label>
            <select id="gcmType" class="form-select border-primary fw-bold" onchange="generateCommit()">
                <option value="feat">feat (New Feature)</option>
                <option value="fix">fix (Bug Fix)</option>
                <option value="docs">docs (Documentation)</option>
                <option value="style">style (Formatting, missing semi colons)</option>
                <option value="refactor">refactor (Code rewrite, no logic change)</option>
                <option value="test">test (Adding tests)</option>
                <option value="chore">chore (Maintenance, dependencies)</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="fw-bold mb-2 small text-muted">Scope (Optional)</label>
            <input type="text" id="gcmScope" class="form-control fw-bold" placeholder="e.g. auth, api, ui" oninput="generateCommit()">
        </div>
        <div class="col-md-6">
            <label class="fw-bold mb-2 small text-muted">Short Description</label>
            <input type="text" id="gcmDesc" class="form-control fw-bold" placeholder="e.g. add jwt token validation" oninput="generateCommit()">
        </div>
        <div class="col-md-12">
            <label class="fw-bold mb-2 small text-muted">Detailed Body (Optional)</label>
            <textarea id="gcmBody" class="form-control" rows="3" placeholder="Explain the context and reasoning behind this change..." oninput="generateCommit()"></textarea>
        </div>
        <div class="col-md-12">
            <div class="form-check form-switch bg-light p-3 rounded border">
                <input class="form-check-input ms-0 me-3" type="checkbox" id="gcmBreaking" onchange="generateCommit()">
                <label class="form-check-label fw-bold text-danger" for="gcmBreaking">
                    Contains Breaking Changes <span class="badge bg-danger ms-2">!</span>
                </label>
            </div>
        </div>
    </div>
    
    <div style="padding:1.5rem;background:var(--bg-body);border:1px solid var(--border);border-radius:16px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold fs-5 mb-0">Terminal Output</h4>
            <span class="badge bg-gradient-primary">Auto-Generated</span>
        </div>
        
        <textarea id="gcmOutput" class="form-control font-monospace text-light bg-dark border-0 p-3 rounded-3" rows="6" readonly style="font-size:1rem;resize:none;"></textarea>
        <button class="btn btn-primary btn-lg w-100 fw-bold mt-3 shadow-sm" onclick="copyCommit()"><i class="fa-solid fa-copy ms-2"></i> Copy To Clipboard</button>
    </div>
</div>

<article class="tool-seo-article container mt-5 border-top pt-4">
    <header>
        <h2 class="fs-3 fw-bold mb-3">What is the Git Commit Generator?</h2>
        <p>The Git Commit Message Generator is a specialized developer utility designed to strictly enforce the widely accepted "Conventional Commits" semantic specification. Writing clear, structured commit messages isn't just about making your repository look professional; it fundamentally allows for automated semantic versioning (SemVer) and streamlined changelog generation via CI/CD pipelines.</p>
        <p>By forcing inputs into structured dropdowns (Types, Scopes, Breaking Changes), this tool prevents rogue developers from pushing chaotic or unsearchable history logs, ensuring that every merge request is highly legible for senior engineers reviewing the codebase.</p>
    </header>

    <section class="mt-4">
        <div class="pro-tip-box bg-primary-light p-4 rounded-3 shadow-sm" style="background:#f8fafc; border-left: 4px solid var(--primary);">
            <h3 class="fs-5 fw-bold mb-2"><i class="fa-solid fa-lightbulb text-warning me-2"></i> How to Use This Tool Like a Pro <span class="badge" style="background:linear-gradient(135deg,#7c3aed,#a855f7);color:#fff;">PRO</span></h3>
            <ul class="mb-0 text-muted">
                <li class="mb-1"><strong>The Breaking Bang (!):</strong> When you toggle the "Contains Breaking Changes" switch, the tool automatically injects an exclamation mark before the colon (e.g. <code>feat(api)!: ...</code>). In modern CI systems like GitHub Actions, this instantly signals a major version bump (v2.0.0).</li>
                <li class="mb-1"><strong>Imperative Mood:</strong> Always write the short description like an order given to the codebase. Use "add padding" instead of "added padding", or "fix login bug" instead of "fixes the login bug".</li>
            </ul>
        </div>
    </section>

    <section class="mt-4">
        <h3 class="fs-4 fw-bold mb-3">Key Features &amp; Premium Benefits</h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-code-commit text-success fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Syntax Perfection</h4><p class="text-muted small mb-0">Guarantees precise colon placement and spacing rules internally.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-magnifying-glass text-primary fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Categorized Scope</h4><p class="text-muted small mb-0">Allows injecting modular scopes (like UI, Database, API) to flag impacted zones.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-solid fa-bolt text-warning fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">Real-time Reactive UI</h4><p class="text-muted small mb-0">Synthesizes the terminal output instantly as you type without waiting.</p></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start bg-white p-3 rounded-3 shadow-sm border">
                    <i class="fa-brands fa-github text-dark fs-3 me-3 mt-1"></i>
                    <div><h4 class="fs-6 fw-bold mb-1">GitHub Friendly</h4><p class="text-muted small mb-0">Outputs strings directly paste-able into GitHub Desktop or terminal `-m` flags.</p></div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <h3 class="fs-4 fw-bold mb-3">Frequently Asked Questions (FAQs)</h3>
        <div class="accordion" id="toolFaqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">What is 'chore' used for?</button></h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">A 'chore' commit is utilized for maintenance work that does not modify the source code or active test files. Updating npm dependencies, modifying the .gitignore, or upgrading build scripts all fall under chores.</div></div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Where do I paste the generated text?</button></h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#toolFaqAccordion"><div class="accordion-body text-muted">If using the command line, simply use `git commit -m "PASTE_HERE"`. If you utilized the "Detailed Body" field which spans multiple lines, it's easier to copy the text and paste it directly into the GitHub Desktop app's commit summary text-box.</div></div>
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



<script>
function generateCommit() {
    const type = document.getElementById('gcmType').value;
    const scope = document.getElementById('gcmScope').value.trim();
    const desc = document.getElementById('gcmDesc').value.trim();
    const body = document.getElementById('gcmBody').value.trim();
    const breaking = document.getElementById('gcmBreaking').checked;
    
    let scopeStr = scope ? `(${scope})` : '';
    let breakStr = breaking ? '!' : '';
    
    let result = `${type}${scopeStr}${breakStr}: ${desc || '<commit description>'}`;
    
    if (body.length > 0 || breaking) {
        result += `\n\n`;
        if (body.length > 0) result += `${body}\n`;
        if (breaking) result += `\nBREAKING CHANGE: This commit introduces breaking changes.`;
    }
    
    document.getElementById('gcmOutput').value = result;
}

function copyCommit() {
    const out = document.getElementById('gcmOutput');
    if(!out.value || out.value.includes('<commit description>')) {
        alert('Please fill out the description first.');
        return;
    }
    navigator.clipboard.writeText(out.value);
    
    const btn = event.currentTarget;
    const original = btn.innerHTML;
    btn.innerHTML = '<i class="fa-solid fa-check ms-2"></i> Copied to Clipboard!';
    btn.classList.replace('btn-primary', 'btn-success');
    setTimeout(() => {
        btn.innerHTML = original;
        btn.classList.replace('btn-success', 'btn-primary');
    }, 2000);
}

// init
generateCommit();
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>