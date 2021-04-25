<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>

    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-md-4"><label><b>Create Reservation</b></label></div>
                <div class="col-lg-5 hidden-text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                        veniam.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore</p></div>
                <div class="col-lg-3 col-sm-3 col-md-3">
                    <button class="btn rounded-0" style="margin-right: 10px"
                            onclick="location.href='<?php echo base_url(); ?>/contacts'">CONTACT LIST
                    </button>
                    <button class="btn rounded-0"
                            onclick="location.href='<?php echo base_url(); ?>/contact/create'">CRATE CONTACT
                    </button>
                </div>
            </div>
        </div>

    </section>
    <div class="form-container">
        <?= $validation->listErrors('my_list') ?>
        <form method="post" action="<?= site_url('/contact/update/' . $contact->getIdContact()) ?>">
            <div class="row" style="background-color: white;margin-bottom: 10px">
                <div class="col-lg-3 col-sm-4 col-md-4 fontuser">
                    <input type="text" autofocus="autofocus" placeholder="<?php echo lang('Validation.contact_name'); ?>"
                           name="contact_name" formnovalidate value="<?= old('name', $contact->getName()) ?>">
                    <i class="fa fa-user fa-2x"></i>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4 fontuser">
                    <select id="contact_type" name="contact_type" required>
                        <option><?php echo lang('Validation.contact_type'); ?></option>
                        <?php
                        foreach ($contact_types as $contact_type) {
                            echo '<option value="' . $contact_type->getIdContactType() . '" ' . 'selected = ' . old('contact_type', $contact->getContactType()->getName()) . '>' . $contact_type->getName() . '</option>';                        }
                        ?>
                    </select>
                    <i class="fa fa-sort-amount-desc select-icon"></i>
                </div>

                <div class="col-lg-3 col-sm-4 col-md-4 fontuser">
                    <input type="text" autocomplete="off" placeholder="<?php echo lang('Validation.contact_phone'); ?> (00-0000-0000)"
                           name="contact_phone" id="contact_phone" maxlength="12" required value="<?= old('phone_number', $contact->getPhoneNumber()) ?>">
                    <i class="fa fa-phone fa-2x"></i>
                </div>

                <div class="col-lg-3 col-sm-4 col-md-4 fontuser">
                    <input type="text" id="contact_birthday" autocomplete="off"
                           placeholder="<?php echo lang('Validation.contact_birthday'); ?>" name="contact_birthday"
                           required data-date-format="dd/mm/yyyy" value="<?= old('birth_date', $birthday) ?>">
                    <i class="fa fa-calendar fa-2x"></i>
                </div>
            </div>
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
        $(function () {
            $("#contact_birthday").datepicker();
        });
    </script>

<?= $this->endSection() ?>