

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
        <div class="max-w-2xl mx-auto">
            <div class="bg-slate-50 border-2 border-slate-100 rounded-[2.5rem] p-8 md:p-12 text-center relative overflow-hidden group hover:border-blue-200 transition-all duration-500">
                <!-- Background Decorative Elements -->
                <div class="absolute -top-24 -right-24 w-48 h-48 bg-blue-500/5 rounded-full blur-3xl group-hover:bg-blue-500/10 transition-colors"></div>
                <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-indigo-500/5 rounded-full blur-3xl group-hover:bg-indigo-500/10 transition-colors"></div>

                <label class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mb-6 block">IIN/IID Network Validation</label>
                
                <div class="relative mb-8">
                    <input type="text" id="card-input" class="w-full bg-white border-2 border-slate-200 rounded-2xl py-6 px-10 text-2xl md:text-3xl font-mono font-bold text-slate-900 text-center tracking-widest focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none placeholder:text-slate-200 shadow-sm" placeholder="#### #### #### ####">
                    <div id="card-brand-icon" class="absolute right-6 top-1/2 -translate-y-1/2 text-4xl text-slate-200 transition-all duration-500 opacity-40">
                        <i class="fa-regular fa-credit-card"></i>
                    </div>
                </div>
                
                <div id="validation-result" class="hidden transform translate-y-4 opacity-0 transition-all duration-500">
                    <div class="inline-flex items-center gap-3 px-8 py-4 rounded-full shadow-xl shadow-blue-500/20 animate-bounce-subtle">
                        <i id="res-icon" class="text-xl"></i>
                        <span id="res-text" class="text-sm font-black uppercase tracking-widest"></span>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8">
                <div class="bg-white border border-slate-100 p-5 rounded-3xl shadow-sm hover:shadow-md transition-shadow group">
                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1 group-hover:text-blue-600 transition-colors">Issuing Network</div>
                    <div id="info-brand" class="text-lg font-bold text-slate-900">N/A</div>
                </div>
                <div class="bg-white border border-slate-100 p-5 rounded-3xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Standard</div>
                    <div class="text-lg font-bold text-slate-900">Luhn (Mod 10)</div>
                </div>
                <div class="bg-white border border-slate-100 p-5 rounded-3xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Security</div>
                    <div class="text-lg font-bold text-slate-900">Zero-Xfer</div>
                </div>
            </div>
        </div>
    </div>


<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'Credit Card Validator',
    'intro_title' => 'Credit Card Validator: Precision Audit via Luhn Algorithm',
    'intro_content' => 'In the complex ecosystem of digital commerce, verifying the structural integrity of payment data is a critical first step for both user experience and fraud prevention. Our Professional Credit Card Validator leverages the industry-standard Luhn Algorithm (Mod 10) to instantly determine if a card number is mathematically valid. It also parses the Issuer Identification Number (IIN) to identify the global network—including Visa, Mastercard, American Express, and Discover—providing essential metadata for developers and fintech auditors.',
    'detailed_title' => 'The Architecture of Payment Card Validation',
    'detailed_content' => '<p>Structural validation is the first line of defense in payment processing, ensuring that only correctly formatted numbers hit your processing gateway:</p>
        <ul class="space-y-2 mt-4">
            <li><strong>Luhn Algorithm Checksum:</strong> Performs a mathematical cross-check of the account number against the checksum digit to identify typos and common input errors.</li>
            <li><strong>MII/IIN Identification:</strong> Automatically detects the Major Industry Identifier (MII) to determine the card\'s issuing sector and brand.</li>
            <li><strong>ISO/IEC 7812 Compliance:</strong> Ensures the number meets the strict international standards for identification cards, including length and internal prefix requirements.</li>
            <li><strong>Zero-Retention Privacy:</strong> All validation happens in your browser\'s local execution context. We never transmit, log, or record sensitive payment numbers on our servers.</li>
        </ul>'
]);
?>


<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('card-input');
    const resultBox = document.getElementById('validation-result');
    const resIcon = document.getElementById('res-icon');
    const resText = document.getElementById('res-text');
    const brandInfo = document.getElementById('info-brand');
    const brandIcon = document.getElementById('card-brand-icon');

    input.addEventListener('input', (e) => {
        let val = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
        // Formatting (grouped by 4)
        let formatted = val.match(/.{1,4}/g)?.join(' ') || val;
        input.value = formatted;

        if (val.length < 13) {
            resultBox.classList.add('hidden', 'opacity-0', 'translate-y-4');
            brandInfo.textContent = 'N/A';
            brandIcon.innerHTML = '<i class="fa-regular fa-credit-card"></i>';
            brandIcon.className = 'absolute right-6 top-1/2 -translate-y-1/2 text-4xl text-slate-200 transition-all duration-500 opacity-40';
            return;
        }

        const isValid = luhnCheck(val);
        const brand = getCardBrand(val);

        // Show Result with Animation
        resultBox.classList.remove('hidden');
        setTimeout(() => {
            resultBox.classList.remove('opacity-0', 'translate-y-4');
        }, 10);

        const container = resultBox.querySelector('div');
        if (isValid) {
            container.className = 'inline-flex items-center gap-3 px-8 py-4 rounded-full shadow-xl shadow-emerald-500/20 bg-gradient-to-r from-emerald-500 to-teal-400 text-white animate-bounce-subtle';
            resIcon.className = 'fa-solid fa-circle-check text-xl';
            resText.textContent = `Valid ${brand.name} Card`;
            brandIcon.className = 'absolute right-6 top-1/2 -translate-y-1/2 text-4xl text-emerald-500 transition-all duration-500 scale-110 opacity-100';
        } else {
            container.className = 'inline-flex items-center gap-3 px-8 py-4 rounded-full shadow-xl shadow-rose-500/20 bg-gradient-to-r from-rose-500 to-pink-500 text-white';
            resIcon.className = 'fa-solid fa-circle-xmark text-xl';
            resText.textContent = 'Invalid Card Structure';
            brandIcon.className = 'absolute right-6 top-1/2 -translate-y-1/2 text-4xl text-rose-500 transition-all duration-500 opacity-100';
        }
        
        brandInfo.textContent = brand.name;
        brandInfo.className = 'text-lg font-bold transition-colors ' + (isValid ? 'text-emerald-600' : 'text-rose-600');
        brandIcon.innerHTML = `<i class="fa-brands fa-cc-${brand.icon}"></i>`;
    });

    function luhnCheck(num) {
        let sum = 0;
        let shouldDouble = false;
        for (let i = num.length - 1; i >= 0; i--) {
            let digit = parseInt(num.charAt(i));
            if (shouldDouble) {
                if ((digit *= 2) > 9) digit -= 9;
            }
            sum += digit;
            shouldDouble = !shouldDouble;
        }
        return (sum % 10 === 0);
    }

    function getCardBrand(num) {
        if (/^4/.test(num)) return { name: 'Visa', icon: 'visa' };
        if (/^5[1-5]/.test(num)) return { name: 'MasterCard', icon: 'mastercard' };
        if (/^3[47]/.test(num)) return { name: 'Amex', icon: 'amex' };
        if (/^6(?:011|5)/.test(num)) return { name: 'Discover', icon: 'discover' };
        if (/^3(?:0[0-5]|[68])/.test(num)) return { name: 'Diners Club', icon: 'diners-club' };
        if (/^JCB/.test(num) || /^35/.test(num)) return { name: 'JCB', icon: 'jcb' };
        return { name: 'Unknown', icon: 'credit-card' };
    }
});
</script>






