<div class='container-fluid mx-auto mt-4 mb-5 col-12'
	style="text-align: center">
	<h4 align="center">TECH SERVICES</h4>
	<p>Click on the service links below to get more information on each.</p>
	<br />





	<script type="text/javascript">
$( function() {
  var $winHeight = $( window ).height()
  $( '.container' ).height( $winHeight );
});
</script>
 
 	 
 
          <?php
        echo '<div class="sidebar-social" align="center">

<ul>
<li>
<a href=' . base_url('index.php/welcome/services/1') . ' title="Web development and support"  rel="nofollow"><i class="fa fa-globe"></i>
  <span>Web development and support</span></a></li>

<li><a href=' . base_url('index.php/welcome/services/2') . ' title="Database
		    development and support"  rel="nofollow"><i class="fa fa-database"></i><span>Database
		    development and support</span></a>
</li>
        
<li><a href=' . base_url('index.php/welcome/services/3') . ' title="Storage,
							API and applications integrations"  rel="nofollow"><i class="fa fa-server"></i><span>Storage,
							API and applications integrations</span></a>
</li>
        
<li><a href=' . base_url('index.php/welcome/services/4') . ' title="Configurations
							and deployments"  rel="nofollow"><i class="fa fa-cog"></i><span>Configurations
							and deployments</span></a>
</li>
        
<li><a href=' . base_url('index.php/welcome/services/5') . ' title="Troubleshooting"  rel="nofollow"><i class="fa fa-question-circle"></i><span>Troubleshooting</span></a>
</li>

<li><a href=' . base_url('index.php/welcome/services/6') . ' title="Mobile
							development and support"  rel="nofollow"><i class="fa fa-mobile"></i><span>Mobile
							development and support</span></a> 
</li>


<li><a href=' . base_url('index.php/welcome/services/7') . ' title="Bulk Messages"  rel="nofollow"><i class="fa fa-comments"></i><span>Bulk Messages</span></a>
</li>
        
<li><a href=' . base_url('index.php/welcome/services/8') . ' title="Bulk Emails"  rel="nofollow"><i class="fa fa-envelope"></i><span>Bulk Emails</span></a>
</li>

<li><a href=' . base_url('index.php/welcome/services/9') . ' title="Social Media Integration"  rel="nofollow"><i class="fa fa-facebook"></i><span>Social Media Integration</span></a> 
</li>

</ul>
</div>';

        switch ($serviceid) {

            case 1:
                echo "<br/><h4 align='center'>Web development and support</h4>  <p> <i> <br/>

                     Document management system.
                    Company  calendar.
                    Membership system.
                    Human Resources (HR) systems.
                    Leave management system.
                    Fleet management system.
                    Education Systems.
                    Health Systems.
                    Intranets for internal communications.
                    Websites for public facing applications.
                    Data storage frontend and backend systems.
                    Single Sign On (SSO) service.
                    Surveys. 
                    <br/><br/>
                 </i> </p>";
                break;

            case 2:
                echo "<br/><h4 align='center'>Database development and support</h4> <p> <i>  <br/>
                    Majority of our applications have databases where they store records such as user registrations, products/services records and many more.
                    We are capable of building both structured(MySQL, PostgreSQL) and unstructured (no sql) databases like MongoDB. 
                    <br/><br/>
                 </i> </p>";
                break;

            case 3:
                echo "<br/><h4 align='center'>Storage, API and applications integrations</h4> <p> <i>  <br/>
                     Ngonyama Link is versed with systems for storing and retrieving documents  on the linux and windows operating systems. Operations that come with our storage systems are copy, paste, delete, rename and transfer. 
                    <br/><br/>
                 </i> </p>";
                break;

            case 4:
                echo "<br/><h4 align='center'>Configurations and deployments</h4>  <p> <i><br/>
                     Ngonyama Link prepares the environments for clients to store, manage their deployments, domains, databases, applications so they can quickly and easily develop, build or update their portals/applications. We have extensive experience in configuring and deploying the services, applications and packages to various operating systems such as Windows Server and Linux Server. 
                    <br/><br/>
                 </i> </p>";
                break;

            case 5:
                echo "<br/><h4 align='center'>Troubleshooting</h4> <p>  <i>    <br/>
                    When our clients have technical issues on their applications and infrastructures, we are able to resolve those issues. We get their applications/infrustructures up and running in the shortest space of time. This can be done virtually or on site. 
                    <br/><br/>
                 </i> </p>";
                break;

            case 6:
                echo "<br/><h4 align='center'>Mobile development and support</h4> <p> <i>  <br/>
                             Ngonyama Link developers have experience working on mobile applications such as IOS, j2me, Android and BlackBerry and many more. 
                             <br/><br/>
                          </i> </p>";
                break;

            case 7:
                echo "<br/><h4 align='center'>Bulk Messages</h4> <p> <i>  <br/>
                             Send text messages to multiple receipients. 
                             <br/><br/>
                          </i> </p>";
                break;

            case 8:
                echo "<br/><h4 align='center'>Bulk Emails</h4> <p> <i>  <br/>
                             Send emails to multiple receipients. 
                             <br/><br/>
                          </i> </p>";
                break;

            case 9:
                echo "<br/><h4 align='center'>Social Media Integration</h4> <p> <i>  <br/>
                             Integrate social media platforms with various other systems or applications. 
                             <br/><br/>
                          </i> </p>";
                break;

            default:
                break;
        }

        ?>


