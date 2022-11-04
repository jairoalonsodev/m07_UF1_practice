<?php

declare(strict_types=1);

// Utils
// -----

// ********************************************************************
// Print utils
// ********************************************************************


// Print Line. Appends an EOL at the end
// --------------------------------------------------------------------
function println(mixed $something = ''): void
{
    echo $something;
    echo PHP_EOL;
}

// Print array values in a single line. Appends an EOL at the end
// --------------------------------------------------------------------
function print_values($arr): void
{
    foreach ($arr as $elem) {
        echo "$elem ";
    }
    echo PHP_EOL;
}


// ********************************************************************
// Template utils
// ********************************************************************


// Vars start with an underscore and all caps to avoid collisions in $_TEMPLATE_VARS.
// --------------------------------------------------------------------
function render_template(string $_TEMPLATE_FILENAME, array $_TEMPLATE_VARS): string
{

    extract($_TEMPLATE_VARS);

    ob_start();
    require($_TEMPLATE_FILENAME);
    $_RESULT = ob_get_clean();

    return $_RESULT;
}


// ********************************************************************
// Json utils
// ********************************************************************


// Returns an array with the contents of $json_filename
// --------------------------------------------------------------------
function read_json(string $json_filename): array
{

    $json_str = file_get_contents($json_filename);
    $result   = json_decode($json_str, true);

    return $result;
}

// Returns an array with the CSV Data readed
// --------------------------------------------------------------------

function readCsvData(string $fileName, string $sepatator): array
{
    $data = [];
    if (($file = fopen("db/".$fileName.".csv", "r")) !== FALSE) {
        while (($csv = fgetcsv($file, 1000, $sepatator)) !== FALSE) {
            $data[] = $csv;
        }
        fclose($file);
    }
    return $data;
}
// 
// --------------------------------------------------------------------
function apiQuery(): array
{
    $response = [];
    for ($i = 1; $i < 4; $i++) {
        $apiResponse = shell_exec("curl https://api.jikan.moe/v4/people/" . $i);
        $responses = json_decode($apiResponse);
        $response[$responses->data->name] = $responses->data->url;
    }

    return $response;
}
