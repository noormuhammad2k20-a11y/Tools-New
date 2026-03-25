

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            
            <div class="row mb-5">
                
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card border-0 shadow-sm rounded-4 text-center h-100 bg-light">
                        <div class="card-body p-4">
                            <i class="fa-solid fa-user-shield fa-2x text-primary mb-3"></i>
                            <h4 class="fw-bold mb-4">Owner</h4>
                            
                            <div class="form-check form-switch d-flex justify-content-between align-items-center mb-3">
                                <label class="form-check-label fw-bold text-muted" for="o-read">Read (4)</label>
                                <input class="form-check-input ms-0 perm-check" type="checkbox" id="o-read" data-val="4" data-group="own" checked>
                            </div>
                            <div class="form-check form-switch d-flex justify-content-between align-items-center mb-3">
                                <label class="form-check-label fw-bold text-muted" for="o-write">Write (2)</label>
                                <input class="form-check-input ms-0 perm-check" type="checkbox" id="o-write" data-val="2" data-group="own" checked>
                            </div>
                            <div class="form-check form-switch d-flex justify-content-between align-items-center mb-0">
                                <label class="form-check-label fw-bold text-muted" for="o-exec">Execute (1)</label>
                                <input class="form-check-input ms-0 perm-check" type="checkbox" id="o-exec" data-val="1" data-group="own" checked>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card border-0 shadow-sm rounded-4 text-center h-100 bg-light">
                        <div class="card-body p-4">
                            <i class="fa-solid fa-users fa-2x text-success mb-3"></i>
                            <h4 class="fw-bold mb-4">Group</h4>
                            
                            <div class="form-check form-switch d-flex justify-content-between align-items-center mb-3">
                                <label class="form-check-label fw-bold text-muted" for="g-read">Read (4)</label>
                                <input class="form-check-input ms-0 perm-check" type="checkbox" id="g-read" data-val="4" data-group="grp" checked>
                            </div>
                            <div class="form-check form-switch d-flex justify-content-between align-items-center mb-3">
                                <label class="form-check-label fw-bold text-muted" for="g-write">Write (2)</label>
                                <input class="form-check-input ms-0 perm-check" type="checkbox" id="g-write" data-val="2" data-group="grp">
                            </div>
                            <div class="form-check form-switch d-flex justify-content-between align-items-center mb-0">
                                <label class="form-check-label fw-bold text-muted" for="g-exec">Execute (1)</label>
                                <input class="form-check-input ms-0 perm-check" type="checkbox" id="g-exec" data-val="1" data-group="grp" checked>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 text-center h-100 bg-light">
                        <div class="card-body p-4">
                            <i class="fa-solid fa-globe fa-2x text-danger mb-3"></i>
                            <h4 class="fw-bold mb-4">Public</h4>
                            
                            <div class="form-check form-switch d-flex justify-content-between align-items-center mb-3">
                                <label class="form-check-label fw-bold text-muted" for="p-read">Read (4)</label>
                                <input class="form-check-input ms-0 perm-check" type="checkbox" id="p-read" data-val="4" data-group="pub" checked>
                            </div>
                            <div class="form-check form-switch d-flex justify-content-between align-items-center mb-3">
                                <label class="form-check-label fw-bold text-muted" for="p-write">Write (2)</label>
                                <input class="form-check-input ms-0 perm-check" type="checkbox" id="p-write" data-val="2" data-group="pub">
                            </div>
                            <div class="form-check form-switch d-flex justify-content-between align-items-center mb-0">
                                <label class="form-check-label fw-bold text-muted" for="p-exec">Execute (1)</label>
                                <input class="form-check-input ms-0 perm-check" type="checkbox" id="p-exec" data-val="1" data-group="pub" checked>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Dashboard Output -->
            <div class="border rounded-4 overflow-hidden shadow-sm">
                <div class="row g-0">
                    <div class="col-md-4 border-end bg-white p-4 text-center">
                        <h6 class="text-uppercase fw-bold text-muted small tracking-wider mb-2">Numeric (Octal)</h6>
                        <input type="text" id="out-octal" class="form-control form-control-lg border-0 text-center fw-bold display-5 bg-transparent p-0" value="755" readonly style="letter-spacing: 4px;">
                    </div>
                    <div class="col-md-4 border-end bg-white p-4 text-center">
                        <h6 class="text-uppercase fw-bold text-muted small tracking-wider mb-2">Symbolic Notation</h6>
                        <input type="text" id="out-symbolic" class="form-control form-control-lg border-0 text-center fw-bold display-6 bg-transparent p-0 text-primary" value="-rwxr-xr-x" readonly style="font-family: var(--font-mono); font-size: 2rem;">
                    </div>
                    <div class="col-md-4 bg-dark text-white p-4 text-center d-flex flex-column justify-content-center position-relative">
                        <h6 class="text-uppercase fw-bold text-secondary small tracking-wider mb-2">Bash Command</h6>
                        <h4 id="out-bash" class="mb-0 fw-light text-warning" style="font-family: var(--font-mono);">chmod 755 .</h4>
                        <button class="btn btn-sm btn-outline-warning position-absolute top-50 end-0 translate-middle-y me-3" onclick="copyBash()"><i class="fa-regular fa-copy"></i></button>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center gap-2 mt-4">
                <button class="btn btn-sm btn-outline-secondary px-4" onclick="applyPreset('777')">777 (All)</button>
                <button class="btn btn-sm btn-outline-secondary px-4" onclick="applyPreset('755')">755 (Web Executable)</button>
                <button class="btn btn-sm btn-outline-secondary px-4" onclick="applyPreset('644')">644 (Web Data)</button>
                <button class="btn btn-sm btn-outline-secondary px-4" onclick="applyPreset('600')">600 (SSH Keys)</button>
            </div>

        
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Unix File Permissions Decoded</h2>
                    <p class="lead">Misconfiguring file permissions on a public-facing Linux web server is the primary vector for fatal security hacks. Defining absolute boundaries utilizing <code>chmod</code> dictates exactly which entity is allowed to manipulate server assets. Our <strong>Pro Chmod Calculator</strong> visualizes this binary logic flawlessly.</p>
            <!-- Features Cards -->
            
            </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Understanding the 3 Classes (UGO)</h3>
                    <ul>
                        <li><strong>Owner (User):</strong> The specific root or sudoer account that physically created the file on the bash disk. Usually needs maximum control (`7`).</li>
                        <li><strong>Group:</strong> The administrative grouping (like `www-data` in Apache deployments) containing several registered users natively.</li>
                        <li><strong>Public (Others):</strong> The entire global internet population. Allowing anonymous 'Others' to Write or Execute scripts (`777`) is catastrophic on security vectors unless dealing with isolated `/tmp` cache dumps.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Octal Mathematical Logic</h3>
                    <p>Unix constructs permissions via binary bits assigned to integer scores. <strong>Read (`r`) is strictly 4. Write (`w`) is strictly 2. Execute (`x`) is strictly 1.</strong> An octal number like `644` literally represents adding these integers inside their specific organizational buckets:</p>
                    <p>Owner gets `4(R) + 2(W) = 6`. Group gets `4(R)`. Public gets `4(R)`. Hence, 644 is born—allowing the admin to edit the file, while web crawlers can only read it.</p>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->



