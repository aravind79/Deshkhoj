<?php
$zip = new ZipArchive;
$file = file_exists("deploy_final.zip") ? "deploy_final.zip" : "deploy.zip";

if ($zip->open($file) === TRUE) {
    if ($zip->extractTo(__DIR__)) {
        echo "Success! DeshKhoj is now extracted. Ready to go live.";
    } else {
        echo "Extraction Failed.";
    }
    $zip->close();
} else {
    echo "Could not find any deploy zip file: $file";
}
?>
