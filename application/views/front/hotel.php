<?php $this->load->view('front/inc/header.php'); ?>

    <div class="wrap news-page">
        <div class="pages-header-wrap">
            <ul class="uk-breadcrumb">
                <li><a href="/"><?=$translate['main']?></a></li>
                <li><a href="/hotels"><?=$translate['hotels']?></a></li>
                <li><a class="uk-active"><?=$data['title_'.LANG]?></a></li>
            </ul>
        </div>

        <div class="uk-grid">
            <div class="uk-width-medium-7-10">
                <div class="page-data">
                    <header class="text-page-haeder">
                        <?php if (empty($data)): ?>
                            <h1 class="text-page-title"><?=$translate['not_found']?></h1>
                        <?php endif ?>
                        <?php if (!empty($data)): ?>
                            <h1 class="text-page-title"><?=$data['title_'.LANG]?></h1>
                        <?php endif ?>
                        <!-- NEWS SLIDER -->
                        <?php if (!empty($data['image_paths'])):?> 
                            <div class="slider" id="home-slider">
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
                        <div class="uk-grid">
                                
                                <div class="uk-width-medium-4-10 uk-width-small-6-10 uk-width-5-10 uk-flex uk-flex-middle">
                            <?php if (count($data['category']) && !empty($data['category'])): ?>
                                    <div class="news-card-tags-wrap">

                                        <?php  foreach ($data['category'] as $value): ?>

                                            <a href="/hotels?cat=<?=$value['id']?>" class="news-card-tags" style="color: #000;">
                                                <?php
                                                    if($value['title_'.LANG] == 1) {
                                                        echo "<i class='fa fa-star'></i>";
                                                    } else if($value['title_'.LANG] == 2) {
                                                        echo "<i class='fa fa-star'></i>";
                                                        echo "<i class='fa fa-star'></i>";
                                                    } else if($value['title_'.LANG] == 3) {
                                                        echo "<i class='fa fa-star'></i>";
                                                        echo "<i class='fa fa-star'></i>";
                                                        echo "<i class='fa fa-star'></i>";
                                                    } else if($value['title_'.LANG] == 4) {
                                                        echo "<i class='fa fa-star'></i>";
                                                        echo "<i class='fa fa-star'></i>";
                                                        echo "<i class='fa fa-star'></i>";
                                                        echo "<i class='fa fa-star'></i>";
                                                    } else if($value['title_'.LANG] == 5) {
                                                        echo "<i class='fa fa-star'></i>";
                                                        echo "<i class='fa fa-star'></i>";
                                                        echo "<i class='fa fa-star'></i>";
                                                        echo "<i class='fa fa-star'></i>";
                                                        echo "<i class='fa fa-star'></i>";
                                                    } else {
                                                        echo $value['title_'.LANG];
                                                    }
                                                ?>
                                            </a>
                                        <?php endforeach ?>
                                    </div>
                            <?php endif ?>
                                </div>
                            <div class="uk-width-medium-6-10 uk-width-small-4-10 uk-width-5-10 uk-text-right">
                                <button type="button" class="text-page-act-btn share" onclick="fbShare()">
                                    <i class="uk-icon-facebook-square"></i>
                                    <span><?=$translate['share']?></span>
                                </button>
                                <button type="button" class="text-page-act-btn" onclick="printDiv('print-area')">
                                    <i class="uk-icon-print"></i>
                                    <span><?=$translate['print']?></span>
                                </button>
                            </div>
                        </div>
                    </header>

                    <div id="print-area">
                            <?=$data['text_'.LANG]?>
                    </div>
                </div>
            </div>
            <div class="uk-width-medium-3-10">
                <div class="related-news">
                    <header class="block-header">
                        <h3 class="block-header-title"><?=$translate['hotels']?></h3>
                        <div class="block-header-actions">
                            <a href="<?=base_url('hotels')?>" class="block-header-btn"><?=$translate['all']?></a>
                        </div>
                    </header>
                    <div>
                        <?php foreach ($latest_hotels as $value): ?>
                        <div class="announces-card">
                            <div class="announces-card-date">
                                <span class="news-date"><?=$value['date']?></span>
                            </div>
                            <h3 class="announces-card-title">
                                <a href="<?=base_url('hotel/index/').$value['slug_'.LANG]?>"><?=$value['title_'.LANG]?></a>
                            </h3>
                            <div class="news-card-tags-wrap">
                                <?php foreach($value['categories'] as $row): ?>
                                    <a href="<?=base_url()?>hotels?cat=<?=$row['id']?>" class="news-card-tags" style="color: #<?=$row['color']?>;">
                                        <?php
                                            if($row['title_'.LANG] == 1) {
                                                echo "<i class='fa fa-star'></i>";
                                            } else if($row['title_'.LANG] == 2) {
                                                echo "<i class='fa fa-star'></i>";
                                                echo "<i class='fa fa-star'></i>";
                                            } else if($row['title_'.LANG] == 3) {
                                                echo "<i class='fa fa-star'></i>";
                                                echo "<i class='fa fa-star'></i>";
                                                echo "<i class='fa fa-star'></i>";
                                            } else if($row['title_'.LANG] == 4) {
                                                echo "<i class='fa fa-star'></i>";
                                                echo "<i class='fa fa-star'></i>";
                                                echo "<i class='fa fa-star'></i>";
                                                echo "<i class='fa fa-star'></i>";
                                            } else if($row['title_'.LANG] == 5) {
                                                echo "<i class='fa fa-star'></i>";
                                                echo "<i class='fa fa-star'></i>";
                                                echo "<i class='fa fa-star'></i>";
                                                echo "<i class='fa fa-star'></i>";
                                                echo "<i class='fa fa-star'></i>";
                                            } else {
                                                echo $row['title_'.LANG];
                                            }
                                        ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>

                <!-- SIDEBAR -->
                <div class="sidebar-block">
                    <?php foreach($sidebar as $row): ?>
                        <div class="sidebar-item uk-margin-bottom">
                            <header class="block-header">
                            <h3 class="block-header-title"><?=$row['title_'.LANG]?></h3>
                        </header>
                        <a href="<?=$row['link']?>" target="<?=$row['target']?>">
                            <img src="<?=$row['image']?>" alt="<?=$row['title_'.LANG]?>" title="<?=$row['title_'.LANG]?>">
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- SIDEBAR END -->
            </div>
        </div>
    </div>

