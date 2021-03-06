<?php $this->load->view('admin/inc/header.php'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <form method="post" action="<?=current_url()?>">
                        <div class="form-group">
                            <label class="help-block">დაწყების თარიღი</label>
                            <div>
                                <input type="text" name="start_date" autocomplete="off" class="form-control" id="datetimepicker" value="<?=$item['start_date']?>" required>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="help-block">დასრულების თარიღი</label>
                            <div>
                                <input type="text" name="end_date" autocomplete="off" class="form-control" id="datetimepicker2" value="<?=$item['end_date']?>">
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
                                        <div class="form-group">
                                            <label class="help-block">სრული აღწერა</label>
                                            <div>
                                                <textarea class="editor" id="editor_<?=$lang['code']?>" name="text_<?=$lang['code']?>"><?=$item['text_'.$lang["code"].'']?></textarea>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="help-block">აქტიური</label>
                                            <div>
                                                <div class="radio radio-info radio-inline">
                                                    <input type="radio" id="radioY_<?=$lang['code']?>" name="active_<?=$lang['code']?>" value="1" <?php if($item['active_'.$lang["code"].''] == '1') { echo "checked"; } ?> >
                                                    <label for="radioY_<?=$lang['code']?>">დიახ</label>
                                                </div>
                                                <div class="radio radio-info radio-inline">
                                                    <input type="radio" id="radioN_<?=$lang['code']?>" name="active_<?=$lang['code']?>" value="0" <?php if($item['active_'.$lang["code"].''] == '0') { echo "checked"; } ?> >
                                                    <label for="radioN_<?=$lang['code']?>">არა</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; endforeach; ?>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="help-block">გაიგზავნოს ბროუზერში შეტყობინება?</label>
                            <div>
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="notificationY" name="notification" value="1" checked>
                                    <label for="notificationY">დიახ</label>
                                </div>
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="notificationN" name="notification" value="0">
                                    <label for="notificationN">არა</label>
                                </div>
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