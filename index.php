<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.0.2/semantic.min.css" />
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.0.2/semantic.min.js"></script>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
		<title>Inventory Lookup</title>
	</head>
	<body onload="return start()">
		<div class="ui container">
			<img class="ui small image" src="cousins.png">
			<div class="ui centered grid">
				
				<div class="row">
					<h2 class="ui icon header">
					  <i class="search icon"></i>
					  <div class="content">
					    Inventory Lookup
					    <div class="sub header">Search inventory for Cousin's Supermarket</div>
					  </div>
					</h2>
				</div>

				<div class="row">
					<div class="ui search">
					  <div class="ui icon input">
					    <input class="prompt" type="text" placeholder="Search..." id="searchBar" oninput="return TableSearch()">
					    <i class="search icon"></i>
					  </div>
					  <div class="results"></div>
					</div>
				</div>

				<div class="row" id="myTable">
					
				</div>

			</div>
		</div>
	</body>
	<script type="text/javascript">
			function start(){
				$.ajax({
				  url: 'inventory.csv',
				  dataType: 'text',
				}).done(successFunction);
			}
			function successFunction(data) {
			  var allRows = data.split(/\r?\n|\r/);
			  var table = '<table class="ui striped unstackable table">';

			  for (var singleRow = 0; singleRow < allRows.length; singleRow++) {
			    if (singleRow === 0) {
			      table += '<thead>';
			      table += '<tr>';
			    } else {
			      table += '<tr>';
			    }
			    var rowCells = allRows[singleRow].split(',');
			    for (var rowCell = 0; rowCell < 3; rowCell++) {
			      if (singleRow === 0) {
			        table += '<th>';
			        table += rowCells[rowCell];
			        table += '</th>';
			      } else {
			        table += '<td>';
			        table += rowCells[rowCell];
			        table += '</td>';
			      }
			    }
			    if (singleRow === 0) {
			      table += '</tr>';
			      table += '</thead>';
			      table += '<tbody>';
			    } else {
			      table += '</tr>';
			    }
			  } 
			  table += '</tbody>';
			  table += '</table>';
			  $('#myTable').append(table);
			}
			function TableSearch() {
    			var input, filter, table, tr, td, i;
				  input = document.getElementById("searchBar");
				  filter = input.value.toUpperCase();
				  table = document.getElementById("myTable");
				  tr = table.getElementsByTagName("tr");
				  for (i = 0; i < tr.length; i++) {
				    td0 = tr[i].getElementsByTagName("td")[0];
				    td1 = tr[i].getElementsByTagName("td")[1];
				    td2 = tr[i].getElementsByTagName("td")[2];
				    if (td0 || td1 || td2) {
				      if (td0.innerHTML.toUpperCase().indexOf(filter) > -1 || td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
				        tr[i].style.display = "";
				      } else {
				        tr[i].style.display = "none";
				      }
				    }       
				  }
			}
	</script>
</html>