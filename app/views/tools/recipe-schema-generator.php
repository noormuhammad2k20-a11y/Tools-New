

<!-- Slim Hero -->


<!-- Tool Interface -->

    <div class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 p-6 sm:p-10" style="overflow: visible;">
        <!-- Custom Tool Interface Extracted from Original File -->
        
    <div class="pro-app-main-full animate-fade-up">
        <div class="pro-card">
            <!-- Header -->
            

            <div class="row g-4">
                <div class="col-lg-5">
                    <form action="" method="POST" class="ajax-tool-form">
                        <div class="bg-light p-4 rounded-4 border shadow-sm">
                            <h5 class="fw-bold mb-4">Recipe Details</h5>
                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Recipe Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Grandma's Secret Apple Pie" required>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Author</label>
                                    <input type="text" name="author" class="form-control" placeholder="Chef Mario">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Prep Time (ISO)</label>
                                    <input type="text" name="time" class="form-control" placeholder="e.g. PT45M">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold">Recipe Yield</label>
                                <input type="text" name="yield" class="form-control" placeholder="e.g. 6 servings">
                            </div>

                            <div class="mb-4">
                                <label class="form-label small fw-bold">Ingredients (Line Separated)</label>
                                <textarea name="ingredients" class="form-control" rows="5" placeholder="3 large apples\n2 cups of flour\n1 cup of sugar..." required></textarea>
                            </div>

                            <button type="submit" class="btn btn-success w-100 py-3 fw-bold rounded-pill shadow-sm">
                                <i class="fa-solid fa-bowl-food me-2"></i> Bake Recipe Schema
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-7">
                    <div id="toolResultWrapper" style="display: none;" class="h-100">
                        <div class="bg-dark p-4 rounded-4 shadow-lg h-100">
                            <h5 class="text-white fw-bold mb-3">Recipe JSON-LD Code</h5>
                            <div id="toolResult"></div>
                        </div>
                    </div>
                    <div id="empty-state" class="bg-light p-5 rounded-4 border h-100 d-flex flex-column align-items-center justify-content-center opacity-75 border-dashed">
                         <i class="fa-solid fa-kitchen-set fa-4x mb-3 text-muted"></i>
                         <p class="h5 fw-bold text-muted">Kitchen Ready</p>
                         <p class="text-muted small text-center px-4">Generate rich culinary structured data to help foodies find your delicious creations.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


<!-- Content + Sidebar (SEO, FAQ) -->
<div id="unique-article-content" class="article-content">
            
            

<!-- Suggested Tools Strip -->


<!-- Popular Tools Section -->



<style>
.border-dashed { border-style: dashed !important; border-width: 2px !important; }
</style>







