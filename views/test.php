<?php

controller('Theme');

// Instantiate the ThemeController class
$themeController = new ThemeController();

// Call the getThemes method
$themes = $themeController->render('fairytale_theme', $_REQUEST['type']);
