<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap  Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link href="css/fuelux-responsive.css" rel="stylesheet">
    <link href="css/fuelux-responsive.css" rel="stylesheet">
   
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="http://code.jquery.com/jquery-1.9.1.min.js">
   </script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.min.js">
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"> </script>
    
	
	<style>
	
	body {
		height: 100%;
		
	}
	
	#mark
	{
	  border: 1px solid black;
	}
	#toyboard
	{
		margin-top:25px !important;
	}
	 div.description {
			background-color: #F2F2F2;		  
			border: 2px solid black;
			padding:0px;
    }
    tr {
      
        height: 50px;
    }
	.table > tbody > tr > td
	{
	padding:0px !important;
	}
    table {
        height: 100%;
		width:500px;
     }
    table.fixed { table-layout:fixed; }
	table.fixed td { overflow: hidden; }
	.border_bg
	{
		background-image: url();
	}
	#title
	{
     background-color:black;
	 margin:0px !important;
	 padding:0px !important;
	 color:white;
	 text-align:right;
	}
	.drag_drop_option
	{
	display:inline-block;
	}
	#strip_method
	{
	height:20px;
	}
	td
	{
	width:50px;
	padding-right: 0px !important;
    padding-left: 0px !important;
	border:1px solid black;
	}
	.new_piece
	{
	width:50px;
	height:50px
	}
	#toyboard
	{
	margin:0px !important;
	padding:0px !important;
	}
	.navbar-brand
	{
	color:#000000 !important;
	}
	#board_detail
	{
	font-family:Courier New Bold;
	text-align:center;
	}
	.designed_by
	{
	display:inline
	}
	.col-centered
	{
    float: none;
    margin: 0 auto;
	}
	.fadeImg
	{
		opacity:0.3;

	}
	.all_steps
	{
	background: #D63434;
	opacity:0.6;
	}
	.chevron
	 {
	position: absolute;
	top: 0;
	right: -14px;
	z-index: 1;
	display: block;
	border: 10px solid transparent;
	border-right: 0;
	border-left: 14px solid #D63434;
	}
	.nextStep
	{
		opacity:1 !important;
	}
	</style>
	<script>
	$(document).ready(function()
	{
		
	var td_width=$('td').width();
	$('.new_piece').width(td_width);
	//alert('td width is '+td_width);
	var title=$('#inputboardTilte').val();
	var designer=$('#inputboardDesigner').val();
	
	//wizard load
	
	
	$('.piece').draggable({

	  helper: 'clone',
	  revert: 'invalid',
      start: function (e, ui) {
		
	  var td_height=$('td').height();
        ui.helper.animate({
            width: td_width,
            height: td_height
        });
    },
   // cursorAt: {left:40, top:25}
		
	});
	
	var pieceName;
	var cloneTime;
	var decrement;
	 $( "td" ).droppable({
	   activeClass: "ui-state-default",
       hoverClass: "ui-state-hover",
	   tolerance: "pointer",
	   accept: ".piece",
	  drop: function(event, ui) {
	   var td_height=$(this).height();
	   var count=$(ui.draggable).attr('id');
	   //console.log("If it has class "+$(ui.draggable).hasClass('placedpiece'));
	   if($(ui.draggable).hasClass('placedpiece'))
	   {	
	  console.log('Nothing HAppends'); 	 
	   $(this).append($(ui.draggable).css('position','relative').css('top','').css('left',''));
	    
		}else
		{
	  pieceName=getPieceNameFromRow(count);
	  cloneTime=parseInt(getcloneTimeFromRow(count));
	  console.log(count+' , ID ='+cloneTime+' Name '+pieceName);
	  decrement=cloneTime-1;
	  //console.log(count+'before  '+pieceName+'-'+decrement);
	  //$(ui.draggable).attr('id','piece1-9');
	  // alert('change ID '+count);
      $(this).append($(ui.helper).clone().attr('id','its-'+pieceName).width(td_width).height(td_height).removeClass(pieceName).addClass('placedpiece').css('position','relative').css('top','').css('left',''));
      $('#its-'+pieceName).draggable({});
      cloneLimit(cloneTime,pieceName,decrement); 	
			
			
		}
	  }
	
    });
	
	$('#color_choice input').on('change', function() {
	   alert($('input[name=optionsColor]:checked', '#color_choice').val()); 
	   $('#step2').addClass('nextStep');
	});
	
	
	
	
	});
	
	//Board NAme Functionality
	$(document).on('click','#append_title',function()
	{
	var board_detail_width=$( "#board_detail" ).width();
	var table_width=$("#topics").width();
	var placed=(table_width/2)-(board_detail_width/2);
	
	//$( "#board_detail" ).clone().attr('id', 'new_board_detail' ).appendTo('.table-responsive');
	$('#display_board').html($( "#board_detail" ).clone());
	
	});
	$(document).on('click','#setTitle',function()
	{
		var title=$('#inputboardTilte').val();
		$('#board_title').html(title);
	
	});
	$(document).on('click','#setDesigner',function()
	{
		var designer=$('#inputboardDesigner').val();
		$('#board_designer').html(designer);
	
	});
	
	
	
	
	//Double click to remove Element
	$(document).on('dblclick','#topics img', function(event) {
	console.log('removed Id : '+$(this).attr('id'));
	var removedID=$(this).attr('id');
	var pieceof=getcloneIDFromRow(removedID);
	console.log(removedID+' ,Corresponding Piece ID is '+pieceof);
	$(this).remove();
	
	var correspondingPieceCloned=$('.'+pieceof).attr('id');
	
	console.log('Corresponding ID is '+correspondingPieceCloned);
	
	
	 pieceName=getPieceNameFromRow(correspondingPieceCloned);
	 cloneTime=parseInt(getcloneTimeFromRow(correspondingPieceCloned));
	 
	 console.log(correspondingPieceCloned+' , ID ='+cloneTime+' Name '+pieceName);
	 increment=cloneTime+1;
	 $( '.'+pieceName ).attr('id',pieceName+'-'+increment);
	 
	 if(increment>0)
	 {
	 $( '#fade-'+pieceName ).remove();	
	 $( '.'+pieceName ).css('display','inline-block');
	 }
	  $( '#Remaining-'+pieceName ).text(increment);
    });
	
	//change ID attribute Accordingly, on last Element Hide Image
	function cloneLimit(cloneTime,pieceName,decrement)
	{
	
	 //console.log('stopped');
	 console.log('over  '+pieceName+'-'+decrement);
	     if(cloneTime==1)
	   {
	   //	alert('0 remains now hidding= #'+pieceName+'-'+decrement);
	  // $('.'+pieceName).css('display','none');
	  $( '.'+pieceName ).attr('id',pieceName+'-'+decrement);
	  $( '.'+pieceName ).css('display','none');
	  $( "#caption-"+pieceName ).before( " <img id='fade-"+pieceName+"'  class='fadeImg' src='images/Chrysanthemum.jpg' alt='My Image' />" );
	  $( '#Remaining-'+pieceName ).text(decrement);
	   }
	   else
	   {
	   	  $( '#Remaining-'+pieceName ).text(decrement);
	    $( '.'+pieceName ).attr('id',pieceName+'-'+decrement);
	   }	
		
	}
	
	function getcloneIDFromRow(str)
	{
	var getclonetime = str.substring(str.indexOf("-") + 1, str.length);
	return getclonetime;
	
	}
	function getcloneTimeFromRow(str)
	{
	var getclonetime = str.substring(str.indexOf("-") + 1, str.length);
	return getclonetime;
	
	}
	function getPieceNameFromRow(str)
	{
	var getPieceName= str.substring(0,str.indexOf("-"));
	return getPieceName;
	
	}
		
	</script>
  </head>
  <body>
  <div class="container">
	<!--<button id="help" class="btn btn-default btn-lg dropdown-toggle" type="button" data-toggle="dropdown">
    Help button 
    </button>-->
	
	 <br/>
	 <br/>
	<div class="row">
		<div id="toyboard" class="col-md-6">
		<div class="table-responsive">
		 <table class="table fixed" id="topics">
          <tbody>
            <tr class="row">
			    <td class="col-md-1 droppable border_bg" >    </td><td class="col-md-1 droppable border_bg" >   </td> <td class="col-md-1 droppable">    </td><td  class="col-md-1 droppable">    </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable">   </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable">    </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable border_bg" >    </td>
		    </tr>
			  <tr class="row">
			      <td class="col-md-1 droppable border_bg" >    </td><td class="col-md-1 droppable border_bg" >   </td> <td class="col-md-1 droppable">    </td><td  class="col-md-1 droppable">    </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable">   </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable">    </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable border_bg" >    </td>
		    </tr>
			  <tr class="row">
			     <td class="col-md-1 droppable border_bg" >    </td><td class="col-md-1 droppable border_bg" >   </td> <td class="col-md-1 droppable">    </td><td  class="col-md-1 droppable">    </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable">   </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable">    </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable border_bg" >    </td>
		    </tr>
			  <tr class="row">
			      <td class="col-md-1 droppable border_bg" >    </td><td class="col-md-1 droppable border_bg" >   </td> <td class="col-md-1 droppable">    </td><td  class="col-md-1 droppable">    </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable">   </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable">    </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable border_bg" >    </td>
		    </tr>
			  <tr class="row">
			      <td class="col-md-1 droppable border_bg" >    </td><td class="col-md-1 droppable border_bg" >   </td> <td class="col-md-1 droppable">    </td><td  class="col-md-1 droppable">    </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable">   </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable">    </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable border_bg" >    </td>
		    </tr>
			  <tr class="row">
			      <td class="col-md-1 droppable border_bg" >    </td><td class="col-md-1 droppable border_bg" >   </td> <td class="col-md-1 droppable">    </td><td  class="col-md-1 droppable">    </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable">   </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable">    </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable border_bg" >    </td>
		    </tr>
			  <tr class="row">
			      <td class="col-md-1 droppable border_bg" >    </td><td class="col-md-1 droppable border_bg" >   </td> <td class="col-md-1 droppable">    </td><td  class="col-md-1 droppable">    </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable">   </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable">    </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable border_bg" >    </td>
		    </tr>
			  <tr class="row">
			      <td class="col-md-1 droppable border_bg" >    </td><td class="col-md-1 droppable border_bg" >   </td> <td class="col-md-1 droppable">    </td><td  class="col-md-1 droppable">    </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable">   </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable">    </td> <td class="col-md-1 droppable">    </td><td class="col-md-1 droppable border_bg" >    </td>
		    </tr>     

		  </tbody>
        </table>
		<div id="display_board"></div>
				<!--<div class="row" >
					<div id="board_detail"  >
					<h1 id="board_title">  Setup one  </h1>
					<h3 id="board_designer_by" class="designed_by">BY :<h3 id="board_designer" class="designed_by"> Anam </h3></h3>
					</div>	  
				</div>-->
	
 		</div><!--Class responsive ends -->
		</div>
		
		
		<!-- Description Div  -->
		<div class="col-md-6" id="setup_description" class="description" style="display: none">
		<p id="title"> SETUP BOARD </p>
		<p>Click and Drag Piece on the board to theleft. Release the Click to Drop the piece on the desired spot.For every Piece you choose
		there will be automatically corresponding piece from the opposing color.  </p>
		
		<div class="row">
		  <div class=" col-xs-3">
			<div id="thumb1" class="thumbnail">
			  <img id="drop1-3" class="drop1 piece ui-widget-content" src="images/drop1.png" alt="My Image" />
			  <div id="caption-drop1" class="caption">
				
				<p id="Remaining-drop1">3</p>
			  </div>
			</div>
		  </div>

		  <div class="col-xs-3">
			<div class="thumbnail">
			  <img id="drop2-3" class="drop2 piece ui-widget-content" src="images/drop2.png" alt="My Image" />
			  <div id="caption-drop2" class="caption">
				
				<p id="Remaining-drop2">3</p>
			  </div>
			</div>
		  </div>

		  <div class="col-xs-3">
			<div class="thumbnail">
			  <img id="drop3-3" class="drop3 piece ui-widget-content" src="images/drop3.png" alt="My Image" />
			  <div id="caption-drop3" class="caption">
				
				<p id="Remaining-drop3">3</p>
			  </div>
			</div>
		  </div>
		
		
		  <div class="col-xs-3">
			<div class="thumbnail">
			  <img id="drop4-3" class="drop4 piece ui-widget-content" src="images/drop4.png" alt="My Image" />
			  <div id="caption-drop4" class="caption">
				
				<p id="Remaining-drop4">3</p>
			  </div>
			</div>
		  </div>
		</div>
		
		
		<p> you will be given an option to rotate your Piece One it is placed on the board as well as drag it to a new Place</p>
		
		<div class="row">
		  <div id="strip_method" class=" col-xs-6 col-xs-offset-1"> <img  src="images/Chrysanthemum.jpg" style="height:100%;width:100%"> </img> </div>
		  <div class=" col-xs-4"> hello </div>
		  </div>
		
		
		<div class="row">
		  <div  class=" col-xs-3 "> COLOR </div>
		  <div  class=" col-xs-3 "> SETUP </div>
		  <div  class=" col-xs-3 "> NAME </div>
		  <div  class=" col-xs-3 "> CREATE </div>
	
		  </div>
		</div>
		
		<!-- choose-color Div  -->
		<div class="col-md-6" id="setup_description" class="description"  style="display: none">
		<p id="title"> colour_board </p>
		<br/>
		<p>Choose what colour you want to be this will determine the direction of the board.  </p>
		<form id="color_choice">
		<div class="row">		  
		  <div class="col-md-4 col-md-offset-1">
			<div class="thumbnail">
			  <img id="color1" class="colorchoice " src="images/color1.png" alt="My Image" />
			  <div id="colorID" class="caption" class="text-center">
			  	<div class="radio">
				  <label>
				    <input type="radio" name="optionsColor" id="optionsRadios1" value="option1" >
				  </label>
				</div>
			  </div>
			</div>
		  </div>
		
		 <div class="col-md-4 col-md-offset-2">
			<div class="thumbnail">
			  <img id="color1" class="colorchoice " src="images/color2.png" alt="My Image" />
			  <div id="colorID" class="caption" class="text-center">
			  	<div class="radio">
				  <label>
				    <input type="radio" name="optionsColor" id="optionsRadios2" value="option2" >
				  </label>
				</div>
			  </div>
			</div>
		  </div>
		  </form>
		  
		 <div class="col-md-1 col-md-offset-1"></div>
		</div>
		
			<!--<div id="MyWizard" class="wizard">
				<ul class="steps">
					<li data-target="#step1" class="active"><span class="badge badge-info">1</span>Step 1<span class="chevron"></span></li>
					<li data-target="#step2"><span class="badge">2</span>Step 2<span class="chevron"></span></li>
					<li data-target="#step3"><span class="badge">3</span>Step 3<span class="chevron"></span></li>
					<li data-target="#step4"><span class="badge">4</span>Step 4<span class="chevron"></span></li>
					<li data-target="#step5"><span class="badge">5</span>Step 5<span class="chevron"></span></li>
				</ul>
			
			</div>-->
		<br/>
				<div class="row">
				  <div id="step1" class="all_steps col-md-2 "> COLOR <span class="chevron"></span></div>
				  <div id="step2" class="all_steps col-md-2 col-md-offset-1"> SETUP <span class="chevron"></span></div>
				  <div id="step3" class="all_steps col-md-2 col-md-offset-1"> NAME <span class="chevron"></span></div>
				  <div id="step4" class="all_steps col-md-2 col-md-offset-1"> CREATE <span class="chevron"></span></div>
			
				  </div>
			
		</div> <!-- Color Setup -->
		
		<!--Name your Board -->
		<div class="col-md-6" id="setup_description" class="description"  >
		<p id="title"> colour_board </p>
			
			<form class="form-horizontal" role="form">
			
				  <div class="form-group">
					<label for="inputBoardName" class="col-lg-2 control-label">Board Name</label>
					<div class="col-lg-10">
					  <input type="text" class="form-control" id="inputboardTilte" placeholder="Insert Text Here">
					</div>
				  </div>
				  
				   <div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
					 <button type="button" id="setTitle"  class="btn btn-success">PREV</button>
					</div>
				  </div>
				  
				  <div class="form-group">
					<label for="inputName" class="col-lg-2 control-label">Name</label>
					<div class="col-lg-10">
					  <input type="text" class="form-control" id="inputboardDesigner" placeholder="Insert Text Here">
					</div>
				  </div>
				
				  <div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
					  <button type="button" id="setDesigner"  class="btn btn-success">PREV</button>
					</div>
				  </div>
				</form>
				
				<h5> Here is how Your Information will Appear </h5>
				<div class="row" >
				<div id="board_detail"  >
				<h1 id="board_title">  Insert Text Here  </h1>
				<h3 id="board_designer_by" class="designed_by">BY :<h3 id="board_designer" class="designed_by"> Insert Text Here </h3></h3>
				</div>	  
				</div>
				
				<div class="row" style="text-align:center">
						  <button id="append_title" type="submit" class="btn btn-default">SUBMIT</button>
				</div>
				<div class="row">
				  <div id="step1" class="all_steps col-md-2 "> COLOR <span class="chevron"></span></div>
				  <div id="step2" class="all_steps col-md-2 col-md-offset-1"> SETUP <span class="chevron"></span></div>
				  <div id="step3" class="all_steps col-md-2 col-md-offset-1"> NAME <span class="chevron"></span></div>
				  <div id="step4" class="all_steps col-md-2 col-md-offset-1"> CREATE <span class="chevron"></span></div>
			
				  </div>
		</div>
		
		
		
		
	</div>
	
 </div> <!-- container -->
 
 
 
  </body>
</html>