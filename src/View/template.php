<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css"
        rel="stylesheet" />
    <link href="src/asset/css/app.css" rel="stylesheet" />
</head>

<body>
    <?= $content ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="src/asset/js/jquery.timeago.js"></script>
    <script src="src/asset/js/jquery.timeago.fr.js"></script>
    <script src="src/asset/js//parsley/js/parsley.min.js"></script>
    <script src="src/asset/js//parsley/i18n/ar.js"></script>
    <script src="src/asset/js//parsley/i18n/fr.js"></script>
    <script>
    $(document).ready(function() {
        $('.timeago').timeago();
        var objDiv = $(".msg_history");
        objDiv.scrollTop = objDiv.scrollHeight;
    });
    </script>
</body>

</html>