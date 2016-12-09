<html>
    <head>
        <title> SelfFeed </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/index.css">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Open+Sans:800');
            @import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300'); 
            @import url('https://fonts.googleapis.com/css?family=Prociono');
            @import url('https://fonts.googleapis.com/css?family=Cormorant+Garamond:600');
            @import url('https://fonts.googleapis.com/css?family=Dosis:800');

        </style>
        <style>
            body,html{
                background-color : transparent !important;
            }
            #video {
                position : fixed;
                z-index : -1;
                top :0;
                background-color : black;
                
            }

            #movingStuff{
                position : absolute;
                z-index:1;
                top : 100vh;
            }
            .content_wrapper{
                height : 100vh;
                width : 100vw;
            }
            
            .diu{
                opacity: 0.5;
            }
        </style>
    </head>
    <body>
        <div style="position: relative;">
            <div class="content_wrapper" id="video">
                <img src="/Image/Facebook.png" />
            </div>
            <div id="movingStuff">
                <div class="content_wrapper diu" style="background-color:red;">

                </div>
                <div class="content_wrapper" style="background-color:blue;">

                </div>
                <div class="content_wrapper" style="background-color:green;">

                </div>
            </div>
        </div>

    </body>
</html>