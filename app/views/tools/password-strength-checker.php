

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Input Area -->
            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block px-1">Security Audit</label>
                    <div class="relative group">
                        <input type="password" id="pass-input" class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl p-4 pr-14 text-lg font-mono focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all outline-none" placeholder="Paste or type password...">
                        <button id="toggle-pass" class="absolute top-1/2 right-4 -translate-y-1/2 p-2 text-slate-400 hover:text-indigo-600 transition-colors">
                            <i class="fa-solid fa-eye text-xl"></i>
                        </button>
                    </div>
                </div>

                <div class="space-y-4 pt-2">
                    <div class="flex justify-between items-center px-1">
                        <span class="text-xs font-bold text-slate-500">Security Score</span>
                        <span id="strength-label" class="text-xs font-black text-slate-400 uppercase tracking-wider">Awaiting Input</span>
                    </div>
                    <div class="h-3 bg-slate-100 rounded-full overflow-hidden shadow-inner flex">
                        <div id="strength-bar" class="h-full transition-all duration-700 ease-out" style="width: 0%"></div>
                    </div>
                    <div id="strength-meter-text" class="text-center py-4 rounded-2xl bg-slate-900 text-slate-400 font-mono text-xl font-black tracking-widest lowercase shadow-xl hidden">
                        score: null
                    </div>
                </div>
            </div>

            <!-- Analysis Box -->
            <div id="analysis-box" class="bg-slate-50 border border-slate-100 rounded-3xl p-6 lg:p-8 space-y-6 opacity-40 grayscale pointer-events-none transition-all duration-500">
                <div class="flex items-center gap-3 pb-4 border-b border-slate-200/60">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-sm text-indigo-600">
                        <i class="fa-solid fa-magnifying-glass-chart"></i>
                    </div>
                    <h5 class="font-bold text-slate-900 uppercase tracking-tight text-sm">Forensic Analysis</h5>
                </div>

                <div class="grid grid-cols-1 gap-6">
                    <div class="space-y-1">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block">Time to Crack</label>
                        <div id="crack-time" class="text-2xl font-black text-slate-900 tracking-tight">---</div>
                        <p class="text-[10px] text-slate-400 italic font-medium">Estimated online attack duration</p>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block">Security Feedback</label>
                        <div id="feedback-txt" class="text-sm text-slate-600 leading-relaxed font-medium bg-white p-4 rounded-2xl border border-slate-100 italic shadow-sm">
                            Enter a password to initiate diagnostic scan...
                        </div>
                    </div>

                    <div id="warnings" class="p-4 bg-rose-50 border border-rose-100 rounded-2xl flex items-start gap-3 hidden animate-pulse">
                        <i class="fa-solid fa-triangle-exclamation text-rose-500 mt-0.5"></i>
                        <div class="text-xs text-rose-700 font-bold leading-tight" id="warning-txt"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'Password Strength Checker',
    'intro_title' => 'Password Strength: The Scientific Audit of Credential Resilience',
    'intro_content' => 'Is your password a digital fortress or a transparent threshold? Our Professional Password Strength Checker provides a deep algorithmic audit of your credentials, measuring computational resistance against modern cracking techniques. By leveraging the industry-standard Entropy Calculation and sophisticated pattern-matching heuristics, this tool identifies predictable sequences, dictionary-based vulnerabilities, and structural weaknesses that human intuition often misses.',
    'detailed_title' => 'Understanding Entropy vs. Complexity in Password Security',
    'detailed_content' => '<p>True password strength is measured in "bits of entropy"—the mathematical uncertainty that an attacker must navigate. Our analyzer evaluates your keys using zero-trust local processing:</p>
        <ul class="space-y-2 mt-4">
            <li><strong>Bit-Depth Analysis:</strong> Calculates the mathematical resistance of your password based on character-set variety and length.</li>
            <li><strong>Dictionary Pattern Matching:</strong> Detects common words, keyboard patterns (like "qwerty"), and cultural references that automated harvesters exploit.</li>
            <li><strong>Crack-Time Estimation:</strong> Provides realistic benchmarks for how long it would take specialized hardware to brute-force your credential in an online scenario.</li>
            <li><strong>Privacy-Locked Audit:</strong> All analysis occurs entirely within your browser\'s memory. Your sensitive passwords are never transmitted, logged, or cached on our servers.</li>
        </ul>'
]);
?>


