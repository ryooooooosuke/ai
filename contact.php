<?php

/**
 * Template Name: お問い合わせ
 */
get_header(); ?>
<style>
    /* リセットとベーススタイル */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Hiragino Sans', 'Hiragino Kaku Gothic ProN', 'Noto Sans JP', sans-serif;
    }

    :root {
        --main-color: #6b9ade;
        --main-dark: #3a6ea5;
        --main-light: #d0e1ff;
        --accent: #9cc0ff;
        --text: #2c3e50;
        --text-light: #647789;
        --bg: #ffffff;
        --bg-light: #f5f9ff;
        --bg-alt: #e9f2ff;
        --border: #d8e6ff;
        --shadow: 0 2px 10px rgba(107, 154, 222, 0.08);
        --radius: 12px;
        --form-shadow: 0 4px 15px rgba(107, 154, 222, 0.1);
    }

    body {
        background-color: var(--bg-light);
        color: var(--text);
        line-height: 1.6;
    }

    a {
        text-decoration: none;
        color: var(--main-color);
        transition: all 0.3s ease;
    }

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
        text-align: center;
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

    /* お問い合わせフォーム */
    .contact-form-wrapper {
        max-width: 700px;
        margin: 50px auto 0;
    }

    .contact-form-container {
        background-color: var(--bg);
        border-radius: var(--radius);
        box-shadow: var(--form-shadow);
        padding: 40px;
        border: 1px solid var(--border);
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

    textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%232c3e50' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 15px center;
        padding-right: 40px;
    }

    .checkbox-group {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 25px;
    }

    .checkbox-input {
        margin-top: 4px;
    }

    .checkbox-label {
        color: var(--text-light);
        font-size: 14px;
    }

    .submit-btn {
        width: 100%;
        padding: 14px;
        font-size: 16px;
    }

    /* お問い合わせフォームのレスポンシブ調整 */

    /* FAQ セクション */
    .faq-section {
        background-color: var(--bg-alt);
        padding: 70px 0;
    }

    .faq-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .contact-faq-item {
        background-color: var(--bg);
        border-radius: var(--radius);
        margin-bottom: 20px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        overflow: hidden;
    }

    .contact-faq-question {
        padding: 20px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        font-weight: 600;
        color: var(--text);
        transition: all 0.3s ease;
    }

    .contact-faq-question:hover {
        background-color: var(--bg-light);
    }

    .contact-faq-question i {
        transform: rotate(0);
        transition: transform 0.3s ease;
        color: var(--main-color);
    }

    .faq-answer {
        padding: 0 25px;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease, padding 0.3s ease;
        color: var(--text-light);
    }

    .contact-faq-item.active .contact-faq-question i {
        transform: rotate(180deg);
    }

    .contact-faq-item.active .faq-answer {
        padding: 10px 25px 20px;
        max-height: 500px;
    }

    /* レスポンシブ対応 */
    @media (max-width: 991px) {
        .contact-form-wrapper {
            max-width: 100%;
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

        .page-description {
            font-size: 16px;
        }

        .contact-form-container,
        .contact-info {
            padding: 30px 20px;
        }
    }

    @media (max-width: 576px) {
        .page-header {
            padding: 40px 0;
        }

        .section-title {
            font-size: 26px;
        }

        .footer-grid {
            grid-template-columns: 1fr;
            gap: 30px;
        }
    }
</style>
<!-- ページヘッダー -->
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <h1 class="page-title">お問い合わせ</h1>
            <p class="page-description">AI×副業に関するご質問やご相談、サービスに関するお問い合わせはこちらからお願いいたします。</p>
        </div>
    </div>
</section>

<!-- お問い合わせセクション -->
<section class="section">
    <div class="container">
        <div class="contact-form-wrapper">
            <div class="contact-form-container">
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name" class="form-label">お名前 <span style="color: #FF6B6B;">*</span></label>
                        <input type="text" id="name" class="form-control" placeholder="例：山田 太郎" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">メールアドレス <span style="color: #FF6B6B;">*</span></label>
                        <input type="email" id="email" class="form-control" placeholder="例：example@email.com" required>
                    </div>
                    <div class="form-group">
                        <label for="inquiry_type" class="form-label">お問い合わせ種別</label>
                        <select id="inquiry_type" class="form-control">
                            <option value="">お問い合わせ種別を選択してください</option>
                            <option value="general">一般的なお問い合わせ</option>
                            <option value="service">サービスについて</option>
                            <option value="partnership">業務提携・協業について</option>
                            <option value="media">取材・メディア掲載について</option>
                            <option value="other">その他</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message" class="form-label">お問い合わせ内容 <span style="color: #FF6B6B;">*</span></label>
                        <textarea id="message" class="form-control" placeholder="お問い合わせ内容を入力してください" required></textarea>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" id="privacy_policy" class="checkbox-input" required>
                        <label for="privacy_policy" class="checkbox-label">
                            <a href="#" target="_blank">プライバシーポリシー</a>に同意の上、送信してください。
                        </label>
                    </div>
                    <button type="submit" class="btn submit-btn">送信する</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- FAQ セクション -->
<section class="faq-section">
    <div class="container">
        <h2 class="section-title">よくあるご質問</h2>
        <p class="section-subtitle">お問い合わせの前に、よくある質問をご確認ください。</p>

        <div class="faq-container">
            <div class="contact-faq-item active">
                <div class="contact-faq-question">
                    <span>AI×副業ポータルとは何ですか？</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>AI×副業ポータルは、最新のAI技術を活用して副業の効率を向上させるための情報ポータルサイトです。厳選されたAIツールの紹介や使い方ガイド、副業に関するコラムなどを提供しています。</p>
                </div>
            </div>

            <div class="contact-faq-item">
                <div class="contact-faq-question">
                    <span>利用は無料ですか？</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>基本的な情報閲覧やAIツール検索は無料でご利用いただけます。一部のプレミアムコンテンツや専門講座については有料会員登録が必要となります。詳細は会員プラン一覧をご確認ください。</p>
                </div>
            </div>

            <div class="contact-faq-item">
                <div class="contact-faq-question">
                    <span>会員登録するメリットは何ですか？</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>会員登録いただくと、AIツールの詳細レビューやチュートリアル、専門家による副業ガイドなどの特別コンテンツにアクセスできます。また、会員限定のウェビナーやコミュニティ参加、ツールの割引クーポンなどの特典も提供しています。</p>
                </div>
            </div>

            <div class="contact-faq-item">
                <div class="contact-faq-question">
                    <span>AIツールの紹介依頼や協業の相談はできますか？</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>はい、可能です。AIツール開発者の方やサービス提供者の方は、お問い合わせフォームから「業務提携・協業について」を選択してご連絡ください。折り返し担当者からご連絡させていただきます。</p>
                </div>
            </div>

            <div class="contact-faq-item">
                <div class="contact-faq-question">
                    <span>退会はどのようにすればよいですか？</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>会員ページのアカウント設定から退会手続きが可能です。退会に関してご不明点がある場合は、お問い合わせフォームからお気軽にご相談ください。</p>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // FAQ アコーディオン
        const faqItems = document.querySelectorAll('.contact-faq-item');

        faqItems.forEach(item => {
            const question = item.querySelector('.contact-faq-question');

            question.addEventListener('click', () => {
                item.classList.toggle('active');
            });
        });

        // お問い合わせフォーム送信
        const contactForm = document.getElementById('contactForm');

        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // 送信処理をここに実装
                // 実際のプロジェクトではAjaxなどでサーバーに送信

                alert('お問い合わせを受け付けました。担当者から折り返しご連絡いたします。');
                contactForm.reset();
            });
        }
    });
</script>
<!-- フッター -->
<?php get_footer(); ?>

<!-- JavaScript -->