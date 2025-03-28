    <?php

    /**
     * Template Name: ログイン
     */
    get_header(); ?>
    <style>
        /* ページヘッダー */
        .page-header {
            background-color: var(--bg);
            padding: 60px 0;
            border-bottom: 1px solid var(--border);
        }

        .page-header-content {
            text-align: center;
        }

        .page-title {
            font-size: 36px;
            color: var(--text);
            margin-bottom: 15px;
            font-weight: 700;
        }

        .page-description {
            font-size: 18px;
            color: var(--text-light);
            max-width: 700px;
            margin: 0 auto;
        }

        /* ログインフォーム */
        .login-section {
            padding: 60px 0 80px;
        }

        .login-container {
            max-width: 450px;
            margin: 0 auto;
            background-color: var(--bg);
            border-radius: var(--radius);
            box-shadow: var(--form-shadow);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .login-header {
            background-color: var(--main-light);
            padding: 25px 30px;
            text-align: center;
        }

        .login-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--main-dark);
            margin-bottom: 5px;
        }

        .login-subtitle {
            color: var(--text-light);
            font-size: 15px;
        }

        .login-form-container {
            padding: 35px 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text);
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

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox-label {
            color: var(--text);
            font-size: 14px;
        }

        .forgot-password {
            font-size: 14px;
            color: var(--main-color);
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .create-account {
            text-align: center;
            margin-top: 25px;
            font-size: 15px;
            color: var(--text-light);
        }

        .create-account a {
            font-weight: 600;
            margin-left: 5px;
        }

        /* Google登録ボタン */
        .google-login-container {
            margin-bottom: 25px;
            text-align: center;
        }

        .divider-with-text {
            position: relative;
            margin-bottom: 20px;
        }

        .divider-with-text::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: var(--border);
            z-index: 1;
        }

        .divider-with-text span {
            position: relative;
            z-index: 2;
            background-color: var(--bg);
            padding: 0 15px;
            font-size: 16px;
            font-weight: 600;
            color: var(--main-dark);
        }

        .form-divider {
            position: relative;
            text-align: center;
            margin: 25px 0;
        }

        .form-divider::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: var(--border);
            z-index: 1;
        }

        .form-divider span {
            position: relative;
            z-index: 2;
            background-color: var(--bg);
            padding: 0 15px;
            font-size: 14px;
            color: var(--text-light);
        }

        .google-signin-button {
            display: inline-flex;
            align-items: center;
            background-color: white;
            border: 1px solid #dadce0;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1px;
            width: 100%;
            max-width: 320px;
            height: 50px;
            text-align: center;
            transition: all 0.2s ease;
        }

        .google-signin-button:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .google-icon-wrapper {
            width: 48px;
            height: 48px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            border-radius: 2px;
        }

        .google-icon {
            width: 24px;
            height: 24px;
        }

        .google-button-text {
            flex-grow: 1;
            padding: 10px 0;
            font-size: 16px;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            color: #757575;
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

            .page-description {
                font-size: 16px;
            }

            .login-header,
            .login-form-container {
                padding: 25px 20px;
            }

            .remember-forgot {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }

        @media (max-width: 576px) {
            .page-header {
                padding: 40px 0;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
        }
    </style>

    <!-- ログインセクション -->
    <section class="login-section">
        <div class="container">
            <div class="login-container">
                <div class="login-header">
                    <h2 class="login-title">アカウントにログイン</h2>
                    <p class="login-subtitle">登録済みのアカウント情報でログインしてください</p>
                </div>

                <div class="login-form-container">
                    <!-- Googleアカウントでログイン -->
                    <div class="google-login-container">
                        <div class="divider-with-text">
                            <span>Googleアカウントで簡単ログイン</span>
                        </div>
                        <a href="#" class="google-signin-button">
                            <div class="google-icon-wrapper">
                                <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" alt="Google Logo">
                            </div>
                            <span class="google-button-text">Googleでログイン</span>
                        </a>
                    </div>

                    <div class="form-divider">
                        <span>または</span>
                    </div>

                    <form id="loginForm">
                        <div class="form-group">
                            <label for="email" class="form-label">メールアドレス</label>
                            <input type="email" id="email" class="form-control" placeholder="登録したメールアドレス" required>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">パスワード</label>
                            <input type="password" id="password" class="form-control" placeholder="パスワード" required>
                        </div>

                        <div class="remember-forgot">
                            <div class="checkbox-group">
                                <input type="checkbox" id="remember_me" class="checkbox-input">
                                <label for="remember_me" class="checkbox-label">ログイン状態を保持する</label>
                            </div>
                            <a href="#" class="forgot-password">パスワードをお忘れですか？</a>
                        </div>

                        <button type="submit" class="btn login-btn">ログイン</button>
                    </form>

                    <div class="create-account">
                        アカウントをお持ちでない方は<a href="#">新規会員登録</a>
                    </div>
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

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ログインフォーム送信
            const loginForm = document.getElementById('loginForm');

            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // ログイン処理（実際はサーバーサイドで処理）
                alert('ログイン処理を行います');
                // ログイン成功時はリダイレクト
                // window.location.href = 'dashboard.html';
            });
        });
    </script>
    </body>

    </html>