<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-3 border-bottom gap-3">
                
                <div class="d-flex gap-2">
                    <button class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm fw-bold" onclick="addRow()"><i class="fa-solid fa-folder-plus me-1"></i> Add Row</button>
                    <button class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm fw-bold" onclick="addCol()"><i class="fa-solid fa-plus me-1"></i> Add Column</button>
                </div>
                
                <div class="d-flex align-items-center gap-3">
                    <label class="small fw-bold text-muted mb-0"><i class="fa-solid fa-align-center me-1"></i>Alignment</label>
                    <div class="btn-group shadow-sm" role="group">
                        <input type="radio" class="btn-check align-selector" name="tbl-align" id="btn-left" value="left" autocomplete="off" checked>
                        <label class="btn btn-outline-secondary btn-sm px-3" for="btn-left"><i class="fa-solid fa-align-left"></i></label>
                        <input type="radio" class="btn-check align-selector" name="tbl-align" id="btn-center" value="center" autocomplete="off">
                        <label class="btn btn-outline-secondary btn-sm px-3" for="btn-center"><i class="fa-solid fa-align-center"></i></label>
                        <input type="radio" class="btn-check align-selector" name="tbl-align" id="btn-right" value="right" autocomplete="off">
                        <label class="btn btn-outline-secondary btn-sm px-3" for="btn-right"><i class="fa-solid fa-align-right"></i></label>
                    </div>
                </div>

                <button class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-bold" onclick="resetGrid()"><i class="fa-solid fa-trash-can me-1"></i> Clear Grid</button>

            </div>

            <div class="table-responsive mb-4 pb-2">
                <table class="table table-bordered border-primary border-opacity-25" id="md-table">
                    <thead class="bg-light" id="md-thead">
                        <tr>
                            <!-- Injected by JS -->
                        </tr>
                    </thead>
                    <tbody id="md-tbody">
                        <!-- Injected by JS -->
                    </tbody>
                </table>
            </div>

            <!-- Output Block -->
            <div class="bg-dark rounded-4 p-4 shadow-sm position-relative mt-2 border">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0 text-white"><i class="fa-brands fa-markdown me-2 text-primary"></i>Markdown Output</h5>
                    <button class="btn btn-sm btn-primary rounded-pill px-4 shadow-sm fw-bold" onclick="copyMd()"><i class="fa-regular fa-copy me-2"></i>Copy Markdown</button>
                </div>
                
                <textarea id="out-md" class="form-control bg-transparent text-light border-0 p-0" rows="10" readonly style="font-family: var(--font-mono); font-size: 14px; resize: none; word-break: break-all; outline: none !important; box-shadow: none !important;"></textarea>
            </div>

        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Architecting Markdown Documents</h2>
                    <p class="lead">Creating raw documentation inside GitHub READMEs or utilizing SSGs (Static Site Generators) like Hugo or Docusaurus relies entirely on Markdown syntax. Regrettably, manually typing out perfectly aligned Matrix Tables using raw Pipe <code>|</code> characters is incredibly volatile. Our <strong>Pro visual Markdown Table Generator</strong> resolves this tedious layout process instantly.</p>
            <!-- Features Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 not-prose mt-8 mb-8">
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-bolt"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Lightning Fast</h4>
                    <p class="text-sm text-gray-500">Get your results instantly without waiting or reloading.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-shield-halved"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">100% Secure</h4>
                    <p class="text-sm text-gray-500">All data processing happens securely in your own browser.</p>
                </div>
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center shadow-sm">
                    <div class="w-12 h-12 bg-white text-primary rounded-full flex items-center justify-center text-xl mx-auto mb-4 border border-gray-100"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                    <h4 class="font-bold text-gray-900 mb-2">Easy to Use</h4>
                    <p class="text-sm text-gray-500">No complex settings, just drop your data and execute.</p>
                </div>
            </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">GitHub Flavored Markdown (GFM) Compatibility</h3>
                    <p>Standard Markdown (officially formulated by John Gruber) completely lacks systemic table abstractions natively. To combat this, developers universally utilize GFM extensions. Our algorithmic compiler actively generates perfect GFM header separator boundaries using the syntax <code>| --- | :---: | ---: |</code> to designate column spacing and exact text alignments respectively.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Mathematical Zero-Dependency Compiling</h3>
                    <p>Because privacy and operational execution speed are critical when documenting proprietary software, this table module does not transmit your typed contents securely via REST POST requests. The table array is iterated entirely via local document querying natively within the browser, calculating padding schemas organically to formulate perfect alignments.</p>
        </article>
    </div>
</section>

<!-- Suggested Tools Strip -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-suggested.php'; ?>

<!-- Popular Tools Section -->
<section class="bg-white py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Most Popular Tools</h2>
            <a href="<?php echo URL_ROOT; ?>" class="text-sm font-medium text-primary hover:text-primary-hover transition-colors">See All &rarr;</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php 
            $allToolsRegistry = require CONFIG . DS . 'tools_registry.php';
            $popularTools = array_slice($allToolsRegistry, 0, 4, true); 
            foreach ($popularTools as $pSlug => $pTool): 
            ?>
            <a href="<?php echo URL_ROOT; ?>/<?php echo $pSlug; ?>" class="group bg-gray-50 border border-gray-200 rounded-xl p-5 flex gap-4 items-start hover:border-primary/50 hover:shadow-lg hover:shadow-primary/5 transition-all duration-200">
                <div class="flex-shrink-0 w-12 h-12 bg-white text-primary rounded-lg flex items-center justify-center text-xl group-hover:bg-primary group-hover:text-white transition-colors duration-200 shadow-sm border border-gray-100">
                    <?php echo render_tool_icon($pTool['icon']); ?>
                </div>
                <div class="flex-grow min-w-0">
                    <h3 class="text-base font-semibold text-gray-900 truncate mb-1 group-hover:text-primary transition-colors"><?php echo htmlspecialchars($pTool['title']); ?></h3>
                    <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed"><?php echo htmlspecialchars($pTool['desc']); ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<style>
