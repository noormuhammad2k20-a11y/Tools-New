

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <!-- Tool UI -->
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="bg-light p-4 rounded-4 border">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Regular Expression</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">/</span>
                                <input type="text" id="regex-pattern" class="form-control border-start-0 border-end-0" placeholder="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" value="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}">
                                <span class="input-group-text bg-white border-start-0">/</span>
                                <input type="text" id="regex-flags" class="input-group-text bg-white" style="width: 80px;" value="g" placeholder="flags">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Test String</label>
                            <textarea id="regex-test" class="form-control" rows="5" placeholder="Enter text to test the regex against...">Contact us at support@example.com or info@tools.net</textarea>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="pro-card shadow-none border bg-white">
                        <h5 class="fw-bold mb-3">Live Matching Results</h5>
                        <div id="regex-results" class="p-3 rounded-3 bg-light min-height-100" style="font-family: monospace; white-space: pre-wrap; line-height: 1.6;">
                            <!-- Matches will be highlighted here -->
                        </div>
                    </div>
                </div>

                <!-- Visualization info -->
                <div class="col-lg-12 mt-4">
                    <div class="alert bg-primary-soft border-0 rounded-4 p-4 text-center">
                        <i class="fa-solid fa-info-circle fa-2x mb-3 text-primary"></i>
                        <h5 class="fw-bold">How it works</h5>
                        <p class="text-muted mb-0">Matches are highlighted in <span class="badge bg-warning text-dark">yellow</span>. If your regex is invalid, the background will turn <span class="text-danger fw-bold">red</span>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->



<style>
.regex-match {
    background-color: #fef08a; /* yellow-200 */
    border-bottom: 2px solid #eab308; /* yellow-500 */
    border-radius: 2px;
}
.regex-error {
    background-color: #fee2e2 !important; /* red-100 */
    border-color: #ef4444 !important; /* red-500 */
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const patternInput = document.getElementById('regex-pattern');
    const flagsInput = document.getElementById('regex-flags');
    const testInput = document.getElementById('regex-test');
    const resultsDiv = document.getElementById('regex-results');

    function updateMatches() {
        const pattern = patternInput.value;
        const flags = flagsInput.value;
        const text = testInput.value;

        resultsDiv.innerHTML = '';
        patternInput.classList.remove('is-invalid');
        patternInput.closest('.input-group').classList.remove('regex-error');

        if (!pattern) return;

        try {
            const regex = new RegExp(pattern, flags.includes('g') ? flags : flags + 'g');
            
            let highlightedText = '';
            let lastIndex = 0;
            let match;

            while ((match = regex.exec(text)) !== null) {
                if (match.index === regex.lastIndex) regex.lastIndex++; // Prevent infinite loop on zero-width matches

                highlightedText += escapeHtml(text.substring(lastIndex, match.index));
                highlightedText += `<span class="regex-match">${escapeHtml(match[0])}</span>`;
                lastIndex = regex.lastIndex;
            }

            highlightedText += escapeHtml(text.substring(lastIndex));
            resultsDiv.innerHTML = highlightedText || escapeHtml(text) || '<span class="text-muted">No matches found.</span>';

        } catch (e) {
            patternInput.classList.add('is-invalid');
            patternInput.closest('.input-group').classList.add('regex-error');
            resultsDiv.innerHTML = `<span class="text-danger">Invalid Regex: ${e.message}</span>`;
        }
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    [patternInput, flagsInput, testInput].forEach(el => {
        el.addEventListener('input', updateMatches);
    });

    updateMatches();
});
</script>






