<?php
/*
Template Name: TOP
*/

get_header();
?>

<!-- ヒーローセクション -->
<section class="hero">
    <div class="container">
        <div class="hero-container">
            <div class="hero-content">
                <h2 class="hero-title"><span>理想のAIツール</span>に出会えるプラットフォーム</h2>
                <p class="hero-description">今日から使える業種別の最適なAIツールを厳選紹介。あなたにピッタリのAIツールを探してみましょう。</p>
                <div class="hero-buttons">
                    <a href="<?php echo home_url('/#ai-tools-list'); ?>" class="btn">AIツールを探す</a>
                    <a href="<?php echo home_url('/about'); ?>" class="btn btn-outline">当サイトについて</a>
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
        <h2 class="section-title">業種から探す</h2>
        <p class="section-subtitle">あなたの副業スタイルに合わせた最適なAIツールをカテゴリから見つけることができます</p>

        <div class="category-nav">
            <?php
            // カテゴリを取得
            $categories = get_terms(array(
                'taxonomy' => 'ai_category',
                'hide_empty' => false,
                'orderby' => 'name',
                'order' => 'ASC'
            ));

            // 「すべて」のカテゴリアイコンを追加
            echo '<a href="javascript:void(0)" class="category-icon-item active" data-category="all">';
            echo '<div class="category-icon-box">';
            echo '<img src="' . get_theme_file_uri('assets/images/category_icon/cagegory_icon_all.svg') . '" alt="すべて">';
            echo '</div>';
            echo '<p class="category-icon-text">すべて</p>';
            echo '</a>';

            // カテゴリアイコンを表示（カテゴリに設定されたアイコンを使用）
            foreach ($categories as $category) {
                // カテゴリに設定されたアイコン画像IDを取得
                $image_id = get_term_meta($category->term_id, 'ai_category_image', true);
                $icon_url = '';

                if ($image_id && wp_attachment_is_image($image_id)) {
                    // アイコン画像のURLを取得
                    $icon_url = wp_get_attachment_image_url($image_id, 'thumbnail');
                } else {
                    // デフォルトアイコン（アイコンが設定されていない場合）
                    $icon_url = get_theme_file_uri('assets/images/category_icon/cagegory_icon1.svg');
                }

                echo '<a href="javascript:void(0)" class="category-icon-item" data-category="' . esc_attr($category->slug) . '" data-category-id="' . esc_attr($category->term_id) . '">';
                echo '<div class="category-icon-box">';
                echo '<img src="' . esc_url($icon_url) . '" alt="' . esc_attr($category->name) . '">';
                echo '</div>';
                echo '<p class="category-icon-text">' . esc_html($category->name) . '</p>';
                echo '</a>';
            }
            ?>
        </div>
    </div>
</section>

