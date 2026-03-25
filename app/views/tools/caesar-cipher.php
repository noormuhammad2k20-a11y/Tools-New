

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Input Area -->
            <div class="space-y-4">
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Message to Process</label>
                <textarea id="text-input" class="w-full px-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-base min-h-[200px]" placeholder="Type your message here..."></textarea>
            </div>

            <!-- Configuration -->
            <div class="space-y-6 bg-gray-50 rounded-2xl p-6 border border-gray-100">
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <label class="text-sm font-bold text-gray-700 uppercase tracking-wider">Shift Offset</label>
                        <span id="shift-label" class="px-3 py-1 bg-primary text-white rounded-lg font-mono font-bold text-lg shadow-sm">3</span>
                    </div>
                    <input type="range" id="shift-input" min="1" max="25" value="3" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-primary">
                    <div class="flex justify-between text-[10px] text-gray-400 font-bold uppercase tracking-widest">
                        <span>Min (1)</span>
                        <span>Max (25)</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <button id="encrypt-btn" class="py-4 bg-primary text-white rounded-xl font-bold uppercase tracking-widest text-xs shadow-lg shadow-primary/20 hover:bg-primary-hover hover:-translate-y-0.5 transition-all">
                        Encrypt <i class="fa-solid fa-lock ms-2"></i>
                    </button>
                    <button id="decrypt-btn" class="py-4 bg-white text-primary border-2 border-primary/20 rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-primary/5 transition-all">
                        Decrypt <i class="fa-solid fa-lock-open ms-2"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Result Area -->
        <div class="space-y-4 relative">
            <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider text-center">Resulting Output</label>
            <div class="relative group">
                <textarea id="text-output" readonly class="w-full px-6 py-6 bg-slate-900 border-0 rounded-2xl text-cyan-400 font-mono text-lg min-h-[150px] shadow-2xl shadow-primary/10" placeholder="Processed text will appear here..."></textarea>
                <button id="copy-btn" class="absolute top-4 right-4 w-10 h-10 bg-white/10 hover:bg-white/20 text-white rounded-lg flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 backdrop-blur-sm">
                    <i class="fa-solid fa-copy"></i>
                </button>
            </div>
        </div>
    </div>


<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'Caesar Cipher',
    'intro_title' => 'Caesar Cipher: The Classical Architecture of Cryptography',
    'intro_content' => 'The Caesar Cipher is one of the oldest and most influential encryption techniques in human history. Named after Julius Caesar, who used it for private correspondence, it operates on a simple substitution principle: shifting each letter in a plaintext message by a fixed number of positions down the alphabet. While fundamentally simple by modern standards, it remains an essential conceptual pillar in understanding the evolution of cryptographic security and frequency analysis.',
    'detailed_title' => 'Algorithmic Mechanics & Modern Educational Value',
    'detailed_content' => '<p>Despite its classic origins, the Caesar Cipher provides a perfect entry point into the world of symmteric encryption and modular arithmetic. Our implementation offers precise shift control and real-time processing to demonstrate these core concepts:</p>
        <ul class="space-y-2 mt-4">
            <li><strong>Monoalphabetic Substitution:</strong> Provides a direct demonstration of how a fixed key governs the transformation of data.</li>
            <li><strong>Modular Arithmetic (Mod 26):</strong> Illustrates how characters wrap around from Z back to A, a fundamental mechanic in nearly all cryptographic algorithms.</li>
            <li><strong>Educational Visualization:</strong> Perfect for students and enthusiasts to witness how increasing the "shift" alters the readability of common information.</li>
            <li><strong>Brute-Force Vulnerability:</strong> Demonstrates why low key-spaces (only 25 possible shifts) are naturally insecure in the era of high-speed computing.</li>
        </ul>'
]);
?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const textInput = document.getElementById('text-input');
    const shiftInput = document.getElementById('shift-input');
    const shiftLabel = document.getElementById('shift-label');
    const textOutput = document.getElementById('text-output');
    const encryptBtn = document.getElementById('encrypt-btn');
    const decryptBtn = document.getElementById('decrypt-btn');
    const copyBtn = document.getElementById('copy-btn');

    shiftInput.addEventListener('input', () => {
        shiftLabel.innerText = shiftInput.value;
    });

    function process(isEncrypt) {
        const text = textInput.value;
        const shift = parseInt(shiftInput.value);
        const actualShift = isEncrypt ? shift : (26 - shift) % 26;
        
        let result = '';
        for (let i = 0; i < text.length; i++) {
            let char = text[i];
            if (char.match(/[a-z]/i)) {
                const code = text.charCodeAt(i);
                // Uppercase letters
                if (code >= 65 && code <= 90) {
                    char = String.fromCharCode(((code - 65 + actualShift) % 26) + 65);
                }
                // Lowercase letters
                else if (code >= 97 && code <= 122) {
                    char = String.fromCharCode(((code - 97 + actualShift) % 26) + 97);
                }
            }
            result += char;
        }
        textOutput.value = result;
        if (result) showToast(isEncrypt ? 'Text Encrypted' : 'Text Decrypted');
    }

    encryptBtn.addEventListener('click', () => process(true));
    decryptBtn.addEventListener('click', () => process(false));

    copyBtn.addEventListener('click', () => {
        if (!textOutput.value) return;
        navigator.clipboard.writeText(textOutput.value);
        showToast('Copied to clipboard!');
        copyBtn.innerHTML = '<i class="fa-solid fa-check"></i>';
        setTimeout(() => copyBtn.innerHTML = '<i class="fa-solid fa-copy"></i>', 2000);
    });
});
</script>





