<!DOCTYPE html>
<html>
  <head>
    <title>Toy Board Game</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link href="css/fuelux-responsive.css" rel="stylesheet">
    <link href="css/fuelux-responsive.css" rel="stylesheet">
   
   
   <script src="js/jquery.js"></script>
   <script src="js/jquery-ui.js"></script>
   
	<!-- My Toyboard -->
	<link href="css/toyboard.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
   <script src="http://code.jquery.com/jquery-1.9.1.min.js">
   </script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.min.js">
    </script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"> </script>
    <!-- My Toyboard JS -->
    <script src="js/toyboard.js"> </script>
    <script src="js/html2canvas.js"></script>
	
  </head>
  <body>
  <div class="container">

	 <br/>
	 <br/>
	<div class="row">
		<div id="toyboard" class="col-md-5 col-md-offset-1 top">
		<div class="table-responsive">
		 <table class="table fixed" id="topics">
         <tbody>
            <tr class="row">
			    <td class="col-md-1 droppable corner_piece" id="row-1" >              </td><td class="col-md-1 droppable border_bg second_piece" id="row-9">  </td> <td class="col-md-1 droppable border_bg" id="row-17">    </td><td  class="col-md-1 droppable border_bg" id="row-25">    </td> <td class="col-md-1 droppable border_bg" id="row-33">    </td><td class="col-md-1 droppable border_bg" id="opp-40">   </td> <td class="col-md-1 droppable border_bg" id="opp-32">    </td><td class="col-md-1 droppable border_bg" id="opp-24">    </td> <td class="col-md-1 droppable border_bg second_last_piece" id="opp-16">    </td><td class="col-md-1 droppable border_bg last_piece" id="opp-8" >    </td>
		    </tr>
			  <tr class="row">
			      <td class="col-md-1 droppable border_bg first_piece" id="row-2">    </td><td class="col-md-1 droppable border_bg" id="row-10">              </td> <td class="col-md-1 droppable border_bg" id="row-18">    </td><td  class="col-md-1 droppable border_bg" id="row-26">    </td> <td class="col-md-1 droppable border_bg" id="row-34">    </td><td class="col-md-1 droppable border_bg" id="opp-39">   </td> <td class="col-md-1 droppable border_bg" id="opp-31">    </td><td class="col-md-1 droppable border_bg" id="opp-23">    </td> <td class="col-md-1 droppable border_bg" id="opp-15">    </td><td class="col-md-1 droppable border_bg last_piece" id="opp-7" >    </td>
		    </tr>
			  <tr class="row">
			     <td class="col-md-1 droppable border_bg first_piece" id="row-3">    </td><td class="col-md-1 droppable border_bg" id="row-11">               </td> <td class="col-md-1 droppable border_bg" id="row-19">    </td><td  class="col-md-1 droppable border_bg" id="row-27">    </td> <td class="col-md-1 droppable border_bg" id="row-35">    </td><td class="col-md-1 droppable border_bg" id="opp-38">   </td> <td class="col-md-1 droppable border_bg" id="opp-30">    </td><td class="col-md-1 droppable border_bg" id="opp-22">    </td> <td class="col-md-1 droppable border_bg" id="opp-14">    </td><td class="col-md-1 droppable border_bg last_piece" id="opp-6" >    </td>
		    </tr>
			  <tr class="row">
			      <td class="col-md-1 droppable border_bg first_piece" id="row-4">    </td><td class="col-md-1 droppable border_bg" id="row-12">              </td> <td class="col-md-1 droppable border_bg" id="row-20">    </td><td  class="col-md-1 droppable border_bg" id="row-28">    </td> <td class="col-md-1 droppable border_bg" id="row-36">    </td><td class="col-md-1 droppable border_bg" id="opp-37">   </td> <td class="col-md-1 droppable border_bg" id="opp-29">    </td><td class="col-md-1 droppable border_bg" id="opp-21">    </td> <td class="col-md-1 droppable border_bg" id="opp-13">    </td><td class="col-md-1 droppable border_bg last_piece" id="opp-5" >    </td>
		    </tr>
			  <tr class="row">
			      <td class="col-md-1 droppable border_bg first_piece" id="row-5">    </td><td class="col-md-1 droppable border_bg" id="row-13">              </td> <td class="col-md-1 droppable border_bg" id="row-21">    </td><td  class="col-md-1 droppable border_bg" id="row-29">    </td> <td class="col-md-1 droppable border_bg" id="row-37">    </td><td class="col-md-1 droppable border_bg" id="opp-36">   </td> <td class="col-md-1 droppable border_bg" id="opp-28">    </td><td class="col-md-1 droppable border_bg" id="opp-20">    </td> <td class="col-md-1 droppable border_bg" id="opp-12">    </td><td class="col-md-1 droppable border_bg last_piece" id="opp-4" >    </td>
		    </tr>
			  <tr class="row">
			      <td class="col-md-1 droppable border_bg first_piece" id="row-6">    </td><td class="col-md-1 droppable border_bg" id="row-14">              </td> <td class="col-md-1 droppable border_bg" id="row-22">    </td><td  class="col-md-1 droppable border_bg" id="row-30">    </td> <td class="col-md-1 droppable border_bg" id="row-38">    </td><td class="col-md-1 droppable border_bg" id="opp-35">   </td> <td class="col-md-1 droppable border_bg" id="opp-27">    </td><td class="col-md-1 droppable border_bg" id="opp-19">    </td> <td class="col-md-1 droppable border_bg" id="opp-11">    </td><td class="col-md-1 droppable border_bg last_piece" id="opp-3" >    </td>
		    </tr>
			  <tr class="row">
			      <td class="col-md-1 droppable border_bg first_piece" id="row-7">    </td><td class="col-md-1 droppable border_bg" id="row-15">              </td> <td class="col-md-1 droppable border_bg" id="row-23">    </td><td  class="col-md-1 droppable border_bg" id="row-31">    </td> <td class="col-md-1 droppable border_bg" id="row-39">    </td><td class="col-md-1 droppable border_bg" id="opp-34">   </td> <td class="col-md-1 droppable border_bg" id="opp-26">    </td><td class="col-md-1 droppable border_bg" id="opp-18">    </td> <td class="col-md-1 droppable border_bg" id="opp-10">    </td><td class="col-md-1 droppable border_bg last_piece" id="opp-2" >    </td>
		    </tr>
			  <tr class="row">
			      <td class="col-md-1 droppable border_bg first_piece" id="row-8">    </td><td class="col-md-1 droppable border_bg second_piece" id="row-16" ></td> <td class="col-md-1 droppable border_bg" id="row-24">    </td><td  class="col-md-1 droppable border_bg" id="row-32">    </td> <td class="col-md-1 droppable border_bg" id="row-40">    </td><td class="col-md-1 droppable border_bg" id="opp-33">   </td> <td class="col-md-1 droppable border_bg" id="opp-25">    </td><td class="col-md-1 droppable border_bg" id="opp-17">    </td> <td class="col-md-1 droppable border_bg second_last_piece" id="opp-9">    </td><td class="col-md-1 droppable corner_piece last_piece" id="opp-1" >    </td>
		    </tr>     

		  </tbody>
        </table>
		<div id="display_board"></div>
		
 		</div><!--Class responsive ends -->
		</div>
		
		
			<!-- Step 1 = choose-color Div  -->
		<div class="col-md-5 top" style="">
		<div id="step1_description" class="description"  style="display: ">
		<p id="title"> colour_board </p>
		<div class="center_part" >
		<br/>
		<p>Choose what colour you want to be this will determine the direction of the board.  </p>
		<form id="color_choice">
		<div class="row">		  
		  <div class="col-md-4 col-md-offset-1">
			<div class="thumbnail">
			  <img id="color1" class="colorchoice " src="images/color1.png" alt="My Image" />
			  <div id="colorID" class="caption" class="text-center">
			  	<div id="option1" class="checkbox checked">
 				 </div>

			  </div>
			</div>
		  </div>
		
		 <div class="col-md-4 col-md-offset-2">
			<div class="thumbnail">
			  <img id="color1" class="colorchoice " src="images/color2.png" alt="My Image" />
			  <div id="colorID" class="caption" class="text-center">
			  	<div class="radio">
				  
				  <div id="option2" class="checkbox">
  				  </div>

				</div>
			  </div>
			</div>
		  </div>
		  </form>
		  
		 <div class="col-md-1 col-md-offset-1"></div>
		</div>
			
		<br/>
		</div>	
		</div> <!-- Color Setup -->

		
		<!-- step2 = Description Div  -->

		<div id="step2_description" class="description" style="display: none">
		<p id="title"> SETUP BOARD </p>
		<div class="center_part" >
		<p>Click and Drag Piece on the board to theleft. Release the Click to Drop the piece on the desired spot.For every Piece you choose
		there will be automatically corresponding piece from the opposing color.  </p>
		
		<div class="row">
		  <div class=" col-md-3">
			<div id="thumb1" class="thumbnail_disp">
			  <div id="drop1-name" class="caption piece_name"> ANUBIS </div>
			  <img id="drop1-3" class="drop1 piece ui-widget-content" src="images/drop1-1.png" alt="My Image" />
			  <div id="caption-drop1" class="caption">
				
				<p id="Remaining-drop1" class="ramaining">3</p>
			  </div>
			</div>
		  </div>

		  <div class="col-md-3">
			<div class="thumbnail_disp">
			  <div id="drop2-name" class="caption piece_name"> PYRAMID </div>
			  <img id="drop2-3" class="drop2 piece ui-widget-content" src="images/drop2-1.png" alt="My Image" />
			  <div id="caption-drop2" class="caption">
				
				<p id="Remaining-drop2" class="ramaining">3</p>
			  </div>
			</div>
		  </div>

		  <div class="col-md-3">
			<div class="thumbnail_disp">
				<div id="drop3-name" class="caption piece_name"> SCARAB </div>
			  <img id="drop3-3" class="drop3 piece ui-widget-content" src="images/drop3-1.png" alt="My Image" />
			  <div id="caption-drop3" class="caption">
				
				<p id="Remaining-drop3" class="ramaining">3</p>
			  </div>
			</div>
		  </div>
		
		
		  <div class="col-md-3">
			<div class="thumbnail_disp">
			  <div id="drop4-name" class="caption piece_name"> PHAROHA </div>
			  <img id="drop4-3" class="drop4 piece ui-widget-content" src="images/drop4-1.png" alt="My Image" />
			  <div id="caption-drop4" class="caption">
				
				<p id="Remaining-drop4" class="ramaining">3</p>
			  </div>
			</div>
		  </div>
		</div>
		
		
		<p> you will be given an option to rotate your Piece One it is placed on the board as well as drag it to a new Place</p>
		
		<div class="row">
		  <div id="before_strip" class="col-md-3 col-md-offset-1">
		  <div id="strip_method" >
		     <div id="strip_method_inside">
		  	<img id="btn_left" class="rotate" src="images/right.png" > </img>
		  	<img id="btn_right" class="rotate" src="images/left.png" > </img>
		  	</div>
		  	 <p id="rotate_title"> 1/4 Turn </p>
		  </div> <!--End of strip Method-->
		
		  </div>  <!-- End of col-md-3 -->
		  <div class=" col-md-5 col-md-offset-3"> hello </div>
		
		  </div>
		
		</div>
		</div>
		
	
		
		<!-- step3 = Name your Board -->
		<div id="step3_description" class="description" style="display:none">
		<p id="title"> colour_board </p>
			
			<div class="center_part" >
					<br/>
				<div class="row">

					<div class="col-md-4">
					<label for="inputBoardName" class="control-label">Board Name</label>
					</div>

					<div class="col-md-4">
					<input type="text" class="form-control"  id="inputboardTilte" placeholder="">
					</div>
					<br/><br/>
					<div class="col-md-12">
					<button type="button" id="setTitle" class="btn btn-default prevbutton"> Prev </button>
					</div>

					<br/>
					<br/>
					<div class="col-md-4">
					<label for="inputBoardName" class="control-label">Name</label>
					</div>

					<div class="col-md-4">
					<input type="text" class="form-control" id="inputboardDesigner" placeholder="">
					</div>
					<br/><br/>
					<div class="col-md-12">
					<button type="button" id="setDesigner" class="btn btn-default prevbutton"> Prev</button>
					</div>
					
			    </div>
				
				<h5 id="board_para"> Here is how Your Information will Appear </h5>
				<div class="row" >
				<div id="board_detail"  >
				<h2 id="board_title" class="b_title">  INSERT TEXT HERE </h2>
				<h3 id="board_designer_by" class="designed_by b_title">BY :<h3 id="board_designer" class="designed_by">  INSERT TEXT HERE </h3></h3>
				</div>	  
				</div>
				
				<div class="row" style="text-align:center">
				<button type="button" id="append_title" class="btn btn-default"> SUBMIT</button>
				</div>
		 
		</div>
		</div>
		
		
		
	<!-- Step four create Board -->
		<div id="step4_description" class="description" style="display:none">
		<p id="title"> create_board </p>
		<div class="center_part" >
		<p> Here is your final creation! You can download it,email it and even share it with friends on Facebook 
		& Twitter. </p>
        <p> You decide !</p>	
			
		<div class="row" >
		<div class="share_option">
			<div class="col-md-4 col-md-offset-1">
			<div class="sharename shadow">
			<div  class="sharebutton"> FaceBook</div>
			<img src="images/fb.png" width="100%" height:"100%" /> </div>
			</div>
			<div class="col-md-4 col-md-offset-2">
			<div class="sharename shadow">
			<div  class="sharebutton"> Twitter</div>
			<img src="images/tw.png" width="100%" height:"100%" /> </div>
			</div>
			</div> 
	    </div>
		<br/>
		<br/>
		<br/>
		<div class="row" >
		<div class="share_option">
			<div id="download" class="col-md-4 col-md-offset-1">
			<div  class="sharename shadow">
			<div class="sharebutton"> Download</div>
			<img src="images/file.png" width="100%" height:"100%" /> </div>
			</div>
			
			<div class="col-md-4 col-md-offset-2">
			<div class="sharename shadow">
			<div  class="sharebutton"> Email </div>
			<img src="images/email.png" width="100%" height:"100%" /> </div>
			</div>
		</div>
		
		</div>	
		<br/>
		<br/>
		<br/>
		</div>
		</div> <!-- end of step create-->
		
		
	</div> <!-- End of col-md-6 -->
	<div class="col-md-1" ></div>

	<div class="row">
		<div class="col-md-5 col-md-offset-1 " ></div>
		 <div  class="wizard col-md-5" >
		 		<div class="wizardbar progressbar">
					  <a  id="step1"  class="all_steps all_steps_common col-md-2 wizardbar-item current">
					    COLOR
					  </a>
					  <a  id="step2" class="all_steps all_steps_common col-md-2 col-md-offset-1 wizardbar-item " >
					    STEP
					  </a>
					  <a id="step3"  class="all_steps all_steps_common col-md-2 col-md-offset-1 wizardbar-item">
					    NAME
					  </a>
					  <a id="step4" class="all_steps all_steps_common col-md-2 col-md-offset-1 wizardbar-item" >
					    CREATE
					  </a>
				</div>



		 <!--	<div class="progressbar">	
				  <div id="step1" class="all_steps all_steps_common col-md-2 "> COLOR </div>
				  <div id="step2" class="all_steps all_steps_common col-md-2 col-md-offset-1"> SETUP </div>
				  <div id="step3" class="all_steps all_steps_common col-md-2 col-md-offset-1"> NAME </div>
				  <div id="step4" class="all_steps all_steps_common col-md-2 col-md-offset-1"> CREATE </div>
				  </div>-->
		 </div>
		 <div class="col-md-1" ></div>
	    </div>
	<div id="canvas" style="display:none">
    <p>Canvas:</p>
    </div>
    
    <div id="image" style="display:none">
        <p>Image:</p>
    </div>
 </div> <!-- container -->
 
  </body>
</html>