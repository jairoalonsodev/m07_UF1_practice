<?php 
    declare(strict_types=1);
    require_once(__DIR__ . "/src/lib/utils.php");


    function makeIndexHtml(string $index_template_filename, array  $imageArrayWithNewPath,): void {
        $html_filename = "public/index.html";
        $template_vars = ['imageArrayWithNewPath' => $imageArrayWithNewPath];
        $index = render_template($index_template_filename, $template_vars);
        file_put_contents($html_filename, $index);
    }

    function copyImages($imageArray):void {
        foreach($imageArray as $image) {
            echo copy($image, "public/img/".basename("$image", "comics/"));
        }
    }
    
    function changePaths(array $imageArray):array {
        $imageArrayWithNewPath = [];
        foreach($imageArray as $image) {
            $image = "img/" . basename("$image");
            $imageArrayWithNewPath[]= $image;
        }
        return $imageArrayWithNewPath;
    }

    function getImageArray(string $capitulo):array {
        $imageArray = glob('db/'.$capitulo.'_*.jpg');
        return $imageArray;
    }

    function generatePublicFolders():void {
        $createDirCommand = "mkdir public/";
        $imgDir = "img";
        shell_exec($createDirCommand.$imgDir);
    }

    function main() {
        $imageArray = getImageArray('capitulo1059');
        print_r($imageArray);
        $imageArray = getImageArray('capitulo1060');
        print_r($imageArray);
        $imageArray = getImageArray('capitulo1061');
        print_r($imageArray);
        $imageArray = getImageArray('capitulo1062');
        print_r($imageArray);
        $imageArray = getImageArray('capitulo1063');
        print_r($imageArray);
        $imageArray = getImageArray('capitulo1064');
        print_r($imageArray);

        generatePublicFolders();
        // $imageArrayWithNewPath = changePaths($imageArray);
        // $index_template_filename      = "templates/index.template.php";
        // copyImages($imageArray);
        // makeIndexHtml($index_template_filename, $imageArrayWithNewPath);
    }

    main();

?>