<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DexBros Icons</title>
    <style>
        h6 {
            line-height: 0;
            padding: 0;
            margin: 24px 10px 0px 10px;
        }
        h4 {
            font-size: 14px;
        }
        .ycopied {
            background: #d9ffd0;
            display: inline-block;
            padding: 0px 20px;
            border-radius: 5px;
            color: #000000;
            position: absolute;
            left: 320px;
        }
        .usagedex {
            background: #f5f5f5;
            display: inline-block;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
            margin-bottom: 50px;
            width: 320px;
        }
        .npms {
            background: #f3f3f3;
            margin: 10px;
            padding: 7px;
            border-radius: 5px;
            display: block;
            max-width: 500px;
            border: 1px solid #e0e0e0;
            width: 100%;
        }
        span.cpclip {
            position: absolute;
            margin-left: 35px;
            margin-top: 6px;
            color: #1d9700;
            font-weight: bold;
        }
        ul.listwrapper {
            column-count: 12;
            margin: 0;
            padding: 0;
            line-height: 0;
        }
        ul.listwrapper li {
            width: 95%;
            display: inline-block;
            border: 1px solid #cacaca;
            margin: 5px 0px;
            padding: 5px 1px;
            text-align: center;
            height: 44px;
            border-radius: 5px;
        }
        ul.listwrapper li:hover {
            background: #f6f5f5;
            cursor: pointer;
        }
    </style>

    <style>
        <?php include("style.css"); ?>
    </style>
</head>
<body>

<div class="ccParent">
    <h1>DexBros Icons</h1>
    <div class="ycopied"></div>

    <h3>Installation</h3>
    <h6>NPM</h6>
    <input type="text" class="npms" id="npm install --save https://github.com/jayboro100/dexbrosicons.git" value="npm install --save https://github.com/jayboro100/dexbrosicons.git">

    <h6>YARN</h6>
    <input type="text" class="npms" id="yarn add dexbrosicons@https://github.com/jayboro100/dexbrosicons.git" value="yarn add dexbrosicons@https://github.com/jayboro100/dexbrosicons.git">

    <h1>Usage</h1>
    <div class="usagedex">
        import 'dexbrosicons/style.css';<br><br>
        &lt;span class="icon icon-btc"&gt;&lt;/span&gt;
    </div>
</div>

<h1>Available Icons</h1>
<ul class="listwrapper">
<?php
$entries = [];
$dir = dir("icons");
while (false !== ($entry = $dir->read())) {
    if ($entry[0] === '.') continue;
    $entries[] = $entry;
}
$dir->close();
sort($entries);

foreach ($entries as $name) {
    $iconName = str_replace(".svg", "", $name);
    echo <<<HTML
    <li class="thislist" id="$iconName">
        <span class="cpclip"></span>
        <span class="icon icon-$iconName">
            <span class="path1"></span>
            <span class="path2"></span>
        </span>
        <h4>$iconName</h4>
    </li>
HTML;
}
?>
</ul>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    // Icon click handler
    $('body').on('click', 'ul.listwrapper li', function () {
        const iconId = $(this).attr("id");
        $("ul.listwrapper li").css("background-color", "");
        $("ul.listwrapper li span.cpclip").html("");

        navigator.clipboard.writeText(iconId).then(() => {
            $(this).find("span.cpclip").html("<span class='icon icon-interest'></span> Copied!");
            $(this).css("background-color", "#efe8e8");
        });
    });

    // Input click handler
    $("body").on('click', 'input[type=text]', function () {
        $("ul.listwrapper li span.cpclip").html("");
        $("ul.listwrapper li").css("background-color", "");

        const command = $(this).attr("id");
        navigator.clipboard.writeText(command).then(() => {
            $(".ycopied").html("<span class='icon icon-interest'></span> Copied!")
                          .show()
                          .delay(3000)
                          .fadeOut(300);
            $(this).select();
        });
    });
});
</script>

</body>
</html>
