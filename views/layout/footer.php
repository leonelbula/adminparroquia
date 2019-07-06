


<div class="footer">
	<div class="footer-inner">
		<div class="footer-content">
			<span class="bigger-120">
				<span class="blue bolder">Ing. Leonel Bula Gomez</span>
				Desarrollador de Aplicaciones &copy; Derechos Reservados -2019  
			</span>

			&nbsp; &nbsp;

		</div>
	</div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
	<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div>

<script src="<?= URL_BASE ?>assets/js/jquery-2.1.4.min.js"></script>

<script type="text/javascript">
	//if ('ontouchstart' in document.documentElement)
	//	document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?= URL_BASE ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<script src="<?= URL_BASE ?>assets/js/bootstrap.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/jquery-ui.custom.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/chosen.jquery.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/jquery.easypiechart.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/jquery.sparkline.index.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/jquery.flot.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/jquery.flot.pie.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/jquery.flot.resize.min.js"></script>

<!-- ace scripts -->
<script src="<?= URL_BASE ?>assets/js/ace-elements.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->

<!-- page specific plugin scripts -->
<script src="<?= URL_BASE ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/dataTables.buttons.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/buttons.flash.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/buttons.html5.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/buttons.print.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/buttons.colVis.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/dataTables.select.min.js"></script>
<script src="<?= URL_BASE ?>assets/js/pers/slider.js"></script>



<script type="text/javascript">
	$(document).ready(function() {
    $('#dynamic-table').DataTable();
} );
$(document).ready(function() {
    $('#dynamic-table2').DataTable();
} );

	jQuery(function ($) {
		//initiate dataTables plugin	
		//And for the first simple table, which doesn't have TableTools or dataTables
		//select/deselect all rows according to table header checkbox
		var active_class = 'active';
		$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function () {
			var th_checked = this.checked;//checkbox inside "TH" table header

			$(this).closest('table').find('tbody > tr').each(function () {
				var row = this;
				if (th_checked)
					$(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
				else
					$(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
			});
		});

		//select/deselect a row when the checkbox is checked/unchecked
		$('#simple-table').on('click', 'td input[type=checkbox]', function () {
			var $row = $(this).closest('tr');
			if ($row.is('.detail-row '))
				return;
			if (this.checked)
				$row.addClass(active_class);
			else
				$row.removeClass(active_class);
		});
		
			if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}


		/********************************/
		//add tooltip for small view action buttons in dropdown menu
		$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

		//tooltip placement on right or left
		function tooltip_placement(context, source) {
			var $source = $(source);
			var $parent = $source.closest('table')
			var off1 = $parent.offset();
			var w1 = $parent.width();

			var off2 = $source.offset();
			//var w2 = $source.width();

			if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
				return 'right';
			return 'left';
		}




		/***************/
		$('.show-details-btn').on('click', function (e) {
			e.preventDefault();
			$(this).closest('tr').next().toggleClass('open');
			$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
		});
		/***************/





		/**
		 //add horizontal scrollbars to a simple table
		 $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
		 {
		 horizontal: true,
		 styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
		 size: 2000,
		 mouseWheelLock: true
		 }
		 ).css('padding-top', '12px');
		 */


	})
	
</script>

</body>
</html>
