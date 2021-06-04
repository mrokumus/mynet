<x-app-layout>
    @section('title') {{ __('Create Person') }} @endsection
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
                          action="{{ route('persons.store') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h2 class="ml-4">{{ 'Add Person'}}</h2>
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
                                                   value="{{ old('name') }}">
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
                                                       value="{{ old('birthday') }}"
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
                                                    <option> {{ __('Select Gender') }}</option>
                                                    <option
                                                        {{ old('gender') == 'female' ? 'selected' : '' }} value="female">{{ __('Female') }}</option>
                                                    <option
                                                        {{ old('gender') == 'male' ? 'selected' : '' }} value="male">{{ __('Male') }}</option>
                                                    <option
                                                        {{ old('gender') == 'other' ? 'selected' : '' }} value="other">{{ __('Other') }}</option>
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
                    <!--Add new address-->
                    <form action="{{ route('addresses.store')}}"
                          class="m-2 p-2 bg-gray-100 rounded w-100"
                          method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h2 class="ml-4 ">{{ __('Add address')}}</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-2">
                                        <label>{{ __('Address') }}</label>
                                        <input type="text"
                                               class="form-control"
                                               name="address">
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <label>{{ __('Post Code') }}</label>
                                        <input type="text"
                                               class="form-control"
                                               name="post_code">
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <label>{{ __('City Name') }}</label>
                                        <input type="text"
                                               class="form-control"
                                               name="city_name">

                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <label>{{ __('Country Name') }}</label>
                                        <input type="text"
                                               class="form-control"
                                               name="country_name">
                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <label for="person_id">{{ __('Related Person') }}</label>
                                        <select name="person_id" id="person_id">
                                            <option>{{ __('Select related person') }}</option>
                                            @foreach( $persons as $person)
                                                <option value="{{ $person->id }}">{{ $person->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary pull-right">{{ __('Submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
