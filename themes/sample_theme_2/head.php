<head>

  <!-- Meta Tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php echo $weddingData['brideName'];?> Weds <?php echo $weddingData['groomName'];?> - Join us in celebrating the wedding of <?php echo $weddingData['brideName'];?> and <?php echo $weddingData['groomName'];?> on August 23, 2024. Get all the details, RSVP, and share your best wishes online.">
    <meta name="keywords" content="wedding, eSubhalekha, online Subhalekha, evite, online invitation, <?php echo $weddingData['weddingName'];?>, <?php echo $weddingData['weddingID'];?>, <?php echo $weddingData['brideName'];?>, <?php echo $weddingData['groomName'];?>, wedding details, wedding RSVP, wedding event, eSubhalekha">
    <meta name="author" content="eSubhalekha.com">
    <meta name="robots" content="index, follow">
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="theme-color" content="<?php echo $config['APP_THEME_COLOR']; ?>" />

       <!-- Open Graph Tags -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $weddingData['weddingName'] . " - " . $config['APP_NAME']; ?>" />
    <meta property="og:url" content="<?php echo url(); ?>" />
    <meta property="og:description" content="<?php echo $weddingData['brideName']; ?> Weds <?php echo $weddingData['groomName']; ?> - Join us in celebrating the wedding of <?php echo $weddingData['brideName']; ?> and <?php echo $weddingData['groomName']; ?> on <?php echo $weddingData['weddingDate']; ?>. Get all the details, RSVP, and share your best wishes online." />
    <meta property="og:image" itemprop="image" content="<?= url() ?>/image.png?brideName=<?php echo urlencode($weddingData['brideName']); ?>&groomName=<?php echo urlencode($weddingData['groomName']); ?>&weddingDate=<?php echo urlencode($weddingData['weddingDate']); ?>" />
    <meta property="og:image:secure_url" itemprop="image" content="<?= url() ?>/image.png?brideName=<?php echo urlencode($weddingData['brideName']); ?>&groomName=<?php echo urlencode($weddingData['groomName']); ?>&weddingDate=<?php echo urlencode($weddingData['weddingDate']); ?>" />
    <meta property="og:site_name" content="<?php echo $config['APP_NAME']; ?>" />
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $config['APP_NAME']; ?>" />
    <meta name="twitter:description" content="<?php echo $weddingData['brideName']; ?> Weds <?php echo $weddingData['groomName']; ?> - Join us in celebrating the wedding of <?php echo $weddingData['brideName']; ?> and <?php echo $weddingData['groomName']; ?> on <?php echo $weddingData['weddingDate']; ?>. Get all the details, RSVP, and share your best wishes online." />
    <meta name="twitter:image" content="<?= url() ?>/image.png?brideName=<?php echo urlencode($weddingData['brideName']); ?>&groomName=<?php echo urlencode($weddingData['groomName']); ?>&weddingDate=<?php echo urlencode($weddingData['weddingDate']); ?>" />

    <!-- Bootstrap core CSS -->
    <link href="<?php assets("bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <script src="<?php assets("bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>

    <!-- Jquery -->
    <script src="<?php assets("jquery/jquery.min.js"); ?>"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php themeAssets('sample_theme_2',"css/common.css");?>">
    <link rel="stylesheet" href="<?php themeAssets('sample_theme_2',"css/app.css"); ?>">

    <!-- owl carousel css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.theme.default.min.css">

    <title>
        <?php echo $config['APP_TITLE']; ?>
    </title>
</head>