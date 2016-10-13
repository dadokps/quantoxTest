@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @if(!$users)
            <p>Nothing found, please try a different search</p>
            @else
            <ul>
                @foreach($users as $user)
                <li>
                    {{ ucfirst($user->name) }}
                    
                    
                </li>
                @endforeach
            </ul>

            @endif

       </div> 
    </div>
@endsection