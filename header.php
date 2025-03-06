<?php

/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if (!defined('ABSPATH')) exit; ?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="referrer" content="<?php echo apply_filters('cocoon_meta_referrer_content', get_meta_referrer_content()); ?>">
    <meta name="format-detection" content="telephone=no">

    <?php //ヘッドタグ内挿入用のアクセス解析用テンプレート
    cocoon_template_part('tmp/head-analytics'); ?>
    <?php //AMPの案内タグを出力
    if (has_amp_page()): ?>
        <link rel="amphtml" href="<?php echo get_amp_permalink(); ?>">
    <?php endif ?>
    <?php //Google Search Consoleのサイト認証IDの表示
    if (get_google_search_console_id()): ?>
        <!-- Google Search Console -->
        <meta name="google-site-verification" content="<?php echo get_google_search_console_id() ?>" />
        <!-- /Google Search Console -->
    <?php endif; //Google Search Console終了
    ?>
    <?php //preconnect dns-prefetch
    $domains = list_text_to_array(get_pre_acquisition_list());
    if ($domains) {
        echo '<!-- preconnect dns-prefetch -->' . PHP_EOL;
    }
    foreach ($domains as $domain): ?>
        <link rel="preconnect dns-prefetch" href="//<?php echo $domain; ?>">
    <?php endforeach; ?>

    <!-- Preload -->
    <link rel="preload" as="font" type="font/woff" href="<?php echo FONT_ICOMOON_WOFF_URL; ?>" crossorigin>
    <?php if (is_site_icon_font_font_awesome_4()): ?>
        <link rel="preload" as="font" type="font/woff2" href="<?php echo FONT_AWESOME_4_WOFF2_URL; ?>" crossorigin>
    <?php else: ?>
        <link rel="preload" as="font" type="font/woff2" href="<?php echo FONT_AWESOME_5_BRANDS_WOFF2_URL; ?>" crossorigin>
        <link rel="preload" as="font" type="font/woff2" href="<?php echo FONT_AWESOME_5_REGULAR_WOFF2_URL; ?>" crossorigin>
        <link rel="preload" as="font" type="font/woff2" href="<?php echo FONT_AWESOME_5_SOLID_WOFF2_URL; ?>" crossorigin>
    <?php endif; ?>
    <?php //WordPressが出力するヘッダー情報
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
    remove_action('wp_head', 'wp_print_styles', 8);
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    wp_head();
    ?>

    <?php //カスタムフィールドの挿入（カスタムフィールド名：head_custom
    cocoon_template_part('tmp/head-custom-field'); ?>

    <?php //headで読み込む必要があるJavaScript
    cocoon_template_part('tmp/head-javascript'); ?>

    <?php //PWAスクリプト
    cocoon_template_part('tmp/head-pwa'); ?>

    <?php //ヘッドタグ内挿入用のユーザー用テンプレート
    cocoon_template_part('tmp-user/head-insert'); ?>

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

        .top-search-box {
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
    <?php get_template_part('navigation'); ?>