

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="row gx-5">
                
                <!-- Left Sidebar Configuration -->
                <div class="col-lg-5 mb-4 mb-lg-0 border-end pe-lg-4">
                    <h5 class="fw-bold mb-3 border-bottom pb-2">1. Image Configuration</h5>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">Primary Runtime</label>
                        <select id="docker-image" class="form-select border-2 bg-light">
                            <option value="node:18-alpine" selected>Node.js (18 Alpine)</option>
                            <option value="python:3.11-slim">Python (3.11 Slim)</option>
                            <option value="php:8.2-fpm-alpine">PHP (8.2 FPM Alpine)</option>
                            <option value="golang:1.20-alpine">Golang (1.20 Alpine)</option>
                            <option value="nginx:alpine">Nginx (Alpine Static)</option>
                            <option value="ubuntu:22.04">Ubuntu (22.04 Core)</option>
                        </select>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label fw-bold small text-muted">Working Directory</label>
                            <input type="text" id="docker-workdir" class="form-control border-2" value="/app">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold small text-muted">Exposed Port</label>
                            <input type="number" id="docker-port" class="form-control border-2" value="3000">
                        </div>
                    </div>

                    <h5 class="fw-bold mb-3 mt-4 border-bottom pb-2">2. Build Commands</h5>
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">Pre-Install Commands (OS Packages)</label>
                        <input type="text" id="docker-os-deps" class="form-control border-2" placeholder="e.g. apk add --no-cache git">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">Dependency Install Command (App)</label>
                        <input type="text" id="docker-install-cmd" class="form-control border-2" value="npm ci">
                    </div>

                    <h5 class="fw-bold mb-3 mt-4 border-bottom pb-2">3. Runtime Execution</h5>
                    <div class="mb-4">
                        <label class="form-label fw-bold small text-muted">Start Command (CMD / Entrypoint)</label>
                        <input type="text" id="docker-cmd" class="form-control border-2" value="npm start">
                    </div>

                    <div class="d-flex align-items-center gap-2 mb-4">
                        <div class="form-check form-switch mt-1">
                            <input class="form-check-input" type="checkbox" id="docker-compose-toggle" checked>
                            <label class="form-check-label fw-bold text-muted small" for="docker-compose-toggle">Generate docker-compose.yml</label>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 rounded-pill py-2 shadow-sm" onclick="generateDockerfile()"><i class="fa-brands fa-docker me-2"></i>Generate Build Scripts</button>
                    <button class="btn btn-outline-secondary w-100 rounded-pill py-2 mt-2" onclick="resetForm()"><i class="fa-solid fa-arrow-rotate-right me-2"></i>Reset to Defaults</button>
                </div>

                <!-- Right Side Output -->
                <div class="col-lg-7 ps-lg-4">
                    
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label fw-bold text-primary small text-uppercase tracking-wider mb-0"><i class="fa-solid fa-file-code me-2"></i>Dockerfile</label>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-primary rounded-start-pill px-3 shadow-sm" onclick="copyConfig('dockerfile')">Copy</button>
                            <button class="btn btn-sm btn-outline-primary rounded-end-pill px-3" onclick="downloadConfig('Dockerfile', 'dockerfile')"><i class="fa-solid fa-download"></i></button>
                        </div>
                    </div>
                    <!-- Dockerfile Editor via Textarea -->
                    <textarea id="output-dockerfile" class="form-control bg-dark text-light border-0 rounded-4 p-4 mb-4" rows="10" readonly style="font-family: var(--font-mono); font-size: 14px; line-height: 1.5;"></textarea>
                    
                    <div id="compose-container">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label fw-bold text-info small text-uppercase tracking-wider mb-0"><i class="fa-solid fa-cubes me-2"></i>docker-compose.yml</label>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-info text-white rounded-start-pill px-3 shadow-sm" onclick="copyConfig('compose')">Copy</button>
                                <button class="btn btn-sm btn-outline-info rounded-end-pill px-3" onclick="downloadConfig('docker-compose.yml', 'compose')"><i class="fa-solid fa-download"></i></button>
                            </div>
                        </div>
                        <!-- Compose Editor via Textarea -->
                        <textarea id="output-compose" class="form-control bg-dark text-info border-0 rounded-4 p-4" rows="10" readonly style="font-family: var(--font-mono); font-size: 14px; line-height: 1.5;"></textarea>
                    </div>

                </div>
            </div>
        
    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Architecting the Immutable Infrastructure</h2>
                    <p class="lead">Containerization is the absolute bedrock of modern DevOps and Cloud-Native application deployment. Generating the perfect <code>Dockerfile</code> ensures that an application built on a local Macbook will execute with 100% parity logic when deployed to AWS ECS or a Kubernetes cluster. Our <strong>Pro Dockerfile Generator</strong> drastically minimizes the configuration learning curve.</p>
            <!-- Features Cards -->
            
            </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Adhering to Best Practices</h3>
                    <p>Writing a Dockerfile by hand often leads to massively bloated container image sizes. Our generator algorithmically outputs configurations aligned with established Docker-certified best practices:</p>
                    <ul>
                        <li><strong>Minimal Base Images:</strong> We default to Alpine Linux architectures (`-alpine` variants). These ultra-lightweight kernels weigh ~5MB, reducing memory consumption footprint and decreasing attack surface areas for zero-day exploits.</li>
                        <li><strong>Layer Caching Oprimitization:</strong> The generated code explicitly copies your `package.json` or `requirements.txt` independently BEFORE copying the root source code tree. This ensures the dependency installation layer (`npm ci`, `pip install`) caches successfully, drastically reducing subsequent pipeline build speeds.</li>
                        <li><strong>Standardized Exposed Ports:</strong> Clearly defining networking pathways to integrate correctly with Reverse Proxies (Nginx) and Load Balancers.</li>
                    </ul>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Accelerating Local Development via Compose</h3>
                    <p>Dockerfiles construct the singular isolated image. To run inter-connected microservices locally seamlessly, developers rely on Docker Compose. By toggling the integration, this tool generates a synchronous <code>docker-compose.yml</code> file parameterized correctly to mount local volumes to your working directory and map external ports to your container, allowing real-time hot-reloading development.</p>
        </div>

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->



