<?php
$file = fopen("mat.txt", "w");
fwrite($file, "1" . PHP_EOL);
fclose($file);
?>
