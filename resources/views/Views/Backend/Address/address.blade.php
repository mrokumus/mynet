<x-app-layout>
    @section('title') {{ __('All Addresses') }} @endsection
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
                    <a href="{{ route('person.add.render') }}"
                       class="pull-right btn btn-primary">
                        {{ __('Add Address') }}
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
                                        <th>{{ __('Address') }}</th>
                                        <th>{{ __('Post Code') }}</th>
                                        <th>{{ __('City Name') }}</th>
                                        <th>{{ __('Country') }}</th>
                                        <th>{{ __('Actions') }}</th>
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
                                            <td>
                                                <div class="row">
                                                    <a class="btn btn-primary mr-1"
                                                       href="{{ route('addresses.update',$address->id) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('addresses.destroy',$address->id) }}"
                                                          method="post">
                                                        @csrf
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
                            {{ $addresses->links() }}
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    @endsection

</x-app-layout>
