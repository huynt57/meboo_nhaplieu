<div id="modal-add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/loading.gif" style=" position: absolute;
         top: 0; bottom:0; left: 0; right:0;
         margin: auto;" id="loading"/>
    <div class="modal-header-add">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
    </div>
    <form action="<?php echo Yii::app()->createUrl('book/AddForWeb')?>" method="POST" class='form-horizontal form-bordered' id="form-add" enctype="multipart/form-data">
        <div class="modal-body" style="max-height: 100%; padding-left: 15px; padding-right: 15px; padding-bottom: 15px; padding-top: 0px">
            <div class="box box-bordered">
                <div class="box-title">
                    <h3><i class="icon-th-list"></i>Information</h3>
                </div>
                <div class="box-content nopadding">

                    
                    <div class="control-group">
                        <label for="book_name" class="control-label">Name</label>
                        <div class="controls">
                            <input type="text" name="book_name" id="book_name" class="input-xlarge" >
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="book_image" class="control-label">Image</label>
                        <div class="controls">
                           <input type="file" name="book_image" id="book_image" class="input-block-level">
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="book_author" class="control-label">Author</label>
                        <div class="controls">
                            <input type="text" name="book_author" id="book_author"  class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="book_publisher" class="control-label">Publisher</label>
                        <div class="controls">
                            <input type="text" name="book_publisher" id="book_author"  class="input-xlarge">
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="book_year" class="control-label">Year</label>
                        <div class="controls">
                            <input type="text" name="book_year" id="book_author"  class="input-xlarge">
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="book_description" class="control-label">Description</label>
                        <div class="controls">
                            <textarea name="book_description" id="textarea" rows="4" class="input-block-level" ></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input class="btn btn-primary" type="submit" value="Save changes">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </form>
</div>
<script>
//    $(document).ready(function () {
//        $('#form-add').submit(function (e) {
//            e.preventDefault();
//            var form = $('#form-add')[0]; // You need to use standart javascript object here
//            var formData = new FormData(form);
//            $.ajax({
//                type: 'POST',
//                url: '<?php echo Yii::app()->createAbsoluteUrl('book/edit') ?>',
//                data: formData,
//                contentType: false,
//                processData: false,
//                success: function (response)
//                {
//                    console.log(response);
//                },
//            });
//        });
//    });

</script>