

<form class="browser-default-validation" method="POST" action="{{route('room-booking')}}">
  @csrf
  <div class="mb-3">
    <label class="form-label" for="basic-default-name">Name</label>
    <input type="text" name="m_name" class="form-control" id="basic-default-name"  style="text-transform:uppercase"  placeholder="John Doe" required/>
  </div>

  <div class="mb-3">
    <label class="form-label" for="multicol-phone"><span class="required">Phone Number</span></label>
    <input type="text" name="phone_no" id="multicol-phone" class="form-control phone-mask" placeholder="658 799 8941" minlength="10" maxlength="10"
                            
                              oninput="numberOnly(this.id);"   required/>
                              <div id="error" class="error-message" ></div>
  </div>
  <div class="mb-3">
    <label class="form-label" for="basic-default-email">Email</label>
    <input type="email" name="email" id="basic-default-email" class="form-control" placeholder="john.doe" required/>
  </div>
  
  <div class="mb-3">
    <label class="form-label" for="city">City</label>
    <input type="text" name="city" class="form-control" id="city"  style="text-transform:uppercase" placeholder="Bhuj" required />
  </div>

 

  
  <div class="row">
    <div class="col-12">
      <button type="submit" id="submitbtn" class="btn btn-primary mb-2 d-grid w-100" >Submit</button>
      <button type="button"  class="btn btn-label-secondary d-grid w-100" data-bs-dismiss="offcanvas"> Cancel</button>
    </div>
  </div>
</form>
<script>
function numberOnly(id) {
    var element = document.getElementById(id);
    element.value = element.value.replace(/[^0-9]/gi, "");
}
</script>

