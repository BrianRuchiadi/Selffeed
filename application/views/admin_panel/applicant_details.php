        <form method="POST">
       
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">
                <table class="table table-bordered">
                    
                    <tr style=" border: 0;">
                        <td colspan="2" style="background-color : #6F6D6D;"><h1 style="text-align: center;">Applicants</h1></td>
                    </tr>
                    <tr>
                        <td> First Name </td>
                        <td> <input type="text" readonly value="<?php echo $job_applicant->firstName; ?>" size="40"> </td>
                    </tr>
                    <tr>
                        <td> Last Name </td>
                        <td> <input type="text" readonly value="<?php echo $job_applicant->lastName; ?>" size="40"> </td>
                    </tr>
                    <tr>
                        <td> Email </td>
                        <td> <input type="text" readonly value="<?php echo $job_applicant->email; ?>" size="40"> </td>
                    </tr>
                    <tr>
                        <td> Contact No </td>
                        <td> <input type="text" readonly value="<?php echo $job_applicant->phone; ?>" size="40"> </td>
                    </tr>
                    <tr>
                        <td> LinkedIn </td>
                        <td> <input type="text" readonly value="<?php echo $job_applicant->linkedIn; ?>" size="40"> </td>
                    </tr>
                    <tr>
                        <td> How did you hear about this job? </td>
                        <td> <textarea cols="40" rows="20" readonly><?php echo $job_applicant->howDid; ?></textarea></td>
                    </tr>
                    <tr>
                        <td> Why are you excited to join SelfFeed? </td>
                        <td> <textarea cols="40" rows="20" readonly><?php echo $job_applicant->whyUs; ?></textarea></td>
                    </tr>
                    <tr>
                        <td> Why are you excited about this specific job? </td>
                        <td> <textarea cols="40" rows="20" readonly><?php echo $job_applicant->whyThis; ?></textarea></td>
                    </tr>
                    <tr>
                        <td> How would your friends and family describe you as a person? </td>
                        <td> <textarea cols="40" rows="20" readonly><?php echo $job_applicant->howYou; ?></textarea></td>
                    </tr>
                    <tr>
                        <td> Resume </td>
                        <td> <a href="<?php echo base_url(); ?>index.php/Admin_Panel_Applicants/download_resume/<?php echo $job_applicant->id; ?>">Click to download</a></td>
                    </tr>
                    <tr>
                        <td> Cover Letter </td>
                        <?php if($job_applicant->coverLetter != ''){ ?>
                        <td> <a href="<?php echo base_url(); ?>index.php/Admin_Panel_Applicants/download_coverLetter/<?php echo $job_applicant->id; ?>">Click to download</a></td>
                        <?php } else { ?>
                        <td> Cover letter not available </td>
                        <?php } ?>   
                </table>
            </div>
        </div>
        </form>