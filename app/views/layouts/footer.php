    </main>
    <!-- End Main Content Wrapper -->

    <!-- Minimal Custom Footer -->
    <footer class="bg-white border-t border-gray-200 pt-16 pb-8 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-12">
                
                <!-- Brand Info -->
                <div class="lg:col-span-2">
                    <a href="<?php echo URL_ROOT; ?>/" class="flex items-center gap-2 mb-4 text-decoration-none">
                        <div class="w-8 h-8 bg-black rounded-lg flex items-center justify-center text-white font-bold text-lg">
                            T
                        </div>
                        <span class="font-bold text-xl text-gray-900 tracking-tight">Pro<span class="text-primary">Tools</span></span>
                    </a>
                    <p class="text-sm text-gray-500 leading-relaxed max-w-sm mb-6">
                        We offer PDF, video, image, text and other online tools to make your life easier. All tools are free to use without limits.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-gray-600 transition-colors"><i class="fa-brands fa-twitter text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-gray-600 transition-colors"><i class="fa-brands fa-github text-xl"></i></a>
                    </div>
                </div>

                <!-- Categories -->
                <div>
                    <h3 class="font-semibold text-gray-900 mb-4 text-sm uppercase tracking-wider">Categories</h3>
                    <ul class="space-y-3">
                        <li><a href="<?php echo URL_ROOT; ?>/categories#text-tools" class="text-gray-600 hover:text-primary text-sm transition-colors text-decoration-none">AI & Text Tools</a></li>
                        <li><a href="<?php echo URL_ROOT; ?>/categories#developer-tools" class="text-gray-600 hover:text-primary text-sm transition-colors text-decoration-none">PDF Tools</a></li>
                        <li><a href="<?php echo URL_ROOT; ?>/categories#math-calculators" class="text-gray-600 hover:text-primary text-sm transition-colors text-decoration-none">Image Tools</a></li>
                        <li><a href="<?php echo URL_ROOT; ?>/categories#random-generators" class="text-gray-600 hover:text-primary text-sm transition-colors text-decoration-none">Generators</a></li>
                    </ul>
                </div>

                <!-- Legal -->
                <div>
                    <h3 class="font-semibold text-gray-900 mb-4 text-sm uppercase tracking-wider">Legal</h3>
                    <ul class="space-y-3">
                        <li><a href="<?php echo URL_ROOT; ?>/privacy-policy" class="text-gray-600 hover:text-primary text-sm transition-colors text-decoration-none">Privacy Policy</a></li>
                        <li><a href="<?php echo URL_ROOT; ?>/terms-of-service" class="text-gray-600 hover:text-primary text-sm transition-colors text-decoration-none">Terms of Service</a></li>
                        <li><a href="<?php echo URL_ROOT; ?>/cookie-policy" class="text-gray-600 hover:text-primary text-sm transition-colors text-decoration-none">Cookie Policy</a></li>
                    </ul>
                </div>

                <!-- Connect -->
                <div>
                    <h3 class="font-semibold text-gray-900 mb-4 text-sm uppercase tracking-wider">Connect</h3>
                    <ul class="space-y-3">
                        <li><a href="<?php echo URL_ROOT; ?>/contact" class="text-gray-600 hover:text-primary text-sm transition-colors text-decoration-none">Contact Us</a></li>
                        <li><a href="<?php echo URL_ROOT; ?>/about" class="text-gray-600 hover:text-primary text-sm transition-colors text-decoration-none">About Us</a></li>
                        <li><a href="<?php echo URL_ROOT; ?>/api" class="text-gray-600 hover:text-primary text-sm transition-colors text-decoration-none">API Documentation</a></li>
                    </ul>
                </div>

            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-gray-200 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-500">
                    &copy; <?php echo date('Y'); ?> ProTools. All rights reserved. Built for speed and privacy.
                </p>
                <div class="text-xs text-gray-400">
                    Version 2.0 (TinyWow Edition)
                </div>
            </div>
        </div>
    </footer>

    <!-- Main JS -->
    <script src="<?php echo URL_ROOT; ?>/assets/js/ai-tools.js?v=<?php echo time(); ?>"></script>
    <script src="<?php echo URL_ROOT; ?>/assets/js/main.js?v=<?php echo time(); ?>"></script>
</body>
</html>
