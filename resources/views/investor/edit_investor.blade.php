<div class="modal fade" id="edit_investor{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Investor</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('investor.update', ['id' => $data->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="modal-body mx-5 form-control-sm">
                <div class="mb-3 ">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $data->name }}" required>
                    @error('name')                
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="identity_number" class="form-label">Identity Number</label>
                    <input type="text" name="identity_number" class="form-control" id="identity_number" value="{{ $data->identity_number }}" required>
                    @error('identity_number')                
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="{{ $data->phone }}" required>
                    @error('phone')                
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" class="form-control" id="address" rows="3"required>{{ $data->address }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" value="{{ $data->email }}" required>
                    @error('email')                
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="join_date" class="form-label">Join Date</label>
                    <input name="join_date" type="date" class="form-control" id="join_date" value="{{ $data->join_date }}" required>
                    @error('date')                
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>    
            <div class="modal-footer me-5">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>    
        </form>    
        </div>
    </div>
</div>