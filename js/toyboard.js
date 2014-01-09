$(document).ready(function() {

	var td_width = $('td').width();
	$('.new_piece').width(td_width);
	//alert('td width is '+td_width);
	var title = $('#inputboardTilte').val();
	var designer = $('#inputboardDesigner').val();

	//wizard load

	$('.piece').draggable({

		helper : 'clone',
		revert : 'invalid',
		start : function(e, ui) {

			var td_height = $('td').height();
			ui.helper.animate({
				width : td_width,
				height : td_height
			});
			
		
		// cursorAt: {left:40, top:25}
	   }
	});

	var pieceName;
	var cloneTime;
	var decrement;
	$("td").droppable({
		activeClass : "ui-state-default",
		hoverClass : "ui-state-hover",
		tolerance : "pointer",
		accept : ".piece",
		drop : function(event, ui) {
			console.log('ID is '+getcloneIDFromRow(this.id));
			console.log('Type is '+getPieceNameFromRow(this.id));
			var td_height = $(this).height();
			var count = $(ui.draggable).attr('id');
			var duplicateID;
			var OppImagePrtialName;
			//console.log("If it has class "+$(ui.draggable).hasClass('placedpiece'));
			//This is called when already dragged piece is dragged to some other position On table
			if ($(ui.draggable).hasClass('placedpiece')) {
				console.log('Nothing HAppends'+$(ui.draggable).id);
				//Remove duplicates First
				$('.'+$(ui.draggable).attr('id')).remove();
				$(this).append($(ui.draggable).css('position', 'relative').css('top', '').css('left', ''));
				duplicateID=$(ui.draggable).attr('id');
				$('#'+$(ui.draggable).attr('id')).draggable({});
				
				//as piece is already placed , it may be present in Any Direction. find direction and placed same directional Image
				var ImageDirection = $(ui.draggable).attr('src');
				//console.log('****************************************************'+ImageDirection);
				
				OppImagePrtialName=getCorrespondingImageName(ImageDirection);
				console.log('partial name '+OppImagePrtialName);
			} else {
				
				console.log('Else HAppends');
				pieceName = getPieceNameFromRow(count);
				console.log('****************************************************'+pieceName);
				cloneTime = parseInt(getcloneTimeFromRow(count));
				console.log(count + ' , ID =' + cloneTime + ' Name ' + pieceName);
				decrement = cloneTime - 1;
				//console.log(count+'before  '+pieceName+'-'+decrement);
				//$(ui.draggable).attr('id','piece1-9');
				// alert('change ID '+count);
				$(this).append($(ui.helper).clone().attr('id', 'its-' + pieceName+'-'+cloneTime).width(td_width).height(td_height).removeClass(pieceName).addClass('placedpiece').addClass('its-' + pieceName+'-'+cloneTime).css('position', 'relative').css('top', '').css('left', ''));
				$('#its-' + pieceName+'-'+cloneTime).draggable({});
				duplicateID='its-' + pieceName+'-'+cloneTime;
				cloneLimit(cloneTime, pieceName, decrement);
				//generating Opposite Image Path
				OppImagePrtialName=pieceName+'-'+'3';

			}
			//With below function adding duplicates
			//addOppositePiece(piece type i.e r0w,opp,piece Number)
			addOppositePiece(getPieceNameFromRow(this.id),getcloneIDFromRow(this.id),duplicateID,OppImagePrtialName);
			//Check if all Pieces Placed and Next Step is Clickable
			checkAllplaced();
		}
	});
	function getCorrespondingImageName(str)
	{
		console.log('^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^'+str);
		    var new_direction;
			var pieceName=getPieceNameFromPath(str);
			var direction=parseInt(getDirectionFromPath(str));
			
			console.log(' getCorrespondingImageName Piece Name is '+pieceName);
			console.log('getCorrespondingImageName direction Name is '+direction);
			
			if(direction==3)
			{
				new_direction=1;
			}
			else if(direction==4)
			{
				new_direction=2;
			}else
			{
				new_direction=direction+2;
			}
			
			
			var OppImagePrtialName=pieceName+'-'+new_direction;
			return OppImagePrtialName;
				
	}
    function addOppositePiece(PieceNameFromRow,cloneID,duplicate,OppImagePrtialName)
    {
    var td_height = $('td').height();
    
    console.log('Height is '+td_height+' ,  width is '+td_width);
     console.log('In function Piece Name is '+PieceNameFromRow);	
     console.log('In function clone ID is '+cloneID);
     if(PieceNameFromRow=="row")
     {
     	$('#opp-'+cloneID).empty();
     	$('#opp-'+cloneID).append("<img src='images/"+OppImagePrtialName+".png' id='dup-"+duplicate+"' class='"+duplicate+"' />");
     	//.width(td_width).height(td_height)
     }
     if(PieceNameFromRow=="opp")
     {
     	$('#row-'+cloneID).empty();
     	$('#row-'+cloneID).append("<img src='images/"+OppImagePrtialName+".png' id='dup-"+duplicate+"' class='"+duplicate+"' />");
     }
    	$('.'+duplicate).width(td_width).height(td_height);
    }
	//On selection of radio Button ,step2 is selected_step and previous all are clickable
	$('#color_choice input').on('click', function() {
		alert($('input[name=optionsColor]:checked', '#color_choice').val());

		
		clearBoard();
		//when any option is selected start work on board
		$('.border_bg').css('background-image', 'url(images/border_bg.png)');
		$('.corner_piece').css('background-image', 'url(images/corner_bg.png)');
		if ($('input[name=optionsColor]:checked', '#color_choice').val() == 'option2') {
			Option2Board();
		}
		if ($('input[name=optionsColor]:checked', '#color_choice').val() == 'option1') {
			Option1Board();
		}
		$('.all_steps').removeClass('selected_step nextStep').addClass('all_steps_common');
		$('#step2').addClass('clickable').removeClass('all_steps_common').addClass('selected_step').addClass('nextStep');
		$('.description').css('display', 'none');
		$('#step2_description').css('display', 'inline');
		$(".selected_step").prevAll().addClass('clickable');

	});
	function clearBoard()
	{
		$('td').empty();
		$('td').css('background-image','url()');
		$('.drop1').attr('id','drop1-3');
		$('.drop2').attr('id','drop2-3');
		$('.drop3').attr('id','drop3-3');
		$('.drop4').attr('id','drop4-3');
		$('.fadeImg').css('display','none');
		$('.piece').css('display','block');
		//background-image: url
		$('.ramaining').text('3');
			
	}
    function Option1Board()
    {
    	$('.last_piece').css('background-image', 'url(images/white.png)');
		$('.first_piece').css('background-image', 'url(images/red.png)');
		$('.second_piece').css('background-image', 'url(images/white.png)');
		$('.second_last_piece').css('background-image', 'url(images/red.png)');
    }
     function Option2Board()
    {
    	$('.first_piece').css('background-image', 'url(images/white.png)');
		$('.last_piece').css('background-image', 'url(images/red.png)');
		$('.second_piece').css('background-image', 'url(images/red.png)');
		$('.second_last_piece').css('background-image', 'url(images/white.png)');


    }
	$('.all_steps').on('click', function() {
		//console.log('step Click'+this.id);
		if ($(this).hasClass('clickable')) {
					if(this.id=='step1')
					{
						clearBoard();
					}
					
					if(this.id=='step2')
					{
					if ($('input[name=optionsColor]:checked', '#color_choice').val() == 'option2') {
						Option2Board();
					}
					if ($('input[name=optionsColor]:checked', '#color_choice').val() == 'option1') {
						Option1Board();
					}					
														
					}
					
			console.log(this.id + 'yes it is clickable');
			$('.description').css('display', 'none');
			$('.all_steps').removeClass('selected_step nextStep').addClass('all_steps_common');
			$('#' + this.id ).removeClass('all_steps_common').addClass('selected_step nextStep');
			$('#' + this.id + '_description').css('display', 'inline');
		}
		else{
			console.log(this.id + 'you cant click');
		}

	});

});

