<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>

    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-md-4"><label><b>Create Contact</b></label></div>
                <div class="col-lg-6 hidden-text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                        veniam.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore</p></div>
                <div class="col-lg-2 col-sm-2 col-md-2">
                    <button class="btn rounded-0"
                            onclick="location.href='<?php echo base_url(); ?>/contacts'">CONTACT LIST
                    </button>
                </div>
            </div>
        </div>

    </section>
    <div class="form-container">
        <?php
        if (session()->has('message')) {
            ?>
            <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                <?= session()->getFlashdata('message') ?>
            </div>
            <?php
        }
        ?>
        <form method="post" action="<?= base_url() ?>/contact/store">
            <div class="row" style="background-color: white;margin-bottom: 10px">
                <div class="col-lg-3 col-sm-4 col-md-4 fontuser">
                    <label>
                        <input type="text" placeholder="<?php echo lang('Validation.contact_name'); ?>" name="contact_name"
                               >
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
                        <input type="number" placeholder="<?php echo lang('Validation.contact_phone'); ?>"
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