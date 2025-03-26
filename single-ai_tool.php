<?php

/**
 * Template Name: AI詳細
 * Template Post Type: ai_tool
 */

get_header();

// カスタムフィールドからデータを取得
$tool_url = get_post_meta(get_the_ID(), '_tool_url', true);
$rating = get_post_meta(get_the_ID(), '_tool_rating', true);
if (!$rating) $rating = 0;

// カテゴリーを取得
$categories = get_the_terms(get_the_ID(), 'ai_category');

// ギャラリー画像を取得
$gallery_images = get_post_meta(get_the_ID(), '_gallery_images', true);
if (!is_array($gallery_images)) {
    $gallery_images = array();
}

// アイキャッチ画像を取得
$thumbnail_id = get_post_thumbnail_id();
$thumbnail_url = wp_get_attachment_url($thumbnail_id);
if (!$thumbnail_url) {
    $thumbnail_url = get_theme_file_uri('assets/images/common/no-image.png');
}

// 料金プランを取得
$pricing_plans = get_post_meta(get_the_ID(), '_pricing_plans', true);
$has_free_plan = false;
if ($pricing_plans && is_array($pricing_plans)) {
    foreach ($pricing_plans as $tab) {
        if (isset($tab['details']) && is_array($tab['details'])) {
            foreach ($tab['details'] as $plan) {
                if (isset($plan['price']) && ($plan['price'] == '0' || $plan['price'] == '無料')) {
                    $has_free_plan = true;
                    break 2;
                }
            }
        }
    }
}

// 特徴を取得
$features = get_post_meta(get_the_ID(), '_features', true);

