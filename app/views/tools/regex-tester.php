<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            
            <div class="mb-4 bg-light p-4 rounded-4 border">
                <label class="form-label fw-bold text-uppercase tracking-wider text-muted mb-2">Regex Pattern</label>
                <div class="input-group input-group-lg shadow-sm regex-group">
                    <span class="input-group-text bg-white border-end-0 fw-bold fs-4 text-muted">/</span>
                    <input type="text" id="regex-input" class="form-control border-start-0 border-end-0 fw-bold" placeholder="Pattern (e.g. ^[a-zA-Z0-9]+$)" style="font-family: var(--font-mono); font-size: 1.25rem;">
                    <span class="input-group-text bg-white border-start-0 border-end-0 fw-bold fs-4 text-muted">/</span>
                    <input type="text" id="regex-flags" class="form-control" value="gm" placeholder="Flags (e.g. g, m, i)" style="max-width: 100px; font-family: var(--font-mono); font-weight: bold;">
                </div>
                <div class="d-flex mt-3 gap-2 flex-wrap">
                    <button class="btn btn-sm btn-outline-primary rounded-pill" onclick="loadPattern('[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}', 'g')">Email Validation</button>
                    <button class="btn btn-sm btn-outline-primary rounded-pill" onclick="loadPattern('^\\d{3}-\\d{2}-\\d{4}$', 'g')">US SSN</button>
                    <button class="btn btn-sm btn-outline-primary rounded-pill" onclick="loadPattern('^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$', 'g')">IPv4</button>
                    <button class="btn btn-sm btn-outline-primary rounded-pill" onclick="loadPattern('https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b([-a-zA-Z0-9()@:%_\\+.~#?&//=]*)', 'gi')">URL Parsing</button>
                </div>
            </div>

            <div class="row gx-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold small text-uppercase tracking-wider text-muted mb-0">Test String Input</label>
                    </div>
                    <textarea id="test-string" class="form-control border-2 rounded-4 p-4" rows="10" placeholder="Type the text you want to test against your regex pattern here..."></textarea>
                </div>

                <div class="col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold text-primary small text-uppercase tracking-wider mb-0">Match Results</label>
                        <span id="match-count" class="badge bg-primary rounded-pill">0 Matches</span>
                    </div>
                    <!-- Display matched highlights via div contenteditable=false overlay or just innerHTML -->
                    <div id="match-display" class="form-control bg-light border-0 rounded-4 p-4 overflow-auto" style="height: 250px; font-family: var(--font-mono); white-space: pre-wrap;">
                        <span class="text-muted">Matches will be highlighted here...</span>
                    </div>
                </div>
            </div>
            
            <div id="error-alert" class="alert alert-danger mt-4 d-none border-danger shadow-sm rounded-4">
                <strong><i class="fa-solid fa-triangle-exclamation me-2"></i>Invalid Regular Expression:</strong> <span id="error-msg"></span>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Mastering Pattern Validation</h2>
                    <p class="lead">Regular Expressions (RegEx) are foundational cryptographic sequences used in all programming architectures for searching, editing, and manipulating text streams. Our <strong>Pro Regex Tester</strong> provides an immediate, visually responsive environment to construct and safely debug your computational queries before deploying them into production.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Instant Client-Side Evaluation</h3>
                    <p>Executing malicious or infinitely-looping regular expressions against a backend server (a phenomenon known as ReDoS - Regular expression Denial of Service) can crash database node listeners instantly. By compiling your PCRE/Javascript Regex patterns strictly client-side against your system memory payload, you circumvent all server-side architectural bottlenecks.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Understanding Execution Flags</h3>
                    <p>When appending parameters to the end of your `/[pattern]/[flags]` syntax, you command the algorithmic parser to behave dynamically:</p>
                    <ul>
                        <li><strong>Global (g):</strong> Instructs the engine to NOT return after the very first match, but to loop continuously over the entire text searching for duplicates.</li>
                        <li><strong>Multi-Line (m):</strong> Transmutes the boundary markers (`^` and `$`) to match the onset and conclusion of specific lines within block text, rather than the entire string structure.</li>
                        <li><strong>Case-Insensitive (i):</strong> Expands alphabetical matrices to indiscriminately ignore uppercase versus lowercase variations locally.</li>
                        <li><strong>Sticky (y):</strong> Forces the engine to locate subsequent matches exclusively at the exact index specified by the <code>lastIndex</code> protocol tracker.</li>
                    </ul>
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
.text-gradient-primary { background: linear-gradient(45deg, #a855f7, #ec4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.regex-group .input-group-text { color: var(--bs-primary) !important; font-size: 1.5rem !important; }
.highlight-match { background-color: rgba(168, 85, 247, 0.25); border-bottom: 2px solid #a855f7; border-radius: 3px; }
.highlight-stripe { background: repeating-linear-gradient(45deg, rgba(236, 72, 153, 0.1), rgba(236, 72, 153, 0.1) 10px, transparent 10px, transparent 20px); }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const regInput = document.getElementById('regex-input');
    const flagInput = document.getElementById('regex-flags');
    const testString = document.getElementById('test-string');
    const display = document.getElementById('match-display');
    const matchCount = document.getElementById('match-count');
    const errorAlert = document.getElementById('error-alert');
    const errorMsg = document.getElementById('error-msg');

    function escapeHtml(text) {
        return text
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    function evaluateRegex() {
        errorAlert.classList.add('d-none');
        const pattern = regInput.value;
        const flags = flagInput.value;
        const text = testString.value;

        if (!pattern || !text) {
            display.innerHTML = '<span class="text-muted">Matches will be highlighted here...</span>';
            matchCount.textContent = '0 Matches';
            return;
        }

        try {
            const regex = new RegExp(pattern, flags);
            
            // To prevent browser hang on some edge case regex, JS execution is fast but ReDOS is possible.
            // We'll use string.replace to inject wrap tags around matches natively.
            let count = 0;
            
            // Note: If 'g' is not set, replace only wraps the first. That's correct for regex behavior.
            const highlightedText = text.replace(regex, (match) => {
                count++;
                // If match is empty string (e.g., ^ or \b), don't wrap empty span to avoid infinite loop display bugs in some patterns.
                if (match === '') return match;
                return `<span class="highlight-match">${escapeHtml(match)}</span>`;
            });

            // If the regex has a global match on empty string (like matching word boundaries \b globally), count explodes but text doesn't replace visibly.
            // A secondary check via match() for accurate numbering.
            let exactMatches = text.match(regex);
            let finalCount = exactMatches ? exactMatches.length : 0;

            // Only use HTML escaping on parts NOT matched to maintain our injected spans, 
            // WAIT, text.replace replaces on unescaped text. To do it safely: HTML escape FIRST? 
            // Actually, Regex on HTML escaped text might fail if regex relies on raw < or > chars.
            // Safe approach: Execute matchAll or exec iteratively, build new string.
            
            let resultHtml = "";
            let lastIndex = 0;
            
            // Need global flag to iterate properly, otherwise it infinite loops on index 0
            let safeFlags = flags;
            if(!safeFlags.includes('g')) safeFlags += 'g';
            const safeRegex = new RegExp(pattern, safeFlags);
            
            let safeCount = 0;
            let m;
            let safetyBreaker = 0;

            while ((m = safeRegex.exec(text)) !== null) {
                safetyBreaker++;
                if (safetyBreaker > 5000) break; // ReDoS fail-safe limit
                
                if (m.index === safeRegex.lastIndex) {
                    safeRegex.lastIndex++; // Avoid infinite loops on zero-length matches
                }
                
                // Add skipped string (escaped)
                resultHtml += escapeHtml(text.substring(lastIndex, m.index));
                
                // Add matched string (wrapped and escaped)
                if (m[0] !== '') {
                    resultHtml += `<span class="highlight-match fw-bold text-dark">${escapeHtml(m[0])}</span>`;
                    safeCount++;
                }

                lastIndex = m.index + m[0].length;

                // Stop iterating if original regex was NOT global, we only wanted first match anyway
                if (!flags.includes('g')) {
                    break;
                }
            }
            
            // Append remainder
            resultHtml += escapeHtml(text.substring(lastIndex));

            display.innerHTML = resultHtml || '<span class="text-muted">No matches found.</span>';
            
            // Display true count (accounting for non-global)
            let displayCount = safeCount;
            matchCount.textContent = `${displayCount} Match${displayCount !== 1 ? 'es' : ''}`;
            
            if (displayCount > 0) {
                matchCount.classList.replace('bg-primary', 'bg-success');
                display.classList.add('highlight-stripe');
            } else {
                matchCount.classList.replace('bg-success', 'bg-primary');
                display.classList.remove('highlight-stripe');
            }

        } catch (e) {
            errorMsg.textContent = e.message;
            errorAlert.classList.remove('d-none');
            display.innerHTML = '<span class="text-danger">Evaluation failed due to malformed regex.</span>';
            matchCount.textContent = 'Error';
            matchCount.classList.replace('bg-success', 'bg-danger');
        }
    }

    regInput.addEventListener('input', evaluateRegex);
    flagInput.addEventListener('input', evaluateRegex);
    testString.addEventListener('input', evaluateRegex);

    window.loadPattern = (regexStr, flagStr) => {
        regInput.value = regexStr;
        flagInput.value = flagStr;
        testString.value = "user.name123@gmail.com is an email. \nInvalid: test@.com. \nSSN: 123-45-6789. \nIP Array: 192.168.1.1, 256.256.0.0 (invalid). \nhttps://www.google.com/?query=regex";
        evaluateRegex();
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>