<?php

/**
 * Template Name: コラム詳細ページ
 * Template Post Type: post
 */

get_header();

?>

<style>
    /* 共通スタイル */
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

    /* 投稿詳細ページのメインレイアウト */
    .single-post-layout {
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 40px;
        margin: 50px 0;
    }

    @media (max-width: 991px) {
        .single-post-layout {
            grid-template-columns: 1fr;
        }
    }

    /* メインコンテンツ */
    .post-main-content {
        background-color: var(--bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        overflow: hidden;
    }

    .post-header {
        padding: 30px;
    }

    .post-meta {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .post-categories {
        display: flex;
        gap: 10px;
    }

    .post-category {
        background-color: var(--main-color);
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .post-date {
        color: var(--text-light);
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .post-title {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--text);
        line-height: 1.4;
    }

    .post-author {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .author-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: var(--main-light);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: 600;
        color: var(--main-dark);
        margin-right: 15px;
    }

    .author-info {
        display: flex;
        flex-direction: column;
    }

    .author-name {
        font-weight: 600;
        color: var(--text);
        font-size: 16px;
    }

    .author-role {
        color: var(--text-light);
        font-size: 14px;
    }

    .post-featured-image {
        width: 100%;
        height: auto;
        max-height: 600px;
        /* 画像の最大高さを増加 */
        object-fit: contain;
        /* 画像のアスペクト比を維持 */
    }

    .post-content-wrap {
        padding: 30px;
    }

    /* 5つ星評価 */
    .post-rating {
        margin: 20px 0;
        text-align: center;
        background-color: var(--bg-alt);
        padding: 15px;
        border-radius: 8px;
    }

    .rating-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .star-rating {
        display: inline-flex;
        direction: rtl;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        color: #ddd;
        font-size: 30px;
        padding: 0 5px;
        cursor: pointer;
    }

    .star-rating label:hover,
    .star-rating label:hover~label,
    .star-rating input:checked~label {
        color: #FFD700;
    }

    .rating-count {
        margin-top: 10px;
        font-size: 14px;
        color: var(--text-light);
    }

    /* 目次 */
    .post-toc {
        background-color: var(--bg-alt);
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 30px;
        border: 1px solid var(--border);
    }

    .toc-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .toc-list {
        list-style: none;
    }

    .toc-item {
        margin-bottom: 10px;
        position: relative;
        padding-left: 20px;
    }

    .toc-item:before {
        content: '';
        position: absolute;
        left: 0;
        top: 10px;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background-color: var(--main-color);
    }

    .toc-link {
        color: var(--text);
        font-size: 15px;
        transition: all 0.2s ease;
    }

    .toc-link:hover {
        color: var(--main-color);
    }

    /* 投稿コンテンツ */
    .post-content {
        color: var(--text);
        font-size: 16px;
        line-height: 1.8;
    }

    .post-content p {
        margin-bottom: 20px;
    }

    .post-content h2 {
        font-size: 24px;
        font-weight: 700;
        margin: 40px 0 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--main-light);
        color: var(--text);
    }

    .post-content h3 {
        font-size: 20px;
        font-weight: 700;
        margin: 30px 0 20px;
        color: var(--text);
    }

    .post-content ul,
    .post-content ol {
        margin-bottom: 20px;
        padding-left: 20px;
    }

    .post-content li {
        margin-bottom: 10px;
    }

    .post-content img {
        border-radius: 8px;
        margin: 20px 0;
        width: 100%;
        /* 画像を大きく表示 */
        height: auto;
    }

    .post-content blockquote {
        border-left: 4px solid var(--main-color);
        padding: 15px 20px;
        margin: 20px 0;
        background-color: var(--bg-alt);
        font-style: italic;
        color: var(--text-light);
    }

    .post-content code {
        background-color: var(--bg-alt);
        padding: 2px 6px;
        border-radius: 4px;
        font-family: monospace;
    }

    .post-content pre {
        background-color: var(--bg-alt);
        padding: 15px;
        border-radius: 8px;
        overflow-x: auto;
        margin: 20px 0;
        border: 1px solid var(--border);
    }

    /* 記事のタグ */
    .post-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 40px;
        padding-top: 20px;
        border-top: 1px solid var(--border);
    }

    .post-tag {
        font-size: 12px;
        color: var(--main-dark);
        background-color: var(--main-light);
        padding: 5px 10px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .post-tag:hover {
        background-color: var(--main-color);
        color: white;
    }

    /* 記事のシェアボタン */
    .post-share {
        margin-top: 30px;
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    .share-button {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: all 0.3s ease;
    }

    .share-button:hover {
        transform: translateY(-3px);
    }

    .share-twitter {
        background-color: #1DA1F2;
    }

    .share-facebook {
        background-color: #1877F2;
    }

    .share-line {
        background-color: #06C755;
    }

    /* 著者プロフィール */
    .author-bio {
        background-color: var(--bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        padding: 30px;
        margin-top: 50px;
        display: flex;
    }

    @media (max-width: 768px) {
        .author-bio {
            flex-direction: column;
        }
    }

    .author-bio-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: var(--main-light);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        font-weight: 600;
        color: var(--main-dark);
        margin-right: 20px;
        flex-shrink: 0;
    }

    .author-bio-content {
        flex-grow: 1;
    }

    .author-bio-name {
        font-size: 20px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 10px;
    }

    .author-bio-description {
        color: var(--text-light);
        font-size: 15px;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .author-social {
        display: flex;
        gap: 10px;
    }

    .author-social a {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-color: var(--bg-alt);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-light);
        transition: all 0.3s ease;
    }

    .author-social a:hover {
        background-color: var(--main-color);
        color: white;
    }

    /* 関連記事 */
    .related-posts {
        margin-top: 50px;
    }

    .related-posts-title {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--text);
        position: relative;
        display: inline-block;
    }

    .related-posts-title:after {
        content: '';
        position: absolute;
        bottom: -6px;
        left: 0;
        width: 40px;
        height: 3px;
        background-color: var(--main-color);
    }

    .related-posts-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    @media (max-width: 768px) {
        .related-posts-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 576px) {
        .related-posts-grid {
            grid-template-columns: 1fr;
        }
    }

    .related-post-card {
        background-color: var(--bg);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: all 0.3s ease;
        border: 1px solid var(--border);
    }

    .related-post-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.05);
        border-color: var(--main-light);
    }

    .related-post-image {
        width: 100%;
        height: 150px;
        overflow: hidden;
    }

    .related-post-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.4s ease;
    }

    .related-post-card:hover .related-post-image img {
        transform: scale(1.05);
    }

    .related-post-content {
        padding: 15px;
    }

    .related-post-title {
        font-size: 16px;
        font-weight: 600;
        line-height: 1.4;
        margin-bottom: 8px;
        color: var(--text);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .related-post-meta {
        display: flex;
        justify-content: space-between;
        font-size: 12px;
        color: var(--text-light);
    }

    /* サイドバー */
    .post-sidebar {
        position: sticky;
        top: 20px;
        align-self: flex-start;
    }

    .sidebar-section {
        background-color: var(--bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        padding: 25px;
        margin-bottom: 30px;
    }

    .sidebar-title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--text);
        position: relative;
        display: inline-block;
    }

    .sidebar-title:after {
        content: '';
        position: absolute;
        bottom: -6px;
        left: 0;
        width: 30px;
        height: 2px;
        background-color: var(--main-color);
    }

    /* 人気記事 */
    .popular-post {
        display: flex;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--border);
    }

    .popular-post:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .popular-post-image {
        width: 70px;
        height: 70px;
        border-radius: 8px;
        overflow: hidden;
        margin-right: 15px;
        flex-shrink: 0;
    }

    .popular-post-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .popular-post-content {
        flex-grow: 1;
    }

    .popular-post-title {
        font-size: 14px;
        font-weight: 600;
        line-height: 1.4;
        margin-bottom: 5px;
        color: var(--text);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .popular-post-meta {
        font-size: 12px;
        color: var(--text-light);
    }

    /* カテゴリー一覧 */
    .sidebar-categories {
        list-style: none;
    }

    .sidebar-category-item {
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .sidebar-category-link {
        color: var(--text);
        transition: all 0.3s ease;
        font-size: 15px;
        display: flex;
        align-items: center;
    }

    .sidebar-category-link:before {
        content: '›';
        margin-right: 8px;
        color: var(--main-color);
        font-size: 18px;
        font-weight: 600;
    }

    .sidebar-category-link:hover {
        color: var(--main-color);
        padding-left: 5px;
    }

    .sidebar-category-count {
        background-color: var(--bg-alt);
        color: var(--text-light);
        font-size: 12px;
        padding: 2px 8px;
        border-radius: 12px;
    }

    /* タグクラウド */
    .sidebar-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .sidebar-tag {
        font-size: 12px;
        color: var(--text);
        background-color: var(--bg-alt);
        padding: 5px 10px;
        border-radius: 4px;
        transition: all 0.3s ease;
        border: 1px solid var(--border);
    }

    .sidebar-tag:hover {
        background-color: var(--main-light);
        color: var(--main-dark);
        border-color: var(--main-light);
    }

    /* CTAバナー */
    .sidebar-cta {
        background-color: var(--main-light);
        border-radius: var(--radius);
        padding: 25px;
        text-align: center;
        border: none;
    }

    .sidebar-cta-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--main-dark);
        margin-bottom: 15px;
    }

    .sidebar-cta-description {
        font-size: 14px;
        color: var(--text);
        margin-bottom: 20px;
        line-height: 1.6;
    }

    /* コメント */
    .comments-section {
        margin-top: 50px;
    }

    .comments-title {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 30px;
        color: var(--text);
        position: relative;
        display: inline-block;
    }

    .comments-title:after {
        content: '';
        position: absolute;
        bottom: -6px;
        left: 0;
        width: 40px;
        height: 3px;
        background-color: var(--main-color);
    }

    .comment-form-input {
        width: 100%;
        padding: 12px 15px;
        border-radius: 8px;
        border: 1px solid var(--border);
        background-color: var(--bg);
        color: var(--text);
        margin-bottom: 15px;
    }

    textarea.comment-form-input {
        min-height: 150px;
        resize: vertical;
    }

    .comment-form-submit {
        background-color: var(--main-color);
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .comment-form-submit:hover {
        background-color: var(--main-dark);
    }

    .comment {
        border-bottom: 1px solid var(--border);
        padding: 20px 0;
    }

    .comment:last-child {
        border-bottom: none;
    }

    .comment-author {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .comment-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: var(--bg-alt);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        font-size: 16px;
        font-weight: 600;
        color: var(--text);
    }

    .comment-author-name {
        font-weight: 600;
        color: var(--text);
        font-size: 16px;
    }

    .comment-date {
        font-size: 12px;
        color: var(--text-light);
        margin-left: 10px;
    }

    .comment-content {
        color: var(--text);
        font-size: 15px;
        line-height: 1.6;
        margin-left: 55px;
    }

    .comment-reply {
        margin-left: 55px;
        margin-top: 10px;
    }

    .comment-reply-link {
        color: var(--main-color);
        font-size: 14px;
        font-weight: 600;
    }

    /* ページナビゲーション */
    .post-navigation {
        display: flex;
        justify-content: space-between;
        margin-top: 50px;
    }

    .post-nav-link {
        background-color: var(--bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        padding: 15px;
        width: 48%;
        transition: all 0.3s ease;
    }

    .post-nav-link:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.05);
        border-color: var(--main-light);
    }

    .post-nav-label {
        font-size: 12px;
        color: var(--text-light);
        margin-bottom: 5px;
        display: block;
    }

    .post-nav-title {
        font-size: 15px;
        font-weight: 600;
        color: var(--text);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .post-nav-previous {
        text-align: left;
    }

    .post-nav-next {
        text-align: right;
    }

    /* フォローフローティングボタン */
    .floating-share {
        position: fixed;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 15px;
        z-index: 99;
    }

    @media (max-width: 1400px) {
        .floating-share {
            display: none;
        }
    }

    .floating-share-button {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .floating-share-button:hover {
        transform: scale(1.1);
    }

    /* レスポンシブ調整 */
    @media (max-width: 768px) {
        .post-header {
            padding: 20px;
        }

        .post-content-wrap {
            padding: 20px;
        }

        .post-title {
            font-size: 24px;
        }

        .author-bio {
            padding: 20px;
        }

        .author-bio-avatar {
            width: 80px;
            height: 80px;
            font-size: 30px;
        }

        .related-posts-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 576px) {
        .post-navigation {
            flex-direction: column;
            gap: 15px;
        }

        .post-nav-link {
            width: 100%;
        }

        .related-posts-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- パンくずリスト -->
<div class="breadcrumb">
    <div class="container">
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">ホーム</a></li>
            <li class="breadcrumb-item"><a href="<?php echo home_url('/column/'); ?>">コラム</a></li>
            <li class="breadcrumb-item active"><?php the_title(); ?></li>
        </ul>
    </div>
</div>

<!-- メインコンテンツ -->
<div class="container">
    <div class="single-post-layout">
        <!-- 投稿コンテンツ -->
        <div class="post-main">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article class="post-main-content">
                        <header class="post-header">
                            <div class="post-meta">
                                <div class="post-categories">
                                    <?php
                                    $categories = get_the_category();
                                    if ($categories) {
                                        foreach ($categories as $category) {
                                            echo '<span class="post-category">' . esc_html($category->name) . '</span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="post-date"><?php echo get_the_date('Y年n月j日'); ?></div>
                            </div>
                            <h1 class="post-title"><?php the_title(); ?></h1>
                            <div class="post-author">
                                <div class="author-avatar"><?php echo substr(get_the_author(), 0, 1); ?></div>
                                <div class="author-info">
                                    <span class="author-name"><?php the_author(); ?></span>
                                    <span class="author-role">AI専門家</span>
                                </div>
                            </div>
                        </header>

                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" class="post-featured-image">
                        <?php endif; ?>

                        <div class="post-content-wrap">
                            <!-- 目次 -->
                            <div class="post-toc">
                                <h2 class="toc-title">目次</h2>
                                <ul class="toc-list">
                                    <li class="toc-item"><a href="#section1" class="toc-link">AI副業の始め方</a></li>
                                    <li class="toc-item"><a href="#section2" class="toc-link">AIツールを活用したおすすめの副業5選</a></li>
                                    <li class="toc-item"><a href="#section3" class="toc-link">AIを使って効率化できる作業とは</a></li>
                                    <li class="toc-item"><a href="#section4" class="toc-link">AI副業で稼ぐためのポイント</a></li>
                                    <li class="toc-item"><a href="#section5" class="toc-link">よくある質問</a></li>
                                </ul>
                            </div>

                            <!-- 投稿コンテンツ -->
                            <div class="post-content">
                                <?php the_content(); ?>

                                <!-- サンプルコンテンツ（実際はWordPressの投稿内容が表示されます） -->
                                <h2 id="section1">AI副業の始め方</h2>
                                <p>AIを活用した副業は、特別なプログラミングスキルがなくても始められるものが増えています。まずは自分の得意分野や興味がある分野を見つけ、その分野でAIツールをどう活用できるかを考えましょう。</p>
                                <p>最初に必要なのは、AIツールに関する基本的な知識と、それを活用するアイデアです。例えば、ChatGPTのようなAIチャットボットを使えば、文章作成やアイデア出しを効率化できます。</p>

                                <h2 id="section2">AIツールを活用したおすすめの副業5選</h2>
                                <p>AIツールを活用して始められる副業には、様々な種類があります。ここでは特におすすめの5つを紹介します。</p>

                                <h3>1. AIライティング</h3>
                                <p>ChatGPTなどのAIツールを使って、ブログ記事やSNS投稿、商品説明文などのコンテンツを作成する副業です。AIを活用することで、短時間で質の高い文章を生成できますが、最終的な編集や品質チェックは人間が行うことが重要です。</p>

                                <h3>2. AI画像生成</h3>
                                <p>Midjourney、Stable Diffusion、DALL-Eなどの画像生成AIを使って、イラストやデザイン素材を作成する副業です。オリジナルの画像素材をストックサイトで販売したり、クライアントから依頼を受けてデザインを制作したりできます。</p>

                                <blockquote>
                                    <p>AI画像生成は誰でも簡単に始められますが、独自の世界観やスタイルを確立することで差別化できます。また、プロンプトエンジニアリングのスキルを磨くことが重要です。</p>
                                </blockquote>

                                <h3>3. AIを活用したWebサイト制作</h3>
                                <p>AIツールを使ってWebサイトのデザインやコーディングを効率化し、クライアントのWebサイト制作を請け負う副業です。デザイン案の作成からコード生成まで、AIの力を借りることで制作時間を短縮できます。</p>

                                <h3>4. AIチャットボット開発</h3>
                                <p>企業のカスタマーサポート用のチャットボットやLINE公式アカウント用のAIボットの開発を請け負う副業です。専門的なプログラミングスキルがなくても、AIを活用したチャットボットを構築できるプラットフォームが増えています。</p>

                                <h3>5. AI翻訳・校正サービス</h3>
                                <p>AIツールを活用して外国語の翻訳や文章の校正を行うサービスを提供する副業です。AIの翻訳精度は向上していますが、専門分野の知識や文化的背景を理解した人間によるチェックは依然として価値があります。</p>

                                <h2 id="section3">AIを使って効率化できる作業とは</h2>
                                <p>AIツールを活用することで、以下のような作業を効率化できます：</p>

                                <ul>
                                    <li>文章作成（記事、メール、SNS投稿など）</li>
                                    <li>画像生成・編集</li>
                                    <li>データ分析・レポート作成</li>
                                    <li>リサーチ・情報収集</li>
                                    <li>スケジュール管理・タスク整理</li>
                                    <li>音声文字起こし・要約</li>
                                </ul>

                                <p>これらの作業をAIに任せることで、本来人間がやるべき創造的な仕事や戦略立案に時間を割けるようになります。</p>

                                <h2 id="section4">AI副業で稼ぐためのポイント</h2>
                                <p>AI副業で成功するためには、以下のポイントを押さえておくことが重要です：</p>

                                <h3>1. AIの限界を理解する</h3>
                                <p>AIツールは強力ですが、完璧ではありません。事実確認や専門的な知識、独自の視点を加えるのは人間の役割です。AIの出力をそのまま使うのではなく、付加価値を与えることが重要です。</p>

                                <h3>2. 継続的な学習</h3>
                                <p>AI技術は日々進化しています。新しいツールや機能、活用方法を常にキャッチアップし、自分のスキルを更新し続けましょう。</p>

                                <h3>3. ニッチ市場を見つける</h3>
                                <p>特定の業界や分野に特化したAIサービスを提供することで、競争が少ない市場で優位性を確保できます。自分の専門知識とAIを組み合わせた独自のサービスを考えましょう。</p>

                                <h3>4. ポートフォリオの構築</h3>
                                <p>実績を示すためのポートフォリオを作成しましょう。AIを活用して作成した成果物や、クライアントからの評価を集めておくことが重要です。</p>

                                <h2 id="section5">よくある質問</h2>
                                <h3>Q: AI副業を始めるのに必要な投資はどれくらい？</h3>
                                <p>A: 最低限のパソコンとインターネット環境があれば始められます。多くのAIツールは無料プランや低コストの有料プランを提供しています。スキルアップのための学習コストは考慮する必要がありますが、初期投資は比較的少なくて済みます。</p>

                                <h3>Q: AI副業で月にどれくらい稼げる？</h3>
                                <p>A: 副業の種類やスキルレベル、投入する時間によって大きく異なります。月に数万円の小遣い稼ぎから、本業を上回る収入を得ている人まで様々です。重要なのは継続的に取り組み、スキルと実績を積み重ねることです。</p>

                                <h3>Q: プログラミングができなくてもAI副業はできる？</h3>
                                <p>A: はい、可能です。ChatGPTやMidjourneyなど、多くのAIツールはプログラミング知識がなくても直感的に操作できるよう設計されています。ただし、より高度なカスタマイズや効率的な利用のためには、基本的なプログラミングスキルを身につけることも検討すると良いでしょう。</p>
                            </div>

                            <!-- 記事のタグ -->
                            <div class="post-tags">
                                <?php
                                $tags = get_the_tags();
                                if ($tags) {
                                    foreach ($tags as $tag) {
                                        echo '<a href="' . get_tag_link($tag->term_id) . '" class="post-tag">' . esc_html($tag->name) . '</a>';
                                    }
                                }
                                ?>
                            </div>

                            <!-- 5つ星評価 -->
                            <div class="post-rating">
                                <h3 class="rating-title">この記事は参考になりましたか？</h3>
                                <form class="star-rating" id="post-rating-form">
                                    <input type="radio" id="star5" name="rating" value="5" />
                                    <label for="star5">★</label>
                                    <input type="radio" id="star4" name="rating" value="4" />
                                    <label for="star4">★</label>
                                    <input type="radio" id="star3" name="rating" value="3" />
                                    <label for="star3">★</label>
                                    <input type="radio" id="star2" name="rating" value="2" />
                                    <label for="star2">★</label>
                                    <input type="radio" id="star1" name="rating" value="1" />
                                    <label for="star1">★</label>
                                </form>
                                <div class="rating-count">平均評価: <span id="average-rating">4.5</span>/5 (<span id="rating-count">24</span>件の評価)</div>
                            </div>

                            <!-- シェアボタン -->
                            <div class="post-share">
                                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="share-button share-twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-button share-facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://line.me/R/msg/text/?<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" target="_blank" class="share-button share-line">
                                    <i class="fab fa-line"></i>
                                </a>
                            </div>
                        </div>
                    </article>

                    <!-- 著者プロフィール -->
                    <div class="author-bio">
                        <div class="author-bio-avatar"><?php echo substr(get_the_author(), 0, 1); ?></div>
                        <div class="author-bio-content">
                            <h3 class="author-bio-name"><?php the_author(); ?></h3>
                            <p class="author-bio-description">
                                AI技術とマーケティングの専門家。10年以上のWebマーケティング経験を持ち、現在はAIを活用したビジネス戦略のコンサルタントとして活動。複数のオンラインメディアで執筆活動も行っている。
                            </p>
                            <div class="author-social">
                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- 前後の記事へのナビゲーション -->
                    <div class="post-navigation">
                        <?php
                        $prev_post = get_previous_post();
                        if (!empty($prev_post)) :
                        ?>
                            <a href="<?php echo get_permalink($prev_post->ID); ?>" class="post-nav-link post-nav-previous">
                                <span class="post-nav-label">前の記事</span>
                                <span class="post-nav-title"><?php echo esc_html($prev_post->post_title); ?></span>
                            </a>
                        <?php else : ?>
                            <div class="post-nav-link post-nav-empty"></div>
                        <?php endif; ?>

                        <?php
                        $next_post = get_next_post();
                        if (!empty($next_post)) :
                        ?>
                            <a href="<?php echo get_permalink($next_post->ID); ?>" class="post-nav-link post-nav-next">
                                <span class="post-nav-label">次の記事</span>
                                <span class="post-nav-title"><?php echo esc_html($next_post->post_title); ?></span>
                            </a>
                        <?php else : ?>
                            <div class="post-nav-link post-nav-empty"></div>
                        <?php endif; ?>
                    </div>

                    <!-- 関連記事 -->
                    <div class="related-posts">
                        <h2 class="related-posts-title">関連記事</h2>
                        <div class="related-posts-grid">
                            <?php
                            // 現在の投稿のカテゴリーを取得
                            $categories = get_the_category();
                            $category_ids = array();

                            foreach ($categories as $category) {
                                $category_ids[] = $category->term_id;
                            }

                            // 関連記事を表示
                            $related_args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'post__not_in' => array(get_the_ID()),
                                'category__in' => $category_ids,
                                'orderby' => 'rand'
                            );

                            $related_query = new WP_Query($related_args);

                            if ($related_query->have_posts()) :
                                while ($related_query->have_posts()) : $related_query->the_post();
                            ?>
                                    <div class="related-post-card">
                                        <div class="related-post-image">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('medium'); ?>
                                            <?php else : ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/default.jpg" alt="<?php the_title_attribute(); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="related-post-content">
                                            <h3 class="related-post-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <div class="related-post-meta">
                                                <span class="related-post-date"><?php echo get_the_date('Y.m.d'); ?></span>
                                                <span class="related-post-category">
                                                    <?php
                                                    $categories = get_the_category();
                                                    if ($categories) {
                                                        echo esc_html($categories[0]->name);
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<p>関連記事はありません。</p>';
                            endif;
                            ?>
                        </div>
                    </div>
            <?php endwhile;
            endif; ?>
        </div>

        <!-- サイドバー -->
        <aside class="post-sidebar">
            <!-- 人気の記事 -->
            <div class="sidebar-section">
                <h3 class="sidebar-title">人気の記事</h3>
                <?php
                // 人気記事を表示（例として投稿日が新しい順）
                $popular_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 5,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );

                $popular_query = new WP_Query($popular_args);

                if ($popular_query->have_posts()) :
                    while ($popular_query->have_posts()) : $popular_query->the_post();
                ?>
                        <div class="popular-post">
                            <div class="popular-post-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/default-thumb.jpg" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="popular-post-content">
                                <h4 class="popular-post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                                <div class="popular-post-meta"><?php echo get_the_date('Y.m.d'); ?></div>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <!-- カテゴリー -->
            <div class="sidebar-section">
                <h3 class="sidebar-title">カテゴリー</h3>
                <ul class="sidebar-categories">
                    <?php
                    $categories = get_categories(array(
                        'orderby' => 'count',
                        'order' => 'DESC',
                        'hide_empty' => true,
                    ));

                    foreach ($categories as $category) {
                        echo '<li class="sidebar-category-item">';
                        echo '<a href="' . get_category_link($category->term_id) . '" class="sidebar-category-link">' . esc_html($category->name) . '</a>';
                        echo '<span class="sidebar-category-count">' . $category->count . '</span>';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>

            <!-- CTAバナー -->
            <div class="sidebar-section sidebar-cta">
                <h3 class="sidebar-cta-title">今すぐAI副業を始めよう！</h3>
                <p class="sidebar-cta-description">無料のAIツール活用ガイドをダウンロードして、効率的な副業の始め方を学びましょう。</p>
                <a href="#" class="btn">無料ガイドをダウンロード</a>
            </div>
        </aside>

    </div>
</div>

<!-- フローティングシェアボタン -->
<div class="floating-share">
    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="floating-share-button share-twitter">
        <i class="fab fa-twitter"></i>
    </a>
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="floating-share-button share-facebook">
        <i class="fab fa-facebook-f"></i>
    </a>
    <a href="https://line.me/R/msg/text/?<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" target="_blank" class="floating-share-button share-line">
        <i class="fab fa-line"></i>
    </a>
</div>

<!-- 評価を処理するJavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ratingForm = document.getElementById('post-rating-form');
        const stars = ratingForm.querySelectorAll('input[type="radio"]');

        stars.forEach(star => {
            star.addEventListener('change', function() {
                const rating = this.value;
                submitRating(rating);
            });
        });

        function submitRating(rating) {
            // ここでWordPressにAJAXリクエストを送信して評価を保存する
            // 例: /wp-admin/admin-ajax.phpにリクエストを送る
            const data = new FormData();
            data.append('action', 'save_post_rating');
            data.append('post_id', <?php echo get_the_ID(); ?>);
            data.append('rating', rating);

            fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
                    method: 'POST',
                    credentials: 'same-origin',
                    body: data
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // 評価が成功したら、平均評価と評価数を更新
                        document.getElementById('average-rating').textContent = data.average;
                        document.getElementById('rating-count').textContent = data.count;

                        // ユーザーにフィードバックを表示
                        alert('評価ありがとうございます！');
                    } else {
                        alert('評価の送信中にエラーが発生しました。後でもう一度お試しください。');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('エラーが発生しました。後でもう一度お試しください。');
                });
        }
    });
</script>

<?php get_footer(); ?>