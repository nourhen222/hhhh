@extends('layouts.app') {{-- Ton layout principal --}}

@section('content')
<div class="complaints">
    <h3 style="margin-bottom: 20px;">Liste des doléances</h3>
    <table style="width: 100%; border-collapse: collapse; background-color: white;">
        <thead style="background-color: #fe5e00; color: white;">
            <tr>
                <th style="padding: 12px; text-align: left;">#</th>
                <th style="padding: 12px; text-align: left;">Objet</th>
                <th style="padding: 12px; text-align: left;">Statut</th>
                <th style="padding: 12px; text-align: left;">Date</th>
                <th style="padding: 12px; text-align: left;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doleances as $index => $doleance)
            <tr>
                <td style="padding: 10px;">{{ $index + 1 }}</td>
                <td style="padding: 10px;">{{ $doleance->objet }}</td>
                <td style="padding: 10px;">
                    @if($doleance->statut == 'Rejeté')
                        <span style="background-color: #e74c3c; color: white; padding: 5px 10px; border-radius: 5px;">{{ $doleance->statut }}</span>
                    @elseif($doleance->statut == 'En cours')
                        <span style="background-color: #3498db; color: white; padding: 5px 10px; border-radius: 5px;">{{ $doleance->statut }}</span>
                    @else
                        <span style="background-color: #2ecc71; color: white; padding: 5px 10px; border-radius: 5px;">{{ $doleance->statut }}</span>
                    @endif
                </td>
                <td style="padding: 10px;">{{ $doleance->created_at->format('d/m/Y') }}</td>
                <td style="padding: 10px;">
                    <a href="{{ route('doleances.show', $doleance->id) }}" style="background-color: #2ecc71; border: none; padding: 8px 12px; border-radius: 5px; color: white; cursor: pointer;">Voir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $doleances->links() }} {{-- Pagination automatique --}}
    </div>
    @if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
</div>
@endsection
