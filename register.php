<?php

/**
 * Template Name: 会員登録
 */
get_header(); ?>


<style>
    .section {
        padding: 0;
    }

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

    /* 会員登録フォーム */
    .signup-container {
        max-width: 900px;
        margin: 50px auto 0;
        background-color: var(--bg);
        border-radius: var(--radius);
        box-shadow: var(--form-shadow);
        border: 1px solid var(--border);
        overflow: hidden;
    }

    .signup-header {
        background-color: var(--main-light);
        padding: 25px 40px;
        position: relative;
    }

    .signup-title {
        font-size: 24px;
        font-weight: 700;
        color: var(--main-dark);
        margin-bottom: 10px;
    }

    .signup-subtitle {
        color: var(--text-light);
        font-size: 16px;
    }

    /* 登録ステップ */
    .signup-steps {
        display: flex;
        margin: 30px 0 10px;
        padding: 0 40px;
    }

    .step-item {
        flex: 1;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .step-item:not(:last-child)::after {
        content: '';
        position: absolute;
        top: 15px;
        right: -50%;
        width: 100%;
        height: 2px;
        background-color: var(--border);
        z-index: -1;
    }

    .step-item.active:not(:last-child)::after {
        background-color: var(--main-color);
    }

    .step-circle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: var(--bg-light);
        border: 2px solid var(--border);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 10px;
        font-weight: 600;
        color: var(--text-light);
        transition: all 0.3s ease;
    }

    .step-item.active .step-circle,
    .step-item.completed .step-circle {
        background-color: var(--main-color);
        border-color: var(--main-color);
        color: white;
    }

    .step-label {
        font-size: 14px;
        color: var(--text-light);
        font-weight: 500;
    }

    .step-item.active .step-label {
        color: var(--main-color);
        font-weight: 600;
    }

    /* フォーム内容 */
    .signup-form-container {
        padding: 30px 40px 40px;
    }

    .form-section {
        border-bottom: 1px solid var(--border);
        padding-bottom: 30px;
        margin-bottom: 30px;
    }

    .form-section:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .form-section-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--text);
        margin-bottom: 20px;
        padding-left: 15px;
        border-left: 3px solid var(--main-color);
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 20px;
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
        color: #FF6B6B;
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

    .form-hint {
        font-size: 13px;
        color: var(--text-light);
        margin-top: 5px;
    }

    .password-strength {
        margin-top: 8px;
        height: 4px;
        border-radius: 2px;
        background-color: #eaeaea;
        overflow: hidden;
    }

    .password-strength-meter {
        height: 100%;
        width: 0;
        transition: width 0.3s ease;
    }

    .password-strength-text {
        font-size: 12px;
        margin-top: 5px;
        text-align: right;
    }

    .strength-weak {
        background-color: #f56565;
        width: 33%;
    }

    .strength-medium {
        background-color: #ed8936;
        width: 66%;
    }

    .strength-strong {
        background-color: #48bb78;
        width: 100%;
    }

    /* カテゴリ選択 */
    .category-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
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

    /* 同意チェックボックス */
    .agreement-container {
        background-color: var(--bg-light);
        padding: 20px;
        border-radius: 8px;
        margin-top: 30px;
    }

    .checkbox-group {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 15px;
    }

    .checkbox-input {
        margin-top: 4px;
    }

    .checkbox-label {
        color: var(--text);
        font-size: 14px;
    }

    /* Googleボタン */
    .btn-google {
        background-color: #4285F4;
        color: white;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 14px 20px;
        font-weight: 600;
        width: 300px;
        margin: 0 auto;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(66, 133, 244, 0.3);
        transition: all 0.3s ease;
    }

    .btn-google:hover {
        background-color: #3367D6;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(66, 133, 244, 0.4);
    }

    .btn-google i {
        color: white;
        font-size: 20px;
        background-color: #4285F4;
    }

    /* ボタン */
    .form-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
    }

    .submit-btn {
        min-width: 160px;
    }

    .already-account {
        text-align: center;
        margin-top: 25px;
        font-size: 14px;
        color: var(--text-light);
    }

    .google-signup {
        margin-top: 20px;
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

        .signup-header,
        .signup-form-container {
            padding: 25px 20px;
        }

        .signup-steps {
            padding: 0 20px;
        }

        .form-buttons {
            flex-direction: column;
            gap: 15px;
        }

        .submit-btn,
        .back-btn {
            width: 100%;
            text-align: center;
        }
    }

    @media (max-width: 576px) {
        .page-header {
            padding: 40px 0;
        }

        .section-title {
            font-size: 26px;
        }

        .step-label {
            font-size: 12px;
        }

        .footer-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .category-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>

<!-- 会員登録セクション -->
<section class="section">
    <div class="container">
        <div class="signup-container">
            <div class="signup-header">
                <h2 class="signup-title">新規会員登録</h2>
                <p class="signup-subtitle">以下のフォームに必要事項を入力して登録を完了してください。</p>
            </div>

            <!-- 登録ステップ -->
            <div class="signup-steps">
                <div class="step-item active">
                    <div class="step-circle">1</div>
                    <div class="step-label">会員情報入力</div>
                </div>
                <div class="step-item">
                    <div class="step-circle">2</div>
                    <div class="step-label">メール認証</div>
                </div>
                <div class="step-item">
                    <div class="step-circle">3</div>
                    <div class="step-label">登録完了</div>
                </div>
            </div>

            <!-- 登録フォーム -->
            <div class="signup-form-container">
                <form id="signupForm">
                    <!-- 基本情報セクション -->
                    <div class="form-section">
                        <h3 class="form-section-title">基本情報</h3>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="nickname" class="form-label">ニックネーム<span class="required-label">*</span></label>
                                <input type="text" id="nickname" class="form-control" placeholder="例：AIマスター" required>
                                <p class="form-hint">サイト内で表示される名前です</p>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="email" class="form-label">メールアドレス<span class="required-label">*</span></label>
                                <input type="email" id="email" class="form-control" placeholder="例：example@email.com" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="password" class="form-label">パスワード<span class="required-label">*</span></label>
                                <input type="password" id="password" class="form-control" placeholder="8文字以上の英数字" required>
                                <div class="password-strength">
                                    <div class="password-strength-meter strength-medium"></div>
                                </div>
                                <div class="password-strength-text">パスワード強度：中</div>
                                <p class="form-hint">8文字以上で、英字・数字を含めてください</p>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword" class="form-label">パスワード（確認）<span class="required-label">*</span></label>
                                <input type="password" id="confirmPassword" class="form-control" placeholder="パスワードを再入力" required>
                            </div>
                        </div>
                    </div>

                    <!-- 興味のあるカテゴリセクション -->
                    <div class="form-section">
                        <h3 class="form-section-title">興味のある副業カテゴリ（複数選択可）</h3>
                        <p class="form-hint">あなたの興味に合わせたAIツールや情報をおすすめします</p>

                        <div class="category-grid">
                            <div class="category-item">
                                <input type="checkbox" id="cat-writing" name="categories[]" value="writing" class="category-input">
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
                                <input type="checkbox" id="cat-design" name="categories[]" value="design" class="category-input">
                                <label for="cat-design" class="category-label">
                                    <div class="category-icon"><i class="fas fa-palette"></i></div>
                                    <div class="category-name">デザイン</div>
                                </label>
                            </div>

                            <div class="category-item">
                                <input type="checkbox" id="cat-video" name="categories[]" value="video" class="category-input">
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

                    <!-- メール配信設定 -->
                    <div class="form-section">
                        <h3 class="form-section-title">メール配信設定</h3>

                        <div class="checkbox-group">
                            <input type="checkbox" id="mail_ai_news" name="mail_ai_news" class="checkbox-input" checked>
                            <label for="mail_ai_news" class="checkbox-label">
                                最新のAIニュースやトレンドに関するメールを受け取る
                            </label>
                        </div>
                    </div>

                    <!-- 利用規約同意 -->
                    <div class="agreement-container">
                        <div class="checkbox-group">
                            <input type="checkbox" id="terms_agreement" name="terms_agreement" class="checkbox-input" required>
                            <label for="terms_agreement" class="checkbox-label">
                                <a href="#" target="_blank">利用規約</a>および<a href="#" target="_blank">プライバシーポリシー</a>に同意します。
                            </label>
                        </div>
                    </div>

                    <!-- ボタン -->
                    <div class="form-buttons">
                        <button type="submit" class="btn submit-btn">登録する</button>
                    </div>

                    <div class="already-account">
                        すでにアカウントをお持ちの方は<a href="#">こちらからログイン</a>
                    </div>
                </form>

                <!-- Googleアカウントでの登録 -->
                <div class="social-signup">
                    <div class="google-signup">
                        <a href="#" class="btn btn-google">
                            <i class="fab fa-google"></i> Googleアカウントで登録
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // パスワード強度確認
        const passwordInput = document.getElementById('password');
        const strengthMeter = document.querySelector('.password-strength-meter');
        const strengthText = document.querySelector('.password-strength-text');

        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;

            if (password.length >= 8) strength += 1;
            if (password.match(/[A-Z]/)) strength += 1;
            if (password.match(/[0-9]/)) strength += 1;
            if (password.match(/[^A-Za-z0-9]/)) strength += 1;

            strengthMeter.className = 'password-strength-meter';

            if (strength <= 1) {
                strengthMeter.classList.add('strength-weak');
                strengthText.textContent = 'パスワード強度：弱';
            } else if (strength <= 3) {
                strengthMeter.classList.add('strength-medium');
                strengthText.textContent = 'パスワード強度：中';
            } else {
                strengthMeter.classList.add('strength-strong');
                strengthText.textContent = 'パスワード強度：強';
            }
        });

        // フォーム送信
        const signupForm = document.getElementById('signupForm');

        signupForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // バリデーションとフォーム送信処理
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                alert('パスワードと確認用パスワードが一致しません');
                return false;
            }

            // フォーム送信処理（実際はAjaxなどで処理）
            alert('登録フォームを送信しました。確認メールをご確認ください。');

            // 次のステップへの遷移（実際はサーバーレスポンス後に行う）
            const steps = document.querySelectorAll('.step-item');
            steps[0].classList.remove('active');
            steps[0].classList.add('completed');
            steps[1].classList.add('active');
        });
    });
</script>
<?php get_footer(); ?>