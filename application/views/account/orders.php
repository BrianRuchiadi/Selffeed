<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> SelfFeed </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/index.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/profile.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
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
                window.history.back();
            }
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="member_menu" id="white">
                <div class="member_menu_header" id="yellow_header">
                    <div class="left_filler" id="header_left_position">
                        <div class="left_5_percent">
                            <a class="clickable back" onclick="back()">
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
                    <table class="table order" style="overflow-x: scroll;">
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
                <footer>
                    <div style="vertical-align: middle;">
                        <nav class="navbar" style="margin:auto;">
                              <div class="container-fluid" align="center">
                                    <ul class="nav navbar-nav">
                                        <li class="active" style="margin: auto;"><a href="#"><div class="linkFooter">Selffeed for Android</div></a></li>
                                        <li><a class="footer" href="#"><div class="linkFooter">Selffeed for IOs</div></a></li>
                                        <li><a class="footer"href="<?php echo base_url(); ?>index.php/Informations/business"><div class="linkFooter">Business</div></a></li>
                                        <li><a class="footer"href="<?php echo base_url(); ?>index.php/Informations/questionAndAnswer"><div class="linkFooter">QA</div></a></li>
                                        <li><a class="footer"href="<?php echo base_url(); ?>index.php/Help"><div class="linkFooter">Contact Us</div></a></li>
                                        <li><a class="footer"href="<?php echo base_url(); ?>index.php/Informations/career"><div class="linkFooter">Career</div></a></li>
                                        <li><a class="footer"href="#"><div class="linkFooter">Term of Use</div></a></li>
                                        <li><a class="footer"href="#"><div class="linkFooter">Privacy Policy</div></a></li>
                                        <li><a class="footer" href="#" class="text-muted"><div class="linkFooter" style="border:none;">&copy; 2016 Selffeed</div></a></li>
                                        <!--
                                        <li><a class="footer"ref="#" ><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a class="footer" href="#" ><i class="fa fa-twitter" aria-hidden="true"></i></i></a></li>
                                        <li><a class="footer" href="#" ><i class="fa fa-youtube" aria-hidden="true"></i></i></a></li> -->        
                                    </ul>
                              </div>
                        </nav>  
                    </div>
                </footer>
            
        </div>
    </body>
 </html>