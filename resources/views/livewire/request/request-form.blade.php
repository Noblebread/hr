<div class="modal-content">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <div class="modal-header">
        <h1 class="modal-title fs-5">
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
                            <span class="login-danger">*</span>
                        </label>
                        <select class="form-control select" wire:model="staff_id">
                            <option value="" disabled selected>Select a name</option>
                            {{-- @foreach ($staffs as $staff) --}}
                            {{-- <option value="{{ $staff->id }}"> --}}
                                {{-- ({{$staff->first_name}}) {{ $staff->last_name }} --}}
                            </option>
                            {{-- @endforeach --}}
                        </select>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Request Type
                            <span class="login-danger">*</span>
                        </label>
                        <select class="form-control select"  wire:model="requestOption">
                            <option value="" disabled selected>Select your request</option>
                            <option value="document">Document</option>
                            <option value="depart">Leave</option>
                          
                        </select>
                    </div>
                </div>

                @if ($requestOption === 'document')
                <div class="col-md-12">
                    <div class="form-group local-forms">
                        <label>Enter document:</label>
                        <input type="text" class="form-control select" id="document">
                    </div>
                    <div class="form-group local-forms">
                        <label>Move to:</label>
                        <input type="text" class="form-control select" id="document">
                    </div>
                </div>
               
            @elseif ($requestOption === 'depart')
            <div class="col-md-12">
                <div class="form-group local-forms">
                    <label for="depart">Enter Reason:</label>
                    <input type="text" class="form-control select" id="depart">
                </div>
                
                <div class="form-group local-forms">
                    <label for="depart">Date to Leave:</label>
                    <input type="text" class="form-control select" id="depart">
                </div>

                <div class="form-group local-forms">
                    <label for="depart">Date to Return:</label>
                    <input type="text" class="form-control select" id="depart">
                </div>

                
            </div>
            @endif

               

                {{-- <div class="col-md-6">
                    <div class="card-block">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <h5 class="text-bold card-title">Tool</h5>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <button class="btn btn-info" id="addTool" wire:click.prevent="addTool">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">

                            
                            <table class="table table-striped mb-0">
                                <tbody>
                                    {{-- @foreach ($toolItems as $toolIndex => $tool) 
                                    <tr>
                                        <td>
                                            {{-- <select class="form-select" name="toolItems[{{ $toolIndex }}][toolId]" wire:model="toolItems.{{ $toolIndex }}.toolId" id="tools">
                                                <option selected="" value="">Choose...</option>
                                                @foreach ($tools as $toolOption)
                                                <option value="{{ $toolOption->id }}" @if($toolOption->status_id == 2) disabled @endif>
                                                    {{ $toolOption->brand }} @if($toolOption->status_id == 2) (Unavailable) @endif
                                                </option>
                                                @endforeach
                                            </select> 
                                        </td>

                                        <td>
                                            {{-- <a class="btn btn-info delete-header m-1 btn-sm d-flex justify-content-center" title="Delete Item" wire:click="deleteTool({{ $toolIndex }})"> --}}
                                                {{-- <i aria-hidden="true" class="fa fa-times"></i>
                                            </a> 
                                        </td>
                                    </tr>
                                    {{-- @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}


            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('tools')  // id
    </script>
</div>