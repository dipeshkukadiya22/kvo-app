<form class="browser-default-validation">
    <div class="mb-3">
      <label class="form-label" for="basic-default-name">Name</label>
      <input
        type="text"
        class="form-control"
        id="basic-default-name"
        placeholder="John Doe"
        required />
    </div>

    <div class="mb-3">
      <label class="form-label" for="multicol-phone">Phone Number</label>
      <input
        type="number"
        id="multicol-phone"
        class="form-control phone-mask"
        placeholder="658 799 8941"
        aria-label="658 799 8941" />
    </div>

    <div class="mb-3">
      <label class="form-label" for="basic-default-email">Email</label>
      <input
        type="email"
        id="basic-default-email"
        class="form-control"
        placeholder="john.doe"
        required />
    </div>

    <div class="mb-3">
      <label class="form-label" for="basic-default-country">City</label>
      <select class="form-select" id="basic-default-country" required>
        <option value="">Select City</option>
        <option value="usa">USA</option>
        <option value="uk">UK</option>
        <option value="france">France</option>
        <option value="australia">Australia</option>
        <option value="spain">Spain</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label" for="collapsible-address">Address</label>
      <textarea
        name="collapsible-address"
        class="form-control"
        id="collapsible-address"
        rows="2"
        placeholder="1456, Mall Road"></textarea>
    </div>
    
    <div class="row">
      <div class="col-12">
        <button type="button" class="btn btn-primary mb-2 d-grid w-100">Submit</button>
        <button
          type="button"
          class="btn btn-label-secondary d-grid w-100"
          data-bs-dismiss="offcanvas">
          Cancel
        </button>
      </div>
    </div>
  </form>