<?php 
    declare(strict_types=1);
    require_once(__DIR__ . "/src/lib/utils.php");


    function makeHtmlFile(string $index_template_filename, array  $imageArrayWithNewPath, string $fileName): void {
        $html_filename = "public/".$fileName;
        $template_vars = ['imageArrayWithNewPath' => $imageArrayWithNewPath];
        $index = render_template($index_template_filename, $template_vars);
        file_put_contents($html_filename, $index);
    }

    function copyImages($imageArray):void {
        foreach($imageArray as $image) {
            echo copy($image, "public/img/".basename("$image", "db/"));
        }
        //copy the logo in both formats (ICO & PNG)
        copy("db/onePieceLogo.ico", "public/img/onePieceLogo.ico");
        copy("db/onePieceLogo.png", "public/img/onePieceLogo.png");
    }
    
    function changePaths(array $imageArray):array {
        $imageArrayWithNewPath = [];
        foreach($imageArray as $image) {
            $image = "img/" . basename("$image");
            $imageArrayWithNewPath[]= $image;
        }
        return $imageArrayWithNewPath;
    }

    function getImageArray():array {
        $imageArray = glob('db/capitulo*_*.jpg');
        return $imageArray;
    }

    function generatePublicFolders():void {
        $createDirCommand = "mkdir public/";
        $imgDir = "img";
        shell_exec($createDirCommand.$imgDir);
    }

    function removeOldPublicFolders(): void {
        $removeDirCommand = "rm -r public/";
        $dirToRemove = "img";
        shell_exec($removeDirCommand.$dirToRemove);
        // Now we are gonna remove the index.html from the public folder
        shell_exec($removeDirCommand."index.html");    }

    function main() {
        removeOldPublicFolders();
        $imageArray = getImageArray();
        generatePublicFolders();
        $imageArrayWithNewPath = changePaths($imageArray);
        $index_template_filename = "src/templates/index.template.php";
        $comics_template_filename = "src/templates/comics.template.php";
        $csvData_template_filename = "src/templates/csvData.template.php";
        $apiCaller_template_filename = "src/templates/apiCaller.template.php";
        copyImages($imageArray);
        makeHtmlFile($index_template_filename, $imageArrayWithNewPath, "index.html");
        makeHtmlFile($comics_template_filename, $imageArrayWithNewPath, "comics.html");
        makeHtmlFile($csvData_template_filename, $imageArrayWithNewPath, "csvData.html");
        makeHtmlFile($apiCaller_template_filename, $imageArrayWithNewPath, "apiCaller.html");
    }

    main();

?>