@extends('layouts.dashboard.master')
 @section('content')
 <div class="content-wrapper">
  
<table class="table table-striped table-class" id= "table-id">
<tr>
  <th>Id</th>
  <th>Name</th>
  <th>Description</th>
  <th>status</th>
  <th>Image</th>
  <th>Control</th>

  </tr>
@foreach ($Categories as $item)
    

<tr>
  <td>{{$item->id}}</td>
  <td>{{$item->name}}</td>
  <td>{{$item->description}}</td>
  <td>{{$item->status}}</td>
  <td>{{$item->image}}</td>
  <td>  <a href="#" class="btn btn-primary">Edit</a>
    <a href="#" class="btn btn-danger">Delete</a></td>
</tr>
@endforeach

</table>

<!--		Start Pagination -->
    <div class='pagination-container' >
      <nav>
        <ul class="pagination">
          
          <li data-page="prev" >
                   <span> < <span class="sr-only">(current)</span></span>
                  </li>
         <!--	Here the JS Function Will Add the Rows -->
      <li data-page="next" id="prev">
                     <span> > <span class="sr-only">(current)</span></span>
                  </li>
        </ul>
      </nav>
    </div>

</div> <!-- 		End of Container -->



<!--  Developed By Yasser Mas -->
@endsection
@section('script')
getPagination('#table-id');
//getPagination('.table-class');
//getPagination('table');

/*					PAGINATION 
- on change max rows select options fade out all rows gt option value mx = 5
- append pagination list as per numbers of rows / max rows option (20row/5= 4pages )
- each pagination li on click -> fade out all tr gt max rows * li num and (5*pagenum 2 = 10 rows)
- fade out all tr lt max rows * li num - max rows ((5*pagenum 2 = 10) - 5)
- fade in all tr between (maxRows*PageNum) and (maxRows*pageNum)- MaxRows 
*/

function getPagination (table){

  var lastPage = 1 ; 

$('#maxRows').on('change',function(evt){
//$('.paginationprev').html('');						// reset pagination 


lastPage = 1 ; 
$('.pagination').find("li").slice(1, -1).remove();
var trnum = 0 ;									// reset tr counter 
var maxRows = parseInt($(this).val());			// get Max Rows from select option

if(maxRows == 5000 ){

$('.pagination').hide();
}else {

$('.pagination').show();
}

var totalRows = $(table+' tbody tr').length;		// numbers of rows 
$(table+' tr:gt(0)').each(function(){			// each TR in  table and not the header
trnum++;									// Start Counter 
if (trnum > maxRows ){						// if tr number gt maxRows
 
 $(this).hide();							// fade it out 
}if (trnum <= maxRows ){$(this).show();}// else fade in Important in case if it ..
});											//  was fade out to fade it in 
if (totalRows > maxRows){						// if tr total rows gt max rows option
var pagenum = Math.ceil(totalRows/maxRows);	// ceil total(rows/maxrows) to get ..  
                     //	numbers of pages 
for (var i = 1; i <= pagenum ;){			// for each page append pagination li 
$('.pagination #prev').before('<li data-page="'+i+'">\
            <span>'+ i++ +'<span class="sr-only">(current)</span></span>\
          </li>').show();
}											// end for i 
} 												// end if row count > max rows
$('.pagination [data-page="1"]').addClass('active'); // add active class to the first li 
$('.pagination li').on('click',function(evt){		// on click each page
evt.stopImmediatePropagation();
evt.preventDefault();
var pageNum = $(this).attr('data-page');	// get it's number

var maxRows = parseInt($('#maxRows').val());			// get Max Rows from select option

if(pageNum == "prev" ){
if(lastPage == 1 ){return;}
pageNum  = --lastPage ; 
}
if(pageNum == "next" ){
if(lastPage == ($('.pagination li').length -2) ){return;}
pageNum  = ++lastPage ; 
}

lastPage = pageNum ;
var trIndex = 0 ;							// reset tr counter
$('.pagination li').removeClass('active');	// remove active class from all li 
$('.pagination [data-page="'+lastPage+'"]').addClass('active');// add active class to the clicked 
// $(this).addClass('active');					// add active class to the clicked 
$(table+' tr:gt(0)').each(function(){		// each tr in table not the header
 trIndex++;								// tr index counter 
 // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
 if (trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
   $(this).hide();		
 }else {$(this).show();} 				//else fade in 
}); 										// end of for each tr in table
});										// end of on click pagination list

}).val(5).change();

              // end of on select change 



      // END OF PAGINATION 
}	








@endsection