<!-- AIツール一覧セクション -->
<section class="ai-tools" id="ai-tools-list">
    <div class="container">
        <h2 class="section-title">AIツール一覧</h2>
        <p class="section-subtitle">副業に役立つ厳選された生成AIツールを紹介。作業効率を高め、クオリティを向上させよう</p>

        <div class="tools-header">
            <h3 class="tools-title">全<?php echo wp_count_posts('ai_tool')->publish; ?>件の生成AIツール</h3>
            <div class="tools-filter">
                <div class="tools-filter-detail" id="open-filter-modal">
                    <img src="<?php echo get_theme_file_uri('assets/images/common/search.svg'); ?>" alt="詳細条件" class="filter-icon" style="width: 20px; height: 20px; vertical-align: middle; position: relative; top: -1px;">
                    <span class="tools-filter-label">詳細条件を追加</span>
                </div>
                <select class="tools-filter-select" id="category-filter">
                    <option value="all">すべての業種</option>
                    <?php
                    // カテゴリを取得
                    $categories = get_terms(array(
                        'taxonomy' => 'ai_category',
                        'hide_empty' => false,
                    ));

                    // カテゴリオプションを生成
                    foreach ($categories as $category) {
                        echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
                    }
                    ?>
                </select>
                <select class="tools-filter-select" id="sort-filter">
                    <!-- <option value="popular">人気順</option> -->
                    <option value="newest">新着順</option>
                    <option value="rating">評価順</option>
                </select>
            </div>
        </div>

        <div class="top-search-box">
            <input type="text" class="search-input" placeholder="キーワードでAIツールを検索..." id="ai-tool-search">
            <button class="search-button" id="ai-tool-search-button">検索</button>
        </div>

        <div class="tools-grid" id="tools-grid-container">
            <?php
            // AIツールを取得
            $args = array(
                'post_type' => 'ai_tool',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $ai_tools = new WP_Query($args);

            if ($ai_tools->have_posts()) :
                while ($ai_tools->have_posts()) : $ai_tools->the_post();
                    // カテゴリーを取得
                    $categories = get_the_terms(get_the_ID(), 'ai_category');
                    // 評価を取得
                    $rating = get_post_meta(get_the_ID(), '_tool_rating', true);
                    if (!$rating) {
                        $rating = 0;
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
                    // ギャラリー画像を取得
                    $gallery_images = get_post_meta(get_the_ID(), '_gallery_images', true);
                    $thumbnail_url = '';
                    if ($gallery_images && isset($gallery_images[0])) {
                        $thumbnail_url = wp_get_attachment_image_url($gallery_images[0], 'medium');
                    } elseif (has_post_thumbnail()) {
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    }
            ?>
                    <!-- ツールカード -->
                    <div class="tool-card">
                        <a href="<?php the_permalink(); ?>" class="tool-link">
                            <div class="tool-image">
                                <?php if ($thumbnail_url) : ?>
                                    <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php else : ?>
                                    <!-- パスを修正 -->
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/no-image.png" alt="画像なし">
                                <?php endif; ?>
                            </div>
                            <div class="tool-content">
                                <div class="tool-tags">
                                    <?php if ($categories) : ?>
                                        <?php foreach ($categories as $category) : ?>
                                            <span class="tool-tag"><?php echo esc_html($category->name); ?></span>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <h3 class="tool-title"><?php the_title(); ?></h3>
                                <p class="tool-description"><?php echo wp_trim_words(get_the_excerpt(), 40); ?></p>
                                <div class="tool-meta">
                                    <div class="tool-rating">
                                        <span class="stars">
                                            <?php
                                            $stars = '';
                                            $full_stars = floor($rating);
                                            $half_star = ($rating - $full_stars) >= 0.5;
                                            $empty_stars = 5 - $full_stars - ($half_star ? 1 : 0);

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
                                        </span>
                                        <span class="rating-value"><?php echo number_format($rating, 1); ?></span>
                                    </div>
                                    <div class="tool-price <?php echo $has_free_plan ? 'free' : 'paid'; ?>">
                                        <?php echo $has_free_plan ? '無料プランあり' : '有料'; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p>現在登録されているAIツールはありません。</p>
            <?php endif; ?>
        </div>

        <div class="pagination" id="tools-pagination">
            <?php
            $current_page = max(1, get_query_var('paged'));
            $total_pages = $ai_tools->max_num_pages;

            // 前へリンク
            if ($current_page > 1) {
                echo '<div class="page-item">';
                echo '<a href="javascript:void(0)" class="page-link page-prev" data-page="' . ($current_page - 1) . '">前へ</a>';
                echo '</div>';
            } else {
                echo '<div class="page-item disabled">';
                echo '<span class="page-link page-prev">前へ</span>';
                echo '</div>';
            }

            // ページ番号リンク
            $start_page = max(1, $current_page - 2);
            $end_page = min($total_pages, $start_page + 4);

            if ($start_page > 1) {
                echo '<div class="page-item">';
                echo '<a href="javascript:void(0)" class="page-link" data-page="1">1</a>';
                echo '</div>';

                if ($start_page > 2) {
                    echo '<div class="page-item disabled">';
                    echo '<span class="page-link">...</span>';
                    echo '</div>';
                }
            }

            for ($i = $start_page; $i <= $end_page; $i++) {
                if ($i == $current_page) {
                    echo '<div class="page-item active">';
                    echo '<span class="page-link">' . $i . '</span>';
                    echo '</div>';
                } else {
                    echo '<div class="page-item">';
                    echo '<a href="javascript:void(0)" class="page-link" data-page="' . $i . '">' . $i . '</a>';
                    echo '</div>';
                }
            }

            if ($end_page < $total_pages) {
                if ($end_page < $total_pages - 1) {
                    echo '<div class="page-item disabled">';
                    echo '<span class="page-link">...</span>';
                    echo '</div>';
                }

                echo '<div class="page-item">';
                echo '<a href="javascript:void(0)" class="page-link" data-page="' . $total_pages . '">' . $total_pages . '</a>';
                echo '</div>';
            }

            // 次へリンク
            if ($current_page < $total_pages) {
                echo '<div class="page-item">';
                echo '<a href="javascript:void(0)" class="page-link page-next" data-page="' . ($current_page + 1) . '">次へ</a>';
                echo '</div>';
            } else {
                echo '<div class="page-item disabled">';
                echo '<span class="page-link page-next">次へ</span>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>

<!-- 新着コラムセクション -->
<section class="section">
    <div class="container">
        <h2 class="section-title">新着コラム</h2>
        <p class="section-subtitle">副業とAIに関する最新の情報やノウハウを専門家が解説します</p>
        <div class="tools-grid">
            <?php
            // 最新の投稿3件を取得
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $latest_posts = new WP_Query($args);

            if ($latest_posts->have_posts()) :
                while ($latest_posts->have_posts()) : $latest_posts->the_post();
            ?>
                    <!-- コラムカード -->
                    <div class="tool-card">
                        <div class="tool-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large'); ?>
                            <?php else : ?>
                                <img src="/api/placeholder/400/160" alt="コラム画像">
                            <?php endif; ?>
                        </div>
                        <div class="tool-content">
                            <div class="tool-tags">
                                <?php
                                $categories = get_the_category();
                                if ($categories) :
                                    foreach ($categories as $category) :
                                ?>
                                        <span class="tool-tag"><?php echo esc_html($category->name); ?></span>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                            <h3 class="tool-title"><?php the_title(); ?></h3>
                            <p class="tool-description"><?php echo wp_trim_words(get_the_excerpt(), 60); ?></p>
                            <div class="tool-meta">
                                <div class="tool-rating">
                                    <span><?php echo get_the_date('Y年n月j日'); ?></span>
                                </div>
                                <div class="tool-price">
                                    <a href="<?php the_permalink(); ?>">続きを読む</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <!-- 投稿がない場合 -->
                <p>現在コラムはありません。</p>
            <?php endif; ?>
        </div>

        <div style="text-align: center; margin-top: 40px;">
            <a href="<?php echo home_url('/column/'); ?>" class="btn">もっと見る</a>
        </div>
    </div>
</section>

<!-- 詳細条件モーダル -->
<!-- 詳細条件モーダル -->
<div id="filter-modal" class="filter-modal">
    <div class="filter-modal-content">
        <div class="filter-modal-header">
            <h3>詳細検索条件</h3>
            <span class="filter-modal-close">&times;</span>
        </div>
        <div class="filter-modal-body">
            <!-- キーワード検索 -->
            <div class="filter-section">
                <h4>キーワード</h4>
                <div class="filter-search-container">
                    <input type="text" id="modal-keyword-search" class="filter-search-input" placeholder="AIツールを検索...">
                    <div class="filter-search-icon">
                        <img src="<?php echo get_theme_file_uri('assets/images/common/search.svg'); ?>" alt="検索">
                    </div>
                </div>
            </div>

            <!-- 業種 -->
            <div class="filter-section">
                <h4>業種</h4>
                <div class="filter-tags">
                    <?php
                    // 業種カテゴリを取得
                    $categories = get_terms(array(
                        'taxonomy' => 'ai_category',
                        'hide_empty' => false,
                    ));
                    foreach ($categories as $category) {
                        echo '<label class="filter-tag">';
                        echo '<input type="checkbox" name="category[]" value="' . esc_attr($category->slug) . '" class="filter-tag-input"> ';
                        echo '<span class="filter-tag-text">' . esc_html($category->name) . '</span>';
                        echo '</label>';
                    }
                    ?>
                </div>
            </div>

            <!-- 機能 -->
            <div class="filter-section">
                <h4>機能</h4>
                <div class="filter-tags">
                    <?php
                    // 機能カテゴリを取得
                    $features = get_terms(array(
                        'taxonomy' => 'ai_feature',
                        'hide_empty' => false,
                    ));
                    if (!is_wp_error($features) && !empty($features)) {
                        foreach ($features as $feature) {
                            echo '<label class="filter-tag">';
                            echo '<input type="checkbox" name="feature[]" value="' . esc_attr($feature->slug) . '" class="filter-tag-input"> ';
                            echo '<span class="filter-tag-text">' . esc_html($feature->name) . '</span>';
                            echo '</label>';
                        }
                    } else {
                        echo '<p>機能カテゴリがありません</p>';
                    }
                    ?>
                </div>
            </div>

            <!-- 目的 -->
            <div class="filter-section">
                <h4>目的</h4>
                <div class="filter-tags">
                    <?php
                    // 目的カテゴリを取得
                    $purposes = get_terms(array(
                        'taxonomy' => 'ai_purpose',
                        'hide_empty' => false,
                    ));
                    if (!is_wp_error($purposes) && !empty($purposes)) {
                        foreach ($purposes as $purpose) {
                            echo '<label class="filter-tag">';
                            echo '<input type="checkbox" name="purpose[]" value="' . esc_attr($purpose->slug) . '" class="filter-tag-input"> ';
                            echo '<span class="filter-tag-text">' . esc_html($purpose->name) . '</span>';
                            echo '</label>';
                        }
                    } else {
                        echo '<p>目的カテゴリがありません</p>';
                    }
                    ?>
                </div>
            </div>

            <!-- 並び替え -->
            <div class="filter-section">
                <h4>並び替え</h4>
                <div class="filter-select-container">
                    <select id="modal-sort-filter" class="filter-select">
                        <option value="newest">新着順</option>
                        <option value="rating">評価順</option>
                        <option value="popular">人気順</option>
                    </select>
                    <div class="filter-select-arrow"></div>
                </div>
            </div>

            <!-- 無料プランフィルター -->
            <div class="filter-section filter-checkbox-section">
                <label class="filter-checkbox">
                    <input type="checkbox" name="free_plan" id="free-plan-filter">
                    <span class="filter-checkbox-text">無料プランのあるツールのみ表示</span>
                </label>
            </div>
        </div>
        <div class="filter-modal-footer">
            <button id="reset-filter" class="btn btn-outline">リセット</button>
            <button id="apply-filter" class="btn">検索する</button>
        </div>
    </div>
</div>
<?php get_footer(); ?>

<style>
    /* 詳細検索モーダルのスタイル */
    .filter-modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .filter-modal-content {
        background-color: var(--bg);
        margin: 5% auto;
        max-width: 500px;
        width: 90%;
        border-radius: 8px;
        box-shadow: var(--shadow);
        animation: modalFadeIn 0.3s;
        max-height: 90vh;
        display: flex;
        flex-direction: column;
    }

    @keyframes modalFadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .filter-modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        border-bottom: 1px solid var(--border);
    }

    .filter-modal-header h3 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
        color: var(--text);
    }

    .filter-modal-close {
        color: var(--text-light);
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
        line-height: 1;
    }

    .filter-modal-close:hover {
        color: var(--main-color);
    }

    .filter-modal-body {
        padding: 20px;
        overflow-y: auto;
        flex: 1;
    }

    .filter-section {
        margin-bottom: 20px;
    }

    .filter-section h4 {
        font-size: 14px;
        font-weight: 600;
        margin: 0 0 10px 0;
        padding-bottom: 5px;
        border-bottom: 1px solid var(--border);
        color: var(--text);
    }

    /* タグスタイルのチェックボックス */
    .filter-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 12px;
    }

    .filter-tag {
        display: inline-block;
        position: relative;
        margin: 0;
        cursor: pointer;
    }

    .filter-tag-input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .filter-tag-text {
        display: inline-block;
        padding: 6px 10px;
        font-size: 12px;
        border-radius: 4px;
        border: 1px solid var(--border);
        background-color: var(--bg);
        color: var(--text);
        transition: all 0.2s ease;
    }

    .filter-tag-input:checked+.filter-tag-text {
        background-color: var(--main-light);
        border-color: var(--main-color);
        color: var(--main-dark);
    }

    .filter-tag:hover .filter-tag-text {
        border-color: var(--main-color);
    }

    /* 検索入力フィールド */
    .filter-search-container {
        position: relative;
        margin-top: 8px;
    }

    .filter-search-input {
        width: 100%;
        padding: 8px 10px 8px 35px;
        border: 1px solid var(--border);
        border-radius: 4px;
        font-size: 14px;
        color: var(--text);
        background-color: var(--bg);
    }

    .filter-search-input:focus {
        outline: none;
        border-color: var(--main-color);
    }

    .filter-search-icon {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        width: 16px;
        height: 16px;
        opacity: 0.6;
    }

    /* セレクトボックス */
    .filter-select-container {
        position: relative;
        margin-top: 8px;
    }

    .filter-select {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid var(--border);
        border-radius: 4px;
        font-size: 14px;
        color: var(--text);
        background-color: var(--bg);
        appearance: none;
        cursor: pointer;
    }

    .filter-select:focus {
        outline: none;
        border-color: var(--main-color);
    }

    .filter-select-arrow {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid var(--text-light);
        pointer-events: none;
    }

    /* チェックボックス */
    .filter-checkbox-section {
        margin-top: 15px;
    }

    .filter-checkbox {
        display: flex;
        align-items: center;
        cursor: pointer;
        margin-bottom: 8px;
    }

    .filter-checkbox input[type="checkbox"] {
        margin-right: 8px;
        cursor: pointer;
        accent-color: var(--main-color);
        width: 16px;
        height: 16px;
    }

    .filter-checkbox-text {
        font-size: 14px;
        color: var(--text);
    }

    /* フッター */
    .filter-modal-footer {
        padding: 15px 20px;
        text-align: right;
        border-top: 1px solid var(--border);
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    /* レスポンシブ対応 */
    @media (max-width: 576px) {
        .filter-modal-content {
            margin: 0;
            width: 100%;
            height: 100%;
            max-height: 100%;
            border-radius: 0;
        }

        .filter-modal-body {
            padding: 15px;
        }

        .filter-modal-footer {
            padding: 15px;
        }

        .filter-tags {
            gap: 6px;
        }

        .filter-tag-text {
            padding: 5px 8px;
            font-size: 11px;
        }
    }
</style>


<!-- jQueryを使用したスクリプト -->
<?php get_footer(); ?>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        // モーダル要素
        const filterModal = document.getElementById('filter-modal');
        const openFilterModal = document.getElementById('open-filter-modal');
        const closeFilterModal = document.querySelector('.filter-modal-close');
        const applyFilterBtn = document.getElementById('apply-filter');
        const resetFilterBtn = document.getElementById('reset-filter');
        const modalKeywordSearch = document.getElementById('modal-keyword-search');
        const freePlanFilter = document.getElementById('free-plan-filter');
        const modalSortFilter = document.getElementById('modal-sort-filter');

        // セレクトボックス（ページ上部の既存フィルター）
        const categoryFilter = document.getElementById('category-filter');
        const sortFilter = document.getElementById('sort-filter');
        const keywordSearch = document.getElementById('ai-tool-search');

        // モーダルを開いたときに既存の選択状態を反映する
        function syncFiltersToModal() {
            // キーワード検索を同期
            if (keywordSearch && modalKeywordSearch) {
                modalKeywordSearch.value = keywordSearch.value;
            }

            // 並び替え選択を同期
            if (sortFilter && modalSortFilter) {
                modalSortFilter.value = sortFilter.value;
            }

            // カテゴリ選択を同期
            if (categoryFilter) {
                const selectedCategory = categoryFilter.value;
                if (selectedCategory && selectedCategory !== 'all') {
                    const categoryCheckbox = filterModal.querySelector(`input[name="category[]"][value="${selectedCategory}"]`);
                    if (categoryCheckbox) {
                        categoryCheckbox.checked = true;
                    }
                }
            }
        }

        // モーダルを開く
        if (openFilterModal) {
            openFilterModal.addEventListener('click', function() {
                syncFiltersToModal();
                filterModal.style.display = 'block';
                document.body.style.overflow = 'hidden'; // スクロールを無効化
            });
        }

        // モーダルを閉じる
        if (closeFilterModal) {
            closeFilterModal.addEventListener('click', function() {
                filterModal.style.display = 'none';
                document.body.style.overflow = ''; // スクロールを有効化
            });
        }

        // モーダル外クリックで閉じる
        window.addEventListener('click', function(event) {
            if (event.target === filterModal) {
                filterModal.style.display = 'none';
                document.body.style.overflow = ''; // スクロールを有効化
            }
        });

        // フィルターをリセット
        if (resetFilterBtn) {
            resetFilterBtn.addEventListener('click', function() {
                // チェックボックスをリセット
                const checkboxes = filterModal.querySelectorAll('input[type="checkbox"]');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });

                // キーワード検索をリセット
                if (modalKeywordSearch) {
                    modalKeywordSearch.value = '';
                }

                // 並び替えをデフォルトに戻す
                if (modalSortFilter) {
                    modalSortFilter.value = 'newest';
                }
            });
        }

        // フィルターを適用
        if (applyFilterBtn) {
            applyFilterBtn.addEventListener('click', function() {
                // 選択されたカテゴリを取得
                const selectedCategories = Array.from(filterModal.querySelectorAll('input[name="category[]"]:checked'))
                    .map(checkbox => checkbox.value);

                // 選択された機能を取得
                const selectedFeatures = Array.from(filterModal.querySelectorAll('input[name="feature[]"]:checked'))
                    .map(checkbox => checkbox.value);

                // 選択された目的を取得
                const selectedPurposes = Array.from(filterModal.querySelectorAll('input[name="purpose[]"]:checked'))
                    .map(checkbox => checkbox.value);

                // キーワードを取得
                const keyword = modalKeywordSearch ? modalKeywordSearch.value : '';

                // 並び替え方法を取得
                const sort = modalSortFilter ? modalSortFilter.value : 'newest';

                // 無料プランフィルター状態を取得
                const hasFree = freePlanFilter ? freePlanFilter.checked : false;

                // メインの検索フィールドとセレクトボックスに反映
                if (keywordSearch) {
                    keywordSearch.value = keyword;
                }

                if (sortFilter) {
                    sortFilter.value = sort;
                }

                // 複数選択の場合、単一選択のセレクトボックスでは最初の選択項目を使用するか、すべて選択に戻す
                if (categoryFilter) {
                    if (selectedCategories.length === 1) {
                        categoryFilter.value = selectedCategories[0];
                    } else {
                        categoryFilter.value = 'all';
                    }
                }

                // AJAXリクエストを送信
                fetchFilteredTools(selectedCategories, selectedFeatures, selectedPurposes, keyword, sort, hasFree);

                // モーダルを閉じる
                filterModal.style.display = 'none';
                document.body.style.overflow = ''; // スクロールを有効化
            });
        }

        // フィルター結果を取得する関数
        function fetchFilteredTools(categories, features, purposes, keyword, sort, hasFree, page = 1) {
            // ローディング表示
            const toolsContainer = document.getElementById('tools-grid-container');
            toolsContainer.innerHTML = '<div class="loading">検索中...</div>';

            // AJAXリクエストのデータ
            const data = {
                action: 'filter_ai_tools',
                categories: categories,
                features: features,
                purposes: purposes,
                keyword: keyword,
                sort: sort,
                has_free: hasFree ? 1 : 0,
                paged: page,
                security: ajax_object.nonce // WP用のセキュリティノンス（別途設定が必要）
            };

            // フェッチAPIでリクエスト
            fetch(ajax_object.ajax_url, {
                    method: 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams(data)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toolsContainer.innerHTML = data.data.html;

                        // ページネーションの更新
                        const paginationContainer = document.getElementById('tools-pagination');
                        if (paginationContainer) {
                            paginationContainer.innerHTML = data.data.pagination;
                        }

                        // ツールのカウントを更新
                        const toolsTitle = document.querySelector('.tools-title');
                        if (toolsTitle && data.data.count !== undefined) {
                            toolsTitle.textContent = `全${data.data.count}件の生成AIツール`;
                        }

                        // スクロール位置を調整
                        window.scrollTo({
                            top: document.getElementById('ai-tools-list').offsetTop - 100,
                            behavior: 'smooth'
                        });
                    } else {
                        toolsContainer.innerHTML = '<p>エラーが発生しました。もう一度お試しください。</p>';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toolsContainer.innerHTML = '<p>エラーが発生しました。もう一度お試しください。</p>';
                });
        }

        // ページネーションのクリックイベントを委任
        document.addEventListener('click', function(e) {
            if (e.target.matches('#tools-pagination .page-link')) {
                e.preventDefault();
                const page = e.target.dataset.page;
                if (page) {
                    // 現在のフィルター状態を取得
                    const categories = Array.from(filterModal.querySelectorAll('input[name="category[]"]:checked'))
                        .map(checkbox => checkbox.value);
                    const features = Array.from(filterModal.querySelectorAll('input[name="feature[]"]:checked'))
                        .map(checkbox => checkbox.value);
                    const purposes = Array.from(filterModal.querySelectorAll('input[name="purpose[]"]:checked'))
                        .map(checkbox => checkbox.value);
                    const keyword = keywordSearch ? keywordSearch.value : '';
                    const sort = sortFilter ? sortFilter.value : 'newest';
                    const hasFree = freePlanFilter ? freePlanFilter.checked : false;

                    fetchFilteredTools(categories, features, purposes, keyword, sort, hasFree, page);
                }
            }
        });

        // タグのアクティブ状態を視覚的にフィードバック
        const tagInputs = document.querySelectorAll('.filter-tag-input');
        tagInputs.forEach(input => {
            input.addEventListener('change', function() {
                if (this.checked) {
                    this.parentElement.classList.add('active');
                } else {
                    this.parentElement.classList.remove('active');
                }
            });
        });
    });

    // jQueryを手動で読み込む
    var jqueryScript = document.createElement('script');
    jqueryScript.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js';
    jqueryScript.onload = function() {
        console.log('jQuery手動読み込み完了');
        initializeFilters();
    };
    document.head.appendChild(jqueryScript);

    function initializeFilters() {
        console.log('フィルター初期化開始');

        // jQueryを使用
        jQuery(document).ready(function($) {
            console.log('jQuery実行開始');

            // セレクトボックスの選択肢をデバッグ出力
            console.log('カテゴリセレクトボックスの選択肢:');
            $('#category-filter option').each(function() {
                console.log($(this).val() + ' - ' + $(this).text());
            });

            // カテゴリフィルターとソートの変更を検知
            $('#category-filter, #sort-filter').on('change', function() {
                console.log('フィルター変更: ' + $(this).val());
                filterAndSortTools();
            });

            // カテゴリアイコンクリック時
            $('.category-icon-item').on('click', function(e) {
                e.preventDefault();
                var category = $(this).data('category');
                console.log('カテゴリアイコンクリック: ' + category);

                // セレクトボックスの値を変更
                if (category) {
                    // セレクトボックスに該当する値があるか確認
                    var found = false;
                    $('#category-filter option').each(function() {
                        if ($(this).val() === category) {
                            found = true;
                            return false; // eachループを抜ける
                        }
                    });

                    if (found) {
                        $('#category-filter').val(category).trigger('change');
                        console.log('セレクトボックス値設定: ' + category);
                    } else {
                        console.log('セレクトボックスに該当する値がありません: ' + category);
                        // 全てのカテゴリを選択
                        $('#category-filter').val('all').trigger('change');
                    }
                } else {
                    console.error('カテゴリデータ属性が設定されていません');
                }
            });

            // 検索ボタンクリック時
            $('#ai-tool-search-button').on('click', function() {
                filterAndSortTools();
            });

            // Enterキー押下時も検索実行
            $('#ai-tool-search').on('keypress', function(e) {
                if (e.which === 13) {
                    filterAndSortTools();
                }
            });

            // ページネーションのクリックイベントを委任
            $(document).on('click', '#tools-pagination .page-link', function(e) {
                e.preventDefault();
                var page = $(this).data('page');
                if (page) {
                    console.log('ページネーションクリック: ページ ' + page);
                    filterAndSortTools(page);
                }
            });

            function filterAndSortTools(page = 1) {
                var category = $('#category-filter').val();
                var sort = $('#sort-filter').val();
                var keyword = $('#ai-tool-search').val();

                console.log('フィルタリング実行:');
                console.log('カテゴリ: ' + category);
                console.log('並び順: ' + sort);
                console.log('キーワード: ' + keyword);
                console.log('ページ: ' + page);

                // ローディング表示
                $('#tools-grid-container').html('<p class="loading-text">読み込み中...</p>');

                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'POST',
                    data: {
                        action: 'filter_ai_tools',
                        category: category,
                        sort: sort,
                        keyword: keyword,
                        paged: page,
                        nonce: '<?php echo wp_create_nonce('filter_ai_tools_nonce'); ?>'
                    },
                    beforeSend: function() {
                        console.log('Ajaxリクエスト送信データ:', {
                            action: 'filter_ai_tools',
                            category: category,
                            sort: sort,
                            keyword: keyword,
                            paged: page
                        });
                    },
                    success: function(response) {
                        console.log('Ajax成功:', response);
                        if (response.success) {
                            $('#tools-grid-container').html(response.data.html);
                            $('#tools-pagination').html(response.data.pagination);

                            // スクロール位置を調整
                            $('html, body').animate({
                                scrollTop: $('#ai-tools-list').offset().top - 100
                            }, 500);
                        } else {
                            $('#tools-grid-container').html('<p>エラーが発生しました。再度お試しください。</p>');
                            console.error('レスポンスエラー:', response);
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#tools-grid-container').html('<p>エラーが発生しました。再度お試しください。</p>');
                        console.error('Ajaxエラー:', status, error);
                        console.error('レスポンステキスト:', xhr.responseText);
                    }
                });
            }

            console.log('jQuery実行完了');
        });

        console.log('フィルター初期化完了');
    }
</script>