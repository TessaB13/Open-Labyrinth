<?php
/**
 * Open Labyrinth [ http://www.openlabyrinth.ca ]
 *
 * Open Labyrinth is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Open Labyrinth is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Open Labyrinth.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @copyright Copyright 2012 Open Labyrinth. All Rights Reserved.
 *
 */
?>

<div class="page-header">
    <div class="pull-right"><a class="btn btn-primary" href="<?php echo URL::base().'dforumManager/addForum'; ?>"><i class="icon-plus-sign"></i> <?php echo __('Add new forum'); ?></a></div>
    <h1><?php echo __('Forums'); ?></h1></div>


<table class="table table-striped table-bordered">
    <?php
    if(isset($templateData['forums']) and count($templateData['forums']) > 0) { ?>
        <tr>
        <th><a href="<?php echo URL::base(); ?>dforumManager/index/1/<?php echo ($templateData['typeSort'] == 0) ? '1' : '0'; ?>" >Forum name
               <div class="pull-right"><i class="icon-chevron-<?php if($templateData['typeSort'] == 0 && $templateData['sortBy'] == 1 ) echo 'down';  else  echo 'up'; ?> icon-black"></i></div></th>
        <th><a href="<?php echo URL::base(); ?>dforumManager/index/2/<?php echo ($templateData['typeSort'] == 0) ? '1' : '0'; ?>" >Users
               <div class="pull-right"><i class="icon-chevron-<?php if($templateData['typeSort'] == 0 && $templateData['sortBy'] == 2 ) echo 'down';  else  echo 'up'; ?> icon-black"></i></div></th>
        <th><a href="<?php echo URL::base(); ?>dforumManager/index/3/<?php echo ($templateData['typeSort'] == 0) ? '1' : '0'; ?>" >Comments
               <div class="pull-right"><i class="icon-chevron-<?php if($templateData['typeSort'] == 0 && $templateData['sortBy'] == 3 ) echo 'down';  else  echo 'up'; ?> icon-black"></i></div></th>
        <th><a href="<?php echo URL::base(); ?>dforumManager/index/4/<?php echo ($templateData['typeSort'] == 0) ? '1' : '0'; ?>" >Last
               <div class="pull-right"><i class="icon-chevron-<?php if($templateData['typeSort'] == 0 && $templateData['sortBy'] == 4 ) echo 'down';  else  echo 'up'; ?> icon-black"></i></div></th>
    </tr>
        <?php foreach($templateData['forums'] as $forum) {
    ?>
    <tr>
        <th>Forum</th>
        <th>Count of users</th>
        <th>Count of comments</th>
        <th>Last comment</th>
    </tr>
    <tr>
        <td>

            <?php if (Auth::instance()->get_user()->type->name == 'superuser' || Auth::instance()->get_user()->id == $forum['author_id']) { ?>
            <div class="pull-right">
                <a href="<?php echo URL::base() . 'dforumManager/editForum/' . $forum['id']; ?>" rel="tooltip" title="Edit this forum" class="btn btn-small btn-info"><i class="icon-edit"></i> <?php echo __('Edit'); ?></a>
                <a data-toggle="modal" href="javascript:void(0);" data-target="#delete-labyrinth-<?php echo $forum['id'];  ?>" rel="tooltip" title="Delete this forum" class="btn btn-small btn-danger"><i class="icon-trash"></i> <?php echo __('Delete Forum'); ?></a>
                <div class="modal hide alert alert-block alert-error fade in" id="delete-labyrinth-<?php echo $forum['id'];  ?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="alert-heading"><?php echo __('Caution! Are you sure?'); ?></h4>
                    </div>
                    <div class="modal-body">
                        <p><?php echo __('You have just clicked the delete button, are you certain that you wish to proceed with deleting this Forum from OpenLabyrinth?'); ?></p>
                        <p>
                            <a class="btn btn-danger" href="<?php echo URL::base() . 'dforumManager/deleteForum/' . $forum['id']; ?>"><?php echo __('Delete Forum'); ?></a> <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        </p>
                    </div>
                </div>
            </div>
           <?php }?>

            <a href="<?php echo URL::base().'dforumManager/viewForum/' . $forum['id']; ?>"><h4><?php echo $forum['name'];?></h4></a>

            <p>
                <a rel="tooltip" title="Author" class="label label-info" href="<?php echo URL::base().'usermanager/viewUser/' . $forum['author_id']; ?>"><?php echo $forum['author_name']; ?></a><br/>
                <span class="label label-info"><?php echo $forum['date']; ?></span>
            </p>
        </td>
        <td><?php echo $forum['users_count'];?> users</td>
        <td><?php echo $forum['messages_count'];?> comments</td>
        <td>
            <p>
                <a rel="tooltip" title="Author" class="label label-info" href="<?php echo URL::base().'usermanager/viewUser/' . $forum['message_id']; ?>"><?php echo $forum['message_nickname']; ?></a>
                <br/>
                <span class="label label-info"><?php echo $forum['message_date']; ?></span>
            </p>
        </td>
    </tr>
    <?php }
    }
    else
    { ?>
        <tr class="info">
            <td colspan="3">There are no forums. You may add one, clicking the button above.</td>
        </tr>
   <?php } ?>
</table>




