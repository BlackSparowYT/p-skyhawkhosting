<?php

    $page['name'] = "settings";
    $page['cat'] = "account";
    $page['path_lvl'] = 2;
    require_once("../files/components/account-setting.php");

    if(isset($_POST['save'])) {

        foreach ($_POST as $key => $item) {
            if($item != "save") {
                $stmt = $link->prepare("UPDATE settings SET `value` = ? WHERE setting = ?");
                $stmt->bind_param("ss", $item, $key);
                $stmt->execute();
            }
        }
        
        header("Location: dashboard.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sono:wght@300;600;800&display=swap" rel="stylesheet">

        <?php echo '<title>' . ucfirst($page['name']) . ' | ' . $site['name'] . '</title>' ?>
        <?php echo '<link rel="stylesheet" href="'.$path.'files/styles/core.css">' ?>
        <?php echo '<link rel="icon" type="image/x-icon" href="' . $path . 'files/logos/favicon.png">' ?>

        <style>
            
        </style>
    </head>

    <body>

        <?php include($path.'files/components/header.php'); ?>

        <main class="settings-page user-page">

            <div class="hero">
                <div class="hero-text">
                    <h1 class="t1">Settings</h1>
                </div>
            </div>
            <div class="admin-content container">
                <form class="table-content" method="POST">
                    <?php
                        require_once('../files/config.php');

                        $stmt = $link->prepare("SELECT * FROM `settings`");

                        if ($stmt->execute()) :
                            $is_run = $stmt->get_result();
                            while ($result = mysqli_fetch_assoc($is_run)) :
                    ?>
                        <h3><?=$result['setting']?></h3>
                        <input type="text" value="<?=$result['value']?>" name="<?=$result['setting']?>">
                    <?php endwhile; endif; ?>

                    <input type='submit' value='Save' name='save'>
                </form>
            </div>
        </main>
    </body>

</html>