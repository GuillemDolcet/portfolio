<form id="faq-form" action="{{ $faq->exists ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}"
      @if(($faq->exists && !Auth::user()->can('update', $faq)) || (!$faq->exists && !Auth::user()->can('store', $faq))) {{ "data-disabled=true" }} @endif
      method="post" accept-charset="utf-8" data-controller="form" enctype="multipart/form-data">
    @csrf
    @if ($faq->exists)
        @method('put')
    @endif
    <div class="modal-body nice-scrollbar scrollbar-primary">
        <div id="section-form-fields">
            @include('admin.faqs.form._fields')
        </div>
    </div>
    <div class="modal-footer">
        <div class="d-flex justify-content-between">
            @if($faq->exists)
                @can('update', $faq)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="edit"/> @lang('admin.edit') @lang('admin.faq')
                    </button>
                @endcan
            @else
                @can('store', $faq)
                    <button type="submit" id="send-form" name="action" class="btn btn-primary ms-auto me-2">
                        <x-icon icon="plus"/> @lang('admin.add') @lang('admin.faq')
                    </button>
                @endcan
            @endif
        </div>
    </div>
</form>
