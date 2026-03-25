

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Plain Text</label>
                        <textarea id="text-input" class="form-control" rows="12" placeholder="Enter text..."></textarea>
                    </div>
                    <div class="d-grid shadow-premium">
                        <button id="to-bin-btn" class="btn btn-primary btn-lg rounded-pill fw-bold">
                            Convert to Binary <i class="fa-solid fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Binary Code</label>
                        <textarea id="bin-input" class="form-control font-monospace" rows="12" placeholder="01001000 01000101..."></textarea>
                    </div>
                    <div class="d-grid shadow-premium">
                        <button id="to-text-btn" class="btn btn-outline-primary btn-lg rounded-pill fw-bold">
                            <i class="fa-solid fa-arrow-left me-2"></i> Convert to Text
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
    const textIn = document.getElementById('text-input');
    const binIn = document.getElementById('bin-input');

    document.getElementById('to-bin-btn').addEventListener('click', () => {
        const val = textIn.value;
        const res = val.split('').map(char => {
            return char.charCodeAt(0).toString(2).padStart(8, '0');
        }).join(' ');
        binIn.value = res;
        showToast('Converted to Binary!');
    });

    document.getElementById('to-text-btn').addEventListener('click', () => {
        const val = binIn.value.trim().split(/\s+/);
        try {
            const res = val.map(bin => {
                return String.fromCharCode(parseInt(bin, 2));
            }).join('');
            textIn.value = res;
            showToast('Converted to Text!');
        } catch (e) {
            showToast('Invalid binary input', 'error');
        }
    });
});
</script>






