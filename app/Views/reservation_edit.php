<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>

    <section id="banner">
        <div class="container">
            <div class="row" style="position: absolute;width: 74%">
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <label><b><?php echo lang('App.edit_reservation'); ?></b></label></div>
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
    <div class="container">
        <?= $validation->listErrors('my_list') ?>
        <form method="post" name="reservation_form"
              action="<?= site_url('/reservation/update/' . $reservations->getIdReservation()) ?>">
            <div class="row other">
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <div class="input-icons">
                        <i class="fa fa-user fa-2x icon"></i>
                        <input class="input-field" type="text" autofocus="autofocus" disabled
                               placeholder="<?php echo lang('Validation.contact_name'); ?>"
                               name="contact_name" formnovalidate
                               value="<?= old('name', $reservations->getContact()->getName()) ?>">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <div class="input-icons">
                        <i class="fa fa-sort-amount-desc fa-2x icon"></i>
                        <select class="input-field" id="contact_type" name="contact_type" required disabled>
                            <option><?php echo lang('Validation.contact_type'); ?></option>
                            <?php
                            foreach ($contact_types as $contact_type) {
                                echo '<option value="' . $contact_type->getIdContactType() . '" ' . 'selected = ' . old('contact_type', $reservations->getContact()->getContactType()->getName()) . '>' . $contact_type->getName() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <div class="input-icons">
                        <i class="fa fa-phone fa-2x icon"></i>
                        <input class="input-field" type="text" autocomplete="off" disabled
                               placeholder="<?php echo lang('Validation.contact_phone'); ?> (00-0000-0000)"
                               name="contact_phone" id="contact_phone" maxlength="12" required
                               value="<?= old('name', $reservations->getContact()->getPhoneNumber()) ?>">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <div class="input-icons">
                        <i class="fa fa-calendar fa-2x icon"></i>
                        <input class="input-field" type="text" id="contact_birthday" autocomplete="off" disabled
                               placeholder="<?php echo lang('Validation.contact_birthday'); ?>" name="contact_birthday"
                               required data-date-format="dd/mm/yyyy" value="<?= old('birth_date', $birthday) ?>">
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
                                echo '<option value="' . $destination->getIdDestination() . '" '. 'selected = '. old('contact_type',$reservations->getDestination()->getName() ).'>' . $destination->getName() . '</option>';
//                                echo '<option value="' . $destination->getIdDestination() . '" ' . ($destination->getIdDestination() == $reservations->getDestination()->getIdDestination()) ? 'selected' : '' . '>' . $destination->getName() . '</option>';

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
                               required data-date-format="dd/mm/yyyy"
                               value="<?= old('reservation_date', $reservation_date) ?>">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <div class="input-icons">
                        <i class="fa fa-clock fa-2x icon"></i>
                        <input class="timepicker input-field" class="timepicker" type="text" autocomplete="off"
                               placeholder="<?php echo lang('Validation.reservation_time'); ?>" name="reservation_time"
                               id="reservation_time" required value="<?= old('reservation_time', $reservation_time) ?>">
                    </div>
                </div>
            </div>
            <div class="row other">
                <div class="col-12">
                    <textarea name="text_editor" <?= old('name', $reservations->getDescription()) ?>></textarea>
                </div>
            </div>
            <script type="text/javascript">
                CKEDITOR.replace('text_editor');
            </script>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <button class="btn rounded-0 form-button" type="submit">SEND</button>
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
            $("#reservation_date").datepicker({
                dateFormat: 'dd/mm/yy',
                changeYear: true,
                changeMonth: true,
                minDate: new Date(),
                maxDate: '+2Y'
            });
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