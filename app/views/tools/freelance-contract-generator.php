<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:2rem; margin-bottom:2rem;">
                <div>
                    <h4 style="font-weight:700;margin-bottom:1rem;color:var(--text-main);">Freelancer Details</h4>
                    <div style="display:grid;gap:1rem;">
                        <input type="text" id="fcFreelancer" class="form-control" placeholder="Freelancer Full Name">
                        <input type="text" id="fcFreelancerAddr" class="form-control" placeholder="Address">
                        <input type="email" id="fcFreelancerEmail" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div>
                    <h4 style="font-weight:700;margin-bottom:1rem;color:var(--text-main);">Client Details</h4>
                    <div style="display:grid;gap:1rem;">
                        <input type="text" id="fcClient" class="form-control" placeholder="Client Full Name / Company">
                        <input type="text" id="fcClientAddr" class="form-control" placeholder="Address">
                        <input type="email" id="fcClientEmail" class="form-control" placeholder="Email">
                    </div>
                </div>
            </div>

            <div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:1.5rem; margin-bottom:2rem;">
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Project Title</label>
                    <input type="text" id="fcProject" class="form-control" placeholder="e.g., Website Redesign">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Start Date</label>
                    <input type="date" id="fcStart" class="form-control">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">End Date</label>
                    <input type="date" id="fcEnd" class="form-control">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Total Fee ($)</label>
                    <input type="number" id="fcFee" class="form-control" value="5000" min="0" step="any">
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Payment Terms</label>
                    <select id="fcPaymentTerms" class="form-control">
                        <option value="50-50">50% Upfront, 50% on Completion</option>
                        <option value="milestone">Milestone-Based Payments</option>
                        <option value="completion">100% on Completion</option>
                        <option value="monthly">Monthly Invoicing</option>
                    </select>
                </div>
                <div>
                    <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Revision Rounds</label>
                    <input type="number" id="fcRevisions" class="form-control" value="3" min="0" step="1">
                </div>
            </div>

            <div style="margin-bottom:2rem;">
                <label style="display:block;font-weight:600;margin-bottom:0.5rem;font-size:0.9rem;">Scope of Work (Description)</label>
                <textarea id="fcScope" class="form-control" rows="4" placeholder="Describe the project scope, deliverables, and expectations..."></textarea>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="generateContractPDF()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Generate Contract PDF 📝
                </button>
            </div>
        </div>
    </div>

    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="<?php echo URL_ROOT; ?>/assets/js/business-tools.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('fcStart').value = today;
    const end = new Date(); end.setMonth(end.getMonth() + 2);
    document.getElementById('fcEnd').value = end.toISOString().split('T')[0];
});

function generateContractPDF() {
    const f = id => document.getElementById(id).value || '';
    const freelancer = f('fcFreelancer') || 'Freelancer';
    const client = f('fcClient') || 'Client';
    const fee = parseFloat(f('fcFee')) || 0;
    const revisions = f('fcRevisions') || '3';
    const payTerms = document.getElementById('fcPaymentTerms');
    const payText = payTerms.options[payTerms.selectedIndex].text;

    const content = [
        { text: 'FREELANCE SERVICE AGREEMENT', style: 'title', alignment: 'center' },
        { text: '\nThis Freelance Service Agreement ("Agreement") is entered into as of ' + (f('fcStart') || '[Start Date]') + ' by and between:\n\n', style: 'body' },
        { text: 'FREELANCER (Service Provider):', style: 'sectionHead' },
        { text: `${freelancer}\n${f('fcFreelancerAddr')}\n${f('fcFreelancerEmail')}\n\n`, style: 'body' },
        { text: 'CLIENT:', style: 'sectionHead' },
        { text: `${client}\n${f('fcClientAddr')}\n${f('fcClientEmail')}\n\n`, style: 'body' },

        { text: '1. SCOPE OF WORK', style: 'sectionHead' },
        { text: `Project: ${f('fcProject') || '[Project Title]'}\n\n${f('fcScope') || 'The Freelancer agrees to provide the services as described and agreed upon by both parties.'}\n\n`, style: 'body' },

        { text: '2. TIMELINE', style: 'sectionHead' },
        { text: `Start Date: ${f('fcStart') || '[TBD]'}\nEnd Date: ${f('fcEnd') || '[TBD]'}\n\nBoth parties agree to work diligently to meet the outlined timeline. Any delays must be communicated promptly.\n\n`, style: 'body' },

        { text: '3. COMPENSATION', style: 'sectionHead' },
        { text: `Total Fee: $${fee.toLocaleString()}\nPayment Terms: ${payText}\n\nLate payments beyond 15 days will incur a 1.5% monthly interest charge.\n\n`, style: 'body' },

        { text: '4. REVISIONS', style: 'sectionHead' },
        { text: `The Freelancer shall provide up to ${revisions} rounds of revisions on deliverables at no additional cost. Additional revisions beyond this will be billed at the Freelancer's standard hourly rate.\n\n`, style: 'body' },

        { text: '5. INTELLECTUAL PROPERTY', style: 'sectionHead' },
        { text: 'Upon full payment, all intellectual property rights for work created under this Agreement shall transfer to the Client. The Freelancer retains the right to display the work in their portfolio.\n\n', style: 'body' },

        { text: '6. CONFIDENTIALITY', style: 'sectionHead' },
        { text: 'Both parties agree to keep all project-related information confidential and not disclose proprietary information to third parties without prior written consent.\n\n', style: 'body' },

        { text: '7. TERMINATION', style: 'sectionHead' },
        { text: 'Either party may terminate this Agreement with 14 days written notice. In the event of termination, the Client shall pay for all work completed up to the termination date.\n\n', style: 'body' },

        { text: '8. LIMITATION OF LIABILITY', style: 'sectionHead' },
        { text: 'The Freelancer\'s total liability under this Agreement shall not exceed the total fees paid by the Client.\n\n', style: 'body' },

        { text: '\n\nAGREED AND ACCEPTED:\n\n', style: 'body' },
        { columns: [
            { stack: [
                { text: '____________________________', marginBottom: 5 },
                { text: freelancer, bold: true },
                { text: 'Freelancer', color: '#888' },
                { text: 'Date: _______________' }
            ]},
            { stack: [
                { text: '____________________________', marginBottom: 5 },
                { text: client, bold: true },
                { text: 'Client', color: '#888' },
                { text: 'Date: _______________' }
            ]}
        ]}
    ];

    pdfMake.createPdf({
        content,
        styles: {
            title: { fontSize: 18, bold: true, color: '#1e293b', marginBottom: 10 },
            sectionHead: { fontSize: 12, bold: true, color: '#2563eb', marginBottom: 6, marginTop: 4 },
            body: { fontSize: 10, lineHeight: 1.5, color: '#334155' }
        },
        defaultStyle: { fontSize: 10 }
    }).download('freelance-contract.pdf');

    BizTools.toast('Contract PDF generated!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>