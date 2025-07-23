<?php

$jsFiles = [
    'assets/js/utils.js',
    'assets/js/api.js',
    'assets/js/forms.js',
    'assets/js/navigation.js',
    'assets/js/dashboard.js'
];

foreach ($jsFiles as $file) {
    echo "<script src=\"$file\"></script>\n";
}

?>
