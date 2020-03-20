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
                        selector: '#content'
                    });
                </script>
                    <label class="uk-form-label" for="content">محتوای خبر</label>
                    <div class="uk-form-controls">
                        <textarea class="uk-textarea" name="content" id="content" rows="10"></textarea>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-form-controls uk-float-left">
                        <button class="uk-button uk-button-primary uk-border-rounded" type="submit">بازبینی</button>
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
<footer id="page-footer" class="uk-margin-top uk-background-muted uk-box-shadow-medium">
    <div class="uk-container uk-padding-small">
        <p class="uk-text-small">© <?php echo date('Y'); ?> | <a href="mailto:arbazargani1998@gmail.com">Alireza Bazargani</a>, All Rights Reserved</p>
    </div>
</footer>
</body>
</html>