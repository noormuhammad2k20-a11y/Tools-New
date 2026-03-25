

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="bg-light p-4 rounded-4 border mb-4">
                        <label class="form-label fw-bold small text-uppercase mb-3">Input Text</label>
                        <textarea id="rot-input" class="form-control" style="height: 150px; font-family: 'Fira Code', monospace; resize: none;" placeholder="Standard Text..."></textarea>
                    </div>

                    <div class="text-center my-3">
                        <div class="badge bg-primary-glow text-primary rounded-pill px-3 py-2">
                            <i class="fa-solid fa-arrow-down me-1"></i> ROT13 Output (Self-Reciprocal) <i class="fa-solid fa-arrow-down ms-1"></i>
                        </div>
                    </div>

                    <div class="bg-light p-4 rounded-4 border">
                        <label class="form-label fw-bold small text-uppercase mb-3">Result</label>
                        <textarea id="rot-output" class="form-control" style="height: 150px; font-family: 'Fira Code', monospace; resize: none;" readonly></textarea>
                        
                        <div class="mt-4 d-flex gap-2">
                            <button id="copy-btn" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">
                                <i class="fa-solid fa-copy me-2"></i> Copy Result
                            </button>
                            <button id="clear-btn" class="btn btn-outline-secondary rounded-pill px-4">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
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
    const input = document.getElementById('rot-input');
    const output = document.getElementById('rot-output');
    const copyBtn = document.getElementById('copy-btn');
    const clearBtn = document.getElementById('clear-btn');

    const rot13 = (str) => {
        return str.replace(/[a-zA-Z]/g, function(c) {
            return String.fromCharCode((c <= "Z" ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c - 26);
        });
    };

    input.addEventListener('input', () => {
        output.value = rot13(input.value);
    });

    copyBtn.addEventListener('click', () => {
        if (!output.value) return;
        navigator.clipboard.writeText(output.value).then(() => showToast('Result copied!'));
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        output.value = '';
        showToast('Cleared!');
    });
});
</script>






