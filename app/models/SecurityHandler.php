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

    public function rsaKeyGenerator($data) { return $this->noop($data); }
    public function fileHashCalculator($data) { return $this->noop($data); }
    public function aesEncrypt($data) { return $this->noop($data); }
    public function aesDecrypt($data) { return $this->noop($data); }
}