.text-gradient-primary { background: linear-gradient(45deg, #0f172a, #334155); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.md-cell { width: 100%; min-width: 150px; border: none; outline: none; background: transparent; padding: 5px; }
.md-cell:focus { background-color: rgba(13,110,253, 0.05); }
.table>thead { border-bottom: 2px solid var(--primary); }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const tHead = document.getElementById('md-thead').querySelector('tr');
    const tBody = document.getElementById('md-tbody');
    const outMd = document.getElementById('out-md');
    
    let colAmt = 3;
    let rowAmt = 3;

    function buildGrid() {
        // Headers
        tHead.innerHTML = '';
        tHead.innerHTML += `<th class="text-center align-middle" style="width: 40px; background: #e2e8f0;"></th>`;
        for (let i = 0; i < colAmt; i++) {
            tHead.innerHTML += `<th><input type="text" class="md-cell fw-bold update-trigger" placeholder="Header ${i+1}"></th>`;
        }

        // Rows
        tBody.innerHTML = '';
        for (let r = 0; r < rowAmt; r++) {
            let tr = document.createElement('tr');
            tr.innerHTML += `<td class="text-center align-middle text-muted fw-bold" style="background: #f8fafc; font-size:12px;">${r+1}</td>`;
            for (let c = 0; c < colAmt; c++) {
                tr.innerHTML += `<td><input type="text" class="md-cell update-trigger" placeholder="Cell Data"></td>`;
            }
            tBody.appendChild(tr);
        }

        attachListeners();
        generateMd();
    }

    function attachListeners() {
        document.querySelectorAll('.update-trigger').forEach(input => {
            input.addEventListener('input', generateMd);
        });
    }

    // Generator formatting function keeping visual aesthetics clean via string padding
    function generateMd() {
        const align = document.querySelector('input[name="tbl-align"]:checked').value;
        
        let md = '';
        
        // Extract inputs
        const headInputs = tHead.querySelectorAll('input');
        const rows = document.querySelectorAll('#md-tbody tr');

        // Pass 1: find max width per column to make it look pretty in raw text
        let colWidths = new Array(colAmt).fill(0);
        
        for(let i=0; i<colAmt; i++) {
            let hw = headInputs[i].value.trim().length || `Header ${i+1}`.length;
            if(hw > colWidths[i]) colWidths[i] = hw;
        }

        rows.forEach(row => {
            const cells = row.querySelectorAll('input');
            cells.forEach((cell, i) => {
                let cw = cell.value.trim().length;
                if(cw > colWidths[i]) colWidths[i] = cw;
            });
        });

        // Ensure minimum sizing for dashes
        colWidths = colWidths.map(w => w < 3 ? 3 : w);

        const padString = (str, len, alignStyle) => {
            if(!str) str = ''; // Handle empty
            
            // For now, standardize on left-padding visual alignment in raw text for simplicity
            // or we could center pad. Let's just trailing-space pad natively for left read.
            return str.padEnd(len, ' ');
        };

        // Header Line
        let headLine = '| ';
        for(let i=0; i<colAmt; i++) {
            const raw = headInputs[i].value.trim() || `Header ${i+1}`;
            headLine += padString(raw, colWidths[i]) + ' | ';
        }
        md += headLine.trim() + '\n';

        // Separator Line
        let sepLine = '|';
        for(let i=0; i<colAmt; i++) {
            let dashes = '-'.repeat(colWidths[i]);
            if(align === 'center') dashes = ':' + '-'.repeat(colWidths[i]-2) + ':';
            if(align === 'right') dashes = '-'.repeat(colWidths[i]-1) + ':';
            
            sepLine += ' ' + dashes + ' |';
        }
        md += sepLine + '\n';

        // Body Lines
        rows.forEach(row => {
            let bLine = '| ';
            const cells = row.querySelectorAll('input');
            cells.forEach((cell, i) => {
                const raw = cell.value.trim();
                bLine += padString(raw, colWidths[i]) + ' | ';
            });
            md += bLine.trim() + '\n';
        });

        outMd.value = md;
    }

    window.addRow = () => {
        rowAmt++;
        buildGrid();
    };

    window.addCol = () => {
        colAmt++;
        buildGrid();
    };

    window.resetGrid = () => {
        colAmt = 3;
        rowAmt = 3;
        buildGrid();
    };

    document.querySelectorAll('.align-selector').forEach(sel => {
        sel.addEventListener('change', generateMd);
    });

    window.copyMd = () => {
        if(!outMd.value) return;
        outMd.select();
        document.execCommand('copy');
        showToast('Markdown output copied!');
    };

    // Init Engine
    buildGrid();

    // Default sample data injection over top of placeholders essentially
    setTimeout(() => {
        const hi = tHead.querySelectorAll('input');
        hi[0].value = 'Property'; hi[1].value = 'Data Type'; hi[2].value = 'Required';
        
        const ri = tBody.querySelectorAll('tr')[0].querySelectorAll('input');
        ri[0].value = 'id'; ri[1].value = 'Integer'; ri[2].value = 'True';
        
        generateMd(); // Fire again
    }, 100);
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>