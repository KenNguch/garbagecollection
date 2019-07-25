<script>
	$j(function(){
		var tn = 'availability';

		/* data for selected record, or defaults if none is selected */
		var data = {
			truck: <?php echo json_encode(array('id' => $rdata['truck'], 'value' => $rdata['truck'], 'text' => $jdata['truck'])); ?>,
			route: <?php echo json_encode(array('id' => $rdata['route'], 'value' => $rdata['route'], 'text' => $jdata['route'])); ?>,
			amount: <?php echo json_encode($jdata['amount']); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for truck */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'truck' && d.id == data.truck.id)
				return { results: [ data.truck ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for route */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'route' && d.id == data.route.id)
				return { results: [ data.route ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for route autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'route' && d.id == data.route.id){
				$j('#amount' + d[rnd]).html(data.amount);
				return true;
			}

			return false;
		});

		cache.start();
	});
</script>

