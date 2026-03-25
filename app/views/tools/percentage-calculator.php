

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="tool-container mt-8">
        <h1 style="font-size: 2rem; margin-bottom: 0.5rem; color: var(--text-dark);">Percentage Calculator</h1>
        <p style="color: var(--text-muted); margin-bottom: 2rem;">Calculate the percentage of a number instantly without reloading.</p>
        
        <form class="ajax-tool-form" action="/percentage-calculator" method="POST">
            <div style="display: flex; gap: 1rem; flex-wrap: wrap; align-items: center;">
                <div class="form-group" style="flex: 1; min-width: 150px; margin-bottom: 0;">
                    <label for="value">What is</label>
                    <input type="number" id="value" name="value" class="form-control" required placeholder="e.g. 20">
                </div>
                <div style="font-weight: 700; font-size: 1.25rem; color: var(--primary); padding-top:1.5rem;">
                    % of
                </div>
                <div class="form-group" style="flex: 1; min-width: 150px; margin-bottom: 0;">
                    <label for="total">Total Value</label>
                    <input type="number" id="total" name="total" class="form-control" required placeholder="e.g. 100">
                </div>
            </div>
            <button type="submit" class="btn-primary" style="margin-top: 2rem;">Calculate Percentage</button>
        </form>

        <div id="toolResult" class="result-box"></div>
    </div>

    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->










