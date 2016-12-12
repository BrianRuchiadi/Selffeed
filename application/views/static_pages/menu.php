<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> SelfFeed </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/index.css">

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
        var cart = 0;
        
        $(document).ready(function(){
            $('.member_menu_cart_button').hide();
            $('.member_menu').hide();
            displayCart();
            $(window).bind("mousewheel",function(){
           
                if($(document).scrollTop() > 0){
                    $('#header').css("background-color", "white");
                    $('.center a').css("color", "#1A1A1A");
                    $('.right a').css("color", "#1A1A1A");
                    $('.right a').css("border-color", "#1A1A1A");
                    $('#header').css("opacity", "1");
                    $('#header').css("box-shadow", "1px 1px 5px #7F7F7F");
                }
                else{
                    $('#header').css("opacity", 1);
                    $('.center a').css("color", "white");
                    $('.right a').css("color", "white");
                    $('.right a').css("border-color", "white");
                    $('#header').css("background-color", "transparent");
                    $('#header').css("box-shadow", "none");
                }
            });
        });
        
        function expand(){
            $('.member_menu').show();
            $('.wrapper').hide();
        }
        
        function close_menu(){
            $('.member_menu').hide();
            $('.wrapper').show();
        }
        
        function edit_address(){
            window.location.replace('<?php echo base_url(); ?>index.php/Account/delivery');
        }
      
        function displayCart(){
            var input = '';
            $.ajax({
                    type : "POST",
                    url : "<?php echo base_url(); ?>index.php/Cart/totalQuantity",
                    data : {input : input},
                    success : function(result){
                                var result = JSON.parse(result);
                                if(result.quantity > 0){
                                     $('#cart_quantity').html('' + result.quantity );
                                     $('.member_menu_cart_button').show();
                                }
                    }
            });
        }
        
        function addToCart(product_id, product_price){
            cart += 1;
            $('#add_to_' + product_id).html("I'll preorder another . MYR " + product_price);
            $('#add_to_' + product_id).css('padding-left', '10px');
            $('#add_to_' + product_id).css('padding-right', '10px');
            var product_id = product_id;
            $.ajax({
                    type : "POST",
                    url : "<?php echo base_url(); ?>index.php/Cart/add",
                    data : {product_id : product_id},
                    success : function(result){
                                          var result = JSON.parse(result);
                                         
                                          if(cart > 0){
                                            $('#cart_quantity').html('' + result.total_quantity );
                                            $('.member_menu_cart_button').show();
                                          }
                        }
            });     
        }
        
        function sign_in(){
                window.location.replace('<?php echo base_url(); ?>index.php/Home/index/login');
        }
        
        function register(){
                window.location.replace('<?php echo base_url(); ?>index.php/Home/index/register');
        }
        </script>
    </head>
    <body>
        <?php if($credit){ ?>
        <div class="member_menu">
            <div class="member_menu_header">
                <div class="left_filler">
                    <div class="member_menu_close_button" onclick="close_menu()"></div>
                </div>
                <div class="center_filler">
                    <div class="center_box">
                         <a href="#">SELFFEED</a>
                    </div>
                </div>
                <div class="right_filler">
                </div>
            </div>
            <div class="member_menu_body">
                <div style="margin-top : 5px">
                    <div class="list_box">
                        <div class="centered_text"><a href="<?php echo base_url(); ?>index.php/Menu"> Lunch Tomorrow </a><hr></div>
                    </div>
                    <div class="list_box">
                        <div class="centered_text"><a href="<?php echo base_url(); ?>index.php/Account"> Profile </a><hr></div>
                    </div>
                    <div class="list_box">
                        <div class="centered_text"><a href="<?php echo base_url(); ?>index.php/Account/payment"> Payment </a><hr></div>
                    </div>
                    <div class="list_box">
                        <div class="centered_text"><a href="<?php echo base_url(); ?>index.php/Account/delivery"> Address </a><hr></div>
                    </div>
                    <div class="list_box">
                        <div class="centered_text"><a href="<?php echo base_url(); ?>index.php/Account/orders"> Orders </a><hr></div>
                    </div>
                    <div class="list_box">
                        <div class="centered_text"><a href="<?php echo base_url(); ?>index.php/Help"> Get Help </a><hr></div>
                    </div>
                </div>
                <div class="list_box_sign_out">
                    <a class="width_auto" id="sign_out_button" href="<?php echo base_url(); ?>index.php/Account/logout">Sign Out</a>
                </div>
                    
            </div>
        </div>
        <?php } ?>
      
        <div class="wrapper">  
            <div class="menu_contents">
                <div id="header">
                    <div class="content-width">
                        <div class="header-line">
                            <div class="left">
                                <?php if($credit){ ?>
                                <div class="expand_button" onclick="expand();"></div>
                                <?php } ?>
                            </div>
                            <div class="center">
                                <a href="/">SELFFEED</a>
                            </div>
                            <div class="right">
                                <?php if(!$credit){ ?>
                                <a onclick="sign_in();">Sign In</a>
                                <?php } else { ?>
                                <a href="<?php echo base_url(); ?>index.php/Checkout">
                                    <div class="member_menu_cart_button">
                                        <div class="number_display" id="cart_quantity"></div>
                                    </div>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main_image_wrapper">
                    <div class="centered_text">
                        <h1>
                            <hr>
                            <div class="text_wrapper headerMenu">
                                <?php if($store_status->status == 1){ ?>
                                <div class="title-1">Kitchen's Open</div>
                                <?php } else { ?>
                                <span class="title-1">Kitchen's Close</span>
                                <?php } ?>
                            </div>
                            <hr>                        
                        </h1>
                    </div>
                    <div class="bottom_ribbon_text_wrapper" id="color_selected">
                        <a onclick="register()" class="text_link">
                            <?php if(!$credit) { ?>
                            <span>Showing sample menu for today.</span>
                            <span>Sign up </span>
                        </a>
                            <?php } else { ?>
                                <a class="text_link">
                               <?php  foreach($user_details as $details) {?>
                                    <span id="user_address" onclick="edit_address();"><?php echo $details->address; ?></span></a>
                            <?php }} ?>
                            
                        
                    </div>
                </div>
                
                <div class="product_section_wrapper">
                    <h4>
                        <div class="title2">
                            <hr>
                            <span> On Today's Lunch Menu </span>
                            <hr>
                        </div>
                    </h4>
                </div>
                
                <ul class="menu-items">
                    <?php foreach($products as $product){ ?>
                    <li class="menu-item">
                        <a name="test-1">
                            
                        </a>
                        <div class="menu-item-container">
                            <a class="image-box" href="<?php echo base_url(); ?>index.php/Menu/details/<?php echo $product->product_id; ?>">
                                <div class="image" style="background-image : url(.<?php echo $product->product_image; ?>);"> 
                                    
                                </div> 
                            </a>
                            <div class="details">
                                <h3>
                                    <div class="balanced-text">
                                        <span><?php echo $product->product_name; ?></span>
                                    </div>
                                </h3>
                                <h5>
                                    <div class="balanced-text">
                                        <span><?php echo $product->product_brief_description; ?></span>
                                    </div>
                                    <hr>
                                </h5>
                                <div class="actions">
                                    <div class="line">
                                        <div class="col2 btn">
                                            <a class="button secondary title-3" href="<?php echo base_url(); ?>index.php/Menu/details/<?php echo $product->product_id; ?>">Details</a>
                                        </div>
                                        <div class="col2 last btn">
                                            <?php if(!$credit){ ?>
                                            <a class="button primary" onclick="register()">Sign Up to Order</a>
                                            <?php } else { ?>
                                            <!-- if logged in  (need to check if product is in the cart and if cart exist)-->
                                            
                                            <?php if($cart_full){ 
                                                $exist = false;
                                                foreach($this->cart->contents() as $cart){
                                                    if($cart['id'] == $product->product_id){
                                                        $exist = true;
                                                    }
                                                }  ?>
                                            <?php if($exist){ ?>
                                            <a class="button primary title-4"  onclick="addToCart(<?php echo $product->product_id; ?>, <?php echo $product->product_price; ?>);" style="padding-left : 10px; padding-right : 10px;">I'll preorder another . MYR <?php echo $product->product_price; ?> </a>
                                            <!-- tambahkan button + gitu ketika if exist ini -->
                                            <?php }else { ?>
                                            <a class="button primary title-4" id="add_to_<?php echo $product->product_id; ?>" onclick="addToCart(<?php echo $product->product_id; ?>, <?php echo $product->product_price; ?>);">I'll preorder this . MYR <?php echo $product->product_price; ?> </a>
                                            <?php } ?>
                                            <?php } else { ?>
                                            <a class="button primary title-4" id="add_to_<?php echo $product->product_id; ?>" onclick="addToCart(<?php echo $product->product_id; ?>, <?php echo $product->product_price; ?>);">I'll preorder this . MYR <?php echo $product->product_price; ?> </a>
                                            <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                
                </ul>

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
            
        </div>
    </body>
</html>
