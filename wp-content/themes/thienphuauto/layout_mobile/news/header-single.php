<head>
    <meta charset="utf-8">
    <meta content="document" name="resource-type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title() ?> - <?php echo get_bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>
    <!--//Css files here-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style_mobile_2022.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/libbrary.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/mycss_mobile.css" type="text/css">
    
    
    <style id="mz-css" type="text/css"></style>
    <style>
    .--savior-overlay-transform-reset {
        transform: none !important;
    }

    .--savior-overlay-z-index-top {
        z-index: 2147483643 !important;
    }

    .--savior-overlay-position-relative {
        position: relative;
    }

    .--savior-overlay-overflow-x-visible {
        overflow-x: visible !important;
    }

    .--savior-overlay-overflow-y-visible {
        overflow-y: visible !important;
    }

    .--savior-overlay-z-index-reset {
        z-index: auto !important;
    }

    .--savior-overlay-display-none {
        display: none !important;
    }

    .--savior-overlay-clearfix {
        clear: both;
    }

    .--savior-overlay-reset-filter {
        filter: none !important;
        backdrop-filter: none !important;
    }

    .--savior-tooltip-host {
        z-index: 9999;
        position: absolute;
        top: 0;
    }

    /*Override css styles for Twitch.tv*/
    main.--savior-overlay-z-index-reset {
        z-index: auto !important;
    }

    main.--savior-overlay-z-index-top {
        z-index: auto !important;
    }

    main.--savior-overlay-z-index-top .channel-root__player-container+div,
    main.--savior-overlay-z-index-top .video-player-hosting-ui__container+div {
        opacity: 0.1;
    }

    /*Dirty hack for facebook big video page e.g: https://www.facebook.com/abc/videos/...*/
    .--savior-backdrop {
        position: fixed !important;
        z-index: 2147483642 !important;
        top: 0;
        left: 0;
        height: 100vh;
        width: 100vw !important;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .--savior-overlay-twitter-video-player {
        position: fixed;
        width: 80%;
        height: 80%;
        top: 10%;
        left: 10%;
    }

    /* Fix conflict css with zingmp3 */
    .zm-video-modal.--savior-overlay-z-index-reset {
        position: absolute;
    }

    /* Dirty hack for xvideos99 */
    #page #main.--savior-overlay-z-index-reset {
        z-index: auto !important;
    }

    /* Overlay for ok.ru */
    #vp_w.--savior-overlay-z-index-reset.media-layer.media-layer__video {
        position: absolute;
        overflow-y: hidden;
    }

    /* Fix missing controller for tv.naver.com */
    .--savior-overlay-z-index-top.rmc_controller,
    .--savior-overlay-z-index-top.rmc_setting_intro,
    .--savior-overlay-z-index-top.rmc_highlight,
    .--savior-overlay-z-index-top.rmc_control_settings {
        z-index: 2147483644 !important;
    }

    /* Dirty hack for douyi.com */
    .swiper-wrapper.--savior-overlay-z-index-reset .swiper-slide:not(.swiper-slide-active),
    .swiper-wrapper.--savior-overlay-transform-reset .swiper-slide:not(.swiper-slide-active) {
        display: none;
    }

    .videoWrap+div>div {
        pointer-events: unset;
    }

    /* Dirty hack for fpt.ai */
    .mfp-wrap.--savior-overlay-z-index-top {
        position: relative;
    }

    .mfp-wrap.--savior-overlay-z-index-top .mfp-close {
        display: none;
    }

    .mfp-wrap.--savior-overlay-z-index-top .mfp-content {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    section.--savior-overlay-z-index-reset>main[role="main"].--savior-overlay-z-index-reset+nav {
        z-index: -1 !important;
    }

    section.--savior-overlay-z-index-reset>main[role="main"].--savior-overlay-z-index-reset section.--savior-overlay-z-index-reset div.--savior-overlay-z-index-reset~div {
        position: relative;
    }

    div[class^="tiktok"].--savior-overlay-z-index-reset {
        z-index: 2147483644 !important;
    }

    @-moz-keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @-webkit-keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @-o-keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
    </style>
    
    
</head>