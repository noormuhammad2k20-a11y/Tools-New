

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="bg-light p-4 rounded-4 border">
                        <div class="mb-4">
                            <label class="form-label fw-bold">Custom Scheme</label>
                            <input type="text" id="url-scheme" class="form-control" placeholder="myapp" value="myapp">
                            <div class="form-text">e.g. fb, whatsapp, twitter</div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Path / Action</label>
                            <input type="text" id="url-path" class="form-control" placeholder="user/profile/123" value="profile">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Parameters (Key=Value)</label>
                            <div id="params-container">
                                <div class="input-group mb-2 param-row">
                                    <input type="text" class="form-control param-key" placeholder="key">
                                    <input type="text" class="form-control param-val" placeholder="value">
                                    <button class="btn btn-outline-danger" onclick="this.parentElement.remove()"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </div>
                            <button class="btn btn-link btn-sm p-0 fw-bold text-primary text-decoration-none" onclick="addParam()">
                                <i class="fa-solid fa-plus me-1"></i> Add Parameter
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="pro-card shadow-none border bg-white h-100 text-center d-flex flex-column justify-content-center">
                        <h5 class="fw-bold mb-3">Generated URL Scheme</h5>
                        <div id="url-output" class="p-3 rounded-3 bg-light fs-4 fw-bold text-primary mb-4 text-break">
                            myapp://profile
                        </div>
                        
                        <div class="d-grid gap-2 mb-3">
                            <button class="btn btn-primary rounded-pill fw-bold btn-lg" onclick="copyResult()">
                                <i class="fa-solid fa-copy me-2"></i> Copy Link
                            </button>
                        </div>
                        <div class="alert alert-info py-2 small mb-0">
                            <i class="fa-solid fa-lightbulb me-2"></i> Note: Test this link by opening it from a browser on a mobile device with the target app installed.
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
function addParam() {
    const container = document.getElementById('params-container');
    const div = document.createElement('div');
    div.className = 'input-group mb-2 param-row';
    div.innerHTML = `
        <input type="text" class="form-control param-key" placeholder="key">
        <input type="text" class="form-control param-val" placeholder="value">
        <button class="btn btn-outline-danger" onclick="this.parentElement.remove(); updateUrl();"><i class="fa-solid fa-trash"></i></button>
    `;
    container.appendChild(div);
    
    div.querySelectorAll('input').forEach(i => i.addEventListener('input', updateUrl));
}

function updateUrl() {
    const scheme = document.getElementById('url-scheme').value.trim();
    const path = document.getElementById('url-path').value.trim();
    const output = document.getElementById('url-output');

    if (!scheme) {
        output.textContent = '...';
        return;
    }

    let url = `${scheme}://${path}`;
    const params = [];
    document.querySelectorAll('.param-row').forEach(row => {
        const k = row.querySelector('.param-key').value.trim();
        const v = row.querySelector('.param-val').value.trim();
        if (k) params.push(`${encodeURIComponent(k)}=${encodeURIComponent(v)}`);
    });

    if (params.length > 0) {
        url += '?' + params.join('&');
    }

    output.textContent = url;
}

document.addEventListener('DOMContentLoaded', () => {
    ['url-scheme', 'url-path'].forEach(id => {
        document.getElementById(id).addEventListener('input', updateUrl);
    });
    
    document.querySelectorAll('.param-row input').forEach(i => {
        i.addEventListener('input', updateUrl);
    });
});

function copyResult() {
    const text = document.getElementById('url-output').textContent.trim();
    if (text === '...') return;
    navigator.clipboard.writeText(text).then(() => {
        showToast('Link copied!');
    });
}
</script>






