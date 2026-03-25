

<!-- Slim Hero -->


<!-- Tool Interface -->

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


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->




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






