<?php
	require_once("includes/header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/ieee_merge.ico" />
	<title>CS Chapter - IEEE SB IIIT Allahabad</title>
	
	<meta name="keywords" content="IEEE, IIITA, IIIT Allahabad, IEEE Students Branch, Engineering" />
	<meta name="description" content="Official Page of IEEE Students Branch of IIIT Allahabad." />
	
	<link rel="stylesheet" type="text/css" href="css/templatemo_style.css" />
	<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
	<link rel="stylesheet" type="text/css" href="css/slimbox2.css" media="screen" /> 
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" /> 
	
	<script type="text/javascript" src="js/jquery-1.7.2.min.js" ></script>
	<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
	<script type="text/JavaScript" src="js/slimbox2.js"></script>
	<script type="text/javascript" src="js/172.js"></script>
	<script type="text/javascript" src="js/1821.js"></script>
	<!--[if lte IE 8]>
	<script type="text/javascript" src="js/mootools.js"></script>
	<script type="text/javascript" src="js/selectivizr.js"></script>
	<![endif]-->
	<script type="text/javascript">
	ddsmoothmenu.init({
		mainmenuid: "templatemo_menu", //menu DIV id
		orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
		classname: 'ddsmoothmenu', //class added to menu's outer DIV
		//customtheme: ["#1c5a80", "#18374a"],
		contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
	})
	</script>
	<script type="text/javascript">
	$(function() {
		$( "#accordion" ).accordion({
			autoHeight: false,
			navigation: true
		});
	});
	</script>
</head>
<body>

<div id="templatemo_wrapper">
	<a href="index.php"><img id = "site_title" src = "images/header.png" style = "height: 150px"></a>
	<div id="templatemo_header"><span class="header_border"></span>
		<div id="templatemo_menu" class="ddsmoothmenu">
            <ul >
					<li style="left:-150px;"><a href="index.php" class="selected" ><span></span>Home</a></li>
					<li style="left:-150px;"><a href="#"><span></span>Office Bearers</a>
						<ul>
							<li><a href="faculty_advisors.php">Faculty Advisors</a></li>
							<li><a href="office_bearers.php">Office Bearers</a></li>
							<li><a href="Execom.php">ExCom Members</a></li>
							<li><a href="Student_Volunteers.php">Team Members</a></li>
						</ul></li>
					<li style="left:-150px;"><a href="#"><span></span>Chapters</a>
						<ul>
							<li><a href="ras_chapter.php">RAS (SBC14321A)</a></li>							
							<li><a href="cs_chapter.php">Computer Society (SBC14321B)</a><br/></li>
							<li><a href="sp_chapter.php">Signal Processing (SBC14321C)</a><br/></li>
							<li><a href="wie_chapter.php">WIE Affinity Group (SBA14321)</a><br/></li>
						</ul></li>
					<li style="left:-150px;"><a href="IEEE_Student_Members.php"><span>Members</span></a>
					
					<li style="left:-150px;"><a href="event.php"><span></span>Activities</a>
						</li>					
						
					<li style="left:-150px;"><a href="#"><span></span>Downloads</a>
					<ul>
							<li><a href="reports.php">Reports</a></li>							
							<li><a href="download.php">Documents/Forms</a></li>
							<li><a href="press_release.php">Press release</a></li>
							
						</ul></li>	
						<li style="left:-150px;"><a href="sponsors.pdf"><span>Sponsor</span></a>	
								
				</ul>
				<br style="clear: left" />
        </div> <!-- end of templatemo_menu -->
        <div class="clear"></div>
    </div> <!-- END of header -->
    
    
    <div id="templatemo_main_content">
    	<div id="templatemo_sidebar">
		<div class="sidebar_content_box">
			<h3>IEEE Members</h3>
			<ul class="sidebar_gallery">
				<?php
					$imgs = 1;
					$check = array();
					while ($imgs <= 9) {
						    $qry = "SELECT * FROM student_team";
	                        $smt = $dbh->prepare($qry);
	                        $smt->execute();
	                        $rw = $smt->rowCount();
						    $rand_img = rand (1, $rw);
						    $rand_img = rand (11, 22);
						    while (in_array($rand_img, $check)) {
							  $rand_img = rand (1, $rw);
							  $rand_img = rand (11, 22);
					    }
					    array_push($check, $rand_img);
					    $p = "stu_images/member" . $rand_img . ".jpg";
					    $query2 = "SELECT member_id FROM student_image WHERE image_id = (SELECT image_id FROM image WHERE image_path = :path)";
					    $stmt2 = $dbh->prepare($query2);
					    $stmt2->bindParam(':path', $p, PDO::PARAM_STR);
					    $stmt2->execute();
					    $row = $stmt2->fetch(PDO::FETCH_ASSOC);
					    $member_id = $row['member_id'];
					    $num = 1;
					    $query2 = "SELECT member_id FROM student_team";
					    $stmt2 = $dbh->prepare($query2);
					    $stmt2->execute();
					    while ($r = $stmt2->fetch(PDO::FETCH_ASSOC)) {
						if ($member_id == $r['member_id']) {
						    break;
						}
						$num++;
					    }
					    $a = $num;
					    if ($num%10 == 0) {
						$num = $num / 10;
					    } else {
						$num = (int) ($num / 10) + 1;
					    }
				?>
			    <li><img src="<?php echo $p; ?>"  /></li>
			    <?php
				$imgs++;
				}
			    ?>
			</ul>
			<div class="clear"></div>
		</div>
		
		<div class="sidebar_content_box ">
				<a href = "http://www.ieeer10.org/" target="_blank"><image src = "images/linksUp/ieeeRegion10.jpg" height = "50px" width = "65"></a>
				<a href = "http://ewh.ieee.org/r10/india_council/" target="_blank"><image src = "images/linksUp/ieee_india_council.png" height = "50px" width = "65px" style="margin-left:10px"></a>
				<a href = "http://www.ieeeup.org/"  target="_blank"><image src = "images/linksUp/ieee-up.png" height = "50px" width = "73px" style="margin-left:10px"></a>
		</div>
        </div>
        
      <div id="templatemo_content">
        	
		<div id="accordion">
			<h2><a href="#"> IEEE Computer Society Student Branch Chapter - IIITA (SBC14321B) </a></h2>
			<center><b>(IEEE - CS SB Chapter - IIITA)</b></center>
			
		</div>

		<div id="accordion">
			<div>
			<table width="100%" border="0">
			        <tr>
				<td><img src="images/professional team/sverma.jpg" width="80" height="100" style="border-radius:60%;"/></td>
			        <td><div><h4><b><br><a target="_blank" href = "https://profile.iiita.ac.in/sverma/">Prof. Shekhar Verma</a></b></h4></div>
			                <div><b>Faculty Advisor</b>, IEEE Computer Society SB Chapter IIIT Allahabad<br>
			                Email: sverma@iiita.ac.in<br> 
					Tel: +91-532-2922224</div><br>
			        </td>
				</tr>				
					
			</table>
			</div>						
					
			<h3>Office Bearers for Session (2017-18) </h3>
			<div>
			<table width="100%" border="0">
			        			
				<tr>
				<td><img src="images/professional team/vinod.jpg" width="80" height="100" style="border-radius:60%;"/></td>
			        <td><div><h4><b><br><a href="https://sites.google.com/site/vkjatav1217/home">Vinod Kumar Jatav</a></b></h4></div>
			               	Role : Chairperson<br>
					GSMIEEE: 92905735<br>
			               	Email: vinodj217@ieee.org, Mob No: (+91)9412169334<br>
			               	PhD Research Scholar<br>
			        </td>
				</tr>
				
				<tr>
				<td width="15%"><img src="images/professional team/generic.jpg" width="80" height="100" style="border-radius:60%;"/></td>
				<td width="85%"><div><h4><b><br><a href="#">Jay Tibrewal</b></a></h4></div>
			                Role :Vice Chair<br>
					StMIEEE: 93890733<br>
					Email: iit2014010@iiita.ac.in, Mob No: (+91)9455776469<br>
			                B.Tech Student<br>
				</td>

				</tr>
				
				<tr>
				<td width="15%"><img src="images/professional team/Shivam.jpg" width="80" height="100" style="border-radius:60%;"/></td>
				<td width="85%"><div><h4><b><br><a href="#">Shivam</b></a></h4></div>
			                Role : Vice Chair<br>
					StMIEEE: 93617272<br>
					Email: iit2014077@iiita.ac.in, Mob No: (+91)7839942679<br>
			                B.Tech Student<br>
				</td>
				</tr>

				<tr>
				<td width="15%"><img src="images/professional team/generic.jpg" width="80" height="100" style="border-radius:60%;"/></td>
				<td width="85%"><div><h4><b><br><a href="#">Anandita Dhawan</b></a></h4></div>
			                Role : Secretary<br>
					StMIEEE: 94224919<br>
					Email: iec2016052@iiita.ac.in, Mob No: (+91)8957065531<br>
			                B.Tech Student<br>
				</td>
				</tr>
				
				<tr>
					<td width="15%"><img src="images/professional team/generic.jpg" width="80" height="100" style="border-radius:60%;"/></td>
				<td width="85%"><div><h4><b><br><a href="#">Prakhar Chaturvedi</b></a></h4></div>
			                Role : Joint Secretary, Chair (Membership and Events)<br>
					StMIEEE: 94224005<br>
					Email: ihm2016001@iiita.ac.in, Mob No: (+91)7860546065<br>
			                B.Tech IT<br>
				</td>

				</tr>
				
				<tr>
		              	<td><img src="images/professional team/Mansi_Choudhary.jpg" width="80" height="100" style="border-radius:50%;"/></td>
			              <td><div><h4><b><a target="_blank" href = "#">Mansi Choudhary</b></a></h4></div>
			                Role : Treasurer, Chair (Publication)<br>
					StMIEEE: 94190354  <br>
			                Email: iit2016016@iiita.ac.in, Mob No: (+91)9559154883<br>
					B.Tech IT<br>
			              </td>
		            	</tr>								<tr>
				
				<td width="15%"><img src="images/professional team/generic.jpg" width="80" height="100" style="border-radius:60%;"/></td>
				<td width="85%"><div><h4><b><br><a href="#">Sudhanshu Shakya</b></a></h4></div>
			                Role : Chair, Web Management and Graphic Design <br>
					StMIEEE: 94063256<br>
					Email: ism2016004@iiita.ac.in, Mob No: (+91) 8439357480 <br>
			                B.Tech Student<br>
				</td>


				</tr>
			</table>
			</div>  <br><br>
			<h3>Office Bearers for Session (2016-17) </h3>
				1. Mr. Vinod Kumar Jatav - Chairperson <br>
				2. Mr. Jay Tibrewal      - Vice Chair <br>
				3. Mr. Shivam            - Secretary <br>
				4. Ms. Manasi Mohandas   - Joint Secretary <br>				
				5. Mr. Jayesh Patil      - Treasurer <br>
				6. Mr. Laraib Zafar Khan - Chair, Membership and Events <br>
		</div>

        </div> <!-- END of templatemo_content -->
        
    <div class="clear"></div>
    </div> <!-- END of templatemo_main_content -->
    
<!--
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
-->
    <div id="templatemo_footer">
			Copyright � 2014, IEEE Student Branch IIIT Allahabad (Web: ieee.sb.iiita.ac.in; Email: ieee.sb@iiita.ac.in)
	    </div> <!-- END of templatemo_footer -->
</div> <!-- END of templatemo_wrapper -->
</body>

</html>
