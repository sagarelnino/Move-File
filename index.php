<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <title>簡単なファイル移動するアプリ</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>

<body>
<div class="col-md-8">
    <?php
        if(isset($_SESSION['message'])){?>
            <h3 class="text-center" style="color: green"><?php echo $_SESSION['message']?></h3>
        <?php
        unset($_SESSION['message']);
        }
    ?>
    <div class="my-box">
        <h3 class="title text-center">簡単なファイル移動するアプリ</h3>
        <form action="process.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="source_file">Select Source:</label>
                <input class="form-control" type="file" name="files[]" id="files" multiple="" directory="" webkitdirectory="" mozdirectory="">
            </div>
            <div class="form-group">
                <label for="destination_file">Select Destination:</label>
                <input type="file" name="destination_file[]" class="form-control" placeholder="Select Destination file" id="destination_file" required webkitdirectory directory multiple/>
            </div>
                <input type="hidden" name="main_destination" id="main_destination">
            <div class="form-group">
                <label for="file_extension">Select File Extension:</label>
                <select name="file_extension" id="file_extension" class="form-control">
                    <option value="all">All</option>
                    <option value="mp4">mp4</option>
                    <option value="mp3">mp3</option>
                    <option value="jpeg">jpeg</option>
                    <option value="jpg">jpg</option>
                    <option value="png">png</option>
                    <option value="pdf">pdf</option>
                    <option value="bmp">bmp</option>
                    <option value="txt">txt</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    $('#destination_file').change(function () {
        var filePath = $(this).val();
        console.log(filePath);
    });
</script>

</body>

</html>