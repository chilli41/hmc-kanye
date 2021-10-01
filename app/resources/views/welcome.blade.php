@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mt-5 mb-5">
	<div class="col-3"></div>
        <div class="col-6 text-center">
            <h3>HMC 🌊 Kanye</h3>
                @if(count($kanye_result) > 0)
		<table class="table table-bordered">
                    <thead>
                        <tr class="row">
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kanye_result as $kanye)
                            <tr>
                                <td class="card">{{ __($kanye) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td><a href="{{ route('kanye') }}" class='button'>Refresh Qoute</a></td>   
                        </tr>
                    </tbody>
               </table>
               @endif
        </div>
        </div class="col-3"></div
    </div>
</div>
@endsection
