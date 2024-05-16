<div>
    @if(session()->has('message'))
        <div class="alert alert-info">
            <font color="green">{{ session()->get('message') }}</font>
        </div>
    @endif
</div>
