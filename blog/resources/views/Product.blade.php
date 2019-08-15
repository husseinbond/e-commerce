
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Attributes</a> </div>
    <h1>Products</h1>
    @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Attributes</h5>
          </div>
          <div class="widget-content nopadding">
           
              <input type="hidden" name="product_id" value="{{ $postdetail->id }}">
              <div class="control-group">
                <label class="control-label">Category Name</label>
                <label class="control-label"></label>
              </div>
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <label class="control-label">{{ $postdetail->title }}</label>
              </div>
              <div class="control-group">
                <label class="control-label">Product Code</label>
                <label class="control-label"></label>
              </div>
              <div class="control-group">
                <label class="control-label">Product Color</label>
                <label class="control-label"></label>
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                <div class="controls field_wrapper">
                  
                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Category</label>
                                    <select class="form-control" name="color[]" id="category">
                                     
                                    
                                     </div>

                                     <div class="form-group">
                                    <label for="exampleFormControlSelect1">Category</label>
                                    <select class="form-control" name="size[]" id="category">
                                     
                                  
                                     </div>

                  <input required title="Required" type="text" name="quantity[]" id="stock" placeholder="quantity" style="width:120px;">
                  <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                </div>
              </div>
             
              <div class="form-actions">
                <input type="submit" value="Add Attributes" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Attributes</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="{{ url('admin/edit-attributes/'.$postdetail->id) }}" method="post">{{ csrf_field() }}
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Attribute ID</th>
                    <th>SKU</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
              
                </tbody>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection