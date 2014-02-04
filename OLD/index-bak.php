<!DOCTYPE html>
<html lang="en">
<head>
    <title>J&L Core Systems - Parallax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="J&L Core Systems, experienced web design and development to suit all your needs. No job too hard, too small or too large.">
    <meta name="keywords" content="J&L Core Systems,symfony,zend,zend frameword,html5,css,js,javascript,jquery,extjs,wordpress,photoshop,victoria,bc,canada,design">
    <meta name="author" content="J&L Core Systems">

    <link href="./css/mini.php?files=bootstrap.min,bootstrap-responsive.min,site,parallax" rel="stylesheet">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">

    <!--[if lt IE 9]>
    <script type="text/javascript" src="js/mini.php?files=html5"></script>
    <![endif]-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.ui.js"></script>
</head>
<body data-spy="scroll">

<div class="parallax-scroll"></div>
<section id="parallax-container" class="parallax-container">
    <?php include( 'pages/pages.php' ); ?>
</section>

<script type="text/javascript" src="js/mini.php?files=cufon-yui,Copse_400.font<?php echo $body_js_files; ?>"></script>
<script type="text/javascript" src="js/jquery.parallax.sprite.js"></script>
<script type="text/javascript" src="js/jquery.parallax.item.js"></script>
<script type="text/javascript" src="js/jquery.parallax.js"></script>
<script type="text/javascript">
    /* DO NOT USE ON READY */
    $('section#parallax-container').parallax({
        debug: false,
        item_options: {
            debug: false,
            items: {
                'parallax-item-home': {
                    type: '<?php echo rand(0,1) == 0 ? 'slide':'fade'; ?>',
                    inDuration: 2000,
                    outDuration: 2000,
                    inDirection: '<?php echo rand(0,1) == 0 ? 'top':'bottom'; ?>',
                    outDirection: 'top',
                    pauseDuration: 1000,
                    css: { backgroundColor: 'black' }
                },
                'parallax-item-about': {
                    type: '<?php echo rand(0,1) == 0 ? 'slide':'fade'; ?>',
                    inDuration: 1000,
                    outDuration: 2000,
                    inDirection: '<?php echo rand(0,1) == 0 ? 'left':'right'; ?>',
                    outDirection: 'left',
                    pauseDuration: 1000,
                    css: { backgroundColor: 'black' }
                },
                'parallax-item-services': {
                    type: '<?php echo rand(0,1) == 0 ? 'slide':'fade'; ?>',
                    inDuration: 1000,
                    outDuration: 2000,
                    inDirection: '<?php echo rand(0,1) == 0 ? 'left':'right'; ?>',
                    outDirection: 'bottom',
                    pauseDuration: 1000,
                    css: { backgroundColor: 'black' }
                },
                'parallax-item-contact': {
                    type: '<?php echo rand(0,1) == 0 ? 'slide':'fade'; ?>',
                    inDuration: 1000,
                    outDuration: 2000,
                    inDirection: '<?php echo rand(0,1) == 0 ? 'top':'bottom'; ?>',
                    outDirection: 'bottom',
                    pauseDuration: 1000,
                    css: { backgroundColor: 'black' }
                }
            },
            sprite_options: {
                debug: true,
                start_offset: 'in', /* waiting, in, paused, out, complete */
                sprites: {
                    home_sprite_logo: [
                        {
                            start: {
                                offsetType: 'out',
                                opacity: 1
                            },
                            end: {
                                offsetType: 'out',
                                offset: 1000,
                                left: 500,
                                opacity: 0,
                                width: 0
                            }
                        }
                    ],
                    home_sprite_name: [
                        {
                            start: {
                                offsetType: 'out',
                                opacity: 1
                            },
                            end: {
                                offsetType: 'out',
                                offset: 1000,
                                left: -500,
                                opacity: 0
                            }
                        }
                    ],
                    about_sprite_logo: [
                        {
                            start: {
                                offsetType: 'in',
                                offset: 0,
                                left: -1000,
                                width: 0,
                                opacity: 0,
                                rotation: -720
                            },
                            end: {
                                offsetType: 'pause',
                                offset: 0,
                                left: 0
                            }
                        },{
                            start: {
                                offsetType: 'out'
                            },
                            end: {
                                offsetType: 'complete',
                                opacity: 0,
                                left: 1000,
                                width: 0,
                                rotation: 720
                            }
                        }
                    ],
                    about_sprite_name: [
                        {
                            start: {
                                offsetType: 'in',
                                left: 500,
                                opacity: 0
                            },
                            end: {
                                offsetType: 'pause',
                                left: 0
                            }
                        },{
                            start: {
                                offsetType: 'out'
                            },
                            end: {
                                offsetType: 'complete',
                                opacity: 0,
                                left: -500
                            }
                        }
                    ],
                    hscroll1: [
                        {
                            "start":{
                                "offsetType":"in",
                                left: "{width}"
                            },
                            "end":{
                                "offsetType":"pause",
                                "left":"({ww}/2)-({width}/2)-18"
                            }
                        },
                        {
                            "start":{
                                "offsetType":"out",
                                "left":"({ww}/2)-({width}/2)-18"
                            },
                            "end":{
                                "offsetType":"complete",
                                "left":"-{width}"
                            }
                        }
                     ]
                }
            }
        }
    });
</script>
</body>
</html>

