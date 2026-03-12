<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($meta_title) ? htmlspecialchars($meta_title) : SITE_TITLE; ?></title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
        <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90' fill='%232563eb'>T</text></svg>">
    
    <!-- Tailwind CSS (via CDN for Rapid UI Cloning) -->
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: '#2563eb', // TinyWow brand blue
                        'primary-hover': '#1d4ed8',
                        'bg-soft': '#f8fafc',
                        'border-soft': '#e2e8f0',
                    }
                }
            }
        }
    </script>

    <!-- Legacy custom styles -->
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/assets/css/style.css?v=<?php echo time(); ?>">
    
    <style>
        /* Base Tailwind overrides for clean aesthetics */
        body {
            background-color: #ffffff;
            color: #1f2937;
            -webkit-font-smoothing: antialiased;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <!-- Sleek Minimal Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="<?php echo URL_ROOT; ?>/" class="flex items-center gap-2 group text-decoration-none">
                        <div class="w-8 h-8 bg-black rounded-lg flex items-center justify-center text-white font-bold text-lg">
                            T
                        </div>
                        <span class="font-bold text-xl text-gray-900 tracking-tight">Pro<span class="text-primary">Tools</span></span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="<?php echo URL_ROOT; ?>/categories" class="text-gray-600 hover:text-gray-900 font-medium text-sm transition-colors text-decoration-none">Categories</a>
                    <a href="<?php echo URL_ROOT; ?>/#popular" class="text-gray-600 hover:text-gray-900 font-medium text-sm transition-colors text-decoration-none">Popular</a>
                    <div class="h-5 w-px bg-gray-300"></div>
                    <a href="<?php echo URL_ROOT; ?>/categories" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary-hover focus:outline-none transition-colors text-decoration-none">
                        Start Building
                    </a>
                </nav>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button type="button" class="text-gray-500 hover:text-gray-900 focus:outline-none p-2" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div class="hidden md:hidden bg-white border-t border-gray-100" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="<?php echo URL_ROOT; ?>/categories" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 text-decoration-none">Categories</a>
                <a href="<?php echo URL_ROOT; ?>/#popular" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 text-decoration-none">Popular</a>
            </div>
        </div>
    </header>

    <!-- Main Content Wrapper -->
    <main class="flex-grow">
