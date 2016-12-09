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
                <div class="member_menu_header" id="black">
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
                <?php foreach($vacancy as $vacancy){ ?>
                <div class="faq_content">
                    <h2>Application For <?php echo $vacancy->job_name; ?></h2>
                    <p><?php echo $vacancy->job_description; ?></p>
                    <div class="career_form_wrapper">
                        <form class="profile_form" method="POST" enctype="multipart/form-data">

                            <div class="profile_errors"></div>
                            <div class="line">
                                <div class="col2">
                                    <span class="form_font">First Name(*)</span> <input name="firstName" type="text" placeholder="First Name" required > 
                                    <?php if($firstNameError){ ?>
                                    <span class="error_message">*First name is required</span>
                                    <?php } ?>
                                </div>
                                <div class="col2" id="align_right">
                                    <span class="form_font">Last Name(*)</span> <input name="lastName" type="text" placeholder="Last Name" required>
                                    <?php if($lastNameError){ ?>
                                    <span class="error_message">*Last name is required</span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="locked_box">
                                <span class="form_font">Email(*)</span>
                                <input name="email" required type="email"  placeholder="Email Address">
                                <?php if($emailError){ ?>
                                <span class="error_message">*Email is required</span
                                <?php } ?>
                            </div>
                            <div class="locked_box">
                                <span class="form_font">Phone(*)</span>
                                <input name="phone" required type="text" placeholder="Phone Number" >
                                <?php if($phoneError){ ?>
                                <span class="error_message">*Phone is required</span>
                                <?php } ?>
                            </div>
                            <div class="locked_box">
                                <span class="form_font">Linkedln Profile</span>
                                <input name="linkedln"  type="text" placeholder="Linkedln Profile" >
                            </div>
                            <div class="locked_box">
                                <span class="form_font">Resume / CV(*)<sup>(Please attach .docx or .pdf file)</sup></span>
                                <input name="resume"  type="file" required >
                                <?php if($resumeError){ ?>
                                <span class="error_message">*Resume is required</span>  
                                <?php } ?>
                            </div>
                            <div class="locked_box">
                                <span class="form_font">Cover Letter<sup>(Please attach .docx or .pdf file)</sup></span>
                                <input name="coverLetter" type="file" >
                           
                            </div>
                            <div class="locked_box">
                                <span class="form_font">How did you hear about this job?(*) </span>
                                <textarea name="howDid" cols="40" rows="20" required>
                                </textarea>
                                <?php if($howDidError){ ?>
                                <span class="error_message">*Answer is required</span> 
                                <?php } ?>
                            </div>
                            <div class="locked_box">
                                <span class="form_font">Why are you excited to join SelfFeed?(*) </span>
                                <textarea name="whyUs" cols="40" rows="20" required>
                                </textarea>
                                <?php if($whyUsError){ ?>
                                <span class="error_message">*Answer is required</span> 
                                <?php } ?>
                            </div>
                            <div class="locked_box">
                                <span class="form_font">Why are you excited about this particular position?(*) </span>
                                <textarea name="whyThis" cols="40" rows="20" required>
                                </textarea>
                                <?php if($whyThisError){ ?>
                                <span class="error_message">*Answer is required</span> 
                                <?php } ?>
                            </div>
                            <div class="locked_box">
                                <span class="form_font">How would your friends and family describe you as a person?(*)  </span>
                                <textarea name="howYou" cols="40" rows="20" required>
                                </textarea>
                                <?php if($howYouError){ ?>
                                <span class="error_message">*Answer is required</span> 
                                <?php } ?>
                            </div>
                            <div class="buttons">
                                <button class="button" id="black_button" type="submit">Request Job</button>
                                <a class="change_text" href="<?php echo base_url(); ?>index.php/Menu">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
                <?php } ?>
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