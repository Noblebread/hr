<div class="modal-content">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <div class="modal-header">
        <h1 class="modal-title fs-5">

            Add Document
            {{-- @if ($requestId)
            Edit Request
            @else
            Add Request
            @endif --}}
        </h1>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    @if ($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group local-forms">
                        <label>Name
                            <span class="login-danger">*</span></label>
                        <input class="form-control" type="text" wire:model="name" placeholder />
                    </div>
                   
                </div>

                <div class="col-md-12">

                <div class="form-group local-forms">
                    <label>
                        Department
                        <span class="login-danger">*</span>
                    </label>
                    <select class="form-select" name="department_id" wire:model="department_id" required>
                        <option selected="" value="">Choose...</option>
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}">
                            {{ $department->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                </div>

                <div class="col-md-12">

                    <div class="form-group local-forms">
                        <label>
                            Type
                            <span class="login-danger">*</span>
                        </label>
                        <select class="form-select" name="type_id" wire:model="type_id" required>
                            <option selected="" value="">Choose...</option>
                            
                            @foreach ($types as $type)
                            @if($type->category_id != 2)
                            <option value="{{ $type->id}}">
                                {{ $type->title }}
                            </option>
                            @endif
                            @endforeach
                        </select>
                    </div>
    
                    </div>
               

</div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Save</button>
</div>
</form>
{{-- <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
<script>
    new MultiSelectTag('tools')  // id
</script> --}}
</div>