<style>
.text-gradient-primary { background: linear-gradient(45deg, #0284c7, #22d3ee); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
textarea.form-control { transition: box-shadow 0.3s ease; }
textarea.form-control.bg-dark:focus { box-shadow: 0 0 0 4px rgba(34, 211, 238, 0.25); border-color: #0284c7; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    
    const ui = {
        image: document.getElementById('docker-image'),
        workdir: document.getElementById('docker-workdir'),
        port: document.getElementById('docker-port'),
        osdeps: document.getElementById('docker-os-deps'),
        installCmd: document.getElementById('docker-install-cmd'),
        cmd: document.getElementById('docker-cmd'),
        composeToggle: document.getElementById('docker-compose-toggle'),
        
        outDockerfile: document.getElementById('output-dockerfile'),
        outCompose: document.getElementById('output-compose'),
        composeContainer: document.getElementById('compose-container')
    };

    // Auto-fill sensible defaults based on primary language selection
    ui.image.addEventListener('change', () => {
        const val = ui.image.value;
        if(val.includes('node')) {
            ui.installCmd.value = "npm ci";
            ui.cmd.value = "npm start";
            ui.port.value = "3000";
        } else if (val.includes('python')) {
            ui.installCmd.value = "pip install --no-cache-dir -r requirements.txt";
            ui.cmd.value = "python app.py";
            ui.port.value = "8000";
        } else if (val.includes('php')) {
            ui.installCmd.value = "composer install --no-dev --optimize-autoloader";
            ui.cmd.value = "php-fpm";
            ui.port.value = "9000";
        } else if (val.includes('golang')) {
            ui.installCmd.value = "go build -o main .";
            ui.cmd.value = "./main";
            ui.port.value = "8080";
        } else if (val.includes('nginx')) {
            ui.installCmd.value = "";
            ui.cmd.value = "nginx -g 'daemon off;'";
            ui.port.value = "80";
            ui.workdir.value = "/usr/share/nginx/html";
        }
        generate();
    });

    ui.composeToggle.addEventListener('change', () => {
        if(ui.composeToggle.checked) {
            ui.composeContainer.style.display = 'block';
        } else {
            ui.composeContainer.style.display = 'none';
        }
        generate();
    });

    const inputsToWatch = [ui.workdir, ui.port, ui.osdeps, ui.installCmd, ui.cmd];
    inputsToWatch.forEach(el => el.addEventListener('input', generate));

    function generate() {
        const img = ui.image.value;
        const wd = ui.workdir.value || '/app';
        const pt = ui.port.value;
        const osd = ui.osdeps.value;
        const incmd = ui.installCmd.value;
        const rcmd = ui.cmd.value;

        // --- Dockerfile Generation ---
        let df = `FROM ${img}\n\n`;
        df += `# Set working directory\nWORKDIR ${wd}\n\n`;
        
        if (osd.trim() !== '') {
            df += `# Install OS level dependencies\nRUN ${osd}\n\n`;
        }

        // Optimization: Node/Python/PHP package copies before root source
        if (img.includes('node') && incmd.includes('npm')) {
            df += `# Copy package files for cache layer optimization\nCOPY package*.json ./\n\n`;
        } else if (img.includes('python') && incmd.includes('pip')) {
            df += `# Copy requirements file for dependency caching\nCOPY requirements.txt ./\n\n`;
        } else if (img.includes('php') && incmd.includes('composer')) {
             df += `# Copy composer files\nCOPY composer.json composer.lock ./\n\n`;
        }

        if (incmd.trim() !== '') {
            df += `# Install Application Dependencies\nRUN ${incmd}\n\n`;
        }

        df += `# Copy root source code\nCOPY . .\n\n`;

        if (pt) {
            df += `# Expose networking port\nEXPOSE ${pt}\n\n`;
        }

        // Format CMD as JSON array if possible
        if (rcmd.trim() !== '') {
            const parts = rcmd.match(/(?:[^\s"]+|"[^"]*")+/g); // rudimentary split ignoring spaces in quotes
            if (parts && parts.length > 0) {
                const jsonArray = parts.map(p => `"${p.replace(/"/g, '')}"`).join(', ');
                df += `# Execution Command\nCMD [${jsonArray}]\n`;
            } else {
                df += `CMD ${rcmd}\n`;
            }
        }

        ui.outDockerfile.value = df;


        // --- Docker Compose Generation ---
        if (ui.composeToggle.checked) {
            const appName = img.split(':')[0] + "-app";
            let c = `version: '3.8'\n\nservices:\n`;
            c += `  ${appName}:\n`;
            c += `    build:\n`;
            c += `      context: .\n`;
            c += `      dockerfile: Dockerfile\n`;
            c += `    container_name: ${appName}-dev\n`;
            
            if (pt) {
                c += `    ports:\n`;
                c += `      - "${pt}:${pt}"\n`;
            }

            c += `    volumes:\n`;
            c += `      # Mount local directory to container for hot-reloading\n`;
            c += `      - .:${wd}\n`;
            
            // Exclude node_modules from local overwrite in node
            if (img.includes('node')) {
                 c += `      - /${wd}/node_modules\n`;
            }
            
            c += `    restart: unless-stopped\n`;

            ui.outCompose.value = c;
        }
    }

    window.resetForm = () => {
        ui.image.value = 'node:18-alpine';
        ui.workdir.value = '/app';
        ui.port.value = '3000';
        ui.osdeps.value = '';
        ui.installCmd.value = 'npm ci';
        ui.cmd.value = 'npm start';
        ui.composeToggle.checked = true;
        ui.composeContainer.style.display = 'block';
        generate();
        showToast('Reset to defaults');
    };

    window.copyConfig = (type) => {
        const el = type === 'dockerfile' ? ui.outDockerfile : ui.outCompose;
        if (!el.value) return showToast('Nothing to copy', 'error');
        el.select();
        document.execCommand('copy');
        showToast(`${type === 'dockerfile' ? 'Dockerfile' : 'docker-compose.yml'} copied!`);
    };

    window.downloadConfig = (filename, type) => {
        const el = type === 'dockerfile' ? ui.outDockerfile : ui.outCompose;
        if (!el.value) return showToast('Nothing to export', 'error');
        
        const blob = new Blob([el.value], { type: 'text/plain' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = filename;
        a.click();
        window.URL.revokeObjectURL(url);
    };

    // First generate
    generate();
});
</script>






