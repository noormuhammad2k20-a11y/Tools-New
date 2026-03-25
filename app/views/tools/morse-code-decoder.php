

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
                        <label class="form-label fw-bold small text-uppercase mb-3">Morse Code Input (use / for spaces)</label>
                        <textarea id="input-morse" class="form-control" style="height: 150px; font-family: 'Fira Code', monospace; resize: none;" placeholder=".... . .-.. .-.. --- / -- --- .-. ... ."></textarea>
                    </div>

                    <div class="text-center my-4">
                        <div class="badge bg-primary-glow text-primary rounded-pill px-3 py-2">
                            <i class="fa-solid fa-arrow-down me-1"></i> Decoded Text <i class="fa-solid fa-arrow-down ms-1"></i>
                        </div>
                    </div>

                    <div class="bg-light p-4 rounded-4 border">
                        <label class="form-label fw-bold small text-uppercase mb-3">Standard Text</label>
                        <textarea id="output-text" class="form-control" style="height: 200px; font-family: inherit; font-size: 1.1rem; resize: none;" readonly></textarea>
                        
                        <div class="mt-4 d-flex gap-2">
                            <button id="copy-btn" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">
                                <i class="fa-solid fa-copy me-2"></i> Copy Text
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
    const input = document.getElementById('input-morse');
    const output = document.getElementById('output-text');
    const copyBtn = document.getElementById('copy-btn');
    const clearBtn = document.getElementById('clear-btn');

    const morseMap = {
        '.-': 'A', '-...': 'B', '-.-.': 'C', '-..': 'D', '.': 'E', '..-.': 'F', '--.': 'G', '....': 'H',
        '..': 'I', '.---': 'J', '-.-': 'K', '.-..': 'L', '--': 'M', '-.': 'N', '---': 'O', '.--.': 'P',
        '--.-': 'Q', '.-.': 'R', '...': 'S', '-': 'T', '..-': 'U', '...-': 'V', '.--': 'W', '-..-': 'X',
        '-.--': 'Y', '--..': 'Z', '.----': '1', '..---': '2', '...--': '3', '....-': '4', '.....': '5',
        '-....': '6', '--...': '7', '---..': '8', '----.': '9', '-----': '0', '/': ' ', '.-.-.-': '.',
        '--..--': ',', '..--..': '?', '.----.': "'", '-.-.--': '!', '-..-.': '/', '-.--.': '(', '-.--.-': ')',
        '.-...': '&', '---...': ':', '-.-.-.': ';', '-...-': '=', '.-.-.': '+', '-....-': '-', '..--.-': '_',
        '.-..-.': '"', '...-..-': '$', '.--.-.': '@'
    };

    const convert = () => {
        const morse = input.value.trim();
        if (!morse) {
            output.value = '';
            return;
        }

        const words = morse.split(' / ');
        const decoded = words.map(word => {
            return word.split(' ').map(char => morseMap[char] || '').join('');
        }).join(' ');

        output.value = decoded;
    };

    input.addEventListener('input', convert);

    copyBtn.addEventListener('click', () => {
        if (!output.value) return;
        navigator.clipboard.writeText(output.value).then(() => showToast('Text copied!'));
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        output.value = '';
        showToast('Cleared!');
    });
});
</script>