<div>
		<h4 align="center">Hire Us</h4>
		<br />
		<div class="row">
			<div class="col-md-12">

				<form action='<?php echo base_url("welcome/sendservicerequest")?>'
					method="POST">


					<div class="form-group">
						<label for="sel1">Select service from the list:</label> <select
							class="form-control" id="sel1" name="servicerequested">
							<option value="Web development and support">Web development and
								support</option>
							<option value="Database development and support">Database
								development and support</option>
							<option value="Storage, API and applications integrations">Storage,
								API and applications integrations</option>
							<option value="Configurations and deployments">Configurations and
								deployments</option>
							<option value="Troubleshooting">Troubleshooting</option>
							<option value="Mobile development and support">Mobile development
								and support</option>
							<option value="Bulk Messages">Bulk Messages</option>
							<option value="Bulk Emails">Bulk Emails</option>
							<option value="Social Media Integration">Social Media Integration</option>
							<option value="On Platform BillBoard Advertisement">On Platform
								BillBoard Advertisement</option>
							<option value="Other">Other</option>
						</select>
					</div>

					<input class="form-control" placeholder="Full Names"
						name="fullnames" /><br /> <input class="form-control"
						placeholder="Phone" name="phone" /><br /> <input
						class="form-control" placeholder="E-mail" name="email" /> <br />

					<textarea class="form-control"
						placeholder="Please start tying your message here ..."
						style="height: 150px;" name="message">Please start tying your message here ...</textarea>
					<br /> <input type="submit" value="Submit" class="btn btn-primary" />


				</form>
			</div>
		</div>
	</div>



	<style>
.sidebar-social {
	margin: 0;
	padding: 0;
}

.sidebar-social ul {
	margin: 0;
	padding: 5px;
}

.sidebar-social li {
	text-align: center;
	width: 31.9%;
	margin-bottom: 3px !important;
	background-color: #fff;
	border: 1px solid #eee;
	display: inline-block;
	font-size: 10px;
	padding: 0;
}

.sidebar-social i {
	display: block;
	margin: 0 auto 10px auto;
	width: 32px;
	height: 32px;
	margin: 10px auto 0;
	line-height: 32px;
	text-align: center;
	font-size: 20px;
	color: #444444;
	margin-top: 0;
	padding-top: 5px;
}

.sidebar-social a {
	text-decoration: none;
	width: 100%;
	height: 100%;
	display: block;
	margin: 0;
	padding: 0;
}

.sidebar-social a span {
	color: black;
	font-size: 10px;
	padding: 5px 0 10px 0;
	display: block;
	text-transform: uppercase;
	font-family: 'Josefin Sans';
	letter-spacing: 1px;
}

.sidebar-social a:hover i.fa-globe {
	color: #FF0000;
}

.sidebar-social a:hover i.fa-database {
	color: #00ABE3
}

.sidebar-social a:hover i.fa-server {
	color: #FFD400
}

.sidebar-social a:hover i.fa-cog {
	color: #FF0000
}

.sidebar-social a:hover i.fa-question-circle {
	color: #cb2027
}

.sidebar-social a:hover i.fa-mobile {
	color: #FF57AE
}

.sidebar-social a:hover i.fa-comments {
	color: #00ABE3
}

.sidebar-social a:hover i.fa-envelope {
	color: #FF1F25
}

.sidebar-social a:hover i.fa-facebook {
	color: #FF57AE
}
</style>