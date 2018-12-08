<?php $this->load->view('front/inc/header.php'); ?>

    <div class="wrap pages-header-wrap">
        <ul class="uk-breadcrumb">
            <li><a href="/"><?=$translate['main']?></a></li>
            <li><a href="/photo_gallery" class="uk-active"><?=$translate['photo_gallery']?></a></li>
        </ul>
        <header class="pages-header filters"> 
            <h2 class="pages-heading">
                <?=$translate['photo_gallery']?> <b id="news-chosen-cat"></b>
            </h2>
            <div class="pages-filter-box">
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
        <div class="uk-width-small-1-2 uk-width-medium-1-4">
            <a href="/photo_gallery_item/index/{{slug}}">
                <div class="photo-gallery-card">
                    <div class="photo-gallery-card-img">
                        <img src="{{image}}" alt="{{title_<?=LANG?>}}">
                    </div>
                    <h3 class="photo-gallery-card-title">{{title_<?=LANG?>}}</h3>
                </div>
            </a>
        </div>
        {{/data}}
    </script>

    <div class="wrap pages-cards">
        <p class="nodata custom-hide" id="nodata">შედეგი ვერ მოიძებნა</p>
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