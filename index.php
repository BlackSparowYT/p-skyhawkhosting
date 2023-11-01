<?php

    $page['name'] = "home";
    $page['categorie'] = "default";
    $page['path_lvl'] = 1;
    require_once("./files/config.php");

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <?php echo '<title>' . ucfirst($page['name']) . ' | ' . $site['name'] . '</title>' ?>
        <?php echo '<link rel="stylesheet" href="' . $path . 'files/styles/core.css">' ?>
        <?php echo '<link rel="icon" type="image/x-icon" href="' . $path . 'files/logos/favicon.png">' ?>

    </head>

    <body class="home page">

        <?php include($path.'files/components/header.php'); ?>
        <?php //include($path.'files/components/sidebar.php'); ?>


        <main class="content">
            <section class="hero hero--homepage">
                <h1><?=$variable['siteName']?></h1>
                <p><?=$variable['siteDesc']?></p>
            </section>

            <section class="container">

            </section>
        </main>

    </body>

</html>