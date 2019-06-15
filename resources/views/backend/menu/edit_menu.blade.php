@extends('layouts.backend')

@section('title', 'Edit Menu')

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menu
      </h1>
      
    </section>
    <!-- Main content -->
<section class="content">
    <div class="row">    
        <div class="col-12 col-lg-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit <strong style="color: #5fa7da">Menu</strong>&nbsp &nbsp</h3>
                </div>

                <div class="box-body">
                <form action="{{route('updateMenu')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$menu->menus_id}}">
                        


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><strong>Title : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="title" value="{{$menu->title}}" required>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><strong>Parent Id : *</strong></div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <select name="parent_id" id="menus" class="form-control">
                                            @foreach($menus as $key)
                                                <option>None</option>
                                                <option value="{{ $key->menus_id }}"
                                                 @php
                                                    if($key->menus_id == $menu->parent_id) echo "selected" ;
                                                @endphp>{{ $key->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <strong class="text-danger">{{$errors->first('parent_id')}}</strong>
                                </div>
                            </div>
                        </div>

                            
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><strong>Order : *</strong></div>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="page" value="{{$menu->order}}">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"><strong>Url : *</strong></div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="url" value="{{$menu->url}}">
                                </div>
                            </div>
                        </div>
                    

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div align="center">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;&nbsp;
                                        Save Changes
                                    </button>&nbsp;&nbsp;
                                    <button type="reset" class="btn btn-danger"><i class="fa fa-close"></i>&nbsp;&nbsp;
                                        Cancel&nbsp;&nbsp;
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
</div>
@endsection