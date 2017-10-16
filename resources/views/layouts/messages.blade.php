@php
    $error_keys = $errors->keys()
@endphp
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Some Errors Occurred!</strong>
        <ul>
            @foreach ($errors->all() as $key=>$error)
                @if(substr_count($error, '.') == 1)
                    <li>{{ $error }}</li>
                @else
                    @php
                        $parameter = $error_keys[$key];
                        $field = substr($parameter,0,strpos($parameter,'.'));
                        $position = ordinal((int) substr($parameter,strpos($parameter,'.')+1) + 1);
                        $error_msg = str_replace($parameter, $position.' '.$field,$error);
                    @endphp
                    <li>{{ $error_msg }}</li>
                @endif
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success">
        <strong>Success!!</strong>
        <p>{{ Session::get('success') }}</p>
    </div>
@endif
@if (Session::has('info'))
    <div class="alert alert-info">
        <strong>Info!</strong>
        <p>{{ Session::get('info') }}</p>
    </div>
@endif
@if (Session::has('warning'))
    <div class="alert alert-warning">
        <strong>Warning!</strong>
        <p>{{ Session::get('warning') }}</p>
    </div>
@endif