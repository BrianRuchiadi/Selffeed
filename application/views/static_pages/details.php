<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> SelfFeed </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/index.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/profile.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/style.css">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Open+Sans:800');
            @import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300');
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
            
        var cart = 0;
        
        $(document).ready(function(){
            if($("body").scrollTop() > 0){
                $('#header').css("background-color", "white");
                $('#title').css("color", "#1A1A1A");
                $('.right a').css("color", "#1A1A1A");
                $('.right a').css("border-color", "#1A1A1A");
                $('#header').css("opacity", "1");
                $('#header').css("box-shadow", "1px 1px 5px #7F7F7F");
                
            }else{
                $('#header').css("opacity", 1);
                $('#title').css("color", "white");
                $('.right a').css("color", "white");
                $('.right a').css("border-color", "white");
                $('#header').css("background-color", "transparent");
                $('#header').css("box-shadow", "none");
            }
            $('.addons_menu_wrapper').hide();
            $('.member_menu_cart_button').hide();
           
            displayCart();
            
            var headerType = $('#no_move').size();
            var scrollTimeout = 10;
            var lastPosition = 0;
            var currentPosition = 0;
            var scrollDirection = 'down';
            
            if(headerType == 0){
                $(window).scroll(function(){
                    currentPosition = $("body").scrollTop();
                    if(currentPosition > lastPosition){
                        scrollDirection = 'down';
                    }else{
                        scrollDirection = 'up';
                    }
                
                    if(scrollTimeout){
                        window.clearTimeout(scrollTimeout);
                    }
                    scrollTimeout = window.setTimeout(moveable_part, 10);
               
                    lastPosition = currentPosition;
                });
            }
            function moveable_part(){
                
                if($("body").scrollTop() <= ($(".button.width_auto").offset().top - 6) && $("body").scrollTop() >= ($(".button.width_auto").offset().top - 75))
                {   
                          
                    if(scrollDirection == 'down'){
                        var base = $(".button.width_auto").offset().top - $("body").scrollTop() ;
                        var position = base - 80;
                        $('#flexible_header').css("top", position);
                    }else{
                        var base = $(".button.width_auto").offset().top - 70 - $("body").scrollTop() ;
                        var position = base;
                        $('#flexible_header').css("top", position);
                    }  
                    
                }else if($("body").scrollTop() < $(".button.width_auto").offset().top){
                        $('#flexible_header').css("top", 0);    
                }else if($("body").scrollTop() > $(".button.width_auto").offset().top){
                        $('#flexible_header').css("top", "-74px"); 
                }
            }   
            
            $(window).bind("mousewheel",function(){
               
                               
                if($(document).scrollTop() > 0){
                    $('#header').css("background-color", "white");
                    $('#title').css("color", "#1A1A1A");
                    $('.right a').css("color", "#1A1A1A");
                    $('.right a').css("border-color", "#1A1A1A");
                    $('#header').css("opacity", "1");
                    $('#header').css("box-shadow", "1px 1px 5px #7F7F7F");
                    $('.clickable.back').css("border", "1px solid #7F7F7F");
                }
                else{
                    $('#header').css("opacity", 1);
                    $('#title').css("color", "white");
                    $('.right a').css("color", "white");
                    $('.right a').css("border-color", "white");
                    $('#header').css("background-color", "transparent");
                    $('#header').css("box-shadow", "none");
                    $('.clickable.back').css("border", "none");
                }

            });
        });
        
        function normal(){
            $('.addons_menu_wrapper').hide();
            $('.overlay').css('display', 'none');
        }
        function displayAddOn(){
            $('.overlay').css('display', 'block');
            $('.addons_menu_wrapper').show();
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
            
            $('#add_to_' + product_id + '_' + product_id).html("I'll preorder another . MYR " + product_price);
            $('#add_to_' + product_id + '_' + product_id).css('max-width', '255px');
            $('#add_to_' + product_id + '_' + product_id).css('right', '-5px');
            $('#add_to_' + product_id + '_' + product_id).css('display', 'inline-block');
            
            $('#add_on_item_' + product_id).css('display', 'inline-block');
            $('#add_on_item_' + product_id).css('height', '46px');
            $('#add_on_item_' + product_id).css('width', '10px');
            $('#add_on_item_' + product_id).css('margin-bottom', '0');
            $('#add_on_item_' + product_id).css('padding', '0.7em 1em');
            
            $('#add_on_item2_' + product_id).css('display', 'inline-block');
            $('#add_on_item2_' + product_id).css('height', '46px');
           
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
        
        function displayAddOn(){
            $('.overlay').css('display', 'block');
            $('.addons_menu_wrapper').show();
            $('#flexible_header').css("top", "0");
        }
        
        function sign_in(){
                window.location.replace('<?php echo base_url(); ?>index.php/Home/index/login');
        }
        
        function register(){
                window.location.replace('<?php echo base_url(); ?>index.php/Home/index/register');
        };
        
      
        </script>
    </head>
    <body>
        <div class="overlay" onclick="normal()"></div>
        <div class="addons_menu_wrapper">
            <div class="addons_header"><h1>Add Ons</h1></div>
            <div class="addons_content">
                <ul>
                    <?php foreach($add_ons as $add){ ?>
                    <li class="addons_box">
                        <div class="addons_image_box_wrapper">
                            <div class="addons_image" style="background-image : url(../../..//<?php echo $add->product_image; ?>)"></div>
                        </div>
                        
                        <div class="addons_description_wrapper">
                            
                            <div class="addons_name">
                                <?php echo $add->product_name; ?>
                            </div>
                            
                            <div class="addons_price">
                                <?php echo number_format($add->product_price,2); ?> MYR
                            </div>
                            
                            <div class="addons_button_wrapper">
                                <div class="addons_button" onclick="addToCart(<?php echo $add->product_id; ?>, <?php echo $add->product_price; ?>)">Add </div>
                            </div>
                        </div>
                        
                    </li>
                    <?php } ?>
                
                </ul>
            </div>
        </div>

        <div class="wrapper"> 
   
            <div class="menu_details_contents">
                <div class="page">
                    <div id="menu-item" class="fullscreen">
                        <!-- start of header -->
                        <div id="header" >
                            <div class="content-width">
                                <div class="header-line">
                                    <div class="left">
                                        <a class="clickable back" onclick="back()">
                                            <span class="icons-back"></span>
                                        </a>
                                    </div>
                                    <div class="center">
                                        <div style="position: absolute; left: -11px;top: 0;width: 100%;margin: 0 auto;text-align: center;" id="flexible_header">
                                        <a href="#" style="display:block;" id="title">SELFFEED</a>
                                        <?php if(!$credit){ ?>
                                        <a class="fixed_button_header" style="display : block;" onclick="register();" id="no_move">
                                            Sign up to Order
                                        </a>
                                        <?php } else { ?>
                                                <?php if($cart_full){ 
                                                    $exist = false;
                                                    foreach($this->cart->contents() as $cart){
                                              
                                                        if($cart['id'] == $product[0]->product_id){
                                                            $exist = true;
                                                        }
                                                    }  ?>
                                        <?php if($exist){ ?>
                                                <a class="fixed_button_header" style="max-width : 255px; font-family : 'Open Sans Condensed', sans-serif; letter-spacing : 0.15em; right: -5px; display : inline-block; color : white;"   onclick="addToCart(<?php echo $product[0]->product_id; ?>, <?php echo $product[0]->product_price; ?>);" >I'll preorder another . MYR <?php echo $product[0]->product_price; ?> </a>
                                                <a class="button primary title-4" style="height:46px; width : 10px; margin-bottom : 0; padding : 0.7em 1em; " id="add_on_item_<?php echo $product[0]->product_id; ?>" onclick="displayAddOn()"></a>
                                                <?php }else { ?>
                                                <a class="fixed_button_header" style="font-family : 'Open Sans Condensed', sans-serif; letter-spacing : 0.15em; color : white;" id="add_to_<?php echo $product[0]->product_id; ?>_<?php echo $product[0]->product_id; ?>" onclick="addToCart(<?php echo $product[0]->product_id; ?>, <?php echo $product[0]->product_price; ?>);">I'll preorder this . MYR <?php echo $product[0]->product_price; ?> </a>
                                                <a class="button primary title-4" style="display : none;" id="add_on_item_<?php echo $product[0]->product_id; ?>" onclick="displayAddOn()"></a>
                                                <?php } ?>
                                                <?php } else { ?>

                                                <a class="fixed_button_header" style="font-family : 'Open Sans Condensed', sans-serif; letter-spacing : 0.15em; color : white;" id="add_to_<?php echo $product[0]->product_id; ?>_<?php echo $product[0]->product_id; ?>" onclick="addToCart(<?php echo $product[0]->product_id; ?>, <?php echo $product[0]->product_price; ?>);">I'll preorder this . MYR <?php echo $product[0]->product_price; ?> </a>
                                                <a class="button primary title-4" style="display : none;" id="add_on_item_<?php echo $product[0]->product_id; ?>" onclick="displayAddOn()"></a>
                                            <?php } ?>
                                    <?php } ?>
                                        </div>
                                    </div>
                                    <div class="right">
                                         <?php if(!$credit){ ?>
                                         <a href="#" onclick="sign_in()">Sign In</a>
                                         <?php } else { ?>
                                          <a href="<?php echo base_url(); ?>index.php/Checkout" style="border:none;">
                                              <div class="member_menu_cart_button">
                                                <div class="number_display" id="cart_quantity"></div>
                                              </div>
                                          </a>
                                         <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of header -->
                        <div class="background-image-holder">
                        </div>
                        
        
                        <div class="background-image-wrapper img-responsive" style="background-image :url(../../.<?php echo $picture; ?>);">
                            <div class="section_description">
                                <div class="section_head">
                                    <h2>
                                        <div class="balanced-text">
                                            <span class="line-height-checker">A</span>
                                            <span> <?php echo $product->product_name; ?> </span>
                                        </div>
                                    </h2>
                                    <h4>
                                        <span><hr></span>
                                        <span>
                                            <div class="balanced-text">
                                                <span class="line-height-checker">A</span>
                                                <span> <?php echo $product->product_brief_description; ?> </span>
                                            </div>
                                        </span>
                                        <span>
                                            <hr>
                                        </span>
                                    </h4>
                                </div>
                                <div class="section_buttons btn">
                                    <?php if(!$credit){ ?>
                                    <div class="btn">                                            
                                        <a class="button primary" onclick="register()">Sign up to Order</a>
                                        <?php } else { ?>
                                        <a class="button primary">I'll Preorder this . RM <?php echo $product[0]->product_price; ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="details-content-area position-relative">
                            <div class="details-product-description">
                                <div class="section_head">
                                    <h2>
                                        <div class="balanced-text">
                                            <span>
                                                <span>
                                                    <?php echo $product[0]->product_name; ?>
                                                </span>
                                            </span>
                                        </div>
                                    </h2>
                                    <h4>
                                        <span>
                                            <hr id="white">
                                        </span> 
                                        <span>
                                            <div class="balanced-text">
                                                <span> <?php echo $product[0]->product_brief_description; ?> </span>
                                            </div>
                                        </span>
                                        <span>
                                            <hr id="white">
                                        </span>
                                    </h4>
                                </div>
                                <div class="section_buttons">
                                    <?php if(!$credit){ ?>
                                    <a class="button width_auto" onclick="register();">
                                        Sign up to Order
                                    </a>
                                    <?php } else { ?>
                                        <?php if($cart_full){ 
                                                $exist = false;
                                                foreach($this->cart->contents() as $cart){
                                              
                                                    if($cart['id'] == $product[0]->product_id){
                                                        $exist = true;
                                                    }
                                                }  ?>
                                    <?php if($exist){ ?>
                                            <a class="button width_auto"  onclick="addToCart(<?php echo $product[0]->product_id; ?>, <?php echo $product[0]->product_price; ?>);" style="padding-left : 10px; padding-right : 10px;">I'll preorder another . MYR <?php echo $product[0]->product_price; ?> </a>
                                            <a class="button primary title-4 ref" style="height:46px;" id="add_on_item2_<?php echo $product[0]->product_id; ?>" onclick="displayAddOn()"></a>
                                            <?php }else { ?>
                                            <a class="button width_auto" id="add_to_<?php echo $product[0]->product_id; ?>" onclick="addToCart(<?php echo $product[0]->product_id; ?>, <?php echo $product[0]->product_price; ?>);">I'll preorder this . MYR <?php echo $product[0]->product_price; ?> </a>
                                            <a class="button primary title-4 ref" style="display : none;" id="add_on_item2_<?php echo $product[0]->product_id; ?>" onclick="displayAddOn()"></a>
                                            <?php } ?>
                                            <?php } else { ?>
                                            <a class="button width_auto" id="add_to_<?php echo $product[0]->product_id; ?>" onclick="addToCart(<?php echo $product[0]->product_id; ?>, <?php echo $product[0]->product_price; ?>);">I'll preorder this . MYR <?php echo $product[0]->product_price; ?> </a>
                                            <a class="button primary title-4 ref" style="display : none;" id="add_on_item2_<?php echo $product[0]->product_id; ?>" onclick="displayAddOn()"></a>
                                             <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="details-product-about">
                                <div class="section_head">
                                    <h4>
                                        <span><hr></span>
                                        <span>About This Meal</span>
                                        <span><hr></span>
                                    </h4>
                                </div>
                                <p>
                                    <?php echo $product[0]->product_description; ?>
                                </p>
                            </div>
                            <div class="details-product-ingredients">
                                <div class="section_head">
                                    <h4>
                                        <span><hr></span>
                                        <span>Ingredients</span>
                                        <span><hr></span>
                                    </h4>
                                </div>
                                <p id="margin-enabled">
                                   <?php foreach($ingredients as $ingredient){ ?>
                                    <?php echo $ingredient->name; ?> , 
                                   <?php } ?>
                                </p>
                                <div class="the-list" id="adjustable-height">
                                    <ul>
                                        <?php foreach($ingredients as $ingredient){ ?>
                                        <li><div class="list_image" style="background-image : url(../../.<?php echo $ingredient->picture; ?>)"></div>
                                            <div class="ingredient_name"><?php echo $ingredient->name; ?></div></li>
                                       
                                        <?php } ?>
                                        
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="details-product-allergens">
                                <p>Food Allergy Notice: Our meals are prepared in a kitchen environment that 
                                    contains nuts, gluten, shellfish, and dairy. We use best practices 
                                    when preparing our meals, however, inadvertent cross-contamination 
                                    may occur. We cannot guarantee the complete absence of allergens.
                                    Consuming raw or undercooked meats, poultry, seafood, shellfish, or
                                    eggs may increase your risk of food-borne illness.</p>
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
