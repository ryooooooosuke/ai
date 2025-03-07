<?php

/**
 * Template Name: ユーザー情報変更画面
 */
get_header(); ?>


<style>
    /* リセットとベーススタイル */

    :root {
        --shadow: 0 2px 10px rgba(107, 154, 222, 0.08);
        --radius: 12px;
        --form-shadow: 0 4px 15px rgba(107, 154, 222, 0.1);
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

    /* プロフィール編集フォーム */
    .edit-form-container {
        background-color: var(--bg);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        overflow: hidden;
        margin-bottom: 30px;
    }

    .edit-form-header {
        background-color: var(--main-light);
        padding: 20px 30px;
        border-bottom: 1px solid var(--border);
    }

    .edit-form-title {
        font-size: 20px;
        font-weight: 700;
        color: var(--main-dark);
    }

    .edit-form-body {
        padding: 30px;
    }

    .form-section {
        margin-bottom: 35px;
    }

    .form-section:last-child {
        margin-bottom: 0;
    }

    .form-section-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--border);
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 20px;
        gap: 20px;
    }

    .form-group {
        flex: 1;
        min-width: 250px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--text);
    }

    .required-label {
        color: var(--error);
        margin-left: 3px;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--border);
        border-radius: 8px;
        background-color: var(--bg-light);
        color: var(--text);
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--main-color);
        box-shadow: 0 0 0 3px rgba(107, 154, 222, 0.2);
    }

    textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }

    .form-hint {
        margin-top: 5px;
        font-size: 13px;
        color: var(--text-light);
    }

    /* アバター編集 */
    .avatar-editor {
        display: flex;
        align-items: start;
        gap: 30px;
        margin-bottom: 25px;
    }

    .avatar-preview {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        background-color: var(--main-light);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--main-dark);
        font-weight: 700;
        font-size: 48px;
        border: 3px solid var(--border);
        position: relative;
    }

    .avatar-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .avatar-options {
        flex: 1;
    }

    .avatar-upload-btn {
        display: inline-block;
        background-color: var(--bg-light);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 10px 15px;
        color: var(--text);
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 10px;
    }

    .avatar-upload-btn:hover {
        background-color: var(--bg-alt);
        border-color: var(--main-color);
    }

    .avatar-upload-btn i {
        margin-right: 5px;
        color: var(--main-color);
    }

    .avatar-upload-input {
        display: none;
    }

    .avatar-text {
        margin-top: 10px;
        font-size: 14px;
        color: var(--text-light);
    }

    /* カテゴリ選択 */
    .category-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 15px;
        margin-top: 10px;
    }

    .category-item {
        position: relative;
    }

    .category-input {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    .category-label {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 15px 10px;
        background-color: var(--bg-light);
        border: 1px solid var(--border);
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .category-icon {
        width: 40px;
        height: 40px;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--text-light);
        font-size: 20px;
        transition: all 0.3s ease;
    }

    .category-name {
        font-size: 14px;
        font-weight: 500;
        color: var(--text);
    }

    .category-input:checked+.category-label {
        background-color: var(--main-light);
        border-color: var(--main-color);
    }

    .category-input:checked+.category-label .category-icon {
        color: var(--main-color);
    }

    .category-input:focus+.category-label {
        box-shadow: 0 0 0 3px rgba(107, 154, 222, 0.2);
    }

    /* 通知設定 */
    .notification-item {
        display: flex;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid var(--border);
    }

    .notification-item:last-child {
        border-bottom: none;
    }

    .notification-content {
        flex: 1;
    }

    .notification-title {
        font-weight: 600;
        color: var(--text);
        margin-bottom: 3px;
    }

    .notification-description {
        font-size: 14px;
        color: var(--text-light);
    }

    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 26px;
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
        background-color: #e2e8f0;
        transition: .4s;
        border-radius: 34px;
    }

    .toggle-slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked+.toggle-slider {
        background-color: var(--main-color);
    }

    input:checked+.toggle-slider:before {
        transform: translateX(24px);
    }

    /* アクションボタン */
    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
        padding-top: 20px;
        border-top: 1px solid var(--border);
    }

    .form-actions-left {
        display: flex;
        gap: 15px;
    }

    .delete-account {
        margin-top: 40px;
        padding-top: 20px;
        border-top: 1px solid var(--border);
    }

    .delete-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--error);
        margin-bottom: 10px;
    }

    .delete-description {
        font-size: 14px;
        color: var(--text-light);
        margin-bottom: 20px;
    }

    /* フラッシュメッセージ */
    .flash-message {
        padding: 12px 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-weight: 500;
        display: flex;
        align-items: center;
    }

    .flash-message i {
        margin-right: 10px;
        font-size: 18px;
    }

    .flash-success {
        background-color: rgba(56, 161, 105, 0.1);
        color: var(--success);
        border: 1px solid rgba(56, 161, 105, 0.2);
    }

    /* レスポンシブ対応 */
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

        .avatar-editor {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .avatar-options {
            width: 100%;
        }
    }

    @media (max-width: 768px) {
        .nav-menu {
            display: none;
        }

        .category-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }

        .form-actions {
            flex-direction: column;
            gap: 15px;
        }

        .form-actions-left {
            width: 100%;
        }

        .form-actions-left .btn,
        .form-actions .btn {
            flex: 1;
            text-align: center;
        }
    }

    @media (max-width: 576px) {
        .edit-form-body {
            padding: 20px;
        }

        .page-title {
            font-size: 24px;
        }

        .category-grid {
            grid-template-columns: repeat(2, 1fr);
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
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
                <a href="#" class="sidebar-menu-link">
                    <span class="sidebar-menu-icon"><i class="fas fa-home"></i></span>
                    <span>マイページ</span>
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
        <h1 class="page-title">プロフィール編集</h1>

        <!-- 成功メッセージ（通常は非表示、更新後に表示） -->
        <div class="flash-message flash-success">
            <i class="fas fa-check-circle"></i>
            プロフィールが正常に更新されました
        </div>

        <!-- プロフィール編集フォーム -->
        <form id="profileEditForm">
            <!-- 基本情報セクション -->
            <div class="edit-form-container">
                <div class="edit-form-header">
                    <h2 class="edit-form-title">基本情報</h2>
                </div>
                <div class="edit-form-body">
                    <!-- アバター編集 -->
                    <div class="avatar-editor">
                        <div class="avatar-preview">
                            <span>A</span>
                        </div>
                        <div class="avatar-options">
                            <label class="avatar-upload-btn">
                                <i class="fas fa-upload"></i> 画像をアップロード
                                <input type="file" class="avatar-upload-input" accept="image/*">
                            </label>
                            <p class="avatar-text">推奨サイズ: 400x400ピクセル（JPG, PNG形式）</p>
                            <p class="avatar-text">※3MBまでのファイルをアップロードできます</p>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="nickname" class="form-label">ニックネーム<span class="required-label">*</span></label>
                            <input type="text" id="nickname" class="form-control" value="AIマスター" required>
                            <p class="form-hint">サイト内で表示される名前です</p>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="email" class="form-label">メールアドレス<span class="required-label">*</span></label>
                            <input type="email" id="email" class="form-control" value="example@email.com" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="bio" class="form-label">自己紹介</label>
                            <textarea id="bio" class="form-control" placeholder="あなたの自己紹介や得意なことを入力してください">AI技術を活用して副業に取り組んでいます。特に画像生成やライティングに興味があります。</textarea>
                            <p class="form-hint">200文字以内で入力してください</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- パスワード変更セクション -->
            <div class="edit-form-container">
                <div class="edit-form-header">
                    <h2 class="edit-form-title">パスワード変更</h2>
                </div>
                <div class="edit-form-body">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="current_password" class="form-label">現在のパスワード</label>
                            <input type="password" id="current_password" class="form-control" placeholder="現在のパスワードを入力">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="new_password" class="form-label">新しいパスワード</label>
                            <input type="password" id="new_password" class="form-control" placeholder="新しいパスワードを入力">
                            <p class="form-hint">8文字以上で、英字・数字を含めてください</p>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="form-label">新しいパスワード（確認）</label>
                            <input type="password" id="confirm_password" class="form-control" placeholder="新しいパスワードを再入力">
                        </div>
                    </div>
                </div>
            </div>

            <!-- 興味のある副業カテゴリ -->
            <div class="edit-form-container">
                <div class="edit-form-header">
                    <h2 class="edit-form-title">興味のある副業カテゴリ</h2>
                </div>
                <div class="edit-form-body">
                    <p class="form-hint">あなたの興味に合わせたAIツールや情報をおすすめします（複数選択可）</p>

                    <div class="category-grid">
                        <div class="category-item">
                            <input type="checkbox" id="cat-writing" name="categories[]" value="writing" class="category-input" checked>
                            <label for="cat-writing" class="category-label">
                                <div class="category-icon"><i class="fas fa-pen-nib"></i></div>
                                <div class="category-name">ライティング</div>
                            </label>
                        </div>

                        <div class="category-item">
                            <input type="checkbox" id="cat-programming" name="categories[]" value="programming" class="category-input">
                            <label for="cat-programming" class="category-label">
                                <div class="category-icon"><i class="fas fa-code"></i></div>
                                <div class="category-name">プログラミング</div>
                            </label>
                        </div>

                        <div class="category-item">
                            <input type="checkbox" id="cat-design" name="categories[]" value="design" class="category-input" checked>
                            <label for="cat-design" class="category-label">
                                <div class="category-icon"><i class="fas fa-palette"></i></div>
                                <div class="category-name">デザイン</div>
                            </label>
                        </div>

                        <div class="category-item">
                            <input type="checkbox" id="cat-video" name="categories[]" value="video" class="category-input" checked>
                            <label for="cat-video" class="category-label">
                                <div class="category-icon"><i class="fas fa-video"></i></div>
                                <div class="category-name">動画編集</div>
                            </label>
                        </div>

                        <div class="category-item">
                            <input type="checkbox" id="cat-marketing" name="categories[]" value="marketing" class="category-input">
                            <label for="cat-marketing" class="category-label">
                                <div class="category-icon"><i class="fas fa-bullhorn"></i></div>
                                <div class="category-name">マーケティング</div>
                            </label>
                        </div>

                        <div class="category-item">
                            <input type="checkbox" id="cat-photo" name="categories[]" value="photo" class="category-input">
                            <label for="cat-photo" class="category-label">
                                <div class="category-icon"><i class="fas fa-camera"></i></div>
                                <div class="category-name">写真撮影</div>
                            </label>
                        </div>

                        <div class="category-item">
                            <input type="checkbox" id="cat-translation" name="categories[]" value="translation" class="category-input">
                            <label for="cat-translation" class="category-label">
                                <div class="category-icon"><i class="fas fa-language"></i></div>
                                <div class="category-name">翻訳</div>
                            </label>
                        </div>

                        <div class="category-item">
                            <input type="checkbox" id="cat-consult" name="categories[]" value="consult" class="category-input">
                            <label for="cat-consult" class="category-label">
                                <div class="category-icon"><i class="fas fa-comments"></i></div>
                                <div class="category-name">コンサルティング</div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 通知設定 -->
            <div class="edit-form-container">
                <div class="edit-form-header">
                    <h2 class="edit-form-title">通知設定</h2>
                </div>
                <div class="edit-form-body">
                    <div class="notification-item">
                        <div class="notification-content">
                            <h3 class="notification-title">新着AIツール情報</h3>
                            <p class="notification-description">新しいAIツールが追加された際の通知を受け取る</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- アクションボタン -->
            <div class="form-actions">
                <div class="form-actions-left">
                    <button type="button" class="btn btn-secondary">キャンセル</button>
                </div>
                <button type="submit" class="btn">変更を保存</button>
            </div>

            <!-- アカウント削除 -->
            <div class="delete-account">
                <h3 class="delete-title">アカウントの削除</h3>
                <p class="delete-description">アカウントを削除すると、すべてのデータが完全に削除され、復元することはできません。</p>
                <button type="button" class="btn btn-danger">アカウントを削除する</button>
            </div>
        </form>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // プロフィール編集フォーム送信
        const profileForm = document.getElementById('profileEditForm');

        profileForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // フォーム送信処理（実際はAjaxなどで処理）
            console.log('プロフィール更新処理');

            // 成功メッセージを表示（実際はレスポンス後に表示）
            const successMsg = document.querySelector('.flash-message');
            successMsg.style.display = 'flex';

            // 数秒後にメッセージを非表示
            setTimeout(() => {
                successMsg.style.display = 'none';
            }, 5000);
        });
    });
</script>

<?php get_footer(); ?>