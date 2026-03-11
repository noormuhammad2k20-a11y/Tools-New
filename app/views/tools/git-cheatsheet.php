<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'header.php'; ?>

<!-- Slim Hero -->
<?php require_once APP . DS . 'views' . DS . 'partials' . DS . 'tool-hero.php'; ?>

<!-- Tool Interface -->
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-2 relative z-10 mb-16" id="tool-interface">
    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="mb-4">
                <div class="input-group input-group-lg shadow-sm rounded-pill overflow-hidden border">
                    <span class="input-group-text bg-white border-0 ps-4"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                    <input type="text" id="git-search" class="form-control border-0 py-3" placeholder="Search commands (e.g. 'branch', 'merge', 'undo')...">
                </div>
            </div>

            <div id="git-content" class="row g-4">
                <!-- Categories will be injected here -->
            </div>
        </div>
    </div>

    </div>
</main>

<!-- Content + Sidebar (SEO, FAQ) -->
<section class="py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-200 bg-white">
    <div class="max-w-3xl mx-auto">
        <article class="prose prose-blue prose-lg max-w-none text-gray-600 mb-12" id="seo-article-content">
            
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



<script>
const GIT_COMMANDS = [
    {
        cat: "Setup",
        items: [
            { cmd: "git init", desc: "Initialize a new local repository" },
            { cmd: "git clone <url>", desc: "Clone a repository from a URL" },
            { cmd: 'git config --global user.name "Name"', desc: "Set your username globally" }
        ]
    },
    {
        cat: "Changes",
        items: [
            { cmd: "git add .", desc: "Stage all changes for commit" },
            { cmd: 'git commit -m "msg"', desc: "Commit staged changes with message" },
            { cmd: "git status", desc: "Show state of working directory" },
            { cmd: "git diff", desc: "Show unstaged changes" }
        ]
    },
    {
        cat: "Branches",
        items: [
            { cmd: "git branch", desc: "List all local branches" },
            { cmd: "git checkout -b <name>", desc: "Create and switch to new branch" },
            { cmd: "git merge <name>", desc: "Merge branch into current" },
            { cmd: "git branch -d <name>", desc: "Delete a local branch" }
        ]
    },
    {
        cat: "Sync",
        items: [
            { cmd: "git pull", desc: "Fetch and merge remote changes" },
            { cmd: "git push origin <branch>", desc: "Push local changes to remote" },
            { cmd: "git remote -v", desc: "Show remote repository URLs" }
        ]
    }
];

document.addEventListener('DOMContentLoaded', () => {
    renderCommands(GIT_COMMANDS);

    document.getElementById('git-search').addEventListener('input', (e) => {
        const query = e.target.value.toLowerCase();
        const filtered = GIT_COMMANDS.map(c => ({
            ...c,
            items: c.items.filter(i => i.cmd.toLowerCase().includes(query) || i.desc.toLowerCase().includes(query))
        })).filter(c => c.items.length > 0);
        renderCommands(filtered);
    });
});

function renderCommands(data) {
    const container = document.getElementById('git-content');
    container.innerHTML = '';

    data.forEach(cat => {
        const col = document.createElement('div');
        col.className = 'col-lg-6';
        
        let itemsHtml = '';
        cat.items.forEach(item => {
            itemsHtml += `
                <div class="p-3 mb-2 rounded-3 bg-light border-start border-primary border-4 d-flex justify-content-between align-items-center">
                    <div>
                        <code class="fw-bold text-primary fs-6">${item.cmd}</code>
                        <div class="small text-muted mt-1">${item.desc}</div>
                    </div>
                    <button class="btn btn-link text-muted p-0" onclick="copyCmd('${item.cmd}')"><i class="fa-solid fa-copy"></i></button>
                </div>
            `;
        });

        col.innerHTML = `
            <div class="pro-card h-100 p-4 border shadow-sm">
                <h4 class="fw-bold mb-4 text-gradient-primary">${cat.cat}</h4>
                ${itemsHtml}
            </div>
        `;
        container.appendChild(col);
    });
}

function copyCmd(cmd) {
    navigator.clipboard.writeText(cmd).then(() => {
        showToast('Command Copied!');
    });
}
</script>


<?php require_once APP . DS . 'views' . DS . 'layouts' . DS . 'footer.php'; ?>