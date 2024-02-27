<?php $this->view('header', $data); ?>
    <!-- Custom styles for this template -->
    <link href="<?= ASSETS . THEME ?>admin/css/style.css" rel="stylesheet">

<section id="main-content">
<section class="wrapper">
<div class="col-md-4 mb">
							<!-- WHITE PANEL - TOP USER -->
							<div class="white-panel pn" style="min-height: 400px;">
								<div class="white-header" >
									<h5>TOP USER</h5>
								</div>
								<p><img src="<?= ASSETS . THEME ?>admin/img/ui-zac.jpg" class="img-circle" width="80"></p>
								<p><b>Zac Snider</b></p>
								<div class="row">
									<div class="col-md-6">
										<p class="small mt">MEMBER SINCE</p>
										<p><?= $data['user_data']->date ?></p>
									</div>
									<div class="col-md-6">
										<p class="small mt">TOTAL SPEND</p>
										<p>$ 47,60</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<p class="small mt">Edit</p>
										<p><?= $data['user_data']->date ?></p>
									</div>
									<div class="col-md-6">
										<p class="small mt">Delete</p>
										<p>$ 47,60</p>
									</div>
								</div>
							</div>
						</div><!-- /col-md-4 -->

</section>
</section>
<?php $this->view('footer', $data); ?>