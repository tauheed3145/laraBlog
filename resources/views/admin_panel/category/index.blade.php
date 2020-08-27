@extends('admin_panel.admin_layout')

@section('css')
<link rel="stylesheet" href="dist/css/admin_custom.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Category</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#" class="btn btn-success open_modal" data-toggle="modal"  data-target="#addEmployeeModal"
                        data-action="{{ route('category.store') }}"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Category</th>
						<th>Status</th>
						
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
                    @foreach ($categories as $item)
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
					<td>{{ $item->cat_name}}</td>
					
						<td>{{ $item->staus}}</td>
						<td>
                            <a href="#" class="edit open_modal" data-toggle="modal"
                            data-target="#editEmployeeModal"
                            data-model="{{$item->id}}"
                            data-action="{{ route('category.update', $item->id) }}"
                            >
                            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                           </a>
							<a href="#" class="delete open_modal" data-toggle="modal"
							data-target="#deleteEmployeeModal"
                            data-model="{{$item->id}}"
                            data-action="{{ route('category.destroy', $item->id) }}"
							><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
                    @endforeach
					
					
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>
    </div> 
    @include('admin_panel.category.add_modal')
@include('admin_panel.category.edit_modal')
<!-- Delete Modal HTML -->

@include('admin_panel.category.delete_modal')       
</div>

@endsection
@section('script')
<script>
    $(document).ready(function(){

     
		$('.open_modal').on('click', function(){
                   
                var instance = $(this);
           		var action = instance.data("action")||instance.find("form").attr("action");
                var modalTarget=instance.data("target");

           		//console.log(modalTarget);
				   var currentRow=$(this).closest("tr");
				      
				   var col1=currentRow.find("td:eq(1)").text(); // get current row 2ndt TD value
        
                   console.log(col1);
				   $('#cat_name').val(col1);
				  $(modalTarget).find("form").attr('action', action);
        });

        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();
        
        // Select/Deselect checkboxes
        var checkbox = $('table tbody input[type="checkbox"]');
        $("#selectAll").click(function(){
            if(this.checked){
                checkbox.each(function(){
                    this.checked = true;                        
                });
            } else{
                checkbox.each(function(){
                    this.checked = false;                        
                });
            } 
        });
        checkbox.click(function(){
            if(!this.checked){
                $("#selectAll").prop("checked", false);
            } 
        });
    });
    </script>
@endsection
