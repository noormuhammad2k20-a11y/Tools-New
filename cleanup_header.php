<?php
$file = 'app/views/layouts/header.php';
$content = file_get_contents($file);
// Remove the leftover script block that starts with <script> and contains tailwind.config
$content = preg_replace('/<script>\s*tailwind\.config.*?<\/script>/s', '', $content);
file_put_contents($file, $content);
echo "Cleaned successfully.";
?>
