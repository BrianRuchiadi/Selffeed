        <form method="POST">
        <div class="admin_panel_content_wrapper">
            <div class="admin_panel_content">
                    <table class="table">
                        <tr>
                            <td colspan="2"><h2 style="text-align:center;"> Store Status </h2></td>
                        </tr>
                        <tr>
                            <td> status </td>
                            <td> <select name="status">
                                    <option value="1" <?php if($store_status->status == 1){ ?>selected <?php } ?>>Open</option>
                                    <option value="0" <?php if($store_status->status == 0){ ?>selected <?php } ?>>Close</option>
                                 </select>
                            </td>
                        </tr>                
                        <tr>
                            <td colspan="2"><button class="btn-success">Add </button></td>
                        </tr>
                    </table>
               
            </div>
        </div>
        </form>