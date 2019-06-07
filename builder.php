<?php

$file = '.gitmodules';
$site = 'https://moeshin.github.io/';

$readme = <<<md
# My Demo Site

Site URL: [$site]($site)

Repository URL: [https://github.com/moeshin/moeshin.github.io/](https://github.com/moeshin/moeshin.github.io/)


md;

if (is_file($file)) {
    $arr = parse_ini_file($file, true);
    if (!empty($arr)) {
        $readme .= <<<md
## Demo List
Name|Commit
-|-

md;
        foreach ($arr as $value) {
            $name = $value['path'];
            $url = $value['url'];
            $readme .= "[$name]($site$name)|[$url]($url)\n";
        }
        $readme .= "\n";
    }
}

file_put_contents("README.md", $readme);
