        <header id="navbar">
            <nav class="navbar">
                <div class="sitename">
                    <?=logo('logo.png', 'navbar__logo')?>
                    <h1><?=$site['name']?></h1>
                </div>
                <div class="other">
                    <div class="links">
                        <?php if ($page['name'] != "home") :?>
                        <a href="<?=$path?>" class="link">
                            Home
                        </a>
                        <?php endif; ?>
                        <div class="dropdown">
                            <a class="link">
                                Services
                            </a>
                            <div class="dropdown__items">
                                <a href="<?=$path?>services/minecraft.php" class="link">
                                    Minecraft Hosting
                                </a>
                                <a href="<?=$path?>services/web.php" class="link">
                                    Webhosting
                                </a>
                                <a href="<?=$path?>services/vps.php" class="link">
                                    VPS Hosting
                                </a>
                                <a href="<?=$path?>services/discord.php" class="link">
                                    Discord Bot Hosting
                                </a>
                                <a href="<?=$path?>services/panel.php" class="link">
                                    Panel Hosting
                                </a>
                            </div>
                        </div>
                        <a href="https://client.vacso.cloud" class="link">
                            Client Area
                        </a>
                        <a href="https://panel.vacso.cloud" class="link">
                            Game Panel
                        </a>
                    </div>
                    <div class="theme">
                        <img class="js-theme theme__icon" onclick="switchTheme('dark')" src="<?=$path?>files/icons/theme-moon.svg">
                    </div>
                    <div class="search">

                    </div>
                </div>
            </nav>

            <script>

                // Function to switch the theme
                function switchTheme(newTheme) {

                    const customPropertiesLight = {
                        '--text-clr': '#202020',
                        '--text-clr-invert': '#f3f3f3',
                        '--link-clr': '#3578e5',
                        '--link-clr-invert': '#3578e5',
                        '--bg-clr': '#f3f3f3',
                        '--bg-clr-dark': '#dddddd',
                        '--bg-clr-light': '#e0e0e0',
                        '--bg-clr-invert': '#1b1b1d',
                        '--bg-clr-invert-dark': '#0c0c0e',
                        '--bg-clr-invert-light': '#262629',
                        '--hover-clr': '#dddddd',
                        '--border-clr': '#dadde1',
                        '--nav-box-shadow': '0 1px 2px 0 #0000001a',
                    };


                    const customPropertiesDark = {
                        '--text-clr': '#f3f3f3',
                        '--text-clr-invert': '#202020',
                        '--link-clr': '#3578e5',
                        '--link-clr-invert': '#3578e5',
                        '--bg-clr': '#1b1b1d',
                        '--bg-clr-dark': '#0c0c0e',
                        '--bg-clr-light': '#262629',
                        '--bg-clr-invert': '#f3f3f3',
                        '--bg-clr-invert-dark': '#dddddd',
                        '--bg-clr-invert-light': '#e0e0e0',
                        '--hover-clr': '#454950',
                        '--border-clr': '#454950',
                        '--nav-box-shadow': '0',
                    };


                    // Save the current theme to local storage
                    localStorage.setItem('currentTheme', newTheme);

                    // Get the theme icon element
                    const themeIcon = document.querySelector('.js-theme');
                    const breadcrumbsIcon = document.querySelector('.js-breadcrumbs');

                    // Set the --text-clr CSS variable to the new theme value
                    // Set the icon source and onclick data based on the new theme
                    if (newTheme === 'light') {
                        themeIcon.src = '<?php echo $path; ?>files/icons/theme-sun.svg';
                        themeIcon.onclick = () => switchTheme('dark');

                        if (breadcrumbsIcon) {
                            breadcrumbsIcon.src = '<?php echo $path; ?>files/icons/breadcrumbs-dark.svg';
                        }

                        for (const property in customPropertiesLight) {
                            document.documentElement.style.setProperty(property, customPropertiesLight[property]);
                        }
                    } else if (newTheme === 'dark') {
                        themeIcon.src = '<?php echo $path; ?>files/icons/theme-moon.svg';
                        themeIcon.onclick = () => switchTheme('light');

                        if (breadcrumbsIcon) {
                            breadcrumbsIcon.src = '<?php echo $path; ?>files/icons/breadcrumbs-light.svg';
                        }

                        for (const property in customPropertiesDark) {
                        document.documentElement.style.setProperty(property, customPropertiesDark[property]);
                        }
                    }
                }

                // Function to load the saved theme when the page loads
                function loadSavedTheme() {
                    // Get the saved theme from local storage
                    const savedTheme = localStorage.getItem('currentTheme');

                    // If a theme is found in local storage, set it as the current theme
                    if (savedTheme) {
                        switchTheme(savedTheme);
                    }
                }

                // Call the loadSavedTheme function when the page loads
                window.addEventListener('load', loadSavedTheme);

            </script>
        </header>