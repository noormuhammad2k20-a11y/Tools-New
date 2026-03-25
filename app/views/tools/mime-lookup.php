

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4 justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="bg-light p-5 rounded-4 border mb-4">
                        <label class="form-label fw-bold small text-uppercase mb-3">Enter File Extension</label>
                        <div class="input-group input-group-lg shadow-sm">
                            <span class="input-group-text bg-white border-end-0 text-muted"><i class="fa-solid fa-file"></i></span>
                            <input type="text" id="ext-input" class="form-control border-start-0" placeholder="e.g. pdf, png, mp4, json" style="font-weight: 600;">
                        </div>
                    </div>

                    <div id="result-card" class="d-none animate-fade-up">
                        <div class="p-5 rounded-4 bg-primary bg-opacity-10 border border-primary border-opacity-25 card-hover-custom">
                            <h2 id="mime-output" class="display-4 fw-bold text-primary mb-3"></h2>
                            <p class="text-muted mb-4 fs-5">This is the official MIME type for <strong>.<span id="ext-span"></span></strong> files.</p>
                            
                            <button id="copy-btn" class="btn btn-primary rounded-pill px-5 fw-bold shadow-sm">
                                <i class="fa-solid fa-copy me-2"></i> Copy MIME Type
                            </button>
                        </div>
                    </div>

                    <div id="no-result" class="mt-4 d-none">
                        <div class="p-4 rounded-4 bg-light border border-dashed text-muted">
                            <i class="fa-solid fa-circle-question fa-3x mb-3 opacity-25"></i>
                            <p class="mb-0">Extension not found in our common database. Try a standard one like 'zip' or 'html'.</p>
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
    const input = document.getElementById('ext-input');
    const resultCard = document.getElementById('result-card');
    const noResult = document.getElementById('no-result');
    const output = document.getElementById('mime-output');
    const extSpan = document.getElementById('ext-span');
    const copyBtn = document.getElementById('copy-btn');

    const mimes = {
        'html': 'text/html', 'htm': 'text/html', 'css': 'text/css', 'js': 'text/javascript', 'json': 'application/json',
        'xml': 'application/xml', 'pdf': 'application/pdf', 'zip': 'application/zip', 'rar': 'application/x-rar-compressed',
        '7z': 'application/x-7z-compressed', 'tar': 'application/x-tar', 'png': 'image/png', 'jpg': 'image/jpeg',
        'jpeg': 'image/jpeg', 'gif' : 'image/gif', 'webp': 'image/webp', 'svg': 'image/svg+xml', 'ico': 'image/x-icon',
        'mp3': 'audio/mpeg', 'wav': 'audio/wav', 'ogg': 'audio/ogg', 'mp4': 'video/mp4', 'webm': 'video/webm',
        'avi': 'video/x-msvideo', 'mov': 'video/quicktime', 'csv': 'text/csv', 'txt': 'text/plain', 'sql': 'application/sql',
        'php': 'application/x-httpd-php', 'py': 'text/x-python', 'java': 'text/x-java-source', 'cpp': 'text/x-c++src'
    };

    const lookup = () => {
        let ext = input.value.trim().toLowerCase().replace('.', '');
        if (!ext) {
            resultCard.classList.add('d-none');
            noResult.classList.add('d-none');
            return;
        }

        if (mimes[ext]) {
            output.textContent = mimes[ext];
            extSpan.textContent = ext;
            resultCard.classList.remove('d-none');
            noResult.classList.add('d-none');
        } else {
            resultCard.classList.add('d-none');
            noResult.classList.remove('d-none');
        }
    };

    input.addEventListener('input', lookup);

    copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(output.textContent).then(() => showToast('MIME type copied!'));
    });
});
</script>






