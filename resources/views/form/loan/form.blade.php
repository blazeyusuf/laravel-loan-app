<div class="mb-10">
    <div class="row mb-5">
        <div class="col">
            <label class="form-label fw-bolder fs-6 text-gray-700">Loan Amount(₦)</label>

            {{-- <x-form.input type="text" name="loan_amount" id="loan_amount" class="form-control form-control-solid fs-1 @error('loan_amount') is-invalid @enderror" placeholder="10,000" autocomplete="off" value="{{ old('loan_amount') }}" required="true" /> --}}

            <input type="text" name="loan_amount" id="loan_amount"
                class="form-control form-control-solid fs-1 @error('loan_amount') is-invalid @enderror"
                placeholder="₦10,000" autocomplete="off" maxlength="10"
                value="{{ old('loan_amount') ? old('loan_amount') : (isset($loan['loan_amount']) ? $loan['loan_amount'] : '') }}" />
            @error('loan_amount')
                <x-alert :message="$message" />
            @enderror
        </div>
    </div>

    <div class="row
                mb-5">
        <div class="col">
            <label class="form-label fw-bolder fs-6 text-gray-700">Duration</label>

            <input type="number" name="duration" id="duration"
                class="form-control form-control-solid fs-1 @error('duration') is-invalid @enderror" autocomplete="off"
                value="{{ old('duration') ? old('duration') : (isset($loan['duration']) ? $loan['duration'] : '') }}"
                maxlength="2"
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
            @error('duration')
                <x-alert :message="$message" />
            @enderror
        </div>
        <div class="col">
            <label class="form-label fw-bolder fs-6 text-gray-700">Loan Type</label>
            <select name="loan_type" aria-label="Select a loan type" data-control="select2"
                data-placeholder="Select loan type"
                class="form-select form-select-solid @error('loan_type') is-invalid @enderror">
                <option value="" selected></option>
                @foreach (\App\Models\Loan::TYPE as $key => $loanType)
                    <option @selected(old('loan_type') == $key)
                        {{ isset($loan['loan_type']) && $loan['loan_type'] == $key ? 'selected' : '' }}
                        value="{{ $key }}">
                        {{ !empty($loanType) ? Str::title($loanType) : 'Unavailable' }}
                    </option>
                @endforeach
            </select>
            @error('loan_type')
                <x-alert :message="$message" />
            @enderror

        </div>
    </div>
    <button type="submit" class="btn btn-primary w-100">Submit</button>
</div>