// ギャラリー画像を取得
$gallery_images = get_post_meta(get_the_ID(), '_gallery_images', true);
if (!is_array($gallery_images)) {
    $gallery_images = array();
} else {
    // 画像URLの配列に変換
    $gallery_image_urls = array();
    foreach ($gallery_images as $image_id) {
        if ($image_id) {
            $image_url = wp_get_attachment_url($image_id);
            if ($image_url) {
                $gallery_image_urls[] = $image_url;
            }
        }
    }
    $gallery_images = $gallery_image_urls;
}
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
        --main-dark: #3a6ea5;
        --main-light: #d0e1ff;
        --accent: #9cc0ff;
        --text: #2c3e50;
        --text-light: #647789;
        --bg: #ffffff;
        --bg-light: #f5f9ff;
        --bg-alt: #e9f2ff;
        --border: #d8e6ff;
        --shadow: 0 2px 10px rgba(107, 154, 222, 0.08);
        --radius: 12px;
        --form-shadow: 0 4px 15px rgba(107, 154, 222, 0.1);
        --success: #38a169;
        --warning: #e8b21e;
        --price-free: #38a169;
        --price-paid: #dd6b20;
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
        text-align: center;
    }

    .btn:hover {
        background-color: var(--main-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(170, 187, 204, 0.4);
    }

    .btn-lg {
        padding: 14px 28px;
        font-size: 16px;
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

    .btn-sm {
        padding: 8px 15px;
        font-size: 14px;
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
        align-items: center;
    }

    .user-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--main-light);
        color: var(--main-dark);
        font-weight: 600;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .user-avatar:hover {
        border-color: var(--main-color);
    }

    .user-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* パンくずリスト */
    .breadcrumb {
        display: flex;
        align-items: center;
        gap: 8px;
        margin: 20px 0;
        font-size: 14px;
        color: var(--text-light);
    }

    .breadcrumb a {
        color: var(--text-light);
    }

    .breadcrumb a:hover {
        color: var(--main-color);
    }

    .breadcrumb-separator {
        color: var(--text-light);
    }

    /* 商品詳細レイアウト */
    .product-detail-container {
        margin: 40px auto;
    }

    .product-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 25px;
    }

    .product-title-section {
        flex: 1;
    }

    .product-title {
        font-size: 32px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 15px;
    }

    .product-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 15px;
    }

    .product-tag {
        background-color: var(--main-light);
        color: var(--main-dark);
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .product-rating {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
    }

    .stars {
        color: #f8b84e;
        font-size: 16px;
        letter-spacing: -1px;
    }

    .rating-value {
        font-weight: 700;
        font-size: 16px;
        color: var(--text);
    }

    .rating-count {
        color: var(--text-light);
        font-size: 14px;
    }

    .product-actions {
        display: flex;
        gap: 15px;
        margin-top: 5px;
    }

    /* メディア・画像セクション */
    .product-media {
        width: 100%;
        border-radius: var(--radius);
        overflow: hidden;
        margin-bottom: 15px;
    }

    .product-media img {
        height: auto;
        border-radius: var(--radius);
        transition: transform 0.3s ease;
    }

    .product-thumbnails {
        display: flex;
        gap: 15px;
        margin-bottom: 25px;
    }

    .product-thumbnail {
        width: 80px;
        height: 80px;
        border-radius: 8px;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .product-thumbnail:hover {
        transform: translateY(-3px);
    }

    .product-thumbnail.active {
        border-color: var(--main-color);
    }

    .product-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* 商品詳細情報 */
    .product-info-container {
        background-color: var(--bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        overflow: hidden;
        border: 1px solid var(--border);
        position: sticky;
        top: 94px;
    }

    .product-info-header {
        padding: 20px 25px;
        border-bottom: 1px solid var(--border);
    }

    .product-pricing {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .product-price-free {
        display: inline-block;
        background-color: rgba(56, 161, 105, 0.1);
        color: var(--price-free);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .product-price-paid {
        display: inline-block;
        background-color: rgba(221, 107, 32, 0.1);
        color: var(--price-paid);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .price-amount {
        font-size: 28px;
        font-weight: 700;
        color: var(--text);
        margin-right: 5px;
    }

    .price-period {
        font-size: 16px;
        color: var(--text-light);
        font-weight: normal;
    }

    .price-plans {
        font-size: 14px;
        color: var(--text-light);
        margin-bottom: 10px;
    }

    .product-info-body {
        padding: 25px;
    }

    .info-list {
        list-style: none;
        margin-bottom: 25px;
    }

    .info-item {
        display: flex;
        margin-bottom: 12px;
        align-items: flex-start;
    }

    .info-icon {
        color: var(--main-color);
        margin-right: 12px;
        font-size: 16px;
        margin-top: 3px;
    }

    .info-text {
        flex: 1;
        font-size: 15px;
    }

    .product-cta {
        width: 100%;
        margin-bottom: 15px;
    }

    .product-cta-secondary {
        width: 100%;
    }

    /* 商品タブ */
    .product-tabs {
        margin-bottom: 40px;
    }

    .tab-nav {
        display: flex;
        border-bottom: 1px solid var(--border);
        margin-bottom: 25px;
    }

    .tab-item {
        padding: 12px 25px;
        cursor: pointer;
        font-weight: 600;
        color: var(--text-light);
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .tab-item:hover {
        color: var(--main-color);
    }

    .tab-item.active {
        color: var(--main-color);
        border-bottom-color: var(--main-color);
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .tab-section {
        margin-bottom: 30px;
    }

    .tab-section:last-child {
        margin-bottom: 0;
    }

    .tab-section-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 15px;
    }

    .tab-section-content {
        color: var(--text);
        font-size: 16px;
        line-height: 1.7;
    }

    .tab-section-content p {
        margin-bottom: 15px;
    }

    .tab-section-content ul,
    .tab-section-content ol {
        margin-left: 20px;
        margin-bottom: 15px;
    }

    .tab-section-content li {
        margin-bottom: 8px;
    }

    /* 機能リスト */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 25px;
    }

    .feature-card {
        background-color: var(--bg);
        border-radius: var(--radius);
        padding: 20px;
        border: 1px solid var(--border);
        transition: all 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow);
        border-color: var(--main-light);
    }

    .feature-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        background-color: var(--main-light);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
    }

    .feature-icon i {
        color: var(--main-color);
        font-size: 22px;
    }

    .feature-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 10px;
    }

    .feature-description {
        font-size: 14px;
        color: var(--text-light);
        line-height: 1.5;
    }

    /* 使い方 */
    .steps-list {
        counter-reset: step;
        margin-top: 25px;
    }

    .step-item {
        display: flex;
        margin-bottom: 30px;
        position: relative;
    }

    .step-number {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: var(--main-light);
        color: var(--main-dark);
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        flex-shrink: 0;
    }

    .step-content {
        flex: 1;
    }

    .step-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 8px;
    }

    .step-description {
        font-size: 15px;
        color: var(--text-light);
        line-height: 1.6;
    }

    /* レビュー */
    .review-summary {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--border);
    }

    .review-average {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .review-average-value {
        font-size: 48px;
        font-weight: 700;
        color: var(--text);
        line-height: 1;
        margin-bottom: 5px;
    }

    .review-stars {
        margin-bottom: 5px;
    }

    .review-count {
        font-size: 14px;
        color: var(--text-light);
    }

    .review-distribution {
        display: flex;
        flex-direction: column;
        gap: 10px;
        width: 60%;
    }

    .review-bar {
        display: flex;
        align-items: center;
    }

    .review-bar-label {
        font-size: 14px;
        width: 60px;
        color: var(--text-light);
    }

    .review-bar-track {
        flex: 1;
        height: 6px;
        background-color: #edf2f7;
        border-radius: 3px;
        overflow: hidden;
        margin: 0 15px;
    }

    .review-bar-fill {
        height: 100%;
        background-color: #f8b84e;
        border-radius: 3px;
    }

    .review-bar-percent {
        font-size: 14px;
        width: 40px;
        color: var(--text-light);
        text-align: right;
    }

    /* レビューリスト */
    .review-list {
        margin-top: 30px;
    }

    .review-item {
        padding: 20px 0;
        border-bottom: 1px solid var(--border);
    }

    .review-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .reviewer {
        display: flex;
        align-items: center;
    }

    .reviewer-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 12px;
        background-color: var(--main-light);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--main-dark);
        font-weight: 600;
        font-size: 16px;
    }

    .reviewer-info {
        display: flex;
        flex-direction: column;
    }

    .reviewer-name {
        font-weight: 600;
        color: var(--text);
        font-size: 15px;
    }

    .review-date {
        font-size: 13px;
        color: var(--text-light);
    }

    .review-rating {
        display: flex;
        align-items: center;
    }

    .review-text {
        font-size: 15px;
        color: var(--text);
        line-height: 1.6;
        margin-bottom: 10px;
    }

    .review-meta {
        display: flex;
        gap: 15px;
        font-size: 13px;
        color: var(--text-light);
    }

    .review-meta i {
        margin-right: 5px;
    }

    /* 関連記事カード */
    .article-card {
        background-color: var(--bg);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        margin-bottom: 20px;
        border: 1px solid var(--border);
        transition: all 0.3s ease;
    }

    .article-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.05);
        border-color: var(--main-light);
    }

    .article-image {
        height: 180px;
        overflow: hidden;
    }

    .article-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.4s ease;
    }

    .article-card:hover .article-image img {
        transform: scale(1.05);
    }

    .article-content {
        padding: 20px;
    }

    .article-meta {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 13px;
        color: var(--text-light);
    }

    .article-category {
        display: inline-block;
        background-color: var(--main-light);
        color: var(--main-dark);
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
    }

    .article-date {
        display: flex;
        align-items: center;
    }

    .article-date i {
        margin-right: 5px;
    }

    .article-title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 10px;
        color: var(--text);
        line-height: 1.4;
    }

    .article-excerpt {
        font-size: 14px;
        color: var(--text-light);
        margin-bottom: 15px;
        line-height: 1.6;
    }

    .article-read-more {
        font-size: 14px;
        font-weight: 600;
        color: var(--main-color);
        display: flex;
        align-items: center;
    }

    .article-read-more i {
        margin-left: 5px;
        transition: all 0.3s ease;
    }

    .article-read-more:hover i {
        transform: translateX(3px);
    }

    /* 料金プラン詳細 */
    .pricing-details {
        background-color: var(--bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        padding: 30px;
        margin-top: 30px;
    }

    .pricing-title {
        font-size: 22px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 20px;
    }

    .pricing-tabs {
        display: flex;
        gap: 15px;
        margin-bottom: 25px;
    }

    .pricing-tab {
        padding: 10px 20px;
        background-color: var(--bg-light);
        border-radius: 30px;
        font-size: 14px;
        font-weight: 600;
        color: var(--text-light);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .pricing-tab.active {
        background-color: var(--main-color);
        color: white;
    }

    .pricing-plans {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 25px;
    }

    .pricing-plan {
        background-color: var(--bg-light);
        border-radius: var(--radius);
        border: 1px solid var(--border);
        overflow: hidden;
        transition: all 0.3s ease;
        position: relative;
    }

    .pricing-plan:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow);
    }

    .pricing-plan.featured {
        border-color: var(--main-color);
        box-shadow: 0 5px 15px rgba(107, 154, 222, 0.2);
        transform: scale(1.03);
    }

    .pricing-plan.featured:hover {
        transform: scale(1.03) translateY(-5px);
    }

    .plan-label {
        position: absolute;
        top: 15px;
        right: 15px;
        background-color: var(--main-color);
        color: white;
        font-size: 12px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 20px;
    }

    .plan-header {
        padding: 25px;
        text-align: center;
        border-bottom: 1px solid var(--border);
    }

    .plan-name {
        font-size: 20px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 10px;
    }

    .plan-price {
        margin-bottom: 10px;
    }

    .plan-price .price-amount {
        font-size: 28px;
        font-weight: 700;
        color: var(--text);
    }

    .plan-price .price-period {
        font-size: 16px;
        color: var(--text-light);
    }

    .plan-description {
        font-size: 14px;
        color: var(--text-light);
    }

    .plan-features {
        padding: 25px;
    }

    .plan-feature {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .plan-feature:last-child {
        margin-bottom: 0;
    }

    .feature-icon-check {
        color: var(--success);
        margin-right: 10px;
        font-size: 14px;
        width: 16px;
    }

    .feature-icon-times {
        color: var(--text-light);
        margin-right: 10px;
        font-size: 14px;
        width: 16px;
    }

    .plan-feature.disabled {
        color: var(--text-light);
    }

    .plan-btn {
        display: block;
        margin: 0 25px 25px;
    }

    .pricing-note {
        font-size: 14px;
        color: var(--text-light);
        line-height: 1.5;
    }

    .pricing-note p {
        margin-bottom: 5px;
    }

    /* 料金切り替えトグル */
    .plan-toggle {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin: 20px 0;
    }

    .toggle-label {
        font-size: 14px;
        color: var(--text);
        font-weight: 500;
    }

    .discount-label {
        display: inline-block;
        background-color: rgba(56, 161, 105, 0.1);
        color: var(--success);
        font-size: 12px;
        padding: 2px 5px;
        border-radius: 4px;
        margin-left: 5px;
    }

    .monthly-yearly {
        width: 45px;
        height: 22px;
    }

    .monthly-yearly .toggle-slider:before {
        height: 16px;
        width: 16px;
        left: 3px;
        bottom: 3px;
    }

    .monthly-yearly input:checked+.toggle-slider:before {
        transform: translateX(23px);
    }

    /* 類似商品 */
    .similar-products {
        margin-top: 60px;
    }

    .section-title {
        font-size: 24px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 40px;
        position: relative;
        padding-left: 15px;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 25px;
    }

    .product-card {
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

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.05);
        border-color: var(--main-light);
    }

    .product-card-image {
        height: 250px;
        background-color: var(--bg-light);
        overflow: hidden;
    }

    .product-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.4s ease;
    }

    .product-card:hover .product-card-image img {
        transform: scale(1.05);
    }

    .product-card-content {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-card-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        margin-bottom: 10px;
    }

    .product-card-tag {
        background-color: var(--main-light);
        color: var(--main-dark);
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
    }

    .product-card-title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 10px;
        color: var(--text);
    }

    .product-card-description {
        color: var(--text-light);
        font-size: 14px;
        margin-bottom: 15px;
        flex-grow: 1;
    }

    .product-card-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
        border-top: 1px solid var(--border);
        padding-top: 15px;
    }

    .product-card-rating {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .product-card-stars {
        color: #f8b84e;
        font-size: 14px;
    }

    .product-card-rating-value {
        font-weight: 600;
        font-size: 14px;
        color: var(--text);
    }

    .product-card-price {
        font-weight: 600;
        font-size: 14px;
        padding: 3px 10px;
        border-radius: 4px;
    }

    .product-card-price.free {
        color: var(--price-free);
        background-color: rgba(56, 161, 105, 0.1);
    }

    .product-card-price.paid {
        color: var(--price-paid);
        background-color: rgba(221, 107, 32, 0.1);
    }

    /* FAQ */
    .faq-section {
        margin-top: 60px;
        margin-bottom: 80px;
    }

    .faq-list {
        margin-top: 25px;
    }

    .faq-item {
        margin-bottom: 15px;
        border: 1px solid var(--border);
        border-radius: var(--radius);
        background-color: var(--bg);
        overflow: hidden;
    }

    .faq-question {
        padding: 18px 25px;
        font-weight: 600;
        color: var(--text);
        cursor: pointer;
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.3s ease;
    }

    .faq-question:hover {
        background-color: var(--bg-light);
    }

    .faq-icon {
        font-size: 14px;
        color: var(--main-color);
        transition: transform 0.3s ease;
    }

    .faq-answer {
        padding: 0 25px;
        max-height: 0;
        overflow: hidden;
        transition: all 0.3s ease;
        color: var(--text-light);
        line-height: 1.6;
    }

    .faq-item.active .faq-question {
        background-color: var(--bg-light);
    }

    .faq-item.active .faq-icon {
        transform: rotate(180deg);
    }

    .faq-item.active .faq-answer {
        padding: 0 25px 20px;
        max-height: 1000px;
    }

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

    .related-tools-actions {
        margin-top: 30px;
        text-align: center;
    }

    /* サイドパネルのスタイル */
    .product-layout {
        display: flex;
        gap: 30px;
        margin-bottom: 30px;
    }

    .product-media-column {
        flex: 1;
        max-width: 60%;
    }

    .product-info-column {
        flex: 1;
        max-width: 50%;
    }

    .product-side-panel {
        background-color: var(--bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        overflow: hidden;
        height: 100%;
    }

    .panel-header {
        background-color: var(--main-light);
        padding: 15px 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 1px solid var(--border);
    }

    .panel-header i {
        color: var(--main-color);
        font-size: 18px;
    }

    .panel-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--text);
        margin: 0;
    }

    .panel-body {
        padding: 20px;
    }

    .panel-price-tag {
        margin-bottom: 20px;
    }

    .panel-actions {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 25px;
    }

    .panel-btn {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 12px 24px;
    }

    .panel-section-title {
        font-size: 16px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 15px;
    }

    .features-list {
        list-style: none;
        padding: 0;
        margin: 0 0 20px 0;
    }

    .feature-item {
        display: flex;
        gap: 10px;
        margin-bottom: 12px;
    }

    .feature-icon {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: var(--main-light);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .feature-icon i {
        color: var(--main-color);
        font-size: 12px;
    }

    .feature-text {
        font-size: 14px;
        color: var(--text);
    }

    .panel-link {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 14px;
        color: var(--main-color);
        font-weight: 500;
    }

    .panel-link i {
        font-size: 12px;
        transition: transform 0.3s ease;
    }

    .panel-link:hover i {
        transform: translateX(3px);
    }

    .plan-footer {
        text-align: center;
        margin-bottom: 20px;
    }

    /* レスポンシブ対応 */
    @media (max-width: 1024px) {
        .product-layout {
            flex-direction: column;
        }

        .product-media-column,
        .product-info-column {
            max-width: 100%;
        }

        .product-side-panel {
            margin-bottom: 30px;
        }

        .product-info-container {
            position: static;
            margin-bottom: 30px;
        }
    }

    @media (min-width: 768px) {
        .product-media {
            margin-left: 30px;
        }
    }


    @media (max-width: 991px) {
        .footer-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 768px) {
        .nav-menu {
            display: none;
        }

        .product-header {
            flex-direction: column;
        }

        .product-actions {
            margin-top: 20px;
        }

        .tab-nav {
            overflow-x: auto;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .tab-item {
            padding: 12px 15px;
        }

        .review-summary {
            flex-direction: column;
            gap: 20px;
            align-items: flex-start;
        }

        .review-distribution {
            width: 100%;
        }

        .features-grid,
        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        }

        .pricing-plans {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .panel-actions {
            flex-direction: column;
        }
    }

    @media (max-width: 576px) {
        .product-thumbnails {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .product-thumbnail {
            width: 100%;
            aspect-ratio: 1;
        }

        .features-grid,
        .products-grid {
            grid-template-columns: 1fr;
        }

        .product-title {
            font-size: 26px;
        }

        .tab-item {
            padding: 10px;
            font-size: 14px;
        }

        .footer-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .panel-header {
            padding: 12px 15px;
        }

        .panel-body {
            padding: 15px;
        }

        .panel-title {
            font-size: 16px;
        }
    }
</style>

<!-- メインコンテンツ -->
<main class="container product-detail-container">
    <!-- パンくずリスト -->
    <div class="breadcrumb">
        <a href="<?php echo home_url(); ?>">ホーム</a>
        <span class="breadcrumb-separator">/</span>
        <a href="<?php echo get_post_type_archive_link('ai_tool'); ?>">AIツール</a>
        <?php if ($categories && !is_wp_error($categories)) : ?>
            <span class="breadcrumb-separator">/</span>
            <a href="<?php echo get_term_link($categories[0]); ?>"><?php echo esc_html($categories[0]->name); ?></a>
        <?php endif; ?>
        <span class="breadcrumb-separator">/</span>
        <span><?php the_title(); ?></span>
    </div>

    <!-- 商品ヘッダー -->
    <div class="product-header">
        <div class="product-title-section">
            <h1 class="product-title"><?php the_title(); ?></h1>
            <div class="product-tags">
                <?php if ($categories && !is_wp_error($categories)) : ?>
                    <?php foreach ($categories as $category) : ?>
                        <span class="product-tag"><?php echo esc_html($category->name); ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="product-rating">
                <div class="stars">
                    <?php
                    $full_stars = floor($rating);
                    $half_star = ($rating - $full_stars) >= 0.5;
                    $empty_stars = 5 - $full_stars - ($half_star ? 1 : 0);

                    $stars = '';
                    for ($i = 0; $i < $full_stars; $i++) {
                        $stars .= '★';
                    }
                    if ($half_star) {
                        $stars .= '☆';
                    }
                    for ($i = 0; $i < $empty_stars; $i++) {
                        $stars .= '☆';
                    }
                    echo $stars;
                    ?>
                </div>
                <div class="rating-value"><?php echo number_format($rating, 1); ?></div>
                <div class="rating-count">おすすめ評価</div>
            </div>
        </div>
    </div>

    <!-- 商品メインコンテンツ -->
    <div class="product-main">
        <!-- 2カラムレイアウト -->
        <div class="product-layout">
            <!-- 左カラム：メイン画像とサムネイル -->
            <div class="product-media-column">
                <div class="product-media">
                    <?php
                    // ギャラリー画像があればメイン画像として最初の画像を表示
                    if (!empty($gallery_images) && isset($gallery_images[0])) {
                        $main_image_url = $gallery_images[0];
                    } else {
                        // ギャラリー画像がなければアイキャッチ画像を表示
                        $main_image_url = $thumbnail_url;
                    }
                    ?>
                    <img src="<?php echo esc_url($main_image_url); ?>" alt="<?php the_title_attribute(); ?>">
                </div>

                <?php if (!empty($gallery_images)) : ?>
                    <div class="product-thumbnails">
                        <?php
                        // メイン画像も含めてサムネイルとして表示
                        foreach ($gallery_images as $index => $image_url) :
                            if ($index < 4) : // 最大4枚のサムネイルを表示
                        ?>
                                <div class="product-thumbnail <?php echo ($index === 0) ? 'active' : ''; ?>" data-image="<?php echo esc_url($image_url); ?>">
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?> サムネイル <?php echo $index + 1; ?>">
                                </div>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- 右カラム：情報サイドパネル -->
            <div class="product-info-column">
                <div class="product-side-panel">
                    <div class="panel-header">
                        <i class="fas fa-info-circle"></i>
                        <h4 class="panel-title">ツール基本情報</h4>
                    </div>

                    <div class="panel-body">
                        <!-- 料金タグ -->
                        <div class="panel-price-tag">
                            <?php if ($has_free_plan) : ?>
                                <span class="product-price-free">無料/有料</span>
                            <?php else : ?>
                                <span class="product-price-paid">有料</span>
                            <?php endif; ?>
                        </div>

                        <!-- アクションボタン -->
                        <div class="panel-actions">
                            <?php if ($tool_url) : ?>
                                <a href="<?php echo esc_url($tool_url); ?>" class="btn panel-btn" target="_blank">
                                    <i class="fas fa-external-link-alt"></i> 公式サイトへ
                                </a>
                            <?php endif; ?>

                            <a href="#" class="btn btn-outline panel-btn favorite-btn" data-tool-id="<?php echo get_the_ID(); ?>">
                                <i class="far fa-heart"></i> お気に入り
                            </a>
                        </div>

                        <!-- 特徴リスト -->
                        <?php if (!empty($features) && is_array($features)) : ?>
                            <div class="product-features">
                                <h3 class="section-title">主な特徴</h3>
                                <ul class="features-list">
                                    <?php foreach ($features as $feature) : ?>
                                        <li class="feature-item">
                                            <span class="feature-icon"><i class="fas fa-check-circle"></i></span>
                                            <span class="feature-text"><?php echo esc_html($feature); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

        <!-- タブエリア -->
        <div class="product-tabs">
            <div class="tab-nav">
                <div class="tab-item active" data-tab="overview">概要</div>
                <?php if ($pricing_plans && is_array($pricing_plans) && !empty($pricing_plans)) : ?>
                    <div class="tab-item" data-tab="pricing">料金</div>
                <?php endif; ?>
                <div class="tab-item" data-tab="articles">関連コラム</div>
                <div class="tab-item" data-tab="related">関連AIツール</div>
            </div>

            <!-- 概要タブ -->
            <div class="tab-content active" id="overview">
                <div class="tab-section">
                    <div class="tab-section-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

            <!-- 料金タブ -->
            <?php if ($pricing_plans && is_array($pricing_plans) && !empty($pricing_plans)) : ?>
                <div class="tab-content" id="pricing">
                    <div class="tab-section">
                        <h3 class="tab-section-title">料金プラン</h3>

                        <?php if (count($pricing_plans) > 1) : ?>
                            <div class="pricing-tabs">
                                <?php foreach ($pricing_plans as $index => $tab) : ?>
                                    <div class="pricing-tab <?php echo $index === 0 ? 'active' : ''; ?>" data-plan="<?php echo esc_attr($tab['id'] ?? 'plan-' . $index); ?>">
                                        <?php echo esc_html($tab['tab_name']); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <?php if (isset($pricing_plans[0]['monthly']) && isset($pricing_plans[1]['yearly'])) : ?>
                                <div class="plan-toggle">
                                    <span class="toggle-label">月額</span>
                                    <label class="toggle-switch monthly-yearly">
                                        <input type="checkbox">
                                        <span class="toggle-slider"></span>
                                    </label>
                                    <span class="toggle-label">年額 <span class="discount-label">20%OFF</span></span>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <div class="pricing-plans">
                            <?php foreach ($pricing_plans as $index => $tab) : ?>
                                <?php if (isset($tab['details']) && is_array($tab['details'])) : ?>
                                    <?php foreach ($tab['details'] as $plan_index => $plan) : ?>
                                        <div class="pricing-plan <?php echo ($index === 0 && $plan_index === 1) ? 'popular' : ''; ?>">
                                            <?php if (($index === 0 && $plan_index === 1)) : ?>
                                                <div class="plan-badge">人気</div>
                                            <?php endif; ?>
                                            <div class="plan-header">
                                                <h4 class="plan-name"><?php echo esc_html($plan['name']); ?></h4>
                                                <div class="plan-price">
                                                    <?php if ($plan['price'] == '0' || $plan['price'] == '無料') : ?>
                                                        <span class="price-amount">無料</span>
                                                    <?php else : ?>
                                                        <span class="price-amount">¥<?php echo esc_html($plan['price']); ?></span>
                                                        <span class="price-period">/ <?php echo esc_html($plan['period'] ?? '月'); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                <p class="plan-description"><?php echo esc_html($plan['description'] ?? ''); ?></p>
                                            </div>
                                            <div class="plan-features">
                                                <ul>
                                                    <?php if (isset($plan['features']) && is_array($plan['features'])) : ?>
                                                        <?php foreach ($plan['features'] as $feature) : ?>
                                                            <li>
                                                                <i class="fas fa-check"></i>
                                                                <?php echo esc_html($feature); ?>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                            <div class="plan-footer">
                                                <a href="<?php echo esc_url($tool_url); ?>" class="btn btn-outline" target="_blank">詳細を見る</a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


            <!-- 関連コラムタブ -->
            <div class="tab-content" id="articles">
                <div class="tab-section">
                    <h3 class="tab-section-title">関連コラム</h3>

                    <?php
                    // カテゴリーIDを取得
                    $category_ids = array();
                    if ($categories && !is_wp_error($categories)) {
                        foreach ($categories as $category) {
                            $category_ids[] = $category->term_id;
                        }
                    }

                    // 関連コラムを取得
                    $related_posts = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'term_id',
                                'terms' => $category_ids,
                            ),
                        ),
                    ));

                    if ($related_posts->have_posts()) : ?>
                        <div class="articles-grid">
                            <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                                <div class="article-card">
                                    <a href="<?php the_permalink(); ?>" class="article-link">
                                        <div class="article-image">
                                            <?php
                                            // 投稿のサムネイルIDを取得
                                            $post_thumbnail_id = get_post_thumbnail_id();

                                            // サムネイルが設定されているか確認
                                            if ($post_thumbnail_id) :
                                                // サムネイルがある場合は表示
                                                the_post_thumbnail('medium');
                                            else :
                                                // サムネイルがない場合はno-image表示
                                            ?>
                                                <img src="<?php echo esc_url(get_theme_file_uri('assets/images/common/no-image.png')); ?>" alt="画像なし">
                                            <?php endif; ?>
                                        </div>
                                        <div class="article-content">
                                            <div class="article-meta">
                                                <span class="article-date"><?php echo get_the_date('Y年n月j日'); ?></span>
                                            </div>
                                            <h4 class="article-title"><?php the_title(); ?></h4>
                                            <div class="article-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 40); ?></div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>

                        <div class="articles-actions">
                            <a href="<?php echo home_url('/column/'); ?>" class="btn">コラム一覧を見る</a>
                        </div>
                    <?php else : ?>
                        <p>関連するコラムはまだありません。</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- 関連AIツールタブ -->
            <div class="tab-content" id="related">
                <div class="tab-section">
                    <h3 class="tab-section-title">関連AIツール</h3>

                    <?php
                    // 関連AIツールを取得
                    $related_tools = new WP_Query(array(
                        'post_type' => 'ai_tool',
                        'posts_per_page' => 4,
                        'post__not_in' => array(get_the_ID()),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'ai_category',
                                'field' => 'term_id',
                                'terms' => $category_ids,
                            ),
                        ),
                    ));

                    if ($related_tools->have_posts()) :
                    ?>
                        <div class="products-grid">
                            <?php while ($related_tools->have_posts()) : $related_tools->the_post();
                                // 関連ツールのデータを取得
                                $tool_rating = get_post_meta(get_the_ID(), '_tool_rating', true);
                                if (!$tool_rating) $tool_rating = 0;

                                $tool_pricing_plans = get_post_meta(get_the_ID(), '_pricing_plans', true);
                                $tool_has_free_plan = false;
                                if ($tool_pricing_plans && is_array($tool_pricing_plans)) {
                                    foreach ($tool_pricing_plans as $tab) {
                                        if (isset($tab['details']) && is_array($tab['details'])) {
                                            foreach ($tab['details'] as $plan) {
                                                if (isset($plan['price']) && ($plan['price'] == '0' || $plan['price'] == '無料')) {
                                                    $tool_has_free_plan = true;
                                                    break 2;
                                                }
                                            }
                                        }
                                    }
                                }

                                $tool_categories = get_the_terms(get_the_ID(), 'ai_category');
                                $tool_thumbnail_id = get_post_thumbnail_id();
                                $tool_thumbnail_url = wp_get_attachment_url($tool_thumbnail_id);
                                if (!$tool_thumbnail_url) {
                                    $tool_thumbnail_url = get_theme_file_uri('assets/images/common/no-image.png');
                                }
                            ?>
                                <div class="product-card">
                                    <a href="<?php the_permalink(); ?>" class="product-card-link">
                                        <div class="product-card-image">
                                            <img src="<?php echo esc_url($tool_thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
                                        </div>
                                        <div class="product-card-content">
                                            <div class="product-card-tags">
                                                <?php if ($tool_categories && !is_wp_error($tool_categories)) : ?>
                                                    <?php foreach (array_slice($tool_categories, 0, 2) as $category) : ?>
                                                        <span class="product-card-tag"><?php echo esc_html($category->name); ?></span>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                            <h3 class="product-card-title"><?php the_title(); ?></h3>
                                            <div class="product-card-description"><?php echo wp_trim_words(get_the_excerpt(), 40); ?></div>
                                            <div class="product-card-meta">
                                                <div class="product-card-rating">
                                                    <div class="stars">
                                                        <?php
                                                        $full_stars = floor($tool_rating);
                                                        $half_star = ($tool_rating - $full_stars) >= 0.5;
                                                        $empty_stars = 5 - $full_stars - ($half_star ? 1 : 0);

                                                        $stars = '';
                                                        for ($i = 0; $i < $full_stars; $i++) {
                                                            $stars .= '★';
                                                        }
                                                        if ($half_star) {
                                                            $stars .= '☆';
                                                        }
                                                        for ($i = 0; $i < $empty_stars; $i++) {
                                                            $stars .= '☆';
                                                        }
                                                        echo $stars;
                                                        ?>
                                                    </div>
                                                    <div class="product-card-rating-value"><?php echo number_format($tool_rating, 1); ?></div>
                                                </div>
                                                <div class="product-card-price <?php echo $tool_has_free_plan ? 'free' : 'paid'; ?>">
                                                    <?php echo $tool_has_free_plan ? '無料/有料' : '有料'; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>

                        <?php if (!empty($category_ids)) : ?>
                            <div class="related-tools-actions">
                                <a href="<?php echo get_term_link($categories[0]); ?>" class="btn"><?php echo esc_html($categories[0]->name); ?>AIツール一覧を見る</a>
                            </div>
                        <?php endif; ?>
                    <?php else : ?>
                        <p>関連するAIツールはまだありません。</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // タブ切り替え
        const tabItems = document.querySelectorAll('.tab-item');
        const tabContents = document.querySelectorAll('.tab-content');

        tabItems.forEach(item => {
            item.addEventListener('click', function() {
                // タブアイテムのアクティブ切り替え
                tabItems.forEach(tab => tab.classList.remove('active'));
                this.classList.add('active');

                // タブコンテンツのアクティブ切り替え
                const tabId = this.getAttribute('data-tab');
                tabContents.forEach(content => content.classList.remove('active'));
                document.getElementById(tabId).classList.add('active');
            });
        });

        // サムネイル画像切り替え
        const thumbnails = document.querySelectorAll('.product-thumbnail');
        const mainImage = document.querySelector('.product-media img');

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function() {
                // サムネイルのアクティブ状態切り替え
                thumbnails.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                // メイン画像の切り替え
                const newSrc = this.querySelector('img').src;
                mainImage.src = newSrc;
            });
        });

        // 料金プランタブ切り替え
        const pricingTabs = document.querySelectorAll('.pricing-tab');

        pricingTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // タブのアクティブ切り替え
                pricingTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // 月額/年額トグル切り替え
        const planToggle = document.querySelector('.plan-toggle input');
        if (planToggle) {
            planToggle.addEventListener('change', function() {
                if (this.checked) {
                    // 年額プラン表示
                    document.querySelector('.pricing-tab[data-plan="yearly"]')?.click();
                } else {
                    // 月額プラン表示
                    document.querySelector('.pricing-tab[data-plan="monthly"]')?.click();
                }
            });
        }

        // お気に入りボタン
        const favoriteBtn = document.querySelector('.favorite-btn');
        if (favoriteBtn) {
            const toolId = favoriteBtn.getAttribute('data-tool-id');

            // ローカルストレージからお気に入りを取得
            let favorites = localStorage.getItem('favorites') ?
                JSON.parse(localStorage.getItem('favorites')) : [];

            // 初期状態の設定
            if (favorites.includes(toolId)) {
                favoriteBtn.innerHTML = '<i class="fas fa-heart"></i> お気に入り済み';
                favoriteBtn.classList.add('favorited');
            }

            favoriteBtn.addEventListener('click', function(e) {
                e.preventDefault();

                const index = favorites.indexOf(toolId);
                if (index === -1) {
                    // お気に入りに追加
                    favorites.push(toolId);
                    this.innerHTML = '<i class="fas fa-heart"></i> お気に入り済み';
                    this.classList.add('favorited');
                } else {
                    // お気に入りから削除
                    favorites.splice(index, 1);
                    this.innerHTML = '<i class="far fa-heart"></i> お気に入り';
                    this.classList.remove('favorited');
                }

                localStorage.setItem('favorites', JSON.stringify(favorites));
            });
        }

        // サイドパネルからタブへのスムーススクロール
        const panelLinks = document.querySelectorAll('.panel-link');

        panelLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetTab = targetId.replace('#', '');
                const targetElement = document.getElementById(targetTab);

                // タブをアクティブにする
                document.querySelectorAll('.tab-item').forEach(tab => {
                    tab.classList.remove('active');
                    if (tab.getAttribute('data-tab') === targetTab) {
                        tab.classList.add('active');
                    }
                });

                // タブコンテンツをアクティブにする
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });
                targetElement.classList.add('active');

                // スクロール
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: 'smooth'
                });
            });
        });

        // ライトボックス機能
        const galleryLinks = document.querySelectorAll('.lightbox');
        if (galleryLinks.length > 0) {
            galleryLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const imgSrc = this.getAttribute('href');

                    // ライトボックス要素を作成
                    const lightbox = document.createElement('div');
                    lightbox.className = 'lightbox-overlay';
                    lightbox.innerHTML = `
                        <div class="lightbox-container">
                            <img src="${imgSrc}" alt="拡大画像">
                            <button class="lightbox-close">&times;</button>
                        </div>
                    `;

                    // ライトボックスを表示
                    document.body.appendChild(lightbox);
                    document.body.style.overflow = 'hidden';

                    // 閉じるボタンのイベント
                    lightbox.querySelector('.lightbox-close').addEventListener('click', function() {
                        document.body.removeChild(lightbox);
                        document.body.style.overflow = '';
                    });

                    // 背景クリックでも閉じる
                    lightbox.addEventListener('click', function(e) {
                        if (e.target === lightbox) {
                            document.body.removeChild(lightbox);
                            document.body.style.overflow = '';
                        }
                    });
                });
            });

            // ライトボックススタイル
            const lightboxStyle = document.createElement('style');
            lightboxStyle.textContent = `
                .lightbox-overlay {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.9);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 9999;
                }

                .lightbox-container {
                    position: relative;
                    max-width: 90%;
                    max-height: 90%;
                }

                .lightbox-container img {
                    max-width: 100%;
                    max-height: 90vh;
                    display: block;
                }

                .lightbox-close {
                    position: absolute;
                    top: -40px;
                    right: 0;
                    background: none;
                    border: none;
                    color: white;
                    font-size: 30px;
                    cursor: pointer;
                }
            `;
            document.head.appendChild(lightboxStyle);
        }
    });
</script>