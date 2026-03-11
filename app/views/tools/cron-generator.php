<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="row g-4 mb-4">
                <!-- Minutes -->
                <div class="col-md-4 col-lg-2">
                    <label class="form-label fw-bold small text-uppercase">Minutes</label>
                    <select id="cron-min" class="form-select rounded-pill">
                        <option value="*">Every Minute (*)</option>
                        <option value="*/5">Every 5 Min</option>
                        <option value="*/10">Every 10 Min</option>
                        <option value="*/15">Every 15 Min</option>
                        <option value="*/30">Every 30 Min</option>
                        <option value="0">At 0 Minute</option>
                    </select>
                </div>
                <!-- Hours -->
                <div class="col-md-4 col-lg-2">
                    <label class="form-label fw-bold small text-uppercase">Hours</label>
                    <select id="cron-hour" class="form-select rounded-pill">
                        <option value="*">Every Hour (*)</option>
                        <option value="*/2">Every 2 Hours</option>
                        <option value="*/4">Every 4 Hours</option>
                        <option value="*/6">Every 6 Hours</option>
                        <option value="*/12">Every 12 Hours</option>
                        <option value="0">Midnight (0)</option>
                    </select>
                </div>
                <!-- Day of Month -->
                <div class="col-md-4 col-lg-2">
                    <label class="form-label fw-bold small text-uppercase">Day (Month)</label>
                    <select id="cron-day" class="form-select rounded-pill">
                        <option value="*">Every Day (*)</option>
                        <option value="1">1st of Month</option>
                        <option value="15">15th of Month</option>
                    </select>
                </div>
                <!-- Month -->
                <div class="col-md-4 col-lg-2">
                    <label class="form-label fw-bold small text-uppercase">Month</label>
                    <select id="cron-month" class="form-select rounded-pill">
                        <option value="*">Every Month (*)</option>
                        <option value="1">January</option>
                        <option value="6">June</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <!-- Day of Week -->
                <div class="col-md-4 col-lg-2">
                    <label class="form-label fw-bold small text-uppercase">Day (Week)</label>
                    <select id="cron-weekday" class="form-select rounded-pill">
                        <option value="*">Any Weekday (*)</option>
                        <option value="1-5">Mon-Fri</option>
                        <option value="0,6">Weekends</option>
                        <option value="1">Monday</option>
                    </select>
                </div>
                <div class="col-md-4 col-lg-2 d-flex align-items-end">
                    <button id="generate-btn" class="btn btn-primary w-100 rounded-pill shadow">Generate <i class="fa-solid fa-sync ms-1"></i></button>
                </div>
            </div>

            <div id="result-wrapper" class="mt-4 pt-4 border-top">
                <div class="mb-4">
                    <label class="form-label fw-bold text-primary small text-uppercase tracking-widest">Cron Expression</label>
                    <div class="input-group">
                        <input type="text" id="cron-expression" class="form-control form-control-lg font-monospace bg-dark text-info border-0 text-center" value="* * * * *" readonly>
                        <button class="btn btn-primary px-4" onclick="copyResult()">Copy</button>
                    </div>
                </div>
                
                <div class="p-4 bg-light rounded-4 border">
                    <h6 class="fw-bold mb-3"><i class="fa-solid fa-circle-info text-primary me-2"></i>Human-Readable Summary</h6>
                    <p id="cron-human" class="lead mb-0 text-dark">“Running every minute, every hour, every day, every month, and every day of the week.”</p>
                </div>

                <div class="mt-4">
                    <label class="form-label fw-bold small text-uppercase">Linux Command Example</label>
                    <div class="bg-dark text-white p-3 rounded-3 font-monospace" style="font-size: 14px;">
                        <span class="text-secondary">$</span> crontab -e<br>
                        <span id="cron-example" class="text-warning">* * * * *</span> /path/to/your/script.sh >> /var/log/cron.log 2>&1
                    </div>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Automating Your Server Tasks with Cron Jobs</h2>
                    <p class="lead">Cron jobs are time-based software utilities in Unix-like operating systems. They allow users to schedule jobs (commands or scripts) to run periodically at fixed times, dates, or intervals. Our <strong>Cron Job Generator</strong> simplifies the process of creating these complex expressions, ensuring your tasks run exactly when they should.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Understanding the Cron Syntax</h3>
                    <p>A standard cron expression consists of five fields separated by white spaces:</p>
                    <ul>
                        <li><strong>Minute (0 - 59):</strong> When during the hour the task runs.</li>
                        <li><strong>Hour (0 - 23):</strong> The hour of the day (24-hour format).</li>
                        <li><strong>Day of Month (1 - 31):</strong> Which day of the calendar month.</li>
                        <li><strong>Month (1 - 12):</strong> The specific month of the year.</li>
                        <li><strong>Day of Week (0 - 6):</strong> Sunday to Saturday (0 or 7 is usually Sunday).</li>
                    </ul>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Common Cron Use Cases</h3>
                    <p>Developers use cron jobs for various automated tasks, including:</p>
                    <ol>
                        <li><strong>Database Backups:</strong> Scheduling nightly or weekly exports of critical data.</li>
                        <li><strong>Log Rotation:</strong> Compressing and archiving log files to prevent disk usage spikes.</li>
                        <li><strong>Automated Testing:</strong> Running a suite of tests every morning at 3 AM.</li>
                        <li><strong>Cache Clearing:</strong> Removing temporary files or clearing application caches periodically.</li>
                    </ol>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Why Use a Generator?</h3>
                    <p>While the syntax is simple once learned, it's incredibly easy to make a small error that results in a task running too frequently or not at all. Our generator provides an interactive UI that translates your requirements into valid syntax instantly, providing a human-readable explanation to verify your logic before you deploy to a production server.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Privacy and Offline Generation</h3>
                    <p>Your server schedules are part of your infrastructure's blueprint. Our generator runs entirely on the client side. We don't track your scripts or your scheduling habits. Everything stays in your browser's local memory, providing a secure and private experience.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #3b82f6, #6366f1); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
#cron-expression { letter-spacing: 5px; font-weight: bold; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const selects = ['cron-min', 'cron-hour', 'cron-day', 'cron-month', 'cron-weekday'];
    const expressionInput = document.getElementById('cron-expression');
    const humanOutput = document.getElementById('cron-human');
    const exampleOutput = document.getElementById('cron-example');
    const generateBtn = document.getElementById('generate-btn');

    function generateCron() {
        const parts = selects.map(id => document.getElementById(id).value);
        const exp = parts.join(' ');
        expressionInput.value = exp;
        exampleOutput.textContent = exp;
        
        // Simple human summary logic
        let summary = "Running ";
        summary += parts[0] === '*' ? "every minute, " : `at minute ${parts[0]}, `;
        summary += parts[1] === '*' ? "every hour, " : `at hour ${parts[1]}, `;
        summary += parts[2] === '*' ? "every day, " : `on day ${parts[2]} of the month, `;
        summary += parts[3] === '*' ? "every month, " : `in month ${parts[3]}, `;
        summary += parts[4] === '*' ? "and any weekday." : `and on weekday(s) ${parts[4]}.`;
        
        humanOutput.textContent = `“${summary}”`;
    }

    generateBtn.addEventListener('click', generateCron);
    
    // Initial generation
    generateCron();

    window.copyResult = () => {
        expressionInput.select();
        document.execCommand('copy');
        showToast('Cron expression copied!');
    };
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>