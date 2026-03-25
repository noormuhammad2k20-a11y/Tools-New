

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="bg-light p-4 rounded-4 border h-100">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Password to Hash</label>
                            <input type="text" id="bcrypt-input" class="form-control form-control-lg" placeholder="Enter password...">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Rounds (Work Factor)</label>
                            <input type="range" id="bcrypt-rounds" class="form-range" min="4" max="15" value="10">
                            <div class="text-end small text-muted">Value: <span class="fw-bold text-primary" id="rounds-val">10</span></div>
                        </div>
                        <div class="d-grid mt-5">
                            <button id="hash-btn" class="btn btn-primary btn-lg rounded-pill fw-bold shadow">
                                Generate Hash <i class="fa-solid fa-fingerprint ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="pro-card shadow-none border bg-white h-100">
                        <h5 class="fw-bold mb-3">Generated Hash</h5>
                        <div id="bcrypt-output" class="p-4 rounded-3 bg-light fs-5 text-break fw-bold text-primary mb-4" style="min-height: 80px; font-family: monospace;">
                            ...
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary fw-bold" onclick="copyHash()">
                                <i class="fa-solid fa-copy me-2"></i> Copy Hash
                            </button>
                            <button class="btn btn-outline-secondary btn-sm border-0" onclick="window.location.reload()">
                                <i class="fa-solid fa-refresh me-1"></i> New Session
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




<script src="https://cdn.jsdelivr.net/npm/bcryptjs@2.4.3/dist/bcrypt.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('bcrypt-input');
    const roundsRange = document.getElementById('bcrypt-rounds');
    const roundsVal = document.getElementById('rounds-val');
    const hashBtn = document.getElementById('hash-btn');
    const output = document.getElementById('bcrypt-output');

    roundsRange.addEventListener('input', () => {
        roundsVal.textContent = roundsRange.value;
    });

    hashBtn.addEventListener('click', () => {
        const pass = input.value;
        if (!pass) return showToast('Please enter a password', 'error');

        const saltRounds = parseInt(roundsRange.value);
        
        hashBtn.innerHTML = '<span class="premium-spinner"></span> Hashing...';
        hashBtn.disabled = true;

        // Use setTimeout to allow UI to show spinner before heavy computation
        setTimeout(() => {
            try {
                const salt = dcodeIO.bcrypt.genSaltSync(saltRounds);
                const hash = dcodeIO.bcrypt.hashSync(pass, salt);
                output.textContent = hash;
                showToast('Hash Generated!');
            } catch (e) {
                showToast('Error: ' + e.message, 'error');
            } finally {
                hashBtn.innerHTML = 'Generate Hash <i class="fa-solid fa-fingerprint ms-2"></i>';
                hashBtn.disabled = false;
            }
        }, 100);
    });
});

function copyHash() {
    const text = document.getElementById('bcrypt-output').textContent.trim();
    if (text === '...') return;
    navigator.clipboard.writeText(text).then(() => {
        showToast('Hash copied!');
    });
}
</script>






