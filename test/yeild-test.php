<?php 

function file_lines($filename) {
    $file = fopen($filename, 'r'); 
    while (($line = fgets($file)) !== false) {
        yield $line; 
    } 
    fclose($file); 
}
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
function getNiceFileSize($bytes, $binaryPrefix=true) {
    if ($binaryPrefix) {
        $unit=array('B','KiB','MiB','GiB','TiB','PiB');
        if ($bytes==0) return '0 ' . $unit[0];
        return @round($bytes/pow(1024,($i=floor(log($bytes,1024)))),2) .' '. (isset($unit[$i]) ? $unit[$i] : 'B');
    } else {
        $unit=array('B','KB','MB','GB','TB','PB');
        if ($bytes==0) return '0 ' . $unit[0];
        return @round($bytes/pow(1000,($i=floor(log($bytes,1000)))),2) .' '. (isset($unit[$i]) ? $unit[$i] : 'B');
    }
}



// Test 1
$time_start = microtime_float();
$m = memory_get_peak_usage();
foreach (file_lines('data/100line.txt') as $l);
$time_end = microtime_float();
$time = $time_end - $time_start;
echo getNiceFileSize(memory_get_peak_usage() - $m), " - $time \n";

// Test 2
$time_start = microtime_float();
$m = memory_get_peak_usage();
foreach (file('data/100line.txt') as $l);
$time_end = microtime_float();
$time = $time_end - $time_start;
echo getNiceFileSize(memory_get_peak_usage() - $m), " - $time \n";
?>