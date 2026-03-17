@extends('errors.layout')

@section('title', 'Error')
@section('expression', 'UPS!')
@section('message', 'Lo sentimos, no pudimos encontrar la página que busca. ¿Quizás escribió mal la URL? Asegúrese de
    revisar la ortografía.')
@section('image', asset('/storage/errors/404.png'))
@section('image_dark', asset('/storage/errors/404_dark.png'))
