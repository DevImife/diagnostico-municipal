@extends('errors.layout')

@section('title', 'Acceso Denegado')
@section('expression', 'UPS!')
@section('message', 'No tienes permiso para acceder a esta página.')
@section('image', asset('/storage/errors/403.png'))
@section('image_dark', asset('/storage/errors/403_dark.png'))