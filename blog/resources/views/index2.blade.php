
@extends('layouts.master2');

@section('content')

           
<div class="uk-card uk-card-default uk-card-body uk-width-1-2@s">
    <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
        <li class="uk-active"><a href="/admin/setting/category">category</a></li>
        <li class="uk-parent">
            <a>add and remove</a>
            <ul class="uk-nav-sub">
                <li><a href="/add.categor">add category</a></li>
              
               
                <li><a href="#">Sub item</a></li>
            </ul>
        </li>
        <li class="uk-parent">
            <a href="#">Parent</a>
            <ul class="uk-nav-sub">
                <li><a href="#">Sub item</a></li>
                <li><a href="#">Sub item</a></li>
            </ul>
            </li>
        <li class="uk-nav-header">Header</li>
        <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Item</a></li>
        <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span> Item</a></li>
        <li class="uk-nav-divider"></li>
        <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: trash"></span> Item</a></li>
    </ul>
</div>
@endsection

