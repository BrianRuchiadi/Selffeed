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
                window.history.back();
            }
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="member_menu" id="white">
                <div class="member_menu_header" id="black">
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
                <footer style="background-color: black; height: 80px; color: white; text-align: center;">
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