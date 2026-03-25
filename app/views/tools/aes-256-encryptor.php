<!-- Tool Interface -->
<div class="card border-0 shadow-sm" style="border-radius: var(--radius-md); overflow: hidden;">
    <div class="card-body p-6 sm:p-10">
        
        <div class="row g-4">
            <!-- Input Area -->
            <div class="col-12">
                <label class="form-label fw-bold text-muted text-uppercase small tracking-wider">Source Content</label>
                <textarea id="text-input" class="form-control" style="height: 200px; resize: none;" placeholder="Enter text to encrypt or ciphertext to decrypt..."></textarea>
            </div>

            <div class="col-md-7">
                <!-- Secret Key Control -->
                <label class="form-label fw-bold text-muted text-uppercase small tracking-wider">Secret Encryption Key</label>
                <div class="input-group">
                    <input type="password" id="secret-key" class="form-control" placeholder="Minimum 8 characters recommended...">
                    <button onclick="toggleSecret()" class="btn btn-outline-secondary" type="button">
                        <i class="fa-solid fa-eye" id="toggle-icon"></i>
                    </button>
                </div>
            </div>

            <div class="col-md-5 d-flex align-items-end">
                <!-- Action Buttons -->
                <div class="d-flex gap-2 w-100">
                    <button id="encrypt-btn" class="btn btn-pro flex-grow-1">
                        Encrypt <i class="fa-solid fa-lock ms-1"></i>
                    </button>
                    <button id="decrypt-btn" class="btn btn-outline-pro flex-grow-1">
                        Decrypt <i class="fa-solid fa-lock-open ms-1"></i>
                    </button>
                </div>
            </div>

            <!-- Result Area -->
            <div class="col-12 mt-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="form-label fw-bold text-muted text-uppercase small tracking-wider mb-0">Processed Output</label>
                    <button onclick="copyResult()" class="btn btn-link btn-sm text-decoration-none fw-bold p-0">
                        <i class="fa-solid fa-copy me-1"></i> Copy Output
                    </button>
                </div>
                <textarea id="text-output" readonly class="form-control bg-dark text-success font-monospace" style="height: 200px; resize: none; border: 0;" placeholder="Encrypted or decrypted data will appear here..."></textarea>
            </div>
        </div>
    </div>
</div>

<?php 
echo render_partial('security-tool-content', [
    'tool_name' => 'AES-256 Text Encryptor',
    'intro_title' => 'AES-256: The Gold Standard in Modern Cryptographic defense',
    'intro_content' => 'Advanced Encryption Standard (AES) with a 256-bit key is the industry-recognized protocol used by governments, financial institutions, and security experts globally to protect top-secret information. Our Professional AES-256 Encryptor provides a military-grade interface to secure your sensitive text data locally. By utilizing 14 rounds of substitution, transposition, and mixing, it ensures that your information remains unreadable to any unauthorized party, even with the most powerful supercomputers currently in existence.',
    'detailed_title' => 'Military-Grade Security without Network exposure',
    'detailed_content' => '<p>True security requires preventing data from ever reaching a server in its plaintext form. Our tool implements several critical safety features to ensure your privacy:</p>
        <ul class="list-unstyled mt-3">
            <li class="mb-2"><i class="fa-solid fa-check-circle text-success me-2"></i><strong>Client-Side Cryptography:</strong> All encryption and decryption logic executes within your browser.</li>
            <li class="mb-2"><i class="fa-solid fa-check-circle text-success me-2"></i><strong>High-Entropy Key Stretching:</strong> Leverages the AES-256 algorithm for maximum security.</li>
            <li class="mb-2"><i class="fa-solid fa-check-circle text-success me-2"></i><strong>UTF-8 Compatibility:</strong> Securely processes universal character sets.</li>
            <li><i class="fa-solid fa-check-circle text-success me-2"></i><strong>Cipher Block Chaining (CBC):</strong> Prevents pattern-based cryptanalysis.</li>
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



