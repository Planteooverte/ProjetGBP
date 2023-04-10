@extends('layouts.Menu')

@section('contenu')
    <h1>PAGE DE TEST</h1>
    @foreach($OperationBancaire as $OperationBancaire)
        <p>{{ $OperationBancaire->DateOperation }}</p>
        <p>{{ $OperationBancaire->DescriptionOperation }}</p>
        <p>{{ $OperationBancaire->Credit }}</p>
        <p>{{ $OperationBancaire->Debit }}</p>

    @endforeach
@endsection('contenu')