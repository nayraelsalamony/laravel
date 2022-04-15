@extends('layouts.app')

@section('show') create @endsection

@section('sec')
        <div class="card my-5">
            <div class="card-header"> Post infomation </div>
            <div class="card-body">
                <h5 class="card-title">Title : </h5>
                <p class="card-text">{{$filteredPost['title']}}</p>
                <h5 class="card-title">Description</h5>
                <p class="card-text">{{$filteredPost['descreption']}}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header"> Post creator info </div>
            <div class="card-body">
                <h5 class="card-title">Name : </h5>
                <p class="card-text">{{$filteredPost['creator']}}</p>
                <h5 class="card-title">Created at : </h5>
                <p class="card-text">{{$filteredPost['created_at']->format('l jS \\of F Y h:i:s A')}}</p>
            </div>
        </div>
    </div>
    @endsection