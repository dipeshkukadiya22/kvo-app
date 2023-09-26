
<h5>Upload the File</h5>
<hr>
<form action="{{route('store')}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="form-group row">
             <label for="Image" class="col-sm-2 col form-label" style="font-weight: bold;">Serial No</label>
              <div class="col-sm-4">
                <input type="file" class="form-control form-control-sm" name="image">
                 
              </div>
          </div> 
       
      <button type="submit" class="btn btn-primary btn-sm">Submit</button>
  </form>
