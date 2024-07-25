<!-- ===============Start Toaster Start ============= -->
@if(session()->has('status'))
<div id="toast-container" class="toast-top-right mt-5">
    <div class="toast toast-success" aria-live="polite" style="">
        {{-- <button type="button" class="toast-close-button" role="button">×</button> --}}
        <div class="toast-title">Successfully Added</div>
        <div class="toast-message">  {{ session()->get('status') }}</div>
    </div>
</div>
@endif
<!-- ===============Start Toaster End ============= -->