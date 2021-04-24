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
                    <input type="text" placeholder="<?php echo lang('Validation.contact_name'); ?>"
                           name="contact_name" required>
                    <i class="fa fa-user fa-2x"></i>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 fontuser">
                    <select id="contact_type" name="contact_type" required>
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
                    <input type="text" autocomplete="off" placeholder="<?php echo lang('Validation.contact_phone'); ?> (00-0000-0000)"
                           name="contact_phone" id="contact_phone" maxlength="10" class="input-number" required>
                    <i class="fa fa-phone fa-2x"></i>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 fontuser">
                    <input type="text" id="contact_birthday" autocomplete="off"
                           placeholder="<?php echo lang('Validation.contact_birthday'); ?>" name="contact_birthday"
                           required data-date-format="dd/mm/yyyy">
                    <i class="fa fa-calendar fa-2x"></i>
                </div>
            </div>
            <div class="row" style="background-color: white;margin-bottom: 10px">
                <div class="col-lg-6 col-sm-6 col-md-6 fontuser">
                    <select id="destination" name="destination" required>
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
                    <input type="text" id="reservation_date" autocomplete="off"
                           placeholder="<?php echo lang('Validation.reservation_date'); ?>" name="reservation_date"
                           required data-date-format="dd/mm/yyyy">
                    <i class="fa fa-calendar fa-2x"></i>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 fontuser">
                    <input class="timepicker" type="text" autocomplete="off"
                           placeholder="<?php echo lang('Validation.reservation_time'); ?>" name="reservation_time"
                           id="reservation_time" required>
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
                dateFormat:'dd/mm/yy',
                changeYear: true,
                changeMonth: true,
                yearRange: '-100:+0',
                minDate: new Date(1920, 1 - 1, 1),
                maxDate: new Date()
            });
        });
        $(function () {
            $("#reservation_date").datepicker({
                dateFormat:'dd/mm/yy',
                changeYear: true,
                changeMonth: true,
                minDate: new Date(),
                maxDate: '+2Y'
            });
        });

        // $('#contact_phone').on('input', function (e) {
        //     if (!/^[ a-z0-9áéíóúüñ]*$/i.test(this.value)) {
        //         this.value = this.value.replace(/[^ a-z0-9áéíóúüñ]+/ig,"");
        //     }
        // });

        $('.input-number').on('input', function () {
            this.value = this.value.replace(/[^\d-]/,'');
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