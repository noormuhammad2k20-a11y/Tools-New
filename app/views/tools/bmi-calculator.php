

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="tool-container mt-8">
        <h1 style="font-size: 2rem; margin-bottom: 0.5rem; color: var(--text-dark);">BMI Calculator</h1>
        <p style="color: var(--text-muted); margin-bottom: 2rem;">Check your Body Mass Index exactly and evaluate if you are in a healthy weight range.</p>
        
        <form class="ajax-tool-form" action="/bmi-calculator" method="POST">
            <div style="display: flex; gap: 1rem; flex-wrap: wrap; align-items: center;">
                <div class="form-group" style="flex: 1; min-width: 150px; margin-bottom: 0;">
                    <label for="weight">Weight (kg)</label>
                    <input type="number" id="weight" name="weight" class="form-control" required placeholder="e.g. 70" step="any">
                </div>
                <div class="form-group" style="flex: 1; min-width: 150px; margin-bottom: 0;">
                    <label for="height">Height (cm)</label>
                    <input type="number" id="height" name="height" class="form-control" required placeholder="e.g. 175" step="any">
                </div>
            </div>
            <button type="submit" class="btn-primary" style="margin-top: 2rem;">Calculate BMI</button>
        </form>

        <div id="toolResult" class="result-box"></div>
    </div>

    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->










