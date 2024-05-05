@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-wrapper d-flex justify-content-center mt-5">
            <div class="col-6">
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td class="text-center">
                                        <form action="{{route('users.add',$user)}}" method="POST" class="w-50"
                                              enctype="multipart/form-data">
                                            @method('POST')
                                            @csrf
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="fa-solid fa-plus" role="button"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{route('users.delete',$user)}}" method="POST" class="w-50"
                                              enctype="multipart/form-data">
                                            @method('POST')
                                            @csrf
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="fa-solid fa-minus"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{route('mixing')}}" class="btn btn-secondary">Просчитать</a>
                </div>
                @if($isResults)
                    <div class="card mt-3">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Кто дарит</th>
                                    <th>Кому дарит</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $result)
                                    <tr>
                                        <td>{{$result->getFirstUser->email}}</td>
                                        <td>{{$result->getSecondUser->email}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