<?php if (count($announcements) > 0): ?>

    <div class="wrap announce-bottom">
        <header class="block-header">
            <h3 class="block-header-title"><?=$translate['announces']?></h3>

            <div class="block-header-actions">
                <a href="/announcements" class="block-header-btn"><?=$translate['all']?></a>
            </div>
        </header>

        <div class="uk-grid">
            <?php foreach ($announcements as $value): ?>
                    <div class="uk-width-large-1-5 uk-width-medium-1-4 uk-width-small-1-2">
                        <div class="announces-block">
                            <div class="announces-card">
                                <div class="announces-card-date">
                                    <?php if(!empty($value['start_date'])) { ?>
                                    <span class="start_date"><?=$value['start_date']?></span>
                                    <?php } if(!empty($value['end_date'])) { ?>
                                    <span class="end_date"><?=$value['end_date']?></span>
                                    <?php } ?>
                                </div>
                                <h3 class="announces-card-title">
                                    <a href="<?=base_url('announcements/index/')?><?=$value['slug_'.LANG]?>"><?=$value['title_'.LANG]?></a>
                                </h3>
                            </div>
                        </div>
                    </div>
            <?php endforeach ?>
        </div>
    </div>

<?php endif ?>

<?php $this->load->view('front/inc/footer.php'); ?>