<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('pass-input');
    const toggle = document.getElementById('toggle-pass');
    const label = document.getElementById('strength-label');
    const bar = document.getElementById('strength-bar');
    const crackTime = document.getElementById('crack-time');
    const feedback = document.getElementById('feedback-txt');
    const warningBox = document.getElementById('warnings');
    const warningTxt = document.getElementById('warning-txt');
    const analysisBox = document.getElementById('analysis-box');

    toggle.addEventListener('click', () => {
        const type = input.type === 'password' ? 'text' : 'password';
        input.type = type;
        toggle.innerHTML = type === 'password' ? '<i class="fa-solid fa-eye text-xl"></i>' : '<i class="fa-solid fa-eye-slash text-xl text-indigo-500"></i>';
    });

    input.addEventListener('input', () => {
        const val = input.value;
        if (!val) {
            resetUI();
            return;
        }

        const res = zxcvbn(val);
        const score = res.score; // 0 to 4

        const ratings = [
            { text: 'Extremely Vulnerable', color: 'bg-rose-500 shadow-[0_0_15px_rgba(244,63,94,0.4)]', textCol: 'text-rose-500' },
            { text: 'Weak / Predictable', color: 'bg-orange-500 shadow-[0_0_15px_rgba(249,115,22,0.4)]', textCol: 'text-orange-500' },
            { text: 'Fair / Better', color: 'bg-amber-500 shadow-[0_0_15px_rgba(245,158,11,0.4)]', textCol: 'text-amber-500' },
            { text: 'Good Security', color: 'bg-emerald-500 shadow-[0_0_15px_rgba(16,185,129,0.4)]', textCol: 'text-emerald-500' },
            { text: 'Strong / Bulletproof', color: 'bg-indigo-600 shadow-[0_0_15px_rgba(79,70,229,0.4)]', textCol: 'text-indigo-600' }
        ];

        // Activate Analysis Box
        analysisBox.classList.remove('opacity-40', 'grayscale', 'pointer-events-none');
        
        bar.style.width = ((score + 1) * 20) + '%';
        bar.className = 'h-full transition-all duration-700 ease-out ' + ratings[score].color;
        
        label.textContent = ratings[score].text;
        label.className = 'text-xs font-black uppercase tracking-wider transition-colors duration-300 ' + ratings[score].textCol;

        crackTime.textContent = res.crack_times_display.online_no_throttling_10_per_second;
        crackTime.className = 'text-2xl font-black tracking-tight transition-colors duration-300 ' + ratings[score].textCol;
        
        let suggestions = res.feedback.suggestions.join('. ') || 'This password architecture meets high-entropy security criteria.';
        feedback.textContent = suggestions;
        feedback.className = 'text-sm text-slate-600 leading-relaxed font-medium bg-white p-4 rounded-2xl border border-slate-100 italic shadow-sm border-l-4 ' + (score < 2 ? 'border-l-rose-500' : 'border-l-indigo-500');

        if (res.feedback.warning) {
            warningTxt.textContent = res.feedback.warning;
            warningBox.classList.remove('hidden');
        } else {
            warningBox.classList.add('hidden');
        }
    });

    function resetUI() {
        analysisBox.classList.add('opacity-40', 'grayscale', 'pointer-events-none');
        bar.style.width = '0%';
        label.textContent = 'Awaiting Input';
        label.className = 'text-xs font-black text-slate-400 uppercase tracking-wider';
        crackTime.textContent = '---';
        crackTime.className = 'text-2xl font-black text-slate-900 tracking-tight';
        feedback.textContent = 'Enter a password to initiate diagnostic scan...';
        feedback.className = 'text-sm text-slate-600 leading-relaxed font-medium bg-white p-4 rounded-2xl border border-slate-100 italic shadow-sm';
        warningBox.classList.add('hidden');
    }
});
</script>






