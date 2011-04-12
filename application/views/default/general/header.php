<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <!--  Version: Multiflex-3 Update-2 / Layout-4             -->
    <!--  Date:    November 29, 2006                           -->
    <!--  Author:  G. Wolfgang                                 -->
    <!--  License: Fully open source without restrictions.     -->
    <!--           Please keep footer credits with a link to   -->
    <!--           G. Wolfgang (www.1-2-3-4.info). Thank you!  -->

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="3600" />
        <meta name="revisit-after" content="2 days" />
        <meta name="robots" content="index,follow" />
        <meta name="publisher" content="Your publisher infos here ..." />
        <meta name="copyright" content="Your copyright infos here ..." />
        <meta name="author" content="Design: G. Wolfgang www.1-2-3-4.info / Author: www.definslab.com" />

        <meta name="distribution" content="global" />
        <meta name="description" content="Your page description here ..." />
        <meta name="keywords" content="Your keywords, keywords, keywords, here ..." />

        <?php
            echo $this->page->get('css',true); //  Default CSS
            echo $this->page->get('css');
            echo $this->page->get('js', true); // Default Js
            echo $this->page->get('js');

            echo "<title>" . $this->page->title . "</title>";
        ?>

        <link rel="icon" type="image/x-icon" href="./img/favicon.ico" />

    </head>

    <!-- Global IE fix to avoid layout crash when single word size wider than column width -->
    <!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->

    <body>
        <!-- Main Page Container -->
        <div class="page-container">

            <!-- For alternative headers START PASTE here -->


            <!-- A. HEADER -->
            <div class="header">

                <!-- A.1 HEADER TOP -->
                <div class="header-top">

                    <!-- Sitelogo and sitename -->
                    <a class="sitelogo" href="#" title="Go to Start page"></a>
                    <div class="sitename">
                        <h1><a href="index.php" title="Go to Start page">Academic Network</a></h1>

                        <h2>Under Construction :(</h2>
                    </div>

                    <!-- Navigation Level 0 -->
                    <div class="nav0">
                        <ul>
                            <li><a href="#" title="Pagina home in Italiano"><?php echo $this->page->img('flag_italy.gif'); ?></a></li>
                            <li><a href="#" title="Homepage auf Deutsch"><?php echo $this->page->img('flag_germany.gif'); ?></a></li>
                            <li><a href="#" title="Hemsidan p&aring; svenska"><?php echo $this->page->img('flag_sweden.gif'); ?></a></li>

                        </ul>
                    </div>

                    <!-- Navigation Level 1 -->
                    
                    <div class="nav1">
                        <ul>
                            <?php
                                foreach($this->page->nav1 as $text=> $link)
                                        echo "<li>" . anchor($link,$text) . "</li>";
                            ?>
                        </ul>
                    </div>
                </div>

                <!-- A.2 HEADER BOTTOM -->

                <div class="header-bottom">

                    <!-- Navigation Level 2 (Drop-down menus) -->
                    <div class="nav2">

                        <?php
                        if(isset($this->page->nav2)){
                            foreach($this->page->nav2 as $i){
                                // $i[0] contains menu, $1 contains submenu as array
                                echo "<ul>\n";
                                echo "<li>" . anchor($i[0][1], $i[0][0]) . "\n";
                                // look for submenu
                                if(isset ($i[1])){
                                    $submenu = $i[1];
                                    echo "<!--[if lte IE 6]><table><tr><td><![endif]-->\n";
                                    echo "<ul>\n";
                                    foreach($submenu as $text=> $link)
                                        echo "<li>" . anchor($link,$text) . "</li>\n";
                                    echo "</ul>\n";
                                    echo "<!--[if lte IE 6]></td></tr></table></a><![endif]-->\n";
                                }
                                echo "</li></ul>\n";
                            }
                        }
                            
                        ?>

                    </div>
                </div>

                <!-- A.3 HEADER BREADCRUMBS -->

                <!-- Breadcrumbs -->
                <div class="header-breadcrumbs">
                    <ul>

                        <?php
                            foreach($this->page->breadcrumbs as $text=>$link)
                                    echo "<li><a href = '$link' > $text &nbsp;</a></li>";
                        ?>
                        <li>Here</li>
                    </ul>

                    <!-- Search form -->

                    <div class="searchform">
                        <form action="index.html" method="get">
                            <fieldset>
                                <input name="field" class="field"  value=" Search..." />
                                <input type="submit" name="button" class="button" value="GO!" />
                            </fieldset>
                        </form>
                    </div>
                </div>

            </div>


            <!-- For alternative headers END PASTE here -->

            <!-- B. MAIN -->
            <div class="main">