//Board NAme Functionality
$(document).on('click', '#append_title', function() {
	var board_detail_width = $("#board_detail").width();
	var table_width = $("#topics").width();
	var placed = (table_width / 2) - (board_detail_width / 2);

	//$( "#board_detail" ).clone().attr('id', 'new_board_detail' ).appendTo('.table-responsive');
	$('#display_board').html($("#board_detail").clone());

});
$(document).on('click', '#setTitle', function() {
	var title = $('#inputboardTilte').val();
	$('#board_title').html(title);

});
$(document).on('click', '#setDesigner', function() {
	var designer = $('#inputboardDesigner').val();
	$('#board_designer').html(designer);

});

//Double click to remove Element
$(document).on('dblclick', '#topics img', function(event) {
	console.log('removed Id : ' + $(this).attr('id'));
	var removedID = $(this).attr('id');
	var pieceof = getcloneIDFromRow1(removedID);
	console.log(removedID + ' ,Corresponding Piece ID is ' + pieceof);
	//Remove this from table
	$(this).remove();

	var correspondingPieceCloned = $('.' + pieceof).attr('id');
	console.log('Corresponding ID is ' + correspondingPieceCloned);

	pieceName = getPieceNameFromRow(correspondingPieceCloned);
	cloneTime = parseInt(getcloneTimeFromRow(correspondingPieceCloned));

	console.log(correspondingPieceCloned + ' , ID =' + cloneTime + ' Name ' + pieceName);
	//Remove Duplicates from tables
	
	$('.'+$(this).attr('id')).remove();
	//After  Removing increase the corresponiding piece cout
	increment = cloneTime + 1;
	$('.' + pieceName).attr('id', pieceName + '-' + increment);

	
	if (increment > 0) {
		$('#fade-' + pieceName).remove();
		$('.' + pieceName).css('display', 'inline-block');
	}
	$('#Remaining-' + pieceName).text(increment);
});
//selectedPiece
$(document).on('click', '.piece', function(event) {
	//alert('Image click');
	$('.piece').removeClass('selectedPiece');
	$(this).addClass('selectedPiece');
	
});

