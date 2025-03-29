<?php

/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if (!defined('ABSPATH')) exit; ?>

<!-- CTAセクション -->
<section class="cta-section">
    <div class="container">
        <div class="cta-container">
            <h2 class="cta-title">AIを活用した<span>ウェブ開発</span>や<span>広告掲載</span>の<br>ご依頼はお気軽に！</h2>
            <p class="cta-description">
                ホームページ制作、AIツール開発、コンテンツ制作に加え、当サイトへの広告掲載も可能。<br>
                最新のAI技術で、あなたのビジネスの認知拡大から成果向上までトータルサポートします。
            </p>
            <div class="cta-buttons">
                <a href="<?php echo home_url('/contact'); ?>" class="btn">お仕事を依頼する</a>
                <a href="<?php echo home_url('/about'); ?>" class="btn btn-outline">当サイトについて</a>
            </div>
        </div>
    </div>
</section>
<!-- フッター -->
<footer>
    <div class="container">
        <div class="footer-grid">
            <div>
                <div class="footer-logo">AI<span>×</span>副業</div>
                <p class="footer-description">
                    AI×副業ポータルは、最新のAI技術を活用して副業の効率を向上させるための情報ポータルサイトです。厳選されたAIツールやノウハウを紹介しています。
                </p>
                <div class="footer-social">
                    <a href="#"><img src="<?php echo get_theme_file_uri('assets/images/common/youtube-brands.svg'); ?>" alt="YouTube" class="footer-social-icon youtube-icon"></a>
                    <a href="#"><img src="<?php echo get_theme_file_uri('assets/images/common/instagram-brands.svg'); ?>" alt="Instagram" class="footer-social-icon instagram-icon"></a>
                    <a href="#"><img src="<?php echo get_theme_file_uri('assets/images/common/twitter-brands.svg'); ?>" alt="Twitter" class="footer-social-icon twitter-icon"></a>
                    <a href="#"><img src="<?php echo get_theme_file_uri('assets/images/common/tiktok-brands.svg'); ?>" alt="TikTok" class="footer-social-icon tiktok-icon"></a>
                </div>
            </div>
            <div>
                <h3 class="footer-title">メニュー</h3>
                <ul class="footer-links">
                    <li><a href="<?php echo home_url(); ?>" <?php if (is_front_page()) echo 'class="active"'; ?>>ホーム</a></li>
                    <li><a href="<?php echo home_url('/#ai-tools-list'); ?>" <?php if (is_page('ai-tools')) echo 'class="active"'; ?>>AIツール</a></li>
                    <li><a href="<?php echo home_url('/column'); ?>" <?php if (is_home()) echo 'class="active"'; ?>>コラム</a></li>
                    <li><a href="<?php echo home_url('/about'); ?>" <?php if (is_page('about')) echo 'class="active"'; ?>>サイトについて</a></li>
                    <li><a href="<?php echo home_url('/contact'); ?>" <?php if (is_page('contact')) echo 'class="active"'; ?>>お問い合わせ</a></li>
                </ul>
            </div>
            <div>
                <h3 class="footer-title">カテゴリ</h3>
                <ul class="footer-links">
                    <li><a href="#">動画クリエイター</a></li>
                    <li><a href="#">プログラミング</a></li>
                    <li><a href="#">ライティング</a></li>
                    <li><a href="#">デザイン</a></li>
                    <li><a href="#">マーケティング</a></li>
                </ul>
            </div>
            <div>
                <h3 class="footer-title">サポート</h3>
                <ul class="footer-links">
                    <li><a href="#">お仕事の依頼</a></li>
                    <li><a href="#">利用規約</a></li>
                    <li><a href="#">プライバシーポリシー</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy; <?php echo date('Y'); ?> AI×副業ポータル All Rights Reserved.
        </div>
    </div>
</footer>

<!-- FontAwesomeの読み込み -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

</div><!-- #container -->

</body>

</html>