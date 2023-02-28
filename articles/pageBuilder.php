<?php
$mainString = "
<!DOCTYPE html>
<html>
    <head>
        <title>How to: Author - GDT</title>
        <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js\"></script>
        <script type=\"text/javascript\" src=\"../js/menu.js\"></script>
        <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css\">
        <link rel=\"stylesheet\" href=\"../css/main.css\">
        <link rel=\"stylesheet\" href=\"../css/bg.css\">
        <link rel=\"icon\" type=\"image/x-icon\" href=\"../img/favicon.ico\">
    </head>
    <body>
        <header id=\"menu-container\">
            <div id=\"menu-wrapper\">
                <div id=\"hamburger-menu\">
                    <span></span>
                    <span></span>
                    <span></span></div>
            </div>
            <ul class=\"menu-list accordion\">
                <li id=\"nav1\" class=\"toggle accordion-toggle\">
                    <a class=\"menu-link\" href=\"../index.php\">The Timeline</a>
                </li>
                <li id=\"nav2\" class=\"toggle accordion-toggle\">
                    <span class=\"icon-plus\"></span>
                    <a class=\"menu-link\" href=\"#\">Documentation</a>
                </li>
                <ul class=\"menu-submenu accordion-content\">
                    <li>
                        <a class=\"head\" href=\"submit-event.html\">How to Become an Author/Editor</a>
                    </li>
                    <li>
                        <a class=\"head\" href=\"howto-author.html\">How to use the Author Central</a>
                    </li>
                    <li>
                        <a class=\"head\" href=\"howto-editor.html\">How to use the Editor Central</a>
                    </li>
                    <li>
                        <a class=\"head\" href=\"help/help-central.html\">Help Central</a>
                    </li>
                </ul>
                <li id=\"nav3\" class=\"toggle accordion-toggle\">
                    <span class=\"icon-plus\"></span>
                    <a class=\"menu-link\" href=\"#\">AdminSpace</a>
                </li>
                <ul class=\"menu-submenu accordion-content\">
                    <li>
                        <a class=\"head\" href=\"../adminspace/author-central.php\">Author Central</a>
                    </li>
                    <li>
                        <a class=\"head\" href=\"../adminspace/editor-central.php\">Editor Central</a>
                    </li>
                </ul>
        </ul>
    </header>
    <div class=\"wrapped-wrapper\">
        <div class=\"wrapper\">
            <h1>
                <b>".$name."</b>
            </h1>
            <h2>".$date_start."</h2>
            <img src=\"".$coverImg."\" width=\"30vw\">
            <p>".$desc."</p>
        </div>
    </div>
</body>
</html>
?>