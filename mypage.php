<?php

/**
 * Template Name: マイページ
 */
get_header(); ?>


<style>
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

    /* マイページレイアウト */
    .mypage-wrapper {
        display: flex;
        min-height: calc(100vh - 74px);
        /* ヘッダー高さを引く */
    }

    .sidebar {
        width: var(--nav-width);
        background-color: var(--bg);
        border-right: 1px solid var(--border);
        padding: 30px 0;
        height: calc(100vh - 74px);
        position: sticky;
        top: 74px;
        overflow-y: auto;
    }

    .user-profile {
        padding: 0 20px 25px;
        text-align: center;
        border-bottom: 1px solid var(--border);
        margin-bottom: 25px;
    }

    .profile-avatar {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--main-light);
        color: var(--main-dark);
        font-weight: 700;
        font-size: 36px;
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-name {
        font-size: 18px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 5px;
    }

    .profile-status {
        font-size: 14px;
        color: var(--text-light);
        margin-bottom: 15px;
    }

    .sidebar-menu {
        list-style: none;
    }

    .sidebar-menu-item {
        margin-bottom: 2px;
    }

    .sidebar-menu-link {
        display: flex;
        align-items: center;
        padding: 12px 20px;
        color: var(--text);
        font-weight: 500;
        transition: all 0.3s ease;
        position: relative;
    }

    .sidebar-menu-link:hover {
        background-color: var(--bg-light);
        color: var(--main-color);
    }

    .sidebar-menu-link.active {
        background-color: var(--main-light);
        color: var(--main-dark);
        font-weight: 600;
    }

    .sidebar-menu-link.active::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background-color: var(--main-color);
    }

    .sidebar-menu-icon {
        margin-right: 12px;
        width: 20px;
        text-align: center;
    }

    .sidebar-section-title {
        padding: 0 20px;
        margin: 25px 0 10px;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-light);
        font-weight: 600;
    }

    .main-content {
        flex: 1;
        padding: 30px;
        max-width: calc(100% - var(--nav-width));
    }

    .page-title {
        font-size: 28px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 20px;
    }

    /* ダッシュボード */
    .dashboard-stats {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background-color: var(--bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        padding: 25px;
        border: 1px solid var(--border);
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(107, 154, 222, 0.12);
    }

    .stat-title {
        font-size: 15px;
        color: var(--text-light);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .stat-title i {
        margin-right: 8px;
        color: var(--main-color);
    }

    .stat-value {
        font-size: 28px;
        font-weight: 700;
        color: var(--text);
        margin-bottom: 5px;
    }

    .stat-description {
        font-size: 13px;
        color: var(--text-light);
    }

    /* セクション */
    .section {
        margin-bottom: 40px;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--text);
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
        height: 20px;
        background-color: var(--main-color);
        border-radius: 2px;
    }

    .section-actions a {
        color: var(--main-color);
        font-size: 14px;
        font-weight: 600;
    }

    /* AIツールカード */
    .tools-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
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
        height: 120px;
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
        padding: 15px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .tool-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        margin-bottom: 8px;
    }

    .tool-tag {
        background-color: var(--main-light);
        color: var(--main-dark);
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 11px;
        font-weight: 600;
    }

    .tool-title {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 8px;
        color: var(--text);
    }

    .tool-description {
        color: var(--text-light);
        font-size: 13px;
        margin-bottom: 15px;
        flex-grow: 1;
        line-height: 1.5;
    }

    .tool-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
        border-top: 1px solid var(--border);
        padding-top: 10px;
    }

    .tool-rating {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .stars {
        color: #f8b84e;
        font-size: 12px;
    }

    .rating-value {
        font-weight: 600;
        font-size: 12px;
        color: var(--text);
    }

    .tool-price {
        font-weight: 600;
        font-size: 12px;
        padding: 2px 8px;
        border-radius: 4px;
    }

    .tool-price.free {
        color: #38a169;
        background-color: rgba(56, 161, 105, 0.1);
    }

    .tool-price.paid {
        color: #dd6b20;
        background-color: rgba(221, 107, 32, 0.1);
    }

    /* 最近のアクティビティ */
    .activity-list {
        background-color: var(--bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        overflow: hidden;
    }

    .activity-item {
        padding: 15px 20px;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        gap: 15px;
        transition: all 0.3s ease;
    }

    .activity-item:last-child {
        border-bottom: none;
    }

    .activity-item:hover {
        background-color: var(--bg-light);
    }

    .activity-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: var(--main-light);
        color: var(--main-color);
        border-radius: 50%;
        flex-shrink: 0;
    }

    .activity-content {
        flex: 1;
    }

    .activity-title {
        font-weight: 600;
        font-size: 15px;
        color: var(--text);
        margin-bottom: 3px;
    }

    .activity-info {
        font-size: 13px;
        color: var(--text-light);
        display: flex;
        gap: 10px;
    }

    .activity-time {
        color: var(--text-light);
        font-size: 12px;
        white-space: nowrap;
    }

    /* レスポンシブ対応 */
    @media (max-width: 1024px) {
        .dashboard-stats {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        }
    }

    @media (max-width: 991px) {
        .mypage-wrapper {
            flex-direction: column;
        }

        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
            top: 0;
            border-right: none;
            border-bottom: 1px solid var(--border);
            padding: 20px 0;
        }

        .user-profile {
            display: flex;
            align-items: center;
            text-align: left;
            padding: 0 20px 15px;
            margin-bottom: 15px;
        }

        .profile-avatar {
            width: 60px;
            height: 60px;
            margin: 0 15px 0 0;
            font-size: 24px;
        }

        .profile-info {
            flex: 1;
        }

        .sidebar-menu {
            display: flex;
            flex-wrap: wrap;
            padding: 0 10px;
        }

        .sidebar-menu-item {
            margin-right: 5px;
        }

        .sidebar-menu-link {
            padding: 8px 15px;
            border-radius: 30px;
            font-size: 14px;
        }

        .sidebar-menu-link.active::before {
            display: none;
        }

        .sidebar-menu-icon {
            margin-right: 8px;
        }

        .sidebar-section-title {
            display: none;
        }

        .main-content {
            max-width: 100%;
        }
    }

    @media (max-width: 768px) {
        .nav-menu {
            display: none;
        }

        .dashboard-stats {
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 15px;
        }

        .stat-card {
            padding: 20px;
        }

        .stat-value {
            font-size: 24px;
        }

        .tools-grid {
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 15px;
        }

        .activity-item {
            padding: 12px 15px;
        }

        .activity-icon {
            width: 36px;
            height: 36px;
        }
    }

    @media (max-width: 576px) {
        .dashboard-stats {
            grid-template-columns: 1fr 1fr;
        }

        .tools-grid {
            grid-template-columns: 1fr;
        }

        .tool-image {
            height: 140px;
        }

        .activity-time {
            display: none;
        }

        .section-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .page-title {
            font-size: 24px;
        }
    }
