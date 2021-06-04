<x-app-layout>
    @section('title') {{ __('Edit Adress: ') . $address->address }} @endsection
    @section('content')
        <div class="container m-3">
            <div class="container-fluid">
                <div class="row">
                    <!--Add new address-->
                    <div class="col-12 ml-3">
                        <form action="{{ route('addresses.update',$address->id)}}"
                              method="post">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-header">
                                    {{ __('Update address') }}
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-3">
                                            <label>{{ __('Addresses') }}</label>
                                            <input type="text"
                                                   class="form-control"
                                                   value="{{ $address->address }}"
                                                   name="address">
                                        </div>
                                        <div class="col-12 col-sm-2">
                                            <label>{{ __('Post Code') }}</label>
                                            <input type="text"
                                                   class="form-control"
                                                   value="{{ $address->post_code }}"
                                                   name="post_code">
                                        </div>
                                        <div class="col-12 col-sm-2">
                                            <label>{{ __('City Name') }}</label>
                                            <input type="text"
                                                   class="form-control"
                                                   value="{{ $address->city_name }}"
                                                   name="city_name">

                                        </div>
                                        <div class="col-12 col-sm-2">
                                            <label>{{ __('Country Name') }}</label>
                                            <input type="text"
                                                   class="form-control"
                                                   value="{{ $address->country_name }}"
                                                   name="country_name">
                                        </div>
                                        <div class="col-12 col-sm-2">
                                            <label for="person_id">{{ __('Related Person') }}</label>
                                            <select name="person_id" id="person_id">
                                                @foreach( $persons as $person)
                                                    @foreach($person->addresses as $personAddress)
                                                        <option
                                                            {{ $personAddress->id == $address->id ? 'selected' : '' }}
                                                            value="{{ $person->id }}">{{ $person->name }}
                                                        </option>
                                                    @endforeach
                                                @endforeach
                                            </select>
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
