@if($errors->any())
    @foreach($errors->all() as $error)
    <div class="my-alert dungeon active_alert" role="alert">
      {{$error}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endforeach
@endif

@if(session('success'))
<div class="my-alert success active_alert" role="alert">
  {{session('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif