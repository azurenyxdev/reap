<div class="modal fade" id="formAddContract" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Add New Contract</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/reap/public/investor_portofolio" method="POST" >
            @csrf
            <div class="modal-body mx-5 form-control-sm">
                @if ($errors->any()) 
                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                        Add new contract failed! please try again.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="mb-3 ">
                    <label for="investor_id" class="form-label">Investor Name</label>
                    <select class="form-select" name="investor_id" id="investor_id" required>
                        <option value="">Select Investor Name</option>
                        @foreach ($investorData as $data)
                            <option value="{{ $data->investor_id }}" {{ old('investor_id') == $data->investor_id ? 'selected' : '' }}>{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Initial Amount</label>
                    <input type="text" onblur="formatCurrency(this)" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" required>
                    <input type="hidden" name="amount" id="amount" value="{{ old('amount') }}" required>
                    @error('amount')                
                        <div class="invalid-feedback">
                            The Amount field must be at least 1,000,000.
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="profitpercentage" class="form-label">Profit Percentage</label>
                    <input type="number" name="profitpercentage" id="profitpercentage" class="form-control @error('profitpercentage') is-invalid @enderror" value="{{ old('profitpercentage') }}" required>
                    @error('profitpercentage')                
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="lengthofinvest" class="form-label">Length of Investment (Month)</label>
                    <input type="number" name="lengthofinvest" class="form-control @error('lengthofinvest') is-invalid @enderror" id="lengthofinvest" value="{{ old('lengthofinvest') }}" required>
                    @error('lengthofinvest')                
                        <div class="invalid-feedback">
                            The Length of Investment field must be at least 1 month.
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="invest_startdate" class="form-label">Contract Start Date</label>
                    <input name="invest_startdate" type="date" class="form-control" id="invest_startdate" value="{{ old('invest_startdate') }}" required>
                </div>
                <div class="mb-3">
                    <label for="invest_enddate" class="form-label">Contract End Date</label>
                    <input type="date" class="form-control" id="invest_enddate_form" value="{{ old('invest_enddate') }}" disabled>
                    <input type="hidden" name="invest_enddate" id="invest_enddate" value="{{ old('invest_enddate') }}">
                </div>
                <div class="mb-3">
                    <label for="remark" class="form-label">Remark</label>
                    <input type="text" name="remark" id="remark" class="form-control" @if($errors->any()) value="{{ old('remark') }}" @else value="New contract" @endif>
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