<?php
use yii\helpers\Html;
?>


<html xmlns="http://www.w3.org/1999/html">
<head>
    <style id = 'textStyle' type="text/css">
        .fullText {
            font-size: 200%;
            white-space: pre;
        }

        textarea {
            white-space: pre;
        }
    </style>
</head>

<body>
<script src="http://localhost:8080/ckeditor/ckeditor.js")></script>
<script src='https://cdn.tinymce.com/4/tinymce.min.js'></script>
<script>
    tinymce.init({
        selector: '#pukanchik',
        height: 500,
        plugins: [
            'advlist autolink advlist link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools layer'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons | table',
        forced_root_block : "",
        valid_elements : '+*[*]',
        extended_valid_elements: 'a[href],li[*]',
        //extended_valid_elements: '*[*]',//'script[type|src],button[id|class|type|data-toggle|aria-haspopup|aria-expanded],ul[class|aria-labelledby]',
        remove_linebreaks : false
    });
</script>

<p>You have entered the following information:</p>
<label>File</label>

<form action="/save/save" method = post>
        <textarea id = "pukanchik" name="text">

            <?php
            $addr = Html::encode($model->fileName);

            $fullPath = ".\\..\\views\\dashboard\\" . $addr;

            $file = fopen($fullPath, "r");

            $openTagCount = 0;

            while(!feof($file)) {
                $line = fgets($file);

                $resLine = $line;
                if (strpos($line, '<div') !== false) {
                    $openTagCount = $openTagCount + 1;
                }
                if (strpos($line, '</div') !== false) {
                    $openTagCount = $openTagCount - 1;
                }

                if ($openTagCount === 0) {
                    $resLine = $line . "<br />";
                }
                echo $resLine;
            }

            fclose($file);
            ?>
        </textarea>

    <!--        <script>-->
    <!--            CKEDITOR.replace("pukanchik",-->
    <!--                {-->
    <!--                    enterMode : CKEDITOR.ENTER_BR-->
    <!--                }-->
    <!--            )-->
    <!--        </script>-->

    <input name="fileName" type="hidden" value="<?= $fullPath; ?>" />
    <!--        <input name="getDataTest" type="hidden" value= />-->
    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
</form>


</body>

</html>
