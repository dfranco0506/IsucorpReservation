<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-12 col-md-12"><label><b>Create Contact</b></label></div>
                <div class="col-lg-6 hidden-text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                        veniam.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore</p></div>
                <div class="col-lg-2 col-sm-2 col-md-2">
                    <button class="btn rounded-0"
                            onclick="location.href='<?php echo base_url(); ?>/contacts'"><?php echo lang('App.list_contacts'); ?>
                    </button>
                </div>
            </div>
        </div>

    </section>
    <div class="form-container">
        <?= $validation->listErrors('my_list') ?>
        <form method="post" action="<?= site_url('/contact/update/' . $contact->getIdContact()) ?>">
            <div class="row other">
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <div class="input-icons">
                        <i class="fa fa-user fa-2x icon"></i>
                        <input class="input-field" type="text" autofocus="autofocus"
                               placeholder="<?php echo lang('Validation.contact_name'); ?>"
                               name="contact_name" formnovalidate value="<?= old('name', $contact->getName()) ?>">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <div class="input-icons">
                        <i class="fa fa-sort-amount-desc fa-2x icon"></i>
                        <select class="input-field" id="contact_type" name="contact_type" required>
                            <option><?php echo lang('Validation.contact_type'); ?></option>
                            <?php
                            foreach ($contact_types as $contact_type) {
                                $selected = old('contact-type', $contact->getContactType()->getIdContactType()) == $contact_type->getIdContactType() ? 'selected' : '';
                                echo '<option value="' . $contact_type->getIdContactType() . '" ' . $selected . '>' . $contact_type->getName() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <div class="input-icons">
                        <i class="fa fa-phone fa-2x icon"></i>
                        <input class="input-field" type="text" autocomplete="off"
                               placeholder="<?php echo lang('Validation.contact_phone'); ?> (00-0000-0000)"
                               name="contact_phone" id="contact_phone" maxlength="12" required
                               value="<?= old('phone_number', $contact->getPhoneNumber()) ?>">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-md-4">
                    <div class="input-icons">
                        <i class="fa fa-calendar fa-2x icon"></i>
                        <input class="input-field" type="text" id="contact_birthday" autocomplete="off"
                               placeholder="<?php echo lang('Validation.contact_birthday'); ?>" name="contact_birthday"
                               required data-date-format="dd/mm/yyyy" value="<?= old('birth_date', $birthday) ?>">
                    </div>
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