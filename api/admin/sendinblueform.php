<div class=" animated fadeInRight">
	<div  class="row wrapper border-bottom white-bg page-heading ">
		<div class="col-lg-4">
			<h2>Sendinblue Templates</h2>
			<ol class="breadcrumb">
				<li>
					<a href="#">Home</a>
				</li>
				<li class="active">
					<a href="#admin/settings">Settings</a>
				</li>
				<li class="active">
					<strong>Sendinblue Templates</strong>
				</li>
			</ol>
		</div>
		
	</div>

</div>
<div class="row animated fadeInRight">
	<form id="sendinblue-email-template-form" name="" method="post" action="<?php echo $settings['base_uri'];?>api/admin/sendinblue/saveEmailTemplate" class="form-horizontal ">
		<div>
			<div class="row">
				<div class="col-lg-12 col-xs-12">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							<div>
								<h4>Choose a seninblue template</h4>
							</div>
						</div>
						<div class="ibox-content">
							<div class="row">
								<div class="col-md-4">
									<label>
										Tempates
									</label>
									<select name="sendinblue_template_id" class="form-control">
								    	<option value="-1"> ---------</option>
								    	<?php foreach ($result['campaign_templates']  as $campaign):?>
								    		<?php 
								    			$selected = '';
								    			if ($campaign['id']==$result['sendinblue_email_template_id'] ){ 
								    				$selected =  "selected";
								    			}
								    		?>
								    		<option value="<?php echo $campaign['id']; ?>" <?php echo $selected;?>> <?php echo $campaign['campaign_name']; ?></option>
								    	<?php endforeach;?>
								    </select>
								</div>
								
							</div>
						</div>
						<div style="padding-top:30px; padding-bottom: 30px;">
							<div class="row">
								<div class="col-xs-12">
									<a class="btn btn-white" onClick="cancelSendinblueSaveEmailTemplate()">Cancel</a>
									<button id="saveButton" class="btn btn-success" type="submit">Save</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<script>
	function cancelSendinblueSaveEmailTemplate(){
		window.location.hash = '#admin/settings';   
	}
	$("#sendinblue-email-template-form").submit(function(event) {
		// Stop form from submitting normally
		event.preventDefault();
		console.log( $(this).serialize());
		$.post($(this).attr("action"), $(this).serialize(), function(response){
			console.log(response);
			$('#results').load(base_uri + 'api/admin/sendinblue/templates');
		});
	});
</script>
