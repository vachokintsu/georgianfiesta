<?php $this->load->view('front/inc/header.php'); ?>

    <div class="text-page">
        <div class="pages-header-wrap">
            <ul class="uk-breadcrumb">
                <li><a href="/"><?=$translate['main']?></a></li>
                <li><a href="/page/index/<?=$data['slug_'.LANG] ?>" class="uk-active"><?=$data['title_'.LANG] ?></a></li>
            </ul>
        </div>

        <div class="page-data">
            <header class="uk-grid text-page-haeder">
                <div class="uk-width-medium-7-10 uk-width-small-6-10 uk-width-5-10 uk-flex uk-flex-middle">
                    <h1 class="text-page-title"><?=$data['title_'.LANG] ?></h1>
                </div>
                <div class="uk-width-medium-3-10 uk-width-small-4-10 uk-width-5-10 uk-text-right">
                    <button type="button" class="text-page-act-btn" onclick="fbShare()">
                        <i class="uk-icon-facebook-square"></i>
                        <span><?=$translate['share']?></span>
                    </button>
                </div>
            </header>
            <!-- NEWS SLIDER -->
            <?php if (!empty($data['image_paths'])):?> 
                <div class="slider uk-margin-bottom" id="home-slider">
                    <div class="uk-slidenav-position" data-uk-slideshow="{autoplay: true, autoplayInterval:4000, animation: 'fade'}">
                        <ul class="uk-slideshow uk-overlay-active">
                            <?php foreach ($data['image_paths'] as $value): ?>
                                <li>
                                    <img src="<?=base_url().$value?>" alt="">
                                </li>
                            <?php endforeach ?>
                        </ul>
                        <?php if (count($data['image_paths']) > 1): ?>
                            <div class="slider-nav-wrap uk-hidden-small">
                                <div class="slider-nav">
                                    <i class="uk-icon-chevron-left" data-uk-slideshow-item="previous"></i>
                                    <i class="uk-icon-chevron-right" data-uk-slideshow-item="next"></i>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
             <?php endif ?>
            <!-- NEWS SLIDER END -->
            <div id="print-area">
                <?=$data['text_'.LANG] ?>
            </div>
        </div>
    </div>

<?php $this->load->view('front/inc/footer.php'); ?>