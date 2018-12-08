    <footer id="footer" class="footer">
        <div class="wrap">
            <div class="footer-first">
                <div class="uk-grid wrap">
                    <div class="uk-width-medium-3-10">
                        <h2 class="foot-row-heading"><?=$translate['contact']?></h2>
                        <ul class="footer-list foot-contact">
                            <li>
                                <a>
                                    <i class="uk-icon-map-marker foot-contact-icons" aria-hidden="true"></i>
                                    <span><?=$contact['building_'.LANG]?></span>

                                </a>
                            </li>
                            <li>
                                <div>
                                    <i class="uk-icon-envelope foot-contact-icons" aria-hidden="true"></i>
                                    <div>
                                        <?php foreach (explode(',',$contact['email']) as $value): ?>
                                            <a href="mailto:<?=$value?>"><span><?=$value?></span></a><br>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <i class="uk-icon-phone foot-contact-icons" aria-hidden="true"></i>
                                    <div>
                                        <?php foreach (explode(',',$contact['phone']) as $value): ?>
                                            <a href="tel:<?=$value?>"><span><?=$value?></span></a>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <i class="uk-icon-whatsapp foot-contact-icons" aria-hidden="true"></i>
                                    <div>
                                        <a href="tel:<?=$contact['whatsapp']?>"><span><?=$contact['whatsapp']?></span></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <i class="fab fa-viber" aria-hidden="true" style="font-size: 25px;"></i>
                                    <div>
                                        <a href="tel:<?=$contact['viber']?>"><span><?=$contact['viber']?></span></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="uk-width-medium-4-10 uk-flex-end">
                        <img src="/public/assets/images/geomap.png">
                    </div>
                    <div class="uk-width-medium-3-10 uk-flex-end">
                        <form action="/contact_form" method="POST" id="contact-form" class="contact-form">
                            <div class="contact-form-fields-back">
                                <input type="email" name="email" placeholder="<?=$translate['email']?>">
                                <input type="text" name="subject" placeholder="<?=$translate['subject']?>">
                                <textarea name="message" placeholder="<?=$translate['message']?>"></textarea>
                            </div>
                            <div class="recaptcha-box">
                                <div class="g-recaptcha" data-sitekey="6Ld2UloUAAAAABuzFY_5vg2zPVSD-NW8HxOrTmSk"></div>
                            </div>
                            <button type="submit" name="sendMail" class="uk-button contact-btn"><?=$translate['send']?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--  JQUERY JS -->
    <script src="/public/assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- JQUERY COOKIE -->
    <script src="/public/assets/bower_components/js-cookie/src/js.cookie.js"></script>
    <!-- UIKIT JS -->
    <script src="/public/assets/bower_components/uikit/js/uikit.min.js"></script>
    <script src="/public/assets/bower_components/uikit/js/components/slideshow.min.js"></script>
    <script src="/public/assets/bower_components/uikit/js/components/slideshow-fx.min.js"></script>
    <script src="/public/assets/bower_components/uikit/js/components/slider.min.js"></script>
    <script src="/public/assets/bower_components/uikit/js/components/lightbox.min.js"></script>
    <script src="/public/assets/bower_components/uikit/js/components/tooltip.min.js"></script>
    <script src="/public/assets/bower_components/uikit/js/components/form-select.min.js"></script>
    <script src="/public/assets/bower_components/uikit/js/components/datepicker.min.js"></script>
    <script src="/public/assets/bower_components/uikit/js/components/slideset.min.js"></script>
    <!-- SLICK JS -->
    <script src="/public/assets/bower_components/slick-carousel/slick/slick.min.js"></script>
    <!-- gallery -->
    <script src="/public/admin/vendor/blueimp-gallery/js/jquery.blueimp-gallery.min.js"></script>
    <!-- TRUNK8 JS -->
    <script src="/public/assets/bower_components/trunk8/trunk8.js"></script>
    <!-- COUNTUP JS -->
    <script src="/public/assets/bower_components/countUp.js/dist/countUp.min.js"></script>
    <!-- UNDERSCORE JS -->
    <script src="/public/assets/bower_components/underscore/underscore-min.js"></script>
    <!-- MOMENT JS -->
    <script src="/public/assets/bower_components/moment/min/moment.min.js"></script>
    <script src="/public/assets/bower_components/moment/locale/ka.js"></script>
    <script src="/public/assets/bower_components/moment/locale/ru.js"></script>
    <script src="/public/assets/bower_components/moment/locale/fa.js"></script>
    <!-- CLNDR JS -->
    <script src="/public/assets/bower_components/clndr/clndr.min.js"></script>
    <!-- MUSTACHE JS -->
    <script src="/public/assets/bower_components/mustache.js/mustache.min.js"></script>
    <!-- SELECT2 JS -->
    <script src="/public/assets/bower_components/select2/dist/js/select2.min.js"></script>
    <!-- CUSTOM JS -->
    <script src="/public/assets/js/main.js?v=99"></script>

</body>
</html>