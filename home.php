<?php

/**
 * Template Name: コラム一覧
 * Template Post Type: page
 */

get_header();


?>


<style>
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
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">ホーム</a></li>
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
                    <select class="filter-select" onchange="location.href=this.value;">
                        <?php
                        // 現在のURLを取得
                        $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        $base_url = strtok($current_url, '?'); // クエリパラメータを除去

                        // 現在のクエリパラメータを保持（catパラメータは除く）
                        $query_args = array();
                        foreach ($_GET as $key => $value) {
                            if ($key !== 'cat' && $key !== 'paged') {
                                $query_args[$key] = $value;
                            }
                        }

                        // 「すべてのカテゴリー」のURL
                        $all_cats_url = add_query_arg($query_args, $base_url);

                        // 現在選択されているカテゴリー
                        $current_cat = isset($_GET['cat']) ? intval($_GET['cat']) : 0;

                        // 「すべてのカテゴリー」オプション
                        $selected = ($current_cat === 0) ? 'selected' : '';
                        echo sprintf(
                            '<option value="%s" %s>すべてのカテゴリー</option>',
                            esc_url($all_cats_url),
                            $selected
                        );

                        // カテゴリー一覧を取得
                        $categories = get_categories(array(
                            'orderby' => 'count',
                            'order' => 'DESC',
                            'hide_empty' => true
                        ));

                        // 各カテゴリーのオプションを生成
                        foreach ($categories as $category) {
                            $cat_args = array_merge($query_args, array('cat' => $category->term_id));
                            $selected = ($current_cat == $category->term_id) ? 'selected' : '';

                            echo sprintf(
                                '<option value="%s" %s>%s (%s)</option>',
                                esc_url(add_query_arg($cat_args, $base_url)),
                                $selected,
                                esc_html($category->name),
                                $category->count
                            );
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <span class="filter-label">並び替え</span>
                    <select class="filter-select" onchange="location.href=this.value;">
                        <?php
                        $current_orderby = isset($_GET['orderby']) ? $_GET['orderby'] : 'newest';
                        $order_options = array(
                            'newest' => '新着順',
                            'popular' => '人気順',
                            'view' => '閲覧数順'
                        );

                        foreach ($order_options as $value => $label) {
                            $selected = ($current_orderby === $value) ? 'selected' : '';
                            $url = add_query_arg('orderby', $value, remove_query_arg('paged', get_permalink()));
                            echo sprintf(
                                '<option value="%s" %s>%s</option>',
                                esc_url($url),
                                $selected,
                                esc_html($label)
                            );
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="filter-right">
                <form role="search" method="get" class="original-search-box" action="<?php echo get_permalink(); ?>">
                    <input type="hidden" name="page_id" value="<?php echo get_the_ID(); ?>">
                    <input type="text" class="search-input" placeholder="キーワードで検索..." name="s" value="<?php echo isset($_GET['s']) ? esc_attr($_GET['s']) : ''; ?>">
                    <button type="submit" class="search-button">検索</button>
                </form>
            </div>
        </div>
        <div class="category-pills">
            <?php
            // 現在のURLからベースURLを動的に取得
            $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $base_url = strtok($current_url, '?'); // クエリパラメータを除去

            // 現在のクエリパラメータを保持（catパラメータは除く）
            $query_args = array();
            foreach ($_GET as $key => $value) {
                if ($key !== 'cat' && $key !== 'paged') {
                    $query_args[$key] = $value;
                }
            }

            // 現在選択されているカテゴリー
            $current_cat = isset($_GET['cat']) ? intval($_GET['cat']) : 0;

            // すべてのリンク
            $all_class = empty($current_cat) ? 'category-pill active' : 'category-pill';
            echo '<a href="' . esc_url(add_query_arg($query_args, $base_url)) . '" class="' . $all_class . '">すべて</a>';

            // カテゴリーピル
            $categories = get_categories(array(
                'orderby' => 'count',
                'order' => 'DESC',
                'hide_empty' => true
            ));

            foreach ($categories as $category) {
                $active_class = ($current_cat == $category->term_id) ? 'category-pill active' : 'category-pill';
                $cat_args = array_merge($query_args, array('cat' => $category->term_id));

                echo sprintf(
                    '<a href="%s" class="%s">%s</a>',
                    esc_url(add_query_arg($cat_args, $base_url)),
                    $active_class,
                    esc_html($category->name)
                );
            }
            ?>
        </div>
    </div>
</section>

<!-- コラム一覧 -->
<section class="columns-section">
    <div class="container">
        <!-- おすすめコラム -->
        <h2 class="section-title">ピックアップコラム</h2>
        <p class="section-subtitle">特におすすめの記事をピックアップしています</p>

        <?php
        // ピックアップ記事を取得
        $pickup_args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'meta_key' => '_is_pickup',
            'meta_value' => '1'
        );
        $pickup_query = new WP_Query($pickup_args);

        if ($pickup_query->have_posts()) :
            while ($pickup_query->have_posts()) : $pickup_query->the_post();
        ?>
                <div class="featured-column">
                    <div class="featured-column-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large'); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/default.jpg" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="featured-column-content">
                        <span class="featured-label">
                            <?php
                            $categories = get_the_category();
                            if ($categories) {
                                echo esc_html($categories[0]->name);
                            }
                            ?>
                        </span>
                        <h3 class="featured-column-title"><?php the_title(); ?></h3>
                        <div class="featured-column-meta">
                            <div class="column-date"><?php echo get_the_date('Y年n月j日'); ?></div>
                            <div class="column-author">
                                <div class="column-author-avatar"><?php echo substr(get_the_author(), 0, 1); ?></div>
                                <?php the_author(); ?>
                            </div>
                        </div>
                        <p class="featured-column-description">
                            <?php echo wp_trim_words(get_the_excerpt(), 100); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="read-more">続きを読む</a>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
        else:
            ?>
            <!-- ピックアップ記事が設定されていない場合の表示 -->
            <div class="no-pickup-message">
                現在ピックアップ記事は設定されていません。
            </div>
        <?php
        endif;
        ?>

        <!-- 最新コラム -->
        <div class="columns-heading">
            <?php
            // 投稿の総数を取得
            $total_posts = wp_count_posts()->publish;
            ?>
            <h2 class="columns-title">最新コラム <span class="columns-count">全<?php echo $total_posts; ?>件</span></h2>
        </div>

        <div class="columns-grid">
            <?php
            // ページネーションのための設定
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            if (empty($paged) && isset($_GET['paged'])) {
                $paged = intval($_GET['paged']);
            }

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 1, // 1ページあたりの表示数
                'paged' => $paged,
                'orderby' => 'date',
                'order' => 'DESC'
            );

            // カテゴリーフィルターが適用されている場合
            if (isset($_GET['cat']) && !empty($_GET['cat'])) {
                $args['cat'] = intval($_GET['cat']);
            }

            // 検索クエリが適用されている場合
            if (isset($_GET['s']) && !empty($_GET['s'])) {
                $args['s'] = sanitize_text_field($_GET['s']);
            }

            // 並び替えが適用されている場合
            if (isset($_GET['orderby'])) {
                switch ($_GET['orderby']) {
                    case 'popular':
                        $args['meta_key'] = 'post_views_count'; // 人気順（閲覧数のカスタムフィールドを使用）
                        $args['orderby'] = 'meta_value_num';
                        $args['order'] = 'DESC';
                        break;
                    case 'oldest':
                        $args['orderby'] = 'date';
                        $args['order'] = 'ASC';
                        break;
                        // デフォルトは新着順（date DESC）
                }
            }

            $the_query = new WP_Query($args);

            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                    <div class="column-card">
                        <div class="column-image">
                            <div class="column-category">
                                <?php
                                $categories = get_the_category();
                                if ($categories) {
                                    echo esc_html($categories[0]->name);
                                }
                                ?>
                            </div>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large'); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/default.jpg" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="column-content">
                            <div class="column-meta">
                                <div class="column-date"><?php echo get_the_date('Y年n月j日'); ?></div>
                                <div class="column-author">
                                    <div class="column-author-avatar"><?php echo substr(get_the_author(), 0, 1); ?></div>
                                    <?php the_author(); ?>
                                </div>
                            </div>
                            <h3 class="column-title"><?php the_title(); ?></h3>
                            <p class="column-description"><?php echo wp_trim_words(get_the_excerpt(), 60); ?></p>
                            <div class="column-tags">
                                <?php
                                $tags = get_the_tags();
                                if ($tags) :
                                    foreach ($tags as $tag) :
                                ?>
                                        <span class="column-tag"><?php echo esc_html($tag->name); ?></span>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="read-more">続きを読む</a>
                        </div>
                    </div>
            <?php
                endwhile;
            else:
                echo '<div class="no-posts-found">記事が見つかりませんでした。</div>';
            endif;
            ?>
        </div>

        <!-- ページネーション -->
        <?php if ($the_query->max_num_pages > 1) : ?>
            <div class="pagination">
                <?php
                // 現在のページ番号
                $current_page = max(1, $paged);
                $total_pages = $the_query->max_num_pages;

                // 現在のURLからベースURLを動的に取得
                $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $base_url = strtok($current_url, '?'); // クエリパラメータを除去

                // 現在のクエリパラメータを保持
                $query_args = array();

                // カテゴリーフィルターが適用されている場合
                if (isset($_GET['cat']) && !empty($_GET['cat'])) {
                    $query_args['cat'] = intval($_GET['cat']);
                }

                // 検索クエリが適用されている場合
                if (isset($_GET['s']) && !empty($_GET['s'])) {
                    $query_args['s'] = sanitize_text_field($_GET['s']);
                }

                // 並び替えが適用されている場合
                if (isset($_GET['orderby']) && !empty($_GET['orderby'])) {
                    $query_args['orderby'] = sanitize_text_field($_GET['orderby']);
                }

                // 前へボタン
                if ($current_page > 1) {
                    echo '<div class="page-item">';
                    $prev_args = array_merge($query_args, array('paged' => $current_page - 1));
                    echo '<a href="' . esc_url(add_query_arg($prev_args, $base_url)) . '" class="page-link page-prev">前へ</a>';
                    echo '</div>';
                } else {
                    echo '<div class="page-item disabled"><span class="page-link page-prev">前へ</span></div>';
                }

                // ページ番号
                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($i == $current_page) {
                        echo '<div class="page-item active"><span class="page-link">' . $i . '</span></div>';
                    } else {
                        echo '<div class="page-item">';
                        $page_args = array_merge($query_args, array('paged' => $i));
                        echo '<a href="' . esc_url(add_query_arg($page_args, $base_url)) . '" class="page-link">' . $i . '</a>';
                        echo '</div>';
                    }
                }

                // 次へボタン
                if ($current_page < $total_pages) {
                    echo '<div class="page-item">';
                    $next_args = array_merge($query_args, array('paged' => $current_page + 1));
                    echo '<a href="' . esc_url(add_query_arg($next_args, $base_url)) . '" class="page-link page-next">次へ</a>';
                    echo '</div>';
                } else {
                    echo '<div class="page-item disabled"><span class="page-link page-next">次へ</span></div>';
                }
                ?>
            </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</section>

<?php get_footer(); ?>