
<br />
<div class="container-fluid">
	<div class="card mb-4">
		<div class="card-header">
			<i class="fas fa-table mr-1"></i>CAREERS PORTAL | <a
				href="<?php echo base_url("careermanagement/addcareer_form");?>">Add
				Career</a> 
				
				
				
				<?php

    if ($userdata['user_type'] == 'admin') {

        ?>
				 | 
			 <a href="<?php echo base_url("careermanagement/addclerk_form");?>">Add
				Clerk</a>
				<?php
    }
    ?>
				
				
				| <a href="<?php echo base_url("careermanagement/logout");?>">Logout</a>

		</div>
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

<br/><br/>
 

<font size='3' color='grey'>Contact: $c[contact_details]</font>

<br/><br/>

  <a href='" . base_url('careermanagement/remove_career/' . $c['id']) . "'>Delete</a>
 

</td>";

                                            echo "</tr>";
                                        }

                                        ?>
                                        </tbody>
				</table>
			</div>
		</div>
	</div>
</div>



