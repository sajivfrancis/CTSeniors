<?php
$id = uniqid();
?>
<div class="panel-group" id="categories<?php echo $id; ?>">
    <?php
    foreach ($cat as $value) {
        $pannelId = uniqid();
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" id="button<?php echo $pannelId; ?>" data-parent="#categories<?php echo $id; ?>" href="#collapse<?php echo $pannelId; ?>">
                        <i class="fa <?php echo $value->icon; ?>" aria-hidden="true"></i> <?php echo $value->name; ?>
                    </a>
                </h4>
            </div>
            <div id="collapse<?php echo $pannelId; ?>" class="panel-collapse collapse">
                <div class="panel-body" style="padding: 0;">
                    <div class="input-group">
                        <input id="search<?php echo $pannelId; ?>" type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-default">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="list-group" id="list<?php echo $pannelId; ?>">
                        <div class="loader"></div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('#button<?php echo $pannelId; ?>').click(function () {
                    var consumer = new soda.Consumer('data.ct.gov');
                    consumer.query()
                            .withDataset('<?php echo $value->dataSet; ?>')
                            .order('<?php echo $value->order; ?>')
                            .getRows()
                            .on('success', function (rows) {
                                console.log(rows);
                                $('#list<?php echo $pannelId; ?>').empty();
                                for (i = 0; i < rows.length; i++) {

    <?php echo $value->customScript; ?>
                                    $('#list<?php echo $pannelId; ?>').append('<a href="#"  class="list-group-item item<?php echo $pannelId; ?>" address="' + <?php echo $value->address; ?> + '" city="' + <?php echo $value->city; ?> + '" state="' + <?php echo $value->state; ?> + '">' + <?php echo $value->text; ?> + '</a>');

                                }

                                $('.item<?php echo $pannelId; ?>').click(function () {
                                    codeAddress(
                                            $(this).text(),
                                            $(this).attr('address'),
                                            $(this).attr('city'),
                                            $(this).attr('state'),
                                            fontawesome.markers.<?php echo $value->marker; ?>);
                                });
                            })
                            .on('error', function (error) {
                                console.error(error);
                            });
                });

                $('#search<?php echo $pannelId; ?>').keyup(function(){
                    filter = $(this).val().toUpperCase();
                    $('#collapse<?php echo $pannelId; ?> .list-group-item').each(function (index) {
                        if ($(this).text().toUpperCase().indexOf(filter) > -1) {
                            $(this).slideDown();
                        } else {
                            $(this).slideUp();
                        }
                    });
                });

            });
        </script>    
        <?php
    }
    ?>

</div>   

