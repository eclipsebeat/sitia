<head>
  <title>RUH Arsip</title>
   <!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="../includes/css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="../includes/css/application.css">
	<link type="text/css" rel="stylesheet" href="../includes/datepicker/css/datepicker.css">
	<link type="text/css" rel="stylesheet" href="../includes/DT/css/DT_bootstrap.css">
	
	<script type="text/javascript" src="../includes/js/bootstrap.js"></script>
	<script type="text/javascript" src="../includes/js/jquery.js"></script>
	<script type="text/javascript" src="../includes/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="../includes/datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="../includes/js/bootstrap-modal.js"></script>
	<script type="text/javascript" src="../includes/DT/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../includes/DT/js/DT_bootstrap.js"></script>

 </head>
    <div class="container" style="width:60%">
      <h1>I want these products</h1>
      <table class="table">
        <thead>
          <tr>
            <th>
              <h3>Group 1</h3>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Product 1</td>
            <td>Small</td>
            <td>
              <input type="number" style="width: 45px; padding: 1px" value="0"> 
            </td>
            <td>Medium</td>
            <td>
              <input type="number" style="width: 45px; padding: 1px" value="0"> 
            </td>
            <td>Large</td>
            <td>
              <input type="number" style="width: 45px; padding: 1px" value="0"> 
            </td>
            <td>Ultra</td>
            <td>
              <input type="number" style="width: 45px; padding: 1px" value="0"> 
            </td>
          </tr>
          <tr>
            <td>Product 2</td>
            <td>Small</td>
            <td>
              <input type="number" style="width: 45px; padding: 1px" value="0"> 
            </td>
            <td>Medium</td>
            <td>
              <input type="number" style="width: 45px; padding: 1px" value="0"> 
            </td>
            <td>Large</td>
            <td>
              <input type="number" style="width: 45px; padding: 1px" value="0"> 
            </td>
            <td>Ultra</td>
            <td>
              <input type="number" style="width: 45px; padding: 1px" value="0"> 
            </td>
          </tr>
        </tbody>
      </table>
      <table class="table">
        <thead>
          <tr>
            <th>
              <h3>Group 2</h3>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Product 3</td>
            <td>Small</td>
            <td>
              <input type="number" style="width: 45px; padding: 1px" value="0"> 
            </td>
            <td>Medium</td>
            <td>
              <input type="number" style="width: 45px; padding: 1px" value="0"> 
            </td>
            <td>Large</td>
            <td>
              <input type="number" style="width: 45px; padding: 1px" value="0"> 
            </td>
            <td>Ultra</td>
            <td>
              <input type="number" style="width: 45px; padding: 1px" value="0"> 
            </td>
          </tr>
          <tr>
            <td>Product 4</td>
            <td>Small</td>
            <td>
              <input type="number" style="width: 45px; padding: 1px" value="0"> 
            </td>
            <td>Medium</td>
            <td>
              <input type="number" style="width: 45px; padding: 1px" value="0"> 
            </td>
            <td>Large</td>
            <td>
              <input type="number" style="width: 45px; padding: 1px" value="0"> 
            </td>
            <td>Ultra</td>
            <td>
              <input type="number" style="width: 45px; padding: 1px" value="0"> 
            </td>
          </tr>
        </tbody>
      </table>
      <h3>Total: X pieces, Y USD</h3>
      <br>
      <br>
      <h1>I want to get them monthly for</h1>
      <select>
        <option>1 month</option>
        <option>3 months</option>
        <option>6 months</option>
        <option>12 months</option>
      </select>
      <br>
      <br>
      <h1>My details are</h1>
      <form>
        <label>Name</label>
        <input type="text" class="input-medium">
        <label>Phone</label>
        <input type="text" class="input-medium">
        <label>E-mail</label>
        <input type="text" class="input-medium">
        <label>Address</label>
        <input type="text" class="input-medium"> 
      </form>
      <button class="btn btn-block btn-success btn-large">Place order</button>
    </div>
  <br>
        <div class="span9 columns">
          <h2>Example</h2>
          <p>Attached to a field with the format specified via options.</p>
          <div class="well">
            <input type="text" class="span2" value="02-16-2012" id="dp1" >
          </div>
          <p>Attachet to a field with the format specified via data tag.</p>
          <div class="well">
            <input type="text" class="span2" value="02/16/12" data-date-format="mm/dd/yy" id="dp2" >
          </div>
          <p>As component.</p>
	
