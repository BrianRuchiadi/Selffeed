        <form method="POST" enctype="multipart/form-data">
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">    
                <?php foreach($vacancy as $vacancy){ ?>
                    <table class="table">
                        <tr>
                            <td colspan="2"><h2 style="text-align:center;"> Edit Job </h2></td>
                        </tr>
                        <tr>
                            <td> Job Name </td>
                            <td> <input type="text" name="job_name" value="<?php echo $vacancy->job_name; ?>" required> </td>
                        </tr>
                        <tr>
                            <td> Job Description </td>
                            <td> <textarea name="job_description" required cols="40" rows="20">
                                 <?php echo $vacancy->job_description; ?>
                                 </textarea> </td>
                        </tr>
                        <tr>
                            <td> Status </td>
                            <td> <select name="active">
                                    <option value="1" <?php if($vacancy->active == 1){ ?>selected<?php } ?>>Active</option>
                                    <option value="0" <?php if($vacancy->active == 0){ ?>selected<?php } ?>>Not Active</option>

                                 </select></td>
                                
                        </tr>
                        <tr>
                            <td colspan="2"><button class="btn-primary">Edit </button></td>
                        </tr>
                    </table>
                <?php } ?>
  
            </div>
        </div>
        </form>