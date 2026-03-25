

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
                        <label class="form-label fw-bold small text-uppercase mb-3">Input Text (English)</label>
                        <textarea id="input-text" class="form-control" style="height: 150px; resize: none;" placeholder="Hello World"></textarea>
                    </div>

                    <div class="text-center my-4">
                        <div class="badge bg-primary-glow text-primary rounded-pill px-3 py-2">
                            <i class="fa-solid fa-arrow-down me-1"></i> Output Braille <i class="fa-solid fa-arrow-down ms-1"></i>
                        </div>
                    </div>

                    <div class="bg-light p-4 rounded-4 border">
                        <label class="form-label fw-bold small text-uppercase mb-3">Braille Text</label>
                        <textarea id="output-braille" class="form-control" style="height: 200px; font-size: 1.5rem; resize: none;" readonly></textarea>
                        
                        <div class="mt-4 d-flex gap-2">
                            <button id="copy-btn" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">
                                <i class="fa-solid fa-copy me-2"></i> Copy Braille
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
    const output = document.getElementById('output-braille');
    const copyBtn = document.getElementById('copy-btn');
    const clearBtn = document.getElementById('clear-btn');

    const brailleMap = {
        'a': '⠁', 'b': '⠝', 'c': '⠉', 'd': '⠙', 'e': '⠑', 'f': '⠋', 'g': '⠛', 'h': '⠓', 'i': '⠊', 'j': '⠚',
        'k': '⠅', 'l': '⠇', 'm': '⠍', 'n': '⠝', 'o': '⠕', 'p': '⠏', 'q': '⠟', 'r': '⠗', 's': '⠎', 't': '⠞',
        'u': '⠥', 'v': '⠧', 'w': '⠺', 'x': '⠭', 'y': '⠽', 'z': '⠵', ' ': ' ',
        '1': '⠁', '2': '⠃', '3': '⠉', '4': '⠙', '5': '⠑', '6': '⠋', '7': '⠛', '8': '⠓', '9': '⠊', '0': '⠚',
        '.': '⠲', ',': '⠂', ';': '⠆', ':': '⠒', '!': '⠖', '?': '⠦', '"': '⠶', '(': '⠦', ')': '⠴', '-': '⠤'
    };

    const convert = () => {
        const text = input.value.toLowerCase();
        if (!text) {
            output.value = '';
            return;
        }

        const result = text.split('').map(char => brailleMap[char] || char).join('');
        output.value = result;
    };

    input.addEventListener('input', convert);

    copyBtn.addEventListener('click', () => {
        if (!output.value) return;
        navigator.clipboard.writeText(output.value).then(() => showToast('Braille copied!'));
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        output.value = '';
        showToast('Cleared!');
    });
});
</script>






