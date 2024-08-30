<?php

$template = <<<TEMPLATE
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="refresh" content="0; url={url}">
        </head>
        <body>
            <p>Redirecting to {url}...</p>
        </body>
    </html>
    TEMPLATE;

$redirects = \json_decode(
    \file_get_contents(__DIR__ . '/redirects.json'),
);

foreach ($redirects as $from => $to) {
    $directory = __DIR__ . \DIRECTORY_SEPARATOR . \trim($from, '/');
    $filename = $directory . \DIRECTORY_SEPARATOR . 'index.html';

    if (!\is_dir($directory)) {
        \mkdir($directory, 0755, true);
    }

    \file_put_contents(
        $filename,
        \str_replace('{url}', $to, $template),
    );
}

echo 'Ok.';