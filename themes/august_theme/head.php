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

    <!-- Stylesheets -->
    <link rel="canonical" href="<?php echo url(); ?>" />
    <link rel="icon" href="<?php echo route($config['APP_ICON']); ?>" />

    <!-- Bootstrap -->
    <link href="<?php assets("bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <!-- Owl CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <!-- Tailwind -->
    <link rel="stylesheet" href="<?php themeAssets('august_theme', "tailwind.min.js")?>" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php themeAssets('august_theme',"index.css"); ?>" />

    <!-- Boxicons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- JavaScript -->
    <script src="<?php assets("bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
    <script src="<?php assets("jquery/jquery.min.js"); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
