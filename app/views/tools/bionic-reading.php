

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-6">
                    <label class="form-label fw-bold small text-uppercase tracking-wider">Original Text</label>
                    <textarea id="input-text" class="form-control" style="height: 400px; resize: none;" placeholder="Paste an article here to make it easier to read..."></textarea>
                    
                    <div class="mt-3">
                        <button id="clear-btn" class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="fa-solid fa-trash-can me-2"></i> Clear
                        </button>
                    </div>
                </div>

                <div class="col-lg-6">
                    <label class="form-label fw-bold small text-uppercase tracking-wider">Bionic Preview</label>
                    <div id="bionic-preview" class="border rounded-4 p-4 bg-white shadow-inner" style="height: 400px; overflow-y: auto; line-height: 1.8; font-size: 1.1rem; color: #334155;">
                        <span class="text-muted small">The bionic version will appear here as you type...</span>
                    </div>

                    <div class="mt-3">
                        <button id="copy-html-btn" class="btn btn-primary rounded-pill px-4 w-100 fw-bold shadow-sm">
                            <i class="fa-solid fa-copy me-2"></i> Copy as HTML
                        </button>
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




<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('input-text');
    const preview = document.getElementById('bionic-preview');
    const copyBtn = document.getElementById('copy-html-btn');
    const clearBtn = document.getElementById('clear-btn');

    const convertToBionic = (text) => {
        if (!text) return '<span class="text-muted small">The bionic version will appear here as you type...</span>';
        
        return text.split(/\b/).map(token => {
            if (/^[a-zA-Z]+$/.test(token)) {
                const len = token.length;
                let boldLen = 1;
                if (len > 3) boldLen = Math.ceil(len * 0.4);
                if (len > 10) boldLen = Math.ceil(len * 0.3);
                if (len <= 3 && len > 1) boldLen = 1;

                return `<b>${token.substring(0, boldLen)}</b>${token.substring(boldLen)}`;
            }
            return token.replace(/\n/g, '<br>');
        }).join('');
    };

    input.addEventListener('input', () => {
        preview.innerHTML = convertToBionic(input.value);
    });

    copyBtn.addEventListener('click', () => {
        if (!input.value) return;
        navigator.clipboard.writeText(preview.innerHTML).then(() => showToast('Bionic HTML copied!'));
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        preview.innerHTML = convertToBionic('');
        showToast('Cleared!');
    });
});
</script>






