<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10">
        <!-- Custom Tool Interface Extracted from Original File -->
        
            <div class="row align-items-center mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Enter Status Code</label>
                    <div class="input-group">
                        <input type="number" id="code-input" class="form-control form-control-lg font-monospace" placeholder="e.g. 404" autofocus>
                        <button id="check-btn" class="btn btn-primary px-4">Lookup <i class="fa-solid fa-search ms-2"></i></button>
                    </div>
                </div>
                <div class="col-md-6 mt-3 mt-md-0">
                    <div class="d-flex gap-2 flex-wrap">
                        <button class="btn btn-sm btn-outline-secondary rounded-pill quick-code" data-code="200">200 OK</button>
                        <button class="btn btn-sm btn-outline-secondary rounded-pill quick-code" data-code="301">301 Redirect</button>
                        <button class="btn btn-sm btn-outline-secondary rounded-pill quick-code" data-code="404">404 Not Found</button>
                        <button class="btn btn-sm btn-outline-secondary rounded-pill quick-code" data-code="500">500 Server Error</button>
                    </div>
                </div>
            </div>

            <div id="result-wrapper" class="mt-4 pt-4 border-top" style="display: none;">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div id="status-display" class="p-4 rounded-4 text-center shadow-sm" style="background: #f8fafc;">
                            <h2 id="r-code" class="display-3 fw-bold mb-0">---</h2>
                            <p id="r-name" class="lead fw-bold mb-0"></p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="p-4 rounded-4 border h-100">
                            <h5 class="fw-bold mb-3">Description & Handling</h5>
                            <p id="r-desc" class="text-secondary"></p>
                            <div class="mt-4">
                                <span id="r-category" class="badge rounded-pill px-3 py-2"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4 tracking-tight">Navigating the Language of the Web: HTTP Codes</h2>
                    <p class="lead">HTTP status codes are the primary communication channel between a web server and a browser. Each three-digit code tells a story—whether a page load was successful, if it has moved permanently, or if the server encountered a critical failure. Our <strong>HTTP Status Checker</strong> is a comprehensive reference designed for developers, SEO specialists, and sysadmins.</p>
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
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Decoding the Status Ranges</h3>
                    <ul>
                        <li><strong>1xx (Informational):</strong> The request was received, and the process is continuing.</li>
                        <li><strong>2xx (Success):</strong> The action was successfully received, understood, and accepted (e.g., 200 OK).</li>
                        <li><strong>3xx (Redirection):</strong> Further action must be taken to complete the request (e.g., 301 Moved Permanently).</li>
                        <li><strong>4xx (Client Error):</strong> The request contains bad syntax or cannot be fulfilled (e.g., 404 Not Found).</li>
                        <li><strong>5xx (Server Error):</strong> The server failed to fulfill an apparently valid request (e.g., 500 Internal Server Error).</li>
                    </ul>
                    
                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Critical Codes for SEO</h3>
                    <p>Understanding status codes is vital for search engine optimization. For instance, a <strong>301 redirect</strong> passes link equity to the new URL, while a <strong>302 redirect</strong> does not. Similarly, too many <strong>404 errors</strong> can negatively impact your site's crawl budget, and <strong>503 (Service Unavailable)</strong> tells search bots to come back later without de-indexing the page.</p>

                    <h3 class="text-xl font-bold text-gray-900 mt-5 mb-3">Immediate Insights</h3>
                    <p>This reference tool provides instant explanations without needing to navigate through complex documentation. It's built for speed, allowing you to quickly verify the correct response codes for your API routes or web server configurations.</p>
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
.text-gradient-primary { background: linear-gradient(45deg, #2563eb, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.quick-code { transition: all 0.2s; }
.quick-code:hover { background: var(--primary); color: white; border-color: var(--primary); }
</style>

<script>
const statusCodes = {
    "200": { name: "OK", category: "Success", desc: "The request has succeeded. This is the standard response for successful HTTP requests.", color: "#10b981" },
    "201": { name: "Created", category: "Success", desc: "The request has been fulfilled and resulted in a new resource being created.", color: "#10b981" },
    "204": { name: "No Content", category: "Success", desc: "The server successfully processed the request and is not returning any content.", color: "#10b981" },
    "301": { name: "Moved Permanently", category: "Redirection", desc: "The requested resource has been assigned a new permanent URI and any future references to this resource should use one of the returned URIs.", color: "#3b82f6" },
    "302": { name: "Found", category: "Redirection", desc: "The requested resource resides temporarily under a different URI. Important for temporary site changes.", color: "#3b82f6" },
    "304": { name: "Not Modified", category: "Redirection", desc: "Indicates that the resource has not been modified since the version specified by the request headers If-Modified-Since or If-None-Match.", color: "#3b82f6" },
    "400": { name: "Bad Request", category: "Client Error", desc: "The server cannot or will not process the request due to something that is perceived to be a client error (e.g., malformed request syntax).", color: "#f59e0b" },
    "401": { name: "Unauthorized", category: "Client Error", desc: "Similar to 403 Forbidden, but specifically for use when authentication is required and has failed or has not yet been provided.", color: "#f59e0b" },
    "403": { name: "Forbidden", category: "Client Error", desc: "The server understood the request but refuses to authorize it. Often seen when permissions are incorrect.", color: "#f59e0b" },
    "404": { name: "Not Found", category: "Client Error", desc: "The requested resource could not be found but may be available in the future. Subsequent requests by the client are permissible.", color: "#ef4444" },
    "405": { name: "Method Not Allowed", category: "Client Error", desc: "A request method is not supported for the requested resource (e.g., a GET request on a form that requires POST).", color: "#f59e0b" },
    "429": { name: "Too Many Requests", category: "Client Error", desc: "The user has sent too many requests in a given amount of time ('rate limiting').", color: "#f59e0b" },
    "500": { name: "Internal Server Error", category: "Server Error", desc: "A generic error message, given when an unexpected condition was encountered and no more specific message is suitable.", color: "#ef4444" },
    "502": { name: "Bad Gateway", category: "Server Error", desc: "The server was acting as a gateway or proxy and received an invalid response from the upstream server.", color: "#ef4444" },
    "503": { name: "Service Unavailable", category: "Server Error", desc: "The server cannot handle the request (because it is overloaded or down for maintenance). Generally, this is a temporary state.", color: "#ef4444" },
    "504": { name: "Gateway Timeout", category: "Server Error", desc: "The server was acting as a gateway or proxy and did not receive a timely response from the upstream server.", color: "#ef4444" }
};

document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('code-input');
    const checkBtn = document.getElementById('check-btn');
    const wrapper = document.getElementById('result-wrapper');

    function performLookup(code) {
        const data = statusCodes[code];
        if(!data) {
            showToast('Code details not in our common database, but checking category...', 'info');
            const first = code.charAt(0);
            const generic = {
                "1": { name: "Informational", color: "#6366f1", desc: "This is a generic Informational status. The request was received and is continuing." },
                "2": { name: "Success", color: "#10b981", desc: "This is a generic Success status. The action was successfully received and understood." },
                "3": { name: "Redirection", color: "#3b82f6", desc: "This is a generic Redirection status. Further action must be taken to complete the request." },
                "4": { name: "Client Error", color: "#f59e0b", desc: "This is a generic Client Error status. The request contains bad syntax or cannot be fulfilled." },
                "5": { name: "Server Error", color: "#ef4444", desc: "This is a generic Server Error status. The server failed to fulfill a valid request." }
            }[first];
            
            if(!generic) {
                showToast('Invalid status code format!', 'error');
                return;
            }
            applyResult(code, generic.name, generic.desc, generic.color, generic.name);
        } else {
            applyResult(code, data.name, data.desc, data.color, data.category);
        }
        wrapper.style.display = 'block';
    }

    function applyResult(code, name, desc, color, cat) {
        document.getElementById('r-code').textContent = code;
        document.getElementById('r-code').style.color = color;
        document.getElementById('r-name').textContent = name;
        document.getElementById('r-desc').textContent = desc;
        const badge = document.getElementById('r-category');
        badge.textContent = cat;
        badge.style.backgroundColor = color;
        badge.style.color = 'white';
    }

    checkBtn.addEventListener('click', () => {
        const val = input.value.trim();
        if(!val) return;
        performLookup(val);
    });

    document.querySelectorAll('.quick-code').forEach(btn => {
        btn.addEventListener('click', () => {
            const code = btn.getAttribute('data-code');
            input.value = code;
            performLookup(code);
        });
    });
});
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>