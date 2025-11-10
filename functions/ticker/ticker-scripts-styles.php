<?php
add_action('wp_enqueue_scripts', 'eat_feed_load_jquery');
function eat_feed_load_jquery(){  
    wp_enqueue_script('flg-marquee');
}

add_action('wp_footer', 'estas_dashboard_admin_footer_scripts');
function estas_dashboard_admin_footer_scripts(){
    
    echo <<<HERE
    <style type="text/css">
        
        #eat-marquee{
            display: block;
            padding: 5px;
            background: #ddd;
            margin-left: 0px;
            position: relative;
            box-sizing: border-box;
            overflow: hidden;
            margin-bottom: 20px;
        }
        #eat-marquee:before{
            content: "News";
            font-size: 12px;
            padding: 7px 10px;
            background: #0083B4;
            color: #fff;
            font-weight: bold;
            position: absolute;
            top: 0px;
            left: 0;
            bottom: 0px;
            box-sizing: border-box;
        }
        #eat-marquee span{
            margin-right: 20px;
            text-decoration: none;
            padding-right: 20px;
            color: #333;
            border-right: 1px solid #f4f4f4;
        }
        #eat-marquee span a{
            color: #0083B4;
        }
        #eat-marquee span a:hover{
            border-bottom: 1px solid #683F77;
        }
        
    </style>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#eat-marquee').marquee({
                //speed in milliseconds of the marquee
                duration: 18000,
                pauseOnHover: false,
                //gap in pixels between the tickers
                gap: 20,
                //time in milliseconds before the marquee will start animating
                delayBeforeStart: 0,
                //'left' or 'right'
                direction: 'left',
                //true or false - should the marquee be duplicated to show an effect of continues flow
                duplicated: true
              });
        });
    </script>
HERE;
}
