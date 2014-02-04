<html>
<head>
    <title>Travel Ace Powered by Shermans Travel</title>
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
    <script type="text/javascript" src="public/js/jquery.js"></script>
    <script type="text/javascript" src="public/js/jquery.ui.js"></script>
</head>
<body>
<div class="st">
    <?php include( './pages/header.php' ); ?>
    <section class="content">
        <div class="background"></div>
        <article class="forms">
            <div class="wrapper">
                <div class="left">
                    <?php include_once( './pages/menu.php' ); ?>
                </div>
                <div class="right">
                    <div class="right-wrapper">
                        <h1 class="heading"></h1>
                        <div class="form-container"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </article>
        <article class="ads">
            <div class="wrapper">
                <div class="float-left-50p">
                    <?php include_once( './pages/deals_list.php' ); ?>
                </div>
                <div class="float-right-50p">
                    <?php include_once( './pages/newsletter.php' ); ?>
                </div>
                <div class="clear"></div>
                <div class="large-margin-top">
                    <div class="float-left-33p text-center">
                        <img src="public/images/ad1.jpg" />
                    </div>
                    <div class="float-left-33p text-center">
                        <img src="public/images/ad2.jpg" />
                    </div>
                    <div class="float-right-33p text-center">
                        <img src="public/images/ad3.jpg" />
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </article>
    </section>
    <div class="clear"></div>
    <div class="hidden" style="display: none">
        <?php foreach( array( 'flights', 'hotels', 'deals', 'cars', 'vacations') as $item): ?>
            <?php include_once( './pages/' . $item . '_form.php' ); ?>
        <?php endforeach; ?>
    </div>
    <footer>
        <div class="top text-center">
            <img src="public/images/ad4.jpg" />
        </div>
        <div class="bottom text-center">
            <a href="#">Terms of Use</a>&nbsp;|&nbsp;
            <a href="#">Privacy Policy</a>&nbsp;|&nbsp;
            <a href="#">Help/Contact Us</a>&nbsp;|&nbsp;
            <a href="#">Tips</a>
        </div>
    </footer>
</div>
<script type="text/javascript" src="public/js/jquery.shermans_travel.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.st').ShermansTravel({
            debug:true,
            headings: {
                flights: 'Cheap flights - Up to 70% Off',
                hotels: 'Hotels heading',
                cars: 'Cars heading',
                deals: 'Deals heading',
                vacations: 'Vacations heading'
            }
        });
    });
</script>
</body>
</html>