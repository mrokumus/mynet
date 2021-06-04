<x-frontend-layout>
    @section('title')
        {{ __('Home') }}
    @endsection
    @section('content')
            <div class="col-12 m-3">
                <div class="card">
                    <div class="card-body">
                        <div class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2"
                                           class="table table-bordered table-hover dataTable dtr-inline"
                                           role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Birthday') }}</th>
                                            <th>{{ __('Gender') }}</th>
                                            <th>{{ __('Address') }}</th>
                                            <th>{{ __('Post Code') }}</th>
                                            <th>{{ __('City Name') }}</th>
                                            <th>{{ __('Country') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($persons as $person)
                                            <tr>
                                                <td>{{ $person->name }}</td>
                                                <td>{{ $person->birthday }}</td>
                                                <td>{{ $person->gender }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach($person->addresses as $address)
                                                            <li class="bg-gray-100 mb-1 p-1 rounded list-none">
                                                                {{ $address->address }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    @foreach($person->addresses as $address)
                                                        <li class="bg-gray-100 mb-1 p-1 rounded list-none">
                                                            {{ $address->post_code }}
                                                        </li>
                                                @endforeach
                                                <td>
                                                    @foreach($person->addresses as $address)
                                                        <li class="bg-gray-100 mb-1 p-1 rounded list-none">
                                                            {{ $address->city_name }}
                                                        </li>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($person->addresses as $address)
                                                        <li class="bg-gray-100 mb-1 p-1 rounded list-none">
                                                            {{ $address->country_name }}
                                                        </li>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row justify-around">
                                {{ $persons->links() }}
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        <div class="clearfix"></div>
            <div class="col-12 m-3">
                <div class="card">
                    <div class="card-body">
                        <div class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2"
                                           class="table table-bordered table-hover dataTable dtr-inline"
                                           role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th>{{ __('Address') }}</th>
                                            <th>{{ __('Post Code') }}</th>
                                            <th>{{ __('City Name') }}</th>
                                            <th>{{ __('Country') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($addresses as $address)
                                            <tr>
                                                <td>
                                                    {{ $address->address }}
                                                </td>
                                                <td>
                                                {{ $address->post_code }}
                                                <td>
                                                    {{ $address->city_name }}
                                                </td>
                                                <td>
                                                    {{ $address->country_name }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row justify-around">
                                {{ $addresses->links() }}
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        @endsection
</x-frontend-layout>