</style>

<!-- マイページメインエリア -->
<div class="mypage-wrapper">
    <!-- サイドナビゲーション -->
    <aside class="sidebar">
        <div class="user-profile">
            <div class="profile-avatar">
                <span>A</span>
            </div>
            <div class="profile-info">
                <h3 class="profile-name">AIマスター</h3>
                <p class="profile-status">無料会員</p>
                <a href="#" class="btn btn-outline btn-sm">編集</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
                <a href="#" class="sidebar-menu-link active">
                    <span class="sidebar-menu-icon"><i class="fas fa-home"></i></span>
                    <span>マイページ</span>
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a href="#" class="sidebar-menu-link">
                    <span class="sidebar-menu-icon"><i class="fas fa-user-cog"></i></span>
                    <span>アカウント設定</span>
                </a>
            </li>

            <li class="sidebar-menu-item">
                <a href="#" class="sidebar-menu-link">
                    <span class="sidebar-menu-icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span>ログアウト</span>
                </a>
            </li>
        </ul>
    </aside>

    <!-- メインコンテンツ -->
    <main class="main-content">
        <h1 class="page-title">ダッシュボード</h1>

        <!-- 統計カード -->
        <div class="dashboard-stats">
            <div class="stat-card">
                <div class="stat-title">
                    お気に入りのAIツール
                </div>
                <div class="stat-value">12</div>
                <div class="stat-description">最近追加: MidJourney</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">
                    <i class="fas fa-eye"></i>
                    最近閲覧したコンテンツ
                </div>
                <div class="stat-value">32</div>
                <div class="stat-description">今週の閲覧数</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">
                    <i class="fas fa-calendar-alt"></i>
                    会員登録日
                </div>
                <div class="stat-value">203</div>
                <div class="stat-description">会員継続日数</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">
                    <i class="fas fa-bell"></i>
                    新着通知
                </div>
                <div class="stat-value">5</div>
                <div class="stat-description">未読の通知があります</div>
            </div>
        </div>

        <!-- お気に入りのAIツール -->
        <div class="section">
            <div class="section-header">
                <h2 class="section-title">お気に入りのAIツール</h2>
                <div class="section-actions">
                    <a href="#">すべて見る</a>
                </div>
            </div>
            <div class="tools-grid">
                <!-- AIツールカード 1 -->
                <div class="tool-card">
                    <div class="tool-image">
                        <img src="/api/placeholder/200/120" alt="AIツール画像">
                    </div>
                    <div class="tool-content">
                        <div class="tool-tags">
                            <span class="tool-tag">画像生成</span>
                        </div>
                        <h3 class="tool-title">MidJourney</h3>
                        <p class="tool-description">AIによる高品質な画像生成ツール。テキストプロンプトから驚くべきビジュアルを作成可能。</p>
                        <div class="tool-meta">
                            <div class="tool-rating">
                                <span class="stars">★★★★★</span>
                                <span class="rating-value">4.9</span>
                            </div>
                            <div class="tool-price paid">有料</div>
                        </div>
                    </div>
                </div>

                <!-- AIツールカード 2 -->
                <div class="tool-card">
                    <div class="tool-image">
                        <img src="/api/placeholder/200/120" alt="AIツール画像">
                    </div>
                    <div class="tool-content">
                        <div class="tool-tags">
                            <span class="tool-tag">ライティング</span>
                        </div>
                        <h3 class="tool-title">ChatGPT</h3>
                        <p class="tool-description">OpenAIの対話型AIモデル。会話形式で様々な質問に答え、コンテンツ作成を支援。</p>
                        <div class="tool-meta">
                            <div class="tool-rating">
                                <span class="stars">★★★★★</span>
                                <span class="rating-value">4.8</span>
                            </div>
                            <div class="tool-price free">無料版あり</div>
                        </div>
                    </div>
                </div>

                <!-- AIツールカード 3 -->
                <div class="tool-card">
                    <div class="tool-image">
                        <img src="/api/placeholder/200/120" alt="AIツール画像">
                    </div>
                    <div class="tool-content">
                        <div class="tool-tags">
                            <span class="tool-tag">音声</span>
                        </div>
                        <h3 class="tool-title">ElevenLabs</h3>
                        <p class="tool-description">高品質なAI音声合成ツール。自然でリアルな音声ナレーションを多言語で作成。</p>
                        <div class="tool-meta">
                            <div class="tool-rating">
                                <span class="stars">★★★★☆</span>
                                <span class="rating-value">4.7</span>
                            </div>
                            <div class="tool-price free">無料版あり</div>
                        </div>
                    </div>
                </div>

                <!-- AIツールカード 4 -->
                <div class="tool-card">
                    <div class="tool-image">
                        <img src="/api/placeholder/200/120" alt="AIツール画像">
                    </div>
                    <div class="tool-content">
                        <div class="tool-tags">
                            <span class="tool-tag">動画編集</span>
                        </div>
                        <h3 class="tool-title">RunwayML</h3>
                        <p class="tool-description">AIを活用した動画編集と生成ツール。テキストからの動画生成やビデオエディットが可能。</p>
                        <div class="tool-meta">
                            <div class="tool-rating">
                                <span class="stars">★★★★☆</span>
                                <span class="rating-value">4.5</span>
                            </div>
                            <div class="tool-price paid">有料</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php get_footer(); ?>