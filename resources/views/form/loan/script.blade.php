@push('scripts')
    <script src="{{ asset('assets/js/cleave.min.js') }}"></script>
    <script>
        $('.select').select2({
            placeholder: 'Select...',
            closeOnSelect: false,
        });

        $('.select').val(null);

        // Numeral Formatting
        const sourceAmount = new Cleave('#loan_amount', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>
@endpush
