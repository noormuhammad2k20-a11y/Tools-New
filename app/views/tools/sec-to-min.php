

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4 justify-content-center">
                <div class="col-lg-8">
                    <div class="bg-light p-4 rounded-4 border">
                        <div class="row g-4 align-items-center">
                            <div class="col-md-5">
                                <label class="form-label fw-bold small">Seconds (sec)</label>
                                <input type="number" id="input-val" class="form-control form-control-lg" placeholder="60" step="any">
                            </div>
                            <div class="col-md-2 text-center">
                                <i class="fa-solid fa-right-left fa-2x text-primary opacity-50 mt-4 d-none d-md-block"></i>
                                <i class="fa-solid fa-circle-down fa-2x text-primary opacity-50 my-3 d-md-none"></i>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label fw-bold small">Minutes (min)</label>
                                <input type="number" id="output-val" class="form-control form-control-lg bg-white" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 d-flex gap-2">
                        <button id="copy-btn" class="btn btn-outline-primary rounded-pill px-4 fw-bold">
                            <i class="fa-solid fa-copy me-2"></i> Copy Result
                        </button>
                        <button id="clear-btn" class="btn btn-outline-secondary rounded-pill px-4 fw-bold">
                            <i class="fa-solid fa-trash-can"></i>
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
    const input = document.getElementById('input-val');
    const output = document.getElementById('output-val');
    const copyBtn = document.getElementById('copy-btn');
    const clearBtn = document.getElementById('clear-btn');

    const convert = () => {
        const val = parseFloat(input.value);
        if (isNaN(val)) {
            output.value = '';
            return;
        }
        // Formula: sec / 60
        output.value = (val / 60).toFixed(6).replace(/\.?0+$/, '');
    };

    input.addEventListener('input', convert);

    copyBtn.addEventListener('click', () => {
        if (!output.value) return;
        navigator.clipboard.writeText(output.value).then(() => showToast('Copied to clipboard!'));
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        output.value = '';
        showToast('Cleared!');
    });
});
</script>






