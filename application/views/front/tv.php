<?php $this->load->view('front/inc/header.php'); ?>

    <div class="wrap pages-header-wrap">
        <ul class="uk-breadcrumb">
            <li><a href="/"><?=$translate['main']?></a></li>
            <li><a href="/tv" class="uk-active"><?=$translate['multimedia_title']?></a></li>
        </ul>
        <header class="pages-header filters"> 
            <h2 class="pages-heading">
                <?=$translate['multimedia_title']?> <b id="news-chosen-cat"></b>
            </h2>
            <div class="pages-filter-box">
                <div>
                    <div class="pages-filter-inp-wrap">
                        <select class="pages-filter-inp select2" id="news-filter-cat">
                            <option value=""><?=$translate['all']?></option>
                            <?php
                                foreach($categories as $category):
                                    if($this->input->get('cat') == $category['id']) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                            ?>
                                <option value="<?=$category['id']?>" <?=$selected?> ><?=$category['title_'.LANG]?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div>
                    <div class="pages-filter-inp-wrap">
                        <i class="uk-icon-search pages-filter-inp-icon"></i>
                        <input type="text" placeholder="<?=$translate['search']?>" value="<?=$this->input->get('search')?>" class="pages-filter-inp" id="news-search-filter">
                    </div>
                </div>
            </div>
        </header>
    </div>

    <script id="template" type="x-tmpl-mustache">
        {{#data}}
        <div class="uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4">
            <div class="news-card">
                <div class="news-card-img-wrap">
                    <a href="/tv_item/index/{{slug}}">
                        <img src="https://img.youtube.com/vi/{{youtube_id}}/mqdefault.jpg" alt="{{title_<?=LANG?>}}" class="news-card-img">
                    </a>
                </div>
                <div class="news-card-info-wrap">
                    <div class="news-card-date">
                        {{{date}}}
                    </div>
                    <h3 class="news-card-title fontchange has-video">
                        <a href="/tv_item/index/{{slug}}">
                            {{title_<?=LANG?>}}
                        </a>
                        <a href="{{youtube}}" data-uk-lightbox>
                            <img src="/public/assets/images/play-red.png" class="news-card-play">
                        </a>
                    </h3>
                    <div class="news-card-tags-wrap">
                        {{#categories}}
                        <a href="/tv?cat={{id}}" class="news-card-tags" style="color: #{{color}};">
                            {{title_<?=LANG?>}}
                        </a>
                        {{/categories}}
                    </div>
                </div>
            </div>
        </div>
        {{/data}}
    </script>

    <div class="wrap pages-cards">
        <p class="nodata custom-hide" id="nodata"></p>
        <div class="uk-grid" id="load-news-cards"></div>

        <!-- loader -->
        <div class="sk-fading-circle cards-loader" id="cards-loader">
            <div class="sk-circle1 sk-circle"></div>
            <div class="sk-circle2 sk-circle"></div>
            <div class="sk-circle3 sk-circle"></div>
            <div class="sk-circle4 sk-circle"></div>
            <div class="sk-circle5 sk-circle"></div>
            <div class="sk-circle6 sk-circle"></div>
            <div class="sk-circle7 sk-circle"></div>
            <div class="sk-circle8 sk-circle"></div>
            <div class="sk-circle9 sk-circle"></div>
            <div class="sk-circle10 sk-circle"></div>
            <div class="sk-circle11 sk-circle"></div>
            <div class="sk-circle12 sk-circle"></div>
        </div>
    </div>

<?php $this->load->view('front/inc/footer.php'); ?>