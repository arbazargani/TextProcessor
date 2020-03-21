<?php
    error_reporting(0);
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once 'core.php';
    }
    if (isset($final)) {
        $job_status = 1;
    }
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TextProcessor Engine</title>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/en/1/11/Fast_text.png" type="image/x-icon">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="assets/css/uikit-rtl.min.css" />

    <!-- TinyMCE JS -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <style>
        html {
            background: #f9f9f9;
        }
        * {
            font-family: IranSans !important;
        }
        a {
            color: orange !important;
        }
        #page-footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: gray;
            text-align: center;
        }
        #page-footer a {
            color: black !important;
        }
    </style>

</head>
<body>
<?php if(isset($final) && $final): ?>
    <div class="uk-grid uk-child-width-1-2@m uk-padding" uk-grid>
<?php else: ?>
    <div class="uk-padding">
<?php endif; ?>
    <div>
        <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-margin-medium-bottom">
            <h3 class="uk-card-title">ثبت متن</h3>
            <form class="uk-form-stacked" method="POST">
                <div class="uk-margin">
                <script>
                    tinymce.init({
                        // selector: '#content',
                        directionality : "rtl"
                    });
                </script>
                    <label class="uk-form-label" for="content">محتوای خبر</label>
                    <div class="uk-form-controls">
                        <textarea class="uk-textarea" name="content" id="content" rows="10" tabindex="1"></textarea>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-form-controls">
                        <div class="uk-float-right">

                            <input class="uk-input" type="text" name="keyword" id="keyword" placeholder="کلمه کلیدی" tabindex="2">

                            <ul class="uk-list uk-list-bullet">
                                <li>
                                    <p>برای ایجاد خط جدید در متن نهایی، از <code>***</code> استفاده نمایید.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="uk-form-controls uk-float-left">
                        <button class="uk-button uk-button-primary uk-border-rounded" type="submit" tabindex="3">بازبینی</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php if(isset($final) && $final): ?>
    <div>
        <div class="uk-card uk-card-secondary uk-card-hover uk-card-body uk-border-rounded">
            <h3 class="uk-card-title">متن ساختار یافته</h3>
            <p><?php echo $final; ?></p>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php if(isset($optimizeInfo)): ?>
<div class="uk-padding uk-background-primary">
    <div class="uk-card uk-card-default uk-background-muted uk-card-body uk-border-rounded uk-margin-medium-bottom">

        <?php if($optimizeInfo['word_count'] < 300): ?>

        <p class="uk-text-danger">محتوای شما کمتر از ۳۰۰ کلمه می‌باشد، بهتر است آنرا به ۳۰۰ الی ۱۰۰۰ برسانید.</p>

        <?php elseif($optimizeInfo['word_count'] >= 300 && $optimizeInfo['word_count'] <= 1000): ?>

        <p class="uk-text-warning">محتوای شما دارای بیش از ۳۰۰ کلمه است. اما بهتر است آنرا به ۱۰۰۰ برسانید.</p>

        <?php elseif($optimizeInfo['word_count'] > 1000): ?>

        <p class="uk-text-success">تعداد کلمات محتوای شما بیش از ۱۰۰۰ می‌باشد.</p>

        <?php endif; ?>



        <?php if($optimizeInfo['density'] <= 1): ?>

        <p class="uk-text-danger">نسبت کلمه کلیدی به کل محتوا کمتر از ۱ درصد می‌باشد. سعی کنید این نسبت را بیشتر کنید.</p>

        <?php elseif($optimizeInfo['density'] > 1 && $optimizeInfo['density'] <= 2): ?>

        <p class="uk-text-warning">نسبت کلمه کلیدی به کل محتوا حدود ۲ درصد می‌باشد. سعی کنید این نسبت را به ۳ برسانید.</p>

        <?php elseif($optimizeInfo['density'] > 2 && $optimizeInfo['density'] <= 3): ?>

        <p class="uk-text-success">نسبت کلمه کلیدی به تمام متن مناسب است.</p>

        <?php elseif($optimizeInfo['density'] > 3): ?>

        <p class="uk-text-danger">به نظر میرسد در این محتوا نسبت کلمه کلیدی بیش از حد است. آنرا کمتر کنید.</p>

        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
<footer id="page-footer" class="uk-margin-top uk-background-muted uk-box-shadow-medium">
    <div class="uk-container uk-padding-small">
        <p class="uk-text-small">© <?php echo date('Y'); ?> | <a href="mailto:arbazargani1998@gmail.com">Alireza Bazargani</a>, All Rights Reserved</p>
    </div>
</footer>
</body>
</html>