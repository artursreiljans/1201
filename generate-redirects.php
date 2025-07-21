<?php

$source = \parse_ini_file(__DIR__ . '/redirects.ini');

$redirects = [];
foreach ($source as $from => $to) {
    $redirect = \strlen($to) ? 'https://zurbu.app/*/' . $to : '/';
    $redirects[] = \sprintf('/%s %s', $from, $redirect);
}

\file_put_contents(__DIR__ . '/_redirects', \implode(\PHP_EOL, $redirects));

echo 'Ok.';