$(document).on('click', '.rotate', function(event) {
	var new_directionChange;
	var selectedImagePath=$('.selectedPiece').attr('src');
	var selectedImageID=$('.selectedPiece').attr('id');
	console.log('selected Image Path is '+selectedImagePath);
	var pieceName=getPieceNameFromPath(selectedImagePath);
	var direction=parseInt(getDirectionFromPath(selectedImagePath));
	
	console.log('Piece Name is '+pieceName);
	console.log('direction Name is '+direction);
	var currentID=$(this).attr('id');
	
	//If direction is in 4 state directly set to 1
	if(direction==4)
	{   
		
		console.log('4Image is in 4rd direction');
		new_directionChange=3;
		directionChange=1;
		$('.selectedPiece').attr('src','images/'+pieceName+'-'+directionChange+'.png');
		//set corresponding Image 
		
		//rotate corresponding Image
		$('#dup-'+selectedImageID).attr('src','images/'+pieceName+'-'+new_directionChange+'.png');
		
	}
	if(direction==3)
	{   
		
		console.log('3Image is in 3rd direction');
		new_directionChange=2;
		directionChange=4;
		$('.selectedPiece').attr('src','images/'+pieceName+'-'+directionChange+'.png');
		//rotate corresponding Image
		$('#dup-'+selectedImageID).attr('src','images/'+pieceName+'-'+new_directionChange+'.png');
		
	}
	if(direction==1)
	{
		//increase direction of Image
		console.log('1Image is in * *'+direction+'** direction');
		new_directionChange=4;
		directionChange=2;
		$('.selectedPiece').attr('src','images/'+pieceName+'-'+directionChange+'.png');
		//rotate corresponding Image
		$('#dup-'+selectedImageID).attr('src','images/'+pieceName+'-'+new_directionChange+'.png');
		
	}
	if(direction==2)
	{
		//increase direction of Image
		console.log('2Image is in **'+direction+'** direction');
		new_directionChange=1;
		directionChange=3;
		$('.selectedPiece').attr('src','images/'+pieceName+'-'+directionChange+'.png');
		//rotate corresponding Image
		$('#dup-'+selectedImageID).attr('src','images/'+pieceName+'-'+new_directionChange+'.png');
		
	}
	
});


