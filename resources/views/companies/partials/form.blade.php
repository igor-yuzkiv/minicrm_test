<form method="POST" action="{{$action}}" enctype="multipart/form-data">
    @csrf
    @method($method)

    <input type="hidden" name="id" value = "{{$value['id'] ?? ''}}">

    <div class="form-group">
        <label>{{__("Name")}}</label>
        <input type="text" name="name" class="form-control" placeholder="{{__("Enter name")}}"
               value="{{$value['name'] ?? ''}}"
               required
               {{(isset($read_only) && $read_only == true) ? 'readonly' : ''}}
        >
    </div>
    <div class="form-group">
        <label>{{__("Email address")}}</label>
        <input type="email" name="email" class="form-control" placeholder="{{__("Enter email")}}"
               value="{{$value['email'] ?? ''}}" required
               {{(isset($read_only) && $read_only == true) ? 'readonly' : ''}}>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-10">
                <label>{{__("Website URL")}}</label>
                <input type="text" name="website_url" class="form-control" placeholder="{{__("Enter website URL")}}"
                       value="{{$value['website_url'] ?? ''}}"
                    {{(isset($read_only) && $read_only == true) ? 'readonly' : ''}}>
            </div>
            <div class="col-sm-2" style="margin-top: 4%">
                @if (isset($value['website_url']) && $value['website_url'] != null)
                    <a class="btn btn-outline-primary" href="{{$value['website_url']}}" target="_blank">{{__("Link")}}</a>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>{{__("Logo")}}</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" accept="image/jpeg,image/png" name="logo">
                <label class="custom-file-label">{{__("Choose file")}}</label>
            </div>
        </div>
    </div>

    @if (!isset($read_only) OR $read_only == false)
        <div class="form-group">
            <button type="submit" class="form-control btn-success">{{__("Save")}}</button>
        </div>
    @endif
</form>
