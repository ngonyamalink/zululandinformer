
<br />
<div class="container-fluid">
	<h4 align="center">CURRENT JOBS</h4>


	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped" id="dataTable" width="100%"
				cellspacing="0" table-layout="auto">


				<tbody>
                                        
                                        
                                          <?php
                                        foreach ($careers as $c) {
                                            echo "<tr>";

                                            echo "<td><font size='4'>$c[category]</font>";
                                            echo "<br/>";
                                            echo "<font size='4'> Closing date : $c[closing_date]</font>";
                                            echo "<br/>";
                                            echo "<font size='4'>$c[title]</font>


<br/>

<font size='3' color='grey'> $c[description]</font>
<br/>
 <font size='3' color='grey'>Contact: $c[contact_details]</font>

</td>";

                                            echo "</tr>";
                                        }

                                        ?>
                                        </tbody>
			</table>
		</div>
	</div>
</div>






