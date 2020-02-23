<div class="container mb-5 pb-5">
	<h1 class="my-3">Patrol Log - Form</h1>
	<form action="controllers/TDPatrolReportProcessor.inc.php" method="POST">

		<h4><i class="fas fa-archive fa-fw"></i> General Details</h4>
		<div class="form-row">
			<div class="form-group col-2">
				<label>Date</label>
				<div class="input-group">
					<input
					class="form-control"
					type="text"
					id="inputDateFrom"
					name="inputDateFrom"
					placeholder="DD/MMM/YYYY"
					style="text-transform: uppercase;"
					value="<?php echo $g->getDate()?>"
					required>
				</div>
				<center><small id="helpDate" class="form-text text-muted">DD/MMM/YYYY Format</small></center>
			</div>
			<div class="form-group col-2">
				<label>Start of Patrol Time</label>
				<div class="input-group">
					<input
					class="form-control"
					type="text"
					id="inputTimeFrom"
					name="inputTimeFrom"
					placeholder="00:00"
					value="<?php echo $g->getTime()?>"
					required>
				</div>
				<center><small id="helpTime" class="form-text text-muted">24-Hour Format</small></center>	
			</div>
			<div class="form-group col-3">
				<label>Call Sign</label>
				<input
				class="form-control"
				type="text"
				id="inputCallsign"
				name="inputCallsign"
				placeholder="Call Sign"
				value="<?php echo $g->cookieCallSign(); ?>"
				required>
				<small id="helpCallSign" class="form-text text-muted">Example: 2-ADAM-1, 2A1</small>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-3">
				<label>Partner</label>
				<input
				class="form-control"
				type="text"
				id="inputPartner"
				name="inputPartner"
				placeholder="Firstname Lastname"
				required>
				<small id="helpCallSign" class="form-text text-muted">Leave blank if solo patrol</small>
			</div>
		</div>

		<h4><i class="fas fa-car fa-fw"></i> Add Events</h4>
		<div class="form-row groupSlotTS">
			<div class="form-group col-12">
				<label>Event Options</label>
				<div class="col-12"> 
					<a href="javascript:void(0)" class="btn btn-success w-100 addSlotInfo col-2"><i class="fas fa-plus-square fa-fw"></i> Add Information</a>
					<a href="javascript:void(0)" class="btn btn-success w-100 addSlotTS col-2"><i class="fas fa-plus-square fa-fw"></i> Add Traffic Stop</a>
					<a href="javascript:void(0)" class="btn btn-success w-100 addSlotArrest col-2"><i class="fas fa-plus-square fa-fw"></i> Add Arrest</a>
				</div>
			</div>
		</div>

		<h4><i class="fas fa-clipboard fa-fw"></i> Notes & Other Details</h4>
		<div class="form-row">
			<div class="form-group col-12">
				<textarea
				class="form-control"
				id="inputNotes"
				name="inputNotes"
				rows="2"
				placeholder="Any optional and extra notes regarding the patrol."></textarea>
			</div>
		</div>
		<div class="container my-5 text-center">
			<button id="submit" type="submit" name="submit" class="btn btn-primary px-5"><i class="fas fa-plus-square fa-fw"></i>End Patrol</button>
		</div>
	</form>

	<!-- COPY SLOTS -->

	<div class="container groupCopySlotTS" style="display: none;">
		<div class="form-group col-3">
			<input
			class="form-control"
			type="text"
			id="inputNameTS[]"
			name="inputNameTS[]"
			placeholder="Firstname Lastname"
			required>
		</div>
		<div class="form-group col-6">
			<input
			class="form-control"
			type="text"
			id="inputReasonTS[]"
			name="inputReasonTS[]"
			placeholder="Reason"
			required>
		</div>
		<div class="form-group col-1">
			<input
			class="form-control"
			type="text"
			id="inputCitationsTS[]"
			name="inputCitationsTS[]"
			placeholder="#"
			data-placement="bottom" title="Leave empty if none for warnings.">
		</div>
		<div class="form-group col-2">
			<div class="input-group-addon"> 
				<button class="btn btn-danger w-100 removeSlotTS" type="button" id="button-addon2"><i class="fas fa-minus-square"></i> Slot</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){

		// Maximum Slots
		var maxSlotTS = 30;
		$(".addSlotTS").click(function(){
			if($('body').find('.groupSlotTS').length < maxSlotTS){
				var fieldHTML = '<div class="form-row groupSlotTS">'+$(".groupCopySlotTS").html()+'</div>';
				$('body').find('.groupSlotTS:last').after(fieldHTML);
			}else{
				alert('Maximum '+maxSlotTS+' traffic stop slots are allowed.');
			}
		});

		$("body").on("click",".removeSlotTS",function(){ 
			$(this).parents(".groupSlotTS").remove();
		});

		// Tooltips
		$('input').tooltip();

	});
</script>
