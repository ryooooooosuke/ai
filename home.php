<?php

/**
 * Template Name: コラム一覧
 * Template Post Type: page
 */

get_header();
?>


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

    a:hover {
        color: var(--main-dark);
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

    .nav-menu a:hover,
    .nav-menu a.active {
        color: var(--main-color);
    }

    .nav-menu a:hover::after,
    .nav-menu a.active::after {
        width: 100%;
    }

    .nav-buttons {
        display: flex;
        gap: 15px;
    }

    /* ページヘッダー */
    .page-header {
        background-color: var(--bg);
        padding: 60px 0;
        text-align: center;
        position: relative;
        border-bottom: 1px solid var(--border);
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: var(--main-light);
        opacity: 0.15;
        z-index: 0;
    }

    .page-header-content {
        position: relative;
        z-index: 1;
    }

    .page-title {
        font-size: 36px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 15px;
    }

    .page-title span {
        color: var(--main-color);
    }

    .page-description {
        max-width: 700px;
        margin: 0 auto;
        color: var(--text-light);
        font-size: 17px;
        line-height: 1.7;
    }

    /* パンくずリスト */
    .breadcrumb {
        background-color: var(--bg-light);
        padding: 15px 0;
        border-bottom: 1px solid var(--border);
    }

    .breadcrumb-list {
        display: flex;
        align-items: center;
        list-style: none;
        font-size: 14px;
    }

    .breadcrumb-item {
        display: flex;
        align-items: center;
    }

    .breadcrumb-item:not(:last-child)::after {
        content: '/';
        margin: 0 10px;
        color: var(--text-light);
    }

    .breadcrumb-item a {
        color: var(--text-light);
    }

    .breadcrumb-item a:hover {
        color: var(--main-color);
    }

    .breadcrumb-item.active {
        color: var(--main-color);
        font-weight: 600;
    }

    /* フィルターとソート */
    .filter-section {
        background-color: var(--bg-alt);
        padding: 25px 0;
        border-bottom: 1px solid var(--border);
    }

    .filter-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-between;
        align-items: center;
    }

    .filter-left {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .filter-right {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .filter-label {
        font-weight: 600;
        color: var(--text);
        font-size: 14px;
    }

    .filter-select {
        padding: 8px 16px;
        border-radius: 8px;
        border: 1px solid var(--border);
        background-color: var(--bg);
        color: var(--text);
        font-size: 14px;
        min-width: 150px;
    }

    .original-search-box {
        display: flex;
        max-width: 300px;
        box-shadow: var(--shadow);
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid var(--border);
    }

    .search-input {
        flex: 1;
        padding: 8px 16px;
        border: none;
        background-color: var(--bg);
        color: var(--text);
        font-size: 14px;
    }

    .search-input:focus {
        outline: none;
    }

    .search-button {
        background-color: var(--main-color);
        color: white;
        border: none;
        padding: 0 16px;
        cursor: pointer;
        font-weight: 600;
    }

    .search-button:hover {
        background-color: var(--main-dark);
    }

    .category-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 20px;
    }

    .category-pill {
        display: inline-block;
        padding: 6px 14px;
        background-color: var(--bg);
        color: var(--text);
        border-radius: 30px;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.3s ease;
        border: 1px solid var(--border);
    }

    .category-pill:hover {
        background-color: var(--main-light);
        color: var(--main-dark);
        border-color: var(--main-light);
    }

    .category-pill.active {
        background-color: var(--main-color);
        color: white;
        border-color: var(--main-color);
    }

    /* コラム一覧 */
    .columns-section {
        padding: 50px 0;
    }

    .columns-heading {
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .columns-title {
        font-size: 24px;
        font-weight: 700;
        color: var(--text);
    }

    .columns-count {
        color: var(--main-color);
        font-weight: 600;
    }

    .columns-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 30px;
        margin-bottom: 50px;
    }

    .column-card {
        background-color: var(--bg);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: all 0.3s ease;
        border: 1px solid var(--border);
        display: flex;
        flex-direction: column;
    }

    .column-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.05);
        border-color: var(--main-light);
    }

    .column-image {
        width: 100%;
        height: 200px;
        overflow: hidden;
        position: relative;
    }

    .column-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.4s ease;
    }

    .column-card:hover .column-image img {
        transform: scale(1.05);
    }

    .column-category {
        position: absolute;
        top: 15px;
        left: 15px;
        background-color: var(--main-color);
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        z-index: 1;
    }

    .column-content {
        padding: 25px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .column-meta {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        color: var(--text-light);
        font-size: 13px;
    }

    .column-date {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .column-author {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .column-author-avatar {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: var(--main-light);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        font-weight: 600;
        color: var(--main-dark);
    }

    .column-title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 12px;
        color: var(--text);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.4;
    }

    .column-description {
        color: var(--text-light);
        font-size: 14px;
        margin-bottom: 20px;
        flex-grow: 1;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.6;
    }

    .column-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 20px;
    }

    .column-tag {
        font-size: 12px;
        color: var(--main-dark);
        background-color: var(--main-light);
        padding: 3px 8px;
        border-radius: 4px;
    }

    .read-more {
        align-self: flex-start;
        color: var(--main-color);
        font-weight: 600;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .read-more:hover {
        color: var(--main-dark);
    }

    .read-more:after {
        content: '→';
        transition: transform 0.3s ease;
    }

    .read-more:hover:after {
        transform: translateX(3px);
    }

    /* おすすめコラム */
    .featured-column {
        background-color: var(--bg);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        margin-bottom: 50px;
        display: flex;
        flex-direction: column;
    }

    @media (min-width: 768px) {
        .featured-column {
            flex-direction: row;
            align-items: stretch;
            max-height: 400px;
        }

        .featured-column-image {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    .featured-column-image {
        height: 250px;
        overflow: hidden;
    }

    .featured-column-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .featured-column-content {
        padding: 35px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .featured-label {
        display: inline-block;
        background-color: var(--main-light);
        color: var(--main-dark);
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .featured-column-title {
        font-size: 24px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 15px;
        line-height: 1.4;
    }

    .featured-column-description {
        color: var(--text-light);
        margin-bottom: 25px;
        font-size: 16px;
        line-height: 1.6;
    }

    .featured-column-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: var(--text-light);
        font-size: 14px;
        margin-bottom: 20px;
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

    /* CTA */
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

    /* レスポンシブ対応 */
    @media (max-width: 991px) {
        .columns-grid {
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        }

        .footer-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 768px) {
        .nav-menu {
            display: none;
        }

        .page-title {
            font-size: 30px;
        }

        .filter-container {
            flex-direction: column;
            align-items: flex-start;
        }

        .filter-right {
            width: 100%;
        }

        .original-search-box {
            max-width: 100%;
            width: 100%;

        }

        .featured-column-content {
            padding: 25px;
        }

        .cta-buttons {
            flex-direction: column;
        }

        .cta-buttons .btn {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .columns-grid {
            grid-template-columns: 1fr;
        }

        .columns-heading {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
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
</style>


<!-- パンくずリスト -->
<div class="breadcrumb">
    <div class="container">
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item"><a href="#">ホーム</a></li>
            <li class="breadcrumb-item active">コラム</li>
        </ul>
    </div>
</div>

<!-- ページヘッダー -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h1 class="page-title">AI副業<span>コラム</span></h1>
            <p class="page-description">AIツールを使った副業のノウハウや最新情報、成功事例などを配信しています。副業のスキルアップや効率化に役立つ情報を定期的に更新中！</p>
        </div>
    </div>
</section>

<!-- フィルターセクション -->
<section class="filter-section">
    <div class="container">
        <div class="filter-container">
            <div class="filter-left">
                <div>
                    <span class="filter-label">カテゴリー</span>
                    <select class="filter-select">
                        <option value="all">すべてのカテゴリー</option>
                        <option value="beginner">初心者向け</option>
                        <option value="intermediate">中級者向け</option>
                        <option value="advanced">上級者向け</option>
                        <option value="case-study">事例紹介</option>
                        <option value="tool-review">ツールレビュー</option>
                    </select>
                </div>
                <div>
                    <span class="filter-label">並び替え</span>
                    <select class="filter-select">
                        <option value="newest">新着順</option>
                        <option value="popular">人気順</option>
                        <option value="view">閲覧数順</option>
                    </select>
                </div>
            </div>
            <div class="filter-right">
                <div class="original-search-box">
                    <input type="text" class="search-input" placeholder="キーワードで検索...">
                    <button class="search-button">検索</button>
                </div>
            </div>
        </div>
        <div class="category-pills">
            <a href="#" class="category-pill active">すべて</a>
            <a href="#" class="category-pill">AI活用法</a>
            <a href="#" class="category-pill">動画クリエイター</a>
            <a href="#" class="category-pill">ライティング</a>
            <a href="#" class="category-pill">プログラミング</a>
            <a href="#" class="category-pill">デザイン</a>
            <a href="#" class="category-pill">マーケティング</a>
            <a href="#" class="category-pill">収益化</a>
            <a href="#" class="category-pill">効率化</a>
            <a href="#" class="category-pill">副業立ち上げ</a>
        </div>
    </div>
</section>

<!-- コラム一覧 -->
<section class="columns-section">
    <div class="container">
        <!-- おすすめコラム -->
        <h2 class="section-title">ピックアップコラム</h2>
        <p class="section-subtitle">特におすすめの記事をピックアップしています</p>

        <div class="featured-column">
            <div class="featured-column-image">
                <img src="/api/placeholder/600/400" alt="AIにキャリアを奪われる？未来に備える3つの戦略">
            </div>
            <div class="featured-column-content">
                <span class="featured-label">特集記事</span>
                <h3 class="featured-column-title">AIにキャリアを奪われる？未来に備える3つの戦略</h3>
                <div class="featured-column-meta">
                    <div class="column-date">2025年2月28日</div>
                    <div class="column-author">
                        <div class="column-author-avatar">S</div>
                        佐藤 健太
                    </div>
                </div>
                <p class="featured-column-description">
                    進化し続けるAI技術は、多くの職種に影響を与えています。AIにキャリアを奪われる不安を抱えている方も多いでしょう。本記事では、AIと共存しながらキャリアを発展させるための具体的な3つの戦略を紹介します。AI時代に生き残るためのスキルとマインドセットを身につけましょう。
                </p>
                <a href="#" class="read-more">続きを読む</a>
            </div>
        </div>

        <!-- 最新コラム -->
        <div class="columns-heading">
            <h2 class="columns-title">最新コラム <span class="columns-count">全53件</span></h2>
        </div>

        <div class="columns-grid">
            <!-- コラムカード 1 -->
            <div class="column-card">
                <div class="column-image">
                    <div class="column-category">AI活用法</div>
                    <img src="/api/placeholder/400/300" alt="AIライティングツールで副業収入を倍増させる方法">
                </div>
                <div class="column-content">
                    <div class="column-meta">
                        <div class="column-date">2025年2月15日</div>
                        <div class="column-author">
                            <div class="column-author-avatar">T</div>
                            田中 一郎
                        </div>
                    </div>
                    <h3 class="column-title">AIライティングツールで副業収入を倍増させる方法</h3>
                    <p class="column-description">AIライティングツールを活用して記事制作の効率を上げ、月5万円の副収入を目指す方法を解説します。ツールの選び方から具体的な運用方法まで、初心者でも実践できるノウハウを紹介。</p>
                    <div class="column-tags">
                        <span class="column-tag">初心者向け</span>
                        <span class="column-tag">ライティング</span>
                        <span class="column-tag">収益化</span>
                    </div>
                    <a href="#" class="read-more">続きを読む</a>
                </div>
            </div>

            <!-- コラムカード 2 -->
            <div class="column-card">
                <div class="column-image">
                    <div class="column-category">プログラミング</div>
                    <img src="/api/placeholder/400/300" alt="AIプログラミングアシスタントでコーディング時間を半減する技術">
                </div>
                <div class="column-content">
                    <div class="column-meta">
                        <div class="column-date">2025年2月10日</div>
                        <div class="column-author">
                            <div class="column-author-avatar">Y</div>
                            山田 太郎
                        </div>
                    </div>
                    <h3 class="column-title">AIプログラミングアシスタントでコーディング時間を半減する技術</h3>
                    <p class="column-description">最新のAIプログラミングアシスタントを使いこなして、開発作業を効率化し単価アップする方法を紹介します。プロンプトの書き方や効果的な活用シーンなど、実践的なテクニックを解説。</p>
                    <div class="column-tags">
                        <span class="column-tag">中級者向け</span>
                        <span class="column-tag">効率化</span>
                        <span class="column-tag">スキルアップ</span>
                    </div>
                    <a href="#" class="read-more">続きを読む</a>
                </div>
            </div>

            <!-- コラムカード 3 -->
            <div class="column-card">
                <div class="column-image">
                    <div class="column-category">マーケティング</div>
                    <img src="/api/placeholder/400/300" alt="AIを活用したSNSマーケティングで顧客獲得率を3倍にした事例">
                </div>
                <div class="column-content">
                    <div class="column-meta">
                        <div class="column-date">2025年2月5日</div>
                        <div class="column-author">
                            <div class="column-author-avatar">K</div>
                            木村 真理
                        </div>
                    </div>
                    <h3 class="column-title">AIを活用したSNSマーケティングで顧客獲得率を3倍にした事例</h3>
                    <p class="column-description">AIツールを活用してSNSマーケティングを自動化・最適化し、顧客獲得率を大幅に向上させた実践事例を解説します。具体的な戦略とツールの組み合わせ方など、応用可能なノウハウを紹介。</p>
                    <div class="column-tags">
                        <span class="column-tag">上級者向け</span>
                        <span class="column-tag">事例紹介</span>
                        <span class="column-tag">マーケティング</span>
                    </div>
                    <a href="#" class="read-more">続きを読む</a>
                </div>
            </div>

            <!-- コラムカード 4 -->
            <div class="column-card">
                <div class="column-image">
                    <div class="column-category">動画クリエイター</div>
                    <img src="/api/placeholder/400/300" alt="AI動画編集ツールで月100万円稼ぐYouTuberの制作フロー公開">
                </div>
                <div class="column-content">
                    <div class="column-meta">
                        <div class="column-date">2025年1月28日</div>
                        <div class="column-author">
                            <div class="column-author-avatar">N</div>
                            中村 健
                        </div>
                    </div>
                    <h3 class="column-title">AI動画編集ツールで月100万円稼ぐYouTuberの制作フロー公開</h3>
                    <p class="column-description">登録者10万人のYouTuberが実際に使っているAI動画編集ツールと制作フローを大公開。企画から撮影、編集、公開までの効率化のコツと収益化のポイントを詳しく解説します。</p>
                    <div class="column-tags">
                        <span class="column-tag">事例紹介</span>
                        <span class="column-tag">動画編集</span>
                        <span class="column-tag">収益化</span>
                    </div>
                    <a href="#" class="read-more">続きを読む</a>
                </div>
            </div>

            <!-- コラムカード 5 -->
            <div class="column-card">
                <div class="column-image">
                    <div class="column-category">デザイン</div>
                    <img src="/api/placeholder/400/300" alt="AIデザインツールを使ったロゴ制作で副業を始める方法">
                </div>
                <div class="column-content">
                    <div class="column-meta">
                        <div class="column-date">2025年1月20日</div>
                        <div class="column-author">
                            <div class="column-author-avatar">M</div>
                            松本 さくら
                        </div>
                    </div>
                    <h3 class="column-title">AIデザインツールを使ったロゴ制作で副業を始める方法</h3>
                    <p class="column-description">デザインスキルがなくてもAIツールを活用して高品質なロゴを制作し、副業として収益化する方法を紹介。クライアント獲得のコツや価格設定など、0からビジネスを立ち上げるノウハウを解説。</p>
                    <div class="column-tags">
                        <span class="column-tag">初心者向け</span>
                        <span class="column-tag">副業立ち上げ</span>
                        <span class="column-tag">デザイン</span>
                    </div>
                    <a href="#" class="read-more">続きを読む</a>
                </div>
            </div>

            <!-- コラムカード 6 -->
            <div class="column-card">
                <div class="column-image">
                    <div class="column-category">ツールレビュー</div>
                    <img src="/api/placeholder/400/300" alt="2025年版：副業に役立つAIツール10選を徹底比較">
                </div>
                <div class="column-content">
                    <div class="column-meta">
                        <div class="column-date">2025年1月15日</div>
                        <div class="column-author">
                            <div class="column-author-avatar">S</div>
                            鈴木 健太
                        </div>
                    </div>
                    <h3 class="column-title">2025年版：副業に役立つAIツール10選を徹底比較</h3>
                    <p class="column-description">副業を効率化・高品質化できる最新AIツールを10個厳選して比較レビュー。それぞれの特徴や料金、使い勝手など実際に使用してわかったメリット・デメリットを包み隠さず紹介します。</p>
                    <div class="column-tags">
                        <span class="column-tag">ツールレビュー</span>
                        <span class="column-tag">比較</span>
                        <span class="column-tag">2025年最新</span>
                    </div>
                    <a href="#" class="read-more">続きを読む</a>
                </div>
            </div>

            <!-- コラムカード 7 -->
            <div class="column-card">
                <div class="column-image">
                    <div class="column-category">初心者向け</div>
                    <img src="/api/placeholder/400/300" alt="AI副業を始める前に知っておくべき5つのこと">
                </div>
                <div class="column-content">
                    <div class="column-meta">
                        <div class="column-date">2025年1月10日</div>
                        <div class="column-author">
                            <div class="column-author-avatar">H</div>
                            林 優子
                        </div>
                    </div>
                    <h3 class="column-title">AI副業を始める前に知っておくべき5つのこと</h3>
                    <p class="column-description">AI技術を活用した副業を始める前に理解しておくべき重要なポイントを解説。失敗しないための心構えや準備、知識などをAI副業歴3年の筆者が経験を元に詳しく紹介します。</p>
                    <div class="column-tags">
                        <span class="column-tag">初心者向け</span>
                        <span class="column-tag">副業入門</span>
                        <span class="column-tag">基礎知識</span>
                    </div>
                    <a href="#" class="read-more">続きを読む</a>
                </div>
            </div>

            <!-- コラムカード 8 -->
            <div class="column-card">
                <div class="column-image">
                    <div class="column-category">ライティング</div>
                    <img src="/api/placeholder/400/300" alt="AIと人間のコラボレーション：高品質な記事制作の新しいワークフロー">
                </div>
                <div class="column-content">
                    <div class="column-meta">
                        <div class="column-date">2025年1月5日</div>
                        <div class="column-author">
                            <div class="column-author-avatar">A</div>
                            相田 真紀
                        </div>
                    </div>
                    <h3 class="column-title">AIと人間のコラボレーション：高品質な記事制作の新しいワークフロー</h3>
                    <p class="column-description">AIツールに頼りすぎず、かといって使わないのももったいない。AIと人間の強みを活かした最適なライティングワークフローを紹介。SEOにも強い質の高い記事を効率的に生産する方法を解説します。</p>
                    <div class="column-tags">
                        <span class="column-tag">中級者向け</span>
                        <span class="column-tag">ライティング</span>
                        <span class="column-tag">ワークフロー</span>
                    </div>
                    <a href="#" class="read-more">続きを読む</a>
                </div>
            </div>

            <!-- コラムカード 9 -->
            <div class="column-card">
                <div class="column-image">
                    <div class="column-category">収益化</div>
                    <img src="/api/placeholder/400/300" alt="AIを活用した複数の収入源を構築する実践ガイド">
                </div>
                <div class="column-content">
                    <div class="column-meta">
                        <div class="column-date">2024年12月28日</div>
                        <div class="column-author">
                            <div class="column-author-avatar">K</div>
                            小林 隆
                        </div>
                    </div>
                    <h3 class="column-title">AIを活用した複数の収入源を構築する実践ガイド</h3>
                    <p class="column-description">一つの副業だけでなく、AIを活用して複数の収入源を効率的に構築・運用する方法を解説。リスク分散と収益最大化のための具体的な戦略と実践例を紹介します。</p>
                    <div class="column-tags">
                        <span class="column-tag">上級者向け</span>
                        <span class="column-tag">収益多角化</span>
                        <span class="column-tag">戦略</span>
                    </div>
                    <a href="#" class="read-more">続きを読む</a>
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
                <a href="#" class="page-link">6</a>
            </div>
            <div class="page-item">
                <a href="#" class="page-link page-next">次へ</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>