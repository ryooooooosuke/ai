<?php

/**
 * Template Name: 活用ガイド
 */
get_header(); ?>
<style>
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

    /* 目次 */
    .toc-section {
        padding: 40px 0;
    }

    .toc-container {
        background-color: var(--bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        padding: 30px;
    }

    .toc-title {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--text);
    }

    .toc-list {
        list-style-type: none;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 15px;
    }

    .toc-item {
        margin-bottom: 10px;
    }

    .toc-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 15px;
        background-color: var(--bg-light);
        border-radius: 8px;
        border: 1px solid var(--border);
        color: var(--text);
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .toc-link:hover {
        background-color: var(--main-light);
        color: var(--main-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .toc-icon {
        width: 24px;
        height: 24px;
        color: var(--main-color);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    /* ガイドコンテンツ */
    .guide-section {
        padding: 50px 0;
    }

    .guide-container {
        display: flex;
        gap: 40px;
    }

    .guide-sidebar {
        flex: 0 0 280px;
        position: sticky;
        top: 100px;
        align-self: flex-start;
    }

    .guide-nav {
        background-color: var(--bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        overflow: hidden;
    }

    .guide-nav-title {
        background-color: var(--main-light);
        padding: 15px 20px;
        font-size: 18px;
        font-weight: 700;
        color: var(--main-dark);
    }

    .guide-nav-list {
        list-style-type: none;
        padding: 15px 0;
    }

    .guide-nav-item {
        margin-bottom: 2px;
    }

    .guide-nav-link {
        display: block;
        padding: 10px 20px;
        color: var(--text);
        font-weight: 500;
        transition: all 0.3s ease;
        border-left: 3px solid transparent;
    }

    .guide-nav-link:hover,
    .guide-nav-link.active {
        background-color: var(--bg-light);
        color: var(--main-color);
        border-left-color: var(--main-color);
    }

    .guide-nav-sublist {
        list-style-type: none;
        padding-left: 20px;
    }

    .guide-nav-subitem {
        margin-bottom: 2px;
    }

    .guide-nav-sublink {
        display: block;
        padding: 8px 20px;
        color: var(--text-light);
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .guide-nav-sublink:hover,
    .guide-nav-sublink.active {
        color: var(--main-color);
    }

    .guide-content {
        flex: 1;
    }

    .guide-article {
        background-color: var(--bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        padding: 40px;
        margin-bottom: 40px;
    }

    .guide-article-title {
        font-size: 26px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--border);
    }

    .guide-article-content {
        color: var(--text);
        font-size: 16px;
        line-height: 1.7;
    }

    .guide-article-content p {
        margin-bottom: 20px;
    }

    .guide-article-content h3 {
        font-size: 22px;
        font-weight: 700;
        color: var(--text);
        margin: 30px 0 15px;
    }

    .guide-article-content h4 {
        font-size: 18px;
        font-weight: 700;
        color: var(--text);
        margin: 25px 0 15px;
    }

    .guide-article-content ul,
    .guide-article-content ol {
        margin: 20px 0;
        padding-left: 25px;
    }

    .guide-article-content li {
        margin-bottom: 10px;
    }

    .guide-article-content a {
        color: var(--main-color);
        text-decoration: underline;
        text-underline-offset: 3px;
    }

    .guide-article-content a:hover {
        color: var(--main-dark);
    }

    .guide-article-content img {
        border-radius: 8px;
        margin: 20px 0;
        border: 1px solid var(--border);
    }

    .guide-article-content blockquote {
        background-color: var(--bg-light);
        border-left: 4px solid var(--main-color);
        padding: 15px 20px;
        margin: 20px 0;
        border-radius: 0 8px 8px 0;
    }

    .guide-article-content blockquote p {
        margin-bottom: 0;
    }

    /* ステップガイド */
    .step-guide {
        display: flex;
        flex-direction: column;
        gap: 30px;
        margin: 30px 0;
    }

    .step-item {
        display: flex;
        gap: 20px;
        background-color: var(--bg-light);
        border-radius: var(--radius);
        padding: 25px;
        border: 1px solid var(--border);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.02);
    }

    .step-number {
        flex: 0 0 50px;
        width: 50px;
        height: 50px;
        background-color: var(--main-color);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: 700;
    }

    .step-content {
        flex: 1;
    }

    .step-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 10px;
    }

    .step-description {
        color: var(--text-light);
        margin-bottom: 15px;
    }

    .step-image {
        width: 100%;
        border-radius: 8px;
        border: 1px solid var(--border);
        overflow: hidden;
    }

    .step-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    /* 特徴一覧 */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        margin: 30px 0;
    }

    .feature-card {
        background-color: var(--bg-light);
        border-radius: var(--radius);
        padding: 25px;
        border: 1px solid var(--border);
        transition: all 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.05);
        border-color: var(--main-light);
    }

    .feature-icon {
        width: 60px;
        height: 60px;
        background-color: var(--main-light);
        color: var(--main-dark);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .feature-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 15px;
    }

    .feature-description {
        color: var(--text-light);
        font-size: 14px;
        line-height: 1.6;
    }

    /* FAQ */
    .faq-container {
        margin: 30px 0;
    }

    .faq-item {
        border: 1px solid var(--border);
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 15px;
        background-color: var(--bg);
    }

    .faq-question {
        padding: 20px;
        background-color: var(--bg);
        font-weight: 600;
        color: var(--text);
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.3s ease;
    }

    .faq-question:hover {
        background-color: var(--bg-light);
    }

    .faq-question.active {
        background-color: var(--main-light);
        color: var(--main-dark);
    }

    .faq-toggle {
        transition: transform 0.3s ease;
    }

    .faq-question.active .faq-toggle {
        transform: rotate(180deg);
    }

    .faq-answer {
        padding: 0 20px;
        max-height: 0;
        overflow: hidden;
        transition: all 0.3s ease;
        background-color: var(--bg);
    }

    .faq-answer.active {
        padding: 20px;
        max-height: 500px;
        border-top: 1px solid var(--border);
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

    /* サポート */
    .support-section {
        padding: 70px 0;
    }

    .support-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
    }

    .support-card {
        background-color: var(--bg);
        border-radius: var(--radius);
        padding: 30px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        text-align: center;
        transition: all 0.3s ease;
    }

    .support-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    }

    .support-icon {
        width: 70px;
        height: 70px;
        background-color: var(--main-light);
        color: var(--main-dark);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        margin: 0 auto 20px;
    }

    .support-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 15px;
    }

    .support-description {
        color: var(--text-light);
        font-size: 15px;
        margin-bottom: 20px;
        line-height: 1.6;
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
        .guide-container {
            flex-direction: column;
        }

        .guide-sidebar {
            position: static;
            width: 100%;
            margin-bottom: 30px;
        }

        .guide-article {
            padding: 30px;
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

        .toc-list {
            grid-template-columns: 1fr;
        }

        .step-item {
            flex-direction: column;
        }

        .step-number {
            align-self: flex-start;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }

        .cta-buttons {
            flex-direction: column;
        }

        .cta-buttons .btn {
            width: 100%;
        }

        .support-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 576px) {
        .guide-article {
            padding: 20px;
        }

        .guide-article-title {
            font-size: 22px;
        }

        .guide-article-content h3 {
            font-size: 20px;
        }

        .guide-article-content h4 {
            font-size: 18px;
        }
    }
</style>
<!-- パンくずリスト -->
<div class="breadcrumb">
    <div class="container">
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item"><a href="#">ホーム</a></li>
            <li class="breadcrumb-item active">活用ガイド</li>
        </ul>
    </div>
</div>

<!-- ページヘッダー -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h1 class="page-title">AI×副業ポータル<span>活用ガイド</span></h1>
            <p class="page-description">AI×副業ポータルの使い方や機能を詳しく解説します。サイトを最大限に活用して、AI時代の副業を効率的に始めましょう。</p>
        </div>
    </div>
</section>

<!-- 目次セクション -->
<section class="toc-section">
    <div class="container">
        <div class="toc-container">
            <h2 class="toc-title">目次</h2>
            <ul class="toc-list">
                <li class="toc-item">
                    <a href="#getting-started" class="toc-link">
                        <span class="toc-icon"><i class="fas fa-play-circle"></i></span>
                        はじめに
                    </a>
                </li>
                <li class="toc-item">
                    <a href="#account" class="toc-link">
                        <span class="toc-icon"><i class="fas fa-user"></i></span>
                        アカウント作成
                    </a>
                </li>
                <li class="toc-item">
                    <a href="#ai-tools" class="toc-link">
                        <span class="toc-icon"><i class="fas fa-tools"></i></span>
                        AIツール検索・活用法
                    </a>
                </li>
                <li class="toc-item">
                    <a href="#columns" class="toc-link">
                        <span class="toc-icon"><i class="fas fa-book-open"></i></span>
                        コラムの読み方
                    </a>
                </li>
                <li class="toc-item">
                    <a href="#categories" class="toc-link">
                        <span class="toc-icon"><i class="fas fa-th-large"></i></span>
                        カテゴリの使い方
                    </a>
                </li>
                <li class="toc-item">
                    <a href="#materials" class="toc-link">
                        <span class="toc-icon"><i class="fas fa-graduation-cap"></i></span>
                        教材の活用法
                    </a>
                </li>
                <li class="toc-item">
                    <a href="#faq" class="toc-link">
                        <span class="toc-icon"><i class="fas fa-question-circle"></i></span>
                        よくある質問
                    </a>
                </li>
                <li class="toc-item">
                    <a href="#support" class="toc-link">
                        <span class="toc-icon"><i class="fas fa-headset"></i></span>
                        サポート
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- ガイドコンテンツ -->
<section class="guide-section">
    <div class="container">
        <div class="guide-container">
            <!-- サイドバー -->
            <div class="guide-sidebar">
                <div class="guide-nav">
                    <div class="guide-nav-title">ガイド目次</div>
                    <ul class="guide-nav-list">
                        <li class="guide-nav-item">
                            <a href="#getting-started" class="guide-nav-link active">はじめに</a>
                        </li>
                        <li class="guide-nav-item">
                            <a href="#account" class="guide-nav-link">アカウント作成</a>
                            <ul class="guide-nav-sublist">
                                <li class="guide-nav-subitem">
                                    <a href="#register" class="guide-nav-sublink">会員登録</a>
                                </li>
                                <li class="guide-nav-subitem">
                                    <a href="#profile" class="guide-nav-sublink">プロフィール設定</a>
                                </li>
                            </ul>
                        </li>
                        <li class="guide-nav-item">
                            <a href="#ai-tools" class="guide-nav-link">AIツール検索・活用法</a>
                            <ul class="guide-nav-sublist">
                                <li class="guide-nav-subitem">
                                    <a href="#tool-search" class="guide-nav-sublink">ツール検索方法</a>
                                </li>
                                <li class="guide-nav-subitem">
                                    <a href="#tool-detail" class="guide-nav-sublink">詳細ページの見方</a>
                                </li>
                                <li class="guide-nav-subitem">
                                    <a href="#tool-compare" class="guide-nav-sublink">ツール比較機能</a>
                                </li>
                            </ul>
                        </li>
                        <li class="guide-nav-item">
                            <a href="#columns" class="guide-nav-link">コラムの読み方</a>
                        </li>
                        <li class="guide-nav-item">
                            <a href="#categories" class="guide-nav-link">カテゴリの使い方</a>
                        </li>
                        <li class="guide-nav-item">
                            <a href="#materials" class="guide-nav-link">教材の活用法</a>
                        </li>
                        <li class="guide-nav-item">
                            <a href="#faq" class="guide-nav-link">よくある質問</a>
                        </li>
                        <li class="guide-nav-item">
                            <a href="#support" class="guide-nav-link">サポート</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- メインコンテンツ -->
            <div class="guide-content">
                <!-- はじめに -->
                <div id="getting-started" class="guide-article">
                    <h2 class="guide-article-title">はじめに</h2>
                    <div class="guide-article-content">
                        <p>AI×副業ポータルへようこそ！このサイトは、AI技術を活用して副業の効率を向上させるための情報ポータルサイトです。最新のAIツール紹介や使い方ガイド、実践的なノウハウ、成功事例などを通じて、あなたの副業活動をサポートします。</p>

                        <h3>AI×副業ポータルの目的</h3>
                        <p>本サイトの主な目的は以下の通りです：</p>
                        <ul>
                            <li>最新のAIツールを紹介し、適切な選択をサポートする</li>
                            <li>AIツールを活用した副業の方法や効率化のノウハウを提供する</li>
                            <li>副業に役立つ実践的な知識や情報を発信する</li>
                            <li>AIと人間の協業による収益最大化の方法を紹介する</li>
                        </ul>

                        <h3>サイトの主な機能</h3>
                        <div class="features-grid">
                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-tools"></i></div>
                                <h4 class="feature-title">AIツールディレクトリ</h4>
                                <p class="feature-description">厳選された300以上のAIツールを目的や機能、料金などで検索・比較できます。実際のユーザーレビューも参考になります。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-book-open"></i></div>
                                <h4 class="feature-title">実践コラム</h4>
                                <p class="feature-description">AIツールの活用法やテクニック、成功事例などを紹介するコラムを定期的に更新。初心者から上級者まで役立つ情報を提供します。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-graduation-cap"></i></div>
                                <h4 class="feature-title">オンライン教材</h4>
                                <p class="feature-description">AIを活用した副業の始め方や実践的なスキルを学べる教材を提供。動画やテキスト形式で効率的に学習できます。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-comments"></i></div>
                                <h4 class="feature-title">コミュニティ</h4>
                                <p class="feature-description">同じ志を持つユーザー同士で情報交換や質問ができるコミュニティ機能。経験者からのアドバイスも得られます。</p>
                            </div>
                        </div>

                        <h3>このガイドの使い方</h3>
                        <p>このガイドでは、AI×副業ポータルの各機能の詳しい使い方や活用方法を解説しています。目次から知りたい項目を選んでクリックするか、左側のナビゲーションメニューからアクセスすることができます。</p>
                        <p>また、このガイドは常に更新されていますので、新しい機能や改善点があれば随時追加されます。定期的にチェックすることをおすすめします。</p>
                    </div>
                </div>

                <!-- アカウント作成 -->
                <div id="account" class="guide-article">
                    <h2 class="guide-article-title">アカウント作成</h2>
                    <div class="guide-article-content">
                        <p>AI×副業ポータルでは、会員登録をすることでより多くの機能や特典を利用することができます。会員登録は無料で、簡単に行えます。</p>

                        <h3 id="register">会員登録の手順</h3>
                        <div class="step-guide">
                            <div class="step-item">
                                <div class="step-number">1</div>
                                <div class="step-content">
                                    <h4 class="step-title">トップページの「会員登録」ボタンをクリック</h4>
                                    <p class="step-description">サイト上部にある「会員登録」ボタンをクリックして、登録ページに進みます。</p>
                                    <div class="step-image">
                                        <img src="/api/placeholder/600/300" alt="会員登録ボタン">
                                    </div>
                                </div>
                            </div>

                            <div class="step-item">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <h4 class="step-title">必要情報を入力</h4>
                                    <p class="step-description">メールアドレス、ユーザー名、パスワードなど、必要な情報を入力します。すべての項目が必須です。</p>
                                    <div class="step-image">
                                        <img src="/api/placeholder/600/300" alt="登録フォーム">
                                    </div>
                                </div>
                            </div>

                            <div class="step-item">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <h4 class="step-title">確認メールを受け取る</h4>
                                    <p class="step-description">登録したメールアドレスに確認メールが送信されます。メール内のリンクをクリックして、アカウントを有効化してください。</p>
                                    <div class="step-image">
                                        <img src="/api/placeholder/600/300" alt="確認メール">
                                    </div>
                                </div>
                            </div>

                            <div class="step-item">
                                <div class="step-number">4</div>
                                <div class="step-content">
                                    <h4 class="step-title">ログイン</h4>
                                    <p class="step-description">アカウントが有効化されたら、「ログイン」ボタンからメールアドレスとパスワードを入力してログインできます。</p>
                                    <div class="step-image">
                                        <img src="/api/placeholder/600/300" alt="ログイン画面">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 id="profile">プロフィール設定</h3>
                        <p>会員登録後は、プロフィール情報を設定することをおすすめします。プロフィールを充実させることで、あなたに最適な情報やレコメンドを受け取ることができます。</p>

                        <h4>プロフィール設定の手順</h4>
                        <ol>
                            <li>ログイン後、右上のユーザーアイコンをクリックし、「プロフィール設定」を選択</li>
                            <li>基本情報（名前、自己紹介など）を入力</li>
                            <li>興味のある副業カテゴリやAIツールのジャンルを選択</li>
                            <li>スキルレベルや目標などを設定</li>
                            <li>「保存」ボタンをクリックして完了</li>
                        </ol>

                        <blockquote>
                            <p><strong>ポイント：</strong>プロフィールの情報は、サイト内でのレコメンド機能に活用されます。詳しく設定するほど、あなたに合った情報が表示されやすくなります。</p>
                        </blockquote>
                    </div>
                </div>

                <!-- AIツール検索・活用法 -->
                <div id="ai-tools" class="guide-article">
                    <h2 class="guide-article-title">AIツール検索・活用法</h2>
                    <div class="guide-article-content">
                        <p>AI×副業ポータルでは、副業に役立つ厳選されたAIツールを多数紹介しています。目的や予算に合わせて最適なツールを見つけるための検索方法や、ツール情報の見方を解説します。</p>

                        <h3 id="tool-search">ツール検索方法</h3>
                        <p>AIツールを探す方法はいくつかあります：</p>

                        <h4>カテゴリから探す</h4>
                        <p>トップページまたはAIツール一覧ページにあるカテゴリカードから、興味のある分野を選択できます。</p>
                        <ul>
                            <li>動画クリエイター</li>
                            <li>プログラミング</li>
                            <li>ライティング</li>
                            <li>デザイン</li>
                            <li>その他のカテゴリ</li>
                        </ul>

                        <div class="step-image">
                            <img src="/api/placeholder/700/300" alt="カテゴリから探す">
                        </div>

                        <h4>検索機能を使う</h4>
                        <p>キーワードを入力して検索することもできます。特定の機能や目的に特化したツールを探す場合に便利です。</p>
                        <div class="step-image">
                            <img src="/api/placeholder/700/150" alt="検索機能">
                        </div>

                        <h4>フィルター機能</h4>
                        <p>検索結果は、以下の条件でさらに絞り込むことができます：</p>
                        <ul>
                            <li>料金（無料、有料、フリーミアム）</li>
                            <li>評価（星の数）</li>
                            <li>更新日</li>
                            <li>対応プラットフォーム（Web、デスクトップ、モバイル）</li>
                            <li>日本語対応の有無</li>
                        </ul>

                        <h3 id="tool-detail">詳細ページの見方</h3>
                        <p>各AIツールの詳細ページには、以下の情報が掲載されています：</p>

                        <div class="features-grid">
                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-info-circle"></i></div>
                                <h4 class="feature-title">基本情報</h4>
                                <p class="feature-description">ツール名、カテゴリ、評価、公式サイトへのリンクなど、基本的な情報を確認できます。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-list"></i></div>
                                <h4 class="feature-title">機能詳細</h4>
                                <p class="feature-description">ツールの主な機能や特徴が詳しく説明されています。具体的にどのような作業に役立つかを把握できます。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-tag"></i></div>
                                <h4 class="feature-title">料金プラン</h4>
                                <p class="feature-description">無料プラン、有料プランの詳細情報。各プランで利用できる機能や制限がわかります。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-image"></i></div>
                                <h4 class="feature-title">スクリーンショット</h4>
                                <p class="feature-description">ツールの実際の画面や使用感を確認できるスクリーンショットが用意されています。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-star"></i></div>
                                <h4 class="feature-title">レビュー・評価</h4>
                                <p class="feature-description">実際のユーザーによるレビューや評価を確認できます。良い点や改善点など参考になる情報が得られます。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-th"></i></div>
                                <h4 class="feature-title">関連ツール</h4>
                                <p class="feature-description">類似したツールや補完的に使えるツールの紹介。比較検討や組み合わせに役立ちます。</p>
                            </div>
                        </div>

                        <h3 id="tool-compare">ツール比較機能</h3>
                        <p>複数のツールを詳細に比較したい場合は、比較機能を利用できます。比較したいツールの詳細ページで「比較に追加」ボタンをクリックし、2〜4つのツールを選択して「比較する」をクリックします。</p>

                        <div class="step-image">
                            <img src="/api/placeholder/700/300" alt="ツール比較機能">
                        </div>

                        <p>比較ページでは、以下の項目を横並びで比較できます：</p>
                        <ul>
                            <li>基本情報（カテゴリ、評価など）</li>
                            <li>主な機能</li>
                            <li>料金プラン</li>
                            <li>対応プラットフォーム</li>
                            <li>その他の特徴</li>
                        </ul>

                        <blockquote>
                            <p><strong>アドバイス：</strong>ツールを選ぶ際は、価格だけでなく、実際の用途や自分のスキルレベル、サポート体制なども考慮することをおすすめします。無料トライアルがあるツールは、実際に使ってみてから判断するとよいでしょう。</p>
                        </blockquote>
                    </div>
                </div>

                <!-- コラムの読み方 -->
                <div id="columns" class="guide-article">
                    <h2 class="guide-article-title">コラムの読み方</h2>
                    <div class="guide-article-content">
                        <p>AI×副業ポータルのコラムでは、AIツールを活用した副業のノウハウや成功事例、最新のトレンド情報などを定期的に発信しています。コラムを活用して、より効率的に副業を進めましょう。</p>

                        <h3>コラムの種類</h3>
                        <ul>
                            <li><strong>初心者向け</strong>：AIと副業の基礎知識やはじめ方</li>
                            <li><strong>中級者向け</strong>：効率化テクニックや収益アップの方法</li>
                            <li><strong>上級者向け</strong>：より高度な活用法や複数の収入源の構築</li>
                            <li><strong>事例紹介</strong>：実際の成功例や体験談</li>
                            <li><strong>ツールレビュー</strong>：特定のツールの詳細レビューや比較</li>
                        </ul>

                        <h3>コラムの探し方</h3>
                        <p>コラムは以下の方法で探すことができます：</p>
                        <ol>
                            <li>トップページの「新着コラム」セクション</li>
                            <li>メニューの「コラム」からコラム一覧ページにアクセス</li>
                            <li>カテゴリやタグで絞り込み検索</li>
                            <li>キーワード検索</li>
                        </ol>

                        <div class="step-image">
                            <img src="/api/placeholder/700/300" alt="コラム一覧ページ">
                        </div>

                        <h3>コラムの活用法</h3>
                        <div class="features-grid">
                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-bookmark"></i></div>
                                <h4 class="feature-title">ブックマーク機能</h4>
                                <p class="feature-description">気になるコラムは「ブックマーク」ボタンで保存し、後でマイページからアクセスできます。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-share-alt"></i></div>
                                <h4 class="feature-title">シェア機能</h4>
                                <p class="feature-description">役立つコラムはSNSやメールでシェアできます。知人と情報を共有しましょう。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-comment"></i></div>
                                <h4 class="feature-title">コメント機能</h4>
                                <p class="feature-description">コラムにコメントを残して、質問したり意見を共有したりできます。筆者や他のユーザーとの交流に役立ちます。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-print"></i></div>
                                <h4 class="feature-title">プリント機能</h4>
                                <p class="feature-description">コラムを印刷して手元に置いておくこともできます。「印刷」ボタンから簡単に印刷用レイアウトに変換されます。</p>
                            </div>
                        </div>

                        <blockquote>
                            <p><strong>ヒント：</strong>コラムの末尾には関連コラムや参考ツールへのリンクがあります。気になるトピックがあれば、関連コンテンツも合わせて読むことで理解が深まります。</p>
                        </blockquote>
                    </div>
                </div>

                <!-- カテゴリの使い方 -->
                <div id="categories" class="guide-article">
                    <h2 class="guide-article-title">カテゴリの使い方</h2>
                    <div class="guide-article-content">
                        <p>AI×副業ポータルでは、様々な副業カテゴリごとにAIツールやコラムを整理しています。自分の興味や得意分野に合わせたカテゴリから情報を探すことで、効率的に必要な情報にアクセスできます。</p>

                        <h3>主なカテゴリ</h3>
                        <div class="features-grid">
                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-video"></i></div>
                                <h4 class="feature-title">動画クリエイター</h4>
                                <p class="feature-description">YouTubeやTikTokなどの動画コンテンツ制作に関するAIツールや情報。動画編集、字幕生成、サムネイル作成など。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-code"></i></div>
                                <h4 class="feature-title">プログラミング</h4>
                                <p class="feature-description">コード生成、バグ修正、最適化、アプリ開発などのプログラミング作業を支援するAIツールや情報。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-pen-fancy"></i></div>
                                <h4 class="feature-title">ライティング</h4>
                                <p class="feature-description">記事作成、校正、SEO最適化、翻訳などのライティング作業を効率化するAIツールや情報。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-paint-brush"></i></div>
                                <h4 class="feature-title">デザイン</h4>
                                <p class="feature-description">画像生成、ロゴデザイン、バナー作成などのデザイン制作を支援するAIツールや情報。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-bullhorn"></i></div>
                                <h4 class="feature-title">マーケティング</h4>
                                <p class="feature-description">SNS運用、広告作成、市場調査、顧客分析などのマーケティング活動を支援するAIツールや情報。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-headset"></i></div>
                                <h4 class="feature-title">カスタマーサポート</h4>
                                <p class="feature-description">チャットボット、問い合わせ対応、FAQ自動化などのカスタマーサポートを効率化するAIツールや情報。</p>
                            </div>
                        </div>

                        <h3>カテゴリページの活用方法</h3>
                        <p>各カテゴリページでは、以下の情報が整理されています：</p>
                        <ul>
                            <li>カテゴリ概要と市場動向</li>
                            <li>おすすめAIツール一覧</li>
                            <li>関連コラム記事</li>
                            <li>成功事例</li>
                            <li>初心者向けガイド</li>
                        </ul>

                        <div class="step-image">
                            <img src="/api/placeholder/700/300" alt="カテゴリページ">
                        </div>

                        <p>カテゴリページは、副業を始めるための入り口として最適です。自分の興味のある分野や既に持っているスキルに関連するカテゴリから探し始めることをおすすめします。</p>

                        <blockquote>
                            <p><strong>アドバイス：</strong>複数のカテゴリに跨る副業も多くあります。例えば、ライティングとSEOの知識を組み合わせたWebコンテンツ制作など、複数のカテゴリを横断的に学ぶことで、より付加価値の高いサービスを提供できるようになります。</p>
                        </blockquote>
                    </div>
                </div>

                <!-- 教材の活用法 -->
                <div id="materials" class="guide-article">
                    <h2 class="guide-article-title">教材の活用法</h2>
                    <div class="guide-article-content">
                        <p>AI×副業ポータルでは、AIを活用した副業スキルを効率的に学べる各種教材を提供しています。初心者から上級者まで、レベルに合わせた学習が可能です。</p>

                        <h3>教材の種類</h3>
                        <ul>
                            <li><strong>入門コース</strong>：基礎知識や副業の始め方を学ぶ短期間のコース</li>
                            <li><strong>実践コース</strong>：具体的なスキルや技術を習得するための中・長期コース</li>
                            <li><strong>マスタークラス</strong>：専門家によるワークショップや高度な技術を学ぶコース</li>
                            <li><strong>ハンズオン教材</strong>：実際にAIツールを操作しながら学べる実践的な教材</li>
                        </ul>

                        <h3>教材へのアクセス方法</h3>
                        <ol>
                            <li>トップメニューの「教材」をクリックして教材一覧ページにアクセス</li>
                            <li>目的やレベルに合わせてフィルタリング</li>
                            <li>興味のある教材を選択して詳細ページを確認</li>
                            <li>「学習を始める」ボタンをクリックして受講開始</li>
                        </ol>

                        <div class="step-image">
                            <img src="/api/placeholder/700/300" alt="教材一覧ページ">
                        </div>

                        <h3>教材の効果的な活用法</h3>
                        <div class="features-grid">
                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-clipboard-check"></i></div>
                                <h4 class="feature-title">学習計画を立てる</h4>
                                <p class="feature-description">教材の難易度や所要時間を確認し、無理のない学習計画を立てましょう。継続的な学習が成功の鍵です。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-hands-helping"></i></div>
                                <h4 class="feature-title">実践と組み合わせる</h4>
                                <p class="feature-description">学んだ内容は実際に試してみることが大切です。小さなプロジェクトから始めて、徐々にスキルを磨いていきましょう。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-users"></i></div>
                                <h4 class="feature-title">コミュニティを活用する</h4>
                                <p class="feature-description">各教材にはディスカッションフォーラムがあります。質問や意見を共有し、他の学習者と交流しましょう。</p>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon"><i class="fas fa-certificate"></i></div>
                                <h4 class="feature-title">修了証を獲得する</h4>
                                <p class="feature-description">コースを完了すると修了証が発行されます。プロフィールやポートフォリオに追加して、スキルをアピールできます。</p>
                            </div>
                        </div>

                        <h3>おすすめの学習パス</h3>
                        <p>効果的な学習のために、以下のようなステップを踏むことをおすすめします：</p>
                        <ol>
                            <li>「AI副業入門」コースで基礎知識を身につける</li>
                            <li>興味のあるカテゴリの「実践コース」を受講</li>
                            <li>具体的なAIツールの「ハンズオン教材」で実践的なスキルを習得</li>
                            <li>「マスタークラス」で高度な技術や戦略を学ぶ</li>
                            <li>実際のプロジェクトやクライアントワークに挑戦</li>
                        </ol>

                        <blockquote>
                            <p><strong>ポイント：</strong>教材は定期的に更新されるため、最新のAI技術やトレンドを常に学び続けることができます。「マイページ」の「学習状況」からこれまでの学習履歴や進捗を確認できます。</p>
                        </blockquote>
                    </div>
                </div>

                <!-- よくある質問 -->
                <div id="faq" class="guide-article">
                    <h2 class="guide-article-title">よくある質問</h2>
                    <div class="guide-article-content">
                        <p>AI×副業ポータルを利用する際によく寄せられる質問とその回答をまとめました。サイトの使い方や機能に関する疑問点がありましたら、こちらをご確認ください。</p>

                        <div class="faq-container">
                            <div class="faq-item">
                                <div class="faq-question">
                                    会員登録は必須ですか？
                                    <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                                </div>
                                <div class="faq-answer">
                                    <p>会員登録は必須ではありませんが、登録することで以下の特典があります：</p>
                                    <ul>
                                        <li>AIツールのお気に入り登録</li>
                                        <li>コラムのブックマーク</li>
                                        <li>コメント機能の利用</li>
                                        <li>教材へのフルアクセス</li>
                                        <li>専用コミュニティへの参加</li>
                                        <li>オリジナルコンテンツの閲覧</li>
                                    </ul>
                                    <p>基本的な情報閲覧は会員登録なしでも可能ですが、より充実した機能を利用するには登録をおすすめします。</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-question">
                                    サイトの利用は無料ですか？
                                    <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                                </div>
                                <div class="faq-answer">
                                    <p>AI×副業ポータルの基本機能は無料でご利用いただけます。以下の機能が無料で利用可能です：</p>
                                    <ul>
                                        <li>AIツール情報の閲覧</li>
                                        <li>コラムの閲覧</li>
                                        <li>基本的な教材の利用</li>
                                        <li>コミュニティへの参加</li>
                                    </ul>
                                    <p>一部の高度な教材やマスタークラス、専門家によるコンサルティングなどの特別なサービスには有料のものもあります。各サービスの詳細ページで料金を確認できます。</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-question">
                                    紹介されているAIツールはどのように選ばれていますか？
                                    <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                                </div>
                                <div class="faq-answer">
                                    <p>紹介しているAIツールは、以下の基準で厳選しています：</p>
                                    <ul>
                                        <li>機能性と使いやすさ</li>
                                        <li>副業での実用性</li>
                                        <li>コストパフォーマンス</li>
                                        <li>ユーザーレビューと評価</li>
                                        <li>開発・運営会社の信頼性</li>
                                        <li>アップデート頻度と開発継続性</li>
                                    </ul>
                                    <p>各ツールは実際に編集部がテストし、評価を行っています。また、ユーザーからのフィードバックも反映して定期的に情報を更新しています。</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-question">
                                    AI副業で月にどれくらい稼げますか？
                                    <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                                </div>
                                <div class="faq-answer">
                                    <p>AI副業での収入は、以下の要因によって大きく異なります：</p>
                                    <ul>
                                        <li>副業のカテゴリと専門性</li>
                                        <li>提供するサービスの質と付加価値</li>
                                        <li>投入できる時間と努力</li>
                                        <li>マーケティングとクライアント獲得の能力</li>
                                        <li>継続期間とスキルの向上</li>
                                    </ul>
                                    <p>一般的に、初心者の場合は月に2〜5万円程度から始まり、経験と専門性を積むにつれて10万円以上を稼ぐことも可能です。サイト内のコラムや成功事例では、様々な収入レベルの事例を紹介していますので、参考にしてください。</p>
                                </div>
                            </div>

                            <div class="faq-item">
                                <div class="faq-question">
                                    初心者でもAI副業を始められますか？
                                    <span class="faq-toggle"><i class="fas fa-chevron-down"></i></span>
                                </div>
                                <div class="faq-answer">
                                    <p>はい、初心者でも始められます。現代のAIツールは使いやすく設計されており、高度な技術知識がなくても効果的に活用できるものが増えています。</p>
                                    <p>初心者におすすめのステップは以下の通りです：</p>
                                    <ol>
                                        <li>「AI副業入門」コースで基礎知識を身につける</li>
                                        <li>既存のスキルや興味に近い副業カテゴリを選ぶ</li>
                                        <li>簡単なAIツールから使い始める</li>
                                        <li>小さなプロジェクトで実践し、徐々にスキルを向上させる</li>
                                        <li>コミュニティで質問したり、経験者からアドバイスを得る</li>
                                    </ol>
                                    <p>サイト内の「初心者向け」カテゴリのコンテンツを参照すると、具体的なはじめ方や注意点などが詳しく解説されています。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- サポート -->
                <div id="support" class="guide-article">
                    <h2 class="guide-article-title">サポート</h2>
                    <div class="guide-article-content">
                        <p>AI×副業ポータルでは、様々な方法でユーザーをサポートしています。質問や問題がある場合は、以下の方法でサポートを受けることができます。</p>

                        <div class="support-grid">
                            <div class="support-card">
                                <div class="support-icon">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <h3 class="support-title">コミュニティサポート</h3>
                                <p class="support-description">ユーザーコミュニティで質問を投稿し、他のユーザーや専門家からアドバイスを受けることができます。多くの一般的な質問はここで解決できます。</p>
                                <a href="#" class="btn">コミュニティに参加</a>
                            </div>

                            <div class="support-card">
                                <div class="support-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <h3 class="support-title">メールサポート</h3>
                                <p class="support-description">技術的な問題や会員情報に関する質問は、メールでサポートチームに問い合わせることができます。平日24時間以内に返信いたします。</p>
                                <a href="#" class="btn">メールで問い合わせ</a>
                            </div>

                            <div class="support-card">
                                <div class="support-icon">
                                    <i class="fas fa-question-circle"></i>
                                </div>
                                <h3 class="support-title">ヘルプセンター</h3>
                                <p class="support-description">詳細なヘルプドキュメント、チュートリアル、トラブルシューティングガイドなどを提供しています。自己解決に役立つリソースが充実しています。</p>
                                <a href="#" class="btn">ヘルプセンターを見る</a>
                            </div>
                        </div>

                        <h3>サポートポリシー</h3>
                        <p>AI×副業ポータルでは、以下のサポートポリシーを設けています：</p>
                        <ul>
                            <li>メールでの問い合わせは平日24時間以内に返信</li>
                            <li>コミュニティでの質問には積極的にスタッフが回答</li>
                            <li>サイトの不具合や問題は優先的に対応</li>
                            <li>ユーザーフィードバックは定期的にサービス改善に反映</li>
                        </ul>

                        <blockquote>
                            <p><strong>ご注意ください：</strong>AI×副業ポータルでは、特定のAIツールの使用方法や副業の進め方について、個別のコンサルティングは行っておりません。一般的なアドバイスや情報提供はコミュニティやコラムをご活用ください。より専門的なサポートが必要な場合は、専門家によるコンサルティングサービス（有料）をご検討ください。</p>
                        </blockquote>

                        <h3>フィードバックの送り方</h3>
                        <p>サイトの改善や新機能のリクエストなど、フィードバックは大歓迎です。以下の方法でフィードバックを送ることができます：</p>
                        <ol>
                            <li>各ページ下部の「フィードバックを送る」ボタン</li>
                            <li>マイページの「フィードバック」セクション</li>
                            <li>メールでのお問い合わせフォームから「フィードバック」を選択</li>
                        </ol>
                        <p>いただいたフィードバックは定期的に検討し、サービス改善に役立てています。ご協力ありがとうございます。</p>
                    </div>
                </div>
            </div>
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

<!-- FAQ動作用のスクリプト -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const faqQuestions = document.querySelectorAll('.faq-question');

        faqQuestions.forEach(question => {
            question.addEventListener('click', function() {
                const answer = this.nextElementSibling;
                const isActive = this.classList.contains('active');

                // 全てのFAQを閉じる
                faqQuestions.forEach(q => {
                    q.classList.remove('active');
                    q.nextElementSibling.classList.remove('active');
                });

                // クリックされたFAQを開く（既に開いていた場合は閉じる）
                if (!isActive) {
                    this.classList.add('active');
                    answer.classList.add('active');
                }
            });
        });
    });
</script>
</body>

</html>