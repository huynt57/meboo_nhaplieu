<div class="row-fluid">
    <div class="span12">
        <h3>Book Management</h3>
        <?php if (Yii::app()->user->hasFlash('message_ss')): ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success !</strong>  <?php echo Yii::app()->user->getFlash('message_ss'); ?>
            </div>

        <?php endif; ?>
        <?php if (Yii::app()->user->hasFlash('message_err')): ?>
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error !</strong> <?php echo Yii::app()->user->getFlash('message_err'); ?>
            </div>
        <?php endif; ?>
        <div class="box box-color box-bordered">

            <a href="#modal-add" role="button" data-toggle="modal" class="btn btn-primary" style="margin-top: 10px; margin-bottom: 10px">Add book</a>
            <div class="box-content nopadding" ng-app="" ng-controller="BookController">

                <table class="table table-hover table-nomargin table-bordered dataTable">

                    <thead>
                        <tr class='thefilter'>
<!--                            <th class='with-checkbox'></th>-->
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
<!--                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Year</th>-->
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
<!--                        <tr>
                            <th class='with-checkbox'><input type="checkbox" name="check_all" id="check_all"></th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Year</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>-->
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book): ?>
                            <tr>
    <!--                            <td class="with-checkbox">
                                    <input type="checkbox" name="check" value="1">
                                </td>-->
                                <td><?php echo $book->id ?></td>
                                <td><?php echo $book->book_name ?></td>
                                <td><img src="<?php echo Yii::app()->BaseUrl . '/' . $book->book_image ?>" height="100" width="100" /></td>
    <!--                                <td><?php //echo $book->book_author       ?></td>
                                <td><?php //echo $book->book_publisher       ?></td>
                                <td><?php //echo $book->book_year       ?></td>-->
                                <td><?php echo $book->book_description ?></td>
                                <td class='hidden-350'>
                                    <?php if ($book->status == 1): ?>
                                        <span class="label label-satgreen"> Active
                                        </span>
                                    <?php endif; ?>
                                    <?php if ($book->status != 1): ?>
                                        <span class="label label-red"> Inactive
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class='hidden-480'>
                                    <a href="#" class="btn" rel="tooltip" title="View"><i class="icon-search" ng-click="detailBook(<?php echo $book->id ?>)"></i></a>
<!--                                    <a href="#" class="btn" rel="tooltip" title="Edit"><i class="icon-edit"></i></a>-->
                                    <a href="<?php echo Yii::app()->createUrl('book/DeleteForWeb?book_id=' . $book->id) ?>" class="btn" rel="tooltip" title="Delete"><i class="icon-remove" id="remove" onclick="if (!confirm('Are you sure ?? Cannot rollback !!!')) {
                                                                return false;
                                                            }"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php $this->renderPartial('detail') ?>
                <?php $this->renderPartial('add') ?>
            </div>
        </div>
    </div>
</div>

<script>
    function BookController($http, $scope) {
        $scope.detail = {};
        $scope.detailBook = function (id) {
            $("#modal-detail").modal("show");
            $('#myModalLabel').hide();
            $('#modal-body-detail').hide();
            $("#loading").show();

//         $("#modal-label").hide();
//         $("#des").hide();
//         $('#price').hide();
//         $('#image').hide();
            $http({
                method: 'POST',
                url: '<?php echo Yii::app()->createAbsoluteUrl('book/detailBook') ?>',
                data: $.param({
                    book_id: id
                }),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
            }).success(function (response) {
                $("#loading").hide();
                $('#myModalLabel').show();
                $('#modal-body-detail').show();
//             $("#modal-label").show();
//             $("#des").show();
//             $('#price').show();
//             $('#image').show();
                $scope.detail = response['data'];

            }).error(function (response) {
                // console.log(response);
            });
        }




    }

</script>