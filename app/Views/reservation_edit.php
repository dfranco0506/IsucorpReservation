<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
	
	<section id="banner">
        <div class="container">
            <div class="row" style="position: absolute;width: 74%" >
                <div class="col-lg-3 col-sm-4 col-md-4"><label><b><?php echo lang('App.edit_reservation');?></b></label></div>
                <div class="col-lg-5 hidden-text" style="margin-left: -10px"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                        veniam.</p></div>
                <div class="col-lg-2 col-sm-2 col-md-2" style="margin-left: 3px">
                    <button class="btn rounded-0"
                            onclick="location.href='<?php echo base_url(); ?>/'"><?php echo lang('App.list_reservations');?>
                    </button>
                </div>
            </div>
        </div>
	
	</section>
	<div class="container">
        <?php
        if (session()->has('message')) {
            ?>
            <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                <?= session()->getFlashdata('message') ?>
            </div>
            <?php
        }
        ?>
		<form method="post" name="reservation_form" action="<?=site_url('/reservation/update/'.$reservations->getIdReservation())?>">
			<div class="row" style="background-color: white;margin-bottom: 10px">
				<div class="col-lg-3 col-sm-4 col-md-4 fontuser">
						<input type="text" disabled placeholder="<?php echo lang('Form.contact_name');?>" name="contact_name" required value="<?= old('name',$reservations->getContact()->getName()) ?>">
					<i class="fa fa-user fa-2x"></i>
				</div>
				<div class="col-lg-3 col-sm-4 col-md-4 fontuser">
                    <select id="contact_type" name="contact_type" required disabled>
						<option><?php echo lang('Validation.contact_type');?></option>
						<?php
							foreach ($contact_types as $contact_type) {
								echo '<option value="' . $contact_type->getIdContactType() . '" '. 'selected = '. old('contact_type',$reservations->getContact()->getContactType()->getName() ).'>' . $contact_type->getName() . '</option>';
							}
						?>
					</select>
					<i class="fa fa-sort-amount-desc select-icon"></i>
				</div>
				<div class="col-lg-3 col-sm-4 col-md-4 fontuser">
						<input type="text" placeholder="<?php echo lang('Validation.contact_phone');?>" name="contact_phone" required disabled value="<?= old('name',$reservations->getContact()->getPhoneNumber()) ?>">
					<i class="fa fa-phone fa-2x"></i>
				</div>
				<div class="col-lg-3 col-sm-4 col-md-4 fontuser">
						<input type="text" id="contact_birthday" disabled placeholder="<?php echo lang('Validation.contact_birthday');?>" name="contact_birthday" required value="<?= old('birth_date',$birthday) ?>">
					<i class="fa fa-calendar fa-2x"></i>
				</div>
			</div>
			<div class="row" style="background-color: white;margin-bottom: 10px">
				<div class="col-lg-6 col-sm-6 col-md-6 fontuser">
					<select id="destination" name="destination" required>
						<option value="0"><?php echo lang('Validation.destination');?></option>
						<?php
							foreach ($destinations as $destination) {
								echo '<option value="' . $destination->getIdDestination() . '" '. 'selected = '. old('contact_type',$reservations->getDestination()->getName() ).'>' . $destination->getName() . '</option>';
							}
						?>
					</select>
					<i class="fa fa-sort-amount-desc select-icon"></i>
				</div>
				<div class="col-lg-3 col-sm-4 col-md-4 fontuser">
						<input type="text" id="reservation_date" placeholder="<?php echo lang('Validation.reservation_date');?>" name="reservation_date" value="<?= old('reservation_date',$reservation_date) ?>">
					<i class="fa fa-calendar fa-2x"></i>
				</div>
				<div class="col-lg-3 col-sm-4 col-md-4 fontuser">
						<input class="timepicker" type="text" placeholder="<?php echo lang('Validation.reservation_time');?>" name="reservation_time" id="reservation_time" required value="<?= old('reservation_time',$reservation_time) ?>">
					<i class="fa fa-calendar fa-2x"></i>
				</div>
			</div>
			<div class="row" style="background-color: white;margin-bottom: 10px">
				<div class="col-12">
					<textarea name="text_editor" <?= old('name',$reservations->getDescription()) ?>></textarea>
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
        $(document).ready(function(){
            $('input.timepicker').timepicker({});
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

        $('.timepicker').timepicker({
            timeFormat: 'hh:mm p',
            interval: 60,
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
	</script>

<?= $this->endSection() ?>