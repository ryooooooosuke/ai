<header>
    <div class="container">
        <div class="navbar">
            <h1><a href="<?php echo home_url(); ?>" class="logo"><span>AIツール</span>アカデミー</a></h1>

            <!-- ハンバーガーメニューのボタン（スマホのみ表示） -->
            <div class="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <!-- 通常のナビゲーションメニュー -->
            <div class="nav-menu">
                <a href="<?php echo home_url(); ?>" <?php if (is_front_page()) echo 'class="active"'; ?>>ホーム</a>
                <a href="<?php echo home_url('/#ai-tools-list'); ?>" <?php if (is_page('ai-tools')) echo 'class="active"'; ?>>AIツール</a>
                <a href="<?php echo home_url('/column'); ?>" <?php if (is_home()) echo 'class="active"'; ?>>コラム</a>
                <a href="<?php echo home_url('/about'); ?>" <?php if (is_page('about')) echo 'class="active"'; ?>>サイトについて</a>
                <a href="<?php echo home_url('/contact'); ?>" <?php if (is_page('contact')) echo 'class="active"'; ?>>お問い合わせ</a>
            </div>

            <!-- PC用のログイン・会員登録ボタン -->
            <div class="nav-buttons">
                <a href="<?php echo home_url('/login'); ?>" class="btn btn-outline">ログイン</a>
                <a href="<?php echo home_url('/register'); ?>" class="btn">会員登録</a>
            </div>
        </div>
    </div>

    <!-- モーダルナビゲーション（スマホ用） -->
    <div class="modal-nav">
        <div class="modal-nav-content">
            <div class="modal-nav-header">
                <a href="<?php echo home_url(); ?>" class="logo">AIツール<span>×</span>アカデミー</a>
                <div class="modal-close">
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="modal-nav-menu">
                <a href="<?php echo home_url(); ?>" <?php if (is_front_page()) echo 'class="active"'; ?>>ホーム</a>
                <a href="<?php echo home_url('/#ai-tools-list'); ?>" <?php if (is_page('ai-tools')) echo 'class="active"'; ?>>AIツール</a>
                <a href="<?php echo home_url('/column'); ?>" <?php if (is_home()) echo 'class="active"'; ?>>コラム</a>
                <a href="<?php echo home_url('/about'); ?>" <?php if (is_page('about')) echo 'class="active"'; ?>>サイトについて</a>
                <a href="<?php echo home_url('/contact'); ?>" <?php if (is_page('contact')) echo 'class="active"'; ?>>お問い合わせ</a>
            </div>

            <!-- モバイル用のログイン・会員登録ボタン -->
            <div class="modal-nav-buttons">
                <a href="<?php echo home_url('/login'); ?>" class="btn btn-outline">ログイン</a>
                <a href="<?php echo home_url('/register'); ?>" class="btn">会員登録</a>
            </div>
        </div>
    </div>
</header>

<!-- CSS（head内に追加） -->
<style>
    /* ハンバーガーメニュー */
    .hamburger-menu {
        display: none;
        flex-direction: column;
        justify-content: space-between;
        width: 30px;
        height: 21px;
        cursor: pointer;
        z-index: 1001;
    }

    .hamburger-menu span {
        display: block;
        height: 3px;
        width: 100%;
        background-color: var(--text);
        border-radius: 3px;
        transition: all 0.3s ease;
    }

    /* モーダルナビゲーション */
    .modal-nav {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 2000;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .modal-nav.active {
        opacity: 1;
        visibility: visible;
    }

    .modal-nav-content {
        width: 90%;
        max-width: 420px;
        max-height: 80vh;
        background-color: var(--bg);
        border-radius: var(--radius);
        overflow-y: auto;
        padding: 25px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
        transform: translateY(-30px);
        transition: transform 0.4s ease;
    }

    .modal-nav.active .modal-nav-content {
        transform: translateY(0);
    }

    .modal-nav-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--border);
    }

    .modal-close {
        position: relative;
        width: 30px;
        height: 30px;
        cursor: pointer;
    }

    .modal-close span {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        height: 3px;
        background-color: var(--text);
        border-radius: 3px;
    }

    .modal-close span:first-child {
        transform: rotate(45deg);
    }

    .modal-close span:last-child {
        transform: rotate(-45deg);
    }

    .modal-nav-menu {
        display: flex;
        flex-direction: column;
        margin-bottom: 30px;
    }

    .modal-nav-menu a {
        padding: 15px 0;
        color: var(--text);
        font-weight: 600;
        font-size: 18px;
        border-bottom: 1px solid var(--border);
        transition: all 0.3s ease;
    }

    .modal-nav-menu a:hover,
    .modal-nav-menu a.active {
        color: var(--main-color);
        padding-left: 10px;
    }

    .modal-nav-buttons {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .modal-nav-buttons .btn {
        width: 100%;
        text-align: center;
    }

    /* モバイル表示の設定 */
    @media (max-width: 768px) {

        /* ハンバーガーメニューを表示 */
        .hamburger-menu {
            display: flex;
        }

        /* PC用ナビメニューを非表示 */
        .nav-menu {
            display: none;
        }

        /* PC用ボタンを非表示 */
        .nav-buttons {
            display: none;
        }
    }
</style>

<!-- JavaScript（body閉じタグ前に追加） -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // 要素の取得
        const hamburger = document.querySelector('.hamburger-menu');
        const modalNav = document.querySelector('.modal-nav');
        const modalClose = document.querySelector('.modal-close');
        const body = document.body;

        // ハンバーガーメニューのクリックイベント
        hamburger.addEventListener('click', function() {
            modalNav.classList.add('active');
            body.style.overflow = 'hidden'; // スクロール防止
        });

        // 閉じるボタンのクリックイベント
        modalClose.addEventListener('click', function() {
            modalNav.classList.remove('active');
            body.style.overflow = ''; // スクロール再開
        });

        // モーダル外のクリックで閉じる
        modalNav.addEventListener('click', function(e) {
            if (e.target === modalNav) {
                modalNav.classList.remove('active');
                body.style.overflow = '';
            }
        });

        // モーダル内のリンクをクリック時にモーダルを閉じる
        const modalLinks = document.querySelectorAll('.modal-nav-menu a');
        modalLinks.forEach(link => {
            link.addEventListener('click', function() {
                modalNav.classList.remove('active');
                body.style.overflow = '';
            });
        });

        // ESCキーでも閉じられるように
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modalNav.classList.contains('active')) {
                modalNav.classList.remove('active');
                body.style.overflow = '';
            }
        });
    });
</script>