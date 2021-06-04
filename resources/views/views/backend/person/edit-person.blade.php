<x-app-layout>

    @section('title') {{ __('Edit Person: ') . $person->name }} @endsection
    @section('css')
        <link rel="stylesheet" href="{{ url('assets/plugins/select2/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{ url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    @endsection
    @section('js')
        <script src="{{ url('assets/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ url('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
        <script>
            $('#birthday').inputmask('yyyy-mm-dd', {'placeholder': 'yyyy-mm-dd'})
        </script>
    @endsection
    @section('content')
        <div class="container m-3">
            <div class="container-fluid">
                <!--Person information-->
                <div class="row">
                    <form class="m-2 p-2 bg-gray-100 rounded w-100"
                          method="post"
                          action="{{ route('persons.update',$person->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h2>{{ 'Currently editing: ' . $person->name  }}</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input type="text"
                                                   class="form-control"
                                                   id="name"
                                                   name="name"
                                                   value="{{ $person->name }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="birthday">{{ __('Birthday') }}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text"
                                                       id="birthday"
                                                       name="birthday"
                                                       value="{{ $person->birthday }}"
                                                       class="form-control"
                                                       data-inputmask-alias="datetime"
                                                       data-inputmask-inputformat="yyyy-mm-dd"
                                                       data-mask=""
                                                       inputmode="numeric">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="gender">{{ __('Gender') }}</label>
                                            <div class="input-group">
                                                <select name="gender" id="gender" class="w-100">
                                                    <option
                                                        {{ $person->gender == 'Female' ? 'selected' : '' }} value="female">
                                                        {{ __('Female') }}
                                                    </option>
                                                    <option
                                                        {{ $person->gender == 'Male' ? 'selected' : '' }} value="male">
                                                        {{ __('Male') }}
                                                    </option>
                                                    <option
                                                        {{ $person->gender == 'Other' ? 'selected' : '' }} value="other">
                                                        {{ __('Other') }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </div>
                    </form>
                    <!--Currently related addresses-->
                    <div class="col-12 m-3">
                        <div class="card">
                            <div class="card-header">
                                <h2>{{ __('Related Addresses with ') . $person->name }}</h2>
                            </div>
                            <div class="card-body">
                                @foreach($person->addresses as $address)
                                    <div class="row">
                                        <div class="col-4">
                                            <label>{{ __('Addresses') }}</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="address"
                                                   value="{{ $address->address }}">
                                        </div>
                                        <div class="col-2">
                                            <label>{{ __('Post Code') }}</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="post_code"
                                                   value="{{ $address->post_code }}">
                                        </div>
                                        <div class="col-2">
                                            <label>{{ __('City Name') }}</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="city_name"
                                                   value="{{ $address->city_name }}">

                                        </div>
                                        <div class="col-2">
                                            <label>{{ __('Country Name') }}</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="country_name"
                                                   value="{{ $address->country_name }}">

                                        </div>
                                        <div class="col-2">
                                            <form action="{{ route('addresses.destroy', $address->id)}}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <label class="w-10/12 mt-2"></label>
                                                <button type="submit" class="btn btn-danger mt-2">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--Add new address-->
                    <div class="col-12 ml-3">
                        <form action="{{ route('addresses.store')}}"
                              method="post">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    {{ __('Add new address') }}
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <input type="text" hidden name="person_id" value="{{ $person->id }}">
                                        <div class="col-4">
                                            <label>{{ __('Addresses') }}</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="address">
                                        </div>
                                        <div class="col-2">
                                            <label>{{ __('Post Code') }}</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="post_code">
                                        </div>
                                        <div class="col-2">
                                            <label>{{ __('City Name') }}</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="city_name">

                                        </div>
                                        <div class="col-2">
                                            <label>{{ __('Country Name') }}</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="country_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary mt-2">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
