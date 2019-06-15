@extends('layouts.backend')

@section('title', 'Show TNC')

@section('content')
    <div class="col-lg-9 main-chart">
        <div class="panel panel-default">
            <div class="panel-heading" align="center">
                <h3 class="panel-title">View TNC</h3>
            </div>
            <div class="panel-body">
                <div class="rows">
                        <div class="col-md-3"><strong>Description Details : *</strong></div>
                        <div class="col-md-9">
                                <textarea class="form-control" name="description" rows="7" style="resize: none;"
                                          disabled>
                                    {{$tnc->description}}
                                </textarea>
                        </div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <div align="center">
                        <a href="{{route('tnc')}}" class="btn btn-success">
                            <i class="fa fa-check"></i>&nbsp;&nbsp;Procced
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection