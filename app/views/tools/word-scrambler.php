

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
                        <textarea id="input-text" class="form-control" style="height: 120px; resize: none;" placeholder="Scramble this sentence"></textarea>
                    </div>

                    <div class="bg-light p-4 rounded-4 border">
                        <label class="form-label fw-bold small text-uppercase mb-3">Scrambled Result</label>
                        <textarea id="output-text" class="form-control" style="height: 150px; resize: none;" readonly></textarea>
                        
                        <div class="mt-4 d-flex gap-2">
                            <button id="scramble-btn" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">
                                <i class="fa-solid fa-bolt me-2"></i> Re-Scramble
                            </button>
                            <button id="copy-btn" class="btn btn-outline-primary rounded-pill px-4">
                                <i class="fa-solid fa-copy"></i>
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
    const input = document.getElementById('input-text');
    const output = document.getElementById('output-text');
    const scrambleBtn = document.getElementById('scramble-btn');
    const copyBtn = document.getElementById('copy-btn');
    const clearBtn = document.getElementById('clear-btn');

    const scrambleWord = (word) => {
        if (word.length <= 3) return word;
        const chars = word.split('');
        for (let i = chars.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [chars[i], chars[j]] = [chars[j], chars[i]];
        }
        return chars.join('');
    };

    const scrambleText = () => {
        const text = input.value;
        if (!text) {
            output.value = '';
            return;
        }

        const result = text.split(/\b/).map(token => {
            if (/^[a-zA-Z]+$/.test(token)) {
                return scrambleWord(token);
            }
            return token;
        }).join('');

        output.value = result;
    };

    input.addEventListener('input', scrambleText);
    scrambleBtn.addEventListener('click', scrambleText);

    copyBtn.addEventListener('click', () => {
        if (!output.value) return;
        navigator.clipboard.writeText(output.value).then(() => showToast('Scrambled text copied!'));
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        output.value = '';
        showToast('Cleared!');
    });
});
</script>






