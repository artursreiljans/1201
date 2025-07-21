<?php

$source = \json_decode(\file_get_contents(__DIR__ . '/redirects.json'));

$target = [];
foreach ($source as $from => $to) {
    $target[] = \sprintf(
        '/%s %s',
        $from,
        \str_replace('http://', 'https://zurbu.app/*/', $to),
    );
}

\file_put_contents(
    __DIR__ . '/_redirects',
    \implode(\PHP_EOL, $target),
);

echo 'Ok.';