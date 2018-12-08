<?php $this->load->view('front/inc/header.php'); ?>

    <div class="text-page">
        <div class="pages-header-wrap">
            <ul class="uk-breadcrumb">
                <li><a href="/"><?=$translate['main']?></a></li>
                <li><a href="/photo_gallery"><?=$translate['photo_gallery']?></a></li>
                <li><a class="uk-active"><?=$data['title_'.LANG]?></a></li>
            </ul>
        </div>

        <div class="page-data">
            <header class="text-page-haeder">
                <?php if (empty($data)): ?>
                    <h1 class="text-page-title"><?=$translate['not_found']?></h1>
                <?php endif ?>
                <?php if (!empty($data)): ?>
                    <h1 class="text-page-title"><?=$data['title_'.LANG]?></h1>
                <?php endif ?>
                <!-- VIDEO -->
                <div class="uk-grid uk-margin-bottom photo-gallery-grid" data-uk-grid="{animation: false}">
                    <?php 
                        foreach(explode(',', $data['image_paths']) as $image):
                    ?>
                    <div class="uk-width-small-1-4 uk-width-1-1">
                        <a href="<?=$image;?>" data-gallery>
                            <img src="<?=$image;?>" style="width: 100%;">
                        </a>
                    </div>
                    <?php
                        endforeach;
                    ?>
                </div>
                <div class="uk-grid">
                    <div class="uk-width-medium-7-10 uk-width-small-6-10 uk-width-1-1 uk-flex uk-flex-middle uk-margin-bottom">
                        <?=$data['text_'.LANG]?>
                    </div>
                    <div class="uk-width-medium-3-10 uk-width-small-4-10 uk-width-1-1 uk-text-right">
                        <button type="button" class="text-page-act-btn share" onclick="fbShare()">
                            <i class="uk-icon-facebook-square"></i>
                            <span><?=$translate['share']?></span>
                        </button>
                    </div>
                </div>
            </header>
        </div>
    </div>

<?php $this->load->view('front/inc/footer.php'); ?>