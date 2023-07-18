                          <form class="browser-default-validation" method="POST" action="{{route('room-booking')}}">
                              @csrf
                              <div class="mb-3">
                                <label class="form-label" for="basic-default-name">Name</label>
                                <input type="text" name="m_name" class="form-control" id="basic-default-name"  style="text-transform:uppercase"  placeholder="John Doe" />
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="basic-default-email">Email</label>
                                <input type="email" name="email" id="basic-default-email" class="form-control" placeholder="john.doe"/>
                              </div>
                              
  
                              <div class="mb-3">
                                <label class="form-label" for="multicol-phone">Phone Number</label>
                                <input type="number" name="phone_no" id="multicol-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" maxlength="10"  />
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="city">City</label>
                                <input type="text" name="city" class="form-control" id="city" placeholder="Bhuj" />
                              </div>
    
                              <div class="mb-3">
                                <label class="form-label" for="collapsible-address">Address</label>
                                <textarea name="collapsible_address"  class="form-control" id="collapsible_address" rows="2" placeholder="1456, Mall Road"></textarea>
                              </div>
                              
                              <div class="row">
                                <div class="col-12">
                                  <button type="submit" class="btn btn-primary mb-2 d-grid w-100" >Submit</button>
                                  <button type="button" class="btn btn-label-secondary d-grid w-100" data-bs-dismiss="offcanvas"> Cancel</button>
                                </div>
                              </div>
                            </form>