<div class="row">
   <div class="col l12 m12 s12">
     <form action="php/upload_recipe.php" method="post" enctype="multipart/form-data">
     <div class="card">
       <div class="card-content">
         <span class="card-title center">New book</span>
          <div class="row">
            <div class="col l4 ">
              <div class="file-field input-field">
                <div class="btn">
                  <span>Image</span>
                  <input type="file" id="my_file" name="image" onchange="previewFile()">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" id="my_file" name="image" >
                </div>
              </div>
              <img src="img/image_preview.png" id="img" height="200" width="100%" alt="Image preview...">
              <script type="text/javascript">
              function previewFile() {
                var allowedExtension = ['jpeg', 'jpg', 'png'];
                var fileExtension = document.getElementById('my_file').value.split('.').pop().toLowerCase();
                var isValidFile = false;

                    for(var index in allowedExtension) {
                        if(fileExtension === allowedExtension[index]) {
                            isValidFile = true;
                            var preview = document.querySelector('#img');
                            var file    = document.querySelector('input[type=file]').files[0];
                            var reader  = new FileReader();

                            reader.addEventListener("load", function () {
                              preview.src = reader.result;
                            }, false);

                            if (file) {
                              reader.readAsDataURL(file);
                            }
                            break;
                        }
                    }// for

                    if(!isValidFile) {
                        alert('Allowed Extensions are : *.' + allowedExtension.join(', *.'));
                    }
                    return isValidFile;
              }
              </script>
            </div>
            <div class="col l8">
              <div class="input-field col s12">
                <input type="text" class="validate" name="name">
                <label for="disabled">Name of book</label>
              </div>
              <br><br>
              <div class="file-field input-field">
                <div class="btn">
                  <span>PDF</span>
                  <input type="file" name="pdf" >
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" name="pdf">
                </div>
              </div>
            </div>
          </div>
       </div>
       <div class="card-action">
         <button class="waves-effect waves-light btn" type="submit" id="submit" >
           <i class="material-icons right">send</i>Upload
         </button>
         </form>
       </div>
     </div>
   </div>
 </div>
