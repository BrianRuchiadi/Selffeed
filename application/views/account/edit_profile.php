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
            
            $('.locked_box').hover(function(){
                $('.locked_box').css('cursor','pointer');
            });
            $('.locked_box').click(function(){
                $('.account_verification_wrapper').show();
                $('.wrapper').css('opacity', 0.4);
            });
            
        });
       
            
        
        
        function close_verification(){
            $('.account_verification_wrapper').hide();
            $('.wrapper').css('opacity', 1);
        }
        
        function credential_check(){
        
            if($('#user_password').val() == ''){
                $('.verify_errors').html('Password is required');
                $('#user_password').css('border', '1px solid red');
            }
            else{
                var email = $('#user_email').val();
                var password = $('#user_password').val();
                $('.verify_errors').html('');   
                $('#user_password').css('border','1px solid #C6C6C6');
                $.ajax({
                        type : "POST",
                        url : "<?php echo base_url(); ?>index.php/Account/login",
                        data : {email : email, password : password},
                        success : function(result){
                                         var result = JSON.parse(result);
                                           
                                         if(result["result"]["status"] == false){
                                             $('.verify_errors').html('Invalid password');
                                             $('#user_password').css('border', '1px solid red');
                                         }
                                         else{
                                             close_verification();
                                             $('.locked').css('background-image', 'url(../Image/unlocked.png)');
                                             $('#locked_email').removeAttr("disabled");
                                             $('#locked_phone').removeAttr("disabled");
                                             $('#locked_password').removeAttr("disabled");
                                             $('#locked_password').val(password);
                                             $('.locked_box').unbind("click");
                                             $('.change_text').html('Done');
                                         }
                                         
                                        
                                    
                        }
                });
            }
        }
        
        
        </script>
    </head>
    <body>
    <?php foreach($user as $user){ ?>
        <div class="account_verification_wrapper">
            <h4 class="account_verification_header">
                <span> Account Verification </span>
                <span class="close" onclick="close_verification()"></span>      
            </h4>
            <div class="account_verification_content">
               
                    <div class="verify_errors"></div>
                    <div>
                        <input type="hidden" id="user_email" name="email" value="<?php echo $user->email; ?>">
                        <input type="password" id="user_password" name="password" placeholder="Password">
                    </div>
                    <div class="buttons_margin_50">
                        <button class="button" id="black_button" onclick="credential_check()">Verify</button>
                    </div>
            </div>
            
        </div>
        
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
                <div class="profile_content">
                    <h2>Profile</h2>
                    <form class="profile_form" method="POST">

                        <div class="profile_errors"></div>
                        <div class="line">
                            <div class="col2">
                                <input name="firstName" type="text" placeholder="First Name" value="<?php echo $user->first_name; ?>">                           
                            </div>
                            <div class="col2" id="align_right">
                                <input name="lastName" type="text" placeholder="Last Name" value="<?php echo $user->last_name; ?>">                           
                            </div>
                        </div>
                        <div class="locked_box">
                            <input name="email" required type="email" id="locked_email" placeholder="Email Address" disabled="disabled" value="<?php echo $user->email; ?>">
                            <span class="locked">
     
                        </div>
                        <div class="locked_box">
                            <input name="phone" required type="number" id="locked_phone" placeholder="Phone Number" disabled="disabled" value="<?php echo $user->contact_no; ?>">
                            <span class="locked">
                        </div>
                        <div class="locked_box">
                            <input name="password" required type="password" id="locked_password" placeholder="Password" disabled="disabled" >
                            <span class="locked">
                        </div>
                        <div class="buttons">
                            <button class="button" id="black_button" type="submit">Save Profile</button>
                            <a class="change_text" href="<?php echo base_url(); ?>index.php/Menu">Cancel</a>
                        </div>
                     <?php } ?> 
                    </form>
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
        </div>
    </body>
</html>
