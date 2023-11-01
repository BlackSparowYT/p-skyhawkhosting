<?php

    //ini_set('display_errors', 0);

    $path_lvl[1] = './';
    $path_lvl[2] = '../';
    $path_lvl[3] = '../../';
    $path_lvl[4] = '../../../';
    $path_lvl[5] = '../../../../';
    $path_lvl[6] = '../../../../../';

    if ($page['path_lvl'] == 1) {
        $path = $path_lvl[1];
    } else if ($page['path_lvl'] == 2) {
        $path = $path_lvl[2];
    } else if ($page['path_lvl'] == 3) {
        $path = $path_lvl[3];
    }

    // Set some settings
    $site['url'] = 'siteurl.com';
    $site['name'] = 'Site name';
    $site['description'] = 'Site description';

    // Get some preset functions
    include($path.'files/components/functions.php');

    // Get the credentials for all the connections
    include($path.'files/components/credentials.php');
    
    // Link the DB
    $link = new mysqli($db_host, $db_user, $db_password, $db_name);
    if (!$link){
        echo "<p style='color: red;'>Connection Unsuccessful!</p>";
    }

    // Link the DB
    $client_link = new mysqli($client_db_host, $client_db_user, $client_db_password, $client_db_name);
    if (!$client_link){
        echo "<p style='color: red;'>Client Area Connection Unsuccessful!</p>";
    }

    // Get and set some settings
    include($path.'files/components/settings.php');

    // Set some settings
    if (count($settings) > 0) {
        if ($settings['site_url'])              { $site['url'] = $settings['site_url']; }
        if ($settings['company_name'])          { $site['name'] = $settings['company_name']; }
        if ($settings['company_description'])   { $site['description'] = $settings['company_description']; }
    }

    $variable['siteName'] = $site['name'];
    $variable['siteDesc'] = $site['description'];
    $variable['year'] = date('Y');
    $variable['month'] = date('m');
    $variable['monthName'] = date('F');
    $variable['day'] = date('d');
    $variable['dayName'] = date('z');
    $variable['dayOfYear'] = date('l');

?>