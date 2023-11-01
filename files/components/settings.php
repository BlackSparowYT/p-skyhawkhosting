<?php

    // Query the database table "settings"
    $stmt = $link->prepare("SELECT * FROM `settings`");
    $stmt->execute();
    $is_run = $stmt->get_result();
    $result = mysqli_fetch_assoc($is_run);
    
    // Put all the resulting settings in the $settings array
    if ($stmt->execute()) {
        $is_run = $stmt->get_result();
        while ($result = mysqli_fetch_assoc($is_run)) {
            $settings[$result["setting"]] = $result["value"];
        }
    }

?>
