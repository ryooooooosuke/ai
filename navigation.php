<header>
    <div class="container">
        <div class="navbar">
            <a href="<?php echo home_url(); ?>" class="logo">AI<span>×</span>副業アカデミー</a>
            <div class="nav-menu">
                <a href="<?php echo home_url(); ?>" <?php if (is_home() || is_front_page()) echo 'class="active"'; ?>>ホーム</a>
                <a href="<?php echo home_url('/ai-tools'); ?>" <?php if (is_page('ai-tools')) echo 'class="active"'; ?>>AIツール</a>
                <a href="<?php echo home_url('/column'); ?>" <?php if (is_page('column')) echo 'class="active"'; ?>>コラム</a>
                <a href="<?php echo home_url('/about'); ?>" <?php if (is_page('about')) echo 'class="active"'; ?>>サイトについて</a>
                <a href="<?php echo home_url('/contact'); ?>" <?php if (is_page('contact')) echo 'class="active"'; ?>>お問い合わせ</a>
            </div>
            <div class="nav-buttons">
                <a href="<?php echo home_url('/login'); ?>" class="btn btn-outline">ログイン</a>
                <a href="<?php echo home_url('/register'); ?>" class="btn">会員登録</a>
            </div>
        </div>
    </div>
</header>