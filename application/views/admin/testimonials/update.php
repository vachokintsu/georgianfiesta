<?php $this->load->view('admin/inc/header.php'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <form method="post" action="<?=current_url()?>">
                        <div class="form-group">
                            <label class="help-block">სურათი (64x64)</label>
                            <div>
                                <?php if($item['image']) { ?><img src="<?=$item['image']?>" class="admin-image"><?php } ?>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="image" class="form-control" id="image" value="<?=$item['image']?>">
                                        <span class="input-group-addon">
                                            <button type="button" onclick="openFileManager('image');"><span class="fa fa-upload"></span></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div>
                            <ul class="nav nav-tabs">
                                <?php $i = 1; foreach($langs as $lang): ?>
                                <li <?php if($i == 1) { echo 'class="active"'; } ?> >
                                    <a data-toggle="tab" href="#tab-<?=$i?>" aria-expanded="true"><?=$lang['title']?></a>
                                </li>
                                <?php $i++; endforeach; ?>
                            </ul>
                            <div class="tab-content">
                                <?php $i = 1; foreach($langs as $lang): ?>
                                <div id="tab-<?=$i?>" class="tab-pane fade <?php if($i == 1) { echo 'in active'; } ?>">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="help-block">სათაური (მაქს. 255 სიმბოლო)</label>
                                            <div>
                                                <input type="text" name="title_<?=$lang['code']?>" value="<?=$item['title_'.$lang["code"].'']?>" class="form-control" maxlength="255" <?=($i == 1) ? 'required' : ''; ?>>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="help-block">მოკლე აღწერა (მაქს. 255 სიმბოლო)</label>
                                            <div>
                                                <textarea class="form-control" name="descr_<?=$lang['code']?>" maxlength="255"><?=$item['descr_'.$lang["code"].'']?></textarea>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label class="help-block">სრული აღწერა</label>
                                            <div>
                                                <textarea class="editor" id="editor_<?=$lang['code']?>" name="text_<?=$lang['code']?>"><?=$item['text_'.$lang["code"].'']?></textarea>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="help-block">პროფესია (მაქს. 255 სიმბოლო)</label>
                                            <div>
                                                <input type="text" name="profession_<?=$lang['code']?>" value="<?=$item['profession_'.$lang["code"].'']?>" class="form-control" maxlength="255" <?=($i == 1) ? 'required' : ''; ?>>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <?php $i++; endforeach; ?>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <button class="btn btn-primary" type="submit">შენახვა</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('admin/inc/footer.php'); ?>