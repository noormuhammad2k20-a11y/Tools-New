

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="bg-light p-4 rounded-4 border text-center">
                        <i class="fa-solid fa-cloud-arrow-up fa-3x mb-3 text-primary opacity-50"></i>
                        <h5 class="fw-bold mb-3">Upload Excel File</h5>
                        <input type="file" id="excel-file" class="form-control mb-4" accept=".xlsx, .xls">
                        
                        <div class="d-grid gap-2">
                            <button id="to-json-btn" class="btn btn-primary rounded-pill fw-bold shadow">
                                Convert to JSON <i class="fa-solid fa-code ms-2"></i>
                            </button>
                            <button id="to-html-btn" class="btn btn-outline-primary rounded-pill fw-bold">
                                Convert to HTML <i class="fa-solid fa-table ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="pro-card shadow-none border bg-white h-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0">Result Area</h5>
                            <button class="btn btn-link btn-sm text-primary fw-bold text-decoration-none" onclick="copyResult()">
                                <i class="fa-solid fa-copy me-1"></i> Copy
                            </button>
                        </div>
                        <div id="output-wrapper" class="bg-light p-3 rounded-3 border overflow-auto" style="height: 400px;">
                            <pre class="mb-0"><code id="result-code" class="language-json">// JSON will appear here after upload...</code></pre>
                            <div id="result-html" class="d-none"></div>
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




<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-json.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.getElementById('excel-file');
    const codeOutput = document.getElementById('result-code');
    const htmlOutput = document.getElementById('result-html');

    async function processFile(format) {
        const file = fileInput.files[0];
        if (!file) return showToast('Please select a file', 'error');

        const reader = new FileReader();
        reader.onload = (e) => {
            const data = new Uint8Array(e.target.result);
            const workbook = XLSX.read(data, { type: 'array' });
            const firstSheetName = workbook.SheetNames[0];
            const worksheet = workbook.Sheets[firstSheetName];

            if (format === 'json') {
                const json = XLSX.utils.sheet_to_json(worksheet);
                codeOutput.textContent = JSON.stringify(json, null, 2);
                Prism.highlightElement(codeOutput);
                codeOutput.parentElement.classList.remove('d-none');
                htmlOutput.classList.add('d-none');
            } else {
                const html = XLSX.utils.sheet_to_html(worksheet);
                htmlOutput.innerHTML = html;
                // Add bootstrap classes to generated table
                const table = htmlOutput.querySelector('table');
                if (table) table.className = 'table table-striped table-bordered small';
                
                htmlOutput.classList.remove('d-none');
                codeOutput.parentElement.classList.add('d-none');
            }
            showToast('file Processed!');
        };
        reader.readAsArrayBuffer(file);
    }

    document.getElementById('to-json-btn').addEventListener('click', () => processFile('json'));
    document.getElementById('to-html-btn').addEventListener('click', () => processFile('html'));
});

function copyResult() {
    const isHtml = !document.getElementById('result-html').classList.contains('d-none');
    const text = isHtml ? document.getElementById('result-html').innerHTML : document.getElementById('result-code').textContent;
    
    if (text.includes('// JSON')) return;
    navigator.clipboard.writeText(text).then(() => {
        showToast('Result copied!');
    });
}
</script>






