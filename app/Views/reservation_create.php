<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>

    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <label><b><?php echo lang('App.create_reservation'); ?></b></label></div>
                <div class="col-lg-5 hidden-text" style="margin-left: -10px"><p>Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                        minim
                        veniam.</p></div>
                <div class="col-lg-2 col-sm-2 col-md-2" style="margin-left: 3px">
                    <button class="btn rounded-0"
                            onclick="location.href='<?php echo base_url(); ?>/'"><?php echo lang('App.list_reservations'); ?>
                    </button>
                </div>
            </div>
        </div>

    </section>
    <div class="form-container">
        <?= $validation->listErrors('my_list') ?>
        <form method="post" action="<?= base_url() ?>/reservation/store">
            <div class="row" style="background-color: white;margin-bottom: 10px">
                <div class="col-lg-3 col-sm-4 col-md-4 fontuser">
                    <label>
                        <input type="text" placeholder="<?php echo lang('Validation.contact_name'); ?>"
                               name="contact_name" required>
                    </label>
                    <i class="fa fa-user fa-2x"></i>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 fontuser">
                    <label for="contact_type"></label><select id="contact_type" name="contact_type" required>
                        <option><?php echo lang('Validation.contact_type'); ?></option>
                        <?php
                        foreach ($contact_types as $contact_type) {
                            echo '<option value="' . $contact_type->getIdContactType() . '" ' . $contact_type->getIdContactType() . '>' . $contact_type->getName() . '</option>';
                        }
                        ?>
                    </select>
                    <i class="fa fa-sort-amount-desc select-icon"></i>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 fontuser">
                    <label>
                        <input type="text" placeholder="<?php echo lang('Validation.contact_phone'); ?> (00-0000-0000)"
                               name="contact_phone" required>
                    </label>
                    <i class="fa fa-phone fa-2x"></i>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 fontuser">
                    <label>
                        <input type="text" id="contact_birthday"
                               placeholder="<?php echo lang('Validation.contact_birthday'); ?>" name="contact_birthday"
                               required data-date-format="dd/mm/yyyy">
                    </label>
                    <i class="fa fa-calendar fa-2x"></i>
                </div>
            </div>
            <div class="row" style="background-color: white;margin-bottom: 10px">
                <div class="col-lg-6 col-sm-6 col-md-6 fontuser">
                    <label for="destination"></label><select id="destination" name="destination" required>
                        <option value="0"><?php echo lang('Validation.destination'); ?></option>
                        <?php
                        foreach ($destinations as $destination) {
                            echo '<option value="' . $destination->getIdDestination() . '" ' . $destination->getIdDestination() . '>' . $destination->getNAme() . '</option>';
                        }
                        ?>
                    </select>
                    <i class="fa fa-sort-amount-desc select-icon"></i>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 fontuser">
                    <label>
                        <input type="text" id="reservation_date"
                               placeholder="<?php echo lang('Validation.reservation_date'); ?>" name="reservation_date"
                               required data-date-format="dd/mm/yyyy">
                    </label>
                    <i class="fa fa-calendar fa-2x"></i>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 fontuser">
                    <label>
                        <input class="timepicker" type="text"
                               placeholder="<?php echo lang('Validation.reservation_time'); ?>" name="reservation_time"
                               id="reservation_time" required>
                    </label>
                    <i class="fa fa-calendar fa-2x"></i>
                </div>
            </div>
            <div class="row" style="background-color: white;margin-bottom: 10px">
                <div class="col-12">
                    <label for="text_editor"></label><textarea id="text_editor" name="text_editor"></textarea>
                </div>
            </div>
            <script type="text/javascript">
                CKEDITOR.replace('text_editor');
            </script>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <button class="btn rounded-0 form-button" type="submit"><?php echo lang('App.send'); ?></button>
                </div>
            </div>
        </form>

    </div>

<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('input.timepicker').timepicker({});
        });
        $(function () {
            $("#contact_birthday").datepicker({
                minDate:new Date(1920, 1 - 1, 1)
            });
        });
        $(function () {
            $("#reservation_date").datepicker();
        });

        $('.timepicker').timepicker({
            timeFormat: 'hh:mm p',
            interval: 60,
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    </script>

<?= $this->endSection() ?>