$(document).on('click', '#btn_righttt', function(event) {
	var selectedImagePath=$('.selectedPiece').attr('src');
	console.log('selected Image Path is '+selectedImagePath);
	var pieceName=getPieceNameFromPath(selectedImagePath);
	var direction=parseInt(getDirectionFromPath(selectedImagePath));
	
	console.log('Piece Name is '+pieceName);
	console.log('direction Name is '+direction);
	
	//If direction is in 4 state directly set to 1
	if(direction==1)
	{
		console.log('Image is in 3rd direction');
		directionChange=4;
		$('.selectedPiece').attr('src','images/'+pieceName+'-'+directionChange+'.png');
		
	}
	else{
		//increase direction of Image
		console.log('Image is in **'+direction+'** direction');
	
		directionChange=direction-1;
		$('.selectedPiece').attr('src','images/'+pieceName+'-'+directionChange+'.png');
		
	}
	
});

function getPieceNameFromPath(str)
{
	var getPieceName = str.substring(str.indexOf("/") + 1, str.indexOf("-"));
	return getPieceName;
}
function getDirectionFromPath(str)
{
	var getDirection = str.substring(str.indexOf("-") + 1, str.indexOf("."));
	return getDirection;
}

function checkAllplaced()
{
	    one_status=parseInt($('#Remaining-drop1').text());
		two_status=parseInt($('#Remaining-drop2').text());
		three_status=parseInt($('#Remaining-drop3').text());
		four_status=parseInt($('#Remaining-drop4').text());
		
		//if(one_status==0 && two_status==0 && three_status==0 && four_status==0)
		if(one_status==0)
		{
		console.log('All Placed');
		$(".selected_step").addClass('all_steps_common').removeClass('selected_step').removeClass('nextSteps');
		$('#step3').addClass('clickable');
		$(".selected_step").prevAll().addClass('clickable');
		
		//selected_step nextStep

		}
		else
		{
		console.log('All Not Placed');	
		}
	
}

//change ID attribute Accordingly, on last Element Hide Image
function cloneLimit(cloneTime, pieceName, decrement) {

	//console.log('stopped');
	console.log('over  ' + pieceName + '-' + decrement);
	if (cloneTime == 1) {
		//	alert('0 remains now hidding= #'+pieceName+'-'+decrement);
		// $('.'+pieceName).css('display','none');
		$('.' + pieceName).attr('id', pieceName + '-' + decrement);
		$('.' + pieceName).css('display', 'none');
		$("#caption-" + pieceName).before(" <img id='fade-" + pieceName + "'  class='fadeImg' src='images/" + pieceName + "-fade.png' alt='My Image' />");
		$('#Remaining-' + pieceName).text(decrement);
	} else {
		$('#Remaining-' + pieceName).text(decrement);
		$('.' + pieceName).attr('id', pieceName + '-' + decrement);
	}

}

function getcloneIDFromRow(str) {
	var getclonetime = str.substring(str.indexOf("-") + 1, str.length);
	return getclonetime;

}

function getcloneTimeFromRow(str) {
	var getclonetime = str.substring(str.indexOf("-") + 1, str.length);
	return getclonetime;

}

function getcloneIDFromRow1(str) {
	var getclonetime = str.substring(str.indexOf("-") + 1, str.lastIndexOf("-"));
	return getclonetime;

}

function getcloneTimeFromRow1(str) {
	var getclonetime = str.substring(str.indexOf("-") + 1, str.length);
	return getclonetime;

}

function getPieceNameFromRow(str) {
	var getPieceName = str.substring(0, str.indexOf("-"));
	return getPieceName;

}
