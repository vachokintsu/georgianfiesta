<?php $this->load->view('front/inc/header.php'); ?>

    <div class="text-page">
        <div class="pages-header-wrap">
            <ul class="uk-breadcrumb">
                <li><a href="/"><?=$translate['main']?></a></li>
                <li><a href="/tv"><?=$translate['multimedia_title']?></a></li>
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
                <div class="uk-margin-bottom">
                    <iframe width="100%" height="480" class="tv-video" src="https://www.youtube.com/embed/<?php echo str_replace('https://www.youtube.com/watch?v=', '', $data['youtube']);?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>

                <div class="uk-grid">
                        
                        <div class="uk-width-medium-4-10 uk-width-small-6-10 uk-width-5-10 uk-flex uk-flex-middle">
                            <?php if (count($data['category']) && !empty($data['category'])): ?>
                                <div class="news-card-tags-wrap">
                                    <?php  foreach ($data['category'] as $value): ?>
                                        <a href="/tv?cat=<?=$value['id']?>" class="news-card-tags" style="color: #<?=$value['color']?>;">
                                            <?=$value['title_'.LANG]?>
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

<?php $this->load->view('front/inc/footer.php'); ?>