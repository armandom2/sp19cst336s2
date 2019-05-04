<?php include 'api/upload.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Project 5</title>
    </head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    
    <body>
        <div class = "container">
            <div class="up-frm">
                <h1><i>Photo Uploader </i></h1>
                <form action="" method="post" enctype="multipart/form-data">
                    Select Image Files to Upload:
                    <input type="file" name="image" multiple >
                    <input id = "submitbutton"type="submit" name="submit" value="UPLOAD">
                    
                    <br>
                    E-mail: <input id = "textbox" type='text' id="getEmail" name='email_address' value='' /><br>
                    Caption:<input id="captionBox" type='text' id="getCaption" name='caption' value='' />
                </form>
            </div>
            
            <div class="gallery">
                <?php
                    $db = mysqli_connect("us-cdbr-iron-east-03.cleardb.net","bce62f200bbfcd","9eb9c2a7","heroku_50bf8b70dd9c9ee");
                    $sql = "SELECT * from image_upload";
                    $sth = $db->query($sql);
                    while($result=mysqli_fetch_array($sth)){
                        echo '<img style="width:400px; height:250px;"src="data:image/jpeg;base64,'.base64_encode( $result['media'] ).'"onclick="myFunction(this);" />Caption: '.$result['caption'].'<br>Uploaded by: '.$result['email_address'].'<br> Data/Time: '.$result['timestamp'];
                        
                    }
                ?>
            </div>
            <div id="myModal" class="modal">
              <span class="close">&times;</span>
              <img class="modal-content" id="img01">
            </div>
        </div> 
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
        function myFunction(imgs) {
            // Get the modal
            var modal = document.getElementById('myModal');
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var modalImg = document.getElementById("img01");
            modal.style.display = "block";
            modalImg.src = imgs.src;
            var span = document.getElementsByClassName("close")[0];
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() { 
            modal.style.display = "none";
            };
        }
    </script>
    
</html>
