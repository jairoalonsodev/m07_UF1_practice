<?php 
    declare(strict_types=1);
    require_once(__DIR__ . "/src/lib/utils.php");


    function makeHtmlFile(string $index_template_filename, array $template_vars, string $fileName): void {
        $html_filename = "public/".$fileName;
        $index = render_template($index_template_filename, $template_vars);
        file_put_contents($html_filename, $index);
    }

    function getChapterImagesWithCorrectPath(array $chapterImages):array {
        $chapterImagesWithNewPath = [];
        foreach($chapterImages as $image) {
            $image = "img/" . basename("$image");
            $chapterImagesWithNewPath[] = $image;
        }
        return $chapterImagesWithNewPath;
    }

    function getChapterImages(string $chapter):array {
        $chapterImages = glob("db/capitulo".$chapter."_*.jpg");
        return $chapterImages;
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
        shell_exec($removeDirCommand."index.html");    
    }

    function main() {
        removeOldPublicFolders();
        $imageArray = getImageArray();
        generatePublicFolders() ;
        $imageArrayWithNewPath = changePaths($imageArray);
        $csvBlogData = readCsvData("blog", ";");
        $csvData = readCsvData("onepiece_datos", ",");
        $response = apiQuery();
        $chapter1059Images = getChapterImages("1059");
        $chapter1059ImagesWithCorrectPath = getChapterImagesWithCorrectPath($chapter1059Images);
        $chapter1060Images = getChapterImages("1060");
        $chapter1060ImagesWithCorrectPath = getChapterImagesWithCorrectPath($chapter1060Images);
        $chapter1061Images = getChapterImages("1061");
        $chapter1061ImagesWithCorrectPath = getChapterImagesWithCorrectPath($chapter1061Images);
        $chapter1062Images = getChapterImages("1062");
        $chapter1062ImagesWithCorrectPath = getChapterImagesWithCorrectPath($chapter1062Images);
        $chapter1063Images = getChapterImages("1063");
        $chapter1063ImagesWithCorrectPath = getChapterImagesWithCorrectPath($chapter1063Images);
        $chapter1064Images = getChapterImages("1064");
        $chapter1064ImagesWithCorrectPath = getChapterImagesWithCorrectPath($chapter1064Images);
        $blogTemplateVars = ["csvBlogData" => $csvBlogData];
        $imageTemplateVars = ["imageArrayWithNewPath" => $imageArrayWithNewPath];
        $csvTemplateVars = ["csvData" => $csvData];
        $apiTemplateVars = ["response" => $response];
        $chapter1059TemplateVars = ["chapter1059ImagesWithCorrectPath" => $chapter1059ImagesWithCorrectPath];
        $chapter1060TemplateVars = ["chapter1060ImagesWithCorrectPath" => $chapter1060ImagesWithCorrectPath];
        $chapter1061TemplateVars = ["chapter1061ImagesWithCorrectPath" => $chapter1061ImagesWithCorrectPath];
        $chapter1062TemplateVars = ["chapter1062ImagesWithCorrectPath" => $chapter1062ImagesWithCorrectPath];
        $chapter1063TemplateVars = ["chapter1063ImagesWithCorrectPath" => $chapter1063ImagesWithCorrectPath];
        $chapter1064TemplateVars = ["chapter1064ImagesWithCorrectPath" => $chapter1064ImagesWithCorrectPath];
        $index_template_filename = "src/templates/index.template.php";
        $comics_template_filename = "src/templates/comics.template.php";
        $csvData_template_filename = "src/templates/csvData.template.php";
        $apiCaller_template_filename = "src/templates/apiCaller.template.php";
        $capitulo1059_template_filename = "src/templates/capitulo1059.template.php";
        $capitulo1060_template_filename = "src/templates/capitulo1060.template.php";
        $capitulo1061_template_filename = "src/templates/capitulo1061.template.php";
        $capitulo1062_template_filename = "src/templates/capitulo1062.template.php";
        $capitulo1063_template_filename = "src/templates/capitulo1063.template.php";
        $capitulo1064_template_filename = "src/templates/capitulo1064.template.php";
        copyImages($imageArray);
        makeHtmlFile($index_template_filename, $blogTemplateVars, "index.html");
        makeHtmlFile($comics_template_filename, $imageTemplateVars, "comics.html");
        makeHtmlFile($csvData_template_filename, $csvTemplateVars, "csvData.html");
        makeHtmlFile($apiCaller_template_filename, $apiTemplateVars, "apiCaller.html");
        makeHtmlFile($capitulo1059_template_filename, $chapter1059TemplateVars , "1059.html");
        makeHtmlFile($capitulo1060_template_filename, $chapter1060TemplateVars, "1060.html");
        makeHtmlFile($capitulo1061_template_filename, $chapter1061TemplateVars, "1061.html");
        makeHtmlFile($capitulo1062_template_filename, $chapter1062TemplateVars, "1062.html");
        makeHtmlFile($capitulo1063_template_filename, $chapter1063TemplateVars, "1063.html");
        makeHtmlFile($capitulo1064_template_filename, $chapter1064TemplateVars, "1064.html");
    }

    main();
