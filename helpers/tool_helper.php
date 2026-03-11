<?php
/**
 * Renders a tool icon.
 * If the icon string starts with "fa-", it's treated as a Font Awesome class.
 * Otherwise, it's treated as plain text or an emoji.
 *
 * @param string $icon The icon string from the registry.
 * @param string $extraClass Optional extra CSS classes for the <i> tag.
 * @return string The rendered HTML for the icon.
 */
function render_tool_icon($icon, $extraClass = '') {
    if (strpos($icon, 'fa-') === 0) {
        return '<i class="' . htmlspecialchars($icon) . ' ' . htmlspecialchars($extraClass) . '"></i>';
    }
    return htmlspecialchars($icon);
}
/**
 * Renders a partial view with variables.
 * 
 * @param string $path The path to the partial file relative to app/views/partials/ (without .php)
 * @param array $vars Associative array of variables to extract into the partial's scope.
 * @return string The rendered HTML.
 */
function render_partial($path, $vars = []) {
    extract($vars);
    ob_start();
    $partialPath = APP . DS . 'views' . DS . 'partials' . DS . $path . '.php';
    if (file_exists($partialPath)) {
        include $partialPath;
    } else {
        echo "Partial not found: $path";
    }
    return ob_get_clean();
}
