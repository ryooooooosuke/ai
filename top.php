<?php
/*
Template Name: TOP
*/
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI×副業ポータル - AIツールで副業効率化</title>
    <style>
        /* リセットとベーススタイル */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Hiragino Sans', 'Hiragino Kaku Gothic ProN', 'Noto Sans JP', sans-serif;
        }

        :root {
            --main-color: #6b9ade;
            /* メインカラー - 落ち着いた中間の青 */
            --main-dark: #3a6ea5;
            /* メインカラーの暗め版 - アクセントや重要な要素に */
            --main-light: #d0e1ff;
            /* メインカラーの明るい版 - 背景などに */
            --accent: #9cc0ff;
            /* アクセントカラー - 補助的な強調に */
            --text: #2c3e50;
            /* 本文テキスト - 読みやすい暗めの色 */
            --text-light: #647789;
            /* 補助テキスト - サブテキストや説明文に */
            --bg: #ffffff;
            /* メイン背景色 - 白 */
            --bg-light: #f5f9ff;
            /* 明るい背景色 - 微かな青みがかった白 */
            --bg-alt: #e9f2ff;
            /* 代替背景色 - 薄い青 */
            --border: #d8e6ff;
            /* 境界線 - 優しい青みの境界線 */
            --shadow: 0 2px 10px rgba(107, 154, 222, 0.08);
            /* 影 - 青みがかった影 */
            --radius: 12px;
            /* 角丸の半径 */
        }

        body {
            background-color: var(--bg-light);
            color: var(--text);
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: var(--main-color);
            transition: all 0.3s ease;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn {
            display: inline-block;
            background-color: var(--main-color);
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(170, 187, 204, 0.3);
        }

        .btn:hover {
            background-color: var(--main-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(170, 187, 204, 0.4);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--main-color);
            color: var(--main-color);
            box-shadow: none;
            text-align: center;
        }

        .btn-outline:hover {
            background-color: var(--main-color);
            color: white;
        }

        .section {
            padding: 70px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
            font-size: 32px;
            font-weight: 700;
            position: relative;
            color: var(--text);
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: var(--main-color);
            border-radius: 1.5px;
        }

        .section-subtitle {
            text-align: center;
            color: var(--text-light);
            margin-bottom: 35px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            font-size: 17px;
        }

        /* ヘッダースタイル */
        header {
            background-color: var(--bg);
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 0;
        }

        .logo {
            font-size: 26px;
            font-weight: 700;
            color: var(--text);
        }

        .logo span {
            color: var(--main-color);
        }

        .nav-menu {
            display: flex;
            gap: 35px;
        }

        .nav-menu a {
            color: var(--text);
            font-weight: 500;
            position: relative;
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: var(--main-color);
            bottom: -4px;
            left: 0;
            transition: width 0.3s ease;
        }

        .nav-menu a:hover {
            color: var(--main-color);
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
        }

        /* ヒーローセクション */
        .hero {
            padding: 80px 0 60px;
            background-color: var(--bg);
        }

        .hero-container {
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .hero-content {
            flex: 1;
        }

        .hero-title {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
            color: var(--text);
        }

        .hero-title span {
            color: var(--main-color);
        }

        .hero-description {
            color: var(--text-light);
            margin-bottom: 35px;
            font-size: 18px;
            line-height: 1.6;
        }

        .hero-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 35px;
        }

        .hero-stats {
            display: flex;
            gap: 35px;
            padding: 25px 30px;
            background-color: var(--bg-light);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
        }

        .hero-stat {
            text-align: center;
        }

        .hero-stat-number {
            font-size: 32px;
            font-weight: 700;
            color: var(--main-color);
            margin-bottom: 5px;
        }

        .hero-stat-label {
            color: var(--text-light);
            font-size: 14px;
        }

        .hero-image {
            flex: 1;
        }

        .hero-image img {
            width: 100%;
            transition: all 0.3s ease;
        }

        /* カテゴリーセクション */
        .categories {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 30px;
        }

        .category-card {
            background-color: var(--bg);
            border-radius: var(--radius);
            padding: 30px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            border: 1px solid var(--border);
            display: flex;
            flex-direction: column;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.05);
            border-color: var(--main-color);
        }

        .category-icon {
            font-size: 45px;
            margin-bottom: 20px;
            text-align: center;
        }

        .category-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 12px;
            color: var(--text);
            text-align: center;
        }

        .category-count {
            display: inline-block;
            background-color: var(--main-light);
            color: var(--main-dark);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .category-description {
            color: var(--text-light);
            font-size: 15px;
            margin-bottom: 25px;
            flex-grow: 1;
        }

        /* AIツール一覧セクション */
        .ai-tools {
            background-color: var(--bg-alt);
            padding: 70px 0;
        }

        .tools-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background-color: var(--bg);
            padding: 20px 25px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
        }

        .tools-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--text);
        }

        .tools-filter {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .tools-filter-label {
            font-weight: 600;
            color: var(--text);
        }

        .tools-filter-select {
            padding: 8px 15px;
            border-radius: 8px;
            border: 1px solid var(--border);
            background-color: var(--bg-light);
            color: var(--text);
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .tools-filter-select:focus {
            outline: none;
            border-color: var(--main-color);
        }

        .search-box {
            display: flex;
            margin-bottom: 30px;
            box-shadow: var(--shadow);
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid var(--border);
        }

        .search-input {
            flex: 1;
            padding: 12px 20px;
            border: none;
            background-color: var(--bg);
            color: var(--text);
            font-size: 15px;
        }

        .search-input:focus {
            outline: none;
        }

        .search-button {
            background-color: var(--main-color);
            color: white;
            border: none;
            padding: 0 25px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .search-button:hover {
            background-color: var(--main-dark);
        }

        .tools-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .tool-card {
            background-color: var(--bg);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            border: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .tool-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.05);
            border-color: var(--main-light);
        }

        .tool-image {
            height: 170px;
            background-color: var(--bg-light);
            overflow: hidden;
        }

        .tool-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.4s ease;
        }

        .tool-card:hover .tool-image img {
            transform: scale(1.05);
        }

        .tool-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .tool-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 12px;
        }

        .tool-tag {
            background-color: var(--main-light);
            color: var(--main-dark);
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .tool-title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--text);
        }

        .tool-description {
            color: var(--text-light);
            font-size: 14px;
            margin-bottom: 20px;
            flex-grow: 1;
            line-height: 1.5;
        }

        .tool-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            border-top: 1px solid var(--border);
            padding-top: 15px;
        }

        .tool-rating {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .stars {
            color: #f8b84e;
            font-size: 14px;
        }

        .rating-value {
            font-weight: 600;
            font-size: 14px;
            color: var(--text);
        }

        .tool-price {
            font-weight: 600;
            font-size: 14px;
            padding: 4px 10px;
            border-radius: 6px;
        }

        .tool-price.free {
            color: #38a169;
            background-color: rgba(56, 161, 105, 0.1);
        }

        .tool-price.paid {
            color: #dd6b20;
            background-color: rgba(221, 107, 32, 0.1);
        }

        /* ページネーション */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 40px;
        }

        .page-item {
            display: inline-block;
        }

        .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 8px;
            background-color: var(--bg);
            color: var(--text);
            font-weight: 600;
            transition: all 0.3s ease;
            border: 1px solid var(--border);
        }

        .page-link:hover {
            background-color: var(--main-light);
            color: var(--main-dark);
            border-color: var(--main-light);
        }

        .page-item.active .page-link {
            background-color: var(--main-color);
            color: white;
            border-color: var(--main-color);
        }

        .page-item.disabled .page-link {
            color: #cbd5e0;
            cursor: not-allowed;
            background-color: var(--bg-light);
        }

        .page-prev,
        .page-next {
            width: auto;
            padding: 0 15px;
        }

        /* フッター */
        footer {
            background-color: var(--bg);
            padding: 70px 0 20px;
            border-top: 1px solid var(--border);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 15px;
        }

        .footer-logo span {
            color: var(--main-color);
        }

        .footer-description {
            color: var(--text-light);
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.6;
        }

        .footer-social {
            display: flex;
            gap: 15px;
        }

        .footer-social a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background-color: var(--main-light);
            color: var(--main-dark);
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .footer-social a:hover {
            background-color: var(--main-color);
            color: white;
            transform: translateY(-3px);
        }

        .footer-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--text);
            position: relative;
            display: inline-block;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 30px;
            height: 2px;
            background-color: var(--main-color);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: var(--text-light);
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--main-color);
            padding-left: 5px;
        }

        .copyright {
            text-align: center;
            color: var(--text-light);
            font-size: 14px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
        }

        /* CTAセクション */
        .cta-section {
            background-color: var(--main-light);
            padding: 70px 0;
        }

        .cta-container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            background-color: var(--bg);
            padding: 50px;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
        }

        .cta-title {
            font-size: 32px;
            margin-bottom: 20px;
            color: var(--text);
        }

        .cta-title span {
            color: var(--main-color);
        }

        .cta-description {
            font-size: 17px;
            color: var(--text-light);
            margin-bottom: 30px;
            line-height: 1.7;
        }

        .cta-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        /* レスポンシブ対応 */
        @media (max-width: 991px) {
            .hero-container {
                flex-direction: column;
            }

            .hero-image {
                order: -1;
                margin-bottom: 40px;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .tools-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .tools-filter {
                flex-wrap: wrap;
                width: 100%;
            }

            .tools-filter-select {
                flex: 1;
            }

            .hero-stats {
                flex-direction: column;
                gap: 20px;
                align-items: center;
            }

            .hero-stat {
                width: 100%;
                padding: 10px 0;
                border-bottom: 1px solid var(--border);
            }

            .hero-stat:last-child {
                border-bottom: none;
            }

            .cta-buttons {
                flex-direction: column;
                width: 100%;
            }

            .cta-buttons .btn {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .section-title {
                font-size: 26px;
            }

            .hero-title {
                font-size: 32px;
            }

            .hero-buttons {
                flex-direction: column;
                width: 100%;
            }

            .hero-buttons .btn {
                width: 100%;
                text-align: center;
            }

            .pagination {
                flex-wrap: wrap;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .cta-container {
                padding: 30px 20px;
            }
        }


        /* カテゴリセクション */
        .category-nav {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
            padding: 0 15px;
        }

        .category-icon-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .category-icon-item:hover {
            transform: translateY(-5px);
        }

        .category-icon-box {
            width: 76px;
            height: 76px;
            border: 1px solid var(--main-color);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 8px;
            transition: all 0.3s ease;
        }

        .category-icon-box img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }

        .category-icon-text {
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
            text-align: center;
            margin: 0;
        }

        /* レスポンシブ対応 */
        @media (max-width: 768px) {
            .category-nav {
                gap: 15px;
            }
        }

        @media (max-width: 576px) {
            .category-nav {
                gap: 10px;
            }

            .category-icon-box {
                width: 65px;
                height: 65px;
            }

            .category-icon-box img {
                width: 38px;
                height: 38px;
            }

            .category-icon-text {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <!-- ヘッダー -->
    <header>
        <div class="container">
            <div class="navbar">
                <a href="#" class="logo">AI<span>×</span>副業アカデミー</a>
                <div class="nav-menu">
                    <a href="#">ホーム</a>
                    <a href="#">AIツール</a>
                    <a href="#">コラム</a>
                    <a href="#">サイトについて</a>
                    <a href="#">お問い合わせ</a>
                </div>
                <div class="nav-buttons">
                    <a href="#" class="btn btn-outline">ログイン</a>
                    <a href="#" class="btn">会員登録</a>
                </div>
            </div>
        </div>
    </header>

    <!-- ヒーローセクション -->
    <section class="hero">
        <div class="container">
            <div class="hero-container">
                <div class="hero-content">
                    <h1 class="hero-title">AIで<span>副業</span>をもっと効率的に、もっと収益的に</h1>
                    <p class="hero-description">最新のAI技術で副業の効率を劇的に向上。時間を節約し、クオリティを高め、収入を最大化しましょう。</p>
                    <div class="hero-buttons">
                        <a href="#" class="btn">AIツールを探す</a>
                        <a href="#" class="btn btn-outline">使い方ガイド</a>
                    </div>
                    <!-- <div class="hero-stats">
                        <div class="hero-stat">
                            <div class="hero-stat-number">250+</div>
                            <div class="hero-stat-label">厳選AIツール</div>
                        </div>
                        <div class="hero-stat">
                            <div class="hero-stat-number">20,000+</div>
                            <div class="hero-stat-label">ユーザー</div>
                        </div>
                        <div class="hero-stat">
                            <div class="hero-stat-number">40+</div>
                            <div class="hero-stat-label">専門教材</div>
                        </div>
                    </div> -->
                </div>
                <div class="hero-image">
                    <img src="<?php echo get_theme_file_uri('assets/images/common/header-img2.png'); ?>" alt="AI副業">

                </div>
            </div>
        </div>
    </section>

    <!-- カテゴリセクション -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">副業カテゴリから探す</h2>
            <p class="section-subtitle">あなたの副業スタイルに合わせた最適なAIツールをカテゴリから見つけることができます</p>

            <div class="category-nav">
                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">完全無料</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon2.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">ログイン不要</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">ブログ・SEO</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">画像生成</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">動画生成</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">AIアバター</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">音楽</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">資料生成</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">開発</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">もっと見る</p>
                </a>
                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">完全無料</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">ログイン不要</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">ブログ・SEO</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">画像生成</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">動画生成</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">AIアバター</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">音楽</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">資料生成</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">開発</p>
                </a>

                <a href="#" class="category-icon-item">
                    <div class="category-icon-box">
                        <img src="<?php echo get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg'); ?>" alt="完全無料">
                    </div>
                    <p class="category-icon-text">もっと見る</p>
                </a>
            </div>
        </div>
    </section>

    <!-- AIツール一覧セクション -->
    <section class="ai-tools">
        <div class="container">
            <h2 class="section-title">生成AI一覧</h2>
            <p class="section-subtitle">副業に役立つ厳選された生成AIツールを紹介。作業効率を高め、クオリティを向上させよう</p>

            <div class="tools-header">
                <h3 class="tools-title">全300件の生成AIツール</h3>
                <div class="tools-filter">
                    <span class="tools-filter-label">表示:</span>
                    <select class="tools-filter-select">
                        <option value="all">すべてのカテゴリ</option>
                        <option value="video">動画クリエイター</option>
                        <option value="programming">プログラミング</option>
                        <option value="writing">ライティング</option>
                        <option value="design">デザイン</option>
                    </select>
                    <select class="tools-filter-select">
                        <option value="popular">人気順</option>
                        <option value="newest">新着順</option>
                        <option value="rating">評価順</option>
                    </select>
                </div>
            </div>

            <div class="search-box">
                <input type="text" class="search-input" placeholder="キーワードでAIツールを検索...">
                <button class="search-button">検索</button>
            </div>

            <div class="tools-grid">
                <!-- ツールカード 1 -->
                <div class="tool-card">
                    <div class="tool-image">
                        <img src="/api/placeholder/400/160" alt="AIツール画像">
                    </div>
                    <div class="tool-content">
                        <div class="tool-tags">
                            <span class="tool-tag">ライティング</span>
                            <span class="tool-tag">SEO</span>
                        </div>
                        <h3 class="tool-title">ContentGenius AI</h3>
                        <p class="tool-description">SEO対応のブログ記事やWebコンテンツを自動生成。キーワード最適化機能付きで検索上位表示を実現します。</p>
                        <div class="tool-meta">
                            <div class="tool-rating">
                                <span class="stars">★★★★★</span>
                                <span class="rating-value">4.9</span>
                            </div>
                            <div class="tool-price paid">¥2,980/月〜</div>
                        </div>
                    </div>
                </div>

                <!-- ツールカード 2 -->
                <div class="tool-card">
                    <div class="tool-image">
                        <img src="/api/placeholder/400/160" alt="AIツール画像">
                    </div>
                    <div class="tool-content">
                        <div class="tool-tags">
                            <span class="tool-tag">動画編集</span>
                            <span class="tool-tag">字幕生成</span>
                        </div>
                        <h3 class="tool-title">VideoWizard AI</h3>
                        <p class="tool-description">動画の自動編集、字幕生成、背景除去など多機能な動画編集支援ツール。作業時間を最大70%削減。</p>
                        <div class="tool-meta">
                            <div class="tool-rating">
                                <span class="stars">★★★★☆</span>
                                <span class="rating-value">4.7</span>
                            </div>
                            <div class="tool-price paid">¥3,500/月〜</div>
                        </div>
                    </div>
                </div>

                <!-- ツールカード 3 -->
                <div class="tool-card">
                    <div class="tool-image">
                        <img src="/api/placeholder/400/160" alt="AIツール画像">
                    </div>
                    <div class="tool-content">
                        <div class="tool-tags">
                            <span class="tool-tag">プログラミング</span>
                            <span class="tool-tag">コード生成</span>
                        </div>
                        <h3 class="tool-title">CodeCompanion AI</h3>
                        <p class="tool-description">コード生成、バグ修正、最適化をサポート。自然言語での指示からコードを生成し、開発効率を向上。</p>
                        <div class="tool-meta">
                            <div class="tool-rating">
                                <span class="stars">★★★★★</span>
                                <span class="rating-value">4.8</span>
                            </div>
                            <div class="tool-price free">無料プランあり</div>
                        </div>
                    </div>
                </div>

                <!-- ツールカード 4 -->
                <div class="tool-card">
                    <div class="tool-image">
                        <img src="/api/placeholder/400/160" alt="AIツール画像">
                    </div>
                    <div class="tool-content">
                        <div class="tool-tags">
                            <span class="tool-tag">デザイン</span>
                            <span class="tool-tag">画像生成</span>
                        </div>
                        <h3 class="tool-title">DesignMaster AI</h3>
                        <p class="tool-description">テキスト入力からロゴ、バナー、SNS画像などを自動生成。デザインの知識がなくても美しいビジュアルを作成。</p>
                        <div class="tool-meta">
                            <div class="tool-rating">
                                <span class="stars">★★★★☆</span>
                                <span class="rating-value">4.5</span>
                            </div>
                            <div class="tool-price paid">¥1,980/月〜</div>
                        </div>
                    </div>
                </div>

                <!-- ツールカード 5 -->
                <div class="tool-card">
                    <div class="tool-image">
                        <img src="/api/placeholder/400/160" alt="AIツール画像">
                    </div>
                    <div class="tool-content">
                        <div class="tool-tags">
                            <span class="tool-tag">音声</span>
                            <span class="tool-tag">ナレーション</span>
                        </div>
                        <h3 class="tool-title">VoiceGenius AI</h3>
                        <p class="tool-description">自然な音声でナレーションを生成。動画やポッドキャストの音声を簡単に作成できるAIツールです。</p>
                        <div class="tool-meta">
                            <div class="tool-rating">
                                <span class="stars">★★★★☆</span>
                                <span class="rating-value">4.6</span>
                            </div>
                            <div class="tool-price free">無料プランあり</div>
                        </div>
                    </div>
                </div>

                <!-- ツールカード 6 -->
                <div class="tool-card">
                    <div class="tool-image">
                        <img src="/api/placeholder/400/160" alt="AIツール画像">
                    </div>
                    <div class="tool-content">
                        <div class="tool-tags">
                            <span class="tool-tag">翻訳</span>
                            <span class="tool-tag">多言語対応</span>
                        </div>
                        <h3 class="tool-title">TranslatorPro AI</h3>
                        <p class="tool-description">高精度な自動翻訳ツール。40ヶ国語以上対応で、ビジネス文書、ウェブサイト、SNSの投稿などをネイティブレベルで翻訳。</p>
                        <div class="tool-meta">
                            <div class="tool-rating">
                                <span class="stars">★★★★☆</span>
                                <span class="rating-value">4.4</span>
                            </div>
                            <div class="tool-price paid">¥1,500/月〜</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ページネーション -->
            <div class="pagination">
                <div class="page-item disabled">
                    <a href="#" class="page-link page-prev">前へ</a>
                </div>
                <div class="page-item active">
                    <a href="#" class="page-link">1</a>
                </div>
                <div class="page-item">
                    <a href="#" class="page-link">2</a>
                </div>
                <div class="page-item">
                    <a href="#" class="page-link">3</a>
                </div>
                <div class="page-item">
                    <a href="#" class="page-link">4</a>
                </div>
                <div class="page-item">
                    <a href="#" class="page-link">5</a>
                </div>
                <div class="page-item">
                    <a href="#" class="page-link page-next">次へ</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 新着コラムセクション -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">新着コラム</h2>
            <p class="section-subtitle">副業とAIに関する最新の情報やノウハウを専門家が解説します</p>
            <div class="tools-grid">
                <!-- コラムカード 1 -->
                <div class="tool-card">
                    <div class="tool-image">
                        <img src="/api/placeholder/400/160" alt="コラム画像">
                    </div>
                    <div class="tool-content">
                        <div class="tool-tags">
                            <span class="tool-tag">初心者向け</span>
                            <span class="tool-tag">AIツール活用法</span>
                        </div>
                        <h3 class="tool-title">AIライティングツールで副業収入を倍増させる方法</h3>
                        <p class="tool-description">AIライティングツールを活用して記事制作の効率を上げ、月5万円の副収入を目指す方法を解説します。</p>
                        <div class="tool-meta">
                            <div class="tool-rating">
                                <span>2025年2月15日</span>
                            </div>
                            <div class="tool-price">
                                <a href="#">続きを読む</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- コラムカード 2 -->
                <div class="tool-card">
                    <div class="tool-image">
                        <img src="/api/placeholder/400/160" alt="コラム画像">
                    </div>
                    <div class="tool-content">
                        <div class="tool-tags">
                            <span class="tool-tag">中級者向け</span>
                            <span class="tool-tag">効率化</span>
                        </div>
                        <h3 class="tool-title">AIプログラミングアシスタントでコーディング時間を半減する技術</h3>
                        <p class="tool-description">最新のAIプログラミングアシスタントを使いこなして、開発作業を効率化し単価アップする方法を紹介します。</p>
                        <div class="tool-meta">
                            <div class="tool-rating">
                                <span>2025年2月10日</span>
                            </div>
                            <div class="tool-price">
                                <a href="#">続きを読む</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- コラムカード 3 -->
                <div class="tool-card">
                    <div class="tool-image">
                        <img src="/api/placeholder/400/160" alt="コラム画像">
                    </div>
                    <div class="tool-content">
                        <div class="tool-tags">
                            <span class="tool-tag">上級者向け</span>
                            <span class="tool-tag">マーケティング</span>
                        </div>
                        <h3 class="tool-title">AIを活用したSNSマーケティングで顧客獲得率を3倍にした事例</h3>
                        <p class="tool-description">AIツールを活用してSNSマーケティングを自動化・最適化し、顧客獲得率を大幅に向上させた実践事例を解説します。</p>
                        <div class="tool-meta">
                            <div class="tool-rating">
                                <span>2025年2月5日</span>
                            </div>
                            <div class="tool-price">
                                <a href="#">続きを読む</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="text-align: center; margin-top: 40px;">
                <a href="#" class="btn">もっと見る</a>
            </div>
        </div>
    </section>

    <!-- CTAセクション -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-container">
                <h2 class="cta-title">AI時代の副業で<span>収入の柱</span>を作りませんか？</h2>
                <p class="cta-description">
                    AI×副業ポータルでは、最新のAIツールと活用法を学べます。<br>
                    あなたの副業をもっと効率的に、もっと収益的にするためのノウハウを無料で公開中！
                </p>
                <div class="cta-buttons">
                    <a href="#" class="btn">無料会員登録する</a>
                    <a href="#" class="btn btn-outline">もっと詳しく</a>
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
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div>
                    <h3 class="footer-title">メニュー</h3>
                    <ul class="footer-links">
                        <li><a href="#">ホーム</a></li>
                        <li><a href="#">AIツール一覧</a></li>
                        <li><a href="#">カテゴリ</a></li>
                        <li><a href="#">コラム</a></li>
                        <li><a href="#">教材</a></li>
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
                        <li><a href="#">よくある質問</a></li>
                        <li><a href="#">お問い合わせ</a></li>
                        <li><a href="#">利用規約</a></li>
                        <li><a href="#">プライバシーポリシー</a></li>
                        <li><a href="#">運営会社</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                &copy; 2025 AI×副業ポータル All Rights Reserved.
            </div>
        </div>
    </footer>

    <!-- FontAwesomeの読み込み -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>