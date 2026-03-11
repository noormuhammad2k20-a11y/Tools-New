<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="form-group mb-4">
                <label class="form-label fw-bold">Enter Binary Number</label>
                <input type="text" id="bin-input" class="form-control form-control-lg font-monospace" placeholder="e.g. 101010" autofocus>
            </div>
            
            <div class="d-flex gap-3 mb-4">
                <button id="convert-btn" class="btn btn-primary btn-lg px-5 rounded-pill shadow">Convert <i class="fa-solid fa-arrow-right-arrow-left ms-2"></i></button>
                <button id="clear-btn" class="btn btn-link text-muted">Clear</button>
            </div>

            <div id="result-wrapper" class="mt-4 pt-4 border-top" style="display: none;">
                <label class="form-label fw-bold text-primary small text-uppercase tracking-widest">Decimal Result</label>
                <div class="input-group">
                    <input type="text" id="dec-output" class="form-control form-control-lg bg-dark text-info border-0 font-monospace" readonly>
                    <button class="btn btn-primary" onclick="copyResult()">Copy</button>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Mastering Binary to Decimal Transformation</h2>
                    <p class="lead">In the world of computing, everything eventually boils down to ones and zeros. While computers "think" in binary (Base-2), humans navigate the world using the decimal system (Base-10). Our <strong>Binary to Decimal Converter</strong> is a professional utility that bridges this gap, allowing developers, students, and engineers to translate machine-level data into understandable numbers instantly.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">How Binary Conversion Works</h3>
                    <p>Binary is a positional numeral system using only 0 and 1. Each digit in a binary number represents a power of 2. To convert a binary string to decimal, you multiply each digit by 2 raised to the power of its position (starting from 0 on the right) and sum the results.</p>
                    <p>For example, the binary <code>1011</code> is calculated as:</p>
                    <ul>
                        <li>(1 × 2³) + (0 × 2²) + (1 × 2¹) + (1 × 2⁰)</li>
                        <li>8 + 0 + 2 + 1 = <strong>11</strong></li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why Use This Tool?</h3>
                    <ol>
                        <li><strong>Network Engineering:</strong> Calculating subnet masks and IP address boundaries often requires manual binary manipulation.</li>
                        <li><strong>Embedded Systems:</strong> Developers working with microcontrollers and register settings frequently deal with bitmasks and binary flags.</li>
                        <li><strong>Academic Study:</strong> An essential tool for Computer Science students learning the foundations of digital logic and data representation.</li>
                        <li><strong>Software Debugging:</strong> Inspecting memory dumps or low-level file headers where data is represented in bitstreams.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Privacy First</h3>
                    <p>Our converter works <strong>100% Client-Side</strong>. No data is sent to our servers. All calculations are performed instantly in your browser, ensuring your technical data remains private and secure.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #2563eb, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('bin-input');
    const output = document.getElementById('dec-output');
    const convertBtn = document.getElementById('convert-btn');
    const clearBtn = document.getElementById('clear-btn');
    const wrapper = document.getElementById('result-wrapper');

    convertBtn.addEventListener('click', () => {
        const val = input.value.trim();
        if(!/^[01]+$/.test(val)) {
            showToast('Invalid binary format!', 'error');
            return;
        }
        output.value = parseInt(val, 2);
        wrapper.style.display = 'block';
    });

    clearBtn.addEventListener('click', () => {
        input.value = '';
        wrapper.style.display = 'none';
        input.focus();
    });

    window.copyResult = () => {
        output.select();
        document.execCommand('copy');
        showToast('Decimal copied!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>