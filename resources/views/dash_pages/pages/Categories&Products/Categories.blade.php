@extends('layouts.dashboard.master')
 @section('content')
 <div class="content-wrapper">
    @if (count($errors) > 0)

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>
   
@endif
@if(Session::get('message'))
<div class="alert alert-success">
<strong>
{{Session::get('message')}}
</strong>
</div>
@endif
    {{-- start modal to add users --}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal" >
    <b> Add a new Category</b>
   </button>
   
   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
         <form action="{{route('AddCategory')}}" method="post" enctype="multipart/form-data" >
          @csrf
             <div class="form-group">
                 <label for="cc-name" class="control-label mb-1">Name</label>
                 <input id="cc-name"  type="text" class="form-control name" aria-required="true" aria-invalid="false" name="name">
             </div>
             <div class="form-group">
                  <label for="tectarea">Description</label>
                  <textarea class="form-control" id="textarea" rows="3" name="description"></textarea>
                </div>
             <div class="form-group">
                    <label for="status">select status</label>
                    <select class="form-control" id="status" name="status" >   
                         <option value="0">0</option>
                         <option value="1">1</option>
                    </select>
                </div>         

         <div class="form-group">
            <label for="cc-image" class="control-label mb-1">Image</label>
            <input id="cc-name"  type="file" class="form-control " name="image">
        </div>
        <input type="submit" class="btn btn-primary" value="Save"> 
      </form>

        </div>

            
         </div>
         <div class="modal-footer">
         </div>
       </div>
     </div>
    <h2>Select Number Of Categories</h2>
    <div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
      <select class  ="form-control" name="state" id="maxRows">
        <option value="5000">Show ALL Rows</option>
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
        <option value="50">50</option>
        <option value="70">70</option>
        <option value="100">100</option>
       </select>
      
     </div>


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
  <td style="width:300px;">{{$item->description}}</td>
  <td>
    @if($item->status == 0 )
      OFF 
    @else
      <strong>ON</strong>
    @endif
    </td>
  <td ><img src="/img/category-img/{{$item->image}}" style="width:150px;height:100px;" alt=""></td>
  <td class="d-flex"> 
     <a style="width:70px;" href="{{route('EditeCategory' , $item->id)}}" class="btn btn-primary">Edit</a>
     &nbsp;
     <form method="POST" action="{{route('category.destroy' ,$item->id)}}">
        {{ @csrf_field() }}
        {{ method_field('DELETE') }}
          <input style="width:70px;" type="submit" class="btn btn-danger" value="Delete "></form>
</tr>
@endforeach

</table>

<!--		Start Pagination -->


<div class='pagination-container'>
    <nav style="text-align:center">
      <ul class="pagination justify-content-center">
        
        <li data-page="prev" class="page-item">
                 <span class="page-link"> < <span class="sr-only">(current)</span></span>
                </li>
       <!--	Here the JS Function Will Add the Rows -->
    <li data-page="next" id="prev">
                   <span class="page-link"> > <span class="sr-only">(current)</span></span>
                </li>
      </ul>
    </nav>
  </div>

</div> <!-- 		End of Container -->



<!--  Developed By Yasser Mas -->
@endsection
@section('script')
@endsection