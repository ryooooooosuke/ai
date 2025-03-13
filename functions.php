<?php //子テーマ用関数
if (!defined('ABSPATH')) exit;

//子テーマ用のビジュアルエディタースタイルを適用
add_editor_style();

//以下に子テーマ用の関数を書く

// AIツールのカスタム投稿タイプを登録
function create_ai_tools_post_type()
{
    $labels = array(
        'name'                  => 'AIツール',
        'singular_name'         => 'AIツール',
        'menu_name'             => 'AIツール',
        'add_new'               => 'AIツール登録',
        'add_new_item'          => 'AIツールを追加',
        'edit_item'             => 'AIツールを編集',
        'new_item'              => '新規AIツール',
        'view_item'             => 'AIツールを表示',
        'search_items'          => 'AIツールを検索',
        'not_found'             => 'AIツールが見つかりません',
        'not_found_in_trash'    => 'ゴミ箱にAIツールが見つかりません',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-admin-generic',
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'               => array('slug' => 'ai-tools'),
        'show_in_rest'          => true, // Gutenberg対応
    );

    register_post_type('ai_tool', $args);
}
add_action('init', 'create_ai_tools_post_type');

// AIカテゴリのタクソノミーを登録
function create_ai_category_taxonomy()
{
    $labels = array(
        'name'              => 'AIカテゴリ',
        'singular_name'     => 'AIカテゴリ',
        'search_items'      => 'AIカテゴリを検索',
        'all_items'         => 'すべてのAIカテゴリ',
        'parent_item'       => '親AIカテゴリ',
        'parent_item_colon' => '親AIカテゴリ:',
        'edit_item'         => 'AIカテゴリを編集',
        'update_item'       => 'AIカテゴリを更新',
        'add_new_item'      => '新規AIカテゴリを追加',
        'new_item_name'     => '新規AIカテゴリ名',
        'menu_name'         => 'AIカテゴリ',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'ai-category'),
        'show_in_rest'      => true, // Gutenberg対応
    );

    register_taxonomy('ai_category', array('ai_tool'), $args);
}
add_action('init', 'create_ai_category_taxonomy');

/**
 * AIツール料金プラン用のメタボックスを追加
 */
function ai_tools_pricing_plans_meta_box()
{
    add_meta_box(
        'ai_tools_pricing_plans',
        '料金プラン設定',
        'ai_tools_pricing_plans_callback',
        'ai_tool',      // AIツールのカスタム投稿タイプ
        'normal',       // 表示位置（通常の本文エリアの下）
        'high'          // 優先度（高）
    );
}
add_action('add_meta_boxes', 'ai_tools_pricing_plans_meta_box');

/**
 * 料金プランメタボックスの内容を表示
 */
