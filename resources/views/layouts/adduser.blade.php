    <form class="browser-default-validation" method="POST" tabindex="1" action="{{route('room-booking')}}">
      @csrf
        <div class="mb-3">
          <label class="form-label required" for="basic-default-name"  >Name</label>
          <input type="text" name="m_name" class="form-control" style="text-transform:uppercase" id="basic-default-name"  style="text-transform:uppercase"  placeholder="Name" required />
        </div>
        
        <div class="mb-3">
          <label class="form-label" for="multicol-phone">Phone Number</label>
          <input type="number" name="phone_no" id="multicol-phone" class="form-control phone-mask" placeholder="658 799 8941"  maxlength="10" required oninput="javascript: if (this.value.length > 10) this.value = this.value.slice(0, 10);"/>
        </div>

        <div class="mb-3">
                  <label class="form-label" for="basic-default-email">Email</label>
                  <input type="email" name="email" id="basic-default-email" class="form-control" placeholder="Email" required/>
              </div>
        <div class="mb-3">
          <label class="form-label" for="city">City</label>
          <input type="text" name="city" class="form-control" id="city" style="text-transform:uppercase" placeholder="Bhuj" required/>
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary mb-2 d-grid w-100" id="submitbtn" >Submit</button>
            <button type="button" class="btn btn-label-secondary d-grid w-100" data-bs-dismiss="offcanvas"> Cancel</button>
          </div>
        </div>
      </form>
                           