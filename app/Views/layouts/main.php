<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>codeigniter 4 ajax crud with datatables and bootstrap modals</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">	<link type="text/css" rel="stylesheet" href="/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
	
	<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
	<!--	datepicker-->
	
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	<!--	timepicker-->

	<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js" type="text/javascript"></script>

    <script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
	
	<script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            CKEDITOR.replace('text_editor', {
                fullPage: true,

            });
        });
        var BASE_URL = "<?php echo base_url();?>";
	
	</script>
	
	<title>Site Title</title>

</head>

<body>
<header>

    <div class="row" style="float: right; padding: 50px 27%">
        <div class="navbar-tool dropdown" style="float: right">
            <a class="topbar-link" data-to  ggle="dropdown" aria-expanded="false">
                <img width="20" src="/img/<?= session('locale')=='en'?'en':'es'?>.jpg" />
                <span style="color: #fff3cd; font-size: 14px"><?php echo lang('App.select_language');?></span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="/locale/en"><img width="20" height="20" src="/img/en.jpg" alt="English" />English</a>
                </li>
                <li>
                    <a class="dropdown-item" href="/locale/es"><img width="20" height="20" src="/img/es.jpg" alt="Espanol" />Español</a>
                </li>
            </ul>
        </div>
    </div>



</header>
<!--<section id="banner"></section>-->

<!--Area for dynamic content -->
<?= $this->renderSection("content"); ?>

<?= $this->renderSection("scripts"); ?>

</body>

</html>