<?= $this->extend("layouts/main") ?>

<?= $this->section("content") ?>
	<section id="banner">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-sm-4 col-md-4"><label><b>Contact List</b></label></div>
				<div class="col-lg-6 hidden-text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
						eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.Lorem ipsum
						dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2">
					<button class="btn rounded-0"
					        onclick="location.href='<?php echo base_url(); ?>/contact/create'">CREATE CONTACT
					</button>
				</div>
			</div>
		</div>
	
	</section>
	<div class="container">
        <?php
        if (session()->has('message')) {
            ?>
            <div class="alert success<?= session()->getFlashdata('alert-class') ?>">
                <?= session()->getFlashdata('message') ?>
            </div>
            <?php
        }
        ?>
		<div class="row">
			<div class="table-responsive ">
				<table id="table_id" class="table">
					<thead>
					<tr>
						<th hidden>id</th>
						<th>Name</th>
						<th>Phone Number</th>
						<th>Birth Date</th>
						<th>Type</th>
						<th style="alignment: right">Actions</th>
					</tr>
					</thead>
				</table>
			</div>
		</div>
	
	</div>
	<!-- Bootstrap modal -->
	<div class="modal fade" id="modal_form" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">×</span></button>
					<h3 class="modal-title">Contact Form</h3>
				</div>
				<div class="modal-body form">
					<form action="#" id="form" class="form-horizontal">
						<input type="hidden" value="" name="id"/>
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3">Id</label>
								<div class="col-md-9">
									<label>
										<input name="id" placeholder="id" class="form-control" type="text">
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Name</label>
								<div class="col-md-9">
									<label>
										<input name="name" placeholder="name" class="form-control" type="text">
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Phone Number</label>
								<div class="col-md-9">
									<label>
										<input name="phone_number" placeholder="phone number" class="form-control"
										       type="text">
									</label>
								
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Birthday</label>
								<div class="col-md-9">
									<label>
										<input name="birthday" placeholder="birthday" class="form-control" type="text">
									</label>
								
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- End Bootstrap modal -->

<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
	<script type="text/javascript">
        $(document).ready(function () {
            table_create();
        });

        function editItem(url) {
            $(location).attr('href', '/contact/edit/' + url);
        }

        function deleteItem(url) {
            $(location).attr('href', '/contact/delete/' + url);
        }

        function table_create() {
            var table = $('#table_id').DataTable({
                "processing": true,
                "serverSide": true,
                "destroy": true,
                "ajax": {
                    "url": "<?php echo base_url('/contacts/list') ?>",
                    "dataType": "json",
                    "type": "POST"
                },
                "columns": [
                    {"data": "id", visible: false},
                    {"data": "name"},
                    {"data": "phone_number"},
                    {"data": "birth_date"},
                    {"data": "contact_type"},
                    {"data": "actions", searchable: false, sortable: false}
                ],

            });
        }
	
	</script>

<?= $this->endSection() ?>