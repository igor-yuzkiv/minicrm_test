<form method="POST" action="{{$action}}">
    @csrf
    @method($method)

    <input type="hidden" name="id" value = "{{$value['id'] ?? ''}}">
    <div class="form-group">
        <label>{{__("First name")}}</label>
        <input type="text" name="first_name" class="form-control" placeholder="{{__("Enter first name")}}"
               value="{{$value['first_name'] ?? ''}}"
               required
            {{(isset($read_only) && $read_only == true) ? 'readonly' : ''}}
        >
    </div>

    <div class="form-group">
        <label>{{__("Last  Name")}}</label>
        <input type="text" name="last_name" class="form-control" placeholder="{{__("Enter last name")}}"
               value="{{$value['last_name'] ?? ''}}"
               required
            {{(isset($read_only) && $read_only == true) ? 'readonly' : ''}}
        >
    </div>

    <div class="form-group">
        <label>Select</label>
        <select class="form-control" name="company_id">
            @foreach($companies as $company)
                @if (isset($value) && $value['company_id'] == $company->id)
                    <option selected value="{{$company->id}}">{{$company->name}}</option>
                @else
                    <option value="{{$company->id}}">{{$company->name}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>{{__("Phone")}}</label>
        <input type="text" name="phone" class="form-control" placeholder="{{__("Enter phone")}}"
               value="{{$value['phone'] ?? ''}}"
            {{(isset($read_only) && $read_only == true) ? 'readonly' : ''}}
        >
    </div>

    <div class="form-group">
        <label>{{__("Email")}}</label>
        <input type="email" name="email" class="form-control" placeholder="{{__("Enter email")}}"
               value="{{$value['email'] ?? ''}}"
            {{(isset($read_only) && $read_only == true) ? 'readonly' : ''}}
        >
    </div>

    @if (!isset($read_only) OR $read_only == false)
        <div class="form-group">
            <button type="submit" class="form-control btn-success">{{__("Save")}}</button>
        </div>
    @endif
</form>
