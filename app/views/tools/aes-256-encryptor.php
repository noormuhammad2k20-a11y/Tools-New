<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        
        <div class="space-y-8">
            <!-- Input Area -->
            <div class="space-y-4">
                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Source Content</label>
                <textarea id="text-input" class="w-full px-4 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-base min-h-[180px]" placeholder="Enter text to encrypt or ciphertext to decrypt..."></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-end">
                <!-- Secret Key Control -->
                <div class="space-y-4">
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Secret Encryption Key</label>
                    <div class="relative group">
                        <input type="password" id="secret-key" class="w-full pl-4 pr-12 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-4 focus:ring-primary/10 focus:border-primary/30 outline-none transition-all text-base" placeholder="Minimum 8 characters recommended...">
                        <button onclick="toggleSecret()" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary transition-colors">
                            <i class="fa-solid fa-eye text-lg" id="toggle-icon"></i>
                        </button>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="grid grid-cols-2 gap-3">
                    <button id="encrypt-btn" class="py-4 bg-primary text-white rounded-xl font-bold uppercase tracking-widest text-xs shadow-lg shadow-primary/20 hover:bg-primary-hover hover:-translate-y-0.5 transition-all">
                        Encrypt <i class="fa-solid fa-lock ms-2"></i>
                    </button>
                    <button id="decrypt-btn" class="py-4 bg-white text-primary border-2 border-primary/20 rounded-xl font-bold uppercase tracking-widest text-xs hover:bg-primary/5 transition-all">
                        Decrypt <i class="fa-solid fa-lock-open ms-2"></i>
                    </button>
                </div>
            </div>

            <!-- Result Area -->
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Processed Output</label>
                    <button onclick="copyResult()" class="text-primary hover:text-primary-hover font-bold text-xs uppercase tracking-widest flex items-center gap-2 transition-colors">
                        <i class="fa-solid fa-copy"></i> Copy Output
                    </button>
                </div>
                <textarea id="text-output" readonly class="w-full px-6 py-6 bg-slate-900 border-0 rounded-2xl text-emerald-400 font-mono text-lg min-h-[180px] shadow-2xl shadow-primary/10" placeholder="Encrypted or decrypted data will appear here..."></textarea>
            </div>
        </div>
    </div>
</main>

<!-- Professional Content Section -->
<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'AES-256 Text Encryptor',
    'intro_title' => 'AES-256: The Gold Standard in Modern Cryptographic defense',
    'intro_content' => 'Advanced Encryption Standard (AES) with a 256-bit key is the industry-recognized protocol used by governments, financial institutions, and security experts globally to protect top-secret information. Our Professional AES-256 Encryptor provides a military-grade interface to secure your sensitive text data locally. By utilizing 14 rounds of substitution, transposition, and mixing, it ensures that your information remains unreadable to any unauthorized party, even with the most powerful supercomputers currently in existence.',
    'detailed_title' => 'Military-Grade Security without Network exposure',
    'detailed_content' => '<p>True security requires preventing data from ever reaching a server in its plaintext form. Our tool implements several critical safety features to ensure your privacy:</p>
        <ul class="space-y-2 mt-4">
            <li><strong>Client-Side Cryptography:</strong> All encryption and decryption logic executes within your browser using the CryptoJS library. Your plaintext and secret key never cross the internet.</li>
            <li><strong>High-Entropy Key Stretching:</strong> Leverages the AES-256 algorithm which offers 1.1 x 10<sup>77</sup> possible combinations, making brute-force attacks mathematically infeasible.</li>
            <li><strong>UTF-8 Compatibility:</strong> Securely processes universal character sets, including emojis, international scripts, and complex symbols.</li>
            <li><strong>Cipher Block Chaining (CBC):</strong> Ensures that identical blocks of plaintext result in different blocks of ciphertext, preventing pattern-based cryptanalysis.</li>
        </ul>'
]);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('text-input');
    const secret = document.getElementById('secret-key');
    const output = document.getElementById('text-output');

    document.getElementById('encrypt-btn').addEventListener('click', () => {
        const text = input.value.trim();
        const key = secret.value.trim();
        if (!text || !key) return showToast('Enter text and a secret key', 'error');

        try {
            const encrypted = CryptoJS.AES.encrypt(text, key).toString();
            output.value = encrypted;
            showToast('Encryption successful');
        } catch (e) {
            showToast('Encryption failed', 'error');
        }
    });

    document.getElementById('decrypt-btn').addEventListener('click', () => {
        const ciphertext = input.value.trim();
        const key = secret.value.trim();
        if (!ciphertext || !key) return showToast('Enter ciphertext and secret key', 'error');

        try {
            const bytes = CryptoJS.AES.decrypt(ciphertext, key);
            const decrypted = bytes.toString(CryptoJS.enc.Utf8);
            if (!decrypted) throw new Error('Invalid key');
            output.value = decrypted;
            showToast('Decryption successful');
        } catch (e) {
            showToast('Decryption failed: Check your key', 'error');
            output.value = '';
        }
    });
});

function toggleSecret() {
    const p = document.getElementById('secret-key');
    const i = document.getElementById('toggle-icon');
    if (p.type === 'password') {
        p.type = 'text';
        i.className = 'fa-solid fa-eye-slash';
    } else {
        p.type = 'password';
        i.className = 'fa-solid fa-eye';
    }
}

function copyResult() {
    const val = document.getElementById('text-output').value;
    if (!val) return;
    navigator.clipboard.writeText(val).then(() => {
        showToast('Result copied to clipboard');
    });
}
</script>

<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>