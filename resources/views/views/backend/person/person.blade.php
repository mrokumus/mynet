<x-app-layout>
    @section('title') {{ __('All Persons') }} @endsection
    @section('css')
        <link rel="stylesheet" href="{{ url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet"
              href="{{ url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/plugins/summernote/summernote-lite.min.css') }}">
    @endsection
    @section('js')
        <script src="{{ url('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ url('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    @endsection
    @section('content')
        <div class="col-12 m-3">
            <div class="card">
                <div class="header m-3">
                    <a href="{{ route('persons.create') }}"
                       class="pull-right btn btn-primary">
                        {{ __('Add Person') }}
                    </a>
                </div>
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
                                        <th>{{ __('Actions') }}</th>
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
                                            <td>
                                                <div class="row">
                                                    <a class="btn btn-primary mr-1"
                                                       href="{{ route('persons.edit',$person->id) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('persons.destroy',$person->id) }}"
                                                          method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn btn-danger">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
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
    @endsection
</x-app-layout>
