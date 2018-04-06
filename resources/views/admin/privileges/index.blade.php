@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Roles</div>
                    <div class="card-body">
                        @php 
                            $slotsUsed = App\Privilege::getCountWithoutEmpty();
                            $slotsAvailable = App\Privilege::getCount();
                        @endphp
                        @if ($slotsUsed <= $slotsAvailable)
                        <a href="{{ url('/admin/privileges/create') }}" class="btn btn-success btn-sm" title="Add New Privilege">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        @endif
                        <form method="GET" action="{{ url('/admin/privileges') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Role</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($privileges as $item)
                                    @if ($item->privilege != 'empty')
                                        <tr>
                                            <td>{{ strtoupper($item->privilege) }}</td>
                                            <td>
                                                <a href="{{ url('/admin/privileges/' . $item->id) }}" title="View Privilege"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Policies</button></a>
                                                <a href="{{ url('/admin/privileges/' . $item->id . '/edit') }}" title="Edit Privilege"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                @if (is_null(App\User::privilegeInUse($item->id)->first()))
                                                <form method="POST" action="{{ url('/admin/privileges' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Privilege" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $privileges->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
