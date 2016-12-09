<html>
    <head>
        <title> SelfFeed </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/index.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/profile.css">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Open+Sans:800');
            @import url('https://fonts.googleapis.com/css?family=Open+Sans:700');
            @import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300'); 
            @import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700');
            @import url('https://fonts.googleapis.com/css?family=Prociono');
            @import url('https://fonts.googleapis.com/css?family=Cormorant+Garamond:600');
            @import url('https://fonts.googleapis.com/css?family=Dosis:800');
            @import url('https://fonts.googleapis.com/css?family=Dosis:200');
            @import url('https://fonts.googleapis.com/css?family=Amaranth');

        </style>
        <script>  
            function back(){
                window.location.replace("<?php echo base_url(); ?>index.php/Menu");
            }
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="member_menu" id="white">
                <div class="member_menu_header" id="yellow_header">
                    <div class="left_filler" id="header_left_position">
                        <div class="left_5_percent">
                            <a class="clickable back" href="<?php echo base_url(); ?>index.php/Menu">
                                <span class="icons-back"></span>
                            </a>
                        </div>
                    </div>
                    <div class="center_filler">
                        <div class="center_box" >
                             <a href="#">SELFFEED</a>
                        </div>
                    </div>
                    <div class="right_filler"></div>
                </div>
                <div class="profile_content" id="order_header">
                    <h2>Orders</h2>
                </div> 
                <div class="orders_content">
                    <?php if(!$order){ ?>
                    <p>No orders have been placed.</p>
                    <?php } else { ?>
                    <table class="table order">
                        <tr>
                            <td> No </td>
                            <td> Product Name </td>
                            <td> Quantity </td>
                            <td> Price </td>
                            <td> Subtotal </td>
                            <td> Transaction Date </td>
                            <td> Expected Delivery </td>
                            <td> Status </td>
                        </tr> 
                        <?php foreach($my_order as $transaction){ ?>
                        <tr>
                            <td> <?php echo $no++ ;?></td>
                            <td> <?php echo $transaction->product_name; ?></td>
                            <td> <?php echo $transaction->quantity; ?></td>
                            <td> <?php echo $transaction->price; ?></td>
                            <td> <?php echo number_format(($transaction->quantity * $transaction->price),2); ?> </td>
                            <td> <?php echo date("jS F Y", strtotime($transaction->transaction_date));  ?></td>
                            <td> <?php echo date("jS F Y", strtotime($transaction->delivery_request)); ?></td> 
                                 <?php if($transaction->transaction_status == 1) { ?>
                                    <td>Failed</td>
                                 <?php } else if($transaction->transaction_status == 2){ ?>
                                    <td>Success</td>
                                 <?php } else if($transaction->transaction_status == 3) { ?>
                                    <td>Processing</td>
                                 <?php } else if($transaction->transaction_status == 4) { ?>
                                    <td>Pending</td>
                                 <?php } else if($transaction->transaction_status == 5) { ?>
                                    <td>Unprocessed</td>
                                 <?php } else if($transaction->transaction_status == 6) { ?>
                                    <td>Canceled</td>
                                 <?php } ?>
                        </tr>
                        <?php } ?>
                    </table>
                    <?php } ?>
                </div>
                <footer class="position-relative" id="footer">
                    <div class="content-width">
                        <div class="links">
                            <span class="trademark">&copy; 2016 Selffeed </span>
                        </div>
                        <div class="social_media_icons">
                            <a href="https://www.facebook.com/SelfFeed/?fref=ts" class="facebook_icon"></a>
                
                        </div>
                    </div>
                </footer>
            
        </div>
    </body>
 </html>