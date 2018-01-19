@inject('poll', 'App\AgeLimitPoll')
@extends('layouts.admin')
    @section('content')
    <div class="container-fluid">
        @foreach (['Unverified Phone Numbers','Verified Phone Numbers'] as $key=>$title)
           <div class="card bordered-top mt-2">
             <div class="card-body">
                 <h4 class="card-title text-center">
                    {{ $title }}
                    <span class="badge badge-secondary badge-pill">
                        {{ count($poll->groupedByVerification()[$key] ??[]) }}
                    </span>
                 </h4>
               @include('agelimit.table',
                 ['data'=>$poll->groupedByVerification()[$key]?? collect([])])
             </div>
           </div> 
        @endforeach
    </div>
       
    @endsection

