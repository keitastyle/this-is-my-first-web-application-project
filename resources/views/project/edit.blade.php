<?php
/**
 * Created by PhpStorm.
 * User: Joel
 * Date: 12/04/2016
 * Time: 00:25
 */
?>

@extends('layouts.master')

@section('title', 'Titre projet')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Accueil</a></li>
        <li><a href="{{ url('/project/'.$project->id) }}">{{ $project->title }}</a></li>
        <li class="active">Modifier</li>
    </ol>
    <div class="row">
        <form action="{{ url('/project/'.$project->id.'/edit') }}" method="post" role="form" class="col-md-6">
            {{csrf_field()}}
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" name="title" id="titre" placeholder="Titre" value="{{ $project->title }}" required>
            </div>
            <div class="form-group">
                <label for="theme">Thème</label>
                <input type="text" class="form-control" name="theme" id="theme" placeholder="Thème" value="{{ $project->theme }}" required>
            </div>

            <label >Type :</label>
            <div class="form-group">
                <select name="type" class="form-control">
                    <option value="PFE" @if($project->type == 'PFE') selected @endif>PFE</option>
                    <option value="Doctorat" @if($project->type == 'Doctorat') selected @endif>Doctorat</option>
                    <option value="Autre" @if($project->type == 'Autre') selected @endif>Autre</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="Description du projet" >{{ $project->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="dateD">Date de début</label>
                <input type="text" class="form-control" name="dateD" id="dateD" placeholder="jj/mm/aaaa"  value="{{ $project->beginning_date->formatLocalized("%d/%m/%Y") }}" required>
            </div>
            <div class="form-group">
                <label for="dateF">Date de fin <em>Non requis</em></label>
                @if($project->ending_date != null)
                    <input type="text" class="form-control datepicker" name="dateF" id="dateF" placeholder="jj/mm/aaaa"  value="{{ $project->ending_date->formatLocalized("%d/%m/%Y") }}">
                @else
                    <input type="text" class="form-control datepicker" name="dateF" id="dateF" placeholder="jj/mm/aaaa"  value="">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
        <div class="col-md-6">
            <h3>Modifier</h3>
            @foreach($o_projects as $p)
                <div class="item">
                    <a href="{{ url('project/1/edit') }}">
                        <h4>
                            {{ $project->title }}
                        </h4>
                    </a>
                    <h5>
                        {{ $project->theme }} <sup>{{ $project->type }}</sup>
                    </h5>
                    <p>
                        {{ $project->description }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>

@endsection
