@extends('admin.layout.app')
<style>
   
    .material-icons{
        margin-top:0px !important;
        margin-bottom:0px !important;
    }
</style>
@section ('content')
<div class="container-fluid">
 <div class="row">
<div class="col-lg-12">
    @if (session()->has('success'))
   <div class="alert alert-success">
    @if(is_array(session()->get('success')))
            <ul>
                @foreach (session()->get('success') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
            @else
                {{ session()->get('success') }}
            @endif
        </div>
    @endif
     @if (count($errors) > 0)
      @if($errors->any())
        <div class="alert alert-danger" role="alert">
          {{$errors->first()}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      @endif
    @endif
    </div>
<div class="col-lg-12">
   
<div class="card">    
<div class="card-header card-header-primary">
      <h4 class="card-title ">{{ __('keywords.Stores')}} {{ __('keywords.Callback Requests')}}</h4>
    </div>
<div class="container"> <br> 
<table id="datatableDefault" class="table text-nowrap w-100 table-striped">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>{{ __('keywords.ID')}}</th>
            <th>{{ __('keywords.Store Name')}}</th>
            <th>{{ __('keywords.Store Phone')}}</th>
            <th class="text-center">{{ __('keywords.Actions')}}</th>
        </tr>
    </thead>
    <tbody>
           @if(count($requests)>0)
          @php $i=1; @endphp
          @foreach($requests as $request)
        <tr>
            <td class="text-center">{{$i}}</td>
            <td>{{$request->store_id}}</td>
            <td>{{$request->store_name}}</td>
            <td>{{$request->store_phone}}</td>

            <td class="td-actions text-center">
                @if($request->processed == 0)
                <a href="{{route('store_callbackproc',$request->callback_req_id)}}" rel="tooltip" class="btn btn-success">
                    <i class="fa fa-phone"></i> &nbsp; {{ __('keywords.Process')}}
                </a>
                @else
                <span style="color:green; font-weight:bold">{{ __('keywords.Processed')}}</span>
                @endif
            </td>
        </tr>
          @php $i++; @endphp
                 @endforeach
                  @else
                    <tr>
                      <td>{{ __('keywords.No data found')}}</td>
                    </tr>
                  @endif
    </tbody>
</table><br>
<div class="pull-right mb-1" style="float: right;">
  {{ $requests->render("pagination::bootstrap-4") }}
</div>
</div>  
</div>
</div>
</div>
</div>
<div>
    </div>

    @endsection
</div>