<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-12 col-md-12">
                    <label><b><?php echo lang('App.list_reservations'); ?></b></label></div>
                <div class="col-lg-4 hidden-text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <div class="col-lg-5 col-sm-12 col-md-12">
                    <button class="btn rounded-0"
                            onclick="location.href='<?php echo base_url(); ?>/reservation/create'"><?php echo lang('App.create_reservation'); ?>
                    </button>
                    <button class="btn rounded-0"
                            onclick="location.href='<?php echo base_url(); ?>/contacts'"><?php echo lang('App.list_contacts'); ?>
                    </button>
                </div>
            </div>
        </div>

    </section>
    <div class="form-container">
        <?= $validation->listErrors('my_list') ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-4 col-md-4 table-sort-by">
                <div class="input-icons">
                    <i class="fa fa-sort-amount-desc fa-2x icon"></i>
                    <select class="input-field" id="sort_by" name="sort_by" placeholder="Contact Type" required>
                        <option value="0" selected="sort_by"><?php echo lang('Validation.sort_by'); ?></option>
                        <option value="1">By Date Ascending</option>
                        <option value="2">By Date Descending</option>
                        <option value="3">By Alphabetic Ascending</option>
                        <option value="4">By Alphabetic Descending</option>
                        <option value="5">By Ranking</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row other">
            <div class="table-responsive ">
                <table id="table_id" class="table">
                    <thead hidden>
                    <tr>
                        <th hidden>id_reservation</th>
                        <th>image_url</th>
                        <th>date</th>
                        <th>rating</th>
                        <th>addfavorites</th>
                        <th>favorite</th>
                        <th>actions</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>

<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
    <script type="text/javascript">
        $(document).ready(function () {
            sort($("select.sort").children("option:selected").val());
        });

        $(document).on('change', '#rating', function () {

            var data = {reservation_id: $(this).attr('name'), rating: $(this).val()};

            myAjax("POST", "/reservation/rating", "/", data);
        });

        $(document).on('change', '#sort_by', function (event) {
            sort($(this).children("option:selected").val());
        });

        function editItem(url) {
            $(location).attr('href', '/reservation/edit/' + url);
        }

        function editFavorites(url) {
            myAjax("POST", "/reservation/favorite/" + url, "/", "");
        }


        function sort(sort_by) {
            var table = $('#table_id').DataTable({
                "processing": true,
                "serverSide": true,
                "destroy": true,
                "ajax": {
                    "url": "<?php echo base_url('reservation/list') ?>",
                    "dataType": "json",
                    "type": "POST",
                    "data": {
                        'sort_by': sort_by
                    }
                },
                "columns": [
                    {"data": "id_reservation", visible: false},
                    {"data": "image_url"},
                    {"data": "name"},
                    {"data": "rating"},
                    {"data": "favorite"},
                    {"data": "actions", searchable: false, sortable: false}
                ],

                "createdRow": function (row, data, dataIndex) {

                    // any manipulation in the row element
                    var ratingInput = $(row).find('.rating');
                    $(ratingInput).rating();

                }
            });
        }
    </script>

<?= $this->endSection() ?>