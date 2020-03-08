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
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.3.3/dist/css/uikit-rtl.min.css" />
    <style>
        * {
            font-family: IranSans !important;
        }
        a {
            color: orange !important;
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
        <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
            <h3 class="uk-card-title">ثبت متن</h3>
            <form class="uk-form-stacked" method="POST">
                <div class="uk-margin">
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
            <p style="height: 500px; overflow: scroll;"><?php echo $final; ?></p>
        </div>
    </div>
    <?php endif; ?>
</div>
</body>
</html>