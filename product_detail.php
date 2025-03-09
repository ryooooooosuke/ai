<?php

/**
 * Template Name:AI詳細
 */
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MidJourney - AIツール詳細 | AI×副業ポータル</title>
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
            width: 100%;
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
            margin-bottom: 25px;
            position: relative;
            padding-left: 15px;
        }

        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 24px;
            background-color: var(--main-color);
            border-radius: 2px;
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
            height: 160px;
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

        /* レスポンシブ対応 */
        @media (max-width: 1024px) {


            .product-info-container {
                position: static;
                margin-bottom: 30px;
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
                    <div class="user-avatar">
                        <span>A</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- メインコンテンツ -->
    <main class="container product-detail-container">
        <!-- パンくずリスト -->
        <div class="breadcrumb">
            <a href="#">ホーム</a>
            <span class="breadcrumb-separator">/</span>
            <a href="#">AIツール</a>
            <span class="breadcrumb-separator">/</span>
            <a href="#">画像生成</a>
            <span class="breadcrumb-separator">/</span>
            <span>MidJourney</span>
        </div>

        <!-- 商品ヘッダー -->
        <div class="product-header">
            <div class="product-title-section">
                <h1 class="product-title">MidJourney</h1>
                <div class="product-tags">
                    <span class="product-tag">画像生成</span>
                    <span class="product-tag">AIアート</span>
                    <span class="product-tag">デザイン</span>
                </div>
                <div class="product-rating">
                    <div class="stars">★★★★★</div>
                    <div class="rating-value">4.9</div>
                    <div class="rating-count">おすすめ評価</div>
                </div>
            </div>
            <div class="product-actions">
                <a href="#" class="btn btn-outline btn-sm">
                    <i class="far fa-heart"></i> お気に入り
                </a>
                <a href="#" class="btn btn-outline btn-sm">
                    <i class="far fa-share-square"></i> 公式サイトへ
                </a>
            </div>
        </div>

        <!-- 商品メインコンテンツ -->
        <!-- 左側：画像と詳細タブ -->
        <div class="product-main">
            <!-- 商品画像 -->
            <div class="product-media">
                <img src="<?php echo get_theme_file_uri('assets/images/common/ooo.png'); ?>" alt="MidJourney メイン画像">
            </div>
            <div class="product-thumbnails">
                <div class="product-thumbnail active">
                    <img src="<?php echo get_theme_file_uri('assets/images/common/ooo.png'); ?>" alt="MidJourney サムネイル 1">
                </div>
                <div class="product-thumbnail">
                    <img src="/api/placeholder/200/200" alt="MidJourney サムネイル 2">
                </div>
                <div class="product-thumbnail">
                    <img src="/api/placeholder/200/200" alt="MidJourney サムネイル 3">
                </div>
                <div class="product-thumbnail">
                    <img src="/api/placeholder/200/200" alt="MidJourney サムネイル 4">
                </div>
            </div>

            <!-- 商品タブ -->
            <div class="product-tabs">
                <div class="tab-nav">
                    <div class="tab-item active" data-tab="overview">概要</div>
                    <div class="tab-item" data-tab="pricing">料金</div>
                    <div class="tab-item" data-tab="articles">関連コラム</div>
                    <div class="tab-item" data-tab="related">関連AIツール</div>
                </div>

                <!-- 概要タブ -->
                <div class="tab-content active" id="overview">
                    <div class="tab-section">
                        <h3 class="tab-section-title">MidJourneyとは</h3>
                        <div class="tab-section-content">
                            <p>MidJourneyは、テキストプロンプトから高品質なAI生成画像を作成するための最先端ツールです。シンプルな文章説明から複雑で詳細なビジュアルを作成し、クリエイティブな作業を加速させます。</p>
                            <p>ユーザーは簡単なテキスト指示を入力するだけで、ほぼ瞬時に多様なスタイルの画像を生成できます。その高品質な出力と優れたコントロール性により、デザイナー、アーティスト、マーケターなど多くのクリエイターから支持を集めています。</p>
                        </div>
                    </div>

                    <div class="tab-section">
                        <h3 class="tab-section-title">特徴と強み</h3>
                        <div class="tab-section-content">
                            <ul>
                                <li><strong>驚異的な画質</strong> - 他のAI画像生成ツールと比較して、特に優れた画質とディテールを提供します</li>
                                <li><strong>多様なスタイル</strong> - 写真風、絵画風、ファンタジー、リアリスティックなど多彩なスタイルに対応</li>
                                <li><strong>Discordインテグレーション</strong> - Discord上で簡単に操作できるインターフェース</li>
                                <li><strong>豊富なパラメータ</strong> - アスペクト比、画像サイズ、スタイル設定など様々なカスタマイズが可能</li>
                                <li><strong>活発なコミュニティ</strong> - プロンプトの共有や技術交換が活発なユーザーコミュニティ</li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-section">
                        <h3 class="tab-section-title">ユースケース</h3>
                        <div class="tab-section-content">
                            <p>MidJourneyは以下のような多様な用途に活用できます：</p>
                            <ul>
                                <li>ウェブサイトやSNS向けのオリジナル画像コンテンツ制作</li>
                                <li>商品やサービスのコンセプトビジュアル作成</li>
                                <li>ブログやオンラインメディア向けのイラスト生成</li>
                                <li>デザインやアートプロジェクトのインスピレーション源</li>
                                <li>広告やマーケティング素材のビジュアル制作</li>
                                <li>ゲームやアニメーションのキャラクターデザイン、背景アート</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- 値段タブ -->
                <div class="tab-content" id="pricing">
                    <div class="tab-section">
                        <h3 class="tab-section-title">MidJourneyの料金プラン</h3>
                        <div class="tab-section-content">
                            <p>MidJourneyでは、ニーズや予算に合わせて選べる複数の料金プランを提供しています。初めて利用する方は無料トライアルで25枚の画像を生成できます。</p>
                        </div>
                    </div>

                    <div class="pricing-tabs">
                        <div class="pricing-tab active" data-plan="monthly">月額プラン</div>
                        <div class="pricing-tab" data-plan="yearly">年額プラン（20%オフ）</div>
                    </div>

                    <div class="pricing-plans">
                        <!-- Basic プラン -->
                        <div class="pricing-plan">
                            <div class="plan-header">
                                <h3 class="plan-name">Basic</h3>
                                <div class="plan-price">
                                    <span class="price-amount">¥1,500</span>
                                    <span class="price-period">/ 月</span>
                                </div>
                                <p class="plan-description">個人向け基本プラン</p>
                            </div>
                            <div class="plan-features">
                                <div class="plan-feature">
                                    <i class="fas fa-check feature-icon-check"></i>
                                    <span>月間200枚の画像生成</span>
                                </div>
                                <div class="plan-feature">
                                    <i class="fas fa-check feature-icon-check"></i>
                                    <span>標準画質出力</span>
                                </div>
                                <div class="plan-feature">
                                    <i class="fas fa-check feature-icon-check"></i>
                                    <span>通常処理スピード</span>
                                </div>
                                <div class="plan-feature">
                                    <i class="fas fa-check feature-icon-check"></i>
                                    <span>リラックスモード対応</span>
                                </div>
                                <div class="plan-feature disabled">
                                    <i class="fas fa-times feature-icon-times"></i>
                                    <span>プライベートビジビリティ</span>
                                </div>
                                <div class="plan-feature disabled">
                                    <i class="fas fa-times feature-icon-times"></i>
                                    <span>GPU専有モード</span>
                                </div>
                            </div>
                            <a href="#" class="btn btn-outline plan-btn">選択する</a>
                        </div>

                        <!-- Standard プラン -->
                        <div class="pricing-plan featured">
                            <div class="plan-label">人気</div>
                            <div class="plan-header">
                                <h3 class="plan-name">Standard</h3>
                                <div class="plan-price">
                                    <span class="price-amount">¥3,000</span>
                                    <span class="price-period">/ 月</span>
                                </div>
                                <p class="plan-description">クリエイター向け標準プラン</p>
                            </div>
                            <div class="plan-features">
                                <div class="plan-feature">
                                    <i class="fas fa-check feature-icon-check"></i>
                                    <span>月間1000枚の画像生成</span>
                                </div>
                                <div class="plan-feature">
                                    <i class="fas fa-check feature-icon-check"></i>
                                    <span>高画質出力</span>
                                </div>
                                <div class="plan-feature">
                                    <i class="fas fa-check feature-icon-check"></i>
                                    <span>高速処理</span>
                                </div>
                                <div class="plan-feature">
                                    <i class="fas fa-check feature-icon-check"></i>
                                    <span>リラックスモード対応</span>
                                </div>
                                <div class="plan-feature">
                                    <i class="fas fa-check feature-icon-check"></i>
                                    <span>プライベートビジビリティ</span>
                                </div>
                                <div class="plan-feature disabled">
                                    <i class="fas fa-times feature-icon-times"></i>
                                    <span>GPU専有モード</span>
                                </div>
                            </div>
                            <a href="#" class="btn plan-btn">選択する</a>
                        </div>

                        <div class="pricing-plan featured">
                            <div class="plan-label">人気</div>
                            <div class="plan-header">
                                <h3 class="plan-name">Standard</h3>
                                <div class="plan-price">
                                    <span class="price-amount">¥3,000</span>
                                    <span class="price-period">/ 月</span>
                                </div>
                                <p class="plan-description">クリエイター向け標準プラン</p>
                            </div>
                            <div class="plan-features">
                                <div class="plan-feature">
                                    <i class="fas fa-check feature-icon-check"></i>
                                    <span>月間1000枚の画像生成</span>
                                </div>
                                <div class="plan-feature">
                                    <i class="fas fa-check feature-icon-check"></i>
                                    <span>高画質出力</span>
                                </div>
                                <div class="plan-feature">
                                    <i class="fas fa-check feature-icon-check"></i>
                                    <span>高速処理</span>
                                </div>
                                <div class="plan-feature">
                                    <i class="fas fa-check feature-icon-check"></i>
                                    <span>リラックスモード対応</span>
                                </div>
                                <div class="plan-feature">
                                    <i class="fas fa-check feature-icon-check"></i>
                                    <span>プライベートビジビリティ</span>
                                </div>
                                <div class="plan-feature disabled">
                                    <i class="fas fa-times feature-icon-times"></i>
                                    <span>GPU専有モード</span>
                                </div>
                            </div>
                            <a href="#" class="btn plan-btn">選択する</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 関連コラムタブ -->
            <div class="tab-content" id="articles">
                <div class="tab-section">
                    <h3 class="tab-section-title">MidJourneyに関する最新コラム</h3>
                    <div class="tab-section-content">
                        <p>MidJourneyの使い方や活用法についての役立つ記事をピックアップしました。初心者からプロまで、様々なレベルに対応する情報をご覧いただけます。</p>
                    </div>
                </div>

                <div class="related-articles-grid">
                    <!-- 記事カード1 -->
                    <div class="article-card">
                        <div class="article-image">
                            <img src="/api/placeholder/400/250" alt="MidJourneyプロンプトテクニック">
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">チュートリアル</span>
                                <span class="article-date"><i class="far fa-calendar-alt"></i> 2025.2.15</span>
                            </div>
                            <h3 class="article-title">MidJourneyで差がつくプロンプト作成テクニック10選</h3>
                            <p class="article-excerpt">
                                AIアート生成の要であるプロンプト作成。適切な指示でクオリティが大きく変わるMidJourneyでのプロンプト作成の極意を解説します。
                            </p>
                            <a href="#" class="article-read-more">
                                続きを読む <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- 記事カード2 -->
                    <div class="article-card">
                        <div class="article-image">
                            <img src="/api/placeholder/400/250" alt="MidJourney商用利用">
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">ビジネス活用</span>
                                <span class="article-date"><i class="far fa-calendar-alt"></i> 2025.2.8</span>
                            </div>
                            <h3 class="article-title">MidJourneyの商用利用ガイド：権利と注意点</h3>
                            <p class="article-excerpt">
                                生成AIで作成した画像の商用利用について解説。MidJourneyで生成した画像の著作権や利用規約、ビジネスでの活用事例を紹介します。
                            </p>
                            <a href="#" class="article-read-more">
                                続きを読む <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- 記事カード3 -->
                    <div class="article-card">
                        <div class="article-image">
                            <img src="/api/placeholder/400/250" alt="MidJourney最新バージョン">
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">ニュース</span>
                                <span class="article-date"><i class="far fa-calendar-alt"></i> 2025.1.25</span>
                            </div>
                            <h3 class="article-title">MidJourney最新バージョン6.0の新機能総まとめ</h3>
                            <p class="article-excerpt">
                                MidJourneyの最新バージョンで追加された機能や改善点を詳しく解説。パラメーター追加やクオリティ向上など、押さえておくべき変更点を紹介します。
                            </p>
                            <a href="#" class="article-read-more">
                                続きを読む <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- 記事カード4 -->
                    <div class="article-card">
                        <div class="article-image">
                            <img src="/api/placeholder/400/250" alt="MidJourney副業活用">
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">副業活用</span>
                                <span class="article-date"><i class="far fa-calendar-alt"></i> 2025.1.12</span>
                            </div>
                            <h3 class="article-title">MidJourneyで始める副業：イラスト販売の始め方</h3>
                            <p class="article-excerpt">
                                AIイラスト制作で副収入を得る方法を解説。作品の販売先や効率的な制作フロー、差別化のためのテクニックなど具体的なステップを紹介します。
                            </p>
                            <a href="#" class="article-read-more">
                                続きを読む <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- 記事カード5 -->
                    <div class="article-card">
                        <div class="article-image">
                            <img src="/api/placeholder/400/250" alt="MidJourney vs Stable Diffusion">
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">比較検証</span>
                                <span class="article-date"><i class="far fa-calendar-alt"></i> 2024.12.28</span>
                            </div>
                            <h3 class="article-title">MidJourney vs Stable Diffusion：どちらが優れている？</h3>
                            <p class="article-excerpt">
                                人気の高い2つのAI画像生成ツールを徹底比較。画質、使いやすさ、料金、カスタマイズ性など様々な観点から分析します。
                            </p>
                            <a href="#" class="article-read-more">
                                続きを読む <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- 記事カード6 -->
                    <div class="article-card">
                        <div class="article-image">
                            <img src="/api/placeholder/400/250" alt="MidJourney活用事例">
                        </div>
                        <div class="article-content">
                            <div class="article-meta">
                                <span class="article-category">活用事例</span>
                                <span class="article-date"><i class="far fa-calendar-alt"></i> 2024.12.10</span>
                            </div>
                            <h3 class="article-title">クリエイターに聞く：MidJourneyを活用したワークフロー</h3>
                            <p class="article-excerpt">
                                プロのデザイナーやイラストレーターはMidJourneyをどう使っているのか？実際の活用事例とテクニックを現役クリエイターに取材しました。
                            </p>
                            <a href="#" class="article-read-more">
                                続きを読む <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="read-more-articles">
                    <a href="#" class="btn btn-outline">コラム一覧を見る</a>
                </div>
            </div>

            <!-- 関連AIツールタブ -->
            <div class="tab-content" id="related">
                <div class="tab-section">
                    <h3 class="tab-section-title">関連AIツール</h3>
                    <div class="tab-section-content">
                        <p>MidJourneyと一緒に使うと効果的なAIツールや、MidJourneyの代替となる画像生成ツールをご紹介します。目的に合わせて最適なツールを見つけましょう。</p>
                    </div>
                </div>

                <div class="products-grid">
                    <!-- 関連ツール1 -->
                    <div class="product-card">
                        <div class="product-card-image">
                            <img src="/api/placeholder/300/200" alt="Stable Diffusion">
                        </div>
                        <div class="product-card-content">
                            <div class="product-card-tags">
                                <span class="product-card-tag">画像生成</span>
                                <span class="product-card-tag">オープンソース</span>
                            </div>
                            <h3 class="product-card-title">Stable Diffusion</h3>
                            <p class="product-card-description">
                                オープンソースのAI画像生成モデル。ローカル環境での実行が可能で、完全なカスタマイズができる点が特徴です。
                            </p>
                            <div class="product-card-meta">
                                <div class="product-card-rating">
                                    <div class="product-card-stars">★★★★☆</div>
                                    <div class="product-card-rating-value">4.2</div>
                                </div>
                                <div class="product-card-price free">無料/有料</div>
                            </div>
                        </div>
                    </div>

                    <!-- 関連ツール2 -->
                    <div class="product-card">
                        <div class="product-card-image">
                            <img src="/api/placeholder/300/200" alt="DALL-E 3">
                        </div>
                        <div class="product-card-content">
                            <div class="product-card-tags">
                                <span class="product-card-tag">画像生成</span>
                                <span class="product-card-tag">OpenAI</span>
                            </div>
                            <h3 class="product-card-title">DALL-E 3</h3>
                            <p class="product-card-description">
                                OpenAIが開発した高性能AI画像生成モデル。詳細な指示に従った正確な画像生成が可能で、ChatGPTと統合されています。
                            </p>
                            <div class="product-card-meta">
                                <div class="product-card-rating">
                                    <div class="product-card-stars">★★★★★</div>
                                    <div class="product-card-rating-value">4.7</div>
                                </div>
                                <div class="product-card-price paid">有料</div>
                            </div>
                        </div>
                    </div>

                    <!-- 関連ツール3 -->
                    <div class="product-card">
                        <div class="product-card-image">
                            <img src="/api/placeholder/300/200" alt="Leonardo.AI">
                        </div>
                        <div class="product-card-content">
                            <div class="product-card-tags">
                                <span class="product-card-tag">画像生成</span>
                                <span class="product-card-tag">AIアート</span>
                            </div>
                            <h3 class="product-card-title">Leonardo.AI</h3>
                            <p class="product-card-description">
                                クリエイター向けに特化したAI画像生成ツール。独自のモデル学習機能や高度な編集機能を備えています。
                            </p>
                            <div class="product-card-meta">
                                <div class="product-card-rating">
                                    <div class="product-card-stars">★★★★☆</div>
                                    <div class="product-card-rating-value">4.3</div>
                                </div>
                                <div class="product-card-price free">無料/有料</div>
                            </div>
                        </div>
                    </div>

                    <!-- 関連ツール4 -->
                    <div class="product-card">
                        <div class="product-card-image">
                            <img src="/api/placeholder/300/200" alt="Firefly">
                        </div>
                        <div class="product-card-content">
                            <div class="product-card-tags">
                                <span class="product-card-tag">画像生成</span>
                                <span class="product-card-tag">Adobe</span>
                            </div>
                            <h3 class="product-card-title">Adobe Firefly</h3>
                            <p class="product-card-description">
                                Adobeが開発した商用利用を重視したAI画像生成ツール。Creative Cloudとの連携や商用利用に安全な学習データが特徴です。
                            </p>
                            <div class="product-card-meta">
                                <div class="product-card-rating">
                                    <div class="product-card-stars">★★★★☆</div>
                                    <div class="product-card-rating-value">4.4</div>
                                </div>
                                <div class="product-card-price paid">有料</div>
                            </div>
                        </div>
                    </div>

                    <!-- 関連ツール5 -->
                    <div class="product-card">
                        <div class="product-card-image">
                            <img src="/api/placeholder/300/200" alt="PixAI">
                        </div>
                        <div class="product-card-content">
                            <div class="product-card-tags">
                                <span class="product-card-tag">画像生成</span>
                                <span class="product-card-tag">アニメスタイル</span>
                            </div>
                            <h3 class="product-card-title">PixAI</h3>
                            <p class="product-card-description">
                                アニメ・漫画スタイルに特化したAI画像生成ツール。キャラクターデザインやイラスト制作に最適化されています。
                            </p>
                            <div class="product-card-meta">
                                <div class="product-card-rating">
                                    <div class="product-card-stars">★★★★☆</div>
                                    <div class="product-card-rating-value">4.1</div>
                                </div>
                                <div class="product-card-price free">無料/有料</div>
                            </div>
                        </div>
                    </div>

                    <!-- 関連ツール6 -->
                    <div class="product-card">
                        <div class="product-card-image">
                            <img src="/api/placeholder/300/200" alt="Canva AI">
                        </div>
                        <div class="product-card-content">
                            <div class="product-card-tags">
                                <span class="product-card-tag">画像生成</span>
                                <span class="product-card-tag">デザインツール</span>
                            </div>
                            <h3 class="product-card-title">Canva AI</h3>
                            <p class="product-card-description">
                                人気デザインツールCanvaに統合されたAI画像生成機能。テキストからイメージを生成し、そのままデザインに組み込めます。
                            </p>
                            <div class="product-card-meta">
                                <div class="product-card-rating">
                                    <div class="product-card-stars">★★★★☆</div>
                                    <div class="product-card-rating-value">4.0</div>
                                </div>
                                <div class="product-card-price paid">有料</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="related-tools-actions">
                    <a href="#" class="btn">画像生成AIツール一覧を見る</a>
                </div>
            </div>
        </div>
    </main>

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

                    // プラン表示の切り替え
                    const planType = this.getAttribute('data-plan');
                    console.log(`Switching to ${planType} plans`);

                    // 実際のサイトでは以下のようなコードで料金表示を更新
                    if (planType === 'yearly') {
                        // 年額料金を表示 (20%割引)
                        document.querySelectorAll('.pricing-plan').forEach(plan => {
                            const priceEl = plan.querySelector('.price-amount');
                            const currentPrice = parseInt(priceEl.textContent.replace('¥', '').replace(',', ''));
                            const yearlyPrice = Math.round(currentPrice * 0.8 * 12);
                            priceEl.textContent = `¥${yearlyPrice.toLocaleString()}`;

                            // 期間表示を更新
                            plan.querySelector('.price-period').textContent = '/ 年';
                        });
                    } else {
                        // 月額料金に戻す
                        const basicPlan = document.querySelectorAll('.pricing-plan')[0];
                        const standardPlan = document.querySelectorAll('.pricing-plan')[1];
                        const proPlan = document.querySelectorAll('.pricing-plan')[2];

                        basicPlan.querySelector('.price-amount').textContent = '¥1,500';
                        standardPlan.querySelector('.price-amount').textContent = '¥3,000';
                        proPlan.querySelector('.price-amount').textContent = '¥6,000';

                        document.querySelectorAll('.price-period').forEach(el => {
                            el.textContent = '/ 月';
                        });
                    }
                });
            });

            // 月額/年額トグル切り替え
            const planToggle = document.querySelector('.plan-toggle input');
            if (planToggle) {
                planToggle.addEventListener('change', function() {
                    if (this.checked) {
                        // 年額プラン表示
                        document.querySelector('.pricing-tab[data-plan="yearly"]').click();
                    } else {
                        // 月額プラン表示
                        document.querySelector('.pricing-tab[data-plan="monthly"]').click();
                    }
                });
            }

            // トグルスライダーのスタイル
            const toggleSlider = document.createElement('style');
            toggleSlider.textContent = `
                .toggle-switch {
                    position: relative;
                    display: inline-block;
                    width: 60px;
                    height: 28px;
                }

                .toggle-switch input {
                    opacity: 0;
                    width: 0;
                    height: 0;
                }

                .toggle-slider {
                    position: absolute;
                    cursor: pointer;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    background-color: #ccc;
                    -webkit-transition: .4s;
                    transition: .4s;
                    border-radius: 34px;
                }

                .toggle-slider:before {
                    position: absolute;
                    content: "";
                    height: 20px;
                    width: 20px;
                    left: 4px;
                    bottom: 4px;
                    background-color: white;
                    -webkit-transition: .4s;
                    transition: .4s;
                    border-radius: 50%;
                }

                input:checked + .toggle-slider {
                    background-color: var(--main-color);
                }

                input:focus + .toggle-slider {
                    box-shadow: 0 0 1px var(--main-color);
                }

                input:checked + .toggle-slider:before {
                    -webkit-transform: translateX(32px);
                    -ms-transform: translateX(32px);
                    transform: translateX(32px);
                }
            `;
            document.head.appendChild(toggleSlider);
        });
    </script>
</body>

</html>