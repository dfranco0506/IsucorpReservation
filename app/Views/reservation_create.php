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
        <form name="reservation_form" id="form" method="post" action="<?= base_url() ?>/reservation/store">
            <div class="row other">
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <div class="input-icons">
                        <i class="fa fa-user fa-2x icon"></i>
                        <input class="input-field" type="text" autofocus="autofocus"
                               placeholder="<?php echo lang('Validation.contact_name'); ?>"
                               id="contact_name" name="contact_name" formnovalidate>
                        <p><span class="emsgname"><?php echo lang('Validation.valid_name_format'); ?></span></p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <div class="input-icons">
                        <i class="fa fa-sort-amount-desc fa-2x icon"></i>
                        <select class="input-field" id="contact_type" name="contact_type" required>
                            <option><?php echo lang('Validation.contact_type'); ?></option>
                            <?php
                            foreach ($contact_types as $contact_type) {
                                echo '<option value="' . $contact_type->getIdContactType() . '" ' . $contact_type->getIdContactType() . '>' . $contact_type->getName() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <div class="input-icons">
                        <i class="fa fa-phone fa-2x icon"></i>
                        <input class="input-field phone" type="text" autocomplete="off"
                               placeholder="<?php echo lang('Validation.contact_phone'); ?> (00-0000-0000)"
                               name="contact_phone" id="contact_phone" maxlength="12" required>
                        <p><span class="emsgphone"><?php echo lang('Validation.valid_phone_format'); ?></span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <div class="input-icons">
                        <i class="fa fa-calendar fa-2x icon"></i>
                        <input class="input-field" type="text" id="contact_birthday" autocomplete="off"
                               placeholder="<?php echo lang('Validation.contact_birthday'); ?>" name="contact_birthday"
                               required data-date-format="dd/mm/yyyy">
                        <p>
                            <span class="emsgbirthdate"><?php echo lang('Validation.valid_date_format'); ?></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row other">
                <div class="col-lg-6 col-sm-6 col-md-6">
                    <div class="input-icons">
                        <i class="fa fa-sort-amount-desc fa-2x icon"></i>
                        <select class="input-field" id="destination" name="destination" required>
                            <option value="0"><?php echo lang('Validation.destination'); ?></option>
                            <?php
                            foreach ($destinations as $destination) {
                                echo '<option value="' . $destination->getIdDestination() . '" ' . $destination->getIdDestination() . '>' . $destination->getNAme() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <div class="input-icons">
                        <i class="fa fa-calendar fa-2x icon"></i>
                        <input class="input-field" type="text" id="reservation_date" autocomplete="off"
                               placeholder="<?php echo lang('Validation.reservation_date'); ?>" name="reservation_date"
                               required data-date-format="dd/mm/yyyy">
                        <p>
                            <span class="emsgreserdate"><?php echo lang('Validation.valid_date_format'); ?></span>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <div class="input-icons">
                        <i class="fa fa-calendar fa-2x icon"></i>
                        <input class="timepicker input-field" type="text" autocomplete="off"
                               placeholder="<?php echo lang('Validation.reservation_time'); ?>" name="reservation_time"
                               id="reservation_time" name="reservation_time" required>
                        <p><span class="emsgtime"><?php echo lang('Validation.valid_time_format'); ?></span></p>
                    </div>
                </div>
            </div>
            <div class="row other">
                <div class="col-12">
                    <textarea name="text_editor"></textarea>
                </div>
            </div>
            <script type="text/javascript">
                CKEDITOR.replace('text_editor');
            </script>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <button id="btnsubmit" class="btn rounded-0 form-button"
                            type="submit"><?php echo lang('App.send'); ?></button>
                </div>
            </div>
        </form>

    </div></div>

<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('input.timepicker').timepicker({});
            $('.emsgname').hide();
            $('.emsgphone').hide();
            $('.emsgbirthdate').hide();
            $('.emsgreserdate').hide();
            $('.emsgtime').hide();
        });
        $('#contact_name').on('input', function () {
            this.value = this.value.replace(/[^a-zA-ZÀ-ÿ]/, '');
        }).on('keypress keydown keyup', function () {
            var $regexname = /^[a-zA-ZÀ-ÿ\s]{3,40}$/;
            if (!$(this).val().match($regexname)) {
                // there is a mismatch, hence show the error message
                // $('.emsgname').removeClass('hidden');
                $('.emsgname').show();
            } else {
                // else, do not display message
                $('.emsgname').hide();
            }
        });
        $('#contact_phone').on('input', function () {
            this.value = this.value.replace(/[^\d-]/, '');
        }).on('keypress keydown keyup', function () {
            var $regexphone = /^\d{2}[\s\.-]?\d{4}[\s\.-]?\d{4}$/;
            if (!$(this).val().match($regexphone)) {
                $('.emsgphone').show();
            } else {
                $('.emsgphone').hide();
            }
        });
        $("#contact_birthday").datepicker({
            dateFormat: 'dd/mm/yy',
            changeYear: true,
            changeMonth: true,
            yearRange: '-100:+0',
            minDate: new Date(1920, 1 - 1, 1),
            maxDate: new Date()
        }).on('keypress keydown keyup', function () {
            var $regexdate = /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
            if ($(this).val().match($regexdate)&& isValidDate($(this).val())) {
                $('.emsgbirthdate').hide();
            } else {
                $('.emsgbirthdate').show();
            }
            ;  // triggers the validation test
        });
        $("#reservation_date").datepicker({
            dateFormat: 'dd/mm/yy',
            changeYear: true,
            changeMonth: true,
            minDate: new Date(),
            maxDate: '+2Y'
        }).on('keypress keydown keyup', function () {
            var $regexdate = /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
            if ($(this).val().match($regexdate)&& isValidDate($(this).val())) {
                $('.emsgreserdate').hide();
            } else {
                $('.emsgreserdate').show();
            }
            ;  // triggers the validation test
        });

        $('.timepicker').timepicker({
            timeFormat: 'hh:mm p',
            interval: 60,
            dynamic: false,
            dropdown: true,
            scrollbar: true
        }).on('keypress keydown keyup', function () {
            var $regexdate = /^(0?[1-9]|1[012])(:[0-5]\d) [AP][M]$/;
            if (!$(this).val().match($regexdate)) {
                $('.emsgtime').show();
            } else {
                $('.emsgtime').hide();
            }
            ;  // triggers the validation test
        });

        function isValidDate(s) {
            var bits = s.split('/');
            var d = new Date(bits[2], bits[0] - 1, bits[1]);
            return d && (d.getMonth() + 1) == bits[0] && d.getDate() == Number(bits[1]);
        }

        $("#form").validate({

            errorContainer: ".error",
            // errorPlacement: function(error, element) {
            //     error.appendTo( element.next() );
            // },
            success: function(label) {
                label.removeClass("error").addClass("check");
            },
            rules: {
                contact_name: {required: true},
                contact_type: {required: true},
                contact_phone: {required: true},
                contact_birthday: {required: true},
                destination: {required: true},
                reservation_date: {required: true},
                reservation_time: {required: true},
            },
            messages: {
                contact_name: "<?php echo lang('Validation.required_name_view'); ?>",
                contact_type: "<?php echo lang('Validation.required_contact_type_view'); ?>",
                contact_phone: "<?php echo lang('Validation.required_contact_phone_view'); ?>",
                contact_birthday: "<?php echo lang('Validation.required_contact_birthday_view'); ?>",
                destination: "<?php echo lang('Validation.required_destination_view'); ?>",
                reservation_date: "<?php echo lang('Validation.required_reservation_date_view'); ?>",
                reservation_time: "<?php echo lang('Validation.required_reservation_time_view'); ?>",
            },

        });
    </script>

<?= $this->endSection() ?>