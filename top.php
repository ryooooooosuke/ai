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
                <h1 class="hero-title">AIで<span>副業</span>をもっと効率的に、もっと収益的に</h1>
                <p class="hero-description">最新のAI技術で副業の効率を劇的に向上。時間を節約し、クオリティを高め、収入を最大化しましょう。</p>
                <div class="hero-buttons">
                    <a href="<?php echo home_url('/#ai-tools-list'); ?>" class="btn">AIツールを探す</a>
                    <a href="<?php echo home_url('/about'); ?>" class="btn btn-outline">使い方ガイド</a>
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
        <h2 class="section-title">生成AI一覧</h2>
        <p class="section-subtitle">副業に役立つ厳選された生成AIツールを紹介。作業効率を高め、クオリティを向上させよう</p>

        <div class="tools-header">
            <h3 class="tools-title">全<?php echo wp_count_posts('ai_tool')->publish; ?>件の生成AIツール</h3>
            <div class="tools-filter">
                <span class="tools-filter-label">表示:</span>
                <select class="tools-filter-select" id="category-filter">
                    <option value="all">すべてのカテゴリ</option>
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

<?php get_footer(); ?>


<!-- jQueryを使用したスクリプト -->
<?php get_footer(); ?>

<script type="text/javascript">
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