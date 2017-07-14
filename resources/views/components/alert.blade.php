<div class="alert alert-{{ $type ?? 'danger' }}" role="alert">
  <i class="fa fa-frown-o fa-3x mr-3 align-middle" aria-hidden="true"></i>
  @if ($errorCode ?? 0)
    <b>Error {{ $errorCode }} ::</b>
  @endif
  {{ $slot }}
</div>
