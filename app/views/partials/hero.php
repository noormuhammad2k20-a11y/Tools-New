<section class="hero-section">
    <!-- Background Polish -->
    <div class="hero-bg-polish">
        <div class="hero-gradient"></div>
        <div class="hero-grid-pattern"></div>
    </div>

    <div class="container-fluid px-4 px-lg-5 hero-inner">
        <div class="terminal-badge">
            <i class="bi bi-terminal text-zinc-400 me-2" style="font-size: 14px;"></i>
            <span class="text-zinc-400">System Status:</span>
            <span class="text-indigo-600 ms-1">Enterprise v2.4 Stable</span>
        </div>

        <div class="row align-items-center g-5 g-lg-0">
            <div class="col-lg-7 col-xl-6 text-start">
                <h1 class="text-h1">
                    The Global Standard for <br />
                    <span class="text-primary">Digital Tooling</span>
                </h1>

                <p class="text-p">
                    High-performance utilities for modern engineers. Secure, fast, and engineered for precision at scale.
                </p>

                <div class="d-flex flex-wrap align-items-center gap-3">
                    <button class="btn btn-pro-dark px-5">Explore Toolbox</button>
                    <button class="btn btn-pro-outline px-5">Documentation</button>
                </div>

                <div class="hero-stats d-flex align-items-center mt-5 pt-5 gap-4 gap-md-5">
                    <div>
                        <p class="hero-stat-value mb-0">500+</p>
                        <p class="hero-stat-label mb-0">Active Tools</p>
                    </div>
                    <div>
                        <p class="hero-stat-value mb-0">1.4M</p>
                        <p class="hero-stat-label mb-0">Daily Ops</p>
                    </div>
                    <div>
                        <p class="hero-stat-value mb-0">99.9%</p>
                        <p class="hero-stat-label mb-0">Security Score</p>
                    </div>
                </div>
            </div>

            <!-- Visual Mockup (Hidden on mobile) -->
            <div class="col-lg-5 col-xl-6 d-none d-lg-block">
                <div class="hero-mockup-wrapper">
                    <div class="hero-mockup">
                        <div class="hero-mockup-glow"></div>
                        <div class="hero-mockup-card">
                            <div class="hero-mockup-bar"></div>
                            
                            <div class="mockup-header">
                                <div class="mockup-dots">
                                    <div class="mockup-dot"></div>
                                    <div class="mockup-dot"></div>
                                    <div class="mockup-dot"></div>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="vr h-100 bg-zinc-100" style="width: 1px;"></div>
                                    <div class="user-placeholder bg-zinc-50 border border-zinc-100 rounded-pill d-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">
                                        <i class="bi bi-person text-zinc-400" style="font-size: 12px;"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="mockup-body">
                                <div class="mockup-row">
                                    <div class="mockup-icon-box">
                                        <i class="bi bi-lightning-charge-fill fs-4"></i>
                                    </div>
                                    <div class="mockup-lines w-100">
                                        <div class="mockup-line-dark"></div>
                                        <div class="mockup-line-light"></div>
                                    </div>
                                </div>

                                <div class="mockup-grid">
                                    <div class="mockup-grid-item">
                                        <div class="mockup-grid-dot indigo"></div>
                                        <div class="mockup-grid-line w-75"></div>
                                    </div>
                                    <div class="mockup-grid-item">
                                        <div class="mockup-grid-dot zinc"></div>
                                        <div class="mockup-grid-line w-50"></div>
                                    </div>
                                </div>

                                <div class="mockup-progress">
                                    <div class="mockup-progress-header">
                                        <span class="mockup-progress-label">Protocol Integrity</span>
                                        <span class="mockup-progress-value">Verified</span>
                                    </div>
                                    <div class="mockup-progress-bar">
                                        <div class="mockup-progress-fill" id="mockupProgressFill"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="mockup-footer">
                                <div class="mockup-footer-left">
                                    <div class="mockup-footer-dot"></div>
                                    <span class="mockup-footer-text">Quantum Engine Online</span>
                                </div>
                                <i class="bi bi-stars text-indigo-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Simple animation for the progress bar on load
    document.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            const bar = document.getElementById('mockupProgressFill');
            if (bar) bar.style.width = '94%';
        }, 800);
    });
</script>
