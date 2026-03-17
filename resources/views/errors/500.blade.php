@extends('errors.layout')

@section('title', 'Error de Servidor')
@section('expression', 'Ummm!')
@section('message', 'Se ha producido un error, inténtelo de nuevo más tarde.')
@section('image', asset('/storage/errors/505.png'))
@section('image_dark', asset('/storage/errors/505_dark.png'))