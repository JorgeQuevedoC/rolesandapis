@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ strtoupper($privilege->privilege) }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/privileges') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/privileges/' . $privilege->id . '/edit') }}" title="Edit Privilege"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        @if (is_null(App\User::privilegeInUse($privilege->id)->first()))
                        <form method="POST" action="{{ url('admin/privileges' . '/' . $privilege->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Privilege" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        @endif
                        <br/>
                        <br/>

                        @php 
                            $enrolledPolicies = DB::table('policies')->join('sections', 'policies.section_id', '=', 'sections.id')->select('policies.id as ip','policies.policy', 'sections.section')->where($privilege->role_header, '1')->paginate(10);
                        @endphp

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th> Role </th>
                                        <td> {{ strtoupper($privilege->privilege) }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <br>
                        <br>
                                    
                        <div class="table-responsive">
                            <table class="table table-striped" style="">
                                <thead class="thead-dark">
                                    <tr>
                                        <th colspan="2" style="text-align:center;">Policies</th>
                                    </tr>
                                    <tr>
                                        <th style="text-align:center;">Name</th><th style="text-align:center;">Policy group</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($enrolledPolicies as $policies)
                                    <tr>
                                        <td><a href="{{ url('/admin/policies/' . $policies->ip . '/edit') }}" >{{ $policies->policy }}</a></td> 
                                        <td>{{ $policies->section }}</td>
                                    </tr>                                                      
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $enrolledPolicies->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>                                                   

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
