<?php

const asd = '';
$file = '.gitmodules';
$site = 'https://moeshin.github.io/';
$repository = 'https://github.com/moeshin/moeshin.github.io/';

$readme = <<<md
# My Demo Site

Site URL: [$site]($site)

Repository URL: [$repository]($repository)


md;

if (is_file($file)) {
    $ini = parse_ini_file($file, true);
    if (!empty($ini)) {
        $json = file_get_contents('demos.json');
        $json = $json === false ? [] : json_decode($json, true);
        $readme .= <<<md
## Demo List

|Name|Repository|
|---|---|

md;
        foreach ($ini as $value) {
            $name = $value['path'];
            $repo = $value['url'];
            $url = $site . $name;
            $suffix = $json[$name];
            if ($suffix) {
                $url = rtrim($url, '/') . '/' . $suffix;
            }
            $readme .= "|[$name]($url)|[$repo]($repo)|\n";
        }

    }
}

file_put_contents('README.md', $readme);
