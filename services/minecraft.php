<?php

    $page['name'] = "minecraft";
    $page['categorie'] = "services";
    $page['path_lvl'] = 2;
    require_once("../files/config.php");

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
            <section class="hero hero--subpage" style="background-color: var(--bg-clr-dark); background-image: linear-gradient(90deg, rgba(27,27,29,0.7) 10%, rgba(27,27,29,0.5) 30%, rgba(27,27,29,0.5) 70%, rgba(27,27,29,0.7) 90%), url(<?=$path?>files/images/bg-hero--minecraft.png);">
                <h1>Minecraft Hosting</h1>
            </section>

            <section class="container">
                <div class="flexnav">

                </div>
                <?php

                    $categorie_name = $page['name'];
                    $stmt = $client_link->prepare("SELECT id FROM `categories` WHERE slug LIKE ?");
                    $stmt->bind_param("s", $categorie_name);
                    $stmt->execute();
                    $is_run = $stmt->get_result();
                    $result = mysqli_fetch_assoc($is_run);

                    $categorie_id = $result['id'];

                    $stmt = $client_link->prepare("SELECT products.*, product_price.monthly, product_price.quarterly, product_price.semi_annually, product_price.annually FROM `products` INNER JOIN product_price ON products.id = product_price.product_id WHERE category_id = ? ORDER BY products.order");
                    $stmt->bind_param("i", $categorie_id);    

                
                    echo "<div class='flexbox'>";


                    if ($stmt->execute()) {
                        $is_run = $stmt->get_result();
                        while ($result = mysqli_fetch_assoc($is_run)) {

                            //$description = str_replace('・','<br>・',$result['description']);
                            $description = str_replace('・','<br>',$result['description']);
                            $lines = explode("\n", $description);
                            $listItems = [];
                            $i = 1;
                            foreach ($lines as $line) { if (str_contains($line, '<br>')) { $line = str_replace('<br>', '', $line); $listItems[] = '<p>'.$line.'</p>'; $i++; } }
                            $description = "";
                            foreach ($listItems as $item) { $description .= $item; }
                            $price = $result['monthly']."/mo";

                            echo "<a class='card' href='https://client.vacso.cloud/checkout/config/".$result['id']."'/>";
                                echo "<div class='card__header'>";
                                    echo "<img src='https://client.vacso.cloud".$result['image']."' />";
                                    echo "<h3>".$result['name']."</h3>";
                                echo "</div>";
                                echo "<div class='card__body'>";
                                    echo "<p class='price'>€".$price."</p>";
                                    echo "<div class='description'>".$description."</div>";
                                echo "</div>";
                            echo "</a>"; 
                        }
                    } else { echo "<h2>Er is iets fout gegaan! Probeer het later opnieuw.</h2>"; }

                    echo "</div>";

                ?>
            </section>
        </main>

    </body>

</html>