

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
                        <label class="form-label fw-bold small text-uppercase mb-3">Normal Text</label>
                        <textarea id="input-text" class="form-control" style="height: 120px; resize: none;" placeholder="Elite hacker"></textarea>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-12">
                            <label class="form-label small fw-bold">Leet Level</label>
                            <select id="leet-level" class="form-select rounded-pill">
                                <option value="basic">Basic (3=e, 1=i, 0=o, 4=a, 7=t)</option>
                                <option value="advanced" selected>Advanced (including symbols)</option>
                            </select>
                        </div>
                    </div>

                    <div class="bg-light p-4 rounded-4 border">
                        <label class="form-label fw-bold small text-uppercase mb-3">L33t Output</label>
                        <textarea id="output-text" class="form-control" style="height: 150px; font-family: 'Fira Code', monospace; resize: none;" readonly></textarea>
                        
                        <div class="mt-4 d-flex gap-2">
                            <button id="copy-btn" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">
                                <i class="fa-solid fa-copy me-2"></i> Copy L33t
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
    const leetLevel = document.getElementById('leet-level');
    const copyBtn = document.getElementById('copy-btn');
    const clearBtn = document.getElementById('clear-btn');

    const basicMap = {
        'a': '4', 'e': '3', 'i': '1', 'o': '0', 's': '5', 't': '7'
    };
    
    const advancedMap = {
        'a': '4', 'b': '8', 'c': '(', 'e': '3', 'g': '9', 'h': '#', 'i': '1', 'l': '|', 'o': '0', 's': '5', 't': '7', 'v': '\/', 'w': 'vv'
    };

    const convert = () => {
        const text = input.value.toLowerCase();
        const level = leetLevel.value;
        const map = (level === 'basic') ? basicMap : advancedMap;

        const result = text.split('').map(char => map[char] || char).join('');
        output.value = result;
    };

    input.addEventListener('input', convert);
    leetLevel.addEventListener('change', convert);

    copyBtn.addEventListener('click', () => {
        if (!output.value) return;
        navigator.clipboard.writeText(output.value).then(() => showToast('L33t speak copied!'));
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        output.value = '';
        showToast('Cleared!');
    });
});
</script>






