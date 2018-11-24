@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-body">
                    <form method="POST" action="{{ route('posttalks') }}" aria-label="{{ __('posttalks') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <textarea id="message" class="form-control" name="message" required autofocus rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <center><button type="submit" class="btn btn-primary">
                                {{ __('提交') }}
                            </button></center>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-striped task-table">

                    <tbody>
                    @foreach ($talks as $talk)
                        <tr>

                            <td class="table-text">{{ strstr($talk->email, '@', true)  }} <div>{{ $talk->message }}  {{  date('H:i', strtotime($talk->created_at)) }}    </div></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $talks->links()  }}
            </div>
        </div>
    </div>



@endsection