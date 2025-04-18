@php
    $faqFields = $page_data && $page_data->faq ? json_decode($page_data->faq, true) : [];

    $fields = count($faqFields); // Use count() for arrays
@endphp


<div class="tab-pane fade" id="faq" role="tabpanel">
    <form class="row g-3" id="dynamicForm" method="post" action="{{ route('admin.page-setting.store') }}"
        enctype="multipart/form-data">
        @csrf

        <div id="formContainer">

            <div class="row">
                <div class="col-md-5">
                    <h6 class="fw-bold">Question</h6>

                </div>
                <div class="col-md-5">
                    <h6 class="fw-bold">Answer</h6>

                </div>

                <div class="col-md-2">

                    <button type="button" class="btn btn-dark add-field">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                        </svg>
                    </button>

                </div>

            </div>


            @foreach ($faqFields as $index => $faq)
                <div class="row g-3 form-group mt-1">
                    <div class="col-md-5">

                        <input type="text" name="fields[{{ $index }}][name]" value="{{ $faq['name'] }}"
                            class="form-control" placeholder="Enter Your Question" required>
                    </div>
                    <div class="col-md-5">

                        <input type="text" name="fields[{{ $index }}][value]" value="{{ $faq['value'] }}"
                            class="form-control" placeholder="Enter Your Answer" required>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-field">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                <path d="M2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
                              </svg>
                        </button>
                    </div>
                </div>
            @endforeach

        </div>

        <button type="submit" class="btn btn-primary w-100">Update</button>
    </form>


</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let fieldIndex = {{ $fields }};

        // Add new field
        $(document).on('click', '.add-field', function() {
            let newField = `
                <div class="row g-3 form-group" style='margin-top:5px'>
                    <div class="col-md-5">
                        <input type="text" name="fields[${fieldIndex}][name]" class="form-control" placeholder="Enter Your Question" required>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="fields[${fieldIndex}][value]" class="form-control" placeholder="Enter Your Answer" required>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger remove-field">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
  <path d="M2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
</svg>
                        </button>
                    </div>
                </div>
            `;
            $('#formContainer').append(newField);
            fieldIndex++;
        });

        // Remove field
        $(document).on('click', '.remove-field', function() {
            $(this).closest('.form-group').remove();
        });
    });
</script>
