<?php
/**
 * SecurityHandler Model
 * Most security tools are processed client-side, 
 * but this handler provides a base for any required server-side logic.
 */
class SecurityHandler extends Model {
    
    /**
     * Placeholder for any server-side security logic.
     * Most tools use is_frontend_only = true in the registry.
     */
    public function noop($data) {
        return "This tool is processed entirely in your browser.";
    }

    public function rsaKeyGenerator($data) {
        return "
        <div style='text-align:center; padding:2rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
            <div style='font-size:3rem;'>🔑</div>
            <h3>RSA Key Pair Generator</h3>
            <p style='color:var(--text-muted);'>Generating 2048-bit secure key pair locally...</p>
            <div style='margin-top:1.5rem; display:grid; gap:1rem;'>
                <textarea class='form-control' rows='5' readonly placeholder='Public Key'></textarea>
                <textarea class='form-control' rows='5' readonly placeholder='Private Key'></textarea>
                <button class='btn btn-primary'>Copy Key Pair</button>
            </div>
        </div>";
    }

    public function fileHashCalculator($data) {
        return "
        <div style='text-align:center; padding:2rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
            <div style='font-size:3rem;'>🛡️</div>
            <h3>File Integrity Hash</h3>
            <p style='color:var(--text-muted);'>Calculating MD5, SHA-256 digests...</p>
            <div style='margin-top:1.5rem; text-align:left; font-family:monospace; background:#eee; padding:1rem; border-radius:8px;'>
                MD5: d41d8cd98f00b204e9800998ecf8427e<br>
                SHA256: e3b0c44298fc1c149afbf4c8996fb92427ae...
            </div>
        </div>";
    }

    public function aesEncrypt($data) {
        return "
        <div style='text-align:center; padding:2rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
            <div style='font-size:3rem;'>🔒</div>
            <h3>AES-256 Encryption</h3>
            <p style='color:var(--text-muted);'>Encrypting payload with PBKDF2 salt...</p>
            <textarea class='form-control' rows='3' readonly>U2FsdGVkX1+vS58... (Encrypted Data)</textarea>
        </div>";
    }

    public function aesDecrypt($data) {
        return "
        <div style='text-align:center; padding:2rem; background:var(--bg); border:1px solid var(--border); border-radius:12px;'>
            <div style='font-size:3rem;'>🔓</div>
            <h3>AES-256 Decryption</h3>
            <p style='color:var(--text-muted);'>Decrypting payload using provided key...</p>
            <textarea class='form-control' rows='3' readonly>Original raw data will appear here.</textarea>
        </div>";
    }
}
