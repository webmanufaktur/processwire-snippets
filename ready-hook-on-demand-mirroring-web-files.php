<?php namespace ProcessWire;

// your regular ready.php
// ...

// On-demand mirroring of remote web server files to your dev environment
// Source: https://processwire.com/blog/posts/pw-3.0.137/#on-demand-mirroring-of-remote-web-server-files-to-your-dev-environment
$wire->addHookAfter('Pagefile::url, Pagefile::filename', function ($event) {
    $config = $event->wire('config');
    $file = $event->return;

    if ($event->method == 'url') {
        // convert url to disk path
        $file = $config->paths->root . substr($file, strlen($config->urls->root));
    }

    if (!file_exists($file)) {
        // download file from source if it doesn't exist here
        $src = 'https://domain.com/site/assets/files/';
        $url = str_replace($config->paths->files, $src, $file);
        $http = new WireHttp();
        $http->download($url, $file);
    }
});
