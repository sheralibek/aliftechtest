<?php

$myfile = fopen("file.txt", "r") or die("Unable to open file!");
$array = explode(PHP_EOL, fread($myfile,filesize("file.txt")));

foreach ($array as $item) {
    $item = explode(' ', $item);

    if ($item[0] + $item[1] >= 0)
        $positive[] = $item[0] + $item[1];
    else
        $negative[] = $item[0] + $item[1];

    if ($item[0] - $item[1] >= 0)
        $positive[] = $item[0] - $item[1];
    else
        $negative[] = $item[0] - $item[1];

    if ($item[0] * $item[1] >= 0)
        $positive[] = $item[0] * $item[1];
    else
        $negative[] = $item[0] * $item[1];

    if ($item[0] / $item[1] >= 0)
        $positive[] = $item[0] / $item[1];
    else
        $negative[] = $item[0] / $item[1];
}

$posfile = fopen("positive.txt", "w") or die("Unable to open file!");
$negfile = fopen("negative.txt", "w") or die("Unable to open file!");
fwrite($posfile, print_r($positive, true));
fwrite($negfile, print_r($negative, true));

fclose($posfile);
fclose($negfile);

fclose($myfile);

echo "Files successfully saved";

return 0;