<style>
.text-gradient-primary { background: linear-gradient(45deg, #10b981, #0ea5e9); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.form-check-input { width: 3em !important; height: 1.5em; cursor: pointer; }
input:focus { outline: none !important; box-shadow: none !important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    
    const checkboxes = document.querySelectorAll('.perm-check');
    const outOctal = document.getElementById('out-octal');
    const outSym = document.getElementById('out-symbolic');
    const outBash = document.getElementById('out-bash');

    function calc() {
        let own = 0; let grp = 0; let pub = 0;
        let symOwn = ''; let symGrp = ''; let symPub = '';

        // Owner Loop
        own += document.getElementById('o-read').checked ? 4 : 0;
        symOwn += document.getElementById('o-read').checked ? 'r' : '-';
        own += document.getElementById('o-write').checked ? 2 : 0;
        symOwn += document.getElementById('o-write').checked ? 'w' : '-';
        own += document.getElementById('o-exec').checked ? 1 : 0;
        symOwn += document.getElementById('o-exec').checked ? 'x' : '-';

        // Group Loop
        grp += document.getElementById('g-read').checked ? 4 : 0;
        symGrp += document.getElementById('g-read').checked ? 'r' : '-';
        grp += document.getElementById('g-write').checked ? 2 : 0;
        symGrp += document.getElementById('g-write').checked ? 'w' : '-';
        grp += document.getElementById('g-exec').checked ? 1 : 0;
        symGrp += document.getElementById('g-exec').checked ? 'x' : '-';

        // Public Loop
        pub += document.getElementById('p-read').checked ? 4 : 0;
        symPub += document.getElementById('p-read').checked ? 'r' : '-';
        pub += document.getElementById('p-write').checked ? 2 : 0;
        symPub += document.getElementById('p-write').checked ? 'w' : '-';
        pub += document.getElementById('p-exec').checked ? 1 : 0;
        symPub += document.getElementById('p-exec').checked ? 'x' : '-';

        const octal = `${own}${grp}${pub}`;
        const symbolic = `-${symOwn}${symGrp}${symPub}`;
        
        outOctal.value = octal;
        outSym.value = symbolic;
        outBash.textContent = `chmod ${octal} <file>`;
    }

    // Attach Listeners
    checkboxes.forEach(cb => {
        cb.addEventListener('change', calc);
    });

    window.applyPreset = (octStr) => {
        const o = parseInt(octStr.charAt(0));
        const g = parseInt(octStr.charAt(1));
        const p = parseInt(octStr.charAt(2));

        // Binary bitwise extraction
        document.getElementById('o-read').checked = !!(o & 4);
        document.getElementById('o-write').checked = !!(o & 2);
        document.getElementById('o-exec').checked = !!(o & 1);

        document.getElementById('g-read').checked = !!(g & 4);
        document.getElementById('g-write').checked = !!(g & 2);
        document.getElementById('g-exec').checked = !!(g & 1);

        document.getElementById('p-read').checked = !!(p & 4);
        document.getElementById('p-write').checked = !!(p & 2);
        document.getElementById('p-exec').checked = !!(p & 1);

        calc();
    };

    window.copyBash = () => {
        navigator.clipboard.writeText(outBash.textContent);
        showToast('Bash Command Copied!');
    };

    // Initial Output Render
    calc();

});
</script>






