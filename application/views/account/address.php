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
            var cate = 1;
            
            $(document).ready(function(){
               $('.goToAddress').show();
               $('.left_button').hide();
               $('.homeAddress').hide();
               $('.workAddress').hide();
            });
            
            function changeCategory(number){
                cate = cate + number;
                
                if(cate == 1){
                    $('.goToAddress').show();
                    $('.left_button').hide();
                    $('.right_button').show();
                    $('#address_type').html('Main Address');
                    $('.homeAddress').hide();
                }
                if(cate == 2){
                    $('.goToAddress').hide();
                    $('#address_type').html('Home Address');
                    $('.left_button').show();
                    $('.right_button').show();
                    $('.homeAddress').show();
                    $('.workAddress').hide();
                }
                if(cate == 3){
                    $('.homeAddress').hide();
                    $('.right_button').hide();
                    $('#address_type').html('Work Address');
                    $('.workAddress').show();    
                }
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
                <div class="profile_content" id="address_content">
                    <h2>Address</h2>
                
                    <div class="address_option"><span class="left_button" onclick="changeCategory(-1)"></span><span id="address_type">Main Address</span><span class="right_button" onclick="changeCategory(1)"></span></div>
                    
                        <div class="goToAddress">
                          <form method="POST">
                            <table class="address_input">
                            <?php foreach($user as $user){ ?>
                                <tr>
                                    <td> Full Address </td>
                                    <td> <textarea name="user_address"><?php echo $user->address; ?></textarea> </td>
                                </tr> 
                                <tr>
                                    <td> City </td>
                                    <td> <input type="text" name="user_city" value="<?php echo $user->city; ?>"> </td>
                                </tr>
                                <tr>
                                    <td> State</td>
                                    <td> <select name="state">
                                            <option value="johor" <?php if($user->state == 'johor'){ ?> selected <?php } ?>> Johor </option>
                                            <option value="kedah" <?php if($user->state == 'kedah'){ ?> selected <?php } ?>> Kedah </option>
                                            <option value="kelantan" <?php if($user->state == 'kelantan'){ ?> selected <?php } ?>> Kelantan </option>
                                            <option value="malacca" <?php if($user->state == 'malacca'){ ?> selected <?php } ?>> Malacca </option>
                                            <option value="negeri_sembilan" <?php if($user->state == 'negeri_sembilan'){ ?> selected <?php } ?>> Negeri Sembilan </option>
                                            <option value="pahang" <?php if($user->state == 'pahang'){ ?> selected <?php } ?>> Pahang </option>
                                            <option value="penang" <?php if($user->state == 'penang'){ ?> selected <?php } ?>> Penang </option>
                                            <option value="perak" <?php if($user->state == 'perak'){ ?> selected <?php } ?>> Perak </option>
                                            <option value="perlis" <?php if($user->state == 'perlis'){ ?> selected <?php } ?>> Perlis </option>
                                            <option value="sabah" <?php if($user->state == 'sabah'){ ?> selected <?php } ?>> Sabah </option>
                                            <option value="sarawak" <?php if($user->state == 'sarawak'){ ?> selected <?php } ?>> Sarawak </option>
                                            <option value="selangor" <?php if($user->state == 'selangor'){ ?> selected <?php } ?>> Selangor </option>
                                            <option value="terengganu" <?php if($user->state == 'terengganu'){ ?> selected <?php } ?>> Terengganu </option>
                                        </select> </td>
                                </tr>
                                <tr>
                                    <td> Post Code </td>
                                    <td> <input type="number" size="6" name="user_post_code" value="<?php echo $user->post_code; ?>"> </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><div class="buttons_margin_50">
                                            <button class="button" id="black_button" type="submit">Save Address</button>
                                            <a class="change_text" id="black_text" href="<?php echo base_url(); ?>index.php/Menu">Cancel</a>
                                        </div></td>
                                </tr>
                                <input type="hidden" name="main_address" value="1">                            
                            <?php } ?>
                            </table>
                          </form>
                        </div>                  
                        <div class="homeAddress">
                            <form method="POST">
                            <table class="address_input">
              
                                <tr>
                                    <td> Full Address </td>
                                    <td> <textarea name="user_address"><?php echo ''.($homeAddress == true ? $homeData->address : ''); ?></textarea> </td>
                                </tr> 
                                <tr>
                                    <td> City </td>
                                    <td> <input type="text" name="user_city" value="<?php echo ''.($homeAddress == true ? $homeData->city : ''); ?>"> </td>
                                </tr>
                                <tr>
                                    <td> State</td>
                                    <td> <select name="state">
                                            <option value="johor" <?php if($homeAddress == true && $homeData->state == 'johor'){ ?> selected <?php } ?>> Johor </option>
                                            <option value="kedah" <?php if($homeAddress == true && $homeData->state == 'kedah'){ ?> selected <?php } ?>> Kedah </option>
                                            <option value="kelantan" <?php if($homeAddress == true && $homeData->state == 'kelantan'){ ?> selected <?php } ?>> Kelantan </option>
                                            <option value="malacca" <?php if($homeAddress == true && $homeData->state == 'malacca'){ ?> selected <?php } ?>> Malacca </option>
                                            <option value="negeri_sembilan" <?php if($homeAddress == true && $homeData->state == 'negeri_sembilan'){ ?> selected <?php } ?>> Negeri Sembilan </option>
                                            <option value="pahang" <?php if($homeAddress == true && $homeData->state == 'pahang'){ ?> selected <?php } ?>> Pahang </option>
                                            <option value="penang" <?php if($homeAddress == true && $homeData->state == 'penang'){ ?> selected <?php } ?>> Penang </option>
                                            <option value="perak" <?php if($homeAddress == true && $homeData->state == 'perak'){ ?> selected <?php } ?>> Perak </option>
                                            <option value="perlis" <?php if($homeAddress == true && $homeData->state == 'perlis'){ ?> selected <?php } ?>> Perlis </option>
                                            <option value="sabah" <?php if($homeAddress == true && $homeData->state == 'sabah'){ ?> selected <?php } ?>> Sabah </option>
                                            <option value="sarawak" <?php if($homeAddress == true && $homeData->state == 'sarawak'){ ?> selected <?php } ?>> Sarawak </option>
                                            <option value="selangor" <?php if($homeAddress == true && $homeData->state == 'selangor'){ ?> selected <?php } ?>> Selangor </option>
                                            <option value="terengganu" <?php if($homeAddress == true && $homeData->state == 'terengganu'){ ?> selected <?php } ?>> Terengganu </option>
                                        </select> </td>
                                </tr>
                                <tr>
                                    <td> Post Code </td>
                                    <td> <input type="number" size="6" name="user_post_code" value="<?php echo ''.($homeAddress == true ? $homeData->postcode : ''); ?>"> </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><div class="buttons_margin_50">
                                            <button class="button" id="black_button" type="submit">Save Profile</button>
                                            <a class="change_text" id="black_text" href="<?php echo base_url(); ?>index.php/Menu">Cancel</a>
                                        </div></td>
                                </tr>
                                <input type="hidden" name="home_address" value="1">
                            </table>
                            </form>
                        </div>
                        <div class="workAddress">
                            <form method="POST">
                            <table class="address_input">
              
                                <tr>
                                    <td> Full Address </td>
                                    <td> <textarea name="user_address"><?php echo ''.($workAddress == true ? $workData->address : ''); ?></textarea> </td>
                                </tr> 
                                <tr>
                                    <td> City </td>
                                    <td> <input type="text" name="user_city" value="<?php echo ''.($workAddress == true ? $workData->city : ''); ?>"> </td>
                                </tr>
                                <tr>
                                    <td> State</td>
                                    <td> <select name="state">
                                            <option value="johor" <?php if($workAddress == true && $workData->state == 'johor'){ ?> selected <?php } ?>> Johor </option>
                                            <option value="kedah" <?php if($workAddress == true && $workData->state == 'kedah'){ ?> selected <?php } ?>> Kedah </option>
                                            <option value="kelantan" <?php if($workAddress == true && $workData->state == 'kelantan'){ ?> selected <?php } ?>> Kelantan </option>
                                            <option value="malacca" <?php if($workAddress == true && $workData->state == 'malacca'){ ?> selected <?php } ?>> Malacca </option>
                                            <option value="negeri_sembilan" <?php if($workAddress == true && $workData->state == 'negeri_sembilan'){ ?> selected <?php } ?>> Negeri Sembilan </option>
                                            <option value="pahang" <?php if($workAddress == true && $workData->state == 'pahang'){ ?> selected <?php } ?>> Pahang </option>
                                            <option value="penang" <?php if($workAddress == true && $workData->state == 'penang'){ ?> selected <?php } ?>> Penang </option>
                                            <option value="perak" <?php if($workAddress == true && $workData->state == 'perak'){ ?> selected <?php } ?>> Perak </option>
                                            <option value="perlis" <?php if($workAddress == true && $workData->state == 'perlis'){ ?> selected <?php } ?>> Perlis </option>
                                            <option value="sabah" <?php if($workAddress == true && $workData->state == 'sabah'){ ?> selected <?php } ?>> Sabah </option>
                                            <option value="sarawak" <?php if($workAddress == true && $workData->state == 'sarawak'){ ?> selected <?php } ?>> Sarawak </option>
                                            <option value="selangor" <?php if($workAddress == true && $workData->state == 'selangor'){ ?> selected <?php } ?>> Selangor </option>
                                            <option value="terengganu" <?php if($workAddress == true && $workData->state == 'terengganu'){ ?> selected <?php } ?>> Terengganu </option>
                                        </select> </td>
                                </tr>
                                <tr>
                                    <td> Post Code </td>
                                    <td> <input type="number" size="6" name="user_post_code" value="<?php echo ''.($workAddress == true ? $workData->postcode : ''); ?>"> </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><div class="buttons_margin_50">
                                            <button class="button" id="black_button" type="submit">Save Profile</button>
                                            <a class="change_text" id="black_text" href="<?php echo base_url(); ?>index.php/Menu">Cancel</a>
                                        </div></td>
                                </tr>
                                <input type="hidden" name="work_address" value="1">
                            </table>
                            </form>
                        </div>

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