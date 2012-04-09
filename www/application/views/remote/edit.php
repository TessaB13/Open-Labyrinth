<?php if(isset($templateData['service'])) { ?>
<table width="100%" bgcolor="#ffffff"><tr><td>
            <h4>Edit remote services "<?php echo $templateData['service']->name; ?>"</h4>
            <form id="form1" name="form1" method="post" action="<?php echo URL::base(); ?>remoteServiceManager/updateService/<?php echo $templateData['service']->id; ?>">
                <table width="100%" border="0" cellspacing="0" cellpadding="4">
                    <tr>
                        <td width="33%" align="right"><p><?php echo __('service name'); ?>:</p></td>
                        <td width="50%">
                            <input name="ServiceName" type="text" id="ServiceName" size="40" value="<?php echo $templateData['service']->name; ?>"></td>
                    </tr>
                    <tr>
                        <td width="33%" align="right"><p><?php echo __('service user ID'); ?>:</p></td>
                        <td width="50%">
                            <select name="ServiceNameUserId">
                                <option value="">undefined</option>
                                <?php if(count($templateData['users']) > 0) { ?>
                                <?php foreach($templateData['users'] as $user) { ?>
                                <option value="<?php echo $user->id; ?>"><?php echo $user->nickname; ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td width="33%" align="right"><p>type:</p></td>
                        <td width="50%">
                            <select name="ServiceType"><option value="s" <?php if($templateData['service']->type == 's') echo 'selected=""'; ?>>server</option><option value="i" <?php if($templateData['service']->type == 'i') echo 'selected=""'; ?>>iPhone</option></select></td>
                    </tr>
                    <tr>
                        <td width="33%" align="right">
                            <p>IP of remote client (leave box 4 or 3 and 4 blank for masking - boxes 1 and 2 must be filled in):</p>
                        </td>
                        <td width="50%">
                            <?php $ipArray = explode('.', $templateData['service']->ip); ?>
                            <input name="ServiceIPMaskA" type="text" size="4" value="<?php echo $ipArray[0]; ?>">.
                            <input name="ServiceIPMaskB" type="text" size="4" value="<?php echo $ipArray[1]; ?>">.
                            <input name="ServiceIPMaskC" type="text" size="4" value="<?php echo $ipArray[2]; ?>">.
                            <input name="ServiceIPMaskD" type="text" size="4" value="<?php echo $ipArray[3]; ?>"></td>
                    </tr>
                    <tr>
                        <td><p>&nbsp;</p></td>
                        <td><input type="submit" name="Submit" value="<?php echo __('submit'); ?>"></td>
                    </tr>

                </table>
            </form>
            <hr>
            <p><a href="<?php echo URL::base(); ?>remoteServiceManager"><?php echo __('remote services'); ?></a></p>
        </td></tr></table>
<?php } ?>