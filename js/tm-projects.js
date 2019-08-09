$(document).ready(function(){
// id of this clicked btn
var btn;
var btnId;
// class of this clicked btn
var btnClass;
var btnOffset;
// direction of moving elements
var direction;
// neighbor branch
var neighborB;
// neighbor branch position
var neighborBP;
// whole string of neighbor branch value
var neighborBranchTV;
// neighbor branch total height
var neighborBTH = 0;
// offset().top of neighbor branch elements
var oTopNHEls = 0;
// offset().top of this branch elements
var oTopTHEls;
var thisPosition;
var thisBranch;
// whole string of this branch value
var thisBranchTV;
// this branch total height
var tBTH;
// position of element in branch
var tBrPos;
var thisParentBranch;
var thisNewOffsetTop;
// decrease branch position
function decrBP(bp){
	var brPos = bp;
	brPos-=1;
	return brPos;
}

// increase branch position okey
function incrBP(bp){
	var brPos = bp;
	brPos+=1;
	return brPos;
}



$('.tm-projects').each(function(){
		$(this).mouseover(function(){
			var branch = $(this).attr('class').split(/(\s+)/)[0];
			
$('[class^="' + branch).each(function(){
	$(this).css('background', 'rgb(200, 202, 199)');
});	
});

	$(this).mouseout(function(){
			var branch = $(this).attr('class').split(/(\s+)/)[0];
			
$('[class^="' + branch).each(function(){
	$(this).css('background', 'rgb(238, 252, 238)');
});	
});
});



$('span[id^="arr_').click(function(){
	btn = $(this);
	btnId = $(this).attr('id');
	//btnClass = $(this).attr('class');
	btnOffset = btn.offset();
	
	direction = btn.attr('id').split('_');
	direction = direction[1];
	
	thisBranch = btn.attr('id').substring(9);
	thisBranchTV = btnClass;
	var branchesArr = thisBranch.split('-');
	console.log('branchesArr' + branchesArr);
	var thisPosition = branchesArr[branchesArr.length-2];
	console.log('thisPosition' + thisPosition);
	console.log('thisBranch' + thisBranch);
	var thisParentBranchArr = thisBranch.split('-');
	thisParentBranchArr.splice(thisParentBranchArr.length-2, 2);
	
	thisParentBranch = thisParentBranchArr.join('-');
	thisParentBranch = thisParentBranchArr + "-";
	console.log('thisParentBranch' + thisParentBranch);
	var btnParentDiv = $('.' + thisBranch + ' tm-projects');
	tBrPos = thisPosition;
	
	if(direction == 'toup'){
		neighborBP = tBrPos-1;
		$('div[class^="' + thisBranch).each(function(){
			var elementOffsetTop = $(this).offset().top;
			var elementOuterHeight = $(this).outerHeight();
			var elementHeight = $(this).height();
			var thisClass = $(this).attr('class');
			var thisBrPos = $(this).attr('data-br-pos');
			thisBrPos++;
			var thisNewClass = thisClass.replace(thisBranch, thisParentBranch + neighborBP + '-');
			thisNewClass = 'temp' + thisNewClass;
			$(this).offset({top: elementOffsetTop-elementOuterHeight*0.9});
			thisNewOffsetTop = $(this).offset().top;
			$(this).attr('class', thisNewClass);
			$(this).attr('data-br-pos', neighborBP);
			//hgjkh
		});
		
		$('span[id^=arr_').each(function(){
			var thisButtonId = $(this).attr('id');
			var re = new RegExp(thisBranch, "g");
			if(re.test(thisButtonId)){
				console.log('this ok');
				var thisButtonNewId = thisButtonId.replace(thisBranch, thisParentBranch + neighborBP + '-');
				$(this).attr('id', 'temp' + thisButtonNewId);
			}
		});
		
		$('div[class^="' + thisParentBranch + neighborBP + "-").each(function(){			
			neighborB = thisParentBranch + neighborBP + '-';
			neighborBTH+= $(this).height();
			var neighborHeight = $(this).height();
			var neighborOuterHeight = $(this).outerHeight();
			var oldOffsetTop = $(this).offset().top;
			var thisNeighborClass = $(this).attr('class');
			var thisNeighborNewClass = thisNeighborClass.replace(neighborB, thisParentBranch + tBrPos + '-');
			$(this).attr('class', thisNeighborNewClass);
			$(this).attr('data-br-pos', tBrPos);
			console.log('neighborHeight' + neighborHeight);
			console.log(neighborHeight);
			console.log('neighborOuterHeight---' + neighborOuterHeight);
			console.log('neighborOffsetsSummary---' + (oldOffsetTop+neighborOuterHeight+neighborHeight));
			$(this).offset({top: thisNewOffsetTop+(neighborOuterHeight*0.9)});
			console.log($(this).offset().top);			
		});
		
		$('span[id^=arr_').each(function(){
			var thisId = $(this).attr('id');
			var branch = thisParentBranch + neighborBP + "-";
			var regexp = new RegExp(branch);
			var temp = new RegExp('temp');
			console.log('prepareBranchForSearchNeighborButton---' + branch);
			if(thisId.match(regexp)){
				console.log('matched');
				if(!thisId.match(temp)){
					var newId = thisId.replace(branch, thisParentBranch + tBrPos + "-");
					$(this).attr('id', newId);
				}
			}
		});
		$('[id^=temp').each(function(){
			var thisId = $(this).attr('id');
				var idWithoutTemp = thisId.replace('temp', '');
				$(this).attr('id', idWithoutTemp);
		});
		$('[class^=temp').each(function(){
			var thisClass = $(this).attr('class');
				var classWithoutTemp = thisClass.replace('temp', '');
				$(this).attr('class', classWithoutTemp);
		});
	
	$.ajax({
		data:({
			thisEl: thisBranch,
			neighbor: neighborBranch,
			up: 1
			}),
		url: '<?php echo Yii::app()->getRequest()->getUrl(); ?>',
		type: "POST",
		dataType: "json",
		success: function(){
			$('#rld').click();
		}
	});
	
	}	
	else if(direction == 'down'){
		neighborBP = tBrPos+1;
		//
		$('div[class^="' + thisParentBranch).each(function(){
		if(parseInt($(this).attr('data-br-pos')) == neighborBP 
			&& $(this).attr('class').length == btnClass.length+11){
			
			neighborB = $(this).attr('class').substring(0,$(this).attr('class').length-17);
			neighborBranchTV = $(this).attr('class').substring(0,$(this).attr('class').length-11);

			tBTH = 0;
			$('div[class^="' + neighborB).each(function(){
				neighborBTH+= $(this).height();
				neighborBTH+=23;
			});
		
			}
	});
	
	$('div[class^="' + thisBranchTV).each(function(){
			var sc = $(this).attr('class');
			sc = sc.split(' ');
			sc = sc[0].split('-');
			sc = sc[sc.length-1];
			// decrease branch position
			var lessScInt = incrBP(parseInt(sc));
			
			// attr class without position
			var withOutPosition = $(this).attr('class').substring(0,$(this).attr('class').length-17);
			var newClass = withOutPosition + '--' + getFBP(lessScInt);
			
			$(this).attr('class', newClass + ' pages-tree');
			
		
			
		});
		
		$('[class="' + thisBranchTV).each(function(){
			var osc = $(this).attr('class');
			osc = osc.split(' ');
			osc = osc[0].split('-');
			osc = osc[osc.length-1];
			// decrease branch position
			var olessScInt = incrBP(parseInt(osc));
			console.log('lessScInt--' + olessScInt);
			// attr class without position
			var owithOutPosition = $(this).attr('class').substring(0,$(this).attr('class').length-6);
			var onewClass = owithOutPosition + '--' + getFBP(olessScInt);
			
			$(this).attr('class', onewClass);
			
		});
		
		$('div[class^="' + neighborBranchTV).each(function(){
			var sc = $(this).attr('class');
			sc = sc.split(' ');
			sc = sc[0].split('-');
			sc = sc[sc.length-1];
			// decrease branch position
			var lessScInt = decrBP(parseInt(sc));
			
			// attr class without position
			var withOutPosition = $(this).attr('class').substring(0,$(this).attr('class').length-17);
			var newClass = withOutPosition + '--' + getFBP(lessScInt);
			
			$(this).attr('class', newClass + ' pages-tree');
			
		
			
		});
		
		$('[class="' + neighborBranchTV).each(function(){
			var osc = $(this).attr('class');
			osc = osc.split(' ');
			osc = osc[0].split('-');
			osc = osc[osc.length-1];
			// decrease branch position
			var olessScInt = decrBP(parseInt(osc));
			
			// attr class without position
			var owithOutPosition = $(this).attr('class').substring(0,$(this).attr('class').length-6);
			var onewClass = owithOutPosition + '--' + getFBP(olessScInt);
			
			$(this).attr('class', onewClass);
			
		});
	
	$('div[class^="' + thisBranch).each(function(){
		oTopTHEls = $(this).offset().top;
		$(this).offset({top: oTopTHEls+=neighborBTH});
		
		tBTH+= $(this).height();
				tBTH+=23;
			
});
	
	$('div[class^="' + neighborB).each(function(){
				oTopNHEls = $(this).offset().top;
				$(this).offset({top: oTopNHEls-=tBTH});
				
		
			});
	$.ajax({
		data:({
			thisEl: thisBranchTV,
			neighbor: neighborBranchTV,
			up: 2
			}),
		url: 'ajax',
		type: "POST",
		dataType: "json"
	});
	$('#rld').click();
}
});	
});
