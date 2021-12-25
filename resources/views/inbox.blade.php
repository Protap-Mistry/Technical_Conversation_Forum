@extends('layouts.inbox_app')

@section('content')

    <audio id= "ChatAudio">
        <source src="{{asset('music/chat.mp3')}}">
    </audio>
    
    <div class="container-fluid">

        <form class="nav navbar-form navbar-left"  method="POST" role="search">
            @csrf
            <div class="form-group">
                <input  style="background-color: powderblue;" type="text" class="form-control" placeholder="Search Your Partner" name="q"/>            
            </div>
        </form> 

        <div class="row">
            <div class="col-md-3" style="background-color: powderblue;">
                <div class="user-wrapper" style="height: 470px">
                    <ul class="users">
                        @foreach($users as $user)
                            <li class="user" id="{{ $user->id }}">
                                {{--will show unread count notification--}}
                                @if($user->unread)
                                    <span class="pending">{{ $user->unread }}</span>
                                @endif

                                <div class="media">
                                    
                                    <div class="media-left">
                                        <img src="{{asset('storage/profile')}}/{{($user->image)}}" alt="" class="media-object">
                                    </div>

                                    <div class="media-body">
                                        <p class="name">{{ $user->name }}</p>
                                        <p class="email">{{ $user->email }}</p>
                                    </div>
                                </div> 
                            </li>
                        @endforeach
                    </ul> 

                </div>
            </div>

            <div class="col-md-9" id="messages">

            </div>
        </div>
    </div>
@endsection