function ai_tools_pricing_plans_callback($post)
{
    wp_nonce_field(basename(__FILE__), 'ai_tools_pricing_plans_nonce');

    // 保存済みデータの取得
    $plans = get_post_meta($post->ID, '_pricing_plans', true);
    if (!$plans) {
        $plans = array(
            array(
                'tab_name' => '月額プラン',
                'details' => array(
                    array(
                        'name' => 'Basic',
                        'featured' => false,
                        'price' => '1500',
                        'period' => 'month',
                        'description' => '個人向け基本プラン',
                        'features' => array(
                            array('name' => '月間200枚の画像生成', 'available' => true),
                            array('name' => '標準画質出力', 'available' => true),
                            array('name' => 'プライベートビジビリティ', 'available' => false),
                        )
                    )
                )
            )
        );
    }

    // テンプレート表示
?>
    <div class="ai-pricing-plans-container">
        <div class="ai-pricing-tabs">
            <button type="button" class="add-pricing-tab button button-primary">
                <span class="dashicons dashicons-plus-alt"></span> 料金タブを追加
            </button>
        </div>

        <div id="pricing-tabs-container">
            <?php
            if (!empty($plans)) {
                foreach ($plans as $tab_index => $tab) {
            ?>
                    <div class="pricing-tab" data-tab="<?php echo esc_attr($tab_index); ?>">
                        <div class="tab-header">
                            <h3 class="tab-title">
                                <span class="dashicons dashicons-money-alt"></span>
                                <input type="text" name="pricing_plans[<?php echo $tab_index; ?>][tab_name]"
                                    value="<?php echo esc_attr($tab['tab_name']); ?>"
                                    placeholder="タブ名（例: 月額プラン）" class="tab-name-input">
                            </h3>
                            <div class="tab-actions">
                                <button type="button" class="button toggle-tab">
                                    <span class="dashicons dashicons-arrow-down-alt2"></span>
                                </button>
                                <button type="button" class="button remove-tab">
                                    <span class="dashicons dashicons-trash"></span>
                                </button>
                            </div>
                        </div>

                        <div class="tab-content">
                            <div class="plans-container">
                                <div class="plans-header">
                                    <h4>プラン内容</h4>
                                    <button type="button" class="button add-plan" data-tab="<?php echo esc_attr($tab_index); ?>">
                                        <span class="dashicons dashicons-plus"></span> プランを追加
                                    </button>
                                </div>

                                <?php if (!empty($tab['details'])) : ?>
                                    <?php foreach ($tab['details'] as $plan_index => $plan) : ?>
                                        <div class="plan-item">
                                            <div class="plan-header">
                                                <div class="plan-title">
                                                    <input type="text"
                                                        name="pricing_plans[<?php echo $tab_index; ?>][details][<?php echo $plan_index; ?>][name]"
                                                        value="<?php echo esc_attr($plan['name']); ?>"
                                                        placeholder="プラン名" class="plan-name-input">
                                                </div>
                                                <div class="plan-actions">
                                                    <label class="featured-plan">
                                                        <input type="checkbox"
                                                            name="pricing_plans[<?php echo $tab_index; ?>][details][<?php echo $plan_index; ?>][featured]"
                                                            value="1" <?php checked(!empty($plan['featured'])); ?>>
                                                        おすすめプラン
                                                    </label>
                                                    <button type="button" class="button toggle-plan">
                                                        <span class="dashicons dashicons-arrow-down-alt2"></span>
                                                    </button>
                                                    <button type="button" class="button remove-plan">
                                                        <span class="dashicons dashicons-trash"></span>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="plan-details">
                                                <div class="plan-detail-row">
                                                    <div class="plan-price">
                                                        <label>料金</label>
                                                        <div class="price-input-container">
                                                            <span class="price-currency">¥</span>
                                                            <input type="number"
                                                                name="pricing_plans[<?php echo $tab_index; ?>][details][<?php echo $plan_index; ?>][price]"
                                                                value="<?php echo esc_attr($plan['price']); ?>"
                                                                placeholder="料金" min="0" step="1" class="price-amount">
                                                        </div>
                                                    </div>

                                                    <div class="price-period">
                                                        <label>支払い周期</label>
                                                        <select name="pricing_plans[<?php echo $tab_index; ?>][details][<?php echo $plan_index; ?>][period]">
                                                            <option value="month" <?php selected($plan['period'], 'month'); ?>>月額</option>
                                                            <option value="year" <?php selected($plan['period'], 'year'); ?>>年額</option>
                                                            <option value="one_time" <?php selected($plan['period'], 'one_time'); ?>>一括</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="plan-description">
                                                    <label>プラン説明</label>
                                                    <input type="text"
                                                        name="pricing_plans[<?php echo $tab_index; ?>][details][<?php echo $plan_index; ?>][description]"
                                                        value="<?php echo esc_attr($plan['description']); ?>"
                                                        placeholder="プランの簡単な説明" class="description-input">
                                                </div>

                                                <div class="plan-features">
                                                    <label>プラン機能
                                                        <button type="button" class="button add-feature"
                                                            data-tab="<?php echo esc_attr($tab_index); ?>"
                                                            data-plan="<?php echo esc_attr($plan_index); ?>">
                                                            <span class="dashicons dashicons-plus-alt2"></span> 機能を追加
                                                        </button>
                                                    </label>

                                                    <div class="features-list">
                                                        <?php if (!empty($plan['features'])) : ?>
                                                            <?php foreach ($plan['features'] as $feature_index => $feature) : ?>
                                                                <div class="feature-item">
                                                                    <input type="text"
                                                                        name="pricing_plans[<?php echo $tab_index; ?>][details][<?php echo $plan_index; ?>][features][<?php echo $feature_index; ?>][name]"
                                                                        value="<?php echo esc_attr($feature['name']); ?>"
                                                                        placeholder="機能名" class="feature-name">
                                                                    <label class="feature-available">
                                                                        <input type="checkbox"
                                                                            name="pricing_plans[<?php echo $tab_index; ?>][details][<?php echo $plan_index; ?>][features][<?php echo $feature_index; ?>][available]"
                                                                            value="1" <?php checked(!empty($feature['available'])); ?>>
                                                                        利用可能
                                                                    </label>
                                                                    <button type="button" class="button remove-feature">
                                                                        <span class="dashicons dashicons-no"></span>
                                                                    </button>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>

    <!-- JavaScriptテンプレート -->
    <script type="text/html" id="tmpl-pricing-tab">
        <div class="pricing-tab" data-tab="{{{ data.tabIndex }}}">
            <div class="tab-header">
                <h3 class="tab-title">
                    <span class="dashicons dashicons-money-alt"></span>
                    <input type="text" name="pricing_plans[{{{ data.tabIndex }}}][tab_name]"
                        value="新しいタブ" placeholder="タブ名（例: 月額プラン）" class="tab-name-input">
                </h3>
                <div class="tab-actions">
                    <button type="button" class="button toggle-tab">
                        <span class="dashicons dashicons-arrow-down-alt2"></span>
                    </button>
                    <button type="button" class="button remove-tab">
                        <span class="dashicons dashicons-trash"></span>
                    </button>
                </div>
            </div>

            <div class="tab-content">
                <div class="plans-container">
                    <div class="plans-header">
                        <h4>プラン内容</h4>
                        <button type="button" class="button add-plan" data-tab="{{{ data.tabIndex }}}">
                            <span class="dashicons dashicons-plus"></span> プランを追加
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="text/html" id="tmpl-plan-item">
        <div class="plan-item">
            <div class="plan-header">
                <div class="plan-title">
                    <input type="text"
                        name="pricing_plans[{{{ data.tabIndex }}}][details][{{{ data.planIndex }}}][name]"
                        value="新しいプラン" placeholder="プラン名" class="plan-name-input">
                </div>
                <div class="plan-actions">
                    <label class="featured-plan">
                        <input type="checkbox"
                            name="pricing_plans[{{{ data.tabIndex }}}][details][{{{ data.planIndex }}}][featured]"
                            value="1">
                        おすすめプラン
                    </label>
                    <button type="button" class="button toggle-plan">
                        <span class="dashicons dashicons-arrow-down-alt2"></span>
                    </button>
                    <button type="button" class="button remove-plan">
                        <span class="dashicons dashicons-trash"></span>
                    </button>
                </div>
            </div>

            <div class="plan-details">
                <div class="plan-detail-row">
                    <div class="plan-price">
                        <label>料金</label>
                        <div class="price-input-container">
                            <span class="price-currency">¥</span>
                            <input type="number"
                                name="pricing_plans[{{{ data.tabIndex }}}][details][{{{ data.planIndex }}}][price]"
                                value="0" placeholder="料金" min="0" step="1" class="price-amount">
                        </div>
                    </div>

                    <div class="price-period">
                        <label>支払い周期</label>
                        <select name="pricing_plans[{{{ data.tabIndex }}}][details][{{{ data.planIndex }}}][period]">
                            <option value="month">月額</option>
                            <option value="year">年額</option>
                            <option value="one_time">一括</option>
                        </select>
                    </div>
                </div>

                <div class="plan-description">
                    <label>プラン説明</label>
                    <input type="text"
                        name="pricing_plans[{{{ data.tabIndex }}}][details][{{{ data.planIndex }}}][description]"
                        value="" placeholder="プランの簡単な説明" class="description-input">
                </div>

                <div class="plan-features">
                    <label>プラン機能
                        <button type="button" class="button add-feature"
                            data-tab="{{{ data.tabIndex }}}"
                            data-plan="{{{ data.planIndex }}}">
                            <span class="dashicons dashicons-plus-alt2"></span> 機能を追加
                        </button>
                    </label>

                    <div class="features-list">
                        <!-- 機能項目はJSで追加 -->
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="text/html" id="tmpl-feature-item">
        <div class="feature-item">
            <input type="text"
                name="pricing_plans[{{{ data.tabIndex }}}][details][{{{ data.planIndex }}}][features][{{{ data.featureIndex }}}][name]"
                value="" placeholder="機能名" class="feature-name">
            <label class="feature-available">
                <input type="checkbox"
                    name="pricing_plans[{{{ data.tabIndex }}}][details][{{{ data.planIndex }}}][features][{{{ data.featureIndex }}}][available]"
                    value="1">
                利用可能
            </label>
            <button type="button" class="button remove-feature">
                <span class="dashicons dashicons-no"></span>
            </button>
        </div>
    </script>

    <script>
        jQuery(document).ready(function($) {
            // 料金タブを追加
            $('.add-pricing-tab').on('click', function() {
                var tabIndex = $('.pricing-tab').length;
                var template = wp.template('pricing-tab');
                $('#pricing-tabs-container').append(template({
                    tabIndex: tabIndex
                }));
            });

            // タブ開閉
            $(document).on('click', '.toggle-tab', function() {
                $(this).closest('.pricing-tab').find('.tab-content').slideToggle();
                $(this).find('.dashicons').toggleClass('dashicons-arrow-down-alt2 dashicons-arrow-up-alt2');
            });

            // タブ削除
            $(document).on('click', '.remove-tab', function() {
                if (confirm('このタブを削除してもよろしいですか？')) {
                    $(this).closest('.pricing-tab').remove();
                }
            });

            // プラン追加
            $(document).on('click', '.add-plan', function() {
                var tabIndex = $(this).data('tab');
                var planIndex = $(this).closest('.plans-container').find('.plan-item').length;
                var template = wp.template('plan-item');
                $(this).closest('.plans-container').append(template({
                    tabIndex: tabIndex,
                    planIndex: planIndex
                }));
            });

            // プラン開閉
            $(document).on('click', '.toggle-plan', function() {
                $(this).closest('.plan-item').find('.plan-details').slideToggle();
                $(this).find('.dashicons').toggleClass('dashicons-arrow-down-alt2 dashicons-arrow-up-alt2');
            });

            // プラン削除
            $(document).on('click', '.remove-plan', function() {
                if (confirm('このプランを削除してもよろしいですか？')) {
                    $(this).closest('.plan-item').remove();
                }
            });

            // 機能追加
            $(document).on('click', '.add-feature', function() {
                var tabIndex = $(this).data('tab');
                var planIndex = $(this).data('plan');
                var featureIndex = $(this).closest('.plan-features').find('.feature-item').length;
                var template = wp.template('feature-item');
                $(this).closest('.plan-features').find('.features-list').append(template({
                    tabIndex: tabIndex,
                    planIndex: planIndex,
                    featureIndex: featureIndex
                }));
            });

            // 機能削除
            $(document).on('click', '.remove-feature', function() {
                $(this).closest('.feature-item').remove();
            });
        });
    </script>

    <style>
        /* 料金プラン設定のスタイル */
        .ai-pricing-plans-container {
            background: #fff;
            margin: 15px 0;
        }

        .ai-pricing-tabs {
            margin-bottom: 15px;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .pricing-tab {
            background: #f9f9f9;
            border: 1px solid #e5e5e5;
            border-radius: 4px;
            margin-bottom: 15px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .tab-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            background: #f1f1f1;
            border-bottom: 1px solid #e5e5e5;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }

        .tab-title {
            display: flex;
            align-items: center;
            margin: 0;
            font-size: 15px;
        }

        .tab-title .dashicons {
            margin-right: 8px;
            color: #0073aa;
        }

        .tab-name-input {
            margin-left: 5px;
            padding: 5px 8px;
            font-size: 14px;
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        .tab-actions {
            display: flex;
            gap: 5px;
        }

        .tab-content {
            padding: 15px;
        }

        .plans-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #ddd;
        }

        .plans-header h4 {
            margin: 0;
            font-size: 14px;
            color: #23282d;
        }

        .plan-item {
            background: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .plan-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            background: #f9f9f9;
            border-bottom: 1px solid #e5e5e5;
        }

        .plan-title {
            font-weight: 600;
        }

        .plan-name-input {
            padding: 5px 8px;
            font-size: 14px;
            width: 180px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        .plan-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .featured-plan {
            display: flex;
            align-items: center;
            font-size: 13px;
        }

        .featured-plan input {
            margin-right: 5px;
        }

        .plan-details {
            padding: 15px;
        }

        .plan-detail-row {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }

        .plan-price,
        .price-period {
            flex: 1;
        }

        .plan-price label,
        .price-period label,
        .plan-description label,
        .plan-features label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            font-size: 13px;
            color: #23282d;
        }

        .price-input-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .price-currency {
            position: absolute;
            left: 10px;
            font-weight: 600;
            color: #23282d;
        }

        .price-amount {
            padding-left: 25px !important;
        }

        .plan-description {
            margin-bottom: 15px;
        }

        .description-input {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        .plan-features {
            margin-top: 20px;
        }

        .features-list {
            margin-top: 10px;
            border: 1px solid #f0f0f0;
            border-radius: 3px;
            padding: 10px;
            background: #fafafa;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #eee;
        }

        .feature-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .feature-name {
            flex: 1;
            padding: 6px 8px;
            font-size: 13px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        .feature-available {
            display: flex;
            align-items: center;
            font-size: 13px;
            white-space: nowrap;
        }

        .feature-available input {
            margin-right: 5px;
        }

        .remove-feature {
            padding: 0 !important;
            height: 25px !important;
            width: 25px !important;
            line-height: 1 !important;
        }

        .remove-feature .dashicons {
            font-size: 16px;
            width: 16px;
            height: 16px;
        }

        /* ボタンスタイル */
        .ai-pricing-plans-container .button {
            background: #f7f7f7;
            border-color: #ccc;
            color: #555;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .ai-pricing-plans-container .button:hover {
            background: #fafafa;
            border-color: #999;
            color: #23282d;
        }

        .ai-pricing-plans-container .button-primary {
            background: #0073aa;
            border-color: #006799;
            color: #fff;
        }

        .ai-pricing-plans-container .button-primary:hover {
            background: #008ec2;
            border-color: #006799;
            color: #fff;
        }

        .ai-pricing-plans-container .button .dashicons {
            font-size: 16px;
            width: 16px;
            height: 16px;
            margin-right: 3px;
        }

        .add-pricing-tab .dashicons {
            font-size: 18px;
        }

        /* アニメーション */
        .pricing-tab,
        .plan-item,
        .feature-item {
            transition: all 0.3s ease;
        }

        .pricing-tab:hover,
        .plan-item:hover {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
<?php
}

/**
 * 料金プランデータを保存
 */
function save_ai_tools_pricing_plans($post_id)
{
    // 自動保存の場合は処理しない
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // カスタム投稿タイプが一致することを確認
    if (get_post_type($post_id) !== 'ai_tool') {
        return;
    }

    // 権限チェック
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // nonceの検証
    if (!isset($_POST['ai_tools_pricing_plans_nonce']) || !wp_verify_nonce($_POST['ai_tools_pricing_plans_nonce'], basename(__FILE__))) {
        return;
    }

    // 料金プランデータを保存
    if (isset($_POST['pricing_plans'])) {
        $plans = $_POST['pricing_plans'];
        // データのサニタイズ
        foreach ($plans as &$tab) {
            if (isset($tab['tab_name'])) {
                $tab['tab_name'] = sanitize_text_field($tab['tab_name']);
            }

            if (isset($tab['details']) && is_array($tab['details'])) {
                foreach ($tab['details'] as &$plan) {
                    if (isset($plan['name'])) {
                        $plan['name'] = sanitize_text_field($plan['name']);
                    }

                    if (isset($plan['featured'])) {
                        $plan['featured'] = (bool) $plan['featured'];
                    } else {
                        $plan['featured'] = false;
                    }

                    if (isset($plan['price'])) {
                        $plan['price'] = sanitize_text_field($plan['price']);
                    }

                    if (isset($plan['period'])) {
                        $plan['period'] = sanitize_text_field($plan['period']);
                    }

                    if (isset($plan['description'])) {
                        $plan['description'] = sanitize_text_field($plan['description']);
                    }

                    if (isset($plan['features']) && is_array($plan['features'])) {
                        foreach ($plan['features'] as &$feature) {
                            if (isset($feature['name'])) {
                                $feature['name'] = sanitize_text_field($feature['name']);
                            }

                            if (isset($feature['available'])) {
                                $feature['available'] = (bool) $feature['available'];
                            } else {
                                $feature['available'] = false;
                            }
                        }
                    }
                }
            }
        }

        update_post_meta($post_id, '_pricing_plans', $plans);
    } else {
        delete_post_meta($post_id, '_pricing_plans');
    }
}
add_action('save_post', 'save_ai_tools_pricing_plans');


// 画像追加

/**
 * AIツール用のギャラリー画像メタボックスを追加
 */
function ai_tools_gallery_meta_box()
{
    add_meta_box(
        'ai_tools_gallery',
        'ツール画像ギャラリー（最大4枚）',
        'ai_tools_gallery_callback',
        'ai_tool',       // AIツールのカスタム投稿タイプ
        'normal',        // 表示位置（通常の本文エリアの下）
        'high'           // 優先度（高）
    );
}
add_action('add_meta_boxes', 'ai_tools_gallery_meta_box');

/**
 * ギャラリーメタボックスの内容を表示
 */
function ai_tools_gallery_callback($post)
{
    wp_nonce_field(basename(__FILE__), 'ai_tools_gallery_nonce');

    // 保存済みの画像IDを取得
    $gallery_images = get_post_meta($post->ID, '_gallery_images', true);
    if (!$gallery_images) {
        $gallery_images = array();
    }

    // テンプレート表示
?>
    <div class="ai-gallery-container">
        <p class="gallery-description">
            AIツールのスクリーンショットや使用例など、最大4枚の画像を登録できます。
            最初の画像がメイン画像として使用されます。
        </p>

        <div class="gallery-preview-container">
            <?php for ($i = 0; $i < 4; $i++) : ?>
                <div class="gallery-item" data-index="<?php echo $i; ?>">
                    <div class="gallery-placeholder <?php echo isset($gallery_images[$i]) ? 'has-image' : ''; ?>">
                        <?php if (isset($gallery_images[$i])) :
                            $image_url = wp_get_attachment_image_url($gallery_images[$i], 'thumbnail');
                        ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="ギャラリー画像 <?php echo $i + 1; ?>">
                        <?php else : ?>
                            <span class="dashicons dashicons-format-image"></span>
                            <span class="placeholder-text">画像を追加</span>
                        <?php endif; ?>
                    </div>

                    <div class="gallery-item-actions">
                        <input type="hidden" name="gallery_images[<?php echo $i; ?>]"
                            value="<?php echo isset($gallery_images[$i]) ? esc_attr($gallery_images[$i]) : ''; ?>">

                        <button type="button" class="button select-image" data-index="<?php echo $i; ?>">
                            <?php echo isset($gallery_images[$i]) ? '画像を変更' : '画像を追加'; ?>
                        </button>

                        <?php if (isset($gallery_images[$i])) : ?>
                            <button type="button" class="button remove-image" data-index="<?php echo $i; ?>">
                                削除
                            </button>
                        <?php endif; ?>
                    </div>

                    <div class="gallery-item-info">
                        <?php if ($i === 0) : ?>
                            <span class="main-image-label">メイン画像</span>
                        <?php else : ?>
                            <span class="sub-image-label">サブ画像 <?php echo $i; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <script>
        jQuery(document).ready(function($) {
            // 画像選択
            $('.select-image').on('click', function() {
                var button = $(this);
                var index = button.data('index');

                var frame = wp.media({
                    title: 'ギャラリー画像を選択',
                    button: {
                        text: '画像を使用'
                    },
                    multiple: false
                });

                frame.on('select', function() {
                    var attachment = frame.state().get('selection').first().toJSON();
                    var imageUrl = attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;

                    // 画像IDを保存
                    $('input[name="gallery_images[' + index + ']"]').val(attachment.id);

                    // プレビュー画像を更新
                    var placeholder = $('.gallery-item[data-index="' + index + '"] .gallery-placeholder');
                    placeholder.addClass('has-image').html('<img src="' + imageUrl + '" alt="ギャラリー画像 ' + (index + 1) + '">');

                    // ボタンテキストを変更
                    button.text('画像を変更');

                    // 削除ボタンを追加（なければ）
                    if ($('.gallery-item[data-index="' + index + '"] .remove-image').length === 0) {
                        button.after('<button type="button" class="button remove-image" data-index="' + index + '">削除</button>');
                    }
                });

                frame.open();
            });

            // 画像削除
            $(document).on('click', '.remove-image', function() {
                var index = $(this).data('index');

                // 画像IDをクリア
                $('input[name="gallery_images[' + index + ']"]').val('');

                // プレビューをリセット
                var placeholder = $('.gallery-item[data-index="' + index + '"] .gallery-placeholder');
                placeholder.removeClass('has-image').html('<span class="dashicons dashicons-format-image"></span><span class="placeholder-text">画像を追加</span>');

                // ボタンテキストを変更
                $('.gallery-item[data-index="' + index + '"] .select-image').text('画像を追加');

                // 削除ボタンを削除
                $(this).remove();
            });
        });
    </script>

    <style>
        /* ギャラリー画像設定のスタイル */
        .ai-gallery-container {
            margin: 15px 0;
        }

        .gallery-description {
            margin-bottom: 15px;
            color: #666;
        }

        .gallery-preview-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            background: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            padding: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .gallery-placeholder {
            width: 100%;
            height: 150px;
            background: #f7f7f7;
            border: 2px dashed #ddd;
            border-radius: 4px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .gallery-placeholder:hover {
            border-color: #bbb;
            background: #f0f0f0;
        }

        .gallery-placeholder.has-image {
            border: none;
            background: transparent;
            padding: 0;
        }

        .gallery-placeholder img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 4px;
        }

        .gallery-placeholder .dashicons {
            font-size: 30px;
            width: 30px;
            height: 30px;
            color: #aaa;
            margin-bottom: 5px;
        }

        .placeholder-text {
            color: #888;
            font-size: 13px;
        }

        .gallery-item-actions {
            display: flex;
            gap: 5px;
            margin-bottom: 5px;
        }

        .gallery-item-actions .button {
            flex: 1;
            text-align: center;
            font-size: 12px;
        }

        .gallery-item-info {
            font-size: 12px;
            color: #666;
            text-align: center;
        }

        .main-image-label {
            color: #0073aa;
            font-weight: bold;
        }

        .sub-image-label {
            color: #777;
        }
    </style>
<?php
}

/**
 * ギャラリー画像データを保存
 */
function save_ai_tools_gallery($post_id)
{
    // 自動保存の場合は処理しない
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // カスタム投稿タイプが一致することを確認
    if (get_post_type($post_id) !== 'ai_tool') {
        return;
    }

    // 権限チェック
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // nonceの検証
    if (!isset($_POST['ai_tools_gallery_nonce']) || !wp_verify_nonce($_POST['ai_tools_gallery_nonce'], basename(__FILE__))) {
        return;
    }

    // ギャラリー画像データを保存
    if (isset($_POST['gallery_images'])) {
        $gallery_images = array_filter($_POST['gallery_images']); // 空の値を削除
        update_post_meta($post_id, '_gallery_images', $gallery_images);
    } else {
        delete_post_meta($post_id, '_gallery_images');
    }
}
add_action('save_post', 'save_ai_tools_gallery');



/**
 * AIツール評価のメタボックスを追加
 */
function ai_tools_rating_meta_box()
{
    add_meta_box(
        'ai_tools_rating',
        'AIツール評価',
        'ai_tools_rating_callback',
        'ai_tool',       // AIツールのカスタム投稿タイプ
        'normal',        // 表示位置（通常の本文エリアの下）
        'high'           // 優先度（高）
    );
}
add_action('add_meta_boxes', 'ai_tools_rating_meta_box');

/**
 * 評価メタボックスの内容を表示
 */
function ai_tools_rating_callback($post)
{
    wp_nonce_field(basename(__FILE__), 'ai_tools_rating_nonce');

    // 保存済みの評価値を取得
    $rating = get_post_meta($post->ID, '_tool_rating', true);
    if (!$rating) {
        $rating = 4.0; // デフォルト値
    }

    // 小数点一桁に丸める
    $rating = round($rating, 1);

    // テンプレート表示
?>
    <div class="ai-rating-container">
        <p class="rating-description">
            このAIツールの評価を1〜5の範囲で設定します。0.1刻みで設定可能です。
        </p>

        <div class="rating-ui">
            <div class="rating-input-container">
                <label for="tool_rating">評価値：</label>
                <input type="number" id="tool_rating" name="tool_rating"
                    value="<?php echo esc_attr($rating); ?>"
                    min="1" max="5" step="0.1"
                    class="rating-number-input">
            </div>

            <div class="star-rating-container">
                <div class="star-rating" data-rating="<?php echo esc_attr($rating); ?>">
                    <span class="star" data-value="1">★</span>
                    <span class="star" data-value="2">★</span>
                    <span class="star" data-value="3">★</span>
                    <span class="star" data-value="4">★</span>
                    <span class="star" data-value="5">★</span>

                    <div class="star-rating-fill" style="width: <?php echo esc_attr($rating / 5 * 100); ?>%;">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="rating-preview">
            <div class="preview-label">プレビュー：</div>
            <div class="preview-content">
                <div class="preview-stars">
                    <div class="stars-outer">
                        <span>★★★★★</span>
                        <div class="stars-inner" style="width: <?php echo esc_attr($rating / 5 * 100); ?>%;">
                            <span>★★★★★</span>
                        </div>
                    </div>
                </div>
                <div class="preview-value"><?php echo esc_html($rating); ?></div>
            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function($) {
            // 入力値変更時の処理
            $('#tool_rating').on('input', function() {
                updateRatingUI($(this).val());
            });

            // 星クリック時の処理
            $('.star').on('click', function() {
                var value = $(this).data('value');
                $('#tool_rating').val(value).trigger('input');
            });

            // 星ホバー時の処理
            $('.star').on('mousemove', function(e) {
                var star = $(this);
                var value = star.data('value');
                var starWidth = star.width();
                var offsetX = e.pageX - star.offset().left;

                // 星の中での位置に応じて小数点値を計算
                var decimal = Math.round((offsetX / starWidth) * 10) / 10;
                if (decimal < 0.1) decimal = 0.1;

                var finalValue = value - 1 + decimal;
                if (finalValue > 5) finalValue = 5;
                if (finalValue < 1) finalValue = 1;

                // プレビュー表示
                $('.star-rating-container').attr('data-hover-value', finalValue.toFixed(1));

                // ホバープレビューUIを更新
                var percent = (finalValue / 5) * 100;
                $('.star-rating-container').css('--hover-width', percent + '%');
            });

            // ホバー終了時の処理
            $('.star-rating-container').on('mouseleave', function() {
                $(this).removeAttr('data-hover-value');
            });

            // 星レーティングUI更新関数
            function updateRatingUI(value) {
                // 値の範囲を制限
                if (value > 5) value = 5;
                if (value < 1) value = 1;

                value = parseFloat(value).toFixed(1);

                // パーセントに変換
                var percent = (value / 5) * 100;

                // 星の塗りつぶしを更新
                $('.star-rating-fill').css('width', percent + '%');
                $('.stars-inner').css('width', percent + '%');

                // データ属性を更新
                $('.star-rating').attr('data-rating', value);

                // プレビュー値を更新
                $('.preview-value').text(value);
            }
        });
    </script>

    <style>
        /* 評価設定のスタイル */
        .ai-rating-container {
            margin: 15px 0;
            padding: 15px;
            background: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .rating-description {
            margin-bottom: 15px;
            color: #666;
        }

        .rating-ui {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .rating-input-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .rating-input-container label {
            font-weight: 600;
            color: #23282d;
        }

        .rating-number-input {
            width: 70px;
            padding: 5px;
            text-align: center;
            font-size: 16px;
            font-weight: 600;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        /* 星評価表示 */
        .star-rating-container {
            position: relative;
            --hover-width: 0%;
        }

        .star-rating-container[data-hover-value]:after {
            content: attr(data-hover-value);
            position: absolute;
            top: -25px;
            left: calc(var(--hover-width) - 10px);
            background: #333;
            color: white;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 12px;
            transform: translateX(-50%);
            z-index: 10;
        }

        .star-rating-container[data-hover-value]:before {
            content: '';
            position: absolute;
            top: -8px;
            left: calc(var(--hover-width) - 10px);
            transform: translateX(-50%);
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid #333;
            z-index: 10;
        }

        .star-rating {
            position: relative;
            display: inline-block;
            font-size: 30px;
            line-height: 1;
            color: #ddd;
            cursor: pointer;
        }

        .star {
            position: relative;
            z-index: 2;
        }

        .star-rating-fill {
            position: absolute;
            top: 0;
            left: 0;
            overflow: hidden;
            color: #f8b84e;
            z-index: 1;
        }

        /* プレビュー表示 */
        .rating-preview {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 4px;
            border: 1px solid #eee;
            display: flex;
            align-items: center;
        }

        .preview-label {
            font-weight: 600;
            color: #23282d;
            margin-right: 10px;
        }

        .preview-content {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .preview-stars {
            position: relative;
        }

        .stars-outer {
            position: relative;
            display: inline-block;
            color: #ddd;
            font-size: 20px;
        }

        .stars-inner {
            position: absolute;
            top: 0;
            left: 0;
            overflow: hidden;
            color: #f8b84e;
        }

        .preview-value {
            font-weight: 700;
            font-size: 18px;
            color: #23282d;
        }
    </style>
<?php
}

/**
 * 評価データを保存
 */
function save_ai_tools_rating($post_id)
{
    // 自動保存の場合は処理しない
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // カスタム投稿タイプが一致することを確認
    if (get_post_type($post_id) !== 'ai_tool') {
        return;
    }

    // 権限チェック
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // nonceの検証
    if (!isset($_POST['ai_tools_rating_nonce']) || !wp_verify_nonce($_POST['ai_tools_rating_nonce'], basename(__FILE__))) {
        return;
    }

    // 評価データを保存
    if (isset($_POST['tool_rating'])) {
        $rating = (float) $_POST['tool_rating'];

        // 値の範囲を制限
        if ($rating > 5) $rating = 5;
        if ($rating < 1) $rating = 1;

        // 小数点第一位で丸める
        $rating = round($rating, 1);

        update_post_meta($post_id, '_tool_rating', $rating);
    }
}
add_action('save_post', 'save_ai_tools_rating');


/**
 * AIカテゴリにアイコン画像フィールドを追加
 */
function ai_category_add_image_field()
{
    // カテゴリー追加フォームにフィールドを追加
?>
    <div class="form-field term-image-wrap">
        <label for="ai_category_image">カテゴリーアイコン</label>
        <div class="category-image-container">
            <div class="category-image-preview">
                <img src="" style="max-width: 100px; max-height: 100px; display: none;" />
            </div>
            <input type="hidden" id="ai_category_image" name="ai_category_image" value="" />
            <button type="button" class="button button-secondary ai-upload-image">画像をアップロード</button>
            <button type="button" class="button button-secondary ai-remove-image" style="display:none;">画像を削除</button>
        </div>
        <p class="description">このカテゴリーを表すアイコン画像を設定します（推奨サイズ: 100x100px）</p>
    </div>
<?php
}
add_action('ai_category_add_form_fields', 'ai_category_add_image_field', 10);

/**
 * AIカテゴリ編集フォームにアイコン画像フィールドを追加
 */
function ai_category_edit_image_field($term)
{
    // 既存のアイコン画像を取得
    $image_id = get_term_meta($term->term_id, 'ai_category_image', true);
    $image_url = '';

    if ($image_id) {
        $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
    }

?>
    <tr class="form-field term-image-wrap">
        <th scope="row"><label for="ai_category_image">カテゴリーアイコン</label></th>
        <td>
            <div class="category-image-container">
                <div class="category-image-preview">
                    <?php if ($image_url) : ?>
                        <img src="<?php echo esc_url($image_url); ?>" style="max-width: 100px; max-height: 100px;" />
                    <?php else : ?>
                        <img src="" style="max-width: 100px; max-height: 100px; display: none;" />
                    <?php endif; ?>
                </div>
                <input type="hidden" id="ai_category_image" name="ai_category_image" value="<?php echo esc_attr($image_id); ?>" />
                <button type="button" class="button button-secondary ai-upload-image">
                    <?php echo $image_id ? '画像を変更' : '画像をアップロード'; ?>
                </button>
                <?php if ($image_id) : ?>
                    <button type="button" class="button button-secondary ai-remove-image">画像を削除</button>
                <?php else : ?>
                    <button type="button" class="button button-secondary ai-remove-image" style="display:none;">画像を削除</button>
                <?php endif; ?>
            </div>
            <p class="description">このカテゴリーを表すアイコン画像を設定します（推奨サイズ: 100x100px）</p>
        </td>
    </tr>
    <?php
}
add_action('ai_category_edit_form_fields', 'ai_category_edit_image_field', 10, 1);

/**
 * AIカテゴリにメディアアップローダーのJavaScriptを追加
 */
function ai_category_image_enqueue_scripts()
{
    $screen = get_current_screen();

    // 'edit-ai_category'はAIカテゴリの編集画面のID
    if ($screen && ($screen->id === 'edit-ai_category' || $screen->id === 'ai_tool')) {
        wp_enqueue_media();

        // インラインスクリプトの追加
    ?>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                // 画像アップロードボタンのクリックイベント
                $(document).on('click', '.ai-upload-image', function(e) {
                    e.preventDefault();

                    var button = $(this);
                    var container = button.closest('.category-image-container');
                    var imageIdInput = container.find('input[type="hidden"]');
                    var previewImg = container.find('.category-image-preview img');
                    var removeButton = container.find('.ai-remove-image');

                    // メディアアップローダーの作成
                    var mediaUploader = wp.media({
                        title: 'カテゴリーアイコンを選択',
                        button: {
                            text: '選択'
                        },
                        multiple: false
                    });

                    // 画像が選択されたときの処理
                    mediaUploader.on('select', function() {
                        var attachment = mediaUploader.state().get('selection').first().toJSON();

                        // 画像IDを保存
                        imageIdInput.val(attachment.id);

                        // プレビュー画像を更新
                        previewImg.attr('src', attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url);
                        previewImg.show();

                        // ボタンのテキストを変更
                        button.text('画像を変更');

                        // 削除ボタンを表示
                        removeButton.show();
                    });

                    // メディアアップローダーを開く
                    mediaUploader.open();
                });

                // 画像削除ボタンのクリックイベント
                $(document).on('click', '.ai-remove-image', function(e) {
                    e.preventDefault();

                    var button = $(this);
                    var container = button.closest('.category-image-container');
                    var imageIdInput = container.find('input[type="hidden"]');
                    var previewImg = container.find('.category-image-preview img');
                    var uploadButton = container.find('.ai-upload-image');

                    // 画像IDをクリア
                    imageIdInput.val('');

                    // プレビュー画像を非表示
                    previewImg.attr('src', '').hide();

                    // ボタンのテキストを変更
                    uploadButton.text('画像をアップロード');

                    // 削除ボタンを非表示
                    button.hide();
                });
            });
        </script>
    <?php
    }
}
add_action('admin_footer', 'ai_category_image_enqueue_scripts');

/**
 * AIカテゴリ保存時に画像IDを保存
 */
function ai_category_save_image_field($term_id)
{
    if (isset($_POST['ai_category_image'])) {
        $image_id = intval($_POST['ai_category_image']);
        update_term_meta($term_id, 'ai_category_image', $image_id);
    }
}
add_action('edited_ai_category', 'ai_category_save_image_field', 10, 1);
add_action('created_ai_category', 'ai_category_save_image_field', 10, 1);

/**
 * AIカテゴリ一覧にサムネイル列を追加
 */
function ai_category_add_image_column($columns)
{
    $new_columns = array();

    foreach ($columns as $key => $value) {
        // 名前列の後にアイコン列を追加
        if ($key === 'name') {
            $new_columns[$key] = $value;
            $new_columns['ai_category_icon'] = 'アイコン';
        } else {
            $new_columns[$key] = $value;
        }
    }

    return $new_columns;
}
add_filter('manage_edit-ai_category_columns', 'ai_category_add_image_column');

/**
 * AIカテゴリ一覧のサムネイル列に画像を表示
 */
function ai_category_image_column_content($content, $column_name, $term_id)
{
    if ($column_name === 'ai_category_icon') {
        $image_id = get_term_meta($term_id, 'ai_category_image', true);

        if ($image_id) {
            $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
            $content = '<img src="' . esc_url($image_url) . '" alt="" style="max-width: 50px; max-height: 50px;" />';
        } else {
            $content = '<span class="dashicons dashicons-format-image" style="color:#ccc;"></span>';
        }
    }

    return $content;
}
add_filter('manage_ai_category_custom_column', 'ai_category_image_column_content', 10, 3);

// ピックアップコンテンツ

/**
 * 投稿にピックアップ用のメタボックスを追加
 */
function add_pickup_meta_box()
{
    add_meta_box(
        'pickup_meta_box',           // ID
        'ピックアップ設定',            // タイトル
        'display_pickup_meta_box',   // コールバック関数
        'post',                      // 投稿タイプ
        'side',                      // 表示位置（サイドバー）
        'high'                       // 優先度
    );
}
add_action('add_meta_boxes', 'add_pickup_meta_box');

/**
 * ピックアップメタボックスの表示
 */
function display_pickup_meta_box($post)
{
    // nonceフィールドを追加
    wp_nonce_field(basename(__FILE__), 'pickup_meta_box_nonce');

    // 現在の値を取得
    $is_pickup = get_post_meta($post->ID, '_is_pickup', true);

    // チェックボックスを表示
    ?>
    <div class="pickup-option">
        <label for="is_pickup">
            <input type="checkbox" name="is_pickup" id="is_pickup" value="1" <?php checked($is_pickup, '1'); ?> />
            この投稿をピックアップ記事としてマークする
        </label>
        <p class="description">ピックアップとしてマークされた記事は、投稿一覧で強調表示されます。</p>
    </div>
    <style>
        .pickup-option {
            padding: 5px 0;
        }

        .pickup-option label {
            font-weight: normal;
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .pickup-option input[type="checkbox"] {
            margin-right: 8px;
        }

        .pickup-option .description {
            margin-top: 5px;
            color: #666;
            font-style: italic;
        }
    </style>
<?php
}

/**
 * ピックアップのメタデータを保存
 */
function save_pickup_meta($post_id)
{
    // nonceの確認
    if (!isset($_POST['pickup_meta_box_nonce']) || !wp_verify_nonce($_POST['pickup_meta_box_nonce'], basename(__FILE__))) {
        return;
    }

    // 自動保存の場合は処理しない
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // 権限チェック
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // データの保存
    if (isset($_POST['is_pickup'])) {
        update_post_meta($post_id, '_is_pickup', '1');
    } else {
        delete_post_meta($post_id, '_is_pickup');
    }
}
add_action('save_post', 'save_pickup_meta');

/**
 * カスタムページのページネーション対応
 */
function custom_template_redirect()
{
    // URLパスを取得
    $request_uri = $_SERVER['REQUEST_URI'];
    $path = parse_url($request_uri, PHP_URL_PATH);

    // columnページのパスを確認
    if (strpos($path, '/ai/column') !== false) {
        // グローバル変数を設定
        global $wp_query;

        // ページネーション変数を設定
        if (isset($_GET['paged'])) {
            set_query_var('paged', intval($_GET['paged']));
        }

        // テンプレートの読み込み方法を変更
        include(STYLESHEETPATH . '/home.php');
        exit;
    }
}
add_action('template_redirect', 'custom_template_redirect', 5);

/**
 * クエリ変数を登録
 */
function add_custom_query_vars($vars)
{
    $vars[] = 'paged';
    return $vars;
}
add_filter('query_vars', 'add_custom_query_vars');
