@extends('admin.layout.master')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>User List</h3>

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                         <th scope="col">Email Address</th>
                          <th scope="col">Account Created</th>
                       
                    </tr>
                </thead>


                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                  
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                          
                       
                  
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No data available!</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
@endsection