<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
            <input class="span3" placeholder="Username" type="text" name="username">
			</div>
			
          <div class="well">
			  <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
				<input class="span2" type="text" value="12-02-2012" readonly>
				<span class="add-on"><i class="icon-calendar"></i></span>
			  </div>
          </div>

          <p>Start with years viewMode.</p>
          <div class="well">
			  <div class="input-append date" id="dpYears" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
				<input class="span2" size="16" type="text" value="12-02-2012" readonly>
				<span class="add-on"><i class="icon-calendar"></i></span>
			  </div>
          </div>
          <p>Limit the view mode to months</p>
          <div class="well">
			  <div class="input-append date" id="dpMonths" data-date="102/2012" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
				<input class="span2" size="16" type="text" value="02/2012" readonly>
				<span class="add-on"><i class="icon-calendar"></i></span>
			  </div>
          </div>
          <p>Attached to other elment then field and using events to work with the date values.</p>
          <div class="well">
            
            
			<div class="alert alert-error" id="alert">
				<strong>Oh snap!</strong>
			  </div>
			<table class="table">
				<thead>
					<tr>
						<th>Start date<a href="#" class="btn small" id="dp4" data-date-format="yyyy-mm-dd" data-date="2012-02-20">Change</a></th>
						<th>End date<a href="#" class="btn small" id="dp5" data-date-format="yyyy-mm-dd" data-date="2012-02-25">Change</a></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td id="startDate">2012-02-20</td>
						<td id="endDate">2012-02-25</td>
					</tr>
				</tbody>
			</table>
          </div>
          <p>Disabling dates in the past and dependent disabling.</p>
          <div class="well">
      <table class="table">
        <thead>
          <tr>
            <th>Check in: <input type="text" class="span2" value="" id="dpd1" ></th>
            <th>Check out: <input type="text" class="span2" value="" id="dpd2" ></th>
          </tr>
        </thead>
      </table>
          </div>
  <a href="../attachment/lkpp/13052013031219FotocopyKTP.pdf" target="_blank">klik</a>

	<table class="well">
		<tr>
			<td>
				<a href="../attachment/surat/masuk/20052013040335S- 3888 PB.12010.pdf" onmouseover="previewUrl(this.href,'div1')">google</a>
			</td>
			<td>
				<div id="div1" style="width:400px;height:200px;border:1px solid #ddd;"></div>
			</td>
		</tr>
	</table>
	
	<div>
		<iframe src="../attachment/surat/masuk/20052013040335S- 3888 PB.12010.pdf"></iframe>
	</div>


    <script>
		
		function previewUrl(url,target){
        //use timeout coz mousehover fires several times
        clearTimeout(window.ht);
        window.ht = setTimeout(function(){
            var div = document.getElementById(target);
            div.innerHTML = '<iframe style="width:100%;height:100%;" frameborder="0" src="' + url + '" />';
        },20);      
    }
		
		$(function(){
		

		
			window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'mm-dd-yyyy'
			});
			$('#dp2').datepicker();
			$('#dp3').datepicker();
			$('#dp3').datepicker();
			$('#dpYears').datepicker();
			$('#dpMonths').datepicker();
			
			
			var startDate = new Date(2012,1,20);
			var endDate = new Date(2012,1,25);
			$('#dp4').datepicker()
				.on('changeDate', function(ev){
					if (ev.date.valueOf() > endDate.valueOf()){
						$('#alert').show().find('strong').text('The start date can not be greater then the end date');
					} else {
						$('#alert').hide();
						startDate = new Date(ev.date);
						$('#startDate').text($('#dp4').data('date'));
					}
					$('#dp4').datepicker('hide');
				});
			$('#dp5').datepicker()
				.on('changeDate', function(ev){
					if (ev.date.valueOf() < startDate.valueOf()){
						$('#alert').show().find('strong').text('The end date can not be less then the start date');
					} else {
						$('#alert').hide();
						endDate = new Date(ev.date);
						$('#endDate').text($('#dp5').data('date'));
					}
					$('#dp5').datepicker('hide');
				});

        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
          onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
          checkin.hide();
          $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
		});
	</script>
 
</html>