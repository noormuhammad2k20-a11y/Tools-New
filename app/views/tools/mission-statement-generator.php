<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Company Name</label>
                    <input type="text" id="msCompany" class="form-control" placeholder="e.g., TechVentures Inc.">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Industry</label>
                    <input type="text" id="msIndustry" class="form-control" placeholder="e.g., Healthcare, Education, Finance">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Core Values (comma-separated)</label>
                    <input type="text" id="msValues" class="form-control" placeholder="e.g., innovation, integrity, excellence">
                </div>
                <div class="form-group">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">Target Audience</label>
                    <input type="text" id="msAudience" class="form-control" placeholder="e.g., small businesses, students, professionals">
                </div>
                <div class="form-group" style="grid-column: 1 / -1;">
                    <label style="display:block;font-weight:600;margin-bottom:0.75rem;color:var(--text-main);font-size:0.95rem;">What Do You Do? (brief description)</label>
                    <input type="text" id="msWhat" class="form-control" placeholder="e.g., provide cloud-based project management tools">
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 1.5rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <button type="button" onclick="generateMission()" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.15rem; font-weight: 700; border-radius: 14px; box-shadow: 0 10px 15px -3px var(--primary-glow);">
                    Generate Statements 🎯
                </button>
            </div>

            <div id="ms-results" style="display:none; margin-top: 3rem; padding-top: 2.5rem; border-top: 2px dashed var(--border);">
                <h3 style="margin:0 0 2rem 0; font-size:1.5rem; font-weight:800; color:var(--text-main);">Mission Statement Drafts</h3>
                <div id="ms-list" style="display:grid; gap:1.5rem;"></div>
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



<script src="<?php echo URL_ROOT; ?>/assets/js/business-tools.js"></script>
<script>
function generateMission() {
    const company = document.getElementById('msCompany').value.trim() || 'Our company';
    const industry = document.getElementById('msIndustry').value.trim() || 'our industry';
    const values = document.getElementById('msValues').value.split(',').map(v => v.trim()).filter(Boolean);
    const audience = document.getElementById('msAudience').value.trim() || 'our customers';
    const what = document.getElementById('msWhat').value.trim() || 'deliver exceptional products and services';
    const valStr = values.length > 0 ? values.join(', ') : 'excellence and innovation';

    const templates = [
        `At ${company}, our mission is to ${what} by fostering a culture of ${valStr}. We are committed to empowering ${audience} in the ${industry} space with solutions that drive meaningful impact and lasting success.`,
        `${company} exists to transform the way ${audience} experience ${industry}. Through our dedication to ${valStr}, we ${what} — creating value that goes beyond the ordinary and sets new standards of excellence.`,
        `Our mission at ${company} is simple yet ambitious: to ${what} for ${audience}. Guided by our core values of ${valStr}, we strive to be the most trusted partner in ${industry}, delivering innovation that matters.`,
        `${company} is driven by a singular purpose — to ${what}. We believe that by upholding ${valStr}, we can serve ${audience} in the ${industry} sector with integrity, passion, and unwavering commitment to quality.`,
        `We believe ${audience} deserve better. That's why ${company} was founded to ${what}, powered by the principles of ${valStr}. Our vision is a world where ${industry} solutions are accessible, impactful, and designed for the future.`
    ];

    const list = document.getElementById('ms-list');
    list.innerHTML = '';
    templates.forEach((stmt, i) => {
        list.innerHTML += `
        <div style="background:var(--bg-body);border:1px solid var(--border);border-radius:16px;padding:1.5rem;position:relative;">
            <div style="position:absolute;top:1rem;right:1rem;">
                <button type="button" onclick="navigator.clipboard.writeText(this.closest('div').querySelector('.ms-text').textContent);BizTools.toast('Copied!')" style="border:none;background:var(--primary-glow);color:var(--primary);border-radius:8px;padding:0.5rem 0.75rem;cursor:pointer;font-weight:600;font-size:0.8rem;">Copy</button>
            </div>
            <div style="font-size:0.75rem;font-weight:700;color:var(--primary);margin-bottom:0.75rem;text-transform:uppercase;">Draft ${i + 1}</div>
            <div class="ms-text" style="color:var(--text-main);line-height:1.7;font-size:1.05rem;">${stmt}</div>
        </div>`;
    });

    document.getElementById('ms-results').style.display = 'block';
    BizTools.toast('Mission statements generated!');
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>