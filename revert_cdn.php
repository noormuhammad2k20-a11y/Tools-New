<?php
$file = 'app/views/layouts/header.php';
$content = file_get_contents($file);
$cdn_block = <<<HTML
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
HTML;

$content = preg_replace('/<!-- Production Tailwind CSS & SVG Favicon -->.*?<link rel="stylesheet" href="<\?php echo URL_ROOT; \?>\/assets\/css\/tailwind\.css\?v=<\?php echo time\(\); \?>">/s', $cdn_block, $content);
file_put_contents($file, $content);
echo "Reverted to CDN.";
?>
