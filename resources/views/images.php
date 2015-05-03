<html>
<head>
    <title> Upload Images</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

</head>
<body>

<div class="container">
    <div class="row center-block" style="text-align: center;">
        <h3> รูปภาพต้องเป็นไฟล์ .png และควรมีขนาด 640x480 </h3>
        <?php
        if ($image) {
            echo '<img src="/image.png" width="640" height="480"><br/><br/>';
            echo '<a href="/image.download" target="_blank" class="btn btn-info">Download</a>';
        } else {
            echo '<img src="http://placehold.it/640x480">';
        }
        ?>
    </div>
    <hr/>
    <div>
        <form action="/images" method="post" enctype="multipart/form-data">
            <input type="file" name="image" placeholder="upload png 640x480"/>
            <button type="submit" class="btn btn-default"> uplaod</button>
        </form>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>