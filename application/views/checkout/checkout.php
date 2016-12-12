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
       
            $(document).ready(function(){
              
                $('.account_verification_wrapper').hide();
                $('.date_input').hide();
                $('.address_selection').hide();
                
                $('#new_quantity').keyup(function(){
                    var value = $('#new_quantity').val();
                    var rowid = $('#cart_rowid').val();
                    edit_cart(rowid, value);
                });
                
            });
            
            function changeToMainAddress(){   
                var location = $('#main_location').val();
                $('#address_indicator').html(location);
                close_address();
            }
            
            function changeToHomeAddress(){
                var location = $('#home_location').val();
                $('#address_indicator').html(location);
                close_address();
            }
            
            function changeToWorkAddress(){
                var location = $('#work_location').val();
                $('#address_indicator').html(location);
                close_address();
            }
            function back(){
                window.history.back();
            }
            function decrease_quantity(){
                var currentValue = $('#new_quantity').val();
                var rowid = $('#cart_rowid').val();
                
                if(currentValue > 0){
                    currentValue = +currentValue - +1;
                    $('#new_quantity').val(currentValue); 
                }else{
                    $('#new_quantity').val(0);
                }
                
                edit_cart(rowid, currentValue);
            }
            
            function increase_quantity(){
                var currentValue = $('#new_quantity').val();
                console.log(currentValue);
                var rowid = $('#cart_rowid').val();
                
                currentValue = +currentValue + +1;
                $('#new_quantity').val(currentValue); 
                edit_cart(rowid, currentValue);
            }
            
            function checkout(){
                var deliveryLocation = $('#address_indicator').text();
                var currentDate = $('#delivery_date').val();
                $.ajax({
                    type : "POST",
                    url : "<?php echo base_url(); ?>index.php/cart/checkout",
                    data : { deliveryDate : currentDate, deliveryLocation : deliveryLocation},
                    success : function(result){
                                    var result = JSON.parse(result);                         
                                }
                });
                
                window.location.replace("<?php echo base_url(); ?>index.php/Menu");
                
            }
            function remove_item(){
                var rowid = $('#cart_rowid').val();
                $('#cart_content_' + rowid).remove();
                edit_cart(rowid,0);
                close_cart();
            }
            function edit_cart(rowid, currentValue){

                $.ajax({
                        type : "POST",
                        url : "<?php echo base_url(); ?>index.php/cart/edit",
                        data : {rowid : rowid, quantity : currentValue},
                        success : function(result){
                                         var result = JSON.parse(result);

                                         if(result.quantity > 0){
                                            $('#quantity_' + result.rowid).html(result.quantity);
                                            $('#price_' + result.rowid).html('RM ' + Number(result.total).toFixed(2));
                                            $('#current_subtotal').html('RM ' + Number(result.subtotal).toFixed(2));
                                            $('#current_tax').html('RM ' + Number((result.subtotal * 0.06)).toFixed(2));
                                            $('#final_amount').html('RM ' + Number((result.subtotal * 0.06) + result.subtotal).toFixed(2));
                                         }else{
                                            $('#quantity_' + result.rowid).html(0);
                                            $('#price_' + result.rowid).html('RM ' + 0);
                                            $('#current_subtotal').html('RM ' + Number(result.subtotal).toFixed(2));
                                            $('#current_tax').html('RM ' + Number((result.subtotal * 0.06)).toFixed(2));
                                            $('#final_amount').html('RM ' + Number((result.subtotal * 0.06) + result.subtotal).toFixed(2));
                                         }
                                }  
                });
            }
            
            function get_cart(rowid){
                $('.account_verification_wrapper').show();
                $('.wrapper').css('opacity', 0.4);
                var rowid = rowid;
                $.ajax({
                        type : "POST",
                        url : "<?php echo base_url(); ?>index.php/cart/get",
                        data : {rowid : rowid},
                        success : function(result){
                                         var result = JSON.parse(result);
                                         $('#cart_rowid').val(result.rowid);
                                         $('#cart_content_name').html(result.name);
                                         $('#cart_content_price').html('RM' + Number(result.price).toFixed(2));
                                         $('#new_quantity').val(result.quantity);        
                        }
                });
                
            }
            function change_address(){
                $('.address_selection').show();
                $('.wrapper').css('opacity', '0.6');
            }
            
            function close_cart(){
                $('.account_verification_wrapper').hide();
                $('.wrapper').css('opacity', 1);
                var cart_id = $('#cart_rowid').val();
                
                if($('#new_quantity').val() <= 0){
                    $('#cart_content_' + cart_id).remove();
                }else{
                    edit_cart(cart_id, $('#new_quantity').val());
                }
            }
            
            function date_input(){
                $('.date_input').show();          
            }
            
            function close_date(){
                
                var date = $('#delivery_date').val();
                
                if(date != ''){
                    
                    $.ajax({
                        type : "POST",
                        url : "<?php echo base_url(); ?>index.php/Date/get",
                        data : {date : date},
                        success : function(result){
                                         var result = JSON.parse(result);
                                         $('#adjusting').html(result.date);
                                         $('#delivery_date').val(result.html_date);            
                        }
                    });
                    
                }
                 $('.date_input').hide();
            }
            
            function close_address(){
                $('.address_selection').hide();
                $('.wrapper').css('opacity', '1');
            }
        </script>
    </head>
    <body>
        <?php $date = new DateTime(date('Y-m-d'));
              $date->modify('+ 1 day'); 
        ?>
        <div class="address_selection">
            <h4 class="account_verification_header">
                <span> Select Address </span>
                <span class="close" onclick="close_address()"></span>
            </h4>
            <div class="account_verification_content">
                <div class="address_list" id="mainAddress" onclick="changeToMainAddress()">Main Address</div>
                <?php if($homeAddress == true){ ?>
                <div class="address_list" id="homeAddress" onclick="changeToHomeAddress()">Home Address</div>
                <?php } else { ?>
                <div class="address_list_none"><a href="<?php echo base_url(); ?>index.php/Account/delivery">Please add home address</a></div>
                <?php } ?>
                
                <?php if($workAddress == true){ ?>
                <div class="address_list" id="workAddress" onclick="changeToWorkAddress()">Work Address</div>
                <?php } else {?>
                <div class="address_list_none"><a href="<?php echo base_url(); ?>index.php/Account/delivery">Please add work address</a></div>
                <?php } ?>
            </div>
        </div>
        
        <div class="date_input">
            <h4 class="account_verification_header">
                <span> Select date </span>
                <span class="close" onclick="close_date()"></span>
            </h4>
            <div class="account_verification_content">
                <input id="delivery_date" type="date" min="<?php echo $date->format('Y-m-d');?>" value="<?php echo $date->format('Y-m-d');?>">
                <div class="done_button" onclick="close_date()">Done</div>

            </div>
        </div>
        
        <div class="account_verification_wrapper">
            <h4 class="account_verification_header">
                <span> change quantity </span>
                <span class="close" onclick="close_cart()"></span>      
            </h4>
            <div class="account_verification_content">
                <div class="content_name" id="cart_content_name">
                   
                </div>
                <div class="content_price" id="cart_content_price">
                    
                </div>
                <input type="hidden" id="cart_rowid">
                <div class="quantity_modifier">
                    <div class="quantity_modifier_left" onclick="decrease_quantity()"></div>
                    <div class="quantity_modifier_center">
                        <input type="text" id="new_quantity">
                    </div>
                    <div class="quantity_modifier_right" onclick="increase_quantity()"></div>
                </div>
                <div class="done_button" onclick="close_cart()">Done</div>
                <div class="remove_button" onclick="remove_item()">Remove From Cart</div>
                   
            </div>
            
        </div>
        
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
                <div class="delivery_address_wrapper">
                    <div class="delivery_address">
                        <h2>DELIVERY ADDRESS</h2>
                        <p onclick="change_address()" id="address_indicator"><?php echo $user[0]->address; ?></p> 
                        <br>
                        <div class="shade">
                            <h4> Delivery For </h4>
                            <p id="adjusting"><?php echo $date->format('jS  F  Y'); ?></p>
                            <p id="adjusting_2" onclick="date_input()">Change</p>
                        </div>
                    </div>
                </div>
                <div class="yellow_line"></div>
                <div class="cart_content_wrapper">
                  <ul>
                    <?php foreach($cart_content as $content){ ?>
                    <li id="cart_content_<?php echo $content['rowid']; ?>"> 
                        <div class="quantity_wrapper"  id="<?php echo $content['rowid']; ?>" onclick="get_cart(this.id)">
                            <div class="quantity_box" id="quantity_<?php echo $content['rowid']; ?>"><?php echo $content['qty']; ?></div>
                        </div>
                        <div class="item_name"><?php echo $content['name']; ?></div>
                        <div class="item_price" id="price_<?php echo $content['rowid']; ?>"><span>RM</span> <?php echo number_format(($content['qty'] * $content['price']), 2); ?> </div>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
                <div class="cart_checkout_detail">
                    <div class="cart_content_wrapper">
                        <ul>
                            <li>
                                <div class="bill_detail">Subtotal</div>
                                <div class="amount" id="current_subtotal">RM <?php echo number_format($total, 2); ?></div>
                            </li>
                            <li>
                                <div class="bill_detail"> GST 6% </div>
                                <div class="amount" id="current_tax">RM <?php echo number_format(($total * 0.06),2); ?></div>
                            </li>
                            <li>
                                <div class="bill_detail" id="final"> Grand Total</div>
                                <div class="amount" id="final_amount">RM <?php echo number_format(round($grand_total,1),2); ?></div>
                            </li>
                        </ul>
                    </div>
                    <div class="checkout">
                        <a class="width_auto" id="font_modified" onclick="checkout()">Place Order</a>
                    </div>
                </div>
            </div>
        </div>
        <?php if($homeAddress == true){ ?>
            <input type="hidden" id="home_location" value="<?php echo $homeData->address; ?>">
        <?php } ?>
        <?php if($workAddress == true){ ?>
            <input type="hidden" id="work_location" value="<?php echo $workData->address; ?>">
        <?php } ?>
            <input type="hidden" id="main_location" value="<?php echo $user[0]->address; ?>">
    </body>